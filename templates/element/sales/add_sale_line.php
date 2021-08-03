<fieldset class="border">
<legend><?= __('Add Sale Line') . ' #' . ($lineNumber + 1); ?></legend>
    <div class="row">
        <div class="column column-60"><?php echo $this->Form->control('sale_lines.0.product_id', ['options' => $products]); ?></div>
        <div class="column column-20"><?php echo $this->Form->control('sale_lines.0.quantity'); ?></div>
        <div class="column column-20"><?php echo $this->Form->control('sale_lines.0.unit_id', ['options' => $units]); ?></div>
    </div>
    <div class="row">
        <div class="column"><?php echo $this->Form->control('sale_lines.0.price'); ?></div>
        <div class="column"><?php echo $this->Form->control('sale_lines.0.discount'); ?></div>
        <div class="column"><?php echo $this->Form->control('sale_lines.0.percentage_discount'); ?></div>
        <div class="column"><?php echo $this->Form->control('sale_lines.0.unit_discount'); ?></div>
        <div class="column"><?php echo $this->Form->control('sale_lines.0.currency_id', ['options' => $currencies]); ?></div>
    </div>
    <div class="row">
        <div class="column"><?php echo $this->Form->control('sale_lines.0.description'); ?></div>
    </div>
</fieldset>