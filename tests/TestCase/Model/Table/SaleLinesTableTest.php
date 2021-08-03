<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SaleLinesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SaleLinesTable Test Case
 */
class SaleLinesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SaleLinesTable
     */
    protected $SaleLines;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SaleLines',
        'app.Sales',
        'app.Products',
        'app.Units',
        'app.Currencies',
        'app.SaleUpdates',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SaleLines') ? [] : ['className' => SaleLinesTable::class];
        $this->SaleLines = $this->getTableLocator()->get('SaleLines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SaleLines);

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
