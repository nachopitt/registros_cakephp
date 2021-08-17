<h4><?= __('Related Sale Updates') ?></h4>
<?php if (!empty($saleUpdates)) : ?>
<div class="table-responsive">
    <table>
        <tr>
            <th><?= __('Date') ?></th>
            <th><?= __('State') ?></th>
            <th><?= __('Shipment') ?></th>
            <th><?= __('Description') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($saleUpdates as $saleUpdate) : ?>
        <tr>
            <td><?= h($saleUpdate->date) ?></td>
            <td><?= h($states[$saleUpdate->state]) ?></td>
            <td><?= $saleUpdate->has('shipment') ? h($saleUpdate->shipment->summary) : '' ?></td>
            <td><?= h($saleUpdate->description) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'SaleUpdates', 'action' => 'view', $saleUpdate->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'SaleUpdates', 'action' => 'edit', $saleUpdate->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SaleUpdates', 'action' => 'delete', $saleUpdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleUpdate->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php endif; ?>
