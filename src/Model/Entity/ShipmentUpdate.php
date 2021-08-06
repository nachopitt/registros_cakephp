<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShipmentUpdate Entity
 *
 * @property int $id
 * @property int $shipment_id
 * @property \Cake\I18n\FrozenTime $date
 * @property string $state
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Shipment $shipment
 */
class ShipmentUpdate extends Entity
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
        'shipment_id' => true,
        'date' => true,
        'state' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'shipment' => true,
    ];
}
