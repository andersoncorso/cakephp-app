<!-- PROFILE -->
<?php if(!empty($profile)): ?>
<?php
	// Url of user picture
	$url_img = ($this->request->getSession()->read('Auth.User.image'))?
					$this->Url->image('user-icon.png', ['fullBase'=>true]):
					$this->Url->image('user-icon.png', ['fullBase'=>true]);
?>
<div class="box box-widget widget-user-2">
	<div class="widget-user-header ">
		<div class="widget-user-image">
			<?= $this->Html->image($url_img, ['class'=>'img-responsive img-circle', 'alt'=>'']) ?>
		</div>
		<h3 class="widget-user-username"><?= $profile->full_name ?></h3>
		<?php if(isset($user->role['name'])): ?>
			<h5 class="widget-user-desc">
			<?= $user->role['name']; ?>
			</h5>
		<?php endif; ?>
	</div>
	<div class="box-footer no-padding">
		<ul class="nav nav-stacked">
			<li>
				<?= $this->Html->link('Dados pessoais <i class="fa fa-address-card pull-right"></i>', ['controller'=>'Users', 'action'=>'userProfile', 'plugin'=>'AccessManager'], ['escape'=>false]) ?>	
			</li>
		</ul>
	</div>
</div>
<?php endif; ?>

<!-- LOGIN -->
<?php if(!empty($user)): ?>
<div class="box box-solid <?php if($this->request->is('mobile')) echo 'collapsed-box'; ?>">
	
	<?php if($this->request->is('mobile')): ?>
	<div class="box-header with-border">
		<h3 class="box-title">Dados de Acesso</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
		</div>
	</div>
	<?php endif; ?>

	<div class="box-body" <?php if($this->request->is('mobile')) echo 'style="display: none;"'; ?>>
		<p><strong><?= $user->email ?></strong></p>
		<p>
			<strong>Última alteração:</strong><br>
			<i class="text-muted"><?= $user->modified ?></i>
		</p>
	</div>
	<div class="box-footer no-padding">
		<ul class="nav nav-stacked">
			<li>
			<?php 
				echo $this->Html->link('E-mail <i class="fa fa-envelope pull-right"></i>',
					['controller'=>'Users', 'action'=>'userChangeEmail', $user->id, 'plugin'=>'AccessManager'],
					['escape'=>false]
				);
			?>
			</li>
			<li>
			<?php 
				echo $this->Html->link('Senha <i class="fa fa-unlock pull-right"></i>',
					['controller'=>'Users', 'action'=>'userChangePassword', $user->id, 'plugin'=>'AccessManager'],
					['escape'=>false]
				);
			?>
			</li>
		</ul>
	</div>

</div>
<?php endif; ?>