<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Transaction'), ['action' => 'edit', $transaction->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Transaction'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Transactions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Transaction'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transactions view content">
            <h3><?= h($transaction->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Currency') ?></th>
                    <td><?= $transaction->has('currency') ? $this->Html->link($transaction->currency->name, ['controller' => 'Currencies', 'action' => 'view', $transaction->currency->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Money Account') ?></th>
                    <td><?= $transaction->has('money_account') ? $this->Html->link($transaction->money_account->name, ['controller' => 'MoneyAccounts', 'action' => 'view', $transaction->money_account->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Transaction Trigger') ?></th>
                    <td><?= $transaction->has('transaction_trigger') ? $this->Html->link($transaction->transaction_trigger->id, ['controller' => 'TransactionTriggers', 'action' => 'view', $transaction->transaction_trigger->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($transaction->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($transaction->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($transaction->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Exchange Rate') ?></th>
                    <td><?= $this->Number->format($transaction->exchange_rate) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
