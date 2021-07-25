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
            'contain' => ['Products', 'Units', 'Currencies'],
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
            'contain' => ['Products', 'Units', 'Currencies', 'SaleUpdates'],
        ]);

        $this->set(compact('saleLine'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($parent = null, $id = null)
    {
        $saleLine = $this->SaleLines->newEmptyEntity();
        $initialStates = $this->SaleLines->SaleUpdates->SaleStatuses->getInitialStates();
        $conditions = ['SaleStatuses.short_name IN' => $initialStates];
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
                $conditions = array_merge($conditions, ['SaleUpdates.sale_id' => $id]);
            }
            else if ($parent == 'sale_update' && $id != null) {
                $conditions = array_merge($conditions, ['SaleUpdates.id' => $id]);
                $saleLine = $this->SaleLines->patchEntity($saleLine,
                    ['sale_updates' => ['_ids' => [$id]]],
                    ['validate' => false]
                );
            }
        }
        $products = $this->SaleLines->Products->find('list', ['limit' => 200]);
        $units = $this->SaleLines->Units->find('list', ['limit' => 200]);
        $currencies = $this->SaleLines->Currencies->find('list', ['limit' => 200]);
        $this->SaleLines->SaleUpdates->setDisplayField('summary');
        $initialStates = $this->SaleLines->SaleUpdates->SaleStatuses->getInitialStates();
        $saleUpdates = $this->SaleLines->SaleUpdates->find('list', [
            'limit' => 200,
            'contain' => ['Sales' => ['Merchants', 'Customers'], 'SaleStatuses'],
            'conditions' => $conditions
        ]);
        $this->set(compact('saleLine', 'products', 'units', 'currencies', 'saleUpdates'));
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $saleLine = $this->SaleLines->patchEntity($saleLine, $this->request->getData());
            if ($this->SaleLines->save($saleLine)) {
                $this->Flash->success(__('The sale line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale line could not be saved. Please, try again.'));
        }
        $products = $this->SaleLines->Products->find('list', ['limit' => 200]);
        $units = $this->SaleLines->Units->find('list', ['limit' => 200]);
        $currencies = $this->SaleLines->Currencies->find('list', ['limit' => 200]);
        $saleUpdates = $this->SaleLines->SaleUpdates->find('list', ['limit' => 200]);
        $this->set(compact('saleLine', 'products', 'units', 'currencies', 'saleUpdates'));
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
