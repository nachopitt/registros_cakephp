<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MoneyMovementsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MoneyMovementsTable Test Case
 */
class MoneyMovementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MoneyMovementsTable
     */
    protected $MoneyMovements;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MoneyMovements',
        'app.Units',
        'app.Currencies',
        'app.PaymentMethods',
        'app.PurchaseLines',
        'app.SaleLines',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MoneyMovements') ? [] : ['className' => MoneyMovementsTable::class];
        $this->MoneyMovements = $this->getTableLocator()->get('MoneyMovements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MoneyMovements);

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
