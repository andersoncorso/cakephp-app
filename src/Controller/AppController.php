<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

	public $components = [
		'Acl' => [
			'className' => 'Acl.Acl'
		]
	];

	/**
	 * Initialization hook method.
	 *
	 * Use this method to add common initialization code like loading components.
	 *
	 * e.g. `$this->loadComponent('Security');`
	 *
	 * @return void
	 */
	public function initialize()
	{
		parent::initialize();

		$this->loadComponent('RequestHandler');
		$this->loadComponent('Flash');
		$this->loadComponent('Auth', [
			'authorize' => [
				'Acl.Actions' => ['actionPath' => 'controllers/']
			],
			'authenticate' => [
				'Form' => [
					// 'finder' => 'auth',
					'fields' => [
						'username' => 'email', 'password' => 'password'
					],
					'scope' => ['active' => '1']
				]
			],            
			'loginAction' => [
				'plugin' => 'AccessManager',
				'controller' => 'Users',
				'action' => 'login'
			],
			'loginRedirect' => [
				'plugin' => false,
				'controller' => 'Dashboards',
				'action' => 'index'
			],
			'logoutRedirect' => [
				'plugin' => 'AccessManager',
				'controller' => 'Users',
				'action' => 'login'
			],
			'unauthorizedRedirect' => [
				'controller' => 'Pages',
				'action' => 'display',
				'prefix' => false
			],
			'authError' => 'Você não tem autorização para acessar esse recurso.',
			'flash' => [
				'element' => 'error'
			]
		]);
		
		// Only for ACL setup
		// $this->Auth->allow();
	}

	/**
	 * Before filter callback.
	 *
	 * @param \Cake\Event\Event $event The beforeFilter event.
	 * @return void
	 */
	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);

		$this->Auth->allow('display');
	}

	/**
	 * Before render callback.
	 *
	 * @param \Cake\Event\Event $event The beforeRender event.
	 * @return \Cake\Http\Response|null|void
	 */
	public function beforeRender(Event $event)
	{
		// Note: These defaults are just to get started quickly with development
		// and should not be used in production. You should instead set "_serialize"
		// in each action as required.
		if (!array_key_exists('_serialize', $this->viewVars) &&
			in_array($this->response->type(), ['application/json', 'application/xml'])
		) {
			$this->set('_serialize', true);
		}
	}

	/**
	 * isAuthorized.
	 *
	 * @param array $user user logged.
	 * @return void
	 */
	// public function isAuthorized($user) {
	//     // return true;
		
	//     // Admin can access every action
	//     if (isset($user['role_id']) && $user['role_id'] === 1) {
	//         return true;
	//     }

	//     // Default deny
	//     return false;
	// }
}
