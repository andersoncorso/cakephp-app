<?php
namespace AccessManager\Controller;

use AccessManager\Controller\AppController;


/**
 * Users Controller
 *
 * @property \AccessManager\Model\Table\UsersTable $Users
 *
 * @method \AccessManager\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|void
	 */
	public function index()
	{
		$this->paginate = [
			'contain' => ['Groups', 'Roles']
		];
		$users = $this->paginate($this->Users);

		$this->set(compact('users'));
		$this->set('_serialize', ['users']);
	}

	/**
	 * View method
	 *
	 * @param string|null $id User id.
	 * @return \Cake\Http\Response|void
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$user = $this->Users->get($id, [
			'contain' => ['Groups', 'Roles']
		]);

		$this->set('user', $user);
		$this->set('_serialize', ['user']);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			$user = $this->Users->patchEntity($user, $this->request->getData());
			if ($this->Users->save($user)) {
				$this->Flash->success(__('The user has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The user could not be saved. Please, try again.'));
		}
		$groups = $this->Users->Groups->find('list', ['limit' => 200]);
		$roles = $this->Users->Roles->find('list', ['limit' => 200]);
		$this->set(compact('user', 'groups', 'roles'));
		$this->set('_serialize', ['user']);
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id User id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$user = $this->Users->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Users->patchEntity($user, $this->request->getData());
			if ($this->Users->save($user)) {
				$this->Flash->success(__('The user has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The user could not be saved. Please, try again.'));
		}
		$groups = $this->Users->Groups->find('list', ['limit' => 200]);
		$roles = $this->Users->Roles->find('list', ['limit' => 200]);
		$this->set(compact('user', 'groups', 'roles'));
		$this->set('_serialize', ['user']);
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id User id.
	 * @return \Cake\Http\Response|null Redirects to index.
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


/**
 ==== FUNÇÕES DE ACESSO ====
 */

	public function login() {

		if(!empty($this->request->session()->read('Auth.User'))){

			return $this->redirect($this->Auth->redirectUrl());
		}
		else{
			
			if ($this->request->is('post')) {
				$user = $this->Auth->identify();
				if ($user) {

					$this->Auth->setUser($user);
					return $this->redirect($this->Auth->redirectUrl());
				}
				$this->Flash->error(__('Falha no login. Por favor, forneça um nome de usuário e senha válidos.'));
			}
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
}
