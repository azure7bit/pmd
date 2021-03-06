<?php
  namespace App\Model\Table;

  use App\Model\Entity\Vacancy;
  use Cake\ORM\Query;
  use Cake\ORM\RulesChecker;
  use Cake\ORM\Table;
  use Cake\Validation\Validator;

  /**
   * Vacancies Model
   *
   * @property \Cake\ORM\Association\BelongsTo $Vacancies
   * @property \Cake\ORM\Association\BelongsTo $Companies
   * @property \Cake\ORM\Association\BelongsTo $Branches
   * @property \Cake\ORM\Association\BelongsTo $Organizations
   * @property \Cake\ORM\Association\BelongsTo $Jobs
   * @property \Cake\ORM\Association\BelongsTo $ProcessVersions
   * @property \Cake\ORM\Association\HasMany $Vacancies
   */
  class VacanciesTable extends Table
  {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
      public function initialize(array $config)
      {
        parent::initialize($config);

        $this->table('HCMS_VACANCIES');
        $this->displayField('id');
        $this->primaryKey('VACANCY_ID');

        $this->belongsTo('Companies', [
          'foreignKey' => 'COMPANY_ID',
          'joinType' => 'INNER'
        ]);
        $this->belongsTo('Branches', [
          'foreignKey' => 'BRANCH_ID',
          'joinType' => 'INNER'
        ]);
        $this->belongsTo('Organizations', [
          'foreignKey' => 'ORGANIZATION_ID',
          'joinType' => 'INNER'
        ]);
        $this->belongsTo('Jobs', [
          'foreignKey' => 'JOB_ID',
          'joinType' => 'INNER'
        ]);
        $this->belongsTo('WosJobs', [
          'foreignKey' => 'JOB_ID',
          'joinType' => 'INNER'
        ]);

      }

      /**
       * Default validation rules.
       *
       * @param \Cake\Validation\Validator $validator Validator instance.
       * @return \Cake\Validation\Validator
       */
      public function validationDefault(Validator $validator)
      {
        $validator
          ->add('id', 'valid', ['rule' => 'numeric'])
          ->allowEmpty('id', 'create');

        $validator
          ->requirePresence('vacancy_code', 'create')
          ->notEmpty('vacancy_code');

        $validator
          ->requirePresence('vacancy_name', 'create')
          ->notEmpty('vacancy_name');

        $validator
          ->requirePresence('people_category_code', 'create')
          ->notEmpty('people_category_code');

        $validator
          ->requirePresence('employment_category_code', 'create')
          ->notEmpty('employment_category_code');

        $validator
          ->add('valid_date_from', 'valid', ['rule' => 'date'])
          ->requirePresence('valid_date_from', 'create')
          ->notEmpty('valid_date_from');

        $validator
          ->add('valid_date_to', 'valid', ['rule' => 'date'])
          ->requirePresence('valid_date_to', 'create')
          ->notEmpty('valid_date_to');

        $validator
          ->add('required_personnel', 'valid', ['rule' => 'numeric'])
          ->requirePresence('required_personnel', 'create')
          ->notEmpty('required_personnel');

        $validator
          ->requirePresence('vacancy_status_code', 'create')
          ->notEmpty('vacancy_status_code');

        $validator
          ->requirePresence('remark', 'create')
          ->notEmpty('remark');

        $validator
          ->add('created_by', 'valid', ['rule' => 'numeric'])
          ->requirePresence('created_by', 'create')
          ->notEmpty('created_by');

        $validator
          ->requirePresence('creation_date', 'create')
          ->notEmpty('creation_date');

        $validator
          ->add('last_updated_by', 'valid', ['rule' => 'numeric'])
          ->requirePresence('last_updated_by', 'create')
          ->notEmpty('last_updated_by');

        $validator
          ->requirePresence('last_update_date', 'create')
          ->notEmpty('last_update_date');

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
        $rules->add($rules->existsIn(['VACANCY_ID'], 'Vacancies'));
        $rules->add($rules->existsIn(['COMPANY_ID'], 'Companies'));
        $rules->add($rules->existsIn(['BRANCH_ID'], 'Branches'));
        $rules->add($rules->existsIn(['ORGANIZATION_ID'], 'Organizations'));
        $rules->add($rules->existsIn(['JOB_ID'], 'Jobs'));
        return $rules;
      }

      public static function defaultConnectionName()
      {
        return 'hcms';
      }
  }