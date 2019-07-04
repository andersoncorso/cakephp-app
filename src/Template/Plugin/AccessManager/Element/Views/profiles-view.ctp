<dl class="dl-horizontal">
	
	<dt></dt>
	<dd>&nbsp;</dd>
	
	<dt><?= __('#ID') ?></dt>
	<dd><?= h($profile->id) ?></dd>

	<dt><?= __('Usuário') ?></dt>
	<dd><?= h('#'.$profile->user_id.' - '.$profile->user->email) ?></dd>

	<dt><?= __('Primeiro Nome') ?></dt>
	<dd><?= h($profile->first_name) ?></dd>

	<dt><?= __('Sobrenome') ?></dt>
	<dd><?= h($profile->last_name) ?></dd>

	<dt><?= __('CPF') ?></dt>
	<dd><?= h($profile->cpf) ?></dd>

	<dt><?= __('Telefone') ?></dt>
	<dd><?= h($profile->phone01) ?></dd>

	<dt><?= __('Logradouro') ?></dt>
	<dd><?= h($profile->logradouro) ?></dd>

	<dt><?= __('Número') ?></dt>
	<dd><?= h($profile->num) ?></dd>

	<dt><?= __('Complemento') ?></dt>
	<dd><?= h($profile->complemento) ?></dd>

	<dt><?= __('Setor/Bairro') ?></dt>
	<dd><?= h($profile->setor) ?></dd>

	<dt><?= __('Estado') ?></dt>
	<dd>
	<?php
		if(isset($profile->estado)){
			echo h('#'.$profile->estado->id.' - '.$profile->estado->nome);
		}
	?>
	</dd>

	<dt><?= __('Município') ?></dt>
	<dd>
	<?php
		if(isset($profile->municipio)){
			echo h('#'.$profile->municipio->id.' - '.$profile->municipio->nome);
		}
	?>
	</dd>

	<dt><?= __('CEP') ?></dt>
	<dd><?= h($profile->cep) ?></dd>

	<dt><?= __('Caixa Postal') ?></dt>
	<dd><?= h($profile->caixa_postal) ?></dd>

	<dt><?= __('Criado em') ?></dt>
	<dd><?= h($profile->created) ?></dd>

	<dt><?= __('Última modificação') ?></dt>
	<dd><?= h($profile->modified) ?></dd>
	
	<dt></dt>
	<dd>
		<br>
		<ul class="list-inline">
			<li>
				<?= $this->Html->link(__('Editar'), ['controller'=>'Profiles', 'action'=>'edit', $profile->id, 'plugin'=>'AccessManager'], ['class'=>'btn-link btn-xs']) ?>
			</li>
			<li>
				<?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $profile->id, 'plugin'=>'AccessManager'], ['confirm' => __('Confirma a exclusão deste registro?'), 'class'=>'btn-link btn-xs']) ?>
			</li>
		</ul>
	</dd>
</dl>
