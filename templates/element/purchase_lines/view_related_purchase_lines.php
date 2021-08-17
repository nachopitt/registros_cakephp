<h4><?= __('Related Purchase Lines') ?></h4>
<?php if (!empty($purchaseLines)) : ?>
<div class="table-responsive">
    <table>
            <tr>
            <th><?= __('Product') ?></th>
            <th><?= __('Quantity') ?></th>
            <th><?= __('Price') ?></th>
            <th><?= __('Discount') ?></th>
            <th><?= __('Subtotal') ?></th>
            <th><?= __('Description') ?></th>
            <th><?= __('Seller') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
            </tr>
        <?php foreach ($purchaseLines as $purchaseLine) : ?>
            <tr>
            <td><?= $this->Html->link($purchaseLine->has('product') ? ' ' . $purchaseLine->product->name : '', ['controller' => 'Products', 'action' => 'view', $purchaseLine->product_id]); ?></td>
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
            <td><?= $this->Html->link($purchaseLine->has('seller') ? ' ' . $purchaseLine->seller->name : '', ['controller' => 'Products', 'action' => 'view', $purchaseLine->seller_id]); ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'PurchaseLines', 'action' => 'view', $purchaseLine->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseLines', 'action' => 'edit', $purchaseLine->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseLines', 'action' => 'delete', $purchaseLine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseLine->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php endif; ?>
