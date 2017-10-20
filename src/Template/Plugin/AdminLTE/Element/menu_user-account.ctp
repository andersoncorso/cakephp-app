<?php
	// Url of user picture
	$url_img = ($this->request->session()->read('Auth.User.image'))?
					$this->Url->image('user-icon.png', ['fullBase'=>true]):
					$this->Url->image('user-icon.png', ['fullBase'=>true]);
?>
<li class="dropdown user user-menu">

	<!-- Menu Toggle Button -->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<!-- The user image in the navbar-->
		<?php echo $this->Html->image($url_img, ['class'=>'user-image', 'alt'=>'', 'style'=>'margin-top:-2px;']) ?>
		<!-- hidden-xs hides the full_name on small devices so only the image appears. -->
		<span class="hidden-xs">
		<?php 
			echo (!empty($this->request->session()->read('Auth.User.profile.full_name')))?
					$this->request->session()->read('Auth.User.profile.full_name')
					: 'Minha conta';
		?>
		</span>
	</a>
	<ul class="dropdown-menu">
		<!-- Menu Body -->
		<li class="user-body">
			<div class="row">
				<div class="text-center">
					<strong><?php echo $this->request->session()->read('Auth.User.email'); ?></strong><br>
					<small>
						<?= 'Cadastrado em '.$this->request->session()->read('Auth.User.created') ?>
					</small>
				</div>
			</div>
		</li>
		<!-- Menu Footer-->
		<li class="user-footer">
			<div class="pull-left">
				<?php 
					echo $this->Html->link('Editar',
						['controller'=>'Users', 'action'=>'userProfile', 'plugin'=>'AccessManager'],
						['class'=>'btn btn-default btn-flat', 'escape'=>false, '_full'=>false]
					);
				?>
			</div>
			<div class="pull-right">
				<?php 
					echo $this->Html->link('<i class="fa fa-sign-out"></i> Sair',
						['controller'=>'Users', 'action'=>'logout', 'plugin'=>'AccessManager'],
						['class'=>'btn btn-default btn-flat', 'escape'=>false, '_full'=>false]
					);
				?>
			</div>
		</li>
	</ul>
</li>