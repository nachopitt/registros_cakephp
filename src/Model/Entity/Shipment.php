<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Shipment Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $date
 * @property int $shipper_id
 * @property string $tracking_number
 * @property string $tracking_url
 * @property string|null $description
 *
 * @property \App\Model\Entity\Shipper $shipper
 * @property \App\Model\Entity\PurchaseLine[] $purchase_lines
 * @property \App\Model\Entity\SaleLine[] $sale_lines
 * @property \App\Model\Entity\ShipmentUpdate[] $shipment_updates
 */
class Shipment extends Entity
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
        'date' => true,
        'shipper_id' => true,
        'tracking_number' => true,
        'tracking_url' => true,
        'description' => true,
        'shipper' => true,
        'purchase_lines' => true,
        'sale_lines' => true,
        'shipment_updates' => true,
    ];
}
