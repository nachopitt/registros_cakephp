<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TransactionTriggers Controller
 *
 * @property \App\Model\Table\TransactionTriggersTable $TransactionTriggers
 * @method \App\Model\Entity\TransactionTrigger[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransactionTriggersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $transactionTriggers = $this->paginate($this->TransactionTriggers);

        $types = $this->TransactionTriggers->getTypes();
        $this->set(compact('transactionTriggers', 'types'));
    }

    /**
     * View method
     *
     * @param string|null $id Transaction Trigger id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transactionTrigger = $this->TransactionTriggers->get($id, [
            'contain' => ['Purchases', 'Sales', 'Transactions'],
        ]);

        $types = $this->TransactionTriggers->getTypes();
        $this->set(compact('transactionTrigger', 'types'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transactionTrigger = $this->TransactionTriggers->newEmptyEntity();
        if ($this->request->is('post')) {
            $transactionTrigger = $this->TransactionTriggers->patchEntity($transactionTrigger, $this->request->getData());
            if ($this->TransactionTriggers->save($transactionTrigger)) {
                $this->Flash->success(__('The transaction trigger has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction trigger could not be saved. Please, try again.'));
        }
        $types = $this->TransactionTriggers->getTypes();
        $this->set(compact('transactionTrigger', 'types'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transaction Trigger id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transactionTrigger = $this->TransactionTriggers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transactionTrigger = $this->TransactionTriggers->patchEntity($transactionTrigger, $this->request->getData());
            if ($this->TransactionTriggers->save($transactionTrigger)) {
                $this->Flash->success(__('The transaction trigger has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction trigger could not be saved. Please, try again.'));
        }
        $types = $this->TransactionTriggers->getTypes();
        $this->set(compact('transactionTrigger', 'types'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaction Trigger id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transactionTrigger = $this->TransactionTriggers->get($id);
        if ($this->TransactionTriggers->delete($transactionTrigger)) {
            $this->Flash->success(__('The transaction trigger has been deleted.'));
        } else {
            $this->Flash->error(__('The transaction trigger could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
