<?php

use Phinx\Migration\AbstractMigration;

class CreateVacancies extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    
    public function change()
    {
      $table = $this->table('vacancies', ['id' => true, 'primary_key' => ['id']]);
      $table->addColumn('vacancy_code', 'string', ['limit' => 50])
            ->addColumn('vacancy_name', 'string', ['limit' => 150])
            ->addColumn('company_id', 'integer', ['null' => false, 'limit' => 15])
            ->addColumn('branch_id', 'integer', ['null' => false, 'limit' => 15])
            ->addColumn('organization_id', 'integer', ['null' => false, 'limit' => 15])
            ->addColumn('job_id', 'integer', ['null' => false, 'limit' => 15])
            ->addColumn('people_category', 'string', ['limit' => 30])
            ->addColumn('employment_category_code', 'string', ['limit' => 30])
            ->addColumn('valid_date_from', 'date', ['null' => false])
            ->addColumn('valid_date_to', 'date', ['null' => false])
            ->addColumn('required_personnel', 'integer', ['limit' => 3, 'null'=>false])
            ->addColumn('vacancy_status_code', 'string', ['limit'=>30, 'null'=>false])
            ->addColumn('remark', 'text')            
            ->addColumn('created_by', 'integer', ['null'=>false])
            ->addColumn('creation_date', 'timestamp')
            ->addColumn('last_updated_by', 'integer', ['limit'=>15])
            ->addColumn('last_update_date', 'timestamp')
            ->addIndex('vacancy_code')
            ->addIndex('company_id')
            ->addIndex('branch_id')
            ->addIndex('organization_id')
            ->addIndex('job_id')
            ->create();
    }
  }
