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

        $states = $this->Sales->getStates();
        $this->set(compact('sales', 'states'));
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
            'contain' => [
                'Merchants',
                'Customers',
                'TransactionTriggers',
                'SaleLines' => ['Products', 'Units', 'Currencies'],
                'SaleUpdates' => [
                    'SaleLines' => ['Products', 'Units', 'Currencies']
                ]
            ],
        ]);

        $states = $this->Sales->getStates();
        $this->set(compact('sale', 'states'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($lines = 1)
    {
        $sale = $this->Sales->newEmptyEntity();
        if ($this->request->is('post') && isset($this->request->getData()['add_line'])) {
            $lines++;
            $this->Flash->success(__('Added 1 more Sale Line'));
        }
        else if ($this->request->is('post') && isset($this->request->getData()['remove_line'])) {
            if ($lines == 1) {
                $this->Flash->error(__('At least 1 Sale Line is required'));
            }
            else {
                $lines--;
                $this->Flash->success(__('Last Sale Line was removed'));
            }
        }
        else if ($this->request->is('post')) {
            $options = ['associated' => ['TransactionTriggers', 'SaleLines', 'SaleUpdates']];
            $sale = $this->Sales->patchEntity($sale, $this->request->getData(), $options);

            $sale->transaction_trigger->type = 'SALE';
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale could not be saved. Please, try again.'));
        }
        $merchants = $this->Sales->Merchants->find('list', ['limit' => 200]);
        $customers = $this->Sales->Customers->find('list', ['limit' => 200]);
        $states = $this->Sales->getStates();
        $products = $this->Sales->SaleLines->Products->find('list', ['limit' => 200]);
        $units = $this->Sales->SaleLines->Units->find('list', ['limit' => 200]);
        $currencies = $this->Sales->SaleLines->Currencies->find('list', ['limit' => 200]);
        $this->set(compact('sale', 'merchants', 'customers', 'states', 'products', 'units', 'currencies', 'lines'));
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
        $states = $this->Sales->getStates();
        $this->set(compact('sale', 'merchants', 'customers', 'states'));
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
