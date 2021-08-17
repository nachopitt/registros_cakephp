<h4><?= __('Related Purchase Updates') ?></h4>
<?php if (!empty($purchaseUpdates)) : ?>
<div class="table-responsive as-list">
    <table class="border">
        <thead>
            <tr>
                <th><?= __('Date') ?></th>
                <th><?= __('State') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($purchaseUpdates as $purchaseUpdate) : ?>
            <tr <?= (!empty($purchaseUpdate->purchase_lines)) ? 'class="parent-table"' : '' ?> >
                <td data-label="<?= __('Date') ?>"><div><?= h($purchaseUpdate->date) ?></div></td>
                <td data-label="<?= __('State') ?>"><div><?= h($states[$purchaseUpdate->state]) ?></div></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PurchaseUpdate', 'action' => 'view', $purchaseUpdate->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseUpdate', 'action' => 'edit', $purchaseUpdate->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseUpdate', 'action' => 'delete', $purchaseUpdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseUpdate->id)]) ?>
                    <?= $this->Html->link(__('Add Purchase Line'), ['controller' => 'PurchaseLines', 'action' => 'add', 'purchase_update', $purchaseUpdate->id]) ?>
                </td>
            </tr>
            <?php if (!empty($purchaseUpdate->purchase_lines)) : ?>
            <tr class="child-table">
                <td colspan="4">
                    <table class="border">
                        <thead>
                            <tr>
                                <th><?= __('Quantity') ?></th>
                                <th><?= __('Product') ?></th>
                                <th><?= __('Price') ?></th>
                                <th><?= __('Subtotal') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($purchaseUpdate->purchase_lines as $purchaseLine) : ?>
                            <tr>
                                <td data-label="<?= __('Quantity') ?>"><?= $this->Number->format($purchaseLine->quantity, ['after' => $purchaseLine->has('unit') ?  ' ' . $purchaseLine->unit->short_name : '']); ?></td>
                                <td data-label="<?= __('Product') ?>"><?= $this->Html->link($purchaseLine->has('product') ? ' ' . $purchaseLine->product->name : '', ['controller' => 'Products', 'action' => 'view', $purchaseLine->product_id]); ?></td>
                                <td data-label="<?= __('Price') ?>"><?= $this->Number->currency($purchaseLine->price, $purchaseLine->currency->short_name, ['after' => $purchaseLine->has('currency') ?  ' ' . $purchaseLine->currency->short_name : '']); ?></td>
                                <td data-label="<?= __('Subtotal') ?>"><?= $this->Number->currency($purchaseLine->subtotal, $purchaseLine->currency->short_name, ['after' => $purchaseLine->has('currency') ?  ' ' . $purchaseLine->currency->short_name : '']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>
