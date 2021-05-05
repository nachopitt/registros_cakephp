<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property string $amount
 * @property int $curency_id
 * @property int $money_account_id
 * @property int $transaction_trigger_id
 * @property string $exchange_rate
 * @property string|null $description
 *
 * @property \App\Model\Entity\Currency $currency
 * @property \App\Model\Entity\MoneyAccount $money_account
 * @property \App\Model\Entity\TransactionTrigger $transaction_trigger
 */
class Transaction extends Entity
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
        'amount' => true,
        'curency_id' => true,
        'money_account_id' => true,
        'transaction_trigger_id' => true,
        'exchange_rate' => true,
        'description' => true,
        'currency' => true,
        'money_account' => true,
        'transaction_trigger' => true,
    ];
}
