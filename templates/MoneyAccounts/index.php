<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MoneyAccount[]|\Cake\Collection\CollectionInterface $moneyAccounts
 */
?>
<div class="moneyAccounts index content">
    <?= $this->Html->link(__('New Money Account'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Money Accounts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('number') ?></th>
                    <th><?= $this->Paginator->sort('money_account_type_id') ?></th>
                    <th><?= $this->Paginator->sort('currency_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($moneyAccounts as $moneyAccount): ?>
                <tr>
                    <td><?= $this->Number->format($moneyAccount->id) ?></td>
                    <td><?= h($moneyAccount->name) ?></td>
                    <td><?= h($moneyAccount->number) ?></td>
                    <td><?= $moneyAccount->has('money_account_type') ? $this->Html->link($moneyAccount->money_account_type->name, ['controller' => 'MoneyAccountTypes', 'action' => 'view', $moneyAccount->money_account_type->id]) : '' ?></td>
                    <td><?= $moneyAccount->has('currency') ? $this->Html->link($moneyAccount->currency->name, ['controller' => 'Currencies', 'action' => 'view', $moneyAccount->currency->id]) : '' ?></td>
                    <td><?= h($moneyAccount->created) ?></td>
                    <td><?= h($moneyAccount->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $moneyAccount->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $moneyAccount->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $moneyAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $moneyAccount->id)]) ?>
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
