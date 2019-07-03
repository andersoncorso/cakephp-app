<!-- File: src/Template/Users/login.ctp -->
<?php $this->layout = 'AdminLTE.login'; ?>

<?php if($this->request->getSession()->read('Flash')): ?>
	<div class="row">
		<?= $this->Flash->render(); ?>
		<?= $this->Flash->render('auth'); ?>
	</div>
<?php else: ?>
	<p class="login-box-msg">
		<?= __('Informe uma nova senha') ?>
	</p>
<?php endif; ?>

<?= $this->element('Forms/users-change_password_by_hash') ?>