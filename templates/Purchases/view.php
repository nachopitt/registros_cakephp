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
                    <th><?= __('Date') ?></th>
                    <td><?= h($purchase->date) ?></td>
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
                            <th><?= __('Id') ?></th>
                            <th><?= __('Purchase Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($purchase->purchase_updates as $purchaseUpdates) : ?>
                        <tr>
                            <td><?= h($purchaseUpdates->id) ?></td>
                            <td><?= h($purchaseUpdates->purchase_id) ?></td>
                            <td><?= h($purchaseUpdates->date) ?></td>
                            <td><?= h($purchaseUpdates->status) ?></td>
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
