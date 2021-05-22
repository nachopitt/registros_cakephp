<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseUpdate $purchaseUpdate
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Purchase Update'), ['action' => 'edit', $purchaseUpdate->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Purchase Update'), ['action' => 'delete', $purchaseUpdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseUpdate->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Purchase Updates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Purchase Update'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchaseUpdates view content">
            <h3><?= h($purchaseUpdate->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Purchase') ?></th>
                    <td><?= $purchaseUpdate->has('purchase') ? $this->Html->link($purchaseUpdate->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $purchaseUpdate->purchase->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($purchaseUpdate->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($purchaseUpdate->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($purchaseUpdate->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($purchaseUpdate->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($purchaseUpdate->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($purchaseUpdate->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Purchase Lines') ?></h4>
                <?php if (!empty($purchaseUpdate->purchase_lines)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Unit Id') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Discount') ?></th>
                            <th><?= __('Discount Percentage') ?></th>
                            <th><?= __('Currency Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Shipment Id') ?></th>
                            <th><?= __('Seller Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($purchaseUpdate->purchase_lines as $purchaseLines) : ?>
                        <tr>
                            <td><?= h($purchaseLines->id) ?></td>
                            <td><?= h($purchaseLines->product_id) ?></td>
                            <td><?= h($purchaseLines->quantity) ?></td>
                            <td><?= h($purchaseLines->unit_id) ?></td>
                            <td><?= h($purchaseLines->price) ?></td>
                            <td><?= h($purchaseLines->discount) ?></td>
                            <td><?= h($purchaseLines->discount_percentage) ?></td>
                            <td><?= h($purchaseLines->currency_id) ?></td>
                            <td><?= h($purchaseLines->description) ?></td>
                            <td><?= h($purchaseLines->shipment_id) ?></td>
                            <td><?= h($purchaseLines->seller_id) ?></td>
                            <td><?= h($purchaseLines->created) ?></td>
                            <td><?= h($purchaseLines->modified) ?></td>
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
        </div>
    </div>
</div>
