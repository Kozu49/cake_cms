<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PicnicRagistrationsFixture
 */
class PicnicRagistrationsFixture extends TestFixture
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
                'amount' => 1.5,
                'created_at' => '2023-03-30 08:21:41',
                'updated_at' => '2023-03-30 08:21:41',
            ],
        ];
        parent::init();
    }
}
