<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PurchaseLine Entity
 *
 * @property int $id
 * @property int $purchase_id
 * @property int $product_id
 * @property int $money_movement_id
 * @property int|null $shipment_id
 * @property string|null $description
 *
 * @property \App\Model\Entity\Purchase $purchase
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\MoneyMovement $money_movement
 * @property \App\Model\Entity\Shipment $shipment
 */
class PurchaseLine extends Entity
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
        'purchase_id' => true,
        'product_id' => true,
        'money_movement_id' => true,
        'shipment_id' => true,
        'description' => true,
        'purchase' => true,
        'product' => true,
        'money_movement' => true,
        'shipment' => true,
    ];
}
