<dl class="dl-horizontal">
	
	<dt></dt>
	<dd>&nbsp;</dd>
	
	<dt><?= __('#ID') ?></dt>
	<dd><?= h($role->id) ?></dd>

	<dt><?= __('Grupo') ?></dt>
	<dd><?= h('#'.$role->group_id.' - '.$role->group->name) ?></dd>

	<dt><?= __('Nome') ?></dt>
	<dd><?= h($role->name) ?></dd>

	<dt><?= __('Criado em') ?></dt>
	<dd><?= h($role->created) ?></dd>

	<dt><?= __('Última modificação') ?></dt>
	<dd><?= h($role->modified) ?></dd>
	
	<dt></dt>
	<dd>
		<br>
		<ul class="list-inline">
			<li>
				<?= $this->Html->link(__('Editar'), ['action'=>'edit', $role->id, 'plugin'=>'AccessManager'], ['class'=>'btn btn-primary btn-xs']) ?>
			</li>
			<li>
				<?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $role->id, 'plugin'=>'AccessManager'], ['confirm' => __('Confirma a exclusão deste registro?'), 'class'=>'btn btn-danger btn-xs']) ?>
			</li>
		</ul>
	</dd>
</dl>
