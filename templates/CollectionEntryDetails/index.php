<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CollectionEntryDetail[]|\Cake\Collection\CollectionInterface $collectionEntryDetails
 */
?>
<div class="collectionEntryDetails index content">
    <?= $this->Html->link(__('New Collection Entry Detail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Collection Entry Details') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('collection_entry_id') ?></th>
                    <th><?= $this->Paginator->sort('collection_region_id') ?></th>
                    <th><?= $this->Paginator->sort('collection_condition_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($collectionEntryDetails as $collectionEntryDetail): ?>
                <tr>
                    <td><?= $this->Number->format($collectionEntryDetail->id) ?></td>
                    <td><?= $collectionEntryDetail->has('collection_entry') ? $this->Html->link($collectionEntryDetail->collection_entry->id, ['controller' => 'CollectionEntries', 'action' => 'view', $collectionEntryDetail->collection_entry->id]) : '' ?></td>
                    <td><?= $collectionEntryDetail->has('collection_region') ? $this->Html->link($collectionEntryDetail->collection_region->name, ['controller' => 'CollectionRegions', 'action' => 'view', $collectionEntryDetail->collection_region->id]) : '' ?></td>
                    <td><?= $collectionEntryDetail->has('collection_condition') ? $this->Html->link($collectionEntryDetail->collection_condition->name, ['controller' => 'CollectionConditions', 'action' => 'view', $collectionEntryDetail->collection_condition->id]) : '' ?></td>
                    <td><?= h($collectionEntryDetail->created) ?></td>
                    <td><?= h($collectionEntryDetail->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $collectionEntryDetail->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $collectionEntryDetail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $collectionEntryDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $collectionEntryDetail->id)]) ?>
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
