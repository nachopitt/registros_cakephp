<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransactionTriggersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransactionTriggersTable Test Case
 */
class TransactionTriggersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TransactionTriggersTable
     */
    protected $TransactionTriggers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TransactionTriggers',
        'app.Purchases',
        'app.Sales',
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
        $config = $this->getTableLocator()->exists('TransactionTriggers') ? [] : ['className' => TransactionTriggersTable::class];
        $this->TransactionTriggers = $this->getTableLocator()->get('TransactionTriggers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TransactionTriggers);

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
