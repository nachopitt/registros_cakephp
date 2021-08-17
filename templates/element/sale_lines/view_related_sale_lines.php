<h4><?= __('Related Sale Lines') ?></h4>
<?php if (!empty($saleLines)) : ?>
<div class="table-responsive">
    <table>
            <tr>
            <th><?= __('Product') ?></th>
            <th><?= __('Quantity') ?></th>
            <th><?= __('Price') ?></th>
            <th><?= __('Discount') ?></th>
            <th><?= __('Subtotal') ?></th>
            <th><?= __('Description') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
            </tr>
        <?php foreach ($saleLines as $saleLine) : ?>
            <tr>
            <td><?= $this->Html->link($saleLine->has('product') ? ' ' . $saleLine->product->name : '', ['controller' => 'Products', 'action' => 'view', $saleLine->product_id]); ?></td>
            <td><?= $this->Number->format($saleLine->quantity, ['after' => $saleLine->has('unit') ?  ' ' . $saleLine->unit->short_name : '']); ?></td>
            <td><?= $this->Number->currency($saleLine->price, $saleLine->currency->short_name, ['after' => $saleLine->has('currency') ?  ' ' . $saleLine->currency->short_name : '']); ?></td>
            <td>
                <?php if ($saleLine->percentage_discount): ?>
                    <?= $this->Number->toPercentage($saleLine->discount); ?>
                <?php else: ?>
                    <?= $this->Number->currency($saleLine->discount, $saleLine->currency->short_name, ['after' => $saleLine->has('currency') ?  ' ' . $saleLine->currency->short_name : '']); ?>
                <?php endif;?>
            </td>
            <td><?= $this->Number->currency($saleLine->subtotal, $saleLine->currency->short_name, ['after' => $saleLine->has('currency') ?  ' ' . $saleLine->currency->short_name : '']); ?></td>
            <td><?= h($saleLine->description) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'SaleLines', 'action' => 'view', $saleLine->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'SaleLines', 'action' => 'edit', $saleLine->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SaleLines', 'action' => 'delete', $saleLine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleLine->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php endif; ?>
