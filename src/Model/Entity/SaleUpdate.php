<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SaleUpdate Entity
 *
 * @property int $id
 * @property int $sale_id
 * @property \Cake\I18n\FrozenTime $date
 * @property int $sale_status_id
 * @property int|null $shipment_id
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Sale $sale
 * @property \App\Model\Entity\SaleStatus $sale_status
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
        'sale_status_id' => true,
        'shipment_id' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'sale' => true,
        'sale_status' => true,
        'shipment' => true,
        'sale_lines' => true,
    ];
}
