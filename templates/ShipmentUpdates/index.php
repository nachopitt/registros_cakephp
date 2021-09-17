<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShipmentUpdate[]|\Cake\Collection\CollectionInterface $shipmentUpdates
 */
?>
<div class="shipmentUpdates index content">
    <?= $this->Html->link(__('New Shipment Update'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Shipment Updates') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('shipment_id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shipmentUpdates as $shipmentUpdate): ?>
                <tr>
                    <td><?= $shipmentUpdate->has('shipment') ? $this->Html->link($shipmentUpdate->shipment->summary, ['controller' => 'Shipments', 'action' => 'view', $shipmentUpdate->shipment->id]) : '' ?></td>
                    <td><?= h($shipmentUpdate->date) ?></td>
                    <td><?= h($states[$shipmentUpdate->state]) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $shipmentUpdate->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shipmentUpdate->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shipmentUpdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shipmentUpdate->id)]) ?>
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
