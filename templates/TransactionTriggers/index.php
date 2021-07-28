<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransactionTrigger[]|\Cake\Collection\CollectionInterface $transactionTriggers
 */
?>
<div class="transactionTriggers index content">
    <?= $this->Html->link(__('New Transaction Trigger'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Transaction Triggers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactionTriggers as $transactionTrigger): ?>
                <tr>
                    <td><?= $this->Number->format($transactionTrigger->id) ?></td>
                    <td><?= h($transactionTrigger->date) ?></td>
                    <td><?= h($types[$transactionTrigger->type]) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $transactionTrigger->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transactionTrigger->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transactionTrigger->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactionTrigger->id)]) ?>
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
