<?php use Cake\I18n\Time; ?>
<footer class="main-footer text-muted">
    <div class="pull-right hidden-xs">
        Versão <strong>1.0</strong>
    </div>
	<?php $now = Time::now(); ?>
    &copy; 2019/<?= $now->year ?> - Desenvolvido por
    <strong>
    	<a href="http://www.completta.net/marketing" target="_blank" class="text-muted">Completta Marketing</a>
    </strong>
</footer>