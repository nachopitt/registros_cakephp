<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PurchaseLines Controller
 *
 * @property \App\Model\Table\PurchaseLinesTable $PurchaseLines
 * @method \App\Model\Entity\PurchaseLine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchaseLinesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Purchases' => ['TransactionTriggers', 'Merchants'], 'Products', 'Units', 'Currencies', 'Sellers'],
        ];
        $purchaseLines = $this->paginate($this->PurchaseLines);

        $this->set(compact('purchaseLines'));
    }

    /**
     * View method
     *
     * @param string|null $id Purchase Line id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchaseLine = $this->PurchaseLines->get($id, [
            'contain' => ['Purchases' => ['TransactionTriggers', 'Merchants'], 'Products', 'Units', 'Currencies', 'Sellers', 'PurchaseUpdates'],
        ]);

        $this->set(compact('purchaseLine'));
    }

    /**
     * Add method
     *
     * @param string|null $parent String identifying the id param. Either 'purchase' or 'purchase_update'
     * @param string|null $id Either Purchase Line id or Purchase Update id.
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($parent = null, $id = null)
    {
        $purchaseLine = $this->PurchaseLines->newEmptyEntity();
        $purchasesConditions = [];
        $purchaseUpdatesConditions = [];
        if ($this->request->is('post')) {
            $purchaseLine = $this->PurchaseLines->patchEntity($purchaseLine, $this->request->getData());
            if ($this->PurchaseLines->save($purchaseLine)) {
                $this->Flash->success(__('The purchase line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase line could not be saved. Please, try again.'));
        }
        else {
            if ($parent == 'purchase' && $id != null) {
                $purchasesConditions = ['Purchases.id' => $id];
                $purchaseUpdatesConditions = ['PurchaseUpdates.purchase_id' => $id];
            }
            else if ($parent == 'purchase_update' && $id != null) {
                $purchaseUpdatesConditions = ['PurchaseUpdates.id' => $id];
                $purchaseLine = $this->PurchaseLines->patchEntity($purchaseLine,
                    ['purchase_updates' => ['_ids' => [$id]]],
                    ['validate' => false]
                );
            }
        }
        $purchases = $this->PurchaseLines->Purchases->find('list', [
            'limit' => 200,
            'contain' => ['TransactionTriggers', 'Merchants'],
            'conditions' => $purchasesConditions
        ]);
        if ($parent == 'purchase_update' && $id != null) {
            $purchases->matching('PurchaseUpdates', function($q) use($id) {
                return $q->where(['PurchaseUpdates.id' => $id]);
            });
        }
        $products = $this->PurchaseLines->Products->find('list', ['limit' => 200]);
        $units = $this->PurchaseLines->Units->find('list', ['limit' => 200]);
        $currencies = $this->PurchaseLines->Currencies->find('list', ['limit' => 200]);
        $sellers = $this->PurchaseLines->Sellers->find('list', ['limit' => 200]);
        $purchaseUpdates = $this->PurchaseLines->PurchaseUpdates->find('list', [
            'limit' => 200,
            'contain' => ['Purchases' => 'Merchants', 'PurchaseStatuses'],
            'conditions' => $purchaseUpdatesConditions
        ]);
        $this->set(compact('purchaseLine', 'purchases', 'products', 'units', 'currencies', 'sellers', 'purchaseUpdates'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchase Line id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchaseLine = $this->PurchaseLines->get($id, [
            'contain' => ['PurchaseUpdates' => 'PurchaseStatuses'],
        ]);
        $purchaseUpdatesConditions = ['PurchaseUpdates.purchase_id' => $purchaseLine->purchase_id];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchaseLine = $this->PurchaseLines->patchEntity($purchaseLine, $this->request->getData());
            if ($this->PurchaseLines->save($purchaseLine)) {
                $this->Flash->success(__('The purchase line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase line could not be saved. Please, try again.'));
        }
        $purchases = $this->PurchaseLines->Purchases->find('list', [
            'limit' => 200,
            'contain' => ['TransactionTriggers', 'Merchants']
        ]);
        $products = $this->PurchaseLines->Products->find('list', ['limit' => 200]);
        $units = $this->PurchaseLines->Units->find('list', ['limit' => 200]);
        $currencies = $this->PurchaseLines->Currencies->find('list', ['limit' => 200]);
        $sellers = $this->PurchaseLines->Sellers->find('list', ['limit' => 200]);
        $purchaseUpdates = $this->PurchaseLines->PurchaseUpdates->find('list', [
            'limit' => 200,
            'contain' => ['Purchases' => 'Merchants', 'PurchaseStatuses'],
            'conditions' => $purchaseUpdatesConditions
        ]);
        $this->set(compact('purchaseLine', 'purchases', 'products', 'units', 'currencies', 'sellers', 'purchaseUpdates'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Purchase Line id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchaseLine = $this->PurchaseLines->get($id);
        if ($this->PurchaseLines->delete($purchaseLine)) {
            $this->Flash->success(__('The purchase line has been deleted.'));
        } else {
            $this->Flash->error(__('The purchase line could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
