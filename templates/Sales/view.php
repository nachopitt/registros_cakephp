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
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sales view content">
            <h3><?= h($sale->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Merchant') ?></th>
                    <td><?= $sale->has('merchant') ? $this->Html->link($sale->merchant->name, ['controller' => 'Merchants', 'action' => 'view', $sale->merchant->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer') ?></th>
                    <td><?= $sale->has('customer') ? $this->Html->link($sale->customer->name, ['controller' => 'Customers', 'action' => 'view', $sale->customer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale Number') ?></th>
                    <td><?= h($sale->sale_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale Url') ?></th>
                    <td><?= h($sale->sale_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Transaction Trigger') ?></th>
                    <td><?= $sale->has('transaction_trigger') ? $this->Html->link($sale->transaction_trigger->id, ['controller' => 'TransactionTriggers', 'action' => 'view', $sale->transaction_trigger->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sale->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($sale->date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Sale Updates') ?></h4>
                <?php if (!empty($sale->sale_updates)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Sale Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Satus') ?></th>
                            <th><?= __('Description') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sale->sale_updates as $saleUpdates) : ?>
                        <tr>
                            <td><?= h($saleUpdates->id) ?></td>
                            <td><?= h($saleUpdates->sale_id) ?></td>
                            <td><?= h($saleUpdates->date) ?></td>
                            <td><?= h($saleUpdates->satus) ?></td>
                            <td><?= h($saleUpdates->description) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SaleUpdates', 'action' => 'view', $saleUpdates->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SaleUpdates', 'action' => 'edit', $saleUpdates->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SaleUpdates', 'action' => 'delete', $saleUpdates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleUpdates->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
