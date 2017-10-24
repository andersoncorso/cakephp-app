<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.8
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

/*
 * Configure paths required to find CakePHP + general filepath constants
 */
require __DIR__ . '/paths.php';

/*
 * Bootstrap CakePHP.
 *
 * Does the various bits of setup that CakePHP needs to do.
 * This includes:
 *
 * - Registering the CakePHP autoloader.
 * - Setting the default application paths.
 */
require CORE_PATH . 'config' . DS . 'bootstrap.php';

use Cake\Cache\Cache;
use Cake\Console\ConsoleErrorHandler;
use Cake\Core\App;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\Core\Plugin;
use Cake\Database\Type;
use Cake\Datasource\ConnectionManager;
use Cake\Error\ErrorHandler;
use Cake\Http\ServerRequest;
use Cake\Log\Log;
use Cake\Mailer\Email;
use Cake\Utility\Inflector;
use Cake\Utility\Security;

/**
 * Read .env file if APP_NAME is not set.
 *
 * You can remove this block if you do not want to use environment
 * variables for configuration when deploying.
 */
if (!env('APP_NAME') && file_exists(CONFIG . '.env')) {
	$dotenv = new \josegonzalez\Dotenv\Loader([CONFIG . '.env']);
	$dotenv->parse()
		->putenv()
		->toEnv()
		->toServer();
}

/*
 * Read configuration file and inject configuration into various
 * CakePHP classes.
 *
 * By default there is only one configuration file. It is often a good
 * idea to create multiple configuration files, and separate the configuration
 * that changes from configuration that does not. This makes deployment simpler.
 */
try {
	Configure::config('default', new PhpConfig());
	Configure::load('app', 'default', false);
} catch (\Exception $e) {
	exit($e->getMessage() . "\n");
}

/*
 * Load an environment local configuration file.
 * You can use a file like app_local.php to provide local overrides to your
 * shared configuration.
 */
//Configure::load('app_local', 'default');

/*
 * When debug = true the metadata cache should only last
 * for a short time.
 */
if (Configure::read('debug')) {
	Configure::write('Cache._cake_model_.duration', '+2 minutes');
	Configure::write('Cache._cake_core_.duration', '+2 minutes');
}

/*
 * Set server timezone to UTC. You can change it to another timezone of your
 * choice but using UTC makes time calculations / conversions easier.
 * Check http://php.net/manual/en/timezones.php for list of valid timezone strings.
 */
date_default_timezone_set('UTC');

/*
 * Configure the mbstring extension to use the correct encoding.
 */
mb_internal_encoding(Configure::read('App.encoding'));

/*
 * Set the default locale. This controls how dates, number and currency is
 * formatted and sets the default language to use for translations.
 */
ini_set('intl.default_locale', Configure::read('App.defaultLocale'));

/*
 * Register application error and exception handlers.
 */
$isCli = PHP_SAPI === 'cli';
if ($isCli) {
	(new ConsoleErrorHandler(Configure::read('Error')))->register();
} else {
	(new ErrorHandler(Configure::read('Error')))->register();
}

/*
 * Include the CLI bootstrap overrides.
 */
if ($isCli) {
	require __DIR__ . '/bootstrap_cli.php';
}

/*
 * Set the full base URL.
 * This URL is used as the base of all absolute links.
 *
 * If you define fullBaseUrl in your config file you can remove this.
 */
if (!Configure::read('App.fullBaseUrl')) {
	$s = null;
	if (env('HTTPS')) {
		$s = 's';
	}

	$httpHost = env('HTTP_HOST');
	if (isset($httpHost)) {
		Configure::write('App.fullBaseUrl', 'http' . $s . '://' . $httpHost);
	}
	unset($httpHost, $s);
}

Cache::setConfig(Configure::consume('Cache'));
ConnectionManager::setConfig(Configure::consume('Datasources'));
Email::setConfigTransport(Configure::consume('EmailTransport'));
Email::setConfig(Configure::consume('Email'));
Log::setConfig(Configure::consume('Log'));
Security::setSalt(Configure::consume('Security.salt'));

