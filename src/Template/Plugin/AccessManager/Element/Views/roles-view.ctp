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
</dl>
