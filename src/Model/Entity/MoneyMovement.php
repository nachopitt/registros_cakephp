<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MoneyMovement Entity
 *
 * @property int $id
 * @property float $price
 * @property float $quantity
 * @property int $unit_id
 * @property int $currency_id
 * @property int $payment_method_id
 * @property float $discount
 * @property bool $discount_percentage
 * @property string|null $description
 *
 * @property \App\Model\Entity\PurchaseLine[] $purchase_lines
 * @property \App\Model\Entity\SaleLine[] $sale_lines
 */
class MoneyMovement extends Entity
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
        'price' => true,
        'quantity' => true,
        'unit_id' => true,
        'currency_id' => true,
        'payment_method_id' => true,
        'discount' => true,
        'discount_percentage' => true,
        'description' => true,
        'purchase_lines' => true,
        'sale_lines' => true,
    ];
}
