<?php if( $this->request->is('mobile') ): ?>
<div class="table-responsive">
<?php endif;?>
	<table id="tbList" class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>#ID</th>
				<th><?= __('Nome') ?></th>
				<th><?= __('Estado') ?></th>
				<th><?= __('Município') ?></th>
				<th><?= __('Criado em') ?></th>
				<th><?= __('Ações') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($profiles as $k=>$p): ?>
			<tr>
				<td title="<?= '#ID Usuário: '.$p->user_id ?>"><?= h($p->id) ?></td>
				<td><?= h($p->full_name) ?></td>
				<td><?php echo isset($p->estado->nome)? $p->estado->nome: ''; ?></td>
				<td><?php echo isset($p->municipio->nome)? $p->municipio->nome: ''; ?></td>
				<td><?= h($p->created) ?></td>
				<td class="actions" style="white-space:nowrap">
					<div id="dropdown-actions" class="btn-group pull-right">
						<a href="#" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<i class="fa fa-menu"></i> Mais&nbsp;&nbsp; <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>
								<?= $this->Html->link(__('Detalhes'), ['action'=>'view', $p->id, 'plugin'=>'AccessManager']) ?>
							</li>
							<li>
								<?= $this->Html->link(__('Editar'), ['action'=>'edit', $p->id, 'plugin'=>'AccessManager']) ?>
							</li>
							<li>
								<?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $p->id, 'plugin'=>'AccessManager'], ['confirm' => __('Confirma a exclusão deste registro?')]) ?>
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
				"url": "../js/datatable/i18n/Portuguese-Brasil.json"
			}			
		});
	});
</script>
<?php $this->end(); ?>