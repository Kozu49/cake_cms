<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FriendsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FriendsTable Test Case
 */
class FriendsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FriendsTable
     */
    protected $Friends;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Friends',
        'app.Spouses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Friends') ? [] : ['className' => FriendsTable::class];
        $this->Friends = $this->getTableLocator()->get('Friends', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Friends);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FriendsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
