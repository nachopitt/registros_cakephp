<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SaleLine[]|\Cake\Collection\CollectionInterface $saleLines
 */
?>
<div class="saleLines index content">
    <?= $this->Html->link(__('New Sale Line'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sale Lines') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('sale_id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('discount') ?></th>
                    <th><?= $this->Paginator->sort('subtotal') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($saleLines as $saleLine): ?>
                <tr>
                    <td><?= $saleLine->has('sale') ? $this->Html->link($saleLine->sale->summary, ['controller' => 'Sales', 'action' => 'view', $saleLine->sale->id]) : '' ?></td>
                    <td><?= $saleLine->has('product') ? $this->Html->link($saleLine->product->name, ['controller' => 'Products', 'action' => 'view', $saleLine->product->id]) : '' ?></td>
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
                        <?= $this->Html->link(__('View'), ['action' => 'view', $saleLine->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $saleLine->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $saleLine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleLine->id)]) ?>
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
