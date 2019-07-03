<?php 
	$iconEdit = '<i class="fa fa-pencil"></i>';
	$iconUpdate = '<i class="fa fa-pencil-square-o"></i>';
	$iconDel = '<i class="fa fa-trash"></i>';
?>

<!-- page header --> 
<section class="content-header">
	<h1><?= __('Usuário') ?>&nbsp;</h1>
	<ol class="breadcrumb">
		<li>
			<?php 
				echo $this->Html->link('<i class="fa fa-angle-double-left"></i> '.__('Voltar'),
					'javascript:window.history.back()',
					['escape' => false]
				);
			?>
		</li>
	</ol>
</section>

<!-- page content -->
<section class="content">
	<div class="row">
		
		<!-- user -->
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-body">
					<?= $this->element('Views/users-view') ?>
				</div>
				<div class="box-footer text-right">
				<?php
					echo $this->Html->link(
						$iconEdit.' editar',
						['action'=>'edit', $user->id, 'plugin'=>'AccessManager'],
						['escape'=>false, 'class'=>'btn btn-default']
					);
					echo '&nbsp;&nbsp;';
					echo $this->Form->postLink(
						$iconDel.' excluir',
						['action'=>'delete', $user->id, 'plugin'=>'AccessManager'],
						['confirm'=>__("Confirma a exclusão?"), 'escape'=>false, 'class'=>'btn btn-default']
					);
				?>
				</div>
			</div>
		</div>
		
		<?php if(isset($user->profile)): ?>
		<!-- profile -->
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<i class="fa fa-list"></i>
					<h3 class="box-title">
						<?= __('Perfil') ?>
					</h3>
				</div>
				<div class="box-body">
					<?= $this->element('Views/profiles-view') ?>
				</div>
				<div class="box-footer text-right">
				<?php
					echo $this->Html->link(
						$iconEdit.' editar',
						['controller'=>'Profiles', 'action'=>'edit', $user->profile->id, 'plugin'=>'AccessManager'],
						['escape'=>false, 'class'=>'btn btn-default']
					);
					echo '&nbsp;&nbsp;';
					echo $this->Form->postLink(
						$iconDel.' excluir',
						['controller'=>'Profiles', 'action'=>'delete', $user->profile->id, 'plugin'=>'AccessManager'],
						['confirm'=>__("Confirma a exclusão?"), 'escape'=>false, 'class'=>'btn btn-default']
					);
				?>
				</div>
			</div>
		</div>
		<?php endif; ?>

	</div>
</section>
