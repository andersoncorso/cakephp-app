<?php

	$view=(isset($view))? $view : true;
	$edit=(isset($edit))? $edit : true;
	$delete=(isset($delete))? $delete : true;
	$plugin=(isset($plugin))? $plugin : false;

	$iconView = '<i class="fa fa-search"></i>';
	$iconEdit = '<i class="fa fa-pencil"></i>';
	$iconDel = '<i class="fa fa-trash"></i>';

	if ($view) {

		echo $this->Html->link(
			$iconView,
			['action'=>'view', $id, 'plugin'=>$plugin],
			['escape'=>false, 'class'=>'btn btn-default btn-xs']
		);
		echo '&nbsp;';
	}

	if ($edit) {

		echo $this->Html->link(
			$iconEdit,
			['action'=>'edit', $id, 'plugin'=>$plugin],
			['escape'=>false, 'class'=>'btn btn-default btn-xs']
		);
		echo '&nbsp;';
	}

	if ($delete) {
		
		echo $this->Form->postLink(
			$iconDel,
			['action'=>'delete', $id, 'plugin'=>$plugin],
			['confirm'=>__("$confirm"), 'escape'=>false, 'class'=>'btn btn-default btn-xs']
		);
	}
?>
