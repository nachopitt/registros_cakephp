<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CollectionEntries Controller
 *
 * @property \App\Model\Table\CollectionEntriesTable $CollectionEntries
 * @method \App\Model\Entity\CollectionEntry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CollectionEntriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Collections', 'CollectionSeries'],
        ];
        $collectionEntries = $this->paginate($this->CollectionEntries);

        $this->set(compact('collectionEntries'));
    }

    /**
     * View method
     *
     * @param string|null $id Collection Entry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $collectionEntry = $this->CollectionEntries->get($id, [
            'contain' => ['Products', 'Collections', 'CollectionSeries', 'CollectionEntryDetails'],
        ]);

        $this->set(compact('collectionEntry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $collectionEntry = $this->CollectionEntries->newEmptyEntity();
        if ($this->request->is('post')) {
            $collectionEntry = $this->CollectionEntries->patchEntity($collectionEntry, $this->request->getData());
            if ($this->CollectionEntries->save($collectionEntry)) {
                $this->Flash->success(__('The collection entry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The collection entry could not be saved. Please, try again.'));
        }
        $products = $this->CollectionEntries->Products->find('list', ['limit' => 200]);
        $collections = $this->CollectionEntries->Collections->find('list', ['limit' => 200]);
        $collectionSeries = $this->CollectionEntries->CollectionSeries->find('list', ['limit' => 200]);
        $this->set(compact('collectionEntry', 'products', 'collections', 'collectionSeries'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Collection Entry id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $collectionEntry = $this->CollectionEntries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $collectionEntry = $this->CollectionEntries->patchEntity($collectionEntry, $this->request->getData());
            if ($this->CollectionEntries->save($collectionEntry)) {
                $this->Flash->success(__('The collection entry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The collection entry could not be saved. Please, try again.'));
        }
        $products = $this->CollectionEntries->Products->find('list', ['limit' => 200]);
        $collections = $this->CollectionEntries->Collections->find('list', ['limit' => 200]);
        $collectionSeries = $this->CollectionEntries->CollectionSeries->find('list', ['limit' => 200]);
        $this->set(compact('collectionEntry', 'products', 'collections', 'collectionSeries'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Collection Entry id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $collectionEntry = $this->CollectionEntries->get($id);
        if ($this->CollectionEntries->delete($collectionEntry)) {
            $this->Flash->success(__('The collection entry has been deleted.'));
        } else {
            $this->Flash->error(__('The collection entry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
