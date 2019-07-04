<?= $this->Form->create('User') ?>
	
	<!-- Senha -->
	<div class="row">
		<div class="col-xs-12">
			<?php 
				echo $this->Form->password('password', 
					['type'=>'password', 'placeholder'=>'Senha', 'label'=>false, 'class'=>'form-control input-lg', 'required'=>true, 'data-toggle'=>'password', 'data-message'=>'Clique aqui para mostrar/esconder a senha']
				);
			?>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-12">
			<?php 
				echo $this->Form->button(__('Atualizar'), 
					['class'=>'btn btn-primary btn-block btn-flat btn-lg pull-right', 
					'id'=>'loadButton', 'data-loading-text'=>__('Aguarde...'), 'submitContainer'=>null]
				);
			?>
		</div>
	</div>

<br>

<p class="text-right">
	<?php 
		echo $this->Html->link(__('Login'),
			['controller'=>'Users', 'action'=>'login', 'plugin'=>'AccessManager'],
			['class'=>'btn-link', 'escape'=>false]
		);
	?>
</p>



<?= $this->Form->end() ?>

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
