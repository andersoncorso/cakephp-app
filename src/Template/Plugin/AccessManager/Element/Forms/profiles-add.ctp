<?= $this->Form->create($profile, array('role'=>'form', 'class'=>'form-horizontal')) ?>
	<div class="box-body">
		<br>
		<!-- Nome Completo -->
		<div class="form-group">
			<label for="first-name" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-3">
				<?php 
					echo $this->Form->control('first_name', 
						['placeholder'=>'João', 'label'=>false, 'class'=>'form-control']
					);
				?>
			</div>
			<div class="col-sm-5">
				<?php 
					echo $this->Form->control('last_name', 
						['placeholder'=>'da Silva', 'label'=>false, 'class'=>'form-control']
					);
				?>
			</div>
		</div>
		<!-- CPF -->
		<div class="form-group">
			<label for="cpf" class="col-sm-2 control-label">CPF</label>
			<div class="col-sm-4">
				<?php 
					echo $this->Form->control('cpf', [
							'label'=>false, 'class'=>'form-control', 'maxlength'=>'14',
							'data-inputmask'=>'\'mask\': \'999.999.999-99\'', 'data-mask'
						]
					);
				?>
			</div>
		</div>
		<!-- Telefone -->
		<div class="form-group">
			<label for="phone01" class="col-sm-2 control-label">Telefone</label>
			<div class="col-sm-4">
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-phone"></i>
					</div>
					<?php 
						echo $this->Form->control('phone01', [
								'label'=>false, 'class'=>'form-control', 'maxlength'=>'16',
								'data-inputmask'=>'\'mask\': \'(99) [9] 9999-9999\'', 'data-mask'
							]
						);
					?>
				</div>
			</div>
		</div>
		<!-- Endereço Completo -->
		<div class="form-group">
			<label for="logradouro" class="col-sm-2 control-label">Endereço</label>
			<div class="col-sm-5">
				<?php 
					echo $this->Form->control('logradouro', [
							'label'=>false, 'class'=>'form-control', 'placeholder'=>'Rua / Avenida...'
						]
					);
				?>
			</div>
			<div class="col-sm-2">
				<?php 
					echo $this->Form->control('num', [
							'label'=>false, 'class'=>'form-control', 'placeholder'=>'Número'
						]
					);
				?>
			</div>
		</div>
		<!-- Bairro / Setor -->
		<div class="form-group">
			<label for="logradouro" class="col-sm-2 control-label">Bairro</label>
			<div class="col-sm-3">
				<?php 
					echo $this->Form->control('setor', [
							'label'=>false, 'class'=>'form-control', 'placeholder'=>''
						]
					);
				?>
			</div>
			<div class="col-sm-4">
				<?php 
					echo $this->Form->control('complemento', [
							'label'=>false, 'class'=>'form-control', 'placeholder'=>'Complemento'
						]
					);
				?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Estado / Cidade</label>
			<div class="col-sm-2">
				<?php
					echo $this->Form->select('estado_id',
						$Estados,
						['class'=>'form-control', 
							'multiple'=>false, 'id'=>'estados-remote', 'empty'=>'-- Estado', 'required'=>true]
					);
				?>
			</div>
			<div class="col-sm-4">
				<?php
					echo $this->Form->select('municipio_id',
						$Municipios,
						['class'=>'form-control', 
							'multiple'=>false, 'id'=>'municipios-remote', 'empty'=>'-- Município']
					);
				?>
			</div>
		</div>
		<div class="form-group">
			<label for="cpf" class="col-sm-2 control-label">CEP</label>
			<div class="col-sm-3">
				<?php 
					echo $this->Form->control('cep', [
							'label'=>false, 'class'=>'form-control', 'maxlength'=>'9',
							'data-inputmask'=>'\'mask\': \'99999-999\'', 'data-mask',
							'required'=>true
						]
					);
				?>
			</div>
		</div>
		<div class="form-group">
			<label for="caixa-postal" class="col-sm-2 control-label">Caixa Postal</label>
			<div class="col-sm-2">
				<?php 
					echo $this->Form->control('caixa_postal', [
							'label'=>false, 'class'=>'form-control'
						]
					);
				?>
			</div>
		</div>
		<br>
		<div class="form-group">
			<label class="col-sm-2 control-label">Usuário do Perfil</label>
			<div class="col-sm-4">
				<?php
					echo $this->Form->control('user_id',
						['type'=>'select', 'class'=>'form-control select2', 'options'=>$Users, 'label'=>false,
							'multiple'=>false, 'empty'=>'-- selecione', 'required'=>true]
					);
				?>
			</div>
		</div>
		<br>
		<div class="form-group">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<br>
				<button type="submit" class="btn btn-lg btn-primary btn-flat pull-left">Atualizar</button>
			</div>
		</div>
	</div>

<?= $this->Form->end() ?>

<?php
$this->Html->css([
    'AdminLTE./plugins/select2/select2.min',
  ],
  ['block' => 'css']);

$this->Html->script([
	'AdminLTE./plugins/select2/select2.full.min',
	'AdminLTE./plugins/input-mask/jquery.inputmask',
	'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
	'AdminLTE./plugins/input-mask/jquery.inputmask.extensions',
	'/chained/jquery.chained',
	'/chained/jquery.chained.remote'
],
['block' => 'script']);

	// URL for list of cities by states 
	$url_list = $this->Url->build(['controller'=>'Municipios', 'action'=>'list_by_state', 'plugin'=>'Places', '_ext'=>'json'], ['fullBase'=>true]);

?>
<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
	
	/* For jquery.chained.remote.js */
	$("#municipios-remote").remoteChained({
		parents : "#estados-remote",
		url : "<?= $url_list ?>",
		loading : "aguarde"
	});

    //Initialize Select2 Elements
    $(".select2").select2();

    //Mask input
    $("[data-mask]").inputmask();

  });
</script>
<?php $this->end(); ?>
