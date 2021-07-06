<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 */
?>
<?= $this->Html->script('jquery-3.6.0', ['block' => 'script']); ?>
<?= $this->Html->script('registros', ['block' => 'script']); ?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Purchases'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchases form content">
            <?= $this->Form->create($purchase) ?>
            <?php echo $this->Form->button(__('Add line'), ['type' => 'button', 'id' => 'add-line']); ?>
            <?php echo $this->Form->button(__('Remove line'), ['type' => 'button', 'id' => 'remove-line']); ?>
            <fieldset>
                <legend><?= __('Add Purchase') ?></legend>
                <div class="row">
                    <div class="column column-25"><?php echo $this->Form->control('transaction_trigger.date', ['default' => new DateTime('now')]); ?></div>
                    <div class="column column-40"><?php echo $this->Form->control('merchant_id', ['options' => $merchants]); ?></div>
                    <div class="column column-35"><?php echo $this->Form->control('purchase_number'); ?></div>
                </div>
                <div class="row">
                    <div class="column column-60"><?php echo $this->Form->control('purchase_url'); ?></div>
                    <div class="column column-40"><?php echo $this->Form->control('purchase_updates.0.purchase_status_id', ['options' => $purchaseStatuses]); ?></div>
                </div>
            </fieldset>
            <fieldset class="border">
                <legend><?= __('Add Purchase Line') ?></legend>
                    <div class="row">
                        <div class="column column-60"><?php echo $this->Form->control('purchase_updates.0.purchase_lines.0.product_id', ['options' => $products]); ?></div>
                        <div class="column column-20"><?php echo $this->Form->control('purchase_updates.0.purchase_lines.0.quantity'); ?></div>
                        <div class="column column-20"><?php echo $this->Form->control('purchase_updates.0.purchase_lines.0.unit_id', ['options' => $units]); ?></div>
                    </div>
                    <div class="row">
                        <div class="column column-20"><?php echo $this->Form->control('purchase_updates.0.purchase_lines.0.price'); ?></div>
                        <div class="column column-20"><?php echo $this->Form->control('purchase_updates.0.purchase_lines.0.discount'); ?></div>
                        <div class="column column-20"><?php echo $this->Form->control('purchase_updates.0.purchase_lines.0.percentage_discount', ['label' => '% Discount']); ?></div>
                        <div class="column column-20"><?php echo $this->Form->control('purchase_updates.0.purchase_lines.0.unit_discount'); ?></div>
                        <div class="column column-20"><?php echo $this->Form->control('purchase_updates.0.purchase_lines.0.currency_id', ['options' => $currencies]); ?></div>
                    </div>
                    <div class="row">
                        <div class="column column-50"><?php echo $this->Form->control('purchase_updates.0.purchase_lines.0.description'); ?></div>
                        <div class="column column-50"><?php echo $this->Form->control('purchase_updates.0.purchase_lines.0.seller_id', ['options' => $sellers, 'empty' => true]); ?></div>
                    </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
