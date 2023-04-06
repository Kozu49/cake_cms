<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUserLogs extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('user_logs');
        $table->addColumn('user_id', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('ip', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
