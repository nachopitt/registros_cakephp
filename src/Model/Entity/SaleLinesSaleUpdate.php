<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SaleLinesSaleUpdate Entity
 *
 * @property int $id
 * @property int $sale_line_id
 * @property int $sale_update_id
 * @property int|null $shipment_id
 *
 * @property \App\Model\Entity\SaleLine $sale_line
 * @property \App\Model\Entity\SaleUpdate $sale_update
 * @property \App\Model\Entity\Shipment $shipment
 */
class SaleLinesSaleUpdate extends Entity
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
        'sale_line_id' => true,
        'sale_update_id' => true,
        'shipment_id' => true,
        'sale_line' => true,
        'sale_update' => true,
        'shipment' => true,
    ];
}
