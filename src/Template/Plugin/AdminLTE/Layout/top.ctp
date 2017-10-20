<?php use Cake\Core\Configure; ?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php echo Configure::read('Theme.title'); ?></title>

	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<!-- Bootstrap 3.3.5 -->
	<?php echo $this->Html->css('AdminLTE./bootstrap/css/bootstrap.min'); ?>
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	
	<!-- Theme style and skin -->
	<?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
	<?php echo $this->Html->css('AdminLTE.skins/skin-'.Configure::read('Theme.skin')); ?>
	
	<!-- Default style -->
	<?php echo $this->Html->css('default'); ?>

	<?php echo $this->fetch('css'); ?>

	<!-- Favicon -->
	<?php
		$path = $this->Url->build('/img/favicon');
		echo $this->element('favicon', ['path'=>$path]);
	?>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body class="hold-transition skin-<?php echo Configure::read('Theme.skin'); ?> layout-top-nav">

	<!-- Site wrapper -->
	<div class="wrapper">
		<header class="main-header">
			<!-- Header Navbar: style can be found in header.less -->
			<?php echo $this->element('top_nav-top', ['logo'=>Configure::read('Theme.logo.vertical')]) ?>
		</header>
		<!-- Full Width Column -->
		<div class="content-wrapper">
			<div class="container">
				<br>
				<?php echo $this->Flash->render(); ?>
				<?php echo $this->Flash->render('auth'); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		<?php echo $this->element('footer'); ?>
	</div>
	<!-- ./wrapper -->

	<!-- jQuery 2.2.3 -->
	<?php echo $this->Html->script('AdminLTE./plugins/jQuery/jquery-2.2.3.min'); ?>
	
	<!-- Bootstrap 3.3.5 -->
	<?php echo $this->Html->script('AdminLTE./bootstrap/js/bootstrap.min'); ?>
	
	<!-- SlimScroll -->
	<?php echo $this->Html->script('AdminLTE./plugins/slimScroll/jquery.slimscroll.min'); ?>
	
	<!-- FastClick -->
	<?php echo $this->Html->script('AdminLTE./plugins/fastclick/fastclick'); ?>
	
	<!-- AdminLTE App -->
	<?php echo $this->Html->script('AdminLTE./js/app.min'); ?>
	
	<!-- AdminLTE for demo purposes -->
	<?php echo $this->fetch('script'); ?>
	<?php echo $this->fetch('scriptBottom'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
		});
	</script>
	
</body>
</html>