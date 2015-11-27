<?php
use Migrations\AbstractMigration;

class UpdateApplicant extends AbstractMigration
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
        $table = $this->table('applicants', ['id' => true, 'primary_key' => ['id']]);
        $table
        ->addColumn('domicile', 'string', ['limit'=>50, 'null'=>true, 'default'=>null])
        ->addColumn('nick_name', 'string', ['limit'=>50, 'null'=>true, 'default'=>null])
        ->addColumn('martial_status', 'string', ['limit'=>50, 'null'=>true, 'default'=>null])
        ->addColumn('education', 'string', ['limit'=>50, 'null'=>true, 'default'=>null])
        ->addColumn('skill', 'string', ['limit'=>50, 'null'=>true, 'default'=>null])

        ->update();
    }
}
