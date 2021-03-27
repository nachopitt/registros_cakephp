<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MoneyMovementsFixture
 */
class MoneyMovementsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'price' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'quantity' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => ''],
        'unit_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'currency_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'payment_method_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'discount' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => ''],
        'discount_percentage' => ['type' => 'tinyinteger', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'description' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_expense_lines_unities1_idx' => ['type' => 'index', 'columns' => ['unit_id'], 'length' => []],
            'fk_expense_lines_catalogs1_idx' => ['type' => 'index', 'columns' => ['currency_id'], 'length' => []],
            'fk_expense_lines_catalogs2_idx' => ['type' => 'index', 'columns' => ['payment_method_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_expense_lines_catalogs1' => ['type' => 'foreign', 'columns' => ['currency_id'], 'references' => ['catalog_entries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_expense_lines_catalogs2' => ['type' => 'foreign', 'columns' => ['payment_method_id'], 'references' => ['catalog_entries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_expense_lines_unities1' => ['type' => 'foreign', 'columns' => ['unit_id'], 'references' => ['catalog_entries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_0900_ai_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'price' => 1,
                'quantity' => 1,
                'unit_id' => 1,
                'currency_id' => 1,
                'payment_method_id' => 1,
                'discount' => 1,
                'discount_percentage' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
