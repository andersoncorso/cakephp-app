<!-- page header --> 
<section class="content-header">
	<h1><?= __('Minha conta') ?></h1>
 	<?php
		// Add multiple crumbs at the end of the trail
		$this->Breadcrumbs->add('Minha conta', null);
		// echo $this->element('Layout/breadcrumbs');
	?>
</section>

<!-- page content -->
<section class="content">
	<div class="row">
		<div class="col-md-3">
			<!-- E-mail e senha -->
			<?php echo $this->element('Layout/user_profile-aside_box', ['user'=>$user, 'profile'=>$user->profile]); ?>
		</div>
		<div class="col-md-9">
			<!-- Dados pessoais -->
			<?php echo $this->element('Forms/users-user_profile'); ?>
		</div>
	</div>
</section>


<?php
$this->Html->css([
    'AdminLTE./plugins/select2/select2.min',
  ],
  ['block' => 'css']);

$this->Html->script([
	'AdminLTE./plugins/select2/select2.full.min',
	'AdminLTE./plugins/input-mask/jquery.inputmask',
	'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
	'AdminLTE./plugins/input-mask/jquery.inputmask.extensions',
	'/chained/jquery.chained',
	'/chained/jquery.chained.remote'
],
['block' => 'script']);

	// URL for list of cities by states 
	$url_list = $this->Url->build(['controller'=>'Municipios', 'action'=>'list_by_state', 'plugin'=>'Places', '_ext'=>'json'], ['fullBase'=>true]);

?>
<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
	
	/* For jquery.chained.remote.js */
	$("#municipios-remote").remoteChained({
		parents : "#estados-remote",
		url : "<?= $url_list ?>",
		loading : "aguarde"
	});

    //Initialize Select2 Elements
    $(".select2").select2();

    //Mask input
    $("[data-mask]").inputmask();

  });
</script>
<?php $this->end(); ?>
