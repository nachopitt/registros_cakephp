<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CollectionEntryDetailsFixture
 */
class CollectionEntryDetailsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'collection_entry_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'region_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'condition_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_collection_entry_details_collection_entries1_idx' => ['type' => 'index', 'columns' => ['collection_entry_id'], 'length' => []],
            'fk_collection_entry_details_catalog_entries1_idx' => ['type' => 'index', 'columns' => ['region_id'], 'length' => []],
            'fk_collection_entry_details_catalog_entries2_idx' => ['type' => 'index', 'columns' => ['condition_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_collection_entry_details_catalog_entries1' => ['type' => 'foreign', 'columns' => ['region_id'], 'references' => ['catalog_entries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_collection_entry_details_catalog_entries2' => ['type' => 'foreign', 'columns' => ['condition_id'], 'references' => ['catalog_entries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_collection_entry_details_collection_entries1' => ['type' => 'foreign', 'columns' => ['collection_entry_id'], 'references' => ['collection_entries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'collection_entry_id' => 1,
                'region_id' => 1,
                'condition_id' => 1,
            ],
        ];
        parent::init();
    }
}
