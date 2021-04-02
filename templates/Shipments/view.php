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
            </table>
            <div class="related">
                <h4><?= __('Related Purchase Lines') ?></h4>
                <?php if (!empty($shipment->purchase_lines)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Purchase Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Money Movement Id') ?></th>
                            <th><?= __('Shipment Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($shipment->purchase_lines as $purchaseLines) : ?>
                        <tr>
                            <td><?= h($purchaseLines->id) ?></td>
                            <td><?= h($purchaseLines->purchase_id) ?></td>
                            <td><?= h($purchaseLines->product_id) ?></td>
                            <td><?= h($purchaseLines->money_movement_id) ?></td>
                            <td><?= h($purchaseLines->shipment_id) ?></td>
                            <td><?= h($purchaseLines->description) ?></td>
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
                            <th><?= __('Sale Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Money Movement Id') ?></th>
                            <th><?= __('Shipment Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($shipment->sale_lines as $saleLines) : ?>
                        <tr>
                            <td><?= h($saleLines->id) ?></td>
                            <td><?= h($saleLines->sale_id) ?></td>
                            <td><?= h($saleLines->product_id) ?></td>
                            <td><?= h($saleLines->money_movement_id) ?></td>
                            <td><?= h($saleLines->shipment_id) ?></td>
                            <td><?= h($saleLines->description) ?></td>
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
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($shipment->shipment_updates as $shipmentUpdates) : ?>
                        <tr>
                            <td><?= h($shipmentUpdates->id) ?></td>
                            <td><?= h($shipmentUpdates->shipment_id) ?></td>
                            <td><?= h($shipmentUpdates->date) ?></td>
                            <td><?= h($shipmentUpdates->status_id) ?></td>
                            <td><?= h($shipmentUpdates->description) ?></td>
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
