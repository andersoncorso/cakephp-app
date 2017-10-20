<?= $this->Form->create($role, array('role'=>'form', 'class'=>'form-horizontal')) ?>
	<div class="box-body">
		<br>
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
		<!-- Nome -->
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-4">
				<?php 
					echo $this->Form->input('name', 
						['type'=>'text', 'placeholder'=>false, 'label'=>false, 'class'=>'form-control']
					);
				?>
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