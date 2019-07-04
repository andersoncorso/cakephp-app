<?php if( $this->request->is('mobile') ): ?>
<div class="table-responsive">
<?php endif;?>
	<table id="tbList" class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>#ID</th>
				<th><?= __('Nome') ?></th>
				<th><?= __('Grupo') ?></th>
				<th><?= __('Criado em') ?></th>
				<th><?= __('Ações') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($roles as $k=>$r): ?>
			<tr>
				<td><?= h($r->id) ?></td>
				<td><?= h($r->name) ?></td>
				<td title="<?= 'Group ID: '.$r->group->id ?>"><?= h($r->group->name) ?></td>
				<td><?= h($r->created) ?></td>
				<td class="actions" style="white-space:nowrap">
					<?php
						echo $this->element('Layout/index_crud-buttons',
							[
								'id'=>$r->id,
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