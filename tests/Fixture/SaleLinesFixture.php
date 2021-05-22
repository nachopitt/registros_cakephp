<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SaleLinesFixture
 */
class SaleLinesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'product_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'decimal', 'length' => 10, 'precision' => 4, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => ''],
        'unit_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'price' => ['type' => 'decimal', 'length' => 10, 'precision' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'discount' => ['type' => 'decimal', 'length' => 10, 'precision' => 4, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => ''],
        'discount_percentage' => ['type' => 'tinyinteger', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'currency_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'description' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'shipment_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        'modified' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'fk_sale_lines_catalog_entries1_idx' => ['type' => 'index', 'columns' => ['product_id'], 'length' => []],
            'fk_sale_lines_catalog_entries2_idx' => ['type' => 'index', 'columns' => ['unit_id'], 'length' => []],
            'fk_sale_lines_catalog_entries3_idx' => ['type' => 'index', 'columns' => ['currency_id'], 'length' => []],
            'fk_sale_lines_shipments1_idx' => ['type' => 'index', 'columns' => ['shipment_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_sale_lines_catalog_entries1' => ['type' => 'foreign', 'columns' => ['product_id'], 'references' => ['catalog_entries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_sale_lines_catalog_entries2' => ['type' => 'foreign', 'columns' => ['unit_id'], 'references' => ['catalog_entries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_sale_lines_catalog_entries3' => ['type' => 'foreign', 'columns' => ['currency_id'], 'references' => ['catalog_entries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_sale_lines_shipments1' => ['type' => 'foreign', 'columns' => ['shipment_id'], 'references' => ['shipments', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'product_id' => 1,
                'quantity' => 1.5,
                'unit_id' => 1,
                'price' => 1.5,
                'discount' => 1.5,
                'discount_percentage' => 1,
                'currency_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
                'shipment_id' => 1,
                'created' => '2021-05-22 14:04:34',
                'modified' => '2021-05-22 14:04:34',
            ],
        ];
        parent::init();
    }
}
