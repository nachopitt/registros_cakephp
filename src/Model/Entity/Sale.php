<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sale Entity
 *
 * @property int $id
 * @property int $merchant_id
 * @property int $customer_id
 * @property string|null $sale_number
 * @property string|null $sale_url
 * @property int $transaction_trigger_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Merchant $merchant
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\TransactionTrigger $transaction_trigger
 * @property \App\Model\Entity\SaleUpdate[] $sale_updates
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
        'merchant_id' => true,
        'customer_id' => true,
        'sale_number' => true,
        'sale_url' => true,
        'transaction_trigger_id' => true,
        'created' => true,
        'modified' => true,
        'merchant' => true,
        'customer' => true,
        'transaction_trigger' => true,
        'sale_updates' => true,
    ];

    protected function _getSummary() {
        return $this->_fields['transaction_trigger']['date']. ' - ' .
            $this->_fields['merchant']['name'] . ' - ' .
            $this->_fields['customer']['name'] . ' - ' .
            $this->_fields['sale_number'];
    }
}
