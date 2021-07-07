<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $purchase->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Purchases'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchases form content">
            <?= $this->Form->create($purchase) ?>
            <fieldset>
                <legend><?= __('Edit Purchase') ?></legend>
                <div class="row">
                    <div class="column column-33 responsive"><?php echo $this->Form->control('transaction_trigger.date', ['default' => new DateTime('now')]); ?></div>
                    <div class="column column-33 responsive"><?php echo $this->Form->control('merchant_id', ['options' => $merchants]); ?></div>
                    <div class="column column-33 responsive"><?php echo $this->Form->control('purchase_number'); ?></div>
                </div>
                <div class="row">
                    <div class="column column-66 responsive"><?php echo $this->Form->control('purchase_url'); ?></div>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
