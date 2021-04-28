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
            <?= $this->Html->link(__('List Collection Entries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="collectionEntries form content">
            <?= $this->Form->create($collectionEntry) ?>
            <fieldset>
                <legend><?= __('Add Collection Entry') ?></legend>
                <?php
                    echo $this->Form->control('number');
                    echo $this->Form->control('description');
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('collection_id', ['options' => $collections]);
                    echo $this->Form->control('collection_series_id', ['options' => $collectionSeries]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
