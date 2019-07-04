<?= $this->Form->create($user, array('role'=>'form', 'class'=>'form-horizontal')) ?>
	<div class="box-body">
		<br>
		<?= $this->Form->hidden('id') ?>
		<!-- Grupo -->
		<div class="form-group">
			<label class="col-sm-2 control-label">Grupo</label>
			<div class="col-sm-2">
				<?php
					echo $this->Form->control('group_id',
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
					echo $this->Form->control('role_id',
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
					echo $this->Form->control('email', 
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
					echo $this->Form->button('Atualizar', [
						'class'=>'btn btn-primary btn-flat btn-lg col-md-3',
						'id'=>'loadButton', 'data-loading-text'=>'Aguarde...', 'submitContainer'=>null
					]);
				?>
			</div>
		</div>
	</div>

<?= $this->Form->end() ?>