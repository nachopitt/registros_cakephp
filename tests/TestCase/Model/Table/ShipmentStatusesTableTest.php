<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShipmentStatusesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShipmentStatusesTable Test Case
 */
class ShipmentStatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShipmentStatusesTable
     */
    protected $ShipmentStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ShipmentStatuses',
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
        $config = $this->getTableLocator()->exists('ShipmentStatuses') ? [] : ['className' => ShipmentStatusesTable::class];
        $this->ShipmentStatuses = $this->getTableLocator()->get('ShipmentStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ShipmentStatuses);

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
