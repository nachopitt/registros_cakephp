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
            <table>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($purchase->transaction_trigger->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Merchant') ?></th>
                    <td><?= $purchase->has('merchant') ? $this->Html->link($purchase->merchant->name, ['controller' => 'Merchants', 'action' => 'view', $purchase->merchant->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Purchase Number') ?></th>
                    <td><?= h($purchase->purchase_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Purchase Url') ?></th>
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
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Purchase Status') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Product') ?></th>
                            <th><?= __('Price') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($purchase->purchase_updates as $purchaseUpdates) : ?>
                        <?php if (!empty($purchaseUpdates->purchase_lines)) : ?>
                        <?php foreach ($purchaseUpdates->purchase_lines as $purchaseLine) : ?>
                        <tr>
                            <td><?= h($purchaseUpdates->date) ?></td>
                            <td><?= $purchaseUpdates->has('purchase_status') ? $this->Html->link($purchaseUpdates->purchase_status->name, ['controller' => 'PurchaseUpdates', 'action' => 'view', $purchaseUpdates->purchase_status->id]) : '' ?></td>
                            <td><?= $this->Number->format($purchaseLine->quantity) . ($purchaseLine->has('unit') ? ' ' . $this->Html->link($purchaseLine->unit->name, ['controller' => 'Units', 'action' => 'view', $purchaseLine->unit->id]) : '') ?></td>
                            <td><?= $purchaseLine->has('product') ? $this->Html->link($purchaseLine->product->name, ['controller' => 'Products', 'action' => 'view', $purchaseLine->product->id]) : '' ?></td>
                            <td><?= $this->Number->format($purchaseLine->price) . ($purchaseLine->has('currency') ? ' ' . $this->Html->link($purchaseLine->currency->name, ['controller' => 'Currencies', 'action' => 'view', $purchaseLine->currency->id]) : '') ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PurchaseUpdates', 'action' => 'view', $purchaseUpdates->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseUpdates', 'action' => 'edit', $purchaseUpdates->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseUpdates', 'action' => 'delete', $purchaseUpdates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseUpdates->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <tr>
                            <td><?= h($purchaseUpdates->date) ?></td>
                            <td><?= $purchaseUpdates->has('purchase_status') ? $this->Html->link($purchaseUpdates->purchase_status->name, ['controller' => 'PurchaseUpdates', 'action' => 'view', $purchaseUpdates->purchase_status->id]) : '' ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PurchaseUpdates', 'action' => 'view', $purchaseUpdates->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseUpdates', 'action' => 'edit', $purchaseUpdates->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseUpdates', 'action' => 'delete', $purchaseUpdates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseUpdates->id)]) ?>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
