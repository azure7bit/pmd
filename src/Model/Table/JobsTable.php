<?php
namespace App\Model\Table;

use App\Model\Entity\Job;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jobs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Jobs
 * @property \Cake\ORM\Association\HasMany $ApplicantJobLists
 * @property \Cake\ORM\Association\HasMany $Jobs
 * @property \Cake\ORM\Association\HasMany $Vacancies
 */
class JobsTable extends Table
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

        $this->table('jobs');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ApplicantJobLists', [
            'foreignKey' => 'job_id'
        ]);
        $this->hasMany('Jobs', [
            'foreignKey' => 'job_id'
        ]);
        $this->hasMany('Vacancies', [
            'foreignKey' => 'job_id'
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
            ->requirePresence('job_name', 'create')
            ->notEmpty('job_name');

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
        $rules->add($rules->existsIn(['job_id'], 'Jobs'));
        return $rules;
    }
}
