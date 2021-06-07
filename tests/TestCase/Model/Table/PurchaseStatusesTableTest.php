<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PurchaseStatusesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PurchaseStatusesTable Test Case
 */
class PurchaseStatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PurchaseStatusesTable
     */
    protected $PurchaseStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PurchaseStatuses',
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
        $config = $this->getTableLocator()->exists('PurchaseStatuses') ? [] : ['className' => PurchaseStatusesTable::class];
        $this->PurchaseStatuses = $this->getTableLocator()->get('PurchaseStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PurchaseStatuses);

        parent::tearDown();
    }
}
