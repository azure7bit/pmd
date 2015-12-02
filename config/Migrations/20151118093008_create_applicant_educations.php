<?php
use Migrations\AbstractMigration;

class CreateApplicantEducations extends AbstractMigration
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
        $table = $this->table('applicant_educations', ['id' => true, 'primary_key' => ['id']]);
        $table->addColumn('applicant', 'string', ['null'=>false])
              ->addColumn('level', 'string', ['null'=>false])
              ->addColumn('institution', 'string', ['null'=>false])
              ->addColumn('city', 'string', ['null'=>false])
              ->addColumn('major', 'string', ['null'=>false])
              ->addColumn('start', 'date', ['null'=>false])
              ->addColumn('end', 'date', ['null'=>false])
              ->addColumn('ipk', 'decimal', ['null'=>false])
              ->addColumn('gpa', 'decimal', ['null'=>false])
              ->addColumn('created_by', 'integer')
              ->addColumn('creation_date', 'timestamp')
              ->addColumn('last_updated_by', 'integer')
              ->addColumn('last_update_date', 'timestamp')
              ->create();
    }
}
