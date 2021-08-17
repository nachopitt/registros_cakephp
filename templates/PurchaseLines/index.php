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
                    <th><?= $this->Paginator->sort('purchase_id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('discount') ?></th>
                    <th><?= $this->Paginator->sort('subtotal') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('seller_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($purchaseLines as $purchaseLine): ?>
                <tr>
                    <td><?= $purchaseLine->has('purchase') ? $this->Html->link($purchaseLine->purchase->summary, ['controller' => 'Purchases', 'action' => 'view', $purchaseLine->purchase->id]) : '' ?></td>
                    <td><?= $purchaseLine->has('product') ? $this->Html->link($purchaseLine->product->name, ['controller' => 'Products', 'action' => 'view', $purchaseLine->product->id]) : '' ?></td>
                    <td><?= $this->Number->format($purchaseLine->quantity, ['after' => $purchaseLine->has('unit') ?  ' ' . $purchaseLine->unit->short_name : '']); ?></td>
                    <td><?= $this->Number->currency($purchaseLine->price, $purchaseLine->currency->short_name, ['after' => $purchaseLine->has('currency') ?  ' ' . $purchaseLine->currency->short_name : '']); ?></td>
                    <td>
                        <?php if ($purchaseLine->percentage_discount): ?>
                            <?= $this->Number->toPercentage($purchaseLine->discount); ?>
                        <?php else: ?>
                            <?= $this->Number->currency($purchaseLine->discount, $purchaseLine->currency->short_name, ['after' => $purchaseLine->has('currency') ?  ' ' . $purchaseLine->currency->short_name : '']); ?>
                        <?php endif;?>
                    </td>
                    <td><?= $this->Number->currency($purchaseLine->subtotal, $purchaseLine->currency->short_name, ['after' => $purchaseLine->has('currency') ?  ' ' . $purchaseLine->currency->short_name : '']); ?></td>
                    <td><?= h($purchaseLine->description) ?></td>
                    <td><?= $purchaseLine->has('seller') ? $this->Html->link($purchaseLine->seller->name, ['controller' => 'Sellers', 'action' => 'view', $purchaseLine->seller->id]) : '' ?></td>
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
