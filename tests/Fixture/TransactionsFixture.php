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
        'date' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        'amount' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'curency_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'money_account_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'transaction_trigger_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'exchange_rate' => ['type' => 'decimal', 'length' => 10, 'precision' => 4, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => ''],
        'description' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_transactions_catalog_entries1_idx' => ['type' => 'index', 'columns' => ['curency_id'], 'length' => []],
            'fk_transactions_money_accounts1_idx' => ['type' => 'index', 'columns' => ['money_account_id'], 'length' => []],
            'fk_transactions_transaction_triggers1_idx' => ['type' => 'index', 'columns' => ['transaction_trigger_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_transactions_catalog_entries1' => ['type' => 'foreign', 'columns' => ['curency_id'], 'references' => ['catalog_entries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_transactions_money_accounts1' => ['type' => 'foreign', 'columns' => ['money_account_id'], 'references' => ['money_accounts', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_transactions_transaction_triggers1' => ['type' => 'foreign', 'columns' => ['transaction_trigger_id'], 'references' => ['transaction_triggers', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'date' => '2021-05-13 20:25:01',
                'amount' => 1.5,
                'curency_id' => 1,
                'money_account_id' => 1,
                'transaction_trigger_id' => 1,
                'exchange_rate' => 1.5,
                'description' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
