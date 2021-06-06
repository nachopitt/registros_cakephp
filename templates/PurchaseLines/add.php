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
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('unit_id', ['options' => $units]);
                    echo $this->Form->control('price');
                    echo $this->Form->control('discount');
                    echo $this->Form->control('percentage_discount');
                    echo $this->Form->control('unit_discount');
                    echo $this->Form->control('currency_id', ['options' => $currencies]);
                    echo $this->Form->control('description');
                    echo $this->Form->control('shipment_id', ['options' => $shipments, 'empty' => true]);
                    echo $this->Form->control('seller_id', ['options' => $sellers, 'empty' => true]);
                    echo $this->Form->control('purchase_updates._ids', ['options' => $purchaseUpdates]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
