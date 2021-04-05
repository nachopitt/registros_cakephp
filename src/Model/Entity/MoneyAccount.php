<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MoneyAccount Entity
 *
 * @property int $id
 * @property string $name
 * @property string $number
 * @property int $money_account_type_id
 *
 * @property \App\Model\Entity\MoneyAccountType $money_account_type
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class MoneyAccount extends Entity
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
        'name' => true,
        'number' => true,
        'money_account_type_id' => true,
        'money_account_type' => true,
        'transactions' => true,
    ];
}
