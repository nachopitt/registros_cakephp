<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CollectionEntriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CollectionEntriesTable Test Case
 */
class CollectionEntriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CollectionEntriesTable
     */
    protected $CollectionEntries;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CollectionEntries',
        'app.Products',
        'app.Collections',
        'app.CollectionSeries',
        'app.CollectionEntryDetails',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CollectionEntries') ? [] : ['className' => CollectionEntriesTable::class];
        $this->CollectionEntries = $this->getTableLocator()->get('CollectionEntries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CollectionEntries);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
