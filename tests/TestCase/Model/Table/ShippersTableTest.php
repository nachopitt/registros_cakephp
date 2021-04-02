<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShippersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShippersTable Test Case
 */
class ShippersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShippersTable
     */
    protected $Shippers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Shippers',
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
        $config = $this->getTableLocator()->exists('Shippers') ? [] : ['className' => ShippersTable::class];
        $this->Shippers = $this->getTableLocator()->get('Shippers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Shippers);

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
