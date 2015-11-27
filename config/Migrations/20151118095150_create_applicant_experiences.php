<?php
use Migrations\AbstractMigration;

class CreateApplicantExperiences extends AbstractMigration
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
        $table = $this->table('applicant_experiences', ['id' => true, 'primary_key' => ['id']]);
        $table->addColumn('company', 'string', ['null'=>false])
              ->addColumn('position', 'string', ['null'=>false])
              ->addColumn('reason', 'string', ['null'=>false])
              ->addColumn('salary', 'decimal', ['null'=>false, 'precision' => 2])
              ->addColumn('start', 'date', ['null'=>false])
              ->addColumn('end', 'date', ['null'=>false])
              ->addColumn('created_by', 'integer')
              ->addColumn('creation_date', 'timestamp')
              ->addColumn('last_updated_by', 'integer')
              ->addColumn('last_update_date', 'timestamp')
              ->create();
    }
}
