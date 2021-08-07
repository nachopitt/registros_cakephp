<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Model\Table\PurchasesTable;
use Cake\Utility\Text;

/**
 * Purchase Entity
 *
 * @property int $id
 * @property int $transaction_trigger_id
 * @property string $state
 * @property int $merchant_id
 * @property string|null $number
 * @property string|null $url
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\TransactionTrigger $transaction_trigger
 * @property \App\Model\Entity\Merchant $merchant
 * @property \App\Model\Entity\PurchaseLine[] $purchase_lines
 * @property \App\Model\Entity\PurchaseUpdate[] $purchase_updates
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
        'transaction_trigger_id' => true,
        'state' => true,
        'merchant_id' => true,
        'number' => true,
        'url' => true,
        'created' => true,
        'modified' => true,
        'transaction_trigger' => true,
        'merchant' => true,
        'purchase_lines' => true,
        'purchase_updates' => true,
    ];

    protected function _getSummary() {
        $states = PurchasesTable::getStates();
        $summary = Text::insert(':date - :state - :merchant_label :merchant - :number', [
            'date' => $this->_fields['transaction_trigger']['date'],
            'state' => $states[$this->_fields['state']],
            'merchant_label' => __('Purchased in:'),
            'merchant' => $this->_fields['merchant']['name'],
            'number' => $this->_fields['number'] ? $this->_fields['number'] : __('No number')
        ]);
        return $summary;       
    }
}
