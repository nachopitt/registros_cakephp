<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShipmentUpdate $shipmentUpdate
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Shipment Updates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="shipmentUpdates form content">
            <?= $this->Form->create($shipmentUpdate) ?>
            <fieldset>
                <legend><?= __('Add Shipment Update') ?></legend>
                <?php
                    echo $this->Form->control('shipment_id', ['options' => $shipments]);
                    echo $this->Form->control('date');
                    echo $this->Form->control('status_id', ['options' => $statuses]);
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
