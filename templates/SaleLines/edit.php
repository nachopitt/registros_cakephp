<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SaleLine $saleLine
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $saleLine->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $saleLine->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Sale Lines'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="saleLines form content">
            <?= $this->Form->create($saleLine) ?>
            <fieldset>
                <legend><?= __('Edit Sale Line') ?></legend>
                <?php
                    echo $this->Form->control('sale_id', ['options' => $sales]);
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('money_movement_id', ['options' => $moneyMovements]);
                    echo $this->Form->control('shipment_id', ['options' => $shipments, 'empty' => true]);
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
