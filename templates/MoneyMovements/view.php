<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MoneyMovement $moneyMovement
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Money Movement'), ['action' => 'edit', $moneyMovement->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Money Movement'), ['action' => 'delete', $moneyMovement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $moneyMovement->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Money Movements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Money Movement'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="moneyMovements view content">
            <h3><?= h($moneyMovement->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Unit') ?></th>
                    <td><?= $moneyMovement->has('unit') ? $this->Html->link($moneyMovement->unit->name, ['controller' => 'Units', 'action' => 'view', $moneyMovement->unit->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Currency') ?></th>
                    <td><?= $moneyMovement->has('currency') ? $this->Html->link($moneyMovement->currency->name, ['controller' => 'Currencies', 'action' => 'view', $moneyMovement->currency->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment Method') ?></th>
                    <td><?= $moneyMovement->has('payment_method') ? $this->Html->link($moneyMovement->payment_method->name, ['controller' => 'PaymentMethods', 'action' => 'view', $moneyMovement->payment_method->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($moneyMovement->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($moneyMovement->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($moneyMovement->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($moneyMovement->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Discount') ?></th>
                    <td><?= $this->Number->format($moneyMovement->discount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Discount Percentage') ?></th>
                    <td><?= $this->Number->format($moneyMovement->discount_percentage) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Purchase Lines') ?></h4>
                <?php if (!empty($moneyMovement->purchase_lines)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Purchase Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Money Movement Id') ?></th>
                            <th><?= __('Shipment Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($moneyMovement->purchase_lines as $purchaseLines) : ?>
                        <tr>
                            <td><?= h($purchaseLines->id) ?></td>
                            <td><?= h($purchaseLines->purchase_id) ?></td>
                            <td><?= h($purchaseLines->product_id) ?></td>
                            <td><?= h($purchaseLines->money_movement_id) ?></td>
                            <td><?= h($purchaseLines->shipment_id) ?></td>
                            <td><?= h($purchaseLines->description) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PurchaseLines', 'action' => 'view', $purchaseLines->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseLines', 'action' => 'edit', $purchaseLines->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseLines', 'action' => 'delete', $purchaseLines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseLines->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Sale Lines') ?></h4>
                <?php if (!empty($moneyMovement->sale_lines)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Sale Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Money Movement Id') ?></th>
                            <th><?= __('Shipment Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($moneyMovement->sale_lines as $saleLines) : ?>
                        <tr>
                            <td><?= h($saleLines->id) ?></td>
                            <td><?= h($saleLines->sale_id) ?></td>
                            <td><?= h($saleLines->product_id) ?></td>
                            <td><?= h($saleLines->money_movement_id) ?></td>
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
        </div>
    </div>
</div>
