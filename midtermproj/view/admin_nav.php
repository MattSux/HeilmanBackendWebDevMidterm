<html>
	<title>Show Div on Option Selection</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			$('select[name="options"]').change(function() {
				var optionVal = $(this).val();
				$('.option-div').hide();
				$('#'+optionVal).show();
			});
		});
	</script>
<body>
	<select name="options">
		<option value="">Select an Option</option>
		<option value="option1">Delete Vehicles</option>
		<option value="option2">Edit Makes</option>
		<option value="option3">Edit Types</option>
		<option value="option4">Edit Classes</option>
		<option value="option5">Add Vehicles</option>
	</select>
	<div id="option1" class="option-div" style="display:none;">
	<?php
	//display the vehicle table using row data
	require_once('../view/display_vehicles.php');

	//display the sorting/filter/reset view options
	require_once('../view/sort_filter_options.php');
	?>
	</div>
	<div id="option2" class="option-div" style="display:none;">
	<?php
	//display the vehicle table using row data
	require_once('../view/admin_edit_makes.php');
	?>
	</div>
	<div id="option3" class="option-div" style="display:none;">
	<?php
	//display the vehicle table using row data
	require_once('../view/admin_edit_types.php');
	?>
	</div>
	<div id="option4" class="option-div" style="display:none;">
	<?php
	//display the vehicle table using row data
	require_once('../view/admin_edit_classes.php');
	?>
	</div>
	<div id="option5" class="option-div" style="display:none;">
	<?php
	//display the vehicle table using row data
	require_once('../view/admin_add_vehicles.php');
	?>
	</div>
</body>
</html>