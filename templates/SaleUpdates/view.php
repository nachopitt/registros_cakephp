<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SaleUpdate $saleUpdate
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sale Update'), ['action' => 'edit', $saleUpdate->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sale Update'), ['action' => 'delete', $saleUpdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleUpdate->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sale Updates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sale Update'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Add Sale Line'), ['controller' => 'SaleLines', 'action' => 'add', 'sale_update', $saleUpdate->id], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="saleUpdates view content">
            <h3><?= h($saleUpdate->summary) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($saleUpdate->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale') ?></th>
                    <td><?= $saleUpdate->has('sale') ? $this->Html->link($saleUpdate->sale->summary, ['controller' => 'Sales', 'action' => 'view', $saleUpdate->sale->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($saleUpdate->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($states[$saleUpdate->state]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Shipment') ?></th>
                    <td><?= $saleUpdate->has('shipment') ? $this->Html->link($saleUpdate->shipment->summary, ['controller' => 'Shipments', 'action' => 'view', $saleUpdate->shipment->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($saleUpdate->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($saleUpdate->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($saleUpdate->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <?= $this->element('sale_lines/view_related_sale_lines', ['saleLines' => $saleUpdate->sale_lines]) ?>
            </div>
        </div>
    </div>
</div>
