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
            'contain' => ['Sales'],
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
            'contain' => ['Sales', 'SaleLines'],
        ]);

        $this->set(compact('saleUpdate'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $saleUpdate = $this->SaleUpdates->newEmptyEntity();
        if ($this->request->is('post')) {
            $saleUpdate = $this->SaleUpdates->patchEntity($saleUpdate, $this->request->getData());
            if ($this->SaleUpdates->save($saleUpdate)) {
                $this->Flash->success(__('The sale update has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale update could not be saved. Please, try again.'));
        }
        $sales = $this->SaleUpdates->Sales->find('list', ['limit' => 200]);
        $saleLines = $this->SaleUpdates->SaleLines->find('list', ['limit' => 200]);
        $this->set(compact('saleUpdate', 'sales', 'saleLines'));
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $saleUpdate = $this->SaleUpdates->patchEntity($saleUpdate, $this->request->getData());
            if ($this->SaleUpdates->save($saleUpdate)) {
                $this->Flash->success(__('The sale update has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale update could not be saved. Please, try again.'));
        }
        $sales = $this->SaleUpdates->Sales->find('list', ['limit' => 200]);
        $saleLines = $this->SaleUpdates->SaleLines->find('list', ['limit' => 200]);
        $this->set(compact('saleUpdate', 'sales', 'saleLines'));
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
