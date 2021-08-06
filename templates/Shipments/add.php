<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shipment $shipment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Shipments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="shipments form content">
            <?= $this->Form->create($shipment) ?>
            <fieldset>
                <legend><?= __('Add Shipment') ?></legend>
                <div class="row">
                    <div class="column"><?php echo $this->Form->control('date', ['default' => new DateTime('now')]); ?></div>
                    <div class="column"><?php echo $this->Form->control('state', ['options' => $states]); ?></div>
                    <div class="column"><?php echo $this->Form->control('shipper_id', ['options' => $shippers]); ?></div>
                </div>
                <div class="row">
                    <div class="column"><?php echo $this->Form->control('shipping_from_address_id', ['options' => $shippingFromAddresses]); ?></div>
                    <div class="column"><?php echo $this->Form->control('sender_id', ['options' => $senders]); ?></div>
                </div>
                <div class="row">
                    <div class="column"><?php echo $this->Form->control('recipient_id', ['options' => $recipients]); ?></div>
                    <div class="column"><?php echo $this->Form->control('shipping_to_address_id', ['options' => $shippingToAddresses]); ?></div>
                </div>
                <div class="row">
                    <div class="column"><?php echo $this->Form->control('tracking_number'); ?></div>
                    <div class="column"><?php echo $this->Form->control('tracking_url'); ?></div>
                    <div class="column"><?php echo $this->Form->control('description'); ?></div>
                </div>
            </fieldset>
            <fieldset class="border">
                <legend><?= __('Shipment Update') ?></legend>
                <div class="row">
                    <div class="column">
                        <?php echo $this->Form->control('shipment_updates.0.description'); ?>
                    </div>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
