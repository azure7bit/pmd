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
              ->addColumn('slug', 'string', ['null' => false])
              ->addColumn('active', 'boolean', ['null' => false, 'default' => false])
              ->addColumn('is_superuser', 'boolean', ['null' => false, 'default' => false])
              ->addColumn('token', 'string', ['default' => null, 'limit' => 255, 'null' => true,])
              ->addColumn('token_expires', 'datetime', ['default' => null, 'limit' => null, 'null' => true,])
              ->addColumn('api_token', 'string', ['default' => null, 'limit' => 255, 'null' => true,])
              ->addColumn('activation_date', 'datetime', ['default' => null, 'limit' => null, 'null' => true,])
              ->addColumn('tos_date', 'datetime', ['default' => null, 'limit' => null, 'null' => true,])
              ->addColumn('created_by', 'integer', ['null'=>false])
              ->addColumn('creation_date', 'timestamp')
              ->addColumn('last_updated_by', 'integer', ['limit'=>15])
              ->addColumn('last_update_date', 'timestamp')            
              ->create();
    }
}
