<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MoneyAccounts Controller
 *
 * @property \App\Model\Table\MoneyAccountsTable $MoneyAccounts
 * @method \App\Model\Entity\MoneyAccount[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MoneyAccountsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MoneyAccountTypes'],
        ];
        $moneyAccounts = $this->paginate($this->MoneyAccounts);

        $this->set(compact('moneyAccounts'));
    }

    /**
     * View method
     *
     * @param string|null $id Money Account id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $moneyAccount = $this->MoneyAccounts->get($id, [
            'contain' => ['MoneyAccountTypes', 'Transactions'],
        ]);

        $this->set(compact('moneyAccount'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $moneyAccount = $this->MoneyAccounts->newEmptyEntity();
        if ($this->request->is('post')) {
            $moneyAccount = $this->MoneyAccounts->patchEntity($moneyAccount, $this->request->getData());
            if ($this->MoneyAccounts->save($moneyAccount)) {
                $this->Flash->success(__('The money account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The money account could not be saved. Please, try again.'));
        }
        $moneyAccountTypes = $this->MoneyAccounts->MoneyAccountTypes->find('list', ['limit' => 200]);
        $this->set(compact('moneyAccount', 'moneyAccountTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Money Account id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $moneyAccount = $this->MoneyAccounts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $moneyAccount = $this->MoneyAccounts->patchEntity($moneyAccount, $this->request->getData());
            if ($this->MoneyAccounts->save($moneyAccount)) {
                $this->Flash->success(__('The money account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The money account could not be saved. Please, try again.'));
        }
        $moneyAccountTypes = $this->MoneyAccounts->MoneyAccountTypes->find('list', ['limit' => 200]);
        $this->set(compact('moneyAccount', 'moneyAccountTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Money Account id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $moneyAccount = $this->MoneyAccounts->get($id);
        if ($this->MoneyAccounts->delete($moneyAccount)) {
            $this->Flash->success(__('The money account has been deleted.'));
        } else {
            $this->Flash->error(__('The money account could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
