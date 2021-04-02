<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PurchaseLinesFixture
 */
class PurchaseLinesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'purchase_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'product_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'money_movement_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'shipment_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'description' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_purchase_lines_purchases1_idx' => ['type' => 'index', 'columns' => ['purchase_id'], 'length' => []],
            'fk_purchase_lines_catalog_entries1_idx' => ['type' => 'index', 'columns' => ['product_id'], 'length' => []],
            'fk_purchase_lines_money_movements1_idx' => ['type' => 'index', 'columns' => ['money_movement_id'], 'length' => []],
            'fk_purchase_lines_shipments1_idx' => ['type' => 'index', 'columns' => ['shipment_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_purchase_lines_catalog_entries1' => ['type' => 'foreign', 'columns' => ['product_id'], 'references' => ['catalog_entries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_purchase_lines_money_movements1' => ['type' => 'foreign', 'columns' => ['money_movement_id'], 'references' => ['money_movements', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_purchase_lines_purchases1' => ['type' => 'foreign', 'columns' => ['purchase_id'], 'references' => ['purchases', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_purchase_lines_shipments1' => ['type' => 'foreign', 'columns' => ['shipment_id'], 'references' => ['shipments', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'purchase_id' => 1,
                'product_id' => 1,
                'money_movement_id' => 1,
                'shipment_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
