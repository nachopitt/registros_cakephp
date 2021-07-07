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
            <?= $this->Form->create($purchase, ['url' => [$lines]]) ?>
            <fieldset>
                <legend><?= __('Add Purchase') ?></legend>
                <div class="row">
                    <div class="column"><?php echo $this->Form->control('transaction_trigger.date', ['default' => new DateTime('now')]); ?></div>
                    <div class="column"><?php echo $this->Form->control('merchant_id', ['options' => $merchants]); ?></div>
                    <div class="column"><?php echo $this->Form->control('purchase_number'); ?></div>
                </div>
                <div class="row">
                    <div class="column column-66 responsive"><?php echo $this->Form->control('purchase_url'); ?></div>
                    <div class="column"><?php echo $this->Form->control('purchase_updates.0.purchase_status_id', ['options' => $purchaseStatuses]); ?></div>
                </div>
            </fieldset>
            <?php for ($lineNumber = 0; $lineNumber < $lines; $lineNumber++): ?>
                <?= $this->element('purchases/add_purchase_line', ['lineNumber' => $lineNumber]) ?>
            <?php endfor; ?>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->button(__('Add line'), ['name' => 'add_line', 'formnovalidate' => true]) ?>
            <?= $this->Form->button(__('Remove line'), ['name' => 'remove_line', 'formnovalidate' => true]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
