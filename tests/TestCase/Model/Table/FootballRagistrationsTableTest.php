<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FootballRagistrationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FootballRagistrationsTable Test Case
 */
class FootballRagistrationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FootballRagistrationsTable
     */
    protected $FootballRagistrations;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.FootballRagistrations',
        'app.Students',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('FootballRagistrations') ? [] : ['className' => FootballRagistrationsTable::class];
        $this->FootballRagistrations = $this->getTableLocator()->get('FootballRagistrations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->FootballRagistrations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FootballRagistrationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FootballRagistrationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
