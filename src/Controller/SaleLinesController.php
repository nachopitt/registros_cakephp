<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SaleLines Controller
 *
 * @property \App\Model\Table\SaleLinesTable $SaleLines
 * @method \App\Model\Entity\SaleLine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SaleLinesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sales' => ['TransactionTriggers', 'Merchants', 'Customers'], 'Products', 'Units', 'Currencies'],
        ];
        $saleLines = $this->paginate($this->SaleLines);

        $this->set(compact('saleLines'));
    }

    /**
     * View method
     *
     * @param string|null $id Sale Line id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $saleLine = $this->SaleLines->get($id, [
            'contain' => ['Sales' => ['TransactionTriggers', 'Merchants', 'Customers'], 'Products', 'Units', 'Currencies', 'SaleUpdates'],
        ]);

        $states = $this->SaleLines->Sales->getStates();
        $this->set(compact('saleLine', 'states'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($parent = null, $id = null)
    {
        $saleLine = $this->SaleLines->newEmptyEntity();
        $salesConditions = [];
        $saleUpdatesConditions = [];
        if ($this->request->is('post')) {
            $saleLine = $this->SaleLines->patchEntity($saleLine, $this->request->getData());
            if ($this->SaleLines->save($saleLine)) {
                $this->Flash->success(__('The sale line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale line could not be saved. Please, try again.'));
        }
        else {
            if ($parent == 'sale' && $id != null) {
                $salesConditions = ['Sales.id' => $id];
                $saleUpdatesConditions = ['SaleUpdates.sale_id' => $id];
            }
            else if ($parent == 'sale_update' && $id != null) {
                $saleUpdatesConditions = ['SaleUpdates.id' => $id];
                $saleLine = $this->SaleLines->patchEntity($saleLine,
                    ['sale_updates' => ['_ids' => [$id]]],
                    ['validate' => false]
                );
            }
        }
        $sales = $this->SaleLines->Sales->find('list', [
            'limit' => 200,
            'contain' => ['TransactionTriggers', 'Merchants', 'Customers'],
            'conditions' => $salesConditions
        ]);
        if ($parent == 'sale_update' && $id != null) {
            $sales->matching('SaleUpdates', function($q) use($id) {
                return $q->where(['SaleUpdates.id' => $id]);
            });
        }
        $products = $this->SaleLines->Products->find('list', ['limit' => 200]);
        $units = $this->SaleLines->Units->find('list', ['limit' => 200]);
        $currencies = $this->SaleLines->Currencies->find('list', ['limit' => 200]);
        $saleUpdates = $this->SaleLines->SaleUpdates->find('list', [
            'limit' => 200,
            'contain' => ['Sales' => ['Merchants', 'Customers']],
            'conditions' => $saleUpdatesConditions
        ]);
        $this->set(compact('saleLine', 'sales', 'products', 'units', 'currencies', 'saleUpdates'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sale Line id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $saleLine = $this->SaleLines->get($id, [
            'contain' => ['SaleUpdates'],
        ]);
        $saleUpdatesConditions = ['SaleUpdates.sale_id' => $saleLine->sale_id];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $saleLine = $this->SaleLines->patchEntity($saleLine, $this->request->getData());
            if ($this->SaleLines->save($saleLine)) {
                $this->Flash->success(__('The sale line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale line could not be saved. Please, try again.'));
        }
        $sales = $this->SaleLines->Sales->find('list', [
            'limit' => 200,
            'contain' => ['TransactionTriggers', 'Merchants', 'Customers']
        ]);
        $products = $this->SaleLines->Products->find('list', ['limit' => 200]);
        $units = $this->SaleLines->Units->find('list', ['limit' => 200]);
        $currencies = $this->SaleLines->Currencies->find('list', ['limit' => 200]);
        $saleUpdates = $this->SaleLines->SaleUpdates->find('list', [
            'limit' => 200,
            'contain' => ['Sales' => ['Merchants', 'Customers']],
            'conditions' => $saleUpdatesConditions
        ]);
        $this->set(compact('saleLine', 'sales', 'products', 'units', 'currencies', 'saleUpdates'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sale Line id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $saleLine = $this->SaleLines->get($id);
        if ($this->SaleLines->delete($saleLine)) {
            $this->Flash->success(__('The sale line has been deleted.'));
        } else {
            $this->Flash->error(__('The sale line could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
