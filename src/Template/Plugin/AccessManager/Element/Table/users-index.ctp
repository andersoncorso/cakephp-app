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
					<?php
						echo $this->element('Layout/index_crud-buttons',
							[
								'id'=>$u->id,
								'confirm'=>"Confirma a exclusão deste registro?",
								'plugin'=>'AccessManager'
							]
						);
					?>
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
				"url": "../js/datatable/i18n/Portuguese-Brasil.json"
			}			
		});
	});
</script>
<?php $this->end(); ?>