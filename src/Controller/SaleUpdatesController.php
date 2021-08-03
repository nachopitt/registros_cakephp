<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SaleUpdates Controller
 *
 * @property \App\Model\Table\SaleUpdatesTable $SaleUpdates
 * @method \App\Model\Entity\SaleUpdate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SaleUpdatesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sales' => ['TransactionTriggers', 'Merchants', 'Customers'], 'SaleStatuses', 'Shipments'],
        ];
        $saleUpdates = $this->paginate($this->SaleUpdates);

        $this->set(compact('saleUpdates'));
    }

    /**
     * View method
     *
     * @param string|null $id Sale Update id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $saleUpdate = $this->SaleUpdates->get($id, [
            'contain' => ['Sales' => ['TransactionTriggers', 'Merchants', 'Customers'], 'SaleStatuses', 'Shipments', 'SaleLines'],
        ]);

        $this->set(compact('saleUpdate'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($sale_id = null)
    {
        $saleUpdate = $this->SaleUpdates->newEmptyEntity();
        $salesConditions = [];
        $saleLinesConditions = [];
        if ($sale_id != null) {
            $salesConditions = ['Sales.id' => $sale_id];
            $saleLinesConditions = ['SaleLines.sale_id' => $sale_id];
        }
        if ($this->request->is('post')) {
            $saleUpdate = $this->SaleUpdates->patchEntity($saleUpdate, $this->request->getData());
            if ($this->SaleUpdates->save($saleUpdate)) {
                $this->Flash->success(__('The sale update has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale update could not be saved. Please, try again.'));
        }
        $sales = $this->SaleUpdates->Sales->find('list', [
            'limit' => 200,
            'contain' => ['TransactionTriggers', 'Merchants', 'Customers'],
            'conditions' => $salesConditions
        ]);
        $saleStatuses = $this->SaleUpdates->SaleStatuses->find('list', ['limit' => 200]);
        $shipments = $this->SaleUpdates->Shipments->find('list', [
            'limit' => 200,
            'contain' => ['Shippers', 'Senders', 'Recipients']
        ]);
        $saleLines = $this->SaleUpdates->SaleLines->find('list', [
            'limit' => 200,
            'contain' => ['Units', 'Products', 'Currencies'],
            'conditions' => $saleLinesConditions
        ]);
        $this->set(compact('saleUpdate', 'sales', 'saleStatuses', 'shipments', 'saleLines'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sale Update id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $saleUpdate = $this->SaleUpdates->get($id, [
            'contain' => ['SaleLines'],
        ]);
        $saleLinesConditions = ['SaleLines.sale_id' => $saleUpdate->sale_id];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $saleUpdate = $this->SaleUpdates->patchEntity($saleUpdate, $this->request->getData());
            if ($this->SaleUpdates->save($saleUpdate)) {
                $this->Flash->success(__('The sale update has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale update could not be saved. Please, try again.'));
        }
        $sales = $this->SaleUpdates->Sales->find('list', [
            'limit' => 200,
            'contain' => ['TransactionTriggers', 'Merchants', 'Customers']
        ]);
        $saleStatuses = $this->SaleUpdates->SaleStatuses->find('list', ['limit' => 200]);
        $shipments = $this->SaleUpdates->Shipments->find('list', [
            'limit' => 200,
            'contain' => ['Shippers', 'Senders', 'Recipients']
        ]);
        $saleLines = $this->SaleUpdates->SaleLines->find('list', [
            'limit' => 200,
            'contain' => ['Units', 'Products', 'Currencies'],
            'conditions' => $saleLinesConditions
        ]);
        $this->set(compact('saleUpdate', 'sales', 'saleStatuses', 'shipments', 'saleLines'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sale Update id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $saleUpdate = $this->SaleUpdates->get($id);
        if ($this->SaleUpdates->delete($saleUpdate)) {
            $this->Flash->success(__('The sale update has been deleted.'));
        } else {
            $this->Flash->error(__('The sale update could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
