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
                <?php
                    echo $this->Form->control('transaction_trigger.date', ['default' => new DateTime('now')]);
                    echo $this->Form->control('merchant_id', ['options' => $merchants]);
                    echo $this->Form->control('purchase_number');
                    echo $this->Form->control('purchase_url');
                    echo $this->Form->control('purchase_updates.0.purchase_status_id', ['options' => $purchaseStatuses]);
                ?>
            </fieldset>
            <fieldset>
                <legend><?= __('Add Purchase Line') ?></legend>
                <?php
                    echo $this->Form->control('purchase_updates.0.purchase_lines.0.product_id', ['options' => $products]);
                    echo $this->Form->control('purchase_updates.0.purchase_lines.0.quantity');
                    echo $this->Form->control('purchase_updates.0.purchase_lines.0.unit_id', ['options' => $units]);
                    echo $this->Form->control('purchase_updates.0.purchase_lines.0.price');
                    echo $this->Form->control('purchase_updates.0.purchase_lines.0.discount');
                    echo $this->Form->control('purchase_updates.0.purchase_lines.0.percentage_discount');
                    echo $this->Form->control('purchase_updates.0.purchase_lines.0.unit_discount');
                    echo $this->Form->control('purchase_updates.0.purchase_lines.0.currency_id', ['options' => $currencies]);
                    echo $this->Form->control('purchase_updates.0.purchase_lines.0.description');
                    echo $this->Form->control('purchase_updates.0.purchase_lines.0.seller_id', ['options' => $sellers, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
