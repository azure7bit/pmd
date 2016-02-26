<?php
namespace App\Model\Table;

use App\Model\Entity\Company;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Companies Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Companies
 * @property \Cake\ORM\Association\HasMany $Companies
 * @property \Cake\ORM\Association\HasMany $Vacancies
 */
class CompaniesTable extends Table
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

        $this->table('HCMS_COMPANIES');
        // $this->alias('HCMS_COMPANIES');
        // $this->registryAlias('HCMS_COMPANIES');
        $this->displayField('id');
        $this->primaryKey('COMPANY_ID');
        $this->entityClass('App\Model\Entity\Company');
        $this->hasMany('Vacancies', [
            'foreignKey' => 'COMPANY_ID'
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
            ->add('COMPANY_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('COMPANY_ID', 'create');

        // $validator
        //     ->requirePresence('COMPANY_NAME', 'create')
        //     ->notEmpty('COMPANY_NAME');

        // $validator
        //     ->requirePresence('remark', 'create')
        //     ->notEmpty('remark');

        // $validator
        //     ->add('created_by', 'valid', ['rule' => 'numeric'])
        //     ->requirePresence('created_by', 'create')
        //     ->notEmpty('created_by');

        // $validator
        //     ->requirePresence('creation_date', 'create')
        //     ->notEmpty('creation_date');

        // $validator
        //     ->add('last_updated_by', 'valid', ['rule' => 'numeric'])
        //     ->requirePresence('last_updated_by', 'create')
        //     ->notEmpty('last_updated_by');

        // $validator
        //     ->requirePresence('last_update_date', 'create')
        //     ->notEmpty('last_update_date');

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
        $rules->add($rules->existsIn(['COMPANY_ID'], 'HCMS_COMPANIES'));
        return $rules;
    }

    public static function defaultConnectionName()
    {
      return 'hcms';
    }
}
