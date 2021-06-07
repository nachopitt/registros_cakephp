<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SaleUpdate[]|\Cake\Collection\CollectionInterface $saleUpdates
 */
?>
<div class="saleUpdates index content">
    <?= $this->Html->link(__('New Sale Update'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sale Updates') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('sale_id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('sale_status_id') ?></th>
                    <th><?= $this->Paginator->sort('shipment_id') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($saleUpdates as $saleUpdate): ?>
                <tr>
                    <td><?= $this->Number->format($saleUpdate->id) ?></td>
                    <td><?= $saleUpdate->has('sale') ? $this->Html->link($saleUpdate->sale->id, ['controller' => 'Sales', 'action' => 'view', $saleUpdate->sale->id]) : '' ?></td>
                    <td><?= h($saleUpdate->date) ?></td>
                    <td><?= $saleUpdate->has('sale_status') ? $this->Html->link($saleUpdate->sale_status->name, ['controller' => 'SaleStatuses', 'action' => 'view', $saleUpdate->sale_status->id]) : '' ?></td>
                    <td><?= $saleUpdate->has('shipment') ? $this->Html->link($saleUpdate->shipment->id, ['controller' => 'Shipments', 'action' => 'view', $saleUpdate->shipment->id]) : '' ?></td>
                    <td><?= h($saleUpdate->description) ?></td>
                    <td><?= h($saleUpdate->created) ?></td>
                    <td><?= h($saleUpdate->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $saleUpdate->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $saleUpdate->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $saleUpdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleUpdate->id)]) ?>
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
