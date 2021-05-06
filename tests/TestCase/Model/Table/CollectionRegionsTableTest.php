<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CollectionRegionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CollectionRegionsTable Test Case
 */
class CollectionRegionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CollectionRegionsTable
     */
    protected $CollectionRegions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CollectionRegions',
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
        $config = $this->getTableLocator()->exists('CollectionRegions') ? [] : ['className' => CollectionRegionsTable::class];
        $this->CollectionRegions = $this->getTableLocator()->get('CollectionRegions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CollectionRegions);

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
