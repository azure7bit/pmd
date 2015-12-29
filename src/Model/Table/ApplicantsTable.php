<?php
  namespace App\Model\Table;

  use App\Model\Entity\Applicant;

  use Cake\ORM\Query;
  use Cake\Datasource\EntityInterface;
  use Cake\Mailer\Email;
  use Cake\ORM\RulesChecker;
  use Cake\ORM\Table;
  use Cake\Utility\Hash;
  use Cake\Validation\Validator;
  use CakeDC\Users\Exception\WrongPasswordException;
  use Cake\Utility\Inflector;

  use Burzum\FileStorage\Model\Table\ImageStorageTable;

  /**
  * Applicants Model
  *
  * @property \Cake\ORM\Association\HasMany $ApplicantJobLists
  */
  class ApplicantsTable extends Table
  {

    public $isValidateEmail = false;

    /**
    * Initialize method
    *
    * @param array $config The configuration for the Table.
    * @return void
    */
    public function initialize(array $config)
    {
      parent::initialize($config);
      
      $this->table('ERC_APPLICANTS');
      $this->alias('ERC_APPLICANTS');
      $this->registryAlias('ERC_APPLICANTS');
      $this->displayField('id');
      $this->primaryKey('id');

      $this->addBehavior('CakeDC/Users.Register');
      $this->addBehavior('CakeDC/Users.Password');
      $this->addBehavior('CakeDC/Users.Social');
      
      $this->hasMany('SocialAccounts', [
        'foreignKey' => 'user_id',
        'className' => 'CakeDC/Users.SocialAccounts'
      ]);

      $this->hasMany('ApplicantJobLists', [
        'foreignKey' => 'applicant_id'
      ]);

      $this->addBehavior('Sluggable', [
        'field' => 'full_name',
        'implementedFinders' => [
          'slugged' => 'findSlug',
        ]
      ]);
      
      // Add the behaviour and configure any options you want
      $this->addBehavior('Captcha', [
        'field' => 'securitycode',
        'message' => 'Incorrect captcha code value'
      ]);

      // $this->addBehavior('Timestamp', [
      //   'events' => [
      //     'Model.beforeSave' => [
      //       'created' => 'new',
      //       'modified' => 'always'
      //     ]
      //   ]
      // ]);

      $this->addBehavior('Proffer.Proffer', [
        'avatar' => [
          'root' => WWW_ROOT . 'files' . 'avatar',
          'dir' => 'avatar_dir',
          'thumbnailSizes' => [
            'square' => [
              'w' => 200,
              'h' => 200,
              'crop' => true,
              'jpeg_quality'  => 100,
              'png_compression_level' => 9
            ],
            'portrait' => [
              'w' => 85,
              'h' => 113
            ],
          ],
          'thumbnailMethod' => 'imagick'
        ],
        'cv' => [
          'root' => WWW_ROOT . 'files'. 'cv',
          'dir'  => 'cv_dir',
          'thumbnailSizes'  => [
            'square' => [
              'w' => 200,
              'h' => 200,
              'crop' => true,
              'jpeg_quality' => 100,
              'png_compression_level' => 9
            ],
            'portrait' => [
              'w' => 85,
              'h' => 113
            ],
          ],
          'thumbnailMethod' => 'imagick'
        ],
        'certificate' => [
          'root' => WWW_ROOT . 'files' . 'certificate',
          'dir'  => 'cert_dir',
          'thumbnailSizes'  => [
            'square' => [
              'w' => 200,
              'h' => 200,
              'crop' => true,
              'jpeg_quality' => 100,
              'png_compression_level' => 9
            ],
            'portrait' => [
              'w' => 85,
              'h' => 113
            ],
          ],
          'thumbnailMethod' => 'imagick'
        ]
      ]);
    }

    public function validationPasswordConfirm(Validator $validator)
    {
      $validator
        ->requirePresence('password_confirm', 'create')
        ->notEmpty('password_confirm');

      $validator->add('password', 'custom', [
        'rule' => function ($value, $context) {
          $confirm = Hash::get($context, 'data.password_confirm');
          if (!is_null($confirm) && $value != $confirm) {
            return false;
          }
          return true;
        },
        'message' => __d('Users', 'Your password does not match your confirm password. Please try again'),
        'on' => ['create', 'update'],
        'allowEmpty' => false
      ]);

      return $validator;
    }
    
    public function validationDefault(Validator $validator)
    {
      // $validator
      //   ->allowEmpty('id', 'create');

      $validator
        ->requirePresence('password', 'create')
        ->notEmpty('password')
        ->add('password', 'validFormat', [
          'rule' => [
            'custom', 
            '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/', 
            'provider' => 'table'
          ], 
          'message' => '* Your password must be include at least one lowercase letter, one uppercase letter and a number'
          ])
        ->add('password', [
          'length' => [
            'rule' => ['minLength', 8],
              'message' => 'Password need to be 8 characters long',
          ]
        ]);

      $validator
        ->allowEmpty('token');

      $validator
        ->add('token_exp', 'valid', ['rule' => 'date'])
        ->allowEmpty('token_exp');

      $validator
        ->allowEmpty('api_token');

      $validator
        ->add('activate', 'valid', ['rule' => 'date'])
        ->allowEmpty('activate');

      $validator
        ->add('tos_date', 'valid', ['rule' => 'date'])
        ->allowEmpty('tos_date');

      // $validator
      //   ->add('id', 'valid', ['rule' => 'numeric'])
      //   ->allowEmpty('id', 'create');

      $validator
        ->requirePresence('id_card', 'update')
        ->allowEmpty('id_card', 'create')
        ->add('id_card', 'unique', [
          'rule' => 'validateUnique', 
          'provider' => 'table'
        ]);

      $validator
        ->requirePresence('full_name', 'create')
        ->notEmpty('full_name');

      $validator
        ->requirePresence('address', 'update')
        ->allowEmpty('address', 'create');

      $validator
        ->requirePresence('religion', 'update')
        ->allowEmpty('religion', 'create');

      $validator
        ->requirePresence('blood_type', 'update')
        ->allowEmpty('blood_type', 'create')
        ->add('blood_type', 'validValue', [
          'rule' => [
            'inList', array('A', 'AB', 'O', 'B')]
          ]);

      $validator
        ->requirePresence('phone', 'update')
        ->allowEmpty('phone_number', 'create')
        ->add('phone_number', 'validFormat', [
          'rule' => [
            'custom', '/62\d{8}\d/', 
            'provider' => 'table'
          ], 
          'message' => 'Please put phone number correctly'
        ]);

      $validator
        ->requirePresence('gender', 'update')
        ->allowEmpty('gender', 'create')
        ->add('gender', 'validValue', [
          'rule' => [
            'inList', array('m', 'M', 'f', 'F')
          ]
        ]);

      $validator
        ->allowEmpty('birthdate', 'create')
        ->add('birthdate', 'date', [
          'rule' => [
            'date', 'DMY', 'range'=>date('Y')-18, date('Y')-50
          ]
        ]);

      return $validator;

    }

    /**
    * Default validation rules.
    *
    * @param \Cake\Validation\Validator $validator Validator instance.
    * @return \Cake\Validation\Validator
    */
    public function validationRegister(Validator $validator)
    {
      $validator = $this->validationDefault($validator);
      $validator = $this->validationPasswordConfirm($validator);
      return $validator;
    }

    /**
    * Returns a rules checker object that will be used for validating
    * application integrity.
    *
    * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
    * @return \Cake\ORM\RulesChecker
    */
    public function buildRules(RulesChecker $rules)
    {
      if ($this->isValidateEmail) {
        $rules->add($rules->isUnique(['email']), [
          'errorField' => 'email',
          'message' => __d('Users', 'Email already exists')
        ]);
      }

      return $rules;
    }

    public static function defaultConnectionName()
    {
      return 'oracle';
    }
  }