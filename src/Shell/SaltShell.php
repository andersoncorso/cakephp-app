<?php
namespace App\Shell;
//use Cake\Console\ConsoleOptionParser;
use Cake\Console\Shell;
use Cake\Utility\Security;
/**
 * Salt shell command.
 */
class SaltShell extends Shell
{
	/**
	 * Manage the available sub-commands along with their arguments and help
	 *
	 * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
	 *
	 * @return \Cake\Console\ConsoleOptionParser
	 */
	public function getOptionParser()
	{
		$parser = parent::getOptionParser();
		return $parser;
	}
	/**
	 * main() method.
	 *
	 * @return bool|int Success or error code.
	 */
	public function main()
	{
		return $this->changeSalt();
	}
	public function reset()
	{
		$salt   = Security::salt();
		return $this->changeSalt($salt);
	}
	protected function changeSalt($salt_='__SALT__')
	{
		$rootDir= dirname(dirname(__DIR__));
		$config = $rootDir . '/config/app.php';
		$content= file_get_contents($config);
		$newKey = hash('sha256', Security::randomBytes(64));
		$content= str_replace($salt_, $newKey, $content, $count);
		if ($count == 0) {
			return $this->err('No hay un marcador de posicion de SECURITY_SALT para reemplazar');
		}
		$result = file_put_contents($config, $content);
		if ($result) {
			return $this->out('Valor SECURITY_SALT actualizado en config/app.php :'.$newKey);
		}
		return $this->abort('No se puede actualizar el valor SECURITY_SALT');
	}
}