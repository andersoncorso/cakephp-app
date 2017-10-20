<?php use Cake\I18n\Time; ?>
<footer class="main-footer text-muted">
    <div class="pull-right hidden-xs">
        Versão <strong>1.0</strong>
    </div>
	<?php $now = Time::now(); ?>
    &copy; 2017/<?= $now->year ?> - Desenvolvido por
    <strong>
    	<a href="http://www.royalbranding.com.br" target="_blank" class="text-muted">Royal Branding</a>
    </strong>
</footer>