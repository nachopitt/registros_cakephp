<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CollectionEntryDetail $collectionEntryDetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Collection Entry Detail'), ['action' => 'edit', $collectionEntryDetail->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Collection Entry Detail'), ['action' => 'delete', $collectionEntryDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $collectionEntryDetail->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Collection Entry Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Collection Entry Detail'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="collectionEntryDetails view content">
            <h3><?= h($collectionEntryDetail->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Collection Entry') ?></th>
                    <td><?= $collectionEntryDetail->has('collection_entry') ? $this->Html->link($collectionEntryDetail->collection_entry->id, ['controller' => 'CollectionEntries', 'action' => 'view', $collectionEntryDetail->collection_entry->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Collection Region') ?></th>
                    <td><?= $collectionEntryDetail->has('collection_region') ? $this->Html->link($collectionEntryDetail->collection_region->name, ['controller' => 'CollectionRegions', 'action' => 'view', $collectionEntryDetail->collection_region->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Collection Condition') ?></th>
                    <td><?= $collectionEntryDetail->has('collection_condition') ? $this->Html->link($collectionEntryDetail->collection_condition->name, ['controller' => 'CollectionConditions', 'action' => 'view', $collectionEntryDetail->collection_condition->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($collectionEntryDetail->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
