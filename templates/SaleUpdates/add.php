<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SaleUpdate $saleUpdate
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Sale Updates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="saleUpdates form content">
            <?= $this->Form->create($saleUpdate) ?>
            <fieldset>
                <legend><?= __('Add Sale Update') ?></legend>
                <?php
                    echo $this->Form->control('sale_id', ['options' => $sales]);
                    echo $this->Form->control('date');
                    echo $this->Form->control('status', ['options' => $statuses]);
                    echo $this->Form->control('shipment_id', ['options' => $shipments, 'empty' => true]);
                    echo $this->Form->control('description');
                    echo $this->Form->control('sale_lines._ids', ['options' => $saleLines]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
