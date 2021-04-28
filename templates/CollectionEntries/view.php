<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CollectionEntry $collectionEntry
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Collection Entry'), ['action' => 'edit', $collectionEntry->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Collection Entry'), ['action' => 'delete', $collectionEntry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $collectionEntry->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Collection Entries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Collection Entry'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="collectionEntries view content">
            <h3><?= h($collectionEntry->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($collectionEntry->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $collectionEntry->has('product') ? $this->Html->link($collectionEntry->product->name, ['controller' => 'Products', 'action' => 'view', $collectionEntry->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Collection') ?></th>
                    <td><?= $collectionEntry->has('collection') ? $this->Html->link($collectionEntry->collection->name, ['controller' => 'Collections', 'action' => 'view', $collectionEntry->collection->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Collection Series') ?></th>
                    <td><?= $collectionEntry->has('collection_series') ? $this->Html->link($collectionEntry->collection_series->name, ['controller' => 'CollectionSeries', 'action' => 'view', $collectionEntry->collection_series->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($collectionEntry->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Number') ?></th>
                    <td><?= $this->Number->format($collectionEntry->number) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Collection Entry Details') ?></h4>
                <?php if (!empty($collectionEntry->collection_entry_details)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Collection Entry Id') ?></th>
                            <th><?= __('Region Id') ?></th>
                            <th><?= __('Condition Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($collectionEntry->collection_entry_details as $collectionEntryDetails) : ?>
                        <tr>
                            <td><?= h($collectionEntryDetails->id) ?></td>
                            <td><?= h($collectionEntryDetails->collection_entry_id) ?></td>
                            <td><?= h($collectionEntryDetails->region_id) ?></td>
                            <td><?= h($collectionEntryDetails->condition_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'CollectionEntryDetails', 'action' => 'view', $collectionEntryDetails->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'CollectionEntryDetails', 'action' => 'edit', $collectionEntryDetails->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CollectionEntryDetails', 'action' => 'delete', $collectionEntryDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $collectionEntryDetails->id)]) ?>
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
