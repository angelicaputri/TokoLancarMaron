<!-- Datepicker -->
<link rel="stylesheet" href="<?php echo base_url('assets/templates/adminlte-2-3-11/plugins/datepicker/datepicker3.css') ?>">
<script src="<?php echo base_url('assets/templates/adminlte-2-3-11/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
<script>
	$(document).ready(function() {
		$(".datepicker").datepicker({
			weekStart:1,
			autoclose:true,
			format:'yyyy-mm-dd',
			todayHighlight:true,
			todayBtn:'linked',
		});
	});
</script>