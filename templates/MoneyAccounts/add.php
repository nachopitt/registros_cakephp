<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MoneyAccount $moneyAccount
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Money Accounts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="moneyAccounts form content">
            <?= $this->Form->create($moneyAccount) ?>
            <fieldset>
                <legend><?= __('Add Money Account') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('number');
                    echo $this->Form->control('money_account_type_id', ['options' => $moneyAccountTypes]);
                    echo $this->Form->control('currency_id', ['options' => $currencies]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
