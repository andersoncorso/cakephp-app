<?= $this->Form->create($user) ?>

	<div class="form-group has-feedback">
		<?php 
			echo $this->Form->email('email', 
				['class'=>'form-control input-lg', 'placeholder'=>__('E-mail'), 'required'=>'required']
			);
		?>
		<span class="fa fa-envelope form-control-feedback"></span>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<?php 
				echo $this->Form->button(__('Enviar'), 
					['class'=>'btn btn-primary btn-block btn-flat btn-lg pull-right', 
					'id'=>'loadButton', 'data-loading-text'=>__('Aguarde...'), 'submitContainer'=>null]
				);
			?>
		</div>
	</div>

<?= $this->Form->end() ?>