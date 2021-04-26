<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SaleUpdatesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SaleUpdatesTable Test Case
 */
class SaleUpdatesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SaleUpdatesTable
     */
    protected $SaleUpdates;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SaleUpdates',
        'app.Sales',
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
        $config = $this->getTableLocator()->exists('SaleUpdates') ? [] : ['className' => SaleUpdatesTable::class];
        $this->SaleUpdates = $this->getTableLocator()->get('SaleUpdates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SaleUpdates);

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
