<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sale'), ['action' => 'edit', $sale->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sale'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sale'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Add Sale Line'), ['controller' => 'sale_lines', 'action' => 'add', 'sale', $sale->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Add Sale Update'), ['controller' => 'sale_updates', 'action' => 'add', $sale->id], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sales view content">
            <table class="no-flex">
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($sale->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($sale->transaction_trigger->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Merchant') ?></th>
                    <td><?= $sale->has('merchant') ? $this->Html->link($sale->merchant->name, ['controller' => 'Merchants', 'action' => 'view', $sale->merchant->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer') ?></th>
                    <td><?= $sale->has('customer') ? $this->Html->link($sale->customer->name, ['controller' => 'Customers', 'action' => 'view', $sale->customer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Number') ?></th>
                    <td><?= h($sale->sale_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Url') ?></th>
                    <td><?= h($sale->sale_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($sale->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($sale->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Sale Updates') ?></h4>
                <?php if (!empty($sale->sale_updates)) : ?>
                <div class="table-responsive as-list">
                    <table class="border">
                        <thead>
                            <tr>
                                <th><?= __('Date') ?></th>
                                <th><?= __('Status') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sale->sale_updates as $saleUpdates) : ?>
                            <tr <?= (!empty($saleUpdates->sale_lines)) ? 'class="parent-table"' : '' ?> >
                                <td data-label="<?= __('Date') ?>"><div><?= h($saleUpdates->date) ?></div></td>
                                <td data-label="<?= __('Status') ?>"><div><?= $saleUpdates->has('sale_status') ? $this->Html->link($saleUpdates->sale_status->name, ['controller' => 'SaleStatus', 'action' => 'view', $saleUpdates->sale_status->id]) : '' ?></div></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'SaleUpdates', 'action' => 'view', $saleUpdates->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'SaleUpdates', 'action' => 'edit', $saleUpdates->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SaleUpdates', 'action' => 'delete', $saleUpdates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleUpdates->id)]) ?>
                                    <?php if (in_array($saleUpdates->sale_status->short_name, $initialStates)): ?>
                                    <?= $this->Html->link(__('Add Sale Line'), ['controller' => 'SaleLines', 'action' => 'add', 'sale_update', $saleUpdates->id]) ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php if (!empty($saleUpdates->sale_lines)) : ?>
                            <tr class="child-table">
                                <td colspan="3">
                                    <table class="border">
                                        <thead>
                                            <tr>
                                                <th><?= __('Quantity') ?></th>
                                                <th><?= __('Product') ?></th>
                                                <th><?= __('Price') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($saleUpdates->sale_lines as $saleLine) : ?>
                                            <tr>
                                                <td data-label="<?= __('Quantity') ?>"><?= $this->Number->format($saleLine->quantity, ['after' => $saleLine->has('unit') ?  ' ' . $saleLine->unit->short_name : '']); ?></td>
                                                <td data-label="<?= __('Product') ?>"><?= $this->Html->link($saleLine->has('product') ? ' ' . $saleLine->product->name : '', ['controller' => 'Products', 'action' => 'view', $saleLine->product_id]); ?></td>
                                                <td data-label="<?= __('Price') ?>"><?= $this->Number->currency($saleLine->price, $saleLine->currency->short_name, ['after' => $saleLine->has('currency') ?  ' ' . $saleLine->currency->short_name : '']); ?></td>
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
            </div>
        </div>
    </div>
</div>
