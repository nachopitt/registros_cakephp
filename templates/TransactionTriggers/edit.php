<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransactionTrigger $transactionTrigger
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transactionTrigger->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transactionTrigger->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Transaction Triggers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transactionTriggers form content">
            <?= $this->Form->create($transactionTrigger) ?>
            <fieldset>
                <legend><?= __('Edit Transaction Trigger') ?></legend>
                <?php
                    echo $this->Form->control('type');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
