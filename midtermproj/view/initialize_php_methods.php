<?php
////////////////////////////////////////////////////////////////////////
if (file_exists('model/database.php'))
		{
			require('model/database.php');
			require('model/functions.php');
		}
else
		{
			require('../model/database.php');
			require_once('../model/functions.php');
		}

$rows=get_all_items();
//if post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//If a sort_option is selected, organize by that sort_option
    if (isset($_POST["sort_option"])) {
		if (isset($_POST["sort_option"])&&isset($_POST["hidden_where_from"])&&isset($_POST["hidden_where_what"]))
		{
			//if all the fields are filled then organize using fields
			$rows=get_vehicles_by_sort_option_where($_POST["sort_option"], $_POST["hidden_where_from"], $_POST["hidden_where_what"]);
		}
		else
		{
			//else display all results sorted by the selected sort option
			$rows=get_vehicles_by_sort_option($_POST["sort_option"]);
		}
	}
	else{
	//if sort_option is not set then show all items sorted by price high->low
	$rows=get_all_items();
	}
}
//if get
else if ($_SERVER["REQUEST_METHOD"] == "GET") {
	//if the make filter is on then only show vehicles by make
	if (isset($_GET["filter_make"])) {
	$rows = get_vehicles_by_sort_option_where($_GET["hidden_sort_option"], "make_id", $_GET["filter_make"]);
	}
	//if the type filter is on then only show vehicles by type
	if (isset($_GET["filter_type"])) {
	$rows = get_vehicles_by_sort_option_where($_GET["hidden_sort_option"], "type_id", $_GET["filter_type"]);
	}
	//if the class filter is on then only show vehicles by class
	if (isset($_GET["filter_class"])) {
	$rows = get_vehicles_by_sort_option_where($_GET["hidden_sort_option"], "class_id", $_GET["filter_class"]);
	}
}

//Function for setting sort options

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the selected sort_option from the POST data
  if (isset($_POST['sort_option'])) {
	$selectedSortOption = $_POST['sort_option'];
  }
  else{
  $selectedSortOption = 'vehicle_price';
  }
} 
else {
  // Set the default value of the text field
  $selectedSortOption = 'vehicle_price';
}
?>