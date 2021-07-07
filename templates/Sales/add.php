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
            <?= $this->Html->link(__('List Sales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sales form content">
            <?= $this->Form->create($sale) ?>
            <fieldset>
                <legend><?= __('Add Sale') ?></legend>
                <div class="row">
                    <div class="column"><?php echo $this->Form->control('transaction_trigger.date', ['default' => new DateTime('now')]); ?></div>
                    <div class="column"><?php echo $this->Form->control('merchant_id', ['options' => $merchants]); ?></div>
                    <div class="column"><?php echo $this->Form->control('customer_id', ['options' => $customers]); ?></div>
                </div>
                <div class="row">
                    <div class="column column-33"><?php echo $this->Form->control('sale_number'); ?></div>
                    <div class="column"><?php echo $this->Form->control('sale_url'); ?></div>
                    <div class="column column-20"><?php echo $this->Form->control('sale_updates.0.sale_status_id', ['options' => $saleStatuses]); ?></div>
                </div>
            </fieldset>
            <?php for ($lineNumber = 0; $lineNumber < $lines; $lineNumber++): ?>
                <?= $this->element('sales/add_sale_line', ['lineNumber' => $lineNumber]) ?>
            <?php endfor; ?>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
