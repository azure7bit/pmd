<?php
use Migrations\AbstractMigration;

class CreateApplicantFiles extends AbstractMigration
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
      $table = $this->table('erc_files', ['id' => true, 'primary_key' => ['id']]);
      $table->addColumn('asset_name', 'string', ['null'=>false])
            ->addColumn('asset_dir', 'string', ['null'=>false])
            ->addColumn('applicant_id', 'integer', ['null'=>false])
            ->addColumn('asset_type', 'string', ['null'=>false])                        
            ->addColumn('creation_date', 'timestamp')            
            ->addColumn('last_update_date', 'timestamp')
            ->addIndex('applicant_id')
            ->create();
    }
}
