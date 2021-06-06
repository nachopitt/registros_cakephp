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
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="saleUpdates view content">
            <h3><?= h($saleUpdate->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sale') ?></th>
                    <td><?= $saleUpdate->has('sale') ? $this->Html->link($saleUpdate->sale->id, ['controller' => 'Sales', 'action' => 'view', $saleUpdate->sale->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($statuses[$saleUpdate->status]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($saleUpdate->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($saleUpdate->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($saleUpdate->date) ?></td>
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
                <h4><?= __('Related Sale Lines') ?></h4>
                <?php if (!empty($saleUpdate->sale_lines)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Unit Id') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Discount') ?></th>
                            <th><?= __('Percentage Discount') ?></th>
                            <th><?= __('Unit Discount') ?></th>
                            <th><?= __('Currency Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Shipment Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($saleUpdate->sale_lines as $saleLines) : ?>
                        <tr>
                            <td><?= h($saleLines->id) ?></td>
                            <td><?= h($saleLines->product_id) ?></td>
                            <td><?= h($saleLines->quantity) ?></td>
                            <td><?= h($saleLines->unit_id) ?></td>
                            <td><?= h($saleLines->price) ?></td>
                            <td><?= h($saleLines->discount) ?></td>
                            <td><?= h($saleLines->percentage_discount) ?></td>
                            <td><?= h($saleLines->unit_discount) ?></td>
                            <td><?= h($saleLines->currency_id) ?></td>
                            <td><?= h($saleLines->description) ?></td>
                            <td><?= h($saleLines->shipment_id) ?></td>
                            <td><?= h($saleLines->created) ?></td>
                            <td><?= h($saleLines->modified) ?></td>
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
        </div>
    </div>
</div>
