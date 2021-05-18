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
                    <th><?= __('Purchase Update') ?></th>
                    <td><?= $purchaseLine->has('purchase_update') ? $this->Html->link($purchaseLine->purchase_update->id, ['controller' => 'PurchaseUpdates', 'action' => 'view', $purchaseLine->purchase_update->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $purchaseLine->has('product') ? $this->Html->link($purchaseLine->product->name, ['controller' => 'Products', 'action' => 'view', $purchaseLine->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Unit') ?></th>
                    <td><?= $purchaseLine->has('unit') ? $this->Html->link($purchaseLine->unit->name, ['controller' => 'Units', 'action' => 'view', $purchaseLine->unit->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Currency') ?></th>
                    <td><?= $purchaseLine->has('currency') ? $this->Html->link($purchaseLine->currency->name, ['controller' => 'Currencies', 'action' => 'view', $purchaseLine->currency->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($purchaseLine->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Shipment') ?></th>
                    <td><?= $purchaseLine->has('shipment') ? $this->Html->link($purchaseLine->shipment->id, ['controller' => 'Shipments', 'action' => 'view', $purchaseLine->shipment->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Seller') ?></th>
                    <td><?= $purchaseLine->has('seller') ? $this->Html->link($purchaseLine->seller->name, ['controller' => 'Sellers', 'action' => 'view', $purchaseLine->seller->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($purchaseLine->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($purchaseLine->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($purchaseLine->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Discount') ?></th>
                    <td><?= $this->Number->format($purchaseLine->discount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Discount Percentage') ?></th>
                    <td><?= $this->Number->format($purchaseLine->discount_percentage) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($purchaseLine->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($purchaseLine->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
