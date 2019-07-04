<?php
	use Cake\Core\Configure;
	$this->layout = 'AdminLTE.login';
?>

<?php if($this->request->getSession()->read('Flash')): ?>
	<div class="row">
		<?= $this->Flash->render(); ?>
		<?= $this->Flash->render('auth'); ?>
	</div>
<?php else: ?>
	<p class="login-box-msg">
		<?= __('Faça login para iniciar sua sessão') ?>
	</p>
<?php endif; ?>

<?= $this->element('Forms/users-login') ?>

<br>

<?php if(Configure::read('Theme.login.show_remember')): ?>
	<p class="text-right">
	<?php 
		echo $this->Html->link(__('Recuperar senha'),
			['controller'=>'Users', 'action'=>'recoverPassword', 'plugin'=>'AccessManager'],
			['class'=>'btn-link']
		);
	?>
	</p>
<?php endif; ?>

<?php if(Configure::read('Theme.login.show_register')): ?>
	<p class="text-right">
	<?php 
		echo $this->Html->link(__('Criar login'),
			'#',
			['class'=>'btn-link']
		);
	?>
	</p>
<?php endif; ?>
