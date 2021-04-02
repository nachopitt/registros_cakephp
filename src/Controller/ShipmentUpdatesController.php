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
            'contain' => ['Shipments', 'Status'],
        ];
        $shipmentUpdates = $this->paginate($this->ShipmentUpdates);

        $this->set(compact('shipmentUpdates'));
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
            'contain' => ['Shipments', 'Status'],
        ]);

        $this->set(compact('shipmentUpdate'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shipmentUpdate = $this->ShipmentUpdates->newEmptyEntity();
        if ($this->request->is('post')) {
            $shipmentUpdate = $this->ShipmentUpdates->patchEntity($shipmentUpdate, $this->request->getData());
            if ($this->ShipmentUpdates->save($shipmentUpdate)) {
                $this->Flash->success(__('The shipment update has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shipment update could not be saved. Please, try again.'));
        }
        $shipments = $this->ShipmentUpdates->Shipments->find('list', ['limit' => 200]);
        $status = $this->ShipmentUpdates->Status->find('list', ['limit' => 200]);
        $this->set(compact('shipmentUpdate', 'shipments', 'status'));
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
        $shipments = $this->ShipmentUpdates->Shipments->find('list', ['limit' => 200]);
        $status = $this->ShipmentUpdates->Status->find('list', ['limit' => 200]);
        $this->set(compact('shipmentUpdate', 'shipments', 'status'));
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
