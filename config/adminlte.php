<?php 
/**
 * AdminLTE - Configurations
 *
 * @link https://github.com/maiconpinto/cakephp-adminlte-theme
 *
 **/
$logo_icon = 'layout/logo-icon.png';
$logo_vertical = 'layout/logo-vertical.png';
$logo_default = 'layout/logo-default.png';

return [
	'Theme' => [
		'title' => 'CakePHP App',
		'logo' => [
			'mini' => $logo_icon,
			'vertical' => $logo_vertical,
			'default' => $logo_default
		],
		'login' => [
			'show_remember' => true,
			'show_register' => false,
			'show_social' => false
		],
		'folder' => ROOT,
		'skin' => 'black', // blue is default
		'layout' => 'top' // or default
	]
];

?>