<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\ShipmentsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ShipmentsController Test Case
 *
 * @uses \App\Controller\ShipmentsController
 */
class ShipmentsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Shipments',
        'app.Shippers',
        'app.Senders',
        'app.ShippingFromAddresses',
        'app.Recipients',
        'app.ShippingToAddresses',
        'app.PurchaseLinesPurchaseUpdates',
        'app.SaleLinesSaleUpdates',
        'app.ShipmentUpdates',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
