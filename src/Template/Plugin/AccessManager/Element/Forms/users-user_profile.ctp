<!-- Horizontal Form -->
<div class="box box-primary">
	
	<div class="box-header with-border">
		<h3 class="box-title">Dados pessoais</h3>
	</div>

	<?= $this->Form->create($user, array('role' => 'form', 'class'=>'form-horizontal')) ?>
		<div class="box-body">
			<br>
			<!-- Nome Completo -->
			<div class="form-group">
				<label for="first-name" class="col-sm-2 control-label">Nome</label>
				<div class="col-sm-3">
					<?php 
						echo $this->Form->control('profile.first_name', 
							['placeholder'=>'João', 'label'=>false, 'class'=>'form-control']
						);
					?>
				</div>
				<div class="col-sm-5">
					<?php 
						echo $this->Form->control('profile.last_name', 
							['placeholder'=>'da Silva', 'label'=>false, 'class'=>'form-control']
						);
					?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<br>
					<button type="submit" class="btn btn-lg btn-primary btn-flat pull-left" id="loadButton" data-loading-text="Enviando...">Atualizar</button>
				</div>
			</div>
		</div>
	<?= $this->Form->end() ?>
	
</div>
