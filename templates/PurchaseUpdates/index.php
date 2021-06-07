<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseUpdate[]|\Cake\Collection\CollectionInterface $purchaseUpdates
 */
?>
<div class="purchaseUpdates index content">
    <?= $this->Html->link(__('New Purchase Update'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Purchase Updates') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('purchase_id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('purchase_status_id') ?></th>
                    <th><?= $this->Paginator->sort('shipment_id') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($purchaseUpdates as $purchaseUpdate): ?>
                <tr>
                    <td><?= $this->Number->format($purchaseUpdate->id) ?></td>
                    <td><?= $purchaseUpdate->has('purchase') ? $this->Html->link($purchaseUpdate->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $purchaseUpdate->purchase->id]) : '' ?></td>
                    <td><?= h($purchaseUpdate->date) ?></td>
                    <td><?= $purchaseUpdate->has('purchase_status') ? $this->Html->link($purchaseUpdate->purchase_status->name, ['controller' => 'PurchaseStatuses', 'action' => 'view', $purchaseUpdate->purchase_status->id]) : '' ?></td>
                    <td><?= $purchaseUpdate->has('shipment') ? $this->Html->link($purchaseUpdate->shipment->id, ['controller' => 'Shipments', 'action' => 'view', $purchaseUpdate->shipment->id]) : '' ?></td>
                    <td><?= h($purchaseUpdate->description) ?></td>
                    <td><?= h($purchaseUpdate->created) ?></td>
                    <td><?= h($purchaseUpdate->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $purchaseUpdate->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchaseUpdate->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchaseUpdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseUpdate->id)]) ?>
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
