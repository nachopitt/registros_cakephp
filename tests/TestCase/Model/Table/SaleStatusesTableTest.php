<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SaleStatusesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SaleStatusesTable Test Case
 */
class SaleStatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SaleStatusesTable
     */
    protected $SaleStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SaleStatuses',
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
        $config = $this->getTableLocator()->exists('SaleStatuses') ? [] : ['className' => SaleStatusesTable::class];
        $this->SaleStatuses = $this->getTableLocator()->get('SaleStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SaleStatuses);

        parent::tearDown();
    }
}
