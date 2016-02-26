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
      $this->entityClass('App\Model\Entity\Applicant');
      
      $this->addBehavior('Captcha', [
        'field' => 'captcha',
        'message' => 'Incorrect captcha code value'
      ]);
      // $this->addBehavior('CakeDC/Users.Password');
      // $this->addBehavior('CakeDC/Users.Social');
      
      // $this->hasMany('SocialAccounts', [
      //   'foreignKey' => 'user_id',
      //   'className' => 'CakeDC/Users.SocialAccounts'
      // ]);

      $this->hasMany('ApplicantJobLists', [
        'foreignKey' => 'applicant_id'
      ]);

      $this->hasMany('ApplicantEducations', [
        'foreignKey' => 'applicant_id'
      ]);

      $this->addBehavior('Sluggable', [
        'field' => 'full_name',
        'implementedFinders' => [
          'slugged' => 'findSlug',
        ]
      ]);
      
      $this->addBehavior('Timestamp', [
        'events' => [
          'Model.beforeSave' => [
            'creation_date' => 'new',
            'last_update_date' => 'always'
          ]
        ]
      ]);

      $this->addBehavior('Proffer.Proffer', [
        'avatar' => [
          'root' => WWW_ROOT . 'files' . 'AVATAR',
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
          ]
        ],
        'CV' => [
          'root' => WWW_ROOT . 'files'. 'CV',
          'dir'  => 'CV_DIR',
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
        'CERTIFICATE' => [
          'root' => WWW_ROOT . 'files' . 'CERTIFICATE',
          'dir'  => 'CERT_DIR',
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
        ->requirePresence('password_confirmation', 'create')
        ->notEmpty('password_confirmation');

      $validator->add('password', 'custom', [
        'rule' => function ($value, $context) {
          $confirm = Hash::get($context, 'data.password_confirmation');
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
      $validator
        ->add('id', 'valid', ['rule' => 'numeric'])
        ->allowEmpty('id', 'create');

      // $validator
      //   ->allowEmpty('id_card', 'create')
      //   ->add('id_card', 'unique', [
      //     'rule' => 'validateUnique', 
      //     'provider' => 'table'
      //   ]);
        
      $validator
        ->requirePresence('full_name', 'create')
        ->notEmpty('full_name');

      $validator
        ->requirePresence('email');

      $validator
        ->requirePresence('password', 'create')
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

      // $validator
      //   ->allowEmpty('current_address', 'create');

      // $validator
      //   ->allowEmpty('religion', 'create');

      // $validator
      //   ->requirePresence('domicile', 'update')
      //   ->allowEmpty('domicile', 'create');

      $validator
        ->allowEmpty('handphone')
        ->add('handphone', 'validFormat', [
          'rule' => [
            'custom', '/62\d{8}\d/', 
            'provider' => 'table'
          ], 
          'message' => 'Please put phone number correctly'
        ]);

      // $validator
      //   ->allowEmpty('gender', 'create')
      //   ->add('gender', 'validValue', [
      //     'rule' => [
      //       'inList', array('m', 'M', 'f', 'F')
      //     ]
      //   ]);

      $validator
        ->allowEmpty('avatar');

      // $validator
      //   ->allowEmpty('blood_type', 'create')
      //   ->add('blood_type', 'validValue', [
      //     'rule' => [
      //       'inList', array('A', 'AB', 'O', 'B')]
      //     ]);

      // $validator
      //   ->allowEmpty('friend', 'create');

      // $validator
      //   ->allowEmpty('located', 'create');

      // $validator
      //   ->allowEmpty('business', 'create');

      // $validator
      //   ->requirePresence('activate')
      //   ->add('activate', 'validValue', [
      //     'rule' => [
      //       'inList', array('true', 'false')]
      //     ]);

     //  $validator
     //    ->allowEmpty('token');

     //  $validator
     //    ->allowEmpty('token_exp');

     // $validator
     //    ->allowEmpty('activation_date');

      // $validator
      //   ->add('tos_date', 'valid')
      //   ->allowEmpty('tos_date');

      // $validator
      //   ->allowEmpty('birthdate', 'create');

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
      return 'erc';
    }
  }