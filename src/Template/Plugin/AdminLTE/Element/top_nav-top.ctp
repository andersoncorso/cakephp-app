<nav class="navbar navbar-static-top">
	<div class="container">

		<div class="navbar-header">
			<a href="<?php echo $this->Url->build('/'); ?>" class="navbar-brand" style="padding-top: 10px !important;">
			<?php echo $this->Html->image($logo); ?>
			</a>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
				<i class="fa fa-bars"></i>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
			<!-- Menu -->
			<ul class="nav navbar-nav">
			<?php
				$menu = $this->request->session()->read('Auth.User.menu');

				if(!empty($menu)){
					
					foreach($this->request->session()->read('Auth.User.menu') as $k=>$menu){
						
						if(isset($menu['title']) and isset($menu['links'])){
							
							// Dropdown menu
							echo '<li class="dropdown">';
								echo $this->Html->link($menu['title'].' <span class="caret"></span>', '#',
									['class'=>'dropdown-toggle', 'data-toggle'=>'dropdown', 'escape'=>false]
								);
								echo '<ul class="dropdown-menu" role="menu">';
								foreach ($menu['links'] as $link => $url) {

									if($link==='sep'){
										echo '<li class="divider"></li>';
									}
									else{
										echo '<li>'.$this->Html->link($link, $url, ['escape'=>false]).'</li>';
									}
								}
								echo '</ul>';
							echo '</li>';
						}
						else{

							// Link menu
							$li_key = key($menu);
							$li_url = current($menu);
							echo '<li>'.$this->Html->link($li_key, $li_url, ['escape'=>false]).'</li>';
						}
					}
				}
			?>
			</ul>
		</div>

		<!-- Navbar Right Menu -->
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- Notifications: style can be found in dropdown.less -->
				<?php echo $this->element('notifications'); ?>
				<!-- Tasks: style can be found in dropdown.less -->
				<?php echo $this->element('tasks'); ?>
				<!-- User Account Menu -->
				<?php echo $this->element('menu_user-account'); ?>
			</ul>
		</div>

	</div>
</nav>