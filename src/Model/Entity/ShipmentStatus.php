<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShipmentStatus Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $short_name
 * @property string $catalog
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Tag[] $tags
 */
class ShipmentStatus extends CatalogEntry
{
}
