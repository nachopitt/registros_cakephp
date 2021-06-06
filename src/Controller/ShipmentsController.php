<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Shipments Controller
 *
 * @property \App\Model\Table\ShipmentsTable $Shipments
 * @method \App\Model\Entity\Shipment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShipmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Shippers', 'Senders', 'ShippingFromAddresses', 'Recipients', 'ShippingToAddresses'],
        ];
        $shipments = $this->paginate($this->Shipments);

        $this->set(compact('shipments'));
    }

    /**
     * View method
     *
     * @param string|null $id Shipment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shipment = $this->Shipments->get($id, [
            'contain' => ['Shippers', 'Senders', 'ShippingFromAddresses', 'Recipients', 'ShippingToAddresses', 'PurchaseLinesPurchaseUpdates', 'SaleLinesSaleUpdates', 'ShipmentUpdates'],
        ]);

        $this->set(compact('shipment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shipment = $this->Shipments->newEmptyEntity();
        if ($this->request->is('post')) {
            $shipment = $this->Shipments->patchEntity($shipment, $this->request->getData());
            if ($this->Shipments->save($shipment)) {
                $this->Flash->success(__('The shipment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shipment could not be saved. Please, try again.'));
        }
        $shippers = $this->Shipments->Shippers->find('list', ['limit' => 200]);
        $senders = $this->Shipments->Senders->find('list', ['limit' => 200]);
        $shippingFromAddresses = $this->Shipments->ShippingFromAddresses->find('list', ['limit' => 200]);
        $recipients = $this->Shipments->Recipients->find('list', ['limit' => 200]);
        $shippingToAddresses = $this->Shipments->ShippingToAddresses->find('list', ['limit' => 200]);
        $this->set(compact('shipment', 'shippers', 'senders', 'shippingFromAddresses', 'recipients', 'shippingToAddresses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Shipment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shipment = $this->Shipments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shipment = $this->Shipments->patchEntity($shipment, $this->request->getData());
            if ($this->Shipments->save($shipment)) {
                $this->Flash->success(__('The shipment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shipment could not be saved. Please, try again.'));
        }
        $shippers = $this->Shipments->Shippers->find('list', ['limit' => 200]);
        $senders = $this->Shipments->Senders->find('list', ['limit' => 200]);
        $shippingFromAddresses = $this->Shipments->ShippingFromAddresses->find('list', ['limit' => 200]);
        $recipients = $this->Shipments->Recipients->find('list', ['limit' => 200]);
        $shippingToAddresses = $this->Shipments->ShippingToAddresses->find('list', ['limit' => 200]);
        $this->set(compact('shipment', 'shippers', 'senders', 'shippingFromAddresses', 'recipients', 'shippingToAddresses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shipment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shipment = $this->Shipments->get($id);
        if ($this->Shipments->delete($shipment)) {
            $this->Flash->success(__('The shipment has been deleted.'));
        } else {
            $this->Flash->error(__('The shipment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
