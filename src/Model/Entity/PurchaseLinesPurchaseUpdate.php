<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PurchaseLinesPurchaseUpdate Entity
 *
 * @property int $id
 * @property int $purchase_line_id
 * @property int $purchase_update_id
 * @property int|null $shipment_id
 *
 * @property \App\Model\Entity\PurchaseLine $purchase_line
 * @property \App\Model\Entity\PurchaseUpdate $purchase_update
 * @property \App\Model\Entity\Shipment $shipment
 */
class PurchaseLinesPurchaseUpdate extends Entity
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
        'purchase_line_id' => true,
        'purchase_update_id' => true,
        'shipment_id' => true,
        'purchase_line' => true,
        'purchase_update' => true,
        'shipment' => true,
    ];
}
