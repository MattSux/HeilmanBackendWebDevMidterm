<html>
<link rel="stylesheet" href="css/style.css">
<h1>Zippy's Used Autos</h1>
<?php

//collect the post/get data and set sorting option
include('view/initialize_php_methods.php');

//display the vehicle table using row data
include('view/display_vehicles.php');

//display the sorting/filter/reset view options
include('view/sort_filter_options.php');
?>
</html>