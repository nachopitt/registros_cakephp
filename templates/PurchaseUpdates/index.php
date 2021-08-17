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
                    <th><?= $this->Paginator->sort('purchase_id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('shipment_id') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($purchaseUpdates as $purchaseUpdate): ?>
                <tr>
                    <td><?= $purchaseUpdate->has('purchase') ? $this->Html->link($purchaseUpdate->purchase->summary, ['controller' => 'Purchases', 'action' => 'view', $purchaseUpdate->purchase->id]) : '' ?></td>
                    <td><?= h($purchaseUpdate->date) ?></td>
                    <td><?= h($states[$purchaseUpdate->state]) ?></td>
                    <td><?= $purchaseUpdate->has('shipment') ? $this->Html->link($purchaseUpdate->shipment->summary, ['controller' => 'Shipments', 'action' => 'view', $purchaseUpdate->shipment->id]) : '' ?></td>
                    <td><?= h($purchaseUpdate->description) ?></td>
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
