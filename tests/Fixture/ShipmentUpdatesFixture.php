<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ShipmentUpdatesFixture
 */
class ShipmentUpdatesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'shipment_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'date' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        'shipment_status_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'description' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        'modified' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'fk_shipment_updates_shipments1_idx' => ['type' => 'index', 'columns' => ['shipment_id'], 'length' => []],
            'fk_shipment_updates_catalog_entries1_idx' => ['type' => 'index', 'columns' => ['shipment_status_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_shipment_updates_catalog_entries1' => ['type' => 'foreign', 'columns' => ['shipment_status_id'], 'references' => ['catalog_entries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_shipment_updates_shipments1' => ['type' => 'foreign', 'columns' => ['shipment_id'], 'references' => ['shipments', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'shipment_id' => 1,
                'date' => '2021-05-13 20:15:50',
                'shipment_status_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
                'created' => '2021-05-13 20:15:50',
                'modified' => '2021-05-13 20:15:50',
            ],
        ];
        parent::init();
    }
}
