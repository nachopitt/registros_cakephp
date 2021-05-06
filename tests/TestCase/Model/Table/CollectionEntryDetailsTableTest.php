<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CollectionEntryDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CollectionEntryDetailsTable Test Case
 */
class CollectionEntryDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CollectionEntryDetailsTable
     */
    protected $CollectionEntryDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CollectionEntryDetails',
        'app.CollectionEntries',
        'app.CollectionRegions',
        'app.CollectionConditions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CollectionEntryDetails') ? [] : ['className' => CollectionEntryDetailsTable::class];
        $this->CollectionEntryDetails = $this->getTableLocator()->get('CollectionEntryDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CollectionEntryDetails);

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