/*
 * The default crypto extension in 3.0 is OpenSSL.
 * If you are migrating from 2.x uncomment this code to
 * use a more compatible Mcrypt based implementation
 */
//Security::engine(new \Cake\Utility\Crypto\Mcrypt());

/*
 * Setup detectors for mobile and tablet.
 */
ServerRequest::addDetector('mobile', function ($request) {
	$detector = new \Detection\MobileDetect();

	return $detector->isMobile();
});
ServerRequest::addDetector('tablet', function ($request) {
	$detector = new \Detection\MobileDetect();

	return $detector->isTablet();
});

/*
 * Enable immutable time objects in the ORM.
 *
 * You can enable default locale format parsing by adding calls
 * to `useLocaleParser()`. This enables the automatic conversion of
 * locale specific date formats. For details see
 * @link https://book.cakephp.org/3.0/en/core-libraries/internationalization-and-localization.html#parsing-localized-datetime-data
 */
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

Type::build('time')->useImmutable();
Type::build('date')->useImmutable()->useLocaleParser();
Type::build('datetime')->useImmutable()->useLocaleParser();
Type::build('timestamp')->useImmutable();

\Cake\I18n\Time::setToStringFormat('dd/MM/yyyy HH:mm:ss');
\Cake\I18n\Date::setToStringFormat('dd/MM/yyyy');
\Cake\I18n\FrozenTime::setToStringFormat('dd/MM/yyyy HH:mm:ss');
\Cake\I18n\FrozenDate::setToStringFormat('dd/MM/yyyy');

\Cake\I18n\I18n::locale('pt-BR'); // new !

Type::build('decimal')->useLocaleParser();
Type::build('float')->useLocaleParser();


/*
 * Custom Inflector rules, can be set to correctly pluralize or singularize
 * table, model, controller names or whatever other string is passed to the
 * inflection functions.
 */
//Inflector::rules('plural', ['/^(inflect)or$/i' => '\1ables']);
//Inflector::rules('irregular', ['red' => 'redlings']);
//Inflector::rules('uninflected', ['dontinflectme']);
//Inflector::rules('transliteration', ['/å/' => 'aa']);

/*
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. make sure you read the documentation on Plugin to use more
 * advanced ways of loading plugins
 *
 * Plugin::loadAll(); // Loads all plugins at once
 * Plugin::load('Migrations'); //Loads a single plugin named Migrations
 *
 */
# AclManager PLlugin:

	// Configuration for an schema based on Groups, Roles and Users
	Configure::write('AclManager.aros', array('Groups', 'Roles', 'Users'));

	// Set prefix admin ( http://www.domain.com/admin/AclManager )
	// Configure::write('AclManager.admin', true);

	// Ignore all actions you don't want to add to your ACLs. The value of this parameter must be an array of actions. 
	// Configure::write('AclManager.ignoreActions', array('isAuthorized','login','logout'));

	Plugin::load('Acl', ['bootstrap' => true]);
	Plugin::load('AclManager', ['bootstrap' => true, 'routes' => true]);

# Outros

	Plugin::load('AccessManager', ['bootstrap' => false, 'routes' => true]);
	Plugin::load('AdminLTE', ['bootstrap' => true, 'routes' => true]);
	Plugin::load('Places', ['routes' => true]);




/*
 * Only try to load DebugKit in development mode
 * Debug Kit should not be installed on a production system
 */
if (Configure::read('debug')) {
	Plugin::load('DebugKit', ['bootstrap' => true]);
}


/**
 * AdminLTE - Configurations
 *
 * @link https://github.com/maiconpinto/cakephp-adminlte-theme
 *
 **/
$logo_icon = 'layout/logo-icon.png';
$logo_vertical = 'layout/logo-vertical.png';
$logo_default = 'layout/logo-default.png';

Configure::write('Theme', [
	'title' => 'Sistema Irrigo',
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
	'layout' => 'top', // or default
	'skin' => 'white', // default is 'blue'
	'folder' => ROOT
]);


/**
 * Menus for user roles
 *
 *
 **/
Configure::write('Menu', [
	1 => [ // role_id
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
	],
	2 => [ // other user
		// ...
	],
]);
