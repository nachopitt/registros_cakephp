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
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('unit_id', ['options' => $units]);
                    echo $this->Form->control('price');
                    echo $this->Form->control('discount');
                    echo $this->Form->control('percentage_discount');
                    echo $this->Form->control('unit_discount');
                    echo $this->Form->control('currency_id', ['options' => $currencies]);
                    echo $this->Form->control('description');
                    echo $this->Form->control('sale_updates._ids', ['options' => $saleUpdates]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
