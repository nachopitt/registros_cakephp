<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ShipmentsFixture
 */
class ShipmentsFixture extends TestFixture
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
        'shipper_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sender_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'shipping_from_address_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'recipient_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'shipping_to_address_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tracking_number' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'tracking_url' => ['type' => 'string', 'length' => 2048, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'description' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        'modified' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'fk_shipments_catalog_entries1_idx' => ['type' => 'index', 'columns' => ['shipper_id'], 'length' => []],
            'fk_shipments_catalog_entries2_idx' => ['type' => 'index', 'columns' => ['sender_id'], 'length' => []],
            'fk_shipments_addresses1_idx' => ['type' => 'index', 'columns' => ['shipping_from_address_id'], 'length' => []],
            'fk_shipments_catalog_entries3_idx' => ['type' => 'index', 'columns' => ['recipient_id'], 'length' => []],
            'fk_shipments_addresses2_idx' => ['type' => 'index', 'columns' => ['shipping_to_address_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_shipments_addresses1' => ['type' => 'foreign', 'columns' => ['shipping_from_address_id'], 'references' => ['addresses', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_shipments_addresses2' => ['type' => 'foreign', 'columns' => ['shipping_to_address_id'], 'references' => ['addresses', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_shipments_catalog_entries1' => ['type' => 'foreign', 'columns' => ['shipper_id'], 'references' => ['catalog_entries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_shipments_catalog_entries2' => ['type' => 'foreign', 'columns' => ['sender_id'], 'references' => ['catalog_entries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_shipments_catalog_entries3' => ['type' => 'foreign', 'columns' => ['recipient_id'], 'references' => ['catalog_entries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'date' => '2021-05-13 20:13:02',
                'shipper_id' => 1,
                'sender_id' => 1,
                'shipping_from_address_id' => 1,
                'recipient_id' => 1,
                'shipping_to_address_id' => 1,
                'tracking_number' => 'Lorem ipsum dolor sit amet',
                'tracking_url' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'created' => '2021-05-13 20:13:02',
                'modified' => '2021-05-13 20:13:02',
            ],
        ];
        parent::init();
    }
}
