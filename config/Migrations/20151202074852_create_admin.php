<?php
use Migrations\AbstractMigration;

class CreateAdmin extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('admins', ['id' => true, 'primary_key' => ['id']]);        
        $table->addColumn('nik', 'string', ['limit' => 50])
              ->addColumn('company', 'string', ['limit' => 50])
              ->addColumn('phone_number', 'string', ['limit' => 50])
              ->addColumn('name', 'string', ['limit' => 50])
              ->addColumn('email', 'string', ['limit' => 50])
              ->addColumn('branch', 'string', ['limit' => 50])
              ->addColumn('role', 'string', ['limit' => 50])
              ->addColumn('created_by', 'integer', ['null'=>false])
              ->addColumn('creation_date', 'timestamp')
              ->addColumn('last_updated_by', 'integer', ['limit'=>15])
              ->addColumn('last_update_date', 'timestamp')            
              ->create();
    }
}
