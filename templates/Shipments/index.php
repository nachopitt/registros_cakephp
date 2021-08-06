<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shipment[]|\Cake\Collection\CollectionInterface $shipments
 */
?>
<div class="shipments index content">
    <?= $this->Html->link(__('New Shipment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Shipments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('shipper_id') ?></th>
                    <th><?= $this->Paginator->sort('sender_id') ?></th>
                    <th><?= $this->Paginator->sort('shipping_from_address_id') ?></th>
                    <th><?= $this->Paginator->sort('recipient_id') ?></th>
                    <th><?= $this->Paginator->sort('shipping_to_address_id') ?></th>
                    <th><?= $this->Paginator->sort('tracking_number') ?></th>
                    <th><?= $this->Paginator->sort('tracking_url') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shipments as $shipment): ?>
                <tr>
                    <td><?= $this->Number->format($shipment->id) ?></td>
                    <td><?= h($shipment->date) ?></td>
                    <td><?= h($states[$shipment->state]) ?></td>
                    <td><?= $shipment->has('shipper') ? $this->Html->link($shipment->shipper->name, ['controller' => 'Shippers', 'action' => 'view', $shipment->shipper->id]) : '' ?></td>
                    <td><?= $shipment->has('sender') ? $this->Html->link($shipment->sender->name, ['controller' => 'Merchants', 'action' => 'view', $shipment->sender->id]) : '' ?></td>
                    <td><?= $shipment->has('shipping_from_address') ? $this->Html->link($shipment->shipping_from_address->summary, ['controller' => 'Addresses', 'action' => 'view', $shipment->shipping_from_address->id]) : '' ?></td>
                    <td><?= $shipment->has('recipient') ? $this->Html->link($shipment->recipient->name, ['controller' => 'Merchants', 'action' => 'view', $shipment->recipient->id]) : '' ?></td>
                    <td><?= $shipment->has('shipping_to_address') ? $this->Html->link($shipment->shipping_to_address->summary, ['controller' => 'Addresses', 'action' => 'view', $shipment->shipping_to_address->id]) : '' ?></td>
                    <td><?= h($shipment->tracking_number) ?></td>
                    <td><?= h($shipment->tracking_url) ?></td>
                    <td><?= h($shipment->description) ?></td>
                    <td><?= h($shipment->created) ?></td>
                    <td><?= h($shipment->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $shipment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shipment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shipment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shipment->id)]) ?>
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
