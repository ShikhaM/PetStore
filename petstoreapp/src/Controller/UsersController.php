<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['LoginSession', 'PetDetails']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    // Login Method
    public function login() {
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                return $this->redirect(['controller' => 'pet-details', 'action' => 'index']);
               // return $this->redirect($this->Auth->redirectUrl());
            }

            // Login Error
            $this->Flash->error('Incorrect Login');
        }
    }

    // Logout Method
    public function logout(){
        $this->Flash->success('You are now logged out');
        return $this->redirect($this->Auth->logout());
    }

    private function GUID()
    {
    if (function_exists('com_create_guid') === true)
        {
        return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
    
    // Restful Login Method
    public function restfullogin() {

        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                
                $sessiontoken = $this->GUID(); 
                $userid = $user['id'];
                $insertquery = "insert into login_session(user_id, start_time, session_token)  values ($userid, now(), '$sessiontoken');";
                $connection = ConnectionManager::get('default');
                $results = $connection->execute($insertquery );

                // $sessiontoken = $insertquery; // uncomment this line for the result to show the sql query

                $this->Auth->setUser($user);               
                $this->set(compact('sessiontoken'));
                $this->set('_serialize', ['sessiontoken']);                
               
            } else {

            // Login Error
             $this->set('_serialize', []);
            }
        }
    }

    // Register Method
    public function register()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('You are now registered and can login'));
            // return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('Could Not Register'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    

    // beforeFilter Method
    public function beforeFilter(\Cake\Event\Event $event){
        $this->Auth->allow(['register']);
        $this->Auth->allow(['restfullogin']);
    }
}
