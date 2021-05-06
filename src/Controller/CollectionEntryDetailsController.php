<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CollectionEntryDetails Controller
 *
 * @property \App\Model\Table\CollectionEntryDetailsTable $CollectionEntryDetails
 * @method \App\Model\Entity\CollectionEntryDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CollectionEntryDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CollectionEntries', 'CollectionRegions', 'CollectionConditions'],
        ];
        $collectionEntryDetails = $this->paginate($this->CollectionEntryDetails);

        $this->set(compact('collectionEntryDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Collection Entry Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $collectionEntryDetail = $this->CollectionEntryDetails->get($id, [
            'contain' => ['CollectionEntries', 'CollectionRegions', 'CollectionConditions'],
        ]);

        $this->set(compact('collectionEntryDetail'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $collectionEntryDetail = $this->CollectionEntryDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $collectionEntryDetail = $this->CollectionEntryDetails->patchEntity($collectionEntryDetail, $this->request->getData());
            if ($this->CollectionEntryDetails->save($collectionEntryDetail)) {
                $this->Flash->success(__('The collection entry detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The collection entry detail could not be saved. Please, try again.'));
        }
        $collectionEntries = $this->CollectionEntryDetails->CollectionEntries->find('list', ['limit' => 200]);
        $collectionRegions = $this->CollectionEntryDetails->CollectionRegions->find('list', ['limit' => 200]);
        $collectionConditions = $this->CollectionEntryDetails->CollectionConditions->find('list', ['limit' => 200]);
        $this->set(compact('collectionEntryDetail', 'collectionEntries', 'collectionRegions', 'collectionConditions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Collection Entry Detail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $collectionEntryDetail = $this->CollectionEntryDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $collectionEntryDetail = $this->CollectionEntryDetails->patchEntity($collectionEntryDetail, $this->request->getData());
            if ($this->CollectionEntryDetails->save($collectionEntryDetail)) {
                $this->Flash->success(__('The collection entry detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The collection entry detail could not be saved. Please, try again.'));
        }
        $collectionEntries = $this->CollectionEntryDetails->CollectionEntries->find('list', ['limit' => 200]);
        $collectionRegions = $this->CollectionEntryDetails->CollectionRegions->find('list', ['limit' => 200]);
        $collectionConditions = $this->CollectionEntryDetails->CollectionConditions->find('list', ['limit' => 200]);
        $this->set(compact('collectionEntryDetail', 'collectionEntries', 'collectionRegions', 'collectionConditions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Collection Entry Detail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $collectionEntryDetail = $this->CollectionEntryDetails->get($id);
        if ($this->CollectionEntryDetails->delete($collectionEntryDetail)) {
            $this->Flash->success(__('The collection entry detail has been deleted.'));
        } else {
            $this->Flash->error(__('The collection entry detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
