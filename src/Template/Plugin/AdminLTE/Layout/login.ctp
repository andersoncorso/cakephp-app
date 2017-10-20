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
	
	<!-- Theme style -->
	<?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
	<?php //echo $this->Html->css('AdminLTE.skins/skin-red'); ?>
	
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
<body class="hold-transition login-page">
	
	<?php if($this->request->session()->read('Flash')): ?>
	<div class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4">
			<?php 
				echo $this->Flash->render();
				echo $this->Flash->render('auth');
			?>
		</div>
	</div>
	<?php endif; ?>
	
	<div class="login-box">
		<div class="login-logo">
			<a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'display', 'home')); ?>">
				<?php echo $this->Html->image(Configure::read('Theme.logo.default')); ?>
			</a>
		</div>
		<div class="login-box-body">
			
			<p class="login-box-msg">
				<?= __('Faça login para iniciar sua sessão') ?>
			</p>

			<?php echo $this->fetch('content'); ?>
			<br>
			<?php if (Configure::read('Theme.login.show_remember')): ?>
				<p class="text-right">
					<a href="#"><?php echo __('Recuperar senha') ?></a><br>
				</p>
			<?php endif; ?>
			<p class="text-right">
				Dúvidas ou Sugestões, entre em
				<a href="https://www.irrigoias.com.br/fale-conosco" target="_blank"><?php echo __('Contato') ?></a><br>
			</p>
		</div>
	</div>

	<!-- jQuery 2.2.3 -->
	<?php echo $this->Html->script('AdminLTE./plugins/jQuery/jquery-2.2.3.min'); ?>
	
	<!-- Bootstrap 3.3.6 -->
	<?php echo $this->Html->script('AdminLTE./bootstrap/js/bootstrap.min'); ?>
	
	<!-- iCheck -->
	<?php echo $this->Html->script('AdminLTE./plugins/iCheck/icheck.min'); ?>
	
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
			});
		});
	</script>

</body>
</html>