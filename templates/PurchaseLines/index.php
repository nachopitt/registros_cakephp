<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseLine[]|\Cake\Collection\CollectionInterface $purchaseLines
 */
?>
<div class="purchaseLines index content">
    <?= $this->Html->link(__('New Purchase Line'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Purchase Lines') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('unit_id') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('discount') ?></th>
                    <th><?= $this->Paginator->sort('discount_percentage') ?></th>
                    <th><?= $this->Paginator->sort('discount_unit') ?></th>
                    <th><?= $this->Paginator->sort('currency_id') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('shipment_id') ?></th>
                    <th><?= $this->Paginator->sort('seller_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($purchaseLines as $purchaseLine): ?>
                <tr>
                    <td><?= $this->Number->format($purchaseLine->id) ?></td>
                    <td><?= $purchaseLine->has('product') ? $this->Html->link($purchaseLine->product->name, ['controller' => 'Products', 'action' => 'view', $purchaseLine->product->id]) : '' ?></td>
                    <td><?= $this->Number->format($purchaseLine->quantity) ?></td>
                    <td><?= $purchaseLine->has('unit') ? $this->Html->link($purchaseLine->unit->name, ['controller' => 'Units', 'action' => 'view', $purchaseLine->unit->id]) : '' ?></td>
                    <td><?= $this->Number->format($purchaseLine->price) ?></td>
                    <td><?= $this->Number->format($purchaseLine->discount) ?></td>
                    <td><?= h($purchaseLine->discount_percentage) ?></td>
                    <td><?= h($purchaseLine->discount_unit) ?></td>
                    <td><?= $purchaseLine->has('currency') ? $this->Html->link($purchaseLine->currency->name, ['controller' => 'Currencies', 'action' => 'view', $purchaseLine->currency->id]) : '' ?></td>
                    <td><?= h($purchaseLine->description) ?></td>
                    <td><?= $purchaseLine->has('shipment') ? $this->Html->link($purchaseLine->shipment->id, ['controller' => 'Shipments', 'action' => 'view', $purchaseLine->shipment->id]) : '' ?></td>
                    <td><?= $purchaseLine->has('seller') ? $this->Html->link($purchaseLine->seller->name, ['controller' => 'Sellers', 'action' => 'view', $purchaseLine->seller->id]) : '' ?></td>
                    <td><?= h($purchaseLine->created) ?></td>
                    <td><?= h($purchaseLine->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $purchaseLine->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchaseLine->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchaseLine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseLine->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
