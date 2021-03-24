<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CatalogEntries Controller
 *
 * @property \App\Model\Table\CatalogEntriesTable $CatalogEntries
 * @method \App\Model\Entity\CatalogEntry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CatalogEntriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $catalogEntries = $this->paginate($this->CatalogEntries);

        $this->set(compact('catalogEntries'));
    }

    /**
     * View method
     *
     * @param string|null $id Catalog Entry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $catalogEntry = $this->CatalogEntries->get($id, [
            'contain' => ['Tags'],
        ]);

        $this->set(compact('catalogEntry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $catalogNames = $this->CatalogEntries->getCatalogNames();
        $catalogEntry = $this->CatalogEntries->newEmptyEntity();
        if ($this->request->is('post')) {
            $catalogEntry = $this->CatalogEntries->patchEntity($catalogEntry, $this->request->getData());
            if ($this->CatalogEntries->save($catalogEntry)) {
                $this->Flash->success(__('The catalog entry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The catalog entry could not be saved. Please, try again.'));
        }
        $tags = $this->CatalogEntries->Tags->find('list', ['limit' => 200]);
        $this->set(compact('catalogEntry', 'catalogNames', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Catalog Entry id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $catalogNames = $this->CatalogEntries->getCatalogNames();
        $catalogEntry = $this->CatalogEntries->get($id, [
            'contain' => ['Tags'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $catalogEntry = $this->CatalogEntries->patchEntity($catalogEntry, $this->request->getData());
            if ($this->CatalogEntries->save($catalogEntry)) {
                $this->Flash->success(__('The catalog entry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The catalog entry could not be saved. Please, try again.'));
        }
        $tags = $this->CatalogEntries->Tags->find('list', ['limit' => 200]);
        $this->set(compact('catalogEntry', 'catalogNames', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Catalog Entry id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $catalogEntry = $this->CatalogEntries->get($id);
        if ($this->CatalogEntries->delete($catalogEntry)) {
            $this->Flash->success(__('The catalog entry has been deleted.'));
        } else {
            $this->Flash->error(__('The catalog entry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
