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
            <?= $this->Html->link(__('Add Purchase Line'), ['controller' => 'PurchaseLines', 'action' => 'add', 'purchase', $purchase->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Add Purchase Update'), ['controller' => 'PurchaseUpdates', 'action' => 'add', 'purchase', $purchase->id], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchases view content">
            <h3><?= h($purchase->summary) ?></h3>
            <table class="no-flex">
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($purchase->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Transaction Trigger') ?></th>
                    <td><?= $purchase->has('transaction_trigger') ? $this->Html->link($purchase->transaction_trigger->summary, ['controller' => 'TransactionTriggers', 'action' => 'view', $purchase->transaction_trigger->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($states[$purchase->state]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Merchant') ?></th>
                    <td><?= $purchase->has('merchant') ? $this->Html->link($purchase->merchant->name, ['controller' => 'Merchants', 'action' => 'view', $purchase->merchant->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Number') ?></th>
                    <td><?= h($purchase->number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Url') ?></th>
                    <td><?= h($purchase->url) ?></td>
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
                <h4><?= __('Related Purchase Lines') ?></h4>
                <?php if (!empty($purchase->purchase_lines)) : ?>
                <div class="table-responsive">
                    <table>
                            <tr>
                            <th><?= __('Product') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Discount') ?></th>
                            <th><?= __('Percentage Discount') ?></th>
                            <th><?= __('Unit Discount') ?></th>
                            <th><?= __('Subtotal') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Seller') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        <?php foreach ($purchase->purchase_lines as $purchaseLines) : ?>
                            <tr>
                            <td><?= $this->Html->link($purchaseLines->has('product') ? ' ' . $purchaseLines->product->name : '', ['controller' => 'Products', 'action' => 'view', $purchaseLines->product_id]); ?></td>
                            <td><?= $this->Number->format($purchaseLines->quantity, ['after' => $purchaseLines->has('unit') ?  ' ' . $purchaseLines->unit->short_name : '']); ?></td>
                            <td><?= $this->Number->currency($purchaseLines->price, $purchaseLines->currency->short_name, ['after' => $purchaseLines->has('currency') ?  ' ' . $purchaseLines->currency->short_name : '']); ?></td>
                            <td><?= h($purchaseLines->discount) ?></td>
                            <td><?= h($purchaseLines->percentage_discount) ?></td>
                            <td><?= h($purchaseLines->unit_discount) ?></td>
                            <td><?= $this->Number->currency($purchaseLines->subtotal, $purchaseLines->currency->short_name, ['after' => $purchaseLines->has('currency') ?  ' ' . $purchaseLines->currency->short_name : '']); ?></td>
                            <td><?= h($purchaseLines->description) ?></td>
                            <td><?= $this->Html->link($purchaseLines->has('seller') ? ' ' . $purchaseLines->seller->name : '', ['controller' => 'Products', 'action' => 'view', $purchaseLines->seller_id]); ?></td>
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
                <?= $this->element('purchases/view_purchase_related_purchase_updates_1', ['purchaseUpdates' => $purchase->purchase_updates]) ?>
            </div>
        </div>
    </div>
</div>
