<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatalogEntriesTagsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatalogEntriesTagsTable Test Case
 */
class CatalogEntriesTagsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CatalogEntriesTagsTable
     */
    protected $CatalogEntriesTags;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CatalogEntriesTags',
        'app.CatalogEntries',
        'app.Tags',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CatalogEntriesTags') ? [] : ['className' => CatalogEntriesTagsTable::class];
        $this->CatalogEntriesTags = $this->getTableLocator()->get('CatalogEntriesTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CatalogEntriesTags);

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
