<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CatalogEntry $catalogEntry
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Catalog Entry'), ['action' => 'edit', $catalogEntry->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Catalog Entry'), ['action' => 'delete', $catalogEntry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catalogEntry->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Catalog Entries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Catalog Entry'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="catalogEntries view content">
            <h3><?= h($catalogEntry->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($catalogEntry->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Catalog') ?></th>
                    <td><?= h($catalogEntry->catalog) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Tags') ?></h4>
                <?php if (!empty($catalogEntry->tags)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Entry Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($catalogEntry->tags as $tags) : ?>
                        <tr>
                            <td><?= h($tags->id) ?></td>
                            <td><?= h($tags->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $tags->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tags->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tags->id)]) ?>
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
