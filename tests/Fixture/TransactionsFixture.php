<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransactionsFixture
 */
class TransactionsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'quantity' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => ''],
        'unit_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'price' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'discount' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => ''],
        'discount_percentage' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'currency_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'money_account_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'description' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'purchase_line_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sale_line_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_transactions_catalog_entries1_idx' => ['type' => 'index', 'columns' => ['unit_id'], 'length' => []],
            'fk_transactions_catalog_entries2_idx' => ['type' => 'index', 'columns' => ['currency_id'], 'length' => []],
            'fk_transactions_purchase_lines1_idx' => ['type' => 'index', 'columns' => ['purchase_line_id'], 'length' => []],
            'fk_transactions_sale_lines1_idx' => ['type' => 'index', 'columns' => ['sale_line_id'], 'length' => []],
            'fk_transactions_money_accounts3_idx' => ['type' => 'index', 'columns' => ['money_account_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_transactions_catalog_entries1' => ['type' => 'foreign', 'columns' => ['unit_id'], 'references' => ['catalog_entries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_transactions_catalog_entries2' => ['type' => 'foreign', 'columns' => ['currency_id'], 'references' => ['catalog_entries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_transactions_money_accounts3' => ['type' => 'foreign', 'columns' => ['money_account_id'], 'references' => ['money_accounts', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_transactions_purchase_lines1' => ['type' => 'foreign', 'columns' => ['purchase_line_id'], 'references' => ['purchase_lines', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_transactions_sale_lines1' => ['type' => 'foreign', 'columns' => ['sale_line_id'], 'references' => ['sale_lines', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
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
                'quantity' => 1,
                'unit_id' => 1,
                'price' => 1,
                'discount' => 1,
                'discount_percentage' => 1,
                'currency_id' => 1,
                'money_account_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
                'purchase_line_id' => 1,
                'sale_line_id' => 1,
            ],
        ];
        parent::init();
    }
}
