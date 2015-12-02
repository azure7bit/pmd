<?php
use Migrations\AbstractMigration;

class CreateApplicantSkills extends AbstractMigration
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
        $table = $this->table('applicant_skills', ['id' => true, 'primary_key' => ['id']]);
        $table->addColumn('applicant', 'string', ['null'=>false])
              ->addColumn('certification', 'string', ['null'=>false])
              ->addColumn('city', 'string', ['null'=>false])
              ->addColumn('how_long', 'string', ['null'=>false])
              ->addColumn('year', 'date', ['null'=>false])
              ->addColumn('description', 'text', ['null'=>true, 'default'=>null])              
              ->addColumn('created_by', 'integer', ['null'=>true, 'default'=>null])
              ->addColumn('creation_date', 'timestamp')
              ->addColumn('last_updated_by', 'integer', ['null'=>true, 'default'=>null])
              ->addColumn('last_update_date', 'timestamp')
              ->create();
    }
}
