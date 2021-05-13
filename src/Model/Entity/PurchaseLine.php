<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PurchaseLine Entity
 *
 * @property int $id
 * @property int $purchase_update_id
 * @property int $product_id
 * @property string $quantity
 * @property int $unit_id
 * @property string $price
 * @property string $discount
 * @property int $discount_percentage
 * @property int $currency_id
 * @property string|null $description
 * @property int|null $shipment_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\PurchaseUpdate $purchase_update
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Unit $unit
 * @property \App\Model\Entity\Currency $currency
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
        'purchase_update_id' => true,
        'product_id' => true,
        'quantity' => true,
        'unit_id' => true,
        'price' => true,
        'discount' => true,
        'discount_percentage' => true,
        'currency_id' => true,
        'description' => true,
        'shipment_id' => true,
        'created' => true,
        'modified' => true,
        'purchase_update' => true,
        'product' => true,
        'unit' => true,
        'currency' => true,
        'shipment' => true,
    ];
}
