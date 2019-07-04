$(document).ready(function(){
	
	// Active current item menu
	$(".navbar .menu").slimscroll({
		height: "200px",
		alwaysVisible: false,
		size: "3px"
	}).css("width", "100%");

	var a = $('a[href="<?php echo $this->request->getAttribute("webroot") . $this->request->getPath() ?>"]');
	if (!a.parent().hasClass('treeview') && !a.parent().parent().hasClass('pagination')) {
		a.parent().addClass('active').parents('.treeview').addClass('active');
	}

	// Loading Button
	$('form').on('submit', function(e) {
		var btn = $('#loadButton').button('loading')
	});
	
});