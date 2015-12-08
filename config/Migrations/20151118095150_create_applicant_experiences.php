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
        $table->addColumn('applicant_id', 'integer', ['null'=>false])
              ->addColumn('company', 'string', ['null'=>false])
              ->addColumn('position', 'string', ['null'=>false])
              ->addColumn('reason', 'string', ['null'=>false])              
              ->addColumn('creation_date', 'timestamp')
              ->addColumn('last_update_date', 'timestamp')
              ->addIndex('applicant_id')
              ->create();
    }
}
