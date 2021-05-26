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
            <?= $this->Html->link(__('List Purchases'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchases form content">
            <?= $this->Form->create($purchase) ?>
            <fieldset>
                <legend><?= __('Add Purchase') ?></legend>
                <?php
                    echo $this->Form->control('transaction_trigger.date');
                    echo $this->Form->control('merchant_id', ['options' => $merchants]);
                    echo $this->Form->control('purchase_number');
                    echo $this->Form->control('purchase_url');
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
                    echo $this->Form->control('purchase_updates.0.purchase_lines.0.discount_percentage');
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
