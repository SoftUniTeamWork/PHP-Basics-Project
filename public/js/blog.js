$('a.toggleButton').on('click', function() {
	var child = $(this).parent().children('.commentBoxToggled');
	child.toggle();
});