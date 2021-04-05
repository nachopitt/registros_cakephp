<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MoneyAccountTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MoneyAccountTypesTable Test Case
 */
class MoneyAccountTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MoneyAccountTypesTable
     */
    protected $MoneyAccountTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MoneyAccountTypes',
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
        $config = $this->getTableLocator()->exists('MoneyAccountTypes') ? [] : ['className' => MoneyAccountTypesTable::class];
        $this->MoneyAccountTypes = $this->getTableLocator()->get('MoneyAccountTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MoneyAccountTypes);

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
