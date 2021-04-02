<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MerchantsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MerchantsTable Test Case
 */
class MerchantsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MerchantsTable
     */
    protected $Merchants;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Merchants',
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
        $config = $this->getTableLocator()->exists('Merchants') ? [] : ['className' => MerchantsTable::class];
        $this->Merchants = $this->getTableLocator()->get('Merchants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Merchants);

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
