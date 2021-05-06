<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CollectionConditionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CollectionConditionsTable Test Case
 */
class CollectionConditionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CollectionConditionsTable
     */
    protected $CollectionConditions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CollectionConditions',
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
        $config = $this->getTableLocator()->exists('CollectionConditions') ? [] : ['className' => CollectionConditionsTable::class];
        $this->CollectionConditions = $this->getTableLocator()->get('CollectionConditions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CollectionConditions);

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
