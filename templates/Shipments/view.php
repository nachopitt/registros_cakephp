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
            <h3><?= h($shipment->id) ?></h3>
            <table>
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
                    <td><?= $shipment->has('shipping_from_address') ? $this->Html->link($shipment->shipping_from_address->id, ['controller' => 'Addresses', 'action' => 'view', $shipment->shipping_from_address->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Recipient') ?></th>
                    <td><?= $shipment->has('recipient') ? $this->Html->link($shipment->recipient->name, ['controller' => 'Merchants', 'action' => 'view', $shipment->recipient->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Shipping To Address') ?></th>
                    <td><?= $shipment->has('shipping_to_address') ? $this->Html->link($shipment->shipping_to_address->id, ['controller' => 'Addresses', 'action' => 'view', $shipment->shipping_to_address->id]) : '' ?></td>
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
                <h4><?= __('Related Purchase Lines Purchase Updates') ?></h4>
                <?php if (!empty($shipment->purchase_lines_purchase_updates)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Purchase Line Id') ?></th>
                            <th><?= __('Purchase Update Id') ?></th>
                            <th><?= __('Shipment Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($shipment->purchase_lines_purchase_updates as $purchaseLinesPurchaseUpdates) : ?>
                        <tr>
                            <td><?= h($purchaseLinesPurchaseUpdates->id) ?></td>
                            <td><?= h($purchaseLinesPurchaseUpdates->purchase_line_id) ?></td>
                            <td><?= h($purchaseLinesPurchaseUpdates->purchase_update_id) ?></td>
                            <td><?= h($purchaseLinesPurchaseUpdates->shipment_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PurchaseLinesPurchaseUpdates', 'action' => 'view', $purchaseLinesPurchaseUpdates->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseLinesPurchaseUpdates', 'action' => 'edit', $purchaseLinesPurchaseUpdates->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseLinesPurchaseUpdates', 'action' => 'delete', $purchaseLinesPurchaseUpdates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseLinesPurchaseUpdates->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Sale Lines Sale Updates') ?></h4>
                <?php if (!empty($shipment->sale_lines_sale_updates)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Sale Line Id') ?></th>
                            <th><?= __('Sale Update Id') ?></th>
                            <th><?= __('Shipment Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($shipment->sale_lines_sale_updates as $saleLinesSaleUpdates) : ?>
                        <tr>
                            <td><?= h($saleLinesSaleUpdates->id) ?></td>
                            <td><?= h($saleLinesSaleUpdates->sale_line_id) ?></td>
                            <td><?= h($saleLinesSaleUpdates->sale_update_id) ?></td>
                            <td><?= h($saleLinesSaleUpdates->shipment_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SaleLinesSaleUpdates', 'action' => 'view', $saleLinesSaleUpdates->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SaleLinesSaleUpdates', 'action' => 'edit', $saleLinesSaleUpdates->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SaleLinesSaleUpdates', 'action' => 'delete', $saleLinesSaleUpdates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleLinesSaleUpdates->id)]) ?>
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
                            <th><?= __('Shipment Status Id') ?></th>
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
                            <td><?= h($shipmentUpdates->shipment_status_id) ?></td>
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
