<?php
use Migrations\AbstractMigration;

class RemoveFieldApplicants extends AbstractMigration
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
      $applicant_table = $this->table('applicants', ['id' => true, 'primary_key' => ['id']]);
      $applicant_table->removeColumn('education')
                    ->removeColumn('skill')
                    ->update();

     $applicant_asset = $this->table('applicant_assets', ['id' => true, 'primary_key' => ['id']]);
     $applicant_asset->addColumn('applicant_id', 'integer', ['null'=>false])
                    ->addIndex('applicant_id')
                    ->update();

     $applicant_education = $this->table('applicant_educations', ['id' => true, 'primary_key' => ['id']]);
     $applicant_education->addColumn('applicant_id', 'integer', ['null'=>false])
                    ->addIndex('applicant_id')
                    ->update();

     $applicant_organization = $this->table('applicant_organizations', ['id' => true, 'primary_key' => ['id']]);
     $applicant_organization->addColumn('applicant_id', 'integer', ['null'=>false])
                    ->addIndex('applicant_id')
                    ->update();

     $applicant_experience = $this->table('applicant_experiences', ['id' => true, 'primary_key' => ['id']]);
     $applicant_experience->addColumn('applicant_id', 'integer', ['null'=>false])
                    ->addIndex('applicant_id')
                    ->update();

     $applicant_skill = $this->table('applicant_skills', ['id' => true, 'primary_key' => ['id']]);
     $applicant_skill->addColumn('applicant_id', 'integer', ['null'=>false])
                    ->addIndex('applicant_id')
                    ->update();

    }
}
