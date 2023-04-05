<?php
declare (strict_types = 1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    // public function beforeFilter(\Cake\Event\EventInterface$event)
    // {
    //     parent::beforeFilter($event);
    //     // Configure the login action to not require authentication, preventing
    //     // the infinite redirect loop issue
    //     $this->Authentication->addUnauthenticatedActions(['login']);
    // }

    public function index()
    {
        $key = $this->request->getQuery('name');
        if ($key) {
            // ** search using get method *******
            // $query = $this->Users->find()->where(['username LIKE' => '%' . $key . '%']);
            // $query = $this->Users->find()->where(['Or'=>['username LIKE' => '%' . $key . '%','email LIKE' => '%' . $key . '%']]);
            // ** search using get method ends *******

            // ** Dynamic search *******
            // $query= $this->Users->findByUsername($key);
            $query = $this->Users->findAllByUsernameOrEmail($key, $key);

            // ** Dynamic search ends *******

        } else {

            $query = $this->Users;

        }
        $users = $this->paginate($query,['contain'=>['Profiles','Skills']]);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Profiles', 'Skills'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            //    dd($this->request->getData());
            if ($this->request->getData('image')->getSize() > 0) {
                $file = $this->request->getData('image');
                $fileName = $file->getClientFilename();
                if(!is_dir(WWW_ROOT.'img'.DS.'user_img')){
                    mkdir(WWW_ROOT.'img'.DS.'user_img',0777);
                }
                $target_path=WWW_ROOT.'img'.DS.'user_img'.DS.$fileName;
                if($fileName){
                    $file->moveTO($target_path);
                    $user->image = 'user_img/'.$fileName;
                }
                
            }
            if ($this->Users->saveOrFail($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->request->getData('change_image')->getSize() > 0) {
                $file = $this->request->getData('change_image');
                $fileName = $file->getClientFilename();
                if(!is_dir(WWW_ROOT.'img'.DS.'user_img')){
                    mkdir(WWW_ROOT.'img'.DS.'user_img',0777);
                }
                $target_path=WWW_ROOT.'img'.DS.'user_img'.DS.$fileName;
                if($fileName){
                    $imgpath=WWW_ROOT.'img'.DS.$user->image;

                        if(file_exists($imgpath)){
                            unlink($imgpath);
                        }
                    $file->moveTO($target_path);
                    $user->image = 'user_img/'.$fileName;
            
                }
                
            }
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $imgpath=WWW_ROOT.'img'.DS.$user->image;
        if ($this->Users->delete($user)) {
            if(file_exists($imgpath)){
                unlink($imgpath);
            }
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
              
                if ($user['status'] == 0) {
                    $this->Flash->error(__('You do not have access!!'));
                    return $this->redirect(['controller' => 'users', 'action' => 'logout']);

                }
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Username or password is incorrect'));
            }
        }
    }
    // public function login()
    // {
    //     $this->request->allowMethod(['get', 'post']);
    //     $result = $this->Authentication->getResult();
    //     // regardless of POST or GET, redirect if user is logged in
    //     if ($result && $result->isValid()) {

    //         return $this->redirect(['controller' => 'Users', 'action' => 'index']);
    //     }
    //     // display error if user submitted and authentication failed
    //     if ($this->request->is('post') && !$result->isValid()) {
    //         $this->Flash->error(__('Invalid username or password'));
    //     }
    // }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    // public function logout()
    // {
    //     $result = $this->Authentication->getResult();
    //     // regardless of POST or GET, redirect if user is logged in
    //     if ($result && $result->isValid()) {
    //         $this->Authentication->logout();
    //         return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    //     }
    // }

    public function deleteAll()
    {
        $this->request->allowMethod(['post', 'delete']);
        $ids = $this->request->getData('ids');
        dd($ids);
        if ($this->Users->deleteAll(['Users.id IN' => $ids])) {
            $this->Flash->success(__('The users has been deleted.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function userStatus($id = null, $status)
    {
        $this->request->allowMethod(['post']);
        $user = $this->Users->get($id);
        if ($status == 1) {
            $user->status = 0;

        } else {
            $user->status = 1;

        }
        if ($this->Users->save($user)) {
            $this->Flash->success(__('Status Updated Sucessfully'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The user could not be update status. Please, try again.'));
    }

}
