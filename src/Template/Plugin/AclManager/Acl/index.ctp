<div class="AclManager index large-12 medium-12 columns content">
    
    <h2>
    	<?php echo __('PERMISSÕES DE ACESSOS'); ?>
    	<br>
    	<small>Permissões de acessos de Grupos, Funções e Usuários ao metodos dos controllers</small>
    </h2>
	
	<!-- content -->
	<div class="content">
		<div class="large-2 columns">
			<div class="panel">
				<h3><?= __('GERENCIAR'); ?></h3>
				<ul>
					<?php foreach ($manage as $k => $item): ?>
						<li><?= $this->Html->link(__('{0}', $item), ['controller'=>'Acl', 'action'=>'Permissions', $item]); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<div class="large-2 columns">
			<div class="panel">
				<h3><?= __('ATUALIZAR'); ?></h3>
				<ul class="options">
					<li><?php echo $this->Html->link(__('Atualizar ACOs'), ['controller' => 'Acl', 'action' => 'UpdateAcos']); ?></li>
					<li><?php echo $this->Html->link(__('Atualizar AROs'), ['controller' => 'Acl', 'action' => 'UpdateAros']); ?></li>
				</ul>
			</div>
		</div>
		<div class="large-4 columns">
			<div class="panel">
				<h3><?= __('APAGAR E RESTAURAR'); ?></h3>
				<ul class="options">
					<li><?php echo $this->Html->link(__('Revogar permissões e definir padrões'), ['controller' => 'Acl', 'action' => 'RevokePerms'], ['confirm' => __('Você realmente quer revogar todas as permissões? Isso removerá todas as permissões atribuídas acima e definirá os padrões. Apenas o primeiro item do último ARO terá acesso ao painel.')]); ?></li>
					<li><?php echo $this->Html->link(__('Apagar ACOs e AROs'), ['controller' => 'Acl', 'action' => 'drop'], ['confirm' => __('Você realmente quer excluir ACOs e AROs? Isso removerá todas as permissões atribuídas acima.')]); ?></li>
					<li><?php echo $this->Html->link(__('Atualizar ACOs e AROs e definir valores padrões.'), ['controller' => 'Acl', 'action' => 'defaults'], ['confirm' => __('Você quer restaurar os padrões? Isso removerá todas as permissões atribuídas acima. Apenas o primeiro item do último ARO terá acesso ao painel.')]); ?></li>
				</ul>
			</div>
		</div>
		<div class="large-4 columns">
			<div class="panel">
				<h3><?= __('SOBRE O PLUGIN'); ?></h3>
				<p><?php echo $this->Html->link(__('CakePHP 3.x - Acl Manager on GitHub'), ['url' => 'https://github.com/ivanamat/cakephp3-aclmanager', 'target' => '_blank']); ?></p>
			</div>
		</div>
	</div>
</div>