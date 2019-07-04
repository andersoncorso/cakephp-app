<?php 
/**
 * CakePHP 3.x - Acl Manager
 * 
 * PHP version 5
 * 
 * index.ctp
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @category CakePHP3
 * 
 * @author Ivan Amat <dev@ivanamat.es>
 * @copyright Copyright 2016, Iván Amat
 * @license MIT http://opensource.org/licenses/MIT
 * @link https://github.com/ivanamat/cakephp3-aclmanager
 */

	use Cake\Core\Configure;
	use Cake\Utility\Inflector;

	echo $this->Html->css('AclManager.default',['inline' => false]);
?>

<!-- page header --> 
<section class="content-header">
	<h1><?php echo $this->Html->link(__('Acl Manager'),['action' => 'index']); ?></h1>
</section>

<!-- page content -->
<section class="content">
	<div class="row">
		
		<!-- Tools -->
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-body">
					
					<div class="col-sm-4">
						<h3><?php echo __('Manage'); ?></h3>
						<ul class="options">
							<?php foreach ($manage as $k => $item): ?>
							<li><?php echo $this->Html->link(__('Manage {0}', strtolower($item)), ['controller' => 'Acl', 'action' => 'Permissions', $item]); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					
					<div class="col-sm-4">
						<h3><?php echo __('Update'); ?></h3>
						<ul class="options">
							<li><?php echo $this->Html->link(__('Update ACOs'), ['controller' => 'Acl', 'action' => 'UpdateAcos']); ?></li>
							<li><?php echo $this->Html->link(__('Update AROs'), ['controller' => 'Acl', 'action' => 'UpdateAros']); ?></li>
						</ul>
					</div>
					
					<div class="col-sm-4">
						<h3><?php echo __('Drop and restore'); ?></h3>
						<ul class="options">
							<li><?php echo $this->Html->link(__('Revoke permissions and set defaults'), ['controller' => 'Acl', 'action' => 'RevokePerms'], ['confirm' => __('Do you really want to revoke all permissions? This will remove all above assigned permissions and set defaults. Only first item of last ARO will have access to panel.')]); ?></li>
							<li><?php echo $this->Html->link(__('Drop ACOs and AROs'), ['controller' => 'Acl', 'action' => 'drop'], ['confirm' => __('Do you really want delete ACOs and AROs? This will remove all above assigned permissions.')]); ?></li>
							<li><?php echo $this->Html->link(__('Update ACOs and AROs and set default values'), ['controller' => 'Acl', 'action' => 'defaults'], ['confirm' => __('Do you want restore defaults? This will remove all above assigned permissions. Only first item of last ARO will have access to panel.')]); ?></li>
						</ul>
					</div>

				</div>
			</div>
		</div>
		
		<!-- Permissões -->
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-body">
					
					<h2><?php echo sprintf(__($model)); ?></h2>
					<hr />
					
					<?php echo $this->Form->create('Perms'); ?>
					
					<table class="table table-bordered table-striped">
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

										echo "<td class=\"select-perm\">";
												echo $icon . ' ' . $this->Form->select("Perms." . str_replace("/", ":", $action) . ".{$aroAlias}:{$aro[$aroAlias]['id']}", array('inherit' => __('Inherit'), 'allow' => __('Allow'), 'deny' => __('Deny')), array('empty' => __($mAllowedText), 'class' => 'form-control'));
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
						<div class="col-xs-12">
							<div class="paginator">
								<ul class="pagination">
									<?php echo $this->Paginator->prev('< ' . __('previous')) ?>
									<?php echo $this->Paginator->numbers() ?>
									<?php echo $this->Paginator->next(__('next') . ' >') ?>
								</ul>
								<p><?php echo $this->Paginator->counter() ?></p>
							</div>
							 <button type="submit" class="btn btn-primary right"><?php echo __("Save"); ?></button>
						</div>
					</div>

					<?php echo $this->Form->end(); ?>
					
				</div>
			</div>
		</div>

		<!-- Legend -->
		<div class="col-xs-12">
			<div class="col-sm-4">
				<p><?php echo $this->Html->image('AclManager.deny_32.png') . ' ' . __('Denied') ?></p>
				<p><?php echo $this->Html->image('AclManager.deny_inherited_32.png') . ' ' . __('Denied by inheritance') ?></p>
			</div>
			<div class="col-sm-4">
				<p><?php echo $this->Html->image('AclManager.allow_32.png') . ' ' . __('Allowed') ?></p>
				<p><?php echo $this->Html->image('AclManager.allow_inherited_32.png') . ' ' . __('Allowed by inheritance') ?></p>
			</div>
			<div class="col-sm-4">
				<p><?php echo __('All permissions are denied by default. When the permissions are set, this ACO\'s children inherit permissions.'); ?></p>
			</div>
		</div>

	</div>
</section>