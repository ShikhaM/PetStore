<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LoginSession Controller
 *
 * @property \App\Model\Table\LoginSessionTable $LoginSession
 */
class LoginSessionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $loginSession = $this->paginate($this->LoginSession);

        $this->set(compact('loginSession'));
        $this->set('_serialize', ['loginSession']);
    }

    /**
     * View method
     *
     * @param string|null $id Login Session id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loginSession = $this->LoginSession->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('loginSession', $loginSession);
        $this->set('_serialize', ['loginSession']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loginSession = $this->LoginSession->newEntity();
        if ($this->request->is('post')) {
            $loginSession = $this->LoginSession->patchEntity($loginSession, $this->request->data);
            if ($this->LoginSession->save($loginSession)) {
                $this->Flash->success(__('The login session has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The login session could not be saved. Please, try again.'));
            }
        }
        $users = $this->LoginSession->Users->find('list', ['limit' => 200]);
        $this->set(compact('loginSession', 'users'));
        $this->set('_serialize', ['loginSession']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Login Session id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loginSession = $this->LoginSession->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loginSession = $this->LoginSession->patchEntity($loginSession, $this->request->data);
            if ($this->LoginSession->save($loginSession)) {
                $this->Flash->success(__('The login session has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The login session could not be saved. Please, try again.'));
            }
        }
        $users = $this->LoginSession->Users->find('list', ['limit' => 200]);
        $this->set(compact('loginSession', 'users'));
        $this->set('_serialize', ['loginSession']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Login Session id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $loginSession = $this->LoginSession->get($id);
        if ($this->LoginSession->delete($loginSession)) {
            $this->Flash->success(__('The login session has been deleted.'));
        } else {
            $this->Flash->error(__('The login session could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
