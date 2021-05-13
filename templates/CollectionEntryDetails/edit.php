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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $collectionEntryDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $collectionEntryDetail->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Collection Entry Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="collectionEntryDetails form content">
            <?= $this->Form->create($collectionEntryDetail) ?>
            <fieldset>
                <legend><?= __('Edit Collection Entry Detail') ?></legend>
                <?php
                    echo $this->Form->control('collection_entry_id', ['options' => $collectionEntries]);
                    echo $this->Form->control('collection_region_id', ['options' => $collectionRegions]);
                    echo $this->Form->control('collection_condition_id', ['options' => $collectionConditions]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
