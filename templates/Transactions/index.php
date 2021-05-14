<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction[]|\Cake\Collection\CollectionInterface $transactions
 */
?>
<div class="transactions index content">
    <?= $this->Html->link(__('New Transaction'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Transactions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('curency_id') ?></th>
                    <th><?= $this->Paginator->sort('money_account_id') ?></th>
                    <th><?= $this->Paginator->sort('transaction_trigger_id') ?></th>
                    <th><?= $this->Paginator->sort('exchange_rate') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?= $this->Number->format($transaction->id) ?></td>
                    <td><?= h($transaction->date) ?></td>
                    <td><?= $this->Number->format($transaction->amount) ?></td>
                    <td><?= $transaction->has('currency') ? $this->Html->link($transaction->currency->name, ['controller' => 'Currencies', 'action' => 'view', $transaction->currency->id]) : '' ?></td>
                    <td><?= $transaction->has('money_account') ? $this->Html->link($transaction->money_account->name, ['controller' => 'MoneyAccounts', 'action' => 'view', $transaction->money_account->id]) : '' ?></td>
                    <td><?= $transaction->has('transaction_trigger') ? $this->Html->link($transaction->transaction_trigger->id, ['controller' => 'TransactionTriggers', 'action' => 'view', $transaction->transaction_trigger->id]) : '' ?></td>
                    <td><?= $this->Number->format($transaction->exchange_rate) ?></td>
                    <td><?= h($transaction->description) ?></td>
                    <td><?= h($transaction->created) ?></td>
                    <td><?= h($transaction->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $transaction->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
