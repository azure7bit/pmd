<?php
use Migrations\AbstractMigration;

class Create extends AbstractMigration
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
        $table = $this->table('erc_abouts', ['ID' => true, 'primary_key' => ['ID']]);
        $table->addColumn('TITLE', 'integer', ['null'=>false])
              ->addColumn('CONTENT', 'string', ['null'=>false])
              ->addColumn('CREATED_BY', 'integer', ['null'=>true])
              ->addColumn('CREATED_DATE', 'date', ['null'=>true])
              ->addColumn('UPDATED_BY', 'integer', ['null'=>true])
              ->addColumn('UPDATED_DATE', 'date', ['null'=>true])
              ->create();
    }
}
