<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MoneyMovements Controller
 *
 * @property \App\Model\Table\MoneyMovementsTable $MoneyMovements
 * @method \App\Model\Entity\MoneyMovement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MoneyMovementsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Units', 'Currencies', 'PaymentMethods'],
        ];
        $moneyMovements = $this->paginate($this->MoneyMovements);

        $this->set(compact('moneyMovements'));
    }

    /**
     * View method
     *
     * @param string|null $id Money Movement id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $moneyMovement = $this->MoneyMovements->get($id, [
            'contain' => ['Units', 'Currencies', 'PaymentMethods', 'PurchaseLines', 'SaleLines'],
        ]);

        $this->set(compact('moneyMovement'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $moneyMovement = $this->MoneyMovements->newEmptyEntity();
        if ($this->request->is('post')) {
            $moneyMovement = $this->MoneyMovements->patchEntity($moneyMovement, $this->request->getData());
            if ($this->MoneyMovements->save($moneyMovement)) {
                $this->Flash->success(__('The money movement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The money movement could not be saved. Please, try again.'));
        }
        $units = $this->MoneyMovements->Units->find('list', ['limit' => 200]);
        $currencies = $this->MoneyMovements->Currencies->find('list', ['limit' => 200]);
        $paymentMethods = $this->MoneyMovements->PaymentMethods->find('list', ['limit' => 200]);
        $this->set(compact('moneyMovement', 'units', 'currencies', 'paymentMethods'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Money Movement id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $moneyMovement = $this->MoneyMovements->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $moneyMovement = $this->MoneyMovements->patchEntity($moneyMovement, $this->request->getData());
            if ($this->MoneyMovements->save($moneyMovement)) {
                $this->Flash->success(__('The money movement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The money movement could not be saved. Please, try again.'));
        }
        $units = $this->MoneyMovements->Units->find('list', ['limit' => 200]);
        $currencies = $this->MoneyMovements->Currencies->find('list', ['limit' => 200]);
        $paymentMethods = $this->MoneyMovements->PaymentMethods->find('list', ['limit' => 200]);
        $this->set(compact('moneyMovement', 'units', 'currencies', 'paymentMethods'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Money Movement id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $moneyMovement = $this->MoneyMovements->get($id);
        if ($this->MoneyMovements->delete($moneyMovement)) {
            $this->Flash->success(__('The money movement has been deleted.'));
        } else {
            $this->Flash->error(__('The money movement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
