<ul class="dropdown-navbar">
    <li>
        <?= $this->Html->link(__('Home'), '/', ['class' => 'side-nav-item']) ?>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Transacciones'), ['controller' => 'transactions', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('Nueva transacción'), ['controller' => 'transactions', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Compras'), ['controller' => 'purchases', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nueva compra'), ['controller' => 'purchases', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Ventas'), ['controller' => 'sales', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nueva venta'), ['controller' => 'sales', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Cuentas de dinero'), ['controller' => 'money_accounts', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nueva cuenta de dinero'), ['controller' => 'money_accounts', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Envíos'), ['controller' => 'shipments', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('Nuevo envío'), ['controller' => 'transactions', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Colecciones'), ['controller' => 'collection_entries', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('Nueva entrada de colección'), ['controller' => 'collection_entries', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Detalles de entrada de colección'), ['controller' => 'collection_entry_details', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuevo detalle de entrada de colección'), ['controller' => 'collection_entry_details', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Catálogos'), ['controller' => 'catalog_entries', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('Nueva entrada de catálogo'), ['controller' => 'catalog_entries', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
    <li class="dropdown">
        <?= $this->Html->link(__('Direcciones'), ['controller' => 'addresses', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        <div class="dropdown-content">
            <?= $this->Html->link(__('Nueva dirección'), ['controller' => 'addresses', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </li>
</ul>