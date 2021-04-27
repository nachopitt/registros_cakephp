<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConditionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConditionsTable Test Case
 */
class ConditionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConditionsTable
     */
    protected $Conditions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Conditions',
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
        $config = $this->getTableLocator()->exists('Conditions') ? [] : ['className' => ConditionsTable::class];
        $this->Conditions = $this->getTableLocator()->get('Conditions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Conditions);

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
