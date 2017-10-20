<?= $this->Form->create($user, array('role'=>'form', 'class'=>'form-horizontal')) ?>
	<div class="box-body">
		<br>
		<?= $this->Form->hidden('id') ?>
		<!-- Grupo -->
		<div class="form-group">
			<label class="col-sm-2 control-label">Grupo</label>
			<div class="col-sm-2">
				<?php
					echo $this->Form->input('group_id',
						['class'=>'form-control', 
							'multiple'=>false, 'empty'=>true, 'required'=>true, 'label'=>false, 'type'=>'select', 'option'=>$groups]
					);
				?>
			</div>
		</div>
		<!-- Função -->
		<div class="form-group">
			<label class="col-sm-2 control-label">Função</label>
			<div class="col-sm-2">
				<?php
					echo $this->Form->input('role_id',
						['class'=>'form-control', 
							'multiple'=>false, 'empty'=>true, 'required'=>true, 'label'=>false, 'type'=>'select', 'option'=>$roles]
					);
				?>
			</div>
		</div>
		<!-- E-mail -->
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">E-mail</label>
			<div class="col-sm-4">
				<?php 
					echo $this->Form->input('email', 
						['type'=>'email', 'placeholder'=>'joao@gmail.com', 'label'=>false, 'class'=>'form-control', 'required'=>true]
					);
				?>
			</div>
		</div>
		<!-- Status -->
		<div class="form-group">
			<label for="status" class="col-sm-2 control-label">&nbsp;</label>
			<div class="col-sm-10">
				<?= $this->Form->control('active', ['label'=>'Ativado', 'default'=>true]) ?>
			</div>
		</div>
		<br>
		<div class="form-group">
			<label  class="col-sm-2 control-label">&nbsp;</label>
			<div class="col-sm-10">
				<?php 
					echo $this->Form->button('Cadastrar', 
						['class'=>'btn btn-primary btn-flat btn-lg col-md-3']
					);
				?>
			</div>
		</div>
	</div>

<?= $this->Form->end() ?>

<?php
$this->Html->css([
	// 'AdminLTE./plugins/select2/select2.min',
  ],
  ['block' => 'css']);

$this->Html->script([
  // 'AdminLTE./plugins/select2/select2.full.min',
  // 'AdminLTE./plugins/input-mask/jquery.inputmask',
  // 'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
  // 'AdminLTE./plugins/input-mask/jquery.inputmask.extensions',
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
