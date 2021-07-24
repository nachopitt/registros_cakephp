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
            'contain' => ['Products', 'Units', 'Currencies', 'Sellers'],
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
            'contain' => ['Products', 'Units', 'Currencies', 'Sellers', 'PurchaseUpdates'],
        ]);

        $this->set(compact('purchaseLine'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purchaseLine = $this->PurchaseLines->newEmptyEntity();
        if ($this->request->is('post')) {
            $purchaseLine = $this->PurchaseLines->patchEntity($purchaseLine, $this->request->getData());
            if ($this->PurchaseLines->save($purchaseLine)) {
                $this->Flash->success(__('The purchase line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase line could not be saved. Please, try again.'));
        }
        $products = $this->PurchaseLines->Products->find('list', ['limit' => 200]);
        $units = $this->PurchaseLines->Units->find('list', ['limit' => 200]);
        $currencies = $this->PurchaseLines->Currencies->find('list', ['limit' => 200]);
        $sellers = $this->PurchaseLines->Sellers->find('list', ['limit' => 200]);
        $this->PurchaseLines->PurchaseUpdates->setDisplayField('summary');
        $purchaseUpdates = $this->PurchaseLines->PurchaseUpdates->find('list', [
            'limit' => 200,
            'contain' => ['Purchases' => 'Merchants', 'PurchaseStatuses'],
            'conditions' => ['PurchaseStatuses.short_name IN' => ['PURCHASED', 'ORDERED']]]);
        $this->set(compact('purchaseLine', 'products', 'units', 'currencies', 'sellers', 'purchaseUpdates'));
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
            'contain' => ['PurchaseUpdates'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchaseLine = $this->PurchaseLines->patchEntity($purchaseLine, $this->request->getData());
            if ($this->PurchaseLines->save($purchaseLine)) {
                $this->Flash->success(__('The purchase line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase line could not be saved. Please, try again.'));
        }
        $products = $this->PurchaseLines->Products->find('list', ['limit' => 200]);
        $units = $this->PurchaseLines->Units->find('list', ['limit' => 200]);
        $currencies = $this->PurchaseLines->Currencies->find('list', ['limit' => 200]);
        $sellers = $this->PurchaseLines->Sellers->find('list', ['limit' => 200]);
        $purchaseUpdates = $this->PurchaseLines->PurchaseUpdates->find('list', ['limit' => 200]);
        $this->set(compact('purchaseLine', 'products', 'units', 'currencies', 'sellers', 'purchaseUpdates'));
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
