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
class AboutsTable extends Table
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

    $this->table('ERC_ABOUTS');
    $this->displayField('id');
    $this->primaryKey('id');
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

    // $validator
    //   ->add('CREATED_BY', 'valid', ['rule' => 'numeric'])
    //   ->requirePresence('CREATED_BY', 'create')
    //   ->notEmpty('CREATED_BY');

    // $validator
    //   ->requirePresence('CREATED_DATE', 'create')
    //   ->notEmpty('CREATED_DATE');

    // $validator
    //   ->add('UPDATED_BY', 'valid', ['rule' => 'numeric'])
    //   ->requirePresence('UPDATED_BY', 'create')
    //   ->notEmpty('UPDATED_BY');

    // $validator
    //   ->requirePresence('UPDATED_DATE', 'create')
    //   ->notEmpty('UPDATED_DATE');

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
    // $rules->add($rules->existsIn(['job_id'], 'Jobs'));
    return $rules;
  }
}
