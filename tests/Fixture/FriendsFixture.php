<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FriendsFixture
 */
class FriendsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit a',
                'amount' => 1,
                'city' => 'Lorem ipsum dolor ',
                'created' => '2023-04-10 05:04:27',
            ],
        ];
        parent::init();
    }
}
