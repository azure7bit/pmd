<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

namespace CakeDC\Users\Model\Table;

use CakeDC\Users\Exception\WrongPasswordException;
use CakeDC\Users\Model\Entity\User;
use Cake\Datasource\EntityInterface;
use Cake\Mailer\Email;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Hash;
use Cake\Validation\Validator;

/**
 * Users Model
 */
class UsersTable extends Table
{

    /**
     * Flag to set email check in buildRules or not
     *
     * @var bool
     */
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

      $this->table('users');
      $this->displayField('id');
      $this->primaryKey('id');
      $this->addBehavior('Timestamp');
      $this->addBehavior('CakeDC/Users.Register');
      $this->addBehavior('CakeDC/Users.Password');
      $this->addBehavior('CakeDC/Users.Social');
      $this->hasMany('SocialAccounts', [
        'foreignKey' => 'user_id',
        'className' => 'CakeDC/Users.SocialAccounts'
        ]);
    }

    /**
     * Adds some rules for password confirm
     * @param Validator $validator Cake validator object.
     * @return Validator
     */
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

    /**
     * Default validation rules.
     *
     * @param Validator $validator Validator instance.
     * @return Validator
     */
    // public function validationDefault(Validator $validator)
    // {
    //   $validator
    //   ->allowEmpty('id', 'create');

    //   $validator
    //   ->allowEmpty('username');

    //   $validator
    //   ->requirePresence('password', 'create')
    //   ->notEmpty('password');

    //   $validator
    //   ->allowEmpty('first_name');

    //   $validator
    //   ->allowEmpty('last_name');

    //   $validator
    //   ->allowEmpty('token');

    //   $validator
    //   ->add('token_expires', 'valid', ['rule' => 'date'])
    //   ->allowEmpty('token_expires');

    //   $validator
    //   ->allowEmpty('api_token');

    //   $validator
    //   ->add('activation_date', 'valid')
    //   ->allowEmpty('activation_date');

    //   $validator
    //   ->add('tos_date', 'valid', ['rule' => 'date'])
    //   ->allowEmpty('tos_date');

    //   return $validator;
    // }

    /**
     * Wrapper for all validation rules for register
     * @param Validator $validator Cake validator object.
     *
     * @return Validator
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
     * @param RulesChecker $rules The rules object to be modified.
     * @return RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
      $rules->add($rules->isUnique(['username']), [
        'errorField' => 'username',
        'message' => __d('Users', 'Username already exists')
        ]);

      if ($this->isValidateEmail) {
        $rules->add($rules->isUnique(['email']), [
          'errorField' => 'email',
          'message' => __d('Users', 'Email already exists')
          ]);
      }

      return $rules;
    }
  }
