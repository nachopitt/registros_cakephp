<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Purchase Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $date
 * @property string|null $purchase_number
 * @property string|null $purchase_url
 * @property int $merchant_id
 * @property int $seller_id
 *
 * @property \App\Model\Entity\Merchant $merchant
 * @property \App\Model\Entity\Seller $seller
 * @property \App\Model\Entity\PurchaseLine[] $purchase_lines
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Purchase extends Entity
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
        'purchase_number' => true,
        'purchase_url' => true,
        'merchant_id' => true,
        'seller_id' => true,
        'merchant' => true,
        'seller' => true,
        'purchase_lines' => true,
        'transactions' => true,
    ];
}
