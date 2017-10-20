<!-- File: src/Template/Users/login.ctp -->
<?php $this->layout = 'AdminLTE.login'; ?>

<?= $this->Form->create() ?>

	<div class="form-group has-feedback">
		<?php 
			echo $this->Form->email('email', 
				['class'=>'form-control input-lg', 'placeholder'=>'E-mail', 'required'=>'required']
			);
		?>
		<span class="fa fa-envelope form-control-feedback"></span>
	</div>
	<div class="form-group has-feedback">
		<?php 
			echo $this->Form->password('password', 
				['class'=>'form-control input-lg', 'placeholder'=>'Senha', 'required'=>'required']
			);
		?>
		<span class="fa fa-unlock form-control-feedback"></span>
	</div>
	<div class="row">
		<!--
		<div class="col-xs-8">
			<div class="checkbox icheck">
				<label>
					<input type="checkbox"> Lembrar
				</label>
			</div>
		</div>
		-->
		<div class="col-xs-12">
			<?php 
				echo $this->Form->button('Acessar', 
					['class'=>'btn btn-primary btn-block btn-flat btn-lg pull-right', 'submitContainer'=>null]
				);
			?>
		</div>
	</div>

<?= $this->Form->end() ?>