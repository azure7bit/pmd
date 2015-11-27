<?php
use Migrations\AbstractMigration;

class RemoveAvatarFromApplicant extends AbstractMigration
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
        $table = $this->table('applicants');
        $table->removeColumn('avatar');
        $table->removeColumn('avatar_dir');
        $table->update();
    }
}
