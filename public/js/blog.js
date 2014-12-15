$('a.toggle').on('click', function() {
	var child = $(this).parent().children('.hide');
	if (child.is(':hidden')) {
		child.show();
	} else {
		child.hide();
	}
});