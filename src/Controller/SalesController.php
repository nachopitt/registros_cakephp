<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Sales Controller
 *
 * @property \App\Model\Table\SalesTable $Sales
 * @method \App\Model\Entity\Sale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SalesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Merchants', 'Customers', 'TransactionTriggers'],
        ];
        $sales = $this->paginate($this->Sales);

        $this->set(compact('sales'));
    }

    /**
     * View method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => ['Merchants', 'Customers', 'TransactionTriggers', 'SaleUpdates' => ['SaleStatuses', 'SaleLines' => ['Products', 'Units', 'Currencies']]],
        ]);

        $this->set(compact('sale'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($lines = 1)
    {
        $sale = $this->Sales->newEmptyEntity();
        if ($this->request->is('post')) {
            $associated = ['associated' => ['TransactionTriggers', 'SaleUpdates.SaleLines']];
            $sale = $this->Sales->patchEntity($sale, $this->request->getData(), $associated);

            $sale->transaction_trigger->type = 'SALE';

            $sale->sale_updates[0]->date = $sale->transaction_trigger->date;

            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale could not be saved. Please, try again.'));
        }
        $merchants = $this->Sales->Merchants->find('list', ['limit' => 200]);
        $saleStatuses = $this->Sales->SaleUpdates->SaleStatuses->find('list', [
            'limit' => 200,
            'conditions' => ['SaleStatuses.short_name IN' => ['SOLD', 'ORDERED']]
        ]);
        $customers = $this->Sales->Customers->find('list', ['limit' => 200]);
        $products = $this->Sales->SaleUpdates->SaleLines->Products->find('list', ['limit' => 200]);
        $units = $this->Sales->SaleUpdates->SaleLines->Units->find('list', ['limit' => 200]);
        $currencies = $this->Sales->SaleUpdates->SaleLines->Currencies->find('list', ['limit' => 200]);
        $this->set(compact('sale', 'merchants', 'saleStatuses', 'customers', 'products', 'units', 'currencies', 'lines'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => ['TransactionTriggers'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sale = $this->Sales->patchEntity($sale, $this->request->getData());
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale could not be saved. Please, try again.'));
        }
        $merchants = $this->Sales->Merchants->find('list', ['limit' => 200]);
        $customers = $this->Sales->Customers->find('list', ['limit' => 200]);
        $this->set(compact('sale', 'merchants', 'customers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sale = $this->Sales->get($id);
        if ($this->Sales->delete($sale)) {
            $this->Flash->success(__('The sale has been deleted.'));
        } else {
            $this->Flash->error(__('The sale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
