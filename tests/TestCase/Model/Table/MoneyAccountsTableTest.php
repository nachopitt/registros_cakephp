<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MoneyAccountsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MoneyAccountsTable Test Case
 */
class MoneyAccountsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MoneyAccountsTable
     */
    protected $MoneyAccounts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MoneyAccounts',
        'app.MoneyAccountTypes',
        'app.Transactions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MoneyAccounts') ? [] : ['className' => MoneyAccountsTable::class];
        $this->MoneyAccounts = $this->getTableLocator()->get('MoneyAccounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MoneyAccounts);

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
