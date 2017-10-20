<?php
namespace AccessManager\Controller;

use AccessManager\Controller\AppController;
use Cake\Core\Configure;

/**
 * Roles Controller
 *
 * @property \AccessManager\Model\Table\RolesTable $Roles
 *
 * @method \AccessManager\Model\Entity\Role[] paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
{

/**
 ==== FUNÇÕES DE CRUD ====
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Groups']
		];
		$roles = $this->paginate($this->Roles);

		$this->set(compact('roles'));
	}

	public function view($id = null) {
		$role = $this->Roles->get($id, [
			'contain' => ['Groups', 'Users']
		]);

		$this->set('role', $role);
	}

	public function add() {

		$role = $this->Roles->newEntity();
		if ($this->request->is('post')) {

			$role = $this->Roles->patchEntity($role, $this->request->getData());
			if ($this->Roles->save($role)) {
				
				$this->Flash->success(__('Os dados foram salvos.'));
				return $this->redirect(['action' => 'index', 'plugin'=>'AccessManager']);
			}
			$this->Flash->error(__('Erro ao salvar os dados. Por favor, verifique e tente novamente ou entre em contato.'));
		}
		$groups = $this->Roles->Groups->find('list', ['limit' => 200]);
		$this->set(compact('role', 'groups'));
	}

	public function edit($id = null) {

		$role = $this->Roles->get($id, [
			'contain' => []
		]);

		if ($this->request->is(['patch', 'post', 'put'])) {

			$role = $this->Roles->patchEntity($role, $this->request->getData());
			if ($this->Roles->save($role)) {
				
				$this->Flash->success(__('Os dados foram salvos.'));

				return $this->redirect(['action' => 'index', 'plugin'=>'AccessManager']);
			}
			$this->Flash->error(__('Erro ao salvar os dados. Por favor, verifique e tente novamente ou entre em contato.'));
		}
		$groups = $this->Roles->Groups->find('list', ['limit' => 200]);
		$this->set(compact('role', 'groups'));
	}

	public function delete($id = null) {

		$this->request->allowMethod(['post', 'delete']);
		$role = $this->Roles->get($id);
		if ($this->Roles->delete($role)) {
			
			$this->Flash->success(__('O registro foi excluido.'));
		}
		else {

			$this->Flash->error(__('Erro ao excluir o registro. Por favor, tente novamente ou entre em contato.'));
		}

		return $this->redirect(['action' => 'index', 'plugin'=>'AccessManager']);
	}
}
