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
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('unit_id') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('discount') ?></th>
                    <th><?= $this->Paginator->sort('percentage_discount') ?></th>
                    <th><?= $this->Paginator->sort('unit_discount') ?></th>
                    <th><?= $this->Paginator->sort('currency_id') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('shipment_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($saleLines as $saleLine): ?>
                <tr>
                    <td><?= $this->Number->format($saleLine->id) ?></td>
                    <td><?= $saleLine->has('product') ? $this->Html->link($saleLine->product->name, ['controller' => 'Products', 'action' => 'view', $saleLine->product->id]) : '' ?></td>
                    <td><?= $this->Number->format($saleLine->quantity) ?></td>
                    <td><?= $saleLine->has('unit') ? $this->Html->link($saleLine->unit->name, ['controller' => 'Units', 'action' => 'view', $saleLine->unit->id]) : '' ?></td>
                    <td><?= $this->Number->format($saleLine->price) ?></td>
                    <td><?= $this->Number->format($saleLine->discount) ?></td>
                    <td><?= h($saleLine->percentage_discount) ?></td>
                    <td><?= h($saleLine->unit_discount) ?></td>
                    <td><?= $saleLine->has('currency') ? $this->Html->link($saleLine->currency->name, ['controller' => 'Currencies', 'action' => 'view', $saleLine->currency->id]) : '' ?></td>
                    <td><?= h($saleLine->description) ?></td>
                    <td><?= $saleLine->has('shipment') ? $this->Html->link($saleLine->shipment->id, ['controller' => 'Shipments', 'action' => 'view', $saleLine->shipment->id]) : '' ?></td>
                    <td><?= h($saleLine->created) ?></td>
                    <td><?= h($saleLine->modified) ?></td>
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
