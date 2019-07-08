<?php use Cake\Core\Configure; ?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php echo Configure::read('Theme.title'); ?></title>

	<!-- CSS styles -->
	<?php
		$this->Html->css([
			'/plugins/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min', // Bootstrap 3.3.7
			'/plugins/AdminLTE/bower_components/font-awesome/css/font-awesome.min', // Font Awesome 4.7.0
			'/plugins/AdminLTE/AdminLTE.min', // AdminLTE Theme v2.4.5
			'/plugins/AdminLTE/skins/skin-'.Configure::read('Theme.skin'), // AdminLTE Skin
			'default', // Default style
		],
		['block' => 'css']);
	?>
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<?php
		echo $this->fetch('meta'); 		// Meta tags
		echo $this->fetch('css'); 		// CSS styles
		echo $this->fetch('script'); 	// JS scripts,

		echo $this->fetch('css_inline');	// CSS inline styles
	?>

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

	<!-- JS bottom scripts -->
	<?php
		$this->Html->script([
			'/plugins/AdminLTE/bower_components/jquery/dist/jquery.min', // jQuery v3.3.1
			'/plugins/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min', // Bootstrap 3.3.7
			'default', // Default script js
		],
		['block' => 'script_bottom']);

		echo $this->fetch('script_bottom');
	?>

	<!-- JS inline scripts -->
	<?php echo $this->fetch('script_inline'); ?>

</body>
</html>