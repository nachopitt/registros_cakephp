<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseLine $purchaseLine
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Purchase Lines'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchaseLines form content">
            <?= $this->Form->create($purchaseLine) ?>
            <fieldset>
                <legend><?= __('Add Purchase Line') ?></legend>
                <?php
                    echo $this->Form->control('purchase_id', ['options' => $purchases]);
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
