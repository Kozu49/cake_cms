<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PicnicRagistrationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PicnicRagistrationsTable Test Case
 */
class PicnicRagistrationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PicnicRagistrationsTable
     */
    protected $PicnicRagistrations;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.PicnicRagistrations',
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
        $config = $this->getTableLocator()->exists('PicnicRagistrations') ? [] : ['className' => PicnicRagistrationsTable::class];
        $this->PicnicRagistrations = $this->getTableLocator()->get('PicnicRagistrations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PicnicRagistrations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PicnicRagistrationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PicnicRagistrationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
