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
                    <th><?= __('Sale Number') ?></th>
                    <td><?= h($sale->sale_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale Url') ?></th>
                    <td><?= h($sale->sale_url) ?></td>
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
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sale->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($sale->date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Sale Lines') ?></h4>
                <?php if (!empty($sale->sale_lines)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Sale Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Unit Id') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Discount') ?></th>
                            <th><?= __('Discount Percentage') ?></th>
                            <th><?= __('Currency Id') ?></th>
                            <th><?= __('Shipment Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sale->sale_lines as $saleLines) : ?>
                        <tr>
                            <td><?= h($saleLines->id) ?></td>
                            <td><?= h($saleLines->sale_id) ?></td>
                            <td><?= h($saleLines->product_id) ?></td>
                            <td><?= h($saleLines->quantity) ?></td>
                            <td><?= h($saleLines->unit_id) ?></td>
                            <td><?= h($saleLines->price) ?></td>
                            <td><?= h($saleLines->discount) ?></td>
                            <td><?= h($saleLines->discount_percentage) ?></td>
                            <td><?= h($saleLines->currency_id) ?></td>
                            <td><?= h($saleLines->shipment_id) ?></td>
                            <td><?= h($saleLines->description) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SaleLines', 'action' => 'view', $saleLines->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SaleLines', 'action' => 'edit', $saleLines->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SaleLines', 'action' => 'delete', $saleLines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleLines->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Transactions') ?></h4>
                <?php if (!empty($sale->transactions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Money Account Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Purchase Id') ?></th>
                            <th><?= __('Sale Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sale->transactions as $transactions) : ?>
                        <tr>
                            <td><?= h($transactions->id) ?></td>
                            <td><?= h($transactions->amount) ?></td>
                            <td><?= h($transactions->money_account_id) ?></td>
                            <td><?= h($transactions->description) ?></td>
                            <td><?= h($transactions->purchase_id) ?></td>
                            <td><?= h($transactions->sale_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Transactions', 'action' => 'view', $transactions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Transactions', 'action' => 'edit', $transactions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactions->id)]) ?>
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
