<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PicnicRagistrations Controller
 *
 * @property \App\Model\Table\PicnicRagistrationsTable $PicnicRagistrations
 * @method \App\Model\Entity\PicnicRagistration[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PicnicRagistrationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students'],
        ];
        $picnicRagistrations = $this->paginate($this->PicnicRagistrations);

        $this->set(compact('picnicRagistrations'));
    }

    /**
     * View method
     *
     * @param string|null $id Picnic Ragistration id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $picnicRagistration = $this->PicnicRagistrations->get($id, [
            'contain' => ['Students'],
        ]);

        $this->set(compact('picnicRagistration'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $picnicRagistration = $this->PicnicRagistrations->newEmptyEntity();
        if ($this->request->is('post')) {
            $picnicRagistration = $this->PicnicRagistrations->patchEntity($picnicRagistration, $this->request->getData());
            if ($this->PicnicRagistrations->save($picnicRagistration)) {
                $this->Flash->success(__('The picnic ragistration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The picnic ragistration could not be saved. Please, try again.'));
        }
        $students = $this->PicnicRagistrations->Students->find('list', ['limit' => 200])->all();
        $this->set(compact('picnicRagistration', 'students'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Picnic Ragistration id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $picnicRagistration = $this->PicnicRagistrations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $picnicRagistration = $this->PicnicRagistrations->patchEntity($picnicRagistration, $this->request->getData());
            if ($this->PicnicRagistrations->save($picnicRagistration)) {
                $this->Flash->success(__('The picnic ragistration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The picnic ragistration could not be saved. Please, try again.'));
        }
        $students = $this->PicnicRagistrations->Students->find('list', ['limit' => 200])->all();
        $this->set(compact('picnicRagistration', 'students'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Picnic Ragistration id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $picnicRagistration = $this->PicnicRagistrations->get($id);
        if ($this->PicnicRagistrations->delete($picnicRagistration)) {
            $this->Flash->success(__('The picnic ragistration has been deleted.'));
        } else {
            $this->Flash->error(__('The picnic ragistration could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
