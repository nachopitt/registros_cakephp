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

        $this->set(compact('purchases'));
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
            'contain' => ['Merchants', 'TransactionTriggers', 'PurchaseUpdates' => ['PurchaseStatuses', 'PurchaseLines' => ['Products', 'Units', 'Currencies']]],
        ]);

        $this->set(compact('purchase'));
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
            $associated = ['associated' => ['TransactionTriggers', 'PurchaseUpdates.PurchaseLines']];
            $purchase = $this->Purchases->patchEntity($purchase, $this->request->getData(), $associated);

            $purchase->transaction_trigger->type = 'PURCHASE';

            $purchase->purchase_updates[0]->date = $purchase->transaction_trigger->date;

            if ($this->Purchases->save($purchase)) {
                $this->Flash->success(__('The purchase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase could not be saved. Please, try again.'));
        }
        $merchants = $this->Purchases->Merchants->find('list', ['limit' => 200]);
        $initialStates = $this->Purchases->PurchaseUpdates->PurchaseStatuses->getInitialStates();
        $purchaseStatuses = $this->Purchases->PurchaseUpdates->PurchaseStatuses->find('list', [
            'limit' => 200,
            'conditions' => ['PurchaseStatuses.short_name IN' => $initialStates]
        ]);
        $products = $this->Purchases->PurchaseUpdates->PurchaseLines->Products->find('list', ['limit' => 200]);
        $units = $this->Purchases->PurchaseUpdates->PurchaseLines->Units->find('list', ['limit' => 200]);
        $currencies = $this->Purchases->PurchaseUpdates->PurchaseLines->Currencies->find('list', ['limit' => 200]);
        $sellers = $this->Purchases->PurchaseUpdates->PurchaseLines->Sellers->find('list', ['limit' => 200]);
        $this->set(compact('purchase', 'merchants', 'purchaseStatuses', 'products', 'units', 'currencies', 'sellers', 'lines'));
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
        $this->set(compact('purchase', 'merchants'));
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
