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
            <?= $this->Html->link(__('List Collection Entry Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="collectionEntryDetails form content">
            <?= $this->Form->create($collectionEntryDetail) ?>
            <fieldset>
                <legend><?= __('Add Collection Entry Detail') ?></legend>
                <?php
                    echo $this->Form->control('collection_entry_id', ['options' => $collectionEntries]);
                    echo $this->Form->control('region_id', ['options' => $regions]);
                    echo $this->Form->control('condition_id', ['options' => $conditions]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
