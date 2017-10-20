<dl class="dl-horizontal">
	
	<dt></dt>
	<dd>&nbsp;</dd>
	
	<dt><?= __('#ID') ?></dt>
	<dd><?= h($group->id) ?></dd>

	<dt><?= __('Nome') ?></dt>
	<dd><?= h($group->name) ?></dd>

	<dt><?= __('Criado em') ?></dt>
	<dd><?= h($group->created) ?></dd>

	<dt><?= __('Última modificação') ?></dt>
	<dd><?= h($group->modified) ?></dd>
	
	<dt></dt>
	<dd>
		<br>
		<ul class="list-inline">
			<li>
				<?= $this->Html->link(__('Editar'), ['action'=>'edit', $group->id, 'plugin'=>'AccessManager'], ['class'=>'btn btn-primary btn-xs']) ?>
			</li>
			<li>
				<?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $group->id, 'plugin'=>'AccessManager'], ['confirm' => __('Confirma a exclusão deste registro?'), 'class'=>'btn btn-danger btn-xs']) ?>
			</li>
		</ul>
	</dd>
</dl>
