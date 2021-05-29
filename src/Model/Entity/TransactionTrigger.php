<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TransactionTrigger Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $date
 * @property string $type
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Purchase $purchase
 * @property \App\Model\Entity\Sale $sale
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class TransactionTrigger extends Entity
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
        'type' => true,
        'created' => true,
        'modified' => true,
        'purchase' => true,
        'sale' => true,
        'transactions' => true,
    ];
}
