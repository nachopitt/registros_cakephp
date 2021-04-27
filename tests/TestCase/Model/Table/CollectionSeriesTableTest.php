<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CollectionSeriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CollectionSeriesTable Test Case
 */
class CollectionSeriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CollectionSeriesTable
     */
    protected $CollectionSeries;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CollectionSeries',
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
        $config = $this->getTableLocator()->exists('CollectionSeries') ? [] : ['className' => CollectionSeriesTable::class];
        $this->CollectionSeries = $this->getTableLocator()->get('CollectionSeries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CollectionSeries);

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
