<?php
////////////////////////////////////////////////////////////////////////
//function that displays the vehicle table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the item should be removed
    if (isset($_POST["remove_make"])) {
        // Get the item number from the form
        $makeID = $_POST["remove_make"];
        // Delete the item from the database
        
		delete_by_id("makes","make_id",$makeID);
    }
	
	if (isset($_POST["insert_make_name"])) {
        // Get the item number from the form
        $makeName = $_POST["insert_make_name"];
        add_make($makeName);
    }
}

$makes=get_all_makes();
// If there are no items, display a message
if (empty($makes)) {
    echo "No vehicles exist yet.";
}
// If there are items, display them in a table
		echo "<table align='center' style='border: 1px solid black;'>";
		echo "<tr><th style='border: 1px solid black;'>Make ID</th><th style='border: 1px solid black;'>Make Name</th><th style='border: 1px solid black;'>Remove</th></tr>";
		foreach ($makes as $make) {
			echo "<tr><td style='border: 1px solid black;'>" . $make["make_id"] . "</td><td style='border: 1px solid black;'>" . $make["make_name"] . "</td><td style='border: 1px solid black;'>";
			// Add a Remove button beside each item
			echo "<form method='post'><button type='submit' name='remove_make' value='" . $make["make_id"] . "' style='color: red;'>X</button></form>";
			echo "</td></tr>";
		}
		echo "</table>";
?>

<html>
<h2>Add Make Form</h2>
<form method="post" action="">
	<label for="insert_make_name">Make Name</label><br>
    <input type="text" name="insert_make_name" placeholder="Make Name - ex. 'Tesla'"><br>
  <button type="submit">Apply</button>
</form>

</html>