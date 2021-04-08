<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SaleLine Entity
 *
 * @property int $id
 * @property int $sale_id
 * @property int $product_id
 * @property float $quantity
 * @property int $unit_id
 * @property float $price
 * @property float $discount
 * @property int $discount_percentage
 * @property int $currency_id
 * @property int|null $shipment_id
 * @property string|null $description
 *
 * @property \App\Model\Entity\Sale $sale
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Unit $unit
 * @property \App\Model\Entity\Currency $currency
 * @property \App\Model\Entity\Shipment $shipment
 */
class SaleLine extends Entity
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
        'sale_id' => true,
        'product_id' => true,
        'quantity' => true,
        'unit_id' => true,
        'price' => true,
        'discount' => true,
        'discount_percentage' => true,
        'currency_id' => true,
        'shipment_id' => true,
        'description' => true,
        'sale' => true,
        'product' => true,
        'unit' => true,
        'currency' => true,
        'shipment' => true,
    ];
}
