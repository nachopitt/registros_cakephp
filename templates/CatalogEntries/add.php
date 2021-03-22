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
            <?= $this->Html->link(__('List Catalog Entries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="catalogEntries form content">
            <?= $this->Form->create($catalogEntry) ?>
            <fieldset>
                <legend><?= __('Add Catalog Entry') ?></legend>
                <?php
                    echo $this->Form->control('entry_name');
                    echo $this->Form->control('catalog_name');
                    echo $this->Form->control('tags._ids', ['options' => $tags]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
