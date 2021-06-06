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
            'contain' => ['Purchases'],
        ];
        $purchaseUpdates = $this->paginate($this->PurchaseUpdates);
        $statuses = $this->PurchaseUpdates->Purchases->TransactionTriggers->getStatuses();

        $this->set(compact('purchaseUpdates', 'statuses'));
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
            'contain' => ['Purchases', 'PurchaseLines'],
        ]);
        $statuses = $this->PurchaseUpdates->Purchases->TransactionTriggers->getStatuses();

        $this->set(compact('purchaseUpdate', 'statuses'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purchaseUpdate = $this->PurchaseUpdates->newEmptyEntity();
        if ($this->request->is('post')) {
            $purchaseUpdate = $this->PurchaseUpdates->patchEntity($purchaseUpdate, $this->request->getData());
            if ($this->PurchaseUpdates->save($purchaseUpdate)) {
                $this->Flash->success(__('The purchase update has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase update could not be saved. Please, try again.'));
        }
        $purchases = $this->PurchaseUpdates->Purchases->find('list', ['limit' => 200]);
        $purchaseLines = $this->PurchaseUpdates->PurchaseLines->find('list', ['limit' => 200]);
        $statuses = $this->PurchaseUpdates->Purchases->TransactionTriggers->getStatuses();
        $this->set(compact('purchaseUpdate', 'purchases', 'purchaseLines', 'statuses'));
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchaseUpdate = $this->PurchaseUpdates->patchEntity($purchaseUpdate, $this->request->getData());
            if ($this->PurchaseUpdates->save($purchaseUpdate)) {
                $this->Flash->success(__('The purchase update has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase update could not be saved. Please, try again.'));
        }
        $purchases = $this->PurchaseUpdates->Purchases->find('list', ['limit' => 200]);
        $purchaseLines = $this->PurchaseUpdates->PurchaseLines->find('list', ['limit' => 200]);
        $statuses = $this->PurchaseUpdates->Purchases->TransactionTriggers->getStatuses();
        $this->set(compact('purchaseUpdate', 'purchases', 'purchaseLines', 'statuses'));
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
