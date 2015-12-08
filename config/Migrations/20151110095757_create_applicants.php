<?php

use Phinx\Migration\AbstractMigration;

class CreateApplicants extends AbstractMigration
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
    $table = $this->table('applicants', ['id' => true, 'primary_key' => ['id']]);
    $table->addColumn('id_card', 'string', ['null'=>true, 'default'=>null])
      ->addColumn('full_name', 'string', ['limit'=>50, 'null'=>false])
      ->addColumn('email', 'string', ['limit'=>50, 'null'=>false])
      ->addColumn('password', 'string', ['null'=>false])      
      ->addColumn('address', 'text', ['null'=>true])
      ->addColumn('avatar', 'string', ['null'=>true])
      ->addColumn('avatar_dir', 'string', ['null'=>true])
      ->addColumn('religion', 'string',['limit'=>20, 'null'=>true])
      ->addColumn('domicile', 'string',['null'=>true])
      ->addColumn('phone_number', 'string', ['limit'=>20, 'null'=>true])
      ->addColumn('gender', 'string', ['limit'=>6, 'null'=>true])      
      ->addColumn('blood_type', 'string', ['limit'=>2, 'null'=>true])  
      ->addColumn('place_of_birth', 'string', ['null'=>true])
      ->addColumn('birthdate','date', ['null'=>true, 'default'=>null])
      ->addColumn('job_id', 'integer', ['null'=>true])
      ->addColumn('have_friend', 'string', ['null'=>true])
      ->addColumn('located_all', 'boolean', ['null'=>true, 'default'=>false])
      ->addColumn('business_trip', 'boolean', ['null'=>true, 'default'=>false])
      ->addColumn('slug', 'string', ['null' => false])
      ->addColumn('active', 'boolean', ['null' => false, 'default' => false])
      ->addColumn('token', 'string', ['default' => null, 'limit' => 255, 'null' => true,])
      ->addColumn('token_expires', 'datetime', ['default' => null, 'limit' => null, 'null' => true,])
      ->addColumn('api_token', 'string', ['default' => null, 'limit' => 255, 'null' => true,])
      ->addColumn('activation_date', 'datetime', ['default' => null, 'limit' => null, 'null' => true,])
      ->addColumn('tos_date', 'datetime', ['default' => null, 'limit' => null, 'null' => true,])
      ->addColumn('created', 'datetime', ['default' => null, 'limit' => null, 'null' => false,])
      ->addColumn('modified', 'datetime', ['default' => null, 'limit' => null, 'null' => false,])
      ->addIndex('slug',['unique'=>1])
      ->addIndex('email',['unique'=>1])
      ->addIndex('job_id', ['unique'=>1])
      ->create();
  }
}