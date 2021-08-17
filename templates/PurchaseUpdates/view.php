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
            <?= $this->Html->link(__('Add Purchase Line'), ['controller' => 'PurchaseLines', 'action' => 'add', 'purchase_update', $purchaseUpdate->id], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchaseUpdates view content">
            <h3><?= h($purchaseUpdate->summary) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($purchaseUpdate->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Purchase') ?></th>
                    <td><?= $purchaseUpdate->has('purchase') ? $this->Html->link($purchaseUpdate->purchase->summary, ['controller' => 'Purchases', 'action' => 'view', $purchaseUpdate->purchase->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($purchaseUpdate->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($states[$purchaseUpdate->state]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Shipment') ?></th>
                    <td><?= $purchaseUpdate->has('shipment') ? $this->Html->link($purchaseUpdate->shipment->summary, ['controller' => 'Shipments', 'action' => 'view', $purchaseUpdate->shipment->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($purchaseUpdate->description) ?></td>
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
                <?= $this->Element('purchase_lines/view_related_purchase_lines', ['purchaseLines' => $purchaseUpdate->purchase_lines]) ?>
            </div>
        </div>
    </div>
</div>
