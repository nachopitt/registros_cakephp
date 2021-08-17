<h4><?= __('Related Sale Updates') ?></h4>
<?php if (!empty($saleUpdates)) : ?>
<div class="table-responsive as-list">
    <table class="border">
        <thead>
            <tr>
                <th><?= __('Date') ?></th>
                <th><?= __('State') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Product') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Subtotal') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($saleUpdates as $saleUpdate) : ?>
            <tr>
                <td data-label="<?= __('Date') ?>"><div><?= h($saleUpdate->date) ?></div></td>
                <td data-label="<?= __('State') ?>"><div><?= h($states[$saleUpdate->state]) ?></div></td>
                <td colspan="4">
                    <?php if (!empty($saleUpdate->sale_lines)) : ?>
                    <table class="border no-head">
                        <thead>
                            <tr>
                                <th><?= __('Quantity') ?></th>
                                <th><?= __('Product') ?></th>
                                <th><?= __('Price') ?></th>
                                <th><?= __('Subtotal') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($saleUpdate->sale_lines as $saleLine) : ?>
                            <tr>
                                <td data-label="<?= __('Quantity') ?>"><?= $this->Number->format($saleLine->quantity, ['after' => $saleLine->has('unit') ?  ' ' . $saleLine->unit->short_name : '']); ?></td>
                                <td data-label="<?= __('Product') ?>"><?= $this->Html->link($saleLine->has('product') ? ' ' . $saleLine->product->name : '', ['controller' => 'Products', 'action' => 'view', $saleLine->product_id]); ?></td>
                                <td data-label="<?= __('Price') ?>"><?= $this->Number->currency($saleLine->price, $saleLine->currency->short_name, ['after' => $saleLine->has('currency') ?  ' ' . $saleLine->currency->short_name : '']); ?></td>
                                <td data-label="<?= __('Subtotal') ?>"><?= $this->Number->currency($saleLine->subtotal, $saleLine->currency->short_name, ['after' => $saleLine->has('currency') ?  ' ' . $saleLine->currency->short_name : '']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SaleUpdates', 'action' => 'view', $saleUpdate->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SaleUpdates', 'action' => 'edit', $saleUpdate->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SaleUpdates', 'action' => 'delete', $saleUpdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleUpdate->id)]) ?>
                    <div>
                            <?= $this->Html->link(__('Add Sale Line'), ['controller' => 'SaleLines', 'action' => 'add', 'sale_update', $saleUpdate->id]) ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>
