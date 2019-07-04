<?= $this->Form->create() ?>

	<div class="form-group has-feedback">
		<?php 
			echo $this->Form->email('email', 
				['class'=>'form-control input-lg', 'placeholder'=>__('E-mail'), 'required'=>'required']
			);
		?>
		<span class="fa fa-envelope form-control-feedback"></span>
	</div>
	<div class="form-group has-feedback">
		<?php 
			echo $this->Form->password('password', 
				['class'=>'form-control input-lg', 'placeholder'=>__('Senha'), 'required'=>'required']
			);
		?>
		<span class="fa fa-unlock form-control-feedback"></span>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<?php 
				echo $this->Form->button(__('Acessar'), 
					['class'=>'btn btn-primary btn-block btn-flat btn-lg pull-right', 
					'id'=>'loadButton', 'data-loading-text'=>__('Aguarde...'), 'submitContainer'=>null]
				);
			?>
		</div>
	</div>

<?= $this->Form->end() ?>