<?php
////////////////////////////////////////////////////////////////////////
//function that displays the vehicle table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the item should be removed
    if (isset($_POST["remove_class"])) {
        // Get the item number from the form
        $classID = $_POST["remove_class"];
        // Delete the item from the database
        
		delete_by_id("classes","class_id",$classID);
    }
	
	if (isset($_POST["insert_class_name"])) {
        // Get the item number from the form
        $className = $_POST["insert_class_name"];
        add_class($className);
    }
}

$classes=get_all_classes();
// If there are no items, display a message
if (empty($classes)) {
    echo "No vehicles exist yet.";
}
// If there are items, display them in a table
		echo "<table align='center' style='border: 1px solid black;'>";
		echo "<tr><th style='border: 1px solid black;'>class ID</th><th style='border: 1px solid black;'>class Name</th><th style='border: 1px solid black;'>Remove</th></tr>";
		foreach ($classes as $class) {
			echo "<tr><td style='border: 1px solid black;'>" . $class["class_id"] . "</td><td style='border: 1px solid black;'>" . $class["class_name"] . "</td><td style='border: 1px solid black;'>";
			// Add a Remove button beside each item
			echo "<form method='post'><button class='submit' name='remove_class' value='" . $class["class_id"] . "' style='color: red;'>X</button></form>";
			echo "</td></tr>";
		}
		echo "</table>";
?>

<html>
<h2>Add Class Form</h2>
<form method="post" action="">
	<label for="insert_class_name">Class Name</label><br>
    <input class="text" name="insert_class_name" placeholder="Class Name - ex. 'Luxury'"><br>
  <button class="submit">Apply</button>
</form>

</html>