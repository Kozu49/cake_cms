<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FootballRagistrationsFixture
 */
class FootballRagistrationsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'student_id' => 1,
                'created_to' => '2023-03-30 08:21:30',
                'updated_at' => '2023-03-30 08:21:30',
            ],
        ];
        parent::init();
    }
}
