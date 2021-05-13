<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CollectionEntry[]|\Cake\Collection\CollectionInterface $collectionEntries
 */
?>
<div class="collectionEntries index content">
    <?= $this->Html->link(__('New Collection Entry'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Collection Entries') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('number') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('collection_id') ?></th>
                    <th><?= $this->Paginator->sort('collection_series_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($collectionEntries as $collectionEntry): ?>
                <tr>
                    <td><?= $this->Number->format($collectionEntry->id) ?></td>
                    <td><?= $this->Number->format($collectionEntry->number) ?></td>
                    <td><?= h($collectionEntry->description) ?></td>
                    <td><?= $collectionEntry->has('product') ? $this->Html->link($collectionEntry->product->name, ['controller' => 'Products', 'action' => 'view', $collectionEntry->product->id]) : '' ?></td>
                    <td><?= $collectionEntry->has('collection') ? $this->Html->link($collectionEntry->collection->name, ['controller' => 'Collections', 'action' => 'view', $collectionEntry->collection->id]) : '' ?></td>
                    <td><?= $collectionEntry->has('collection_series') ? $this->Html->link($collectionEntry->collection_series->name, ['controller' => 'CollectionSeries', 'action' => 'view', $collectionEntry->collection_series->id]) : '' ?></td>
                    <td><?= h($collectionEntry->created) ?></td>
                    <td><?= h($collectionEntry->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $collectionEntry->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $collectionEntry->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $collectionEntry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $collectionEntry->id)]) ?>
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
