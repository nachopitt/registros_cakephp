<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShipmentUpdate $shipmentUpdate
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Shipment Update'), ['action' => 'edit', $shipmentUpdate->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Shipment Update'), ['action' => 'delete', $shipmentUpdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shipmentUpdate->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Shipment Updates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Shipment Update'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="shipmentUpdates view content">
            <h3><?= h($shipmentUpdate->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Shipment') ?></th>
                    <td><?= $shipmentUpdate->has('shipment') ? $this->Html->link($shipmentUpdate->shipment->summary, ['controller' => 'Shipments', 'action' => 'view', $shipmentUpdate->shipment->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($states[$shipmentUpdate->state]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($shipmentUpdate->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($shipmentUpdate->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($shipmentUpdate->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($shipmentUpdate->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($shipmentUpdate->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
