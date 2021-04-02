<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sale Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $date
 * @property string|null $sale_number
 * @property string|null $sale_url
 * @property int $merchant_id
 * @property int $customer_id
 *
 * @property \App\Model\Entity\Merchant $merchant
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\SaleLine[] $sale_lines
 */
class Sale extends Entity
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
        'sale_number' => true,
        'sale_url' => true,
        'merchant_id' => true,
        'customer_id' => true,
        'merchant' => true,
        'customer' => true,
        'sale_lines' => true,
    ];
}
