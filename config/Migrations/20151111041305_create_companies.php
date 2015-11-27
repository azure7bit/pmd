<?php

use Phinx\Migration\AbstractMigration;

class CreateCompanies extends AbstractMigration
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
      $table = $this->table('companies', ['id' => true, 'primary_key' => ['id']]);
      $table->addColumn('company_id', 'integer', ['null' => false, 'limit' => 15])
            ->addColumn('company_name', 'string', ['limit' => 150])
            ->addColumn('remark', 'text')
            ->addColumn('created_by', 'integer', ['null'=>false])
            ->addColumn('creation_date', 'timestamp')
            ->addColumn('last_updated_by', 'integer', ['limit'=>15])
            ->addColumn('last_update_date', 'timestamp')
            ->addIndex('company_id', ['unique'=>1])
            ->create();
    }
}
