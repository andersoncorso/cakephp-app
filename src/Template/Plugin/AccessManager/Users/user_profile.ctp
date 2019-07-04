<!-- page header --> 
<section class="content-header">
	<h1><?= __('Minha conta') ?></h1>
 	<?php
		// Add multiple crumbs at the end of the trail
		$this->Breadcrumbs->add('Minha conta', null);
	?>
</section>

<!-- page content -->
<section class="content">
	<div class="row">
		<div class="col-md-3">
			<!-- E-mail e senha -->
			<?php echo $this->element('Layout/user_profile-aside_box', ['user'=>$user, 'profile'=>$user->profile]); ?>
		</div>
		<div class="col-md-9">
			<!-- Dados pessoais -->
			<?php echo $this->element('Forms/users-user_profile'); ?>
		</div>
	</div>
</section>