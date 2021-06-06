<ul class="dropdown-navbar">
    <li>
        <?= $this->Html->link(__('Home'), '/', ['class' => 'side-nav-item']) ?>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Transactions'), ['controller' => 'transactions', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('New transaction'), ['controller' => 'transactions', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Transaction triggers'), ['controller' => 'transaction-triggers', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New transaction trigger'), ['controller' => 'transaction-triggers', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Money accounts'), ['controller' => 'money_accounts', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New money account'), ['controller' => 'money_accounts', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Purchases'), ['controller' => 'purchases', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('New purchase'), ['controller' => 'purchases', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Purchase lines'), ['controller' => 'purchase-lines', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New purchase line'), ['controller' => 'purchase-lines', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Purchase updates'), ['controller' => 'purchase-updates', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New purchase update'), ['controller' => 'purchase-updates', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Sales'), ['controller' => 'sales', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('New sale'), ['controller' => 'sales', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Sale lines'), ['controller' => 'sale-lines', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New sale line'), ['controller' => 'sale-lines', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Sale updates'), ['controller' => 'sale-updates', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New sale update'), ['controller' => 'sale-updates', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Shipments'), ['controller' => 'shipments', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('New shipment'), ['controller' => 'shipments', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Shipment updates'), ['controller' => 'shipment-updates', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New shipment update'), ['controller' => 'shipment-updates', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Collection entries'), ['controller' => 'collection_entries', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('New collection entry'), ['controller' => 'collection_entries', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Collection entry details'), ['controller' => 'collection_entry_details', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New collection entry detail'), ['controller' => 'collection_entry_details', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Catalog entries'), ['controller' => 'catalog_entries', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('New catalog entry'), ['controller' => 'catalog_entries', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Addresses'), ['controller' => 'addresses', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('New address'), ['controller' => 'addresses', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
</ul>