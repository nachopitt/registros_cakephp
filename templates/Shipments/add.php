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
                <?php
                    echo $this->Form->control('date', ['default' => new DateTime('now')]);
                    echo $this->Form->control('shipper_id', ['options' => $shippers]);
                    echo $this->Form->control('sender_id', ['options' => $senders]);
                    echo $this->Form->control('shipping_from_address_id', ['options' => $shippingFromAddresses]);
                    echo $this->Form->control('recipient_id', ['options' => $recipients]);
                    echo $this->Form->control('shipping_to_address_id', ['options' => $shippingToAddresses]);
                    echo $this->Form->control('tracking_number');
                    echo $this->Form->control('tracking_url');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
