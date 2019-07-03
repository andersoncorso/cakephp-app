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
use Cake\Core\Configure;

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

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'authorize' => [
                'Acl.Actions' => ['actionPath' => 'controllers/']
            ],
            'authenticate' => [
                'Form' => [
                    'userModel' => 'AccessManager.Users',
                    'finder' => 'auth',
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
                'plugin' => false,
                'controller' => 'Pages',
                'action' => 'display',
                'message'
            ],
            'authError' => 'Você não tem autorização para acessar esse recurso.',
            'flash' => [
                'element' => 'error'
            ]
        ]);

        // $this->Auth->allow();

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
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

    public function beforeRender(Event $event) {

        # AdminLTE          
        // Evita o AdminLTE theme and layout quando houver as extensoes.
        if( $this->request->getParam('_ext') != 'pdf' and  $this->request->getParam('_ext') != 'json'){

            // Ativa o Tema
            $this->viewBuilder()->setTheme('AdminLTE');

            // Ativa o Layout
            if(Configure::read('Theme.layout'))
                $this->viewBuilder()->setLayout('AdminLTE.'.Configure::read('Theme.layout'));

            $this->viewBuilder()->setClassName('AdminLTE.AdminLTE');
        }

    }
}
