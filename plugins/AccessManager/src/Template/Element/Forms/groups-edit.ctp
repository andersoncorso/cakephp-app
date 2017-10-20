<?= $this->Form->create($group, array('role'=>'form', 'class'=>'form-horizontal')) ?>
	<div class="box-body">
		<br>
		<?= $this->Form->hidden('id') ?>
		<!-- Nome -->
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-4">
				<?php
					echo $this->Form->input('name',
						['class'=>'form-control', 
							'label'=>false, 'type'=>'text']
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