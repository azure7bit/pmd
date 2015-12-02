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
      $table = $this->table('applicant_files', ['id' => true, 'primary_key' => ['id']]);
      $table->addColumn('asset_name', 'string', ['null'=>false])
            ->addColumn('asset_dir', 'string', ['null'=>false])
            ->addColumn('applicant', 'string', ['null'=>false])
            ->addColumn('asset_type', 'string', ['null'=>false])
            ->addColumn('certificated', 'string', ['null'=>false])
            ->addColumn('certificated_dir', 'string', ['null'=>false])
            ->addColumn('transcript', 'string', ['null'=>false])
            ->addColumn('transcript_dir', 'string', ['null'=>false])
            ->addColumn('resume', 'string', ['null'=>false])
            ->addColumn('resume_dir', 'string', ['null'=>false])
            ->addColumn('created_by', 'integer')
            ->addColumn('creation_date', 'timestamp')
            ->addColumn('last_updated_by', 'integer')
            ->addColumn('last_update_date', 'timestamp')
            ->create();
    }
}
