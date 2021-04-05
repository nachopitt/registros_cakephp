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
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('unit_id') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('discount') ?></th>
                    <th><?= $this->Paginator->sort('discount_percentage') ?></th>
                    <th><?= $this->Paginator->sort('currency_id') ?></th>
                    <th><?= $this->Paginator->sort('money_account_id') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('purchase_line_id') ?></th>
                    <th><?= $this->Paginator->sort('sale_line_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?= $this->Number->format($transaction->id) ?></td>
                    <td><?= $this->Number->format($transaction->quantity) ?></td>
                    <td><?= $transaction->has('unit') ? $this->Html->link($transaction->unit->name, ['controller' => 'Units', 'action' => 'view', $transaction->unit->id]) : '' ?></td>
                    <td><?= $this->Number->format($transaction->price) ?></td>
                    <td><?= $this->Number->format($transaction->discount) ?></td>
                    <td><?= h($transaction->discount_percentage) ?></td>
                    <td><?= $transaction->has('currency') ? $this->Html->link($transaction->currency->name, ['controller' => 'Currencies', 'action' => 'view', $transaction->currency->id]) : '' ?></td>
                    <td><?= $transaction->has('money_account') ? $this->Html->link($transaction->money_account->name, ['controller' => 'MoneyAccounts', 'action' => 'view', $transaction->money_account->id]) : '' ?></td>
                    <td><?= h($transaction->description) ?></td>
                    <td><?= $transaction->has('purchase_line') ? $this->Html->link($transaction->purchase_line->id, ['controller' => 'PurchaseLines', 'action' => 'view', $transaction->purchase_line->id]) : '' ?></td>
                    <td><?= $transaction->has('sale_line') ? $this->Html->link($transaction->sale_line->id, ['controller' => 'SaleLines', 'action' => 'view', $transaction->sale_line->id]) : '' ?></td>
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
