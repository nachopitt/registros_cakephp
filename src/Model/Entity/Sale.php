<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Model\Table\SalesTable;
use Cake\Utility\Text;

/**
 * Sale Entity
 *
 * @property int $id
 * @property int $transaction_trigger_id
 * @property string $state
 * @property int $merchant_id
 * @property int $customer_id
 * @property string|null $sale_number
 * @property string|null $sale_url
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\TransactionTrigger $transaction_trigger
 * @property \App\Model\Entity\Merchant $merchant
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\SaleLine[] $sale_lines
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
        'transaction_trigger_id' => true,
        'state' => true,
        'merchant_id' => true,
        'customer_id' => true,
        'sale_number' => true,
        'sale_url' => true,
        'created' => true,
        'modified' => true,
        'transaction_trigger' => true,
        'merchant' => true,
        'customer' => true,
        'sale_lines' => true,
        'sale_updates' => true,
    ];

    protected function _getSummary() {
        $states = SalesTable::getStates();
        $summary = Text::insert(':date - :state - :merchant_label :merchant - :customer_label :customer - :number', [
            'date' => $this->_fields['transaction_trigger']['date'],
            'state' => $states[$this->_fields['state']],
            'merchant_label' => __('Sold in:'),
            'merchant' => $this->_fields['merchant']['name'],
            'customer_label' => __('Sold to:'),
            'customer' => $this->_fields['customer']['name'],
            'number' => $this->_fields['sale_number'] ? $this->_fields['sale_number'] : __('No number')
        ]);
        return $summary;   
    }
}
