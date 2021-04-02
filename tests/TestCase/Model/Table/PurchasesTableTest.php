<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PurchasesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PurchasesTable Test Case
 */
class PurchasesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PurchasesTable
     */
    protected $Purchases;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Purchases',
        'app.Merchants',
        'app.Sellers',
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
        $config = $this->getTableLocator()->exists('Purchases') ? [] : ['className' => PurchasesTable::class];
        $this->Purchases = $this->getTableLocator()->get('Purchases', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Purchases);

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
