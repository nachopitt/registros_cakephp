<fieldset class="border">
    <legend><?= __('Add Purchase Line') . ' #' . ($lineNumber + 1); ?></legend>
        <div class="row">
            <div class="column column-60 responsive"><?= $this->Form->control('purchase_updates.0.purchase_lines.' . $lineNumber . '.product_id', ['options' => $products]); ?></div>
            <div class="column column-20 responsive"><?= $this->Form->control('purchase_updates.0.purchase_lines.' . $lineNumber . '.quantity'); ?></div>
            <div class="column"><?= $this->Form->control('purchase_updates.0.purchase_lines.' . $lineNumber . '.unit_id', ['options' => $units]); ?></div>
        </div>
        <div class="row">
            <div class="column"><?= $this->Form->control('purchase_updates.0.purchase_lines.' . $lineNumber . '.price'); ?></div>
            <div class="column"><?= $this->Form->control('purchase_updates.0.purchase_lines.' . $lineNumber . '.discount'); ?></div>
            <div class="column"><?= $this->Form->control('purchase_updates.0.purchase_lines.' . $lineNumber . '.percentage_discount', ['label' => '% Discount']); ?></div>
            <div class="column"><?= $this->Form->control('purchase_updates.0.purchase_lines.' . $lineNumber . '.unit_discount'); ?></div>
            <div class="column"><?= $this->Form->control('purchase_updates.0.purchase_lines.' . $lineNumber . '.currency_id', ['options' => $currencies]); ?></div>
        </div>
        <div class="row">
            <div class="column"><?= $this->Form->control('purchase_updates.0.purchase_lines.' . $lineNumber . '.description'); ?></div>
            <div class="column"><?= $this->Form->control('purchase_updates.0.purchase_lines.' . $lineNumber . '.seller_id', ['options' => $sellers, 'empty' => true]); ?></div>
        </div>
</fieldset>