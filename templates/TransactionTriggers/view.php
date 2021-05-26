<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransactionTrigger $transactionTrigger
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Transaction Trigger'), ['action' => 'edit', $transactionTrigger->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Transaction Trigger'), ['action' => 'delete', $transactionTrigger->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactionTrigger->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Transaction Triggers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Transaction Trigger'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transactionTriggers view content">
            <h3><?= h($transactionTrigger->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($transactionTrigger->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Purchase') ?></th>
                    <td><?= $transactionTrigger->has('purchase') ? $this->Html->link($transactionTrigger->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $transactionTrigger->purchase->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale') ?></th>
                    <td><?= $transactionTrigger->has('sale') ? $this->Html->link($transactionTrigger->sale->id, ['controller' => 'Sales', 'action' => 'view', $transactionTrigger->sale->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($transactionTrigger->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Transactions') ?></h4>
                <?php if (!empty($transactionTrigger->transactions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Curency Id') ?></th>
                            <th><?= __('Money Account Id') ?></th>
                            <th><?= __('Transaction Trigger Id') ?></th>
                            <th><?= __('Exchange Rate') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($transactionTrigger->transactions as $transactions) : ?>
                        <tr>
                            <td><?= h($transactions->id) ?></td>
                            <td><?= h($transactions->date) ?></td>
                            <td><?= h($transactions->amount) ?></td>
                            <td><?= h($transactions->curency_id) ?></td>
                            <td><?= h($transactions->money_account_id) ?></td>
                            <td><?= h($transactions->transaction_trigger_id) ?></td>
                            <td><?= h($transactions->exchange_rate) ?></td>
                            <td><?= h($transactions->description) ?></td>
                            <td><?= h($transactions->created) ?></td>
                            <td><?= h($transactions->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Transactions', 'action' => 'view', $transactions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Transactions', 'action' => 'edit', $transactions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
