<div class="box box-primary">

	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-unlock"></i>&nbsp;&nbsp;<?= __('alterar senha') ?></h3>
	</div>
	
	<?= $this->Form->create('User', array('role' => 'form', 'class'=>'form-horizontal')) ?>
		<div class="box-body">
			<br>
			<!-- Senha -->
			<div class="form-group">
				<label for="password" class="col-sm-2 control-label">Senha</label>
				<div class="col-sm-4">
					<?php 
						echo $this->Form->control('password', 
							['type'=>'password', 'placeholder'=>'Senha', 'label'=>false, 'class'=>'form-control', 'required'=>true, 'data-toggle'=>'password', 'data-message'=>'Clique aqui para mostrar/esconder a senha']
						);
					?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<br>
					<?php 
						echo $this->Form->button('Atualizar', 
							['class'=>'btn btn-lg btn-primary btn-flat pull-left', 
							'id'=>'loadButton', 'data-loading-text'=>'Aguarde...', 'submitContainer'=>null]
						);
					?>
				</div>
			</div>
		</div>
	<?= $this->Form->end() ?>
	
</div>


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
