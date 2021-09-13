
<!-- Show hide add new data box widget -->
<script>
	$('#myboxwidget').on('click', function(event) {
		event.preventDefault();
		var add_new = $('#add_new');
		if (add_new.hasClass('hide')) {
			add_new.prop('class', 'box-body show');
		}
		else if (add_new.hasClass('show')) {
			add_new.prop('class', 'box-body hide');
		};
	});;
</script>


<!-- Show hide add new data box widget -->
<script>
	$('#helo').on('click', function(event) {
		event.preventDefault();
		var add_new = $('#add_neww');
		if (add_new.hasClass('hide')) {
			add_new.prop('class', 'box-body show');
		}
		else if (add_new.hasClass('show')) {
			add_new.prop('class', 'box-body hide');
		};
	});;
</script>