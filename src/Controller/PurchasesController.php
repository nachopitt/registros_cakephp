<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Purchases Controller
 *
 * @property \App\Model\Table\PurchasesTable $Purchases
 * @method \App\Model\Entity\Purchase[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchasesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Merchants', 'TransactionTriggers'],
        ];
        $purchases = $this->paginate($this->Purchases);
        $states = $this->Purchases->getStates();

        $this->set(compact('purchases', 'states'));
    }

    /**
     * View method
     *
     * @param string|null $id Purchase id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchase = $this->Purchases->get($id, [
            'contain' => [
                'Merchants',
                'TransactionTriggers',
                'PurchaseLines' => ['Products', 'Units', 'Currencies'],
                'PurchaseUpdates' => [
                    'PurchaseLines' => ['Products', 'Units', 'Currencies']
                ]
            ],
        ]);
        $states = $this->Purchases->getStates();

        $this->set(compact('purchase', 'states'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($lines = 1)
    {
        $purchase = $this->Purchases->newEmptyEntity();
        if ($this->request->is('post') && isset($this->request->getData()['add_line'])) {
            $lines++;
            $this->Flash->success(__('Added 1 more Purchase Line'));
        }
        else if ($this->request->is('post') && isset($this->request->getData()['remove_line'])) {
            if ($lines == 1) {
                $this->Flash->error(__('At least 1 Purchase Line is required'));
            }
            else {
                $lines--;
                $this->Flash->success(__('Last Purchase Line was removed'));
            }
        }
        else if ($this->request->is('post')) {
            $options = ['associated' => ['TransactionTriggers', 'PurchaseLines', 'PurchaseUpdates']];
            $purchase = $this->Purchases->patchEntity($purchase, $this->request->getData(), $options);

            $purchase->transaction_trigger->type = 'PURCHASE';
            if ($this->Purchases->save($purchase)) {
                $this->Flash->success(__('The purchase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase could not be saved. Please, try again.'));
        }
        $merchants = $this->Purchases->Merchants->find('list', ['limit' => 200]);
        $states = $this->Purchases->getStates();
        $products = $this->Purchases->PurchaseLines->Products->find('list', ['limit' => 200]);
        $units = $this->Purchases->PurchaseLines->Units->find('list', ['limit' => 200]);
        $currencies = $this->Purchases->PurchaseLines->Currencies->find('list', ['limit' => 200]);
        $sellers = $this->Purchases->PurchaseLines->Sellers->find('list', ['limit' => 200]);
        $this->set(compact('purchase', 'merchants', 'states', 'products', 'units', 'currencies', 'sellers', 'lines'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchase id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchase = $this->Purchases->get($id, [
            'contain' => ['TransactionTriggers'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchase = $this->Purchases->patchEntity($purchase, $this->request->getData());
            if ($this->Purchases->save($purchase)) {
                $this->Flash->success(__('The purchase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase could not be saved. Please, try again.'));
        }
        $merchants = $this->Purchases->Merchants->find('list', ['limit' => 200]);
        $states = $this->Purchases->getStates();
        $this->set(compact('purchase', 'merchants', 'states'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Purchase id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchase = $this->Purchases->get($id);
        if ($this->Purchases->delete($purchase)) {
            $this->Flash->success(__('The purchase has been deleted.'));
        } else {
            $this->Flash->error(__('The purchase could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
