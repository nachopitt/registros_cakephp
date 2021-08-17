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
            <?= $this->Html->link(__('Add Purchase Update'), ['controller' => 'PurchaseUpdates', 'action' => 'add', 'purchase_line', $purchaseLine->id], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchaseLines view content">
            <h3><?= h($purchaseLine->summary) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($purchaseLine->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Purchase') ?></th>
                    <td><?= $purchaseLine->has('purchase') ? $this->Html->link($purchaseLine->purchase->summary, ['controller' => 'Purchases', 'action' => 'view', $purchaseLine->purchase->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $purchaseLine->has('product') ? $this->Html->link($purchaseLine->product->name, ['controller' => 'Products', 'action' => 'view', $purchaseLine->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($purchaseLine->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Unit') ?></th>
                    <td><?= $purchaseLine->has('unit') ? $this->Html->link($purchaseLine->unit->name, ['controller' => 'Units', 'action' => 'view', $purchaseLine->unit->id]) : '' ?></td>
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
                    <th><?= __('Percentage Discount') ?></th>
                    <td><?= $purchaseLine->percentage_discount ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Unit Discount') ?></th>
                    <td><?= $purchaseLine->unit_discount ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Subtotal') ?></th>
                    <td><?= $this->Number->format($purchaseLine->subtotal) ?></td>
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
                    <th><?= __('Seller') ?></th>
                    <td><?= $purchaseLine->has('seller') ? $this->Html->link($purchaseLine->seller->name, ['controller' => 'Sellers', 'action' => 'view', $purchaseLine->seller->id]) : '' ?></td>
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
            <div class="related">
                <?= $this->element('purchase_updates/view_related_purchase_updates', ['purchaseUpdates' => $purchaseLine->purchase_updates]) ?>
            </div>
        </div>
    </div>
</div>
