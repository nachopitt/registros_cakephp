<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatalogEntriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatalogEntriesTable Test Case
 */
class CatalogEntriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CatalogEntriesTable
     */
    protected $CatalogEntries;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('CatalogEntries') ? [] : ['className' => CatalogEntriesTable::class];
        $this->CatalogEntries = $this->getTableLocator()->get('CatalogEntries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CatalogEntries);

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
}
