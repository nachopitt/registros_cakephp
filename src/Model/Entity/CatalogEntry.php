<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CatalogEntry Entity
 *
 * @property int $id
 * @property string $entry_name
 * @property string $catalog_name
 *
 * @property \App\Model\Entity\Tag[] $tags
 */
class CatalogEntry extends Entity
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
        'entry_name' => true,
        'catalog_name' => true,
        'tags' => true,
    ];
}
