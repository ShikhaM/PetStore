<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * PetDetails Controller
 *
 * @property \App\Model\Table\PetDetailsTable $PetDetails
 */
class PetDetailsController extends AppController
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
        $petDetails = $this->paginate($this->PetDetails);

        $this->set(compact('petDetails'));
        $this->set('_serialize', ['petDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Pet Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $petDetail = $this->PetDetails->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('petDetail', $petDetail);
        $this->set('_serialize', ['petDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $petDetail = $this->PetDetails->newEntity();
        if ($this->request->is('post')) {
            $petDetail = $this->PetDetails->patchEntity($petDetail, $this->request->data);
            if ($this->PetDetails->save($petDetail)) {
                $this->Flash->success(__('The pet detail has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pet detail could not be saved. Please, try again.'));
            }
        }
        $users = $this->PetDetails->Users->find('list', ['limit' => 200]);
        $this->set(compact('petDetail', 'users'));
        $this->set('_serialize', ['petDetail']);
    }

    public function restfuladd()
    {
        $petDetail = $this->PetDetails->newEntity();
        if ($this->request->is('post')) {
            $sessiontoken  = $this->request->data['session_token'];
            
            $aquery = "select user_id from login_session where session_token='$sessiontoken'";
            $connection = ConnectionManager::get('default');
            $stmt = $connection->execute($aquery);
           
            if ($stmt->rowCount() == 1) {
              $row = $stmt->fetch();
              $userid = $row[0];
             
              unset($this->request->data['session_token']);
              $this->request->data['user_id'] = $userid;

              $petDetail = $this->PetDetails->patchEntity($petDetail, $this->request->data);
              if ($this->PetDetails->save($petDetail)) {
                $this->set(compact('petDetail'));
                $this->set('_serialize', ['petDetail']);
              } else {
                $this->set('_serialize', []);
              }
            } else {
                $this->set('_serialize', []);
              }
        }
       
    }

    /**
     * Edit method
     *
     * @param string|null $id Pet Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $petDetail = $this->PetDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $petDetail = $this->PetDetails->patchEntity($petDetail, $this->request->data);
            if ($this->PetDetails->save($petDetail)) {
                $this->Flash->success(__('The pet detail has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pet detail could not be saved. Please, try again.'));
            }
        }
        $users = $this->PetDetails->Users->find('list', ['limit' => 200]);
        $this->set(compact('petDetail', 'users'));
        $this->set('_serialize', ['petDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pet Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $petDetail = $this->PetDetails->get($id);
        if ($this->PetDetails->delete($petDetail)) {
            $this->Flash->success(__('The pet detail has been deleted.'));
        } else {
            $this->Flash->error(__('The pet detail could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    // beforeFilter Method
    public function beforeFilter(\Cake\Event\Event $event){
        $this->Auth->allow(['restfuladd']);
    }
}
