<?php if( $this->request->is('mobile') ): ?>
<div class="table-responsive">
<?php endif;?>
	<table id="tbList" class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>#ID</th>
				<th><?= __('Grupo') ?></th>
				<th><?= __('Função') ?></th>
				<th><?= __('E-mail') ?></th>
				<th><?= __('Status') ?></th>
				<th><?= __('Ações') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($users as $k=>$u): ?>
			<tr>
				<td><?= h($u->id) ?></td>
				<td title="<?= 'Group ID: '.$u->group->id ?>"><?= h($u->group->name) ?></td>
				<td title="<?= 'Role ID: '.$u->role->id ?>"><?= h($u->role->name) ?></td>
				<td><?= h($u->email) ?></td>
				<td><?= ($u->active)?'<span class="label label-success">Ativado</label>':'<span class="label label-default">Desativado</label>' ?></td>
				<td class="actions" style="white-space:nowrap">
					<div id="dropdown-actions" class="btn-group pull-right">
						<a href="#" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<i class="fa fa-menu"></i> Mais&nbsp;&nbsp; <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>
								<?= $this->Html->link(__('Detalhes'), ['controller'=>'Users', 'action'=>'view', $u->id, 'plugin'=>'AccessManager']) ?>
							</li>
							<li>
								<?= $this->Html->link(__('Editar'), ['controller'=>'Users', 'action'=>'edit', $u->id, 'plugin'=>'AccessManager']) ?>
							</li>
							<li>
								<?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $u->id, 'plugin'=>'AccessManager'], ['confirm' => __('Confirma a exclusão deste registro?')]) ?>
							</li>
						</ul>
					</div>			
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php if( $this->request->is('mobile') ): ?>
</div>
<?php endif;?>

<?php
	$this->Html->css([
		'AdminLTE./plugins/datatables/dataTables.bootstrap',
	],
	['block' => 'css']);

	$this->Html->script([
		'AdminLTE./plugins/datatables/jquery.dataTables.min',
		'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
	],
	['block' => 'script']);
?>

<?php $this->start('scriptBottom'); ?>
<script>
	$(function () {
		$('#tbList').DataTable({
			"paging": true,
			"lengthChange": true,
			"pageLength": 25,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": true,
			// "scrollX": 50,
			// "scrollY": 50,
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json"
			}			
		});
	});
</script>
<?php $this->end(); ?>