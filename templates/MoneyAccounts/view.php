<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MoneyAccount $moneyAccount
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Money Account'), ['action' => 'edit', $moneyAccount->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Money Account'), ['action' => 'delete', $moneyAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $moneyAccount->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Money Accounts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Money Account'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="moneyAccounts view content">
            <h3><?= h($moneyAccount->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($moneyAccount->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Number') ?></th>
                    <td><?= h($moneyAccount->number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Money Account Type') ?></th>
                    <td><?= $moneyAccount->has('money_account_type') ? $this->Html->link($moneyAccount->money_account_type->name, ['controller' => 'MoneyAccountTypes', 'action' => 'view', $moneyAccount->money_account_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($moneyAccount->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Transactions') ?></h4>
                <?php if (!empty($moneyAccount->transactions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Unit Id') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Discount') ?></th>
                            <th><?= __('Discount Percentage') ?></th>
                            <th><?= __('Currency Id') ?></th>
                            <th><?= __('Money Account Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Purchase Line Id') ?></th>
                            <th><?= __('Sale Line Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($moneyAccount->transactions as $transactions) : ?>
                        <tr>
                            <td><?= h($transactions->id) ?></td>
                            <td><?= h($transactions->quantity) ?></td>
                            <td><?= h($transactions->unit_id) ?></td>
                            <td><?= h($transactions->price) ?></td>
                            <td><?= h($transactions->discount) ?></td>
                            <td><?= h($transactions->discount_percentage) ?></td>
                            <td><?= h($transactions->currency_id) ?></td>
                            <td><?= h($transactions->money_account_id) ?></td>
                            <td><?= h($transactions->description) ?></td>
                            <td><?= h($transactions->purchase_line_id) ?></td>
                            <td><?= h($transactions->sale_line_id) ?></td>
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
