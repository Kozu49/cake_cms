<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FootballRagistrations Controller
 *
 * @property \App\Model\Table\FootballRagistrationsTable $FootballRagistrations
 * @method \App\Model\Entity\FootballRagistration[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FootballRagistrationsController extends AppController
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
        $footballRagistrations = $this->paginate($this->FootballRagistrations);

        $this->set(compact('footballRagistrations'));
    }

    /**
     * View method
     *
     * @param string|null $id Football Ragistration id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $footballRagistration = $this->FootballRagistrations->get($id, [
            'contain' => ['Students'],
        ]);

        $this->set(compact('footballRagistration'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $footballRagistration = $this->FootballRagistrations->newEmptyEntity();
        if ($this->request->is('post')) {
            $footballRagistration = $this->FootballRagistrations->patchEntity($footballRagistration, $this->request->getData());
            if ($this->FootballRagistrations->save($footballRagistration)) {
                $this->Flash->success(__('The football ragistration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The football ragistration could not be saved. Please, try again.'));
        }
        $students = $this->FootballRagistrations->Students->find('list', ['limit' => 200])->all();
        $this->set(compact('footballRagistration', 'students'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Football Ragistration id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $footballRagistration = $this->FootballRagistrations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $footballRagistration = $this->FootballRagistrations->patchEntity($footballRagistration, $this->request->getData());
            if ($this->FootballRagistrations->save($footballRagistration)) {
                $this->Flash->success(__('The football ragistration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The football ragistration could not be saved. Please, try again.'));
        }
        $students = $this->FootballRagistrations->Students->find('list', ['limit' => 200])->all();
        $this->set(compact('footballRagistration', 'students'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Football Ragistration id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $footballRagistration = $this->FootballRagistrations->get($id);
        if ($this->FootballRagistrations->delete($footballRagistration)) {
            $this->Flash->success(__('The football ragistration has been deleted.'));
        } else {
            $this->Flash->error(__('The football ragistration could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
