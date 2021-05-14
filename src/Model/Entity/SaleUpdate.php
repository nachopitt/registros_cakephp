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
 * @property string $status
 * @property string|null $description
 *
 * @property \App\Model\Entity\Sale $sale
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
        'status' => true,
        'description' => true,
        'sale' => true,
        'sale_lines' => true,
    ];
}
