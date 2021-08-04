<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Model\Table\SalesTable;

/**
 * SaleUpdate Entity
 *
 * @property int $id
 * @property int $sale_id
 * @property \Cake\I18n\FrozenTime $date
 * @property string $state
 * @property int|null $shipment_id
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Sale $sale
 * @property \App\Model\Entity\Shipment $shipment
 * @property \App\Model\Entity\SaleLine[] $sale_lines
 */
class SaleUpdate extends Entity
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
        'date' => true,
        'state' => true,
        'shipment_id' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'sale' => true,
        'shipment' => true,
        'sale_lines' => true,
    ];

    protected function _getSummary() {
        $states = SalesTable::getStates();
        return $this->_fields['id'] . ' / ' . $this->_fields['date'] . ' / ' . $states[$this->_fields['state']] . ' / ' . 
            $this->_fields['sale']['merchant']['name'] . ' / ' . $this->_fields['sale']['customer']['name'];
    }
}
