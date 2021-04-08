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
            <h3><?= h($purchase->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Purchase Number') ?></th>
                    <td><?= h($purchase->purchase_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Purchase Url') ?></th>
                    <td><?= h($purchase->purchase_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Merchant') ?></th>
                    <td><?= $purchase->has('merchant') ? $this->Html->link($purchase->merchant->name, ['controller' => 'Merchants', 'action' => 'view', $purchase->merchant->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Seller') ?></th>
                    <td><?= $purchase->has('seller') ? $this->Html->link($purchase->seller->name, ['controller' => 'Sellers', 'action' => 'view', $purchase->seller->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($purchase->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($purchase->date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Purchase Lines') ?></h4>
                <?php if (!empty($purchase->purchase_lines)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Purchase Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Unit Id') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Discount') ?></th>
                            <th><?= __('Discount Percentage') ?></th>
                            <th><?= __('Currency Id') ?></th>
                            <th><?= __('Shipment Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($purchase->purchase_lines as $purchaseLines) : ?>
                        <tr>
                            <td><?= h($purchaseLines->id) ?></td>
                            <td><?= h($purchaseLines->purchase_id) ?></td>
                            <td><?= h($purchaseLines->product_id) ?></td>
                            <td><?= h($purchaseLines->quantity) ?></td>
                            <td><?= h($purchaseLines->unit_id) ?></td>
                            <td><?= h($purchaseLines->price) ?></td>
                            <td><?= h($purchaseLines->discount) ?></td>
                            <td><?= h($purchaseLines->discount_percentage) ?></td>
                            <td><?= h($purchaseLines->currency_id) ?></td>
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
                <h4><?= __('Related Transactions') ?></h4>
                <?php if (!empty($purchase->transactions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Money Account Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Purchase Id') ?></th>
                            <th><?= __('Sale Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($purchase->transactions as $transactions) : ?>
                        <tr>
                            <td><?= h($transactions->id) ?></td>
                            <td><?= h($transactions->amount) ?></td>
                            <td><?= h($transactions->money_account_id) ?></td>
                            <td><?= h($transactions->description) ?></td>
                            <td><?= h($transactions->purchase_id) ?></td>
                            <td><?= h($transactions->sale_id) ?></td>
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
