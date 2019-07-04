<h1><?= __('Recuperar senha') ?></h1>

<p><?= __('Acesse o link abaixo para criar uma nova senha:') ?></p>
<br>
<?= 
	$this->Html->link('clique aqui',
		[
			'controller'=>'Users',
			'action'=>'changePasswordByHash', $recovery_hash,
			'plugin'=>'AccessManager', '_full'=>true
		]
	);
 ?>
<br><br>
<br>Em <em><?= date('Y-m-d H:i:s') ?></em>