<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseLine $purchaseLine
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Purchase Line'), ['action' => 'edit', $purchaseLine->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Purchase Line'), ['action' => 'delete', $purchaseLine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseLine->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Purchase Lines'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Purchase Line'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchaseLines view content">
            <h3><?= h($purchaseLine->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Purchase') ?></th>
                    <td><?= $purchaseLine->has('purchase') ? $this->Html->link($purchaseLine->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $purchaseLine->purchase->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $purchaseLine->has('product') ? $this->Html->link($purchaseLine->product->name, ['controller' => 'Products', 'action' => 'view', $purchaseLine->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($purchaseLine->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($purchaseLine->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Shipments') ?></h4>
                <?php if (!empty($purchaseLine->shipments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Shipper Id') ?></th>
                            <th><?= __('Tracking Number') ?></th>
                            <th><?= __('Tracking Url') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Purchase Line Id') ?></th>
                            <th><?= __('Sale Line Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($purchaseLine->shipments as $shipments) : ?>
                        <tr>
                            <td><?= h($shipments->id) ?></td>
                            <td><?= h($shipments->date) ?></td>
                            <td><?= h($shipments->shipper_id) ?></td>
                            <td><?= h($shipments->tracking_number) ?></td>
                            <td><?= h($shipments->tracking_url) ?></td>
                            <td><?= h($shipments->description) ?></td>
                            <td><?= h($shipments->purchase_line_id) ?></td>
                            <td><?= h($shipments->sale_line_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Shipments', 'action' => 'view', $shipments->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Shipments', 'action' => 'edit', $shipments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Shipments', 'action' => 'delete', $shipments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shipments->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Transactions') ?></h4>
                <?php if (!empty($purchaseLine->transactions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Unit Id') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Discount') ?></th>
                            <th><?= __('Discount Percentage') ?></th>
                            <th><?= __('Currency Id') ?></th>
                            <th><?= __('Money Account Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Purchase Line Id') ?></th>
                            <th><?= __('Sale Line Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($purchaseLine->transactions as $transactions) : ?>
                        <tr>
                            <td><?= h($transactions->id) ?></td>
                            <td><?= h($transactions->quantity) ?></td>
                            <td><?= h($transactions->unit_id) ?></td>
                            <td><?= h($transactions->price) ?></td>
                            <td><?= h($transactions->discount) ?></td>
                            <td><?= h($transactions->discount_percentage) ?></td>
                            <td><?= h($transactions->currency_id) ?></td>
                            <td><?= h($transactions->money_account_id) ?></td>
                            <td><?= h($transactions->description) ?></td>
                            <td><?= h($transactions->purchase_line_id) ?></td>
                            <td><?= h($transactions->sale_line_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Transactions', 'action' => 'view', $transactions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Transactions', 'action' => 'edit', $transactions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactions->id)]) ?>
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
