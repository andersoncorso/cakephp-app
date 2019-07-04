<dl class="dl-horizontal">
	
	<dt></dt>
	<dd>&nbsp;</dd>
	
	<dt><?= __('#ID') ?></dt>
	<dd><?= h($user->id) ?></dd>

	<dt><?= __('Grupo') ?></dt>
	<dd><?= h('#'.$user->group_id.' - '.$user->group->name) ?></dd>

	<dt><?= __('Função') ?></dt>
	<dd><?= h('#'.$user->role_id.' - '.$user->role->name) ?></dd>

	<dt><?= __('E-mail') ?></dt>
	<dd><?= h($user->email) ?></dd>

	<dt><?= __('Status') ?></dt>
	<dd><?= ($user->active)?'Ativado':'Desativado' ?></dd>

	<dt><?= __('Criado em') ?></dt>
	<dd><?= h($user->created) ?></dd>

	<dt><?= __('Última modificação') ?></dt>
	<dd><?= h($user->modified) ?></dd>
	
	<dt></dt>
	<dd>
		<br>
		<?php
			if(isset($user->profile)){
				echo $this->Html->link(__('Ver Perfil'), ['controller'=>'Profiles', 'action'=>'view', $user->profile->id, 'plugin'=>'AccessManager'], ['class'=>'btn btn-primary']);
			}
		?>
	</dd>
</dl>