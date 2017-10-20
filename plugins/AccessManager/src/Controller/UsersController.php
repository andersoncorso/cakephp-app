<?php
namespace AccessManager\Controller;

use AccessManager\Controller\AppController;
use Cake\Core\Configure;

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
 ==== FUNÇÕES DE CRUD ====
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Groups', 'Roles']
		];
		$users = $this->paginate($this->Users);

		$this->set(compact('users'));
	}

	public function view($id = null) {
		$user = $this->Users->get($id, [
			'contain' => ['Groups', 'Roles']
		]);

		$this->set('user', $user);
	}

	public function add() {

		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {

			$user = $this->Users->patchEntity($user, $this->request->getData());
			if ($this->Users->save($user)) {

				$this->Flash->success(__('Os dados foram salvos.'));
				return $this->redirect(['action' => 'index', 'plugin'=>'AccessManager']);
			}
			$this->Flash->error(__('Erro ao salvar os dados. Por favor, verifique e tente novamente ou entre em contato.'));
		}
		$groups = $this->Users->Groups->find('list', ['limit' => 200]);
		$roles = $this->Users->Roles->find('list', ['limit' => 200]);
		$this->set(compact('user', 'groups', 'roles'));
	}

	public function edit($id = null) {

		$user = $this->Users->get($id, [
			'contain' => []
		]);

		if ($this->request->is(['patch', 'post', 'put'])) {

			$user = $this->Users->patchEntity($user, $this->request->getData());
			if ($this->Users->save($user)) {

				$this->Flash->success(__('Os dados foram salvos.'));

				return $this->redirect(['action' => 'index', 'plugin'=>'AccessManager']);
			}
			$this->Flash->error(__('Erro ao salvar os dados. Por favor, verifique e tente novamente ou entre em contato.'));
		}

		$groups = $this->Users->Groups->find('list', ['limit' => 200]);
		$roles = $this->Users->Roles->find('list', ['limit' => 200]);
		$this->set(compact('user', 'groups', 'roles'));
	}

	public function delete($id = null) {

		$this->request->allowMethod(['post', 'delete']);
		
		$user = $this->Users->get($id);
		if ($this->Users->delete($user)) {

			$this->Flash->success(__('O registro foi excluido.'));
		} 
		else {
			
			$this->Flash->error(__('Erro ao excluir o registro. Por favor, tente novamente ou entre em contato.'));
		}

		return $this->redirect(['action' => 'index', 'plugin'=>'AccessManager']);
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

					// Menus for user roles (bootstrap in line 282)
					$user['menu'] = Configure::read('Menu.'.$user['role_id']);

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
