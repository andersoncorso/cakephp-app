<?php
/**
 * Menu para usuários, separados por Role ID.
 *
 **/
return [
	'Menu' => [
		1 => [ // webmaster
			0 => [
				'title'=>'Acessos e Permissões',
				'links' => [
					'Usuários' => ['controller'=>'Users', 'action'=>'index', 'plugin'=>'AccessManager'],
					'Funções' => ['controller'=>'Roles', 'action'=>'index', 'plugin'=>'AccessManager'],
					'Grupos' => ['controller'=>'Groups', 'action'=>'index', 'plugin'=>'AccessManager'],
					'sep'=>'sep',
					'Acl Manager' => ['controller'=>'Acl', 'action'=>'index', 'plugin'=>'AclManager']
				]
			],
			// 1 => [
			// 	'Link 02' => ['controller'=>'Controller', 'action'=>'index', 'plugin'=>false]
			// ],
		],
		2 => [ // administrador
		],
		3 => [ // gestor
		],
		4 => [ // usuário
		]
	]
];
?>