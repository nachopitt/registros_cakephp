<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SaleLinesSaleUpdatesFixture
 */
class SaleLinesSaleUpdatesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'sale_line_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sale_update_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'shipment_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_sale_lines_sale_updates_sale_lines1_idx' => ['type' => 'index', 'columns' => ['sale_line_id'], 'length' => []],
            'fk_sale_lines_sale_updates_sale_updates1_idx' => ['type' => 'index', 'columns' => ['sale_update_id'], 'length' => []],
            'fk_sale_lines_sale_updates_shipments1_idx' => ['type' => 'index', 'columns' => ['shipment_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_sale_lines_sale_updates_sale_lines1' => ['type' => 'foreign', 'columns' => ['sale_line_id'], 'references' => ['sale_lines', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_sale_lines_sale_updates_sale_updates1' => ['type' => 'foreign', 'columns' => ['sale_update_id'], 'references' => ['sale_updates', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_sale_lines_sale_updates_shipments1' => ['type' => 'foreign', 'columns' => ['shipment_id'], 'references' => ['shipments', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'sale_line_id' => 1,
                'sale_update_id' => 1,
                'shipment_id' => 1,
            ],
        ];
        parent::init();
    }
}
