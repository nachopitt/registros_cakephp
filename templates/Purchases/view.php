<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Purchase'), ['action' => 'edit', $purchase->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Purchase'), ['action' => 'delete', $purchase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Purchases'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Purchase'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Add Purchase Line'), ['controller' => 'PurchaseLines', 'action' => 'add', 'purchase', $purchase->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Add Purchase Update'), ['controller' => 'PurchaseUpdates', 'action' => 'add', 'purchase', $purchase->id], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchases view content">
            <h3><?= h($purchase->summary) ?></h3>
            <table class="no-flex">
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($purchase->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Transaction Trigger') ?></th>
                    <td><?= $purchase->has('transaction_trigger') ? $this->Html->link($purchase->transaction_trigger->summary, ['controller' => 'TransactionTriggers', 'action' => 'view', $purchase->transaction_trigger->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($states[$purchase->state]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Merchant') ?></th>
                    <td><?= $purchase->has('merchant') ? $this->Html->link($purchase->merchant->name, ['controller' => 'Merchants', 'action' => 'view', $purchase->merchant->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Number') ?></th>
                    <td><?= h($purchase->number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Url') ?></th>
                    <td><?= h($purchase->url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($purchase->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($purchase->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <?= $this->element('purchase_lines/view_related_purchase_lines', ['purchaseLines' => $purchase->purchase_lines]) ?>
            </div>
            <div class="related">
                <?= $this->element('purchase_updates/view_related_updates_with_lines_1', ['purchaseUpdates' => $purchase->purchase_updates]) ?>
            </div>
        </div>
    </div>
</div>
