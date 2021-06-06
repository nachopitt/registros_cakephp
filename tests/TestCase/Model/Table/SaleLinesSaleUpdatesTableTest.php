<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SaleLinesSaleUpdatesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SaleLinesSaleUpdatesTable Test Case
 */
class SaleLinesSaleUpdatesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SaleLinesSaleUpdatesTable
     */
    protected $SaleLinesSaleUpdates;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SaleLinesSaleUpdates',
        'app.SaleLines',
        'app.SaleUpdates',
        'app.Shipments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SaleLinesSaleUpdates') ? [] : ['className' => SaleLinesSaleUpdatesTable::class];
        $this->SaleLinesSaleUpdates = $this->getTableLocator()->get('SaleLinesSaleUpdates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SaleLinesSaleUpdates);

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
