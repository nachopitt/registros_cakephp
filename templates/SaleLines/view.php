<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SaleLine $saleLine
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sale Line'), ['action' => 'edit', $saleLine->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sale Line'), ['action' => 'delete', $saleLine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleLine->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sale Lines'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sale Line'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="saleLines view content">
            <h3><?= h($saleLine->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sale') ?></th>
                    <td><?= $saleLine->has('sale') ? $this->Html->link($saleLine->sale->id, ['controller' => 'Sales', 'action' => 'view', $saleLine->sale->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $saleLine->has('product') ? $this->Html->link($saleLine->product->name, ['controller' => 'Products', 'action' => 'view', $saleLine->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Unit') ?></th>
                    <td><?= $saleLine->has('unit') ? $this->Html->link($saleLine->unit->name, ['controller' => 'Units', 'action' => 'view', $saleLine->unit->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Currency') ?></th>
                    <td><?= $saleLine->has('currency') ? $this->Html->link($saleLine->currency->name, ['controller' => 'Currencies', 'action' => 'view', $saleLine->currency->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Shipment') ?></th>
                    <td><?= $saleLine->has('shipment') ? $this->Html->link($saleLine->shipment->id, ['controller' => 'Shipments', 'action' => 'view', $saleLine->shipment->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($saleLine->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($saleLine->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($saleLine->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($saleLine->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Discount') ?></th>
                    <td><?= $this->Number->format($saleLine->discount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Discount Percentage') ?></th>
                    <td><?= $this->Number->format($saleLine->discount_percentage) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
