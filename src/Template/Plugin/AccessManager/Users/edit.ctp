<!-- page header --> 
<section class="content-header">
	<h1><?= __('Editar usuário') ?>&nbsp;</h1>
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

		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-body">
					<?= $this->element('Forms/users-edit') ?>
				</div>
			</div>
		</div>

	</div>
</section>

<?php
	$this->Html->script([
	  'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js'
	],
	['block' => 'script']);
?>
<?php $this->start('scriptBottom'); ?>
<script>
	$(function () {

		//Password hide/show
		$("#password").password('hide');
	});
</script>
<?php $this->end(); ?>