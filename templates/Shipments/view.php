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
                <h4><?= __('Related Purchase Lines') ?></h4>
                <?php if (!empty($shipment->purchase_lines)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Unit Id') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Discount') ?></th>
                            <th><?= __('Discount Percentage') ?></th>
                            <th><?= __('Discount Unit') ?></th>
                            <th><?= __('Currency Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Shipment Id') ?></th>
                            <th><?= __('Seller Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($shipment->purchase_lines as $purchaseLines) : ?>
                        <tr>
                            <td><?= h($purchaseLines->id) ?></td>
                            <td><?= h($purchaseLines->product_id) ?></td>
                            <td><?= h($purchaseLines->quantity) ?></td>
                            <td><?= h($purchaseLines->unit_id) ?></td>
                            <td><?= h($purchaseLines->price) ?></td>
                            <td><?= h($purchaseLines->discount) ?></td>
                            <td><?= h($purchaseLines->discount_percentage) ?></td>
                            <td><?= h($purchaseLines->discount_unit) ?></td>
                            <td><?= h($purchaseLines->currency_id) ?></td>
                            <td><?= h($purchaseLines->description) ?></td>
                            <td><?= h($purchaseLines->shipment_id) ?></td>
                            <td><?= h($purchaseLines->seller_id) ?></td>
                            <td><?= h($purchaseLines->created) ?></td>
                            <td><?= h($purchaseLines->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PurchaseLines', 'action' => 'view', $purchaseLines->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseLines', 'action' => 'edit', $purchaseLines->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseLines', 'action' => 'delete', $purchaseLines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseLines->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Sale Lines') ?></h4>
                <?php if (!empty($shipment->sale_lines)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Unit Id') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Discount') ?></th>
                            <th><?= __('Discount Percentage') ?></th>
                            <th><?= __('Discount Unit') ?></th>
                            <th><?= __('Currency Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Shipment Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($shipment->sale_lines as $saleLines) : ?>
                        <tr>
                            <td><?= h($saleLines->id) ?></td>
                            <td><?= h($saleLines->product_id) ?></td>
                            <td><?= h($saleLines->quantity) ?></td>
                            <td><?= h($saleLines->unit_id) ?></td>
                            <td><?= h($saleLines->price) ?></td>
                            <td><?= h($saleLines->discount) ?></td>
                            <td><?= h($saleLines->discount_percentage) ?></td>
                            <td><?= h($saleLines->discount_unit) ?></td>
                            <td><?= h($saleLines->currency_id) ?></td>
                            <td><?= h($saleLines->description) ?></td>
                            <td><?= h($saleLines->shipment_id) ?></td>
                            <td><?= h($saleLines->created) ?></td>
                            <td><?= h($saleLines->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SaleLines', 'action' => 'view', $saleLines->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SaleLines', 'action' => 'edit', $saleLines->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SaleLines', 'action' => 'delete', $saleLines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleLines->id)]) ?>
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
