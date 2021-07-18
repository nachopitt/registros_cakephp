<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Purchase'), ['action' => 'edit', $purchase->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Purchase'), ['action' => 'delete', $purchase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Purchases'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Purchase'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchases view content">
            <table class="no-flex">
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($purchase->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($purchase->transaction_trigger->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Merchant') ?></th>
                    <td><?= $purchase->has('merchant') ? $this->Html->link($purchase->merchant->name, ['controller' => 'Merchants', 'action' => 'view', $purchase->merchant->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Number') ?></th>
                    <td><?= h($purchase->purchase_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Url') ?></th>
                    <td><?= h($purchase->purchase_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($purchase->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($purchase->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Purchase Updates') ?></h4>
                <?php if (!empty($purchase->purchase_updates)) : ?>
                <div class="table-responsive as-list">
                    <table class="border">
                        <thead>
                            <tr>
                                <th><?= __('Date') ?></th>
                                <th><?= __('Status') ?></th>
                                <th><?= __('Quantity') ?></th>
                                <th><?= __('Product') ?></th>
                                <th><?= __('Price') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($purchase->purchase_updates as $purchaseUpdates) : ?>
                            <tr>
                                <td data-label="<?= __('Date') ?>"><div><?= h($purchaseUpdates->date) ?></div></td>
                                <td data-label="<?= __('Status') ?>"><div><?= $purchaseUpdates->has('purchase_status') ? $this->Html->link($purchaseUpdates->purchase_status->name, ['controller' => 'PurchaseStatus', 'action' => 'view', $purchaseUpdates->purchase_status->id]) : '' ?></div></td>
                                <td colspan="3">
                                    <table class="border no-head">
                                        <thead>
                                            <tr>
                                                <th><?= __('Quantity') ?></th>
                                                <th><?= __('Product') ?></th>
                                                <th><?= __('Price') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($purchaseUpdates->purchase_lines as $purchaseLine) : ?>
                                            <tr>
                                                <td data-label="<?= __('Quantity') ?>"><?= $this->Number->format($purchaseLine->quantity, ['after' => $purchaseLine->has('unit') ?  ' ' . $purchaseLine->unit->short_name : '']); ?></td>
                                                <td data-label="<?= __('Product') ?>"><?= $this->Html->link($purchaseLine->has('product') ? ' ' . $purchaseLine->product->name : '', ['controller' => 'Products', 'action' => 'view', $purchaseLine->product_id]); ?></td>
                                                <td data-label="<?= __('Price') ?>"><?= $this->Number->currency($purchaseLine->price, $purchaseLine->currency->short_name, ['after' => $purchaseLine->has('currency') ?  ' ' . $purchaseLine->currency->short_name : '']); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'PurchaseUpdates', 'action' => 'view', $purchaseUpdates->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseUpdates', 'action' => 'edit', $purchaseUpdates->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseUpdates', 'action' => 'delete', $purchaseUpdates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseUpdates->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
