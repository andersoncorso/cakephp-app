<?php
	use Cake\Core\Configure; 
	use Cake\Utility\Inflector; 
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        
		<li><?= $this->Html->link(__('INÍCIO'), ['controller'=>'Acl', 'action'=>'index']); ?></li>

        <li class="heading"><?= __('GERENCIAR') ?></li>
		<?php foreach ($manage as $k => $item): ?>
			<li><?= $this->Html->link(__('{0}', $item), ['controller'=>'Acl', 'action'=>'Permissions', $item]); ?></li>
		<?php endforeach; ?>
        
        <li class="heading"><?= __('ATUALIZAR') ?></li>
		<li><?php echo $this->Html->link(__('Atualizar ACOs'), ['controller' => 'Acl', 'action' => 'UpdateAcos']); ?></li>
		<li><?php echo $this->Html->link(__('Atualizar AROs'), ['controller' => 'Acl', 'action' => 'UpdateAros']); ?></li>
        
        <li class="heading"><?= __('APAGAR E RESTAURAR') ?></li>
		<li><?php echo $this->Html->link(__('Revogar permissões e definir padrões'), ['controller' => 'Acl', 'action' => 'RevokePerms'], ['confirm' => __('Você realmente quer revogar todas as permissões? Isso removerá todas as permissões atribuídas acima e definirá os padrões. Apenas o primeiro item do último ARO terá acesso ao painel.')]); ?></li>
		<li><?php echo $this->Html->link(__('Apagar ACOs e AROs'), ['controller' => 'Acl', 'action' => 'drop'], ['confirm' => __('Você realmente quer excluir ACOs e AROs? Isso removerá todas as permissões atribuídas acima.')]); ?></li>
		<li><?php echo $this->Html->link(__('Atualizar ACOs e AROs e definir valores padrões.'), ['controller' => 'Acl', 'action' => 'defaults'], ['confirm' => __('Você quer restaurar os padrões? Isso removerá todas as permissões atribuídas acima. Apenas o primeiro item do último ARO terá acesso ao painel.')]); ?></li>

        <li class="heading"><?= __('SOBRE O PLUGIN') ?></li>
        <li><?php echo $this->Html->link(__('CakePHP 3.x - Acl Manager on GitHub'), ['url' => 'https://github.com/ivanamat/cakephp3-aclmanager', 'target' => '_blank']); ?></li>

    </ul>
