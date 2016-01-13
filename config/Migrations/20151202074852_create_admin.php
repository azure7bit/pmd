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
      $table = $this->table('erc_users', ['id' => true, 'primary_key' => ['id']]);        
      $table->addColumn('nik', 'string', ['null'=>true, 'limit' => 50])
            ->addColumn('full_name', 'string', ['null'=>true,'limit' => 50])
            ->addColumn('email', 'string', ['limit' => 50])
            ->addColumn('password', 'string', ['null' => true])
            ->addColumn('avatar', 'string', ['null' => true])
            ->addColumn('avatar_dir', 'string', ['null' => true])
            ->addColumn('phone_number', 'string', ['null'=>true,'limit' => 50])
            ->addColumn('token', 'string', ['default' => null, 'limit' => 255, 'null' => true,])
            ->addColumn('token_expires', 'datetime', ['default' => null, 'limit' => null, 'null' => true,])
            ->addColumn('api_token', 'string', ['default' => null, 'limit' => 255, 'null' => true,])
            ->addColumn('activation_date', 'datetime', ['default' => null, 'limit' => null, 'null' => true,])
            ->addColumn('tos_date', 'datetime', ['default' => null, 'limit' => null, 'null' => true,])
            ->addColumn('active', 'boolean', ['null' => false, 'default' => false])
            ->addColumn('slug', 'string', ['null' => false])
            ->addColumn('company_id', 'integer', ['null'=>true])
            ->addColumn('branch_id', 'integer', ['null'=>true])
            ->addColumn('is_superuser', 'boolean', ['null' => false, 'default' => false])
            ->addColumn('created_by', 'integer', ['null'=>true])
            ->addColumn('created_at', 'timestamp')
            ->addColumn('updated_at', 'timestamp')
            ->addColumn('last_updated_by', 'integer', ['null' => true, 'limit'=>15])
            ->addIndex('slug',['unique'=>1])
            ->addIndex('company_id')
            ->addIndex('branch_id')
            ->addIndex('email',['unique'=>1])
            ->addIndex('nik',['unique'=>1])
            ->create();
    }
  }
