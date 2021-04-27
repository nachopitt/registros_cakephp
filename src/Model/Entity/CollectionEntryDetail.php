<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CollectionEntryDetail Entity
 *
 * @property int $id
 * @property int $collection_entry_id
 * @property int $region_id
 * @property int $condition_id
 *
 * @property \App\Model\Entity\CollectionEntry $collection_entry
 * @property \App\Model\Entity\Region $region
 * @property \App\Model\Entity\Condition $condition
 */
class CollectionEntryDetail extends Entity
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
        'collection_entry_id' => true,
        'region_id' => true,
        'condition_id' => true,
        'collection_entry' => true,
        'region' => true,
        'condition' => true,
    ];
}
