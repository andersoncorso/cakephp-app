<?php $this->layout = 'AdminLTE.login'; ?>

<?php if($this->request->getSession()->read('Flash')): ?>
	<div class="row">
		<?= $this->Flash->render(); ?>
		<?= $this->Flash->render('auth'); ?>
	</div>
<?php else: ?>
	<p class="login-box-msg">
		<?= __('Informe seu e-mail para continuar') ?>
	</p>
<?php endif; ?>

<?= $this->element('Forms/users-recover_password') ?>

<br>

<p class="text-right">
	<?php 
		echo $this->Html->link(__('Login'),
			['controller'=>'Users', 'action'=>'login', 'plugin'=>'AccessManager'],
			['class'=>'btn-link', 'escape'=>false]
		);
	?>
</p>
