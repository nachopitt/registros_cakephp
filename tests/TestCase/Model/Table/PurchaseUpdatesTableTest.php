<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PurchaseUpdatesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PurchaseUpdatesTable Test Case
 */
class PurchaseUpdatesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PurchaseUpdatesTable
     */
    protected $PurchaseUpdates;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PurchaseUpdates',
        'app.Purchases',
        'app.Shipments',
        'app.PurchaseLines',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PurchaseUpdates') ? [] : ['className' => PurchaseUpdatesTable::class];
        $this->PurchaseUpdates = $this->getTableLocator()->get('PurchaseUpdates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PurchaseUpdates);

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
