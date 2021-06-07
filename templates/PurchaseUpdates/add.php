<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseUpdate $purchaseUpdate
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Purchase Updates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchaseUpdates form content">
            <?= $this->Form->create($purchaseUpdate) ?>
            <fieldset>
                <legend><?= __('Add Purchase Update') ?></legend>
                <?php
                    echo $this->Form->control('purchase_id', ['options' => $purchases]);
                    echo $this->Form->control('date');
                    echo $this->Form->control('purchase_status_id', ['options' => $purchaseStatuses]);
                    echo $this->Form->control('shipment_id', ['options' => $shipments, 'empty' => true]);
                    echo $this->Form->control('description');
                    echo $this->Form->control('purchase_lines._ids', ['options' => $purchaseLines]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
