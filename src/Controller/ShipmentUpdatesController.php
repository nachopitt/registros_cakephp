<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ShipmentUpdates Controller
 *
 * @property \App\Model\Table\ShipmentUpdatesTable $ShipmentUpdates
 * @method \App\Model\Entity\ShipmentUpdate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShipmentUpdatesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Shipments'],
        ];
        $shipmentUpdates = $this->paginate($this->ShipmentUpdates);

        $states = $this->ShipmentUpdates->Shipments->getStates();
        $this->set(compact('shipmentUpdates', 'states'));
    }

    /**
     * View method
     *
     * @param string|null $id Shipment Update id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shipmentUpdate = $this->ShipmentUpdates->get($id, [
            'contain' => ['Shipments'],
        ]);

        $states = $this->ShipmentUpdates->Shipments->getStates();
        $this->set(compact('shipmentUpdate', 'states'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($shipment_id = null)
    {
        $shipmentUpdate = $this->ShipmentUpdates->newEmptyEntity();
        $shipmentConditions = [];
        if ($shipment_id != null) {
            $shipmentConditions = ['Shipments.id' => $shipment_id];
        }
        if ($this->request->is('post')) {
            $shipmentUpdate = $this->ShipmentUpdates->patchEntity($shipmentUpdate, $this->request->getData());
            if ($this->ShipmentUpdates->save($shipmentUpdate)) {
                $this->Flash->success(__('The shipment update has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shipment update could not be saved. Please, try again.'));
        }
        $shipments = $this->ShipmentUpdates->Shipments->find('list', [
            'limit' => 200,
            'contain' => ['Shippers', 'Senders', 'Recipients'],
            'conditions' => $shipmentConditions
        ]);
        $states = $this->ShipmentUpdates->Shipments->getStates();
        $this->set(compact('shipmentUpdate', 'shipments', 'states'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Shipment Update id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shipmentUpdate = $this->ShipmentUpdates->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shipmentUpdate = $this->ShipmentUpdates->patchEntity($shipmentUpdate, $this->request->getData());
            if ($this->ShipmentUpdates->save($shipmentUpdate)) {
                $this->Flash->success(__('The shipment update has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shipment update could not be saved. Please, try again.'));
        }
        $shipments = $this->ShipmentUpdates->Shipments->find('list', [
            'limit' => 200,
            'contain' => ['Shippers', 'Senders', 'Recipients']
        ]);
        $states = $this->ShipmentUpdates->Shipments->getStates();
        $this->set(compact('shipmentUpdate', 'shipments', 'states'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shipment Update id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shipmentUpdate = $this->ShipmentUpdates->get($id);
        if ($this->ShipmentUpdates->delete($shipmentUpdate)) {
            $this->Flash->success(__('The shipment update has been deleted.'));
        } else {
            $this->Flash->error(__('The shipment update could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
