<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sale->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Sales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sales form content">
            <?= $this->Form->create($sale) ?>
            <fieldset>
                <legend><?= __('Edit Sale') ?></legend>
                <div class="row">
                    <div class="column"><?php echo $this->Form->control('transaction_trigger.date'); ?></div>
                    <div class="column"><?php echo $this->Form->control('merchant_id', ['options' => $merchants]); ?></div>
                    <div class="column"><?php echo $this->Form->control('customer_id', ['options' => $customers]); ?></div>
                    <div class="column"><?php echo $this->Form->control('state', ['options' => $states]); ?></div>
                </div>
                <div class="row">
                    <div class="column column-33 responsive"><?php echo $this->Form->control('sale_number'); ?></div>
                    <div class="column"><?php echo $this->Form->control('sale_url'); ?></div>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
