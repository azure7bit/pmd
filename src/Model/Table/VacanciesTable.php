<?php
namespace App\Model\Table;

use App\Model\Entity\Vacancy;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class VacanciesTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('vacancies');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Vacancies', [
            'foreignKey' => 'vacancy_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Organizations', [
            'foreignKey' => 'organization_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id',
            'joinType' => 'INNER'
        ]);

    }

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
            ->add('creation_date', 'valid', ['rule' => 'date'])
            ->requirePresence('creation_date', 'create')
            ->notEmpty('creation_date');

        $validator
            ->add('last_updated_by', 'valid', ['rule' => 'numeric'])
            ->requirePresence('last_updated_by', 'create')
            ->notEmpty('last_updated_by');

        $validator
            ->add('last_update_date', 'valid', ['rule' => 'date'])
            ->requirePresence('last_update_date', 'create')
            ->notEmpty('last_update_date');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['company_id'], 'Companies'));
        $rules->add($rules->existsIn(['branch_id'], 'Branches'));
        $rules->add($rules->existsIn(['organization_id'], 'Organizations'));
        $rules->add($rules->existsIn(['job_id'], 'Jobs'));
        return $rules;
    }
}
