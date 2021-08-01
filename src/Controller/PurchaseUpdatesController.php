<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PurchaseUpdates Controller
 *
 * @property \App\Model\Table\PurchaseUpdatesTable $PurchaseUpdates
 * @method \App\Model\Entity\PurchaseUpdate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchaseUpdatesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Purchases' => ['TransactionTriggers', 'Merchants'], 'PurchaseStatuses', 'Shipments'],
        ];
        $purchaseUpdates = $this->paginate($this->PurchaseUpdates);

        $this->set(compact('purchaseUpdates'));
    }

    /**
     * View method
     *
     * @param string|null $id Purchase Update id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchaseUpdate = $this->PurchaseUpdates->get($id, [
            'contain' => ['Purchases' => ['TransactionTriggers', 'Merchants'], 'PurchaseStatuses', 'Shipments', 'PurchaseLines'],
        ]);

        $this->set(compact('purchaseUpdate'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($purchase_id = null)
    {
        $purchaseUpdate = $this->PurchaseUpdates->newEmptyEntity();
        $purchasesConditions = [];
        $purchaseLinesConditions = [];
        if ($purchase_id != null) {
            $purchasesConditions = ['Purchases.id' => $purchase_id];
            $purchaseLinesConditions = ['PurchaseLines.purchase_id' => $purchase_id];
        }
        if ($this->request->is('post')) {
            $purchaseUpdate = $this->PurchaseUpdates->patchEntity($purchaseUpdate, $this->request->getData());
            if ($this->PurchaseUpdates->save($purchaseUpdate)) {
                $this->Flash->success(__('The purchase update has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase update could not be saved. Please, try again.'));
        }
        $purchases = $this->PurchaseUpdates->Purchases->find('list', [
            'limit' => 200,
            'contain' => ['TransactionTriggers', 'Merchants'],
            'conditions' => $purchasesConditions
        ]);
        $purchaseStatuses = $this->PurchaseUpdates->PurchaseStatuses->find('list', ['limit' => 200]);
        $shipments = $this->PurchaseUpdates->Shipments->find('list', [
            'limit' => 200,
            'contain' => ['Shippers', 'Senders', 'Recipients']
        ]);
        $purchaseLines = $this->PurchaseUpdates->PurchaseLines->find('list', [
            'limit' => 200,
            'contain' => ['Units', 'Products', 'Currencies'],
            'conditions' => $purchaseLinesConditions
        ]);
        $this->set(compact('purchaseUpdate', 'purchases', 'purchaseStatuses', 'shipments', 'purchaseLines'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchase Update id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchaseUpdate = $this->PurchaseUpdates->get($id, [
            'contain' => ['PurchaseLines'],
        ]);
        $purchaseLinesConditions = ['PurchaseLines.purchase_id' => $purchaseUpdate->purchase_id];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchaseUpdate = $this->PurchaseUpdates->patchEntity($purchaseUpdate, $this->request->getData());
            if ($this->PurchaseUpdates->save($purchaseUpdate)) {
                $this->Flash->success(__('The purchase update has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase update could not be saved. Please, try again.'));
        }
        $purchases = $this->PurchaseUpdates->Purchases->find('list', [
            'limit' => 200,
            'contain' => ['TransactionTriggers', 'Merchants']
        ]);
        $purchaseStatuses = $this->PurchaseUpdates->PurchaseStatuses->find('list', ['limit' => 200]);
        $shipments = $this->PurchaseUpdates->Shipments->find('list', [
            'limit' => 200,
            'contain' => ['Shippers', 'Senders', 'Recipients']
        ]);
        $purchaseLines = $this->PurchaseUpdates->PurchaseLines->find('list', [
            'limit' => 200,
            'contain' => ['Units', 'Products', 'Currencies'],
            'conditions' => $purchaseLinesConditions
        ]);
        $this->set(compact('purchaseUpdate', 'purchases', 'purchaseStatuses', 'shipments', 'purchaseLines'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Purchase Update id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchaseUpdate = $this->PurchaseUpdates->get($id);
        if ($this->PurchaseUpdates->delete($purchaseUpdate)) {
            $this->Flash->success(__('The purchase update has been deleted.'));
        } else {
            $this->Flash->error(__('The purchase update could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
