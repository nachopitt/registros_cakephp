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
                    <th><?= __('Money Movement') ?></th>
                    <td><?= $purchaseLine->has('money_movement') ? $this->Html->link($purchaseLine->money_movement->id, ['controller' => 'MoneyMovements', 'action' => 'view', $purchaseLine->money_movement->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Shipment') ?></th>
                    <td><?= $purchaseLine->has('shipment') ? $this->Html->link($purchaseLine->shipment->id, ['controller' => 'Shipments', 'action' => 'view', $purchaseLine->shipment->id]) : '' ?></td>
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
        </div>
    </div>
</div>
