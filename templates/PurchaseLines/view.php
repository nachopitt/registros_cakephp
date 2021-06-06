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
                    <th><?= __('Created') ?></th>
                    <td><?= h($purchaseLine->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($purchaseLine->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Percentage Discount') ?></th>
                    <td><?= $purchaseLine->percentage_discount ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Unit Discount') ?></th>
                    <td><?= $purchaseLine->unit_discount ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Purchase Updates') ?></h4>
                <?php if (!empty($purchaseLine->purchase_updates)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Purchase Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Shipment Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($purchaseLine->purchase_updates as $purchaseUpdates) : ?>
                        <tr>
                            <td><?= h($purchaseUpdates->id) ?></td>
                            <td><?= h($purchaseUpdates->purchase_id) ?></td>
                            <td><?= h($purchaseUpdates->date) ?></td>
                            <td><?= h($statuses[$purchaseUpdates->status]) ?></td>
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
        </div>
    </div>
</div>
