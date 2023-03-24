<?php
////////////////////////////////////////////////////////////////////////
//function that displays the vehicle table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the item should be removed
    if (isset($_POST["remove_type"])) {
        // Get the item number from the form
        $typeID = $_POST["remove_type"];
        // Delete the item from the database
        
		delete_by_id("types","type_id",$typeID);
    }
	
	if (isset($_POST["insert_type_name"])) {
        // Get the item number from the form
        $typeName = $_POST["insert_type_name"];
        add_type($typeName);
    }
}

$types=get_all_types();
// If there are no items, display a message
if (empty($types)) {
    echo "No vehicles exist yet.";
}
// If there are items, display them in a table
		echo "<table align='center' style='border: 1px solid black;'>";
		echo "<tr><th style='border: 1px solid black;'>type ID</th><th style='border: 1px solid black;'>type Name</th><th style='border: 1px solid black;'>Remove</th></tr>";
		foreach ($types as $type) {
			echo "<tr><td style='border: 1px solid black;'>" . $type["type_id"] . "</td><td style='border: 1px solid black;'>" . $type["type_name"] . "</td><td style='border: 1px solid black;'>";
			// Add a Remove button beside each item
			echo "<form method='post'><button type='submit' name='remove_type' value='" . $type["type_id"] . "' style='color: red;'>X</button></form>";
			echo "</td></tr>";
		}
		echo "</table>";
?>

<html>
<h2>Add Type Form</h2>
<form method="post" action="">
	<label for="insert_type_name">Type Name</label><br>
    <input type="text" name="insert_type_name" placeholder="type Name - ex. 'Sedan'"><br>
  <button type="submit">Apply</button>
</form>

</html>