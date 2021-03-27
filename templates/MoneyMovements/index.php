<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MoneyMovement[]|\Cake\Collection\CollectionInterface $moneyMovements
 */
?>
<div class="moneyMovements index content">
    <?= $this->Html->link(__('New Money Movement'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Money Movements') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('unit_id') ?></th>
                    <th><?= $this->Paginator->sort('currency_id') ?></th>
                    <th><?= $this->Paginator->sort('payment_method_id') ?></th>
                    <th><?= $this->Paginator->sort('discount') ?></th>
                    <th><?= $this->Paginator->sort('discount_percentage') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($moneyMovements as $moneyMovement): ?>
                <tr>
                    <td><?= $this->Number->format($moneyMovement->id) ?></td>
                    <td><?= $this->Number->format($moneyMovement->price) ?></td>
                    <td><?= $this->Number->format($moneyMovement->quantity) ?></td>
                    <td><?= $moneyMovement->has('unit') ? $this->Html->link($moneyMovement->unit->name, ['controller' => 'Units', 'action' => 'view', $moneyMovement->unit->id]) : '' ?></td>
                    <td><?= $moneyMovement->has('currency') ? $this->Html->link($moneyMovement->currency->name, ['controller' => 'Currencies', 'action' => 'view', $moneyMovement->currency->id]) : '' ?></td>
                    <td><?= $moneyMovement->has('payment_method') ? $this->Html->link($moneyMovement->payment_method->name, ['controller' => 'PaymentMethods', 'action' => 'view', $moneyMovement->payment_method->id]) : '' ?></td>
                    <td><?= $this->Number->format($moneyMovement->discount) ?></td>
                    <td><?= $this->Number->format($moneyMovement->discount_percentage) ?></td>
                    <td><?= h($moneyMovement->description) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $moneyMovement->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $moneyMovement->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $moneyMovement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $moneyMovement->id)]) ?>
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
