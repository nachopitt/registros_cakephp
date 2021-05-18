<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PurchaseLinesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PurchaseLinesTable Test Case
 */
class PurchaseLinesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PurchaseLinesTable
     */
    protected $PurchaseLines;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PurchaseLines',
        'app.PurchaseUpdates',
        'app.Products',
        'app.Units',
        'app.Currencies',
        'app.Shipments',
        'app.Sellers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PurchaseLines') ? [] : ['className' => PurchaseLinesTable::class];
        $this->PurchaseLines = $this->getTableLocator()->get('PurchaseLines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PurchaseLines);

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
