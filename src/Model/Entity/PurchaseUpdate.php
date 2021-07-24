<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PurchaseUpdate Entity
 *
 * @property int $id
 * @property int $purchase_id
 * @property \Cake\I18n\FrozenTime $date
 * @property int $purchase_status_id
 * @property int|null $shipment_id
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Purchase $purchase
 * @property \App\Model\Entity\PurchaseStatus $purchase_status
 * @property \App\Model\Entity\Shipment $shipment
 * @property \App\Model\Entity\PurchaseLine[] $purchase_lines
 */
class PurchaseUpdate extends Entity
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
        'purchase_id' => true,
        'date' => true,
        'purchase_status_id' => true,
        'shipment_id' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'purchase' => true,
        'purchase_status' => true,
        'shipment' => true,
        'purchase_lines' => true,
    ];

    protected function _getSummary() {
        return $this->_fields['id'] . ' / ' . $this->_fields['date'] . ' / ' . $this->_fields['purchase_status']['name'] . ' / ' . 
            $this->_fields['purchase']['merchant']['name'];
    }
}
