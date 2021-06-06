<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PurchaseLinesPurchaseUpdatesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PurchaseLinesPurchaseUpdatesTable Test Case
 */
class PurchaseLinesPurchaseUpdatesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PurchaseLinesPurchaseUpdatesTable
     */
    protected $PurchaseLinesPurchaseUpdates;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PurchaseLinesPurchaseUpdates',
        'app.PurchaseLines',
        'app.PurchaseUpdates',
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
        $config = $this->getTableLocator()->exists('PurchaseLinesPurchaseUpdates') ? [] : ['className' => PurchaseLinesPurchaseUpdatesTable::class];
        $this->PurchaseLinesPurchaseUpdates = $this->getTableLocator()->get('PurchaseLinesPurchaseUpdates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PurchaseLinesPurchaseUpdates);

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
