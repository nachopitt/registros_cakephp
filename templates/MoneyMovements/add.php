<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MoneyMovement $moneyMovement
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Money Movements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="moneyMovements form content">
            <?= $this->Form->create($moneyMovement) ?>
            <fieldset>
                <legend><?= __('Add Money Movement') ?></legend>
                <?php
                    echo $this->Form->control('price');
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('unit_id', ['options' => $units]);
                    echo $this->Form->control('currency_id', ['options' => $currencies]);
                    echo $this->Form->control('payment_method_id', ['options' => $paymentMethods]);
                    echo $this->Form->control('discount');
                    echo $this->Form->control('discount_percentage');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
