<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CollectionEntry Entity
 *
 * @property int $id
 * @property int $number
 * @property string|null $description
 * @property int $product_id
 * @property int $collection_id
 * @property int $collection_series_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Collection $collection
 * @property \App\Model\Entity\CollectionSeries $collection_series
 * @property \App\Model\Entity\CollectionEntryDetail[] $collection_entry_details
 */
class CollectionEntry extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'number' => true,
        'description' => true,
        'product_id' => true,
        'collection_id' => true,
        'collection_series_id' => true,
        'created' => true,
        'modified' => true,
        'product' => true,
        'collection' => true,
        'collection_series' => true,
        'collection_entry_details' => true,
    ];
}