</nav>
<div class="groups index large-9 medium-8 columns content">
    <h3><?= 'GERENCIAR' ?><small>&nbsp(<?= sprintf(__($model)) ?>)</small></h3>

	<div class="row">
	    <div class="columns large-12">
	        <?php echo $this->Form->create('Perms'); ?>
			
			<!-- actions/permissions -->
			<table class="table table-bordered table-striped table-hover dataTable js-exportable">
				<thead>
					<tr>
						<th>Action</th>
						<?php foreach ($aros as $aro): ?>
							<?php $aro = array_shift($aro); ?>
							<th>
								<?php
								if (($model == 'Roles' OR $model == 'Users') && $this->request->session()->read('Auth.User.role_id') == 1) {
									$gData = $this->AclManager->getName('Groups', $aro['group_id']);
									echo h($aro[$aroDisplayField]) . ' ( ' . $gData['name'] . ' )';
								} else {
									echo h($aro[$aroDisplayField]);
								}
								?>
							</th>
						<?php endforeach; ?>
					</tr>
				</thead>
				<tbody>
					<?php
					$uglyIdent = Configure::read('AclManager.uglyIdent');
					$lastIdent = null;
					foreach ($acos as $id => $aco) {
						$action = $aco['Action'];
						$alias = $aco['Aco']['alias'];
						$ident = substr_count($action, '/');

						if ($ident <= $lastIdent && !is_null($lastIdent)) {
							for ($i = 0; $i <= ($lastIdent - $ident); $i++) {
								echo "</tr>";
							}
						}

						if ($ident != $lastIdent) {
							echo "<tr class='aclmanager-ident-" . $ident . "'>";
						}

						if ($this->AclManager->Acl->check(['Users' => ['id' => $this->request->session()->read('Auth.User.id')]], $action)) {
							echo "<td>";
							echo Inflector::humanize(($ident == 1 ? "<strong>" : "" ) . ($uglyIdent ? str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", $ident) : "") . h($alias) . ($ident == 1 ? "</strong>" : "" ));
							echo "</td>";

							foreach ($aros as $aro):
								$inherit = $this->AclManager->value("Perms." . str_replace("/", ":", $action) . ".{$aroAlias}:{$aro[$aroAlias]['id']}-inherit");
								$allowed = $this->AclManager->value("Perms." . str_replace("/", ":", $action) . ".{$aroAlias}:{$aro[$aroAlias]['id']}");

								$mAro = $model;
								$mAllowed = $this->AclManager->Acl->check($aro, $action);
								$mAllowedText = ($mAllowed) ? 'Allow' : 'Deny';

								// Originally based on 'allowed' above 'mAllowed'
								$icon = ($mAllowed) ? $this->Html->image('AclManager.allow_32.png') : $this->Html->image('AclManager.deny_32.png');

								if ($inherit) {
									$icon = $this->Html->image('AclManager.inherit_32.png');
								}

								if ($mAllowed && !$inherit) {
									$icon = $this->Html->image('AclManager.allow_32.png');
									$mAllowedText = 'Allow';
								}

								if ($mAllowed && $inherit) {
									$icon = $this->Html->image('AclManager.allow_inherited_32.png');
									$mAllowedText = 'Inherit';
								}

								if (!$mAllowed && $inherit) {
									$icon = $this->Html->image('AclManager.deny_inherited_32.png');
									$mAllowedText = 'Inherit';
								}

								if (!$mAllowed && !$inherit) {
									$icon = $this->Html->image('AclManager.deny_32.png');
									$mAllowedText = 'Deny';
								}

								echo "<td class=\"select-perm\" style=\"white-space: nowrap;\">";
										echo $icon;
										echo ' ' . $this->Form->select("Perms." . str_replace("/", ":", $action) . ".{$aroAlias}:{$aro[$aroAlias]['id']}", array('inherit' => __('Inherit'), 'allow' => __('Allow'), 'deny' => __('Deny')), array('empty' => __($mAllowedText), 'style'=>'width:80%'));
								echo "</td>";
							endforeach;

							$lastIdent = $ident;
						}
					}

					for ($i = 0; $i <= $lastIdent; $i++) {
						echo "</tr>";
					}
					?>
				</tbody>
			</table>

	        <div class="row">
	            <div class="columns large-12">
	                <div class="paginator">
	                    <ul class="pagination">
	                        <?php echo $this->Paginator->prev('< ' . __('previous')) ?>
	                        <?php echo $this->Paginator->numbers() ?>
	                        <?php echo $this->Paginator->next(__('next') . ' >') ?>
	                    </ul>
	                    <p><?php echo $this->Paginator->counter() ?></p>
	                </div>
					<?php 
						echo $this->Form->button(__('Salvar'), [
							'class'=>'btn btn-primary right', 'submitContainer'=>null
						]);
					?>
	            </div>
	        </div>
	        <?php echo $this->Form->end(); ?>
	        
	    </div>
	</div>

	<div class="row panel">
	    <div class="columns large-12">
	        <div class="row">
	            <div class="columns medium-4">
	                <p><?php echo $this->Html->image('AclManager.deny_32.png') . ' ' . __('Denied') ?></p>
	                <p><?php echo $this->Html->image('AclManager.deny_inherited_32.png') . ' ' . __('Denied by inheritance') ?></p>
	            </div>
	            <div class="columns medium-4">
	                <p><?php echo $this->Html->image('AclManager.allow_32.png') . ' ' . __('Allowed') ?></p>
	                <p><?php echo $this->Html->image('AclManager.allow_inherited_32.png') . ' ' . __('Allowed by inheritance') ?></p>
	            </div>
	            <div class="columns medium-4">
	                <p><?php echo __('All permissions are denied by default. When the permissions are set, this ACO\'s children inherit permissions.'); ?></p>
	            </div>
	        </div>
	    </div>
	</div>


</div>
