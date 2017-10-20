<?php
namespace AccessManager\Controller;

use AccessManager\Controller\AppController;
use Cake\Core\Configure;

/**
 * Groups Controller
 *
 * @property \AccessManager\Model\Table\GroupsTable $Groups
 *
 * @method \AccessManager\Model\Entity\Group[] paginate($object = null, array $settings = [])
 */
class GroupsController extends AppController
{

/**
 ==== FUNÇÕES DE CRUD ====
 */
    public function index() {
        $groups = $this->paginate($this->Groups);

        $this->set(compact('groups'));
    }

    public function view($id = null) {
        $group = $this->Groups->get($id, [
            'contain' => ['Roles', 'Users']
        ]);

        $this->set('group', $group);
    }

    public function add() {

        $group = $this->Groups->newEntity();
        if ($this->request->is('post')) {

            $group = $this->Groups->patchEntity($group, $this->request->getData());
            if ($this->Groups->save($group)) {

                $this->Flash->success(__('Os dados foram salvos.'));
                return $this->redirect(['action' => 'index', 'plugin'=>'AccessManager']);
            }
            $this->Flash->error(__('Erro ao salvar os dados. Por favor, verifique e tente novamente ou entre em contato.'));
        }
        $this->set(compact('group'));
    }

    public function edit($id = null) {

        $group = $this->Groups->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $group = $this->Groups->patchEntity($group, $this->request->getData());
            if ($this->Groups->save($group)) {

                $this->Flash->success(__('Os dados foram salvos.'));

                return $this->redirect(['action' => 'index', 'plugin'=>'AccessManager']);
            }
            $this->Flash->error(__('Erro ao salvar os dados. Por favor, verifique e tente novamente ou entre em contato.'));
        }
        $this->set(compact('group'));
    }

    public function delete($id = null) {

        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);

        if ($this->Groups->delete($group)) {

            $this->Flash->success(__('O registro foi excluido.'));
        }
        else {

            $this->Flash->error(__('Erro ao excluir o registro. Por favor, tente novamente ou entre em contato.'));
        }

        return $this->redirect(['action' => 'index', 'plugin'=>'AccessManager']);
    }
}
