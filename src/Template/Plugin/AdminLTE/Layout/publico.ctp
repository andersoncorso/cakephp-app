<?php use Cake\Core\Configure; ?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php echo Configure::read('Theme.title'); ?></title>

	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<!-- Bootstrap 3.3.7 -->
	<?php echo $this->Html->css('AdminLTE./bower_components/bootstrap/dist/css/bootstrap.min'); ?>

	<!-- Font Awesome -->
	<?php echo $this->Html->css('AdminLTE./bower_components/font-awesome/css/font-awesome.min'); ?>
	<!-- Ionicons -->
	<?php echo $this->Html->css('AdminLTE./bower_components/Ionicons/css/ionicons.min'); ?>
	
	<!-- Theme style and skin -->
	<?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>

	<!-- only theme skins in ROOT weboot -->
	<?php echo $this->Html->css('AdminLTE.skins/skin-'.Configure::read('Theme.skin')); ?>
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	
	<!-- Default style -->
	<?php echo $this->Html->css('default'); ?>

	<?php echo $this->fetch('css'); ?>

	<!-- Favicon -->
	<?php
		$path = $this->Url->build('/img/favicon');
		echo $this->element('favicon', ['path'=>$path]);
	?>

</head>
<body class="hold-transition" style="background-color: #e5e5e5;">
	
	<!-- Main content -->
	<div id="maincontent">
		<?php echo $this->Flash->render(); ?>
		<?php echo $this->Flash->render('auth'); ?>
		<?php echo $this->fetch('content'); ?>
	</div>

	<!-- jQuery 3 -->
	<?php echo $this->Html->script('AdminLTE./bower_components/jquery/dist/jquery.min'); ?>

	<!-- Bootstrap 3.3.7 -->
	<?php echo $this->Html->script('AdminLTE./bower_components/bootstrap/dist/js/bootstrap.min'); ?>
	
	<!-- SlimScroll -->
	<?php echo $this->Html->script('AdminLTE./bower_components/jquery-slimscroll/jquery.slimscroll.min'); ?>
	
	<!-- FastClick -->
	<?php echo $this->Html->script('AdminLTE./bower_components/fastclick/lib/fastclick'); ?>
	
	<!-- AdminLTE App -->
	<?php echo $this->Html->script('AdminLTE.adminlte.min'); ?>

	<!-- bottom scripts -->
	<?php echo $this->fetch('script'); ?>
	<?php echo $this->fetch('scriptBottom'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
			
			// Loading Button
			$('form').on('submit', function(e) {
				var btn = $('#loadButton').button('loading')
			});

			// Tooltips
			$(function () {
				$('[data-toggle="tooltip"]').tooltip()
			})
	
		});
	</script>

</body>
</html>