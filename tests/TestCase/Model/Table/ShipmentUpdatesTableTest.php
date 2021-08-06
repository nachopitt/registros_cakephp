<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShipmentUpdatesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShipmentUpdatesTable Test Case
 */
class ShipmentUpdatesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShipmentUpdatesTable
     */
    protected $ShipmentUpdates;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ShipmentUpdates',
        'app.Shipments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ShipmentUpdates') ? [] : ['className' => ShipmentUpdatesTable::class];
        $this->ShipmentUpdates = $this->getTableLocator()->get('ShipmentUpdates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ShipmentUpdates);

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
