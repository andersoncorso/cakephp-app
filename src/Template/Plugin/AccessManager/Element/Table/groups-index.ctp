<?php if( $this->request->is('mobile') ): ?>
<div class="table-responsive">
<?php endif;?>
	<table id="tbList" class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>#ID</th>
				<th><?= __('Nome') ?></th>
				<th><?= __('Criado em') ?></th>
				<th><?= __('Ações') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($groups as $k=>$g): ?>
			<tr>
				<td><?= h($g->id) ?></td>
				<td><?= h($g->name) ?></td>
				<td><?= h($g->created) ?></td>
				<td class="actions" style="white-space:nowrap">
					<?php
						echo $this->element('Layout/index_crud-buttons',
							[
								'id'=>$g->id,
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