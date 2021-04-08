<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property float $amount
 * @property int $money_account_id
 * @property string|null $description
 * @property int|null $purchase_id
 * @property int|null $sale_id
 *
 * @property \App\Model\Entity\MoneyAccount $money_account
 * @property \App\Model\Entity\Purchase $purchase
 * @property \App\Model\Entity\Sale $sale
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
        'amount' => true,
        'money_account_id' => true,
        'description' => true,
        'purchase_id' => true,
        'sale_id' => true,
        'money_account' => true,
        'purchase' => true,
        'sale' => true,
    ];
}
