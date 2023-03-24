<?php
////////////////////////////////////////////////////////////////////////
//function that displays the vehicle table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the item should be removed
    if (isset($_POST["remove"])) {
        // Get the item number from the form
        $vehicleNum = $_POST["remove"];
        // Delete the item from the database
        delete_vehicle($vehicleNum);
		
		//delete_item($itemNum)
        // Redirect back to the index page
        header("Location: index.php");
        exit();
    }
}
// If there are no items, display a message
if (empty($rows)) {
    echo "No vehicles exist yet.";
}
// If there are items, display them in a table

//if customer page
if (file_exists('model/database.php'))
		{
		echo "<table align='center' style='border: 1px solid black;'>";
		echo "<tr><th style='border: 1px solid black;'>Vehicle ID</th><th style='border: 1px solid black;'>Year</th><th style='border: 1px solid black;'>Model</th><th style='border: 1px solid black;'>Price</th><th style='border: 1px solid black;'>Type</th><th style='border: 1px solid black;'>Class</th><th style='border: 1px solid black;'>Make</th></tr>";
		foreach ($rows as $row) {
			echo "<tr><td style='border: 1px solid black;'>" . $row["vehicle_id"] . "</td><td style='border: 1px solid black;'>" . $row["vehicle_year"] . "</td><td style='border: 1px solid black;'>" . $row["vehicle_model"] . "</td><td style='border: 1px solid black;'>" . $row["vehicle_price"] . "</td><td style='border: 1px solid black;'>" . get_id_value("type_name", "types", "type_id", $row["type_id"]) . "</td><td style='border: 1px solid black;'>" . get_id_value("class_name", "classes", "class_id", $row["class_id"]) . "</td><td style='border: 1px solid black;'>" . get_id_value("make_name", "makes", "make_id", $row["make_id"]) . "</td>";																																																																																	
			echo "</td></tr>";
		}
		echo "</table>";
		}
//if admin page
else
		{
		echo "<table align='center' style='border: 1px solid black;'>";
		echo "<tr><th style='border: 1px solid black;'>Vehicle ID</th><th style='border: 1px solid black;'>Year</th><th style='border: 1px solid black;'>Model</th><th style='border: 1px solid black;'>Price</th><th style='border: 1px solid black;'>Type</th><th style='border: 1px solid black;'>Class</th><th style='border: 1px solid black;'>Make</th><th style='border: 1px solid black;'>Remove</th></tr>";
		foreach ($rows as $row) {
			echo "<tr><td style='border: 1px solid black;'>" . $row["vehicle_id"] . "</td><td style='border: 1px solid black;'>" . $row["vehicle_year"] . "</td><td style='border: 1px solid black;'>" . $row["vehicle_model"] . "</td><td style='border: 1px solid black;'>" . $row["vehicle_price"] . "</td><td style='border: 1px solid black;'>" . get_id_value("type_name", "types", "type_id", $row["type_id"]) . "</td><td style='border: 1px solid black;'>" . get_id_value("class_name", "classes", "class_id", $row["class_id"]) . "</td><td style='border: 1px solid black;'>" . get_id_value("make_name", "makes", "make_id", $row["make_id"]) . "</td><td style='border: 1px solid black;'>";
			// Add a Remove button beside each item
			echo "<form method='post'><button type='submit' name='remove' value='" . $row["vehicle_id"] . "' style='color: red;'>X</button></form>";
			echo "</td></tr>";
		}
		echo "</table>";
		}










////////////////////////////////////////////////////////////////////////
?>