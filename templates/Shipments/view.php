<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shipment $shipment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Shipment'), ['action' => 'edit', $shipment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Shipment'), ['action' => 'delete', $shipment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shipment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Shipments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Shipment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="shipments view content">
            <h3><?= h($shipment->summary) ?></h3>
            <table>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($states[$shipment->state]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Shipper') ?></th>
                    <td><?= $shipment->has('shipper') ? $this->Html->link($shipment->shipper->name, ['controller' => 'Shippers', 'action' => 'view', $shipment->shipper->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Sender') ?></th>
                    <td><?= $shipment->has('sender') ? $this->Html->link($shipment->sender->name, ['controller' => 'Merchants', 'action' => 'view', $shipment->sender->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Shipping From Address') ?></th>
                    <td><?= $shipment->has('shipping_from_address') ? $this->Html->link($shipment->shipping_from_address->summary, ['controller' => 'Addresses', 'action' => 'view', $shipment->shipping_from_address->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Recipient') ?></th>
                    <td><?= $shipment->has('recipient') ? $this->Html->link($shipment->recipient->name, ['controller' => 'Merchants', 'action' => 'view', $shipment->recipient->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Shipping To Address') ?></th>
                    <td><?= $shipment->has('shipping_to_address') ? $this->Html->link($shipment->shipping_to_address->summary, ['controller' => 'Addresses', 'action' => 'view', $shipment->shipping_to_address->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Tracking Number') ?></th>
                    <td><?= h($shipment->tracking_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tracking Url') ?></th>
                    <td><?= h($shipment->tracking_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($shipment->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($shipment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($shipment->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($shipment->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($shipment->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Purchase Updates') ?></h4>
                <?php if (!empty($shipment->purchase_updates)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Purchase Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('State') ?></th>
                            <th><?= __('Shipment Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($shipment->purchase_updates as $purchaseUpdates) : ?>
                        <tr>
                            <td><?= h($purchaseUpdates->id) ?></td>
                            <td><?= h($purchaseUpdates->purchase_id) ?></td>
                            <td><?= h($purchaseUpdates->date) ?></td>
                            <td><?= h($purchaseStates[$purchaseUpdates->state]) ?></td>
                            <td><?= h($purchaseUpdates->shipment_id) ?></td>
                            <td><?= h($purchaseUpdates->description) ?></td>
                            <td><?= h($purchaseUpdates->created) ?></td>
                            <td><?= h($purchaseUpdates->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PurchaseUpdates', 'action' => 'view', $purchaseUpdates->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseUpdates', 'action' => 'edit', $purchaseUpdates->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseUpdates', 'action' => 'delete', $purchaseUpdates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseUpdates->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Sale Updates') ?></h4>
                <?php if (!empty($shipment->sale_updates)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Sale Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('State') ?></th>
                            <th><?= __('Shipment Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($shipment->sale_updates as $saleUpdates) : ?>
                        <tr>
                            <td><?= h($saleUpdates->id) ?></td>
                            <td><?= h($saleUpdates->sale_id) ?></td>
                            <td><?= h($saleUpdates->date) ?></td>
                            <td><?= h($saleStates[$saleUpdates->state]) ?></td>
                            <td><?= h($saleUpdates->shipment_id) ?></td>
                            <td><?= h($saleUpdates->description) ?></td>
                            <td><?= h($saleUpdates->created) ?></td>
                            <td><?= h($saleUpdates->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SaleUpdates', 'action' => 'view', $saleUpdates->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SaleUpdates', 'action' => 'edit', $saleUpdates->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SaleUpdates', 'action' => 'delete', $saleUpdates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleUpdates->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Shipment Updates') ?></h4>
                <?php if (!empty($shipment->shipment_updates)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Shipment Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('State') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($shipment->shipment_updates as $shipmentUpdates) : ?>
                        <tr>
                            <td><?= h($shipmentUpdates->id) ?></td>
                            <td><?= h($shipmentUpdates->shipment_id) ?></td>
                            <td><?= h($shipmentUpdates->date) ?></td>
                            <td><?= h($states[$shipmentUpdates->state]) ?></td>
                            <td><?= h($shipmentUpdates->description) ?></td>
                            <td><?= h($shipmentUpdates->created) ?></td>
                            <td><?= h($shipmentUpdates->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ShipmentUpdates', 'action' => 'view', $shipmentUpdates->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ShipmentUpdates', 'action' => 'edit', $shipmentUpdates->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ShipmentUpdates', 'action' => 'delete', $shipmentUpdates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shipmentUpdates->id)]) ?>
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
