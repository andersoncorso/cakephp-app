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
?>

<!-- page header --> 
<section class="content-header">
	<h1><?= __d('AclManager', 'Acl Manager') ?></h1>
</section>

<!-- page content -->
<section class="content">
	<div class="row">
		
		<!-- Tools -->
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-body">
					
					<div class="col-sm-4">
						<h3><?php echo __d('AclManager', 'Manage'); ?></h3>
						<ul class="options">
							<?php foreach ($manage as $k => $item): ?>
							<li><?php echo $this->Html->link(__d('AclManager', 'Manage {0}', strtolower($item)), ['controller' => 'Acl', 'action' => 'Permissions', $item]); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					
					<div class="col-sm-4">
						<h3><?php echo __d('AclManager', 'Update'); ?></h3>
						<ul class="options">
							<li><?php echo $this->Html->link(__d('AclManager', 'Update ACOs'), ['controller' => 'Acl', 'action' => 'UpdateAcos']); ?></li>
							<li><?php echo $this->Html->link(__d('AclManager', 'Update AROs'), ['controller' => 'Acl', 'action' => 'UpdateAros']); ?></li>
						</ul>
					</div>
					
					<div class="col-sm-4">
						<h3><?php echo __d('AclManager', 'Drop and restore'); ?></h3>
						<ul class="options">
							<li><?php echo $this->Html->link(__d('AclManager', 'Revoke permissions and set defaults'), ['controller' => 'Acl', 'action' => 'RevokePerms'], ['confirm' => __d('AclManager', 'Do you really want to revoke all permissions? This will remove all above assigned permissions and set defaults. Only first item of last ARO will have access to panel.')]); ?></li>
							<li><?php echo $this->Html->link(__d('AclManager', 'Drop ACOs and AROs'), ['controller' => 'Acl', 'action' => 'drop'], ['confirm' => __d('AclManager', 'Do you really want delete ACOs and AROs? This will remove all above assigned permissions.')]); ?></li>
							<li><?php echo $this->Html->link(__d('AclManager', 'Update ACOs and AROs and set default values'), ['controller' => 'Acl', 'action' => 'defaults'], ['confirm' => __d('AclManager', 'Do you want restore defaults? This will remove all above assigned permissions. Only first item of last ARO will have access to panel.')]); ?></li>
						</ul>
					</div>

				</div>
			</div>
		</div>
		
		<!-- About -->
		<div class="col-xs-12">
			<h4><?php echo __d('AclManager', 'About CakePHP 3.x - Acl Manager'); ?></h4>
			<p><?php echo $this->Html->link(__d('AclManager', 'CakePHP 3.x - Acl Manager on GitHub'), ['url' => 'https://github.com/ivanamat/cakephp3-aclmanager', 'target' => '_blank']); ?></p>			
		</div>

	</div>
</section>