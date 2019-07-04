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
<body class="hold-transition login-page">
	
	<div class="login-box">
		<div class="login-logo">
			<a href="<?php echo $this->Url->build(array('controller'=>'pages', 'action'=>'display', 'home', 'plugin'=>false)); ?>">
				<?php echo $this->Html->image(Configure::read('Theme.logo.default')); ?>
			</a>
		</div>
		<div class="login-box-body">
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>

	<!-- jQuery 3 -->
	<?php echo $this->Html->script('AdminLTE./bower_components/jquery/dist/jquery.min'); ?>
	
	<!-- Bootstrap 3.3.7 -->
	<?php echo $this->Html->script('AdminLTE./bower_components/bootstrap/dist/js/bootstrap.min'); ?>

	<script type="text/javascript">
		$(document).ready(function(){
			
			// Loading Button
			$('form').on('submit', function(e) {
				var btn = $('#loadButton').button('loading')
			});
		});
	</script>

</body>
</html>