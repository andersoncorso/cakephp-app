<!-- page header --> 
<section class="content-header">
	<h1>Dados de cadastro <small>Senha</small></h1>
	<ol class="breadcrumb">
		<li>
			<?php 
				echo $this->Html->link('<i class="fa fa-angle-double-left"></i> '.__('Voltar'),
					'javascript:window.history.back()',
					['escape' => false]
				);
			?>
		</li>
	</ol>
</section>

<!-- page content -->
<section class="content">
	<div class="row">
		<div class="col-md-3">
			<?php echo $this->element('Layout/profile-access_data'); ?>
		</div>
		<div class="col-md-9">
			<?php echo $this->element('Forms/users-change_password'); ?>
		</div>
	</div>
</section>