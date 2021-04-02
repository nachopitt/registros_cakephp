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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $shipmentUpdate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $shipmentUpdate->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Shipment Updates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="shipmentUpdates form content">
            <?= $this->Form->create($shipmentUpdate) ?>
            <fieldset>
                <legend><?= __('Edit Shipment Update') ?></legend>
                <?php
                    echo $this->Form->control('shipment_id', ['options' => $shipments]);
                    echo $this->Form->control('date');
                    echo $this->Form->control('status_id');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
