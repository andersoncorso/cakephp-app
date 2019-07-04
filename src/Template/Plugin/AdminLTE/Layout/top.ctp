<?php use Cake\Core\Configure; ?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php echo Configure::read('Theme.title'); ?></title>

	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
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
		echo $this->fetch('script'); 	// JS scripts
	?>

	<!-- Favicon -->
	<?php
		$path = $this->Url->build('/img/favicon');
		echo $this->element('favicon', ['path'=>$path]);
	?>

</head>
<body class="hold-transition skin-<?php echo Configure::read('Theme.skin'); ?> layout-top-nav">

	<div class="wrapper">

		<!-- Header -->
		<header class="main-header">
			<?php echo $this->element('top_nav-top', ['logo'=>Configure::read('Theme.logo.vertical')]) ?>
		</header>

		<!-- Content -->
		<div class="content-wrapper">
		<?php 
			if( $this->request->is('mobile') ) {

				echo $this->Flash->render();
				echo $this->Flash->render('auth');
				echo $this->fetch('content');
			}
			else {

				echo '<div class="container">';
				echo '<br>';
				echo $this->Flash->render();
				echo $this->Flash->render('auth');
				echo $this->fetch('content');
				echo '</div>';
			}
		?>
		</div>

		<!-- Footer -->
		<?php echo $this->element('footer'); ?>

	</div>
	
	<!-- JS bottom scripts -->
	<?php
		$this->Html->script([
			'/plugins/AdminLTE/bower_components/jquery/dist/jquery.min', // jQuery v3.3.1
			'/plugins/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min', // Bootstrap 3.3.7
			'/plugins/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min', // SlimScroll
			'/plugins/AdminLTE/bower_components/fastclick/lib/fastclick', // FastClick
			'/plugins/AdminLTE/adminlte.min', // AdminLTE App
			'default', // Default script js
		],
		['block' => 'scriptBottom']);
	?>
	<?php echo $this->fetch('scriptBottom'); ?>

	<!-- JS inline scripts -->
	<?php echo $this->fetch('scriptInline'); ?>
	
</body>
</html>