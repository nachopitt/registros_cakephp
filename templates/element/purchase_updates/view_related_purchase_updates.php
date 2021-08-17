<h4><?= __('Related Purchase Updates') ?></h4>
<?php if (!empty($purchaseUpdates)) : ?>
<div class="table-responsive">
    <table>
        <tr>
            <th><?= __('Date') ?></th>
            <th><?= __('State') ?></th>
            <th><?= __('Shipment') ?></th>
            <th><?= __('Description') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($purchaseUpdates as $purchaseUpdate) : ?>
        <tr>
            <td><?= h($purchaseUpdate->date) ?></td>
            <td><?= h($states[$purchaseUpdate->state]) ?></td>
            <td><?= $purchaseUpdate->has('shipment') ? h($purchaseUpdate->shipment->summary) : '' ?></td>
            <td><?= h($purchaseUpdate->description) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'PurchaseUpdates', 'action' => 'view', $purchaseUpdate->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseUpdates', 'action' => 'edit', $purchaseUpdate->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseUpdates', 'action' => 'delete', $purchaseUpdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseUpdate->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php endif; ?>