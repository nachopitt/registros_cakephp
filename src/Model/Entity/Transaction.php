<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property float $quantity
 * @property int $unit_id
 * @property float $price
 * @property float $discount
 * @property bool $discount_percentage
 * @property int $currency_id
 * @property int $money_account_id
 * @property string|null $description
 * @property int|null $purchase_line_id
 * @property int|null $sale_line_id
 *
 * @property \App\Model\Entity\Unit $unit
 * @property \App\Model\Entity\Currency $currency
 * @property \App\Model\Entity\MoneyAccount $money_account
 * @property \App\Model\Entity\PurchaseLine $purchase_line
 * @property \App\Model\Entity\SaleLine $sale_line
 */
class Transaction extends Entity
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
        'quantity' => true,
        'unit_id' => true,
        'price' => true,
        'discount' => true,
        'discount_percentage' => true,
        'currency_id' => true,
        'money_account_id' => true,
        'description' => true,
        'purchase_line_id' => true,
        'sale_line_id' => true,
        'unit' => true,
        'currency' => true,
        'money_account' => true,
        'purchase_line' => true,
        'sale_line' => true,
    ];
}
