<?php
use Migrations\AbstractMigration;

class CreateApplicantOrganizations extends AbstractMigration
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
        $table = $this->table('applicant_organizations', ['id' => true, 'primary_key' => ['id']]);
        $table->addColumn('institution', 'string', ['null'=>false])
              ->addColumn('position', 'string', ['null'=>false])
              ->addColumn('start', 'date', ['null'=>false])
              ->addColumn('end', 'date', ['null'=>false])
              ->addColumn('created_by', 'integer')
              ->addColumn('creation_date', 'timestamp')
              ->addColumn('last_updated_by', 'integer')
              ->addColumn('last_update_date', 'timestamp')
              ->create();
    }
}
