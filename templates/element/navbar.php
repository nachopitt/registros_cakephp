<ul class="dropdown-navbar">
    <li>
        <?= $this->Html->link(__('Home'), '/', ['class' => 'side-nav-item']) ?>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Transactions'), ['controller' => 'Transactions', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('New transaction'), ['controller' => 'Transactions', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Transaction triggers'), ['controller' => 'TransactionTriggers', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New transaction trigger'), ['controller' => 'TransactionTriggers', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Money accounts'), ['controller' => 'MoneyAccounts', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New money account'), ['controller' => 'MoneyAccounts', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Purchases'), ['controller' => 'Purchases', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('New purchase'), ['controller' => 'Purchases', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Purchase lines'), ['controller' => 'PurchaseLines', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New purchase line'), ['controller' => 'PurchaseLines', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Purchase updates'), ['controller' => 'PurchaseUpdates', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New purchase update'), ['controller' => 'PurchaseUpdates', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Sales'), ['controller' => 'Sales', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('New sale'), ['controller' => 'Sales', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Sale lines'), ['controller' => 'SaleLines', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New sale line'), ['controller' => 'SaleLines', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Sale updates'), ['controller' => 'SaleUpdates', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New sale update'), ['controller' => 'SaleUpdates', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Shipments'), ['controller' => 'Shipments', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('New shipment'), ['controller' => 'Shipments', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Shipment updates'), ['controller' => 'ShipmentUpdates', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New shipment update'), ['controller' => 'ShipmentUpdates', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Collection entries'), ['controller' => 'CollectionEntries', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('New collection entry'), ['controller' => 'CollectionEntries', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Collection entry details'), ['controller' => 'CollectionEntryDetails', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New collection entry detail'), ['controller' => 'CollectionEntryDetails', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Catalog entries'), ['controller' => 'CatalogEntries', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('New catalog entry'), ['controller' => 'CatalogEntries', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Addresses'), ['controller' => 'Addresses', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('New address'), ['controller' => 'Addresses', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
</ul>