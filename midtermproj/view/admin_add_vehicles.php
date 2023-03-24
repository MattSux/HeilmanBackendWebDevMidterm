<?php
////////////////////////////////////////////////////////////////////////
//function that displays the vehicle table
include('../view/initialize_php_methods.php');
include('../view/display_vehicles.php');

if ((isset($_POST["add_make"])) && (isset($_POST["add_type"])) && (isset($_POST["add_class"]))&& (isset($_POST["add_year"]))&& (isset($_POST["add_model"]))&& (isset($_POST["add_price"]))) {
	  if ((($_POST["add_year"]) <= date("Y")+1) && (($_POST["add_year"]) >= 1900))
	  {
		  echo "VALID DATE";
		  add_item($_POST["add_year"],$_POST["add_model"],$_POST["add_price"],$_POST["add_type"],$_POST["add_class"],$_POST["add_make"]);
	  }
	  else { echo "INVALID DATE";}
}
else
{
	
}
?>
<br>
<form method='post'>
<label for='add_year'>Year:</label>
<input type="number" id="add_year" name="add_year" required>
<label for='add_model'>Model:</label>
<input type="text" id="add_model" name="add_model" required>
<label for='add_price'>Price:</label>
<input type="number" id="add_price" name="add_price" required>
<?php
//TYPE
		$rows=get_info("types","type_name");

			// If there are no items, display a message
			if (empty($rows)) 
			{
				echo "No Types exist!";
			}

			// If there are items, display them in a drop down list
			else {
				echo "<label for='add_type'>Type:</label>";
				echo "<select name='add_type' id='add_type' required>";
				foreach ($rows as $row) {
					echo "<option value=" . $row["type_id"] . ">" . $row["type_name"] . "</option>";
				}
				//echo "<option value=show_all selected='selected'>View All Categories</option>";
				echo "</select>";
			}			
			
			
//CLASS	
$rows=get_info("classes","class_name");

			// If there are no items, display a message
			if (empty($rows)) 
			{
				echo "No Classes exist!";
			}

			// If there are items, display them in a drop down list
			else {
				echo "<label for='add_class'>Class:</label>";
				echo "<select name='add_class' id='add_class' required>";
				foreach ($rows as $row) {
					echo "<option value=" . $row["class_id"] . ">" . $row["class_name"] . "</option>";
				}
				//echo "<option value=show_all selected='selected'>View All Categories</option>";
				echo "</select>";
			}

//MAKES
		$rows=get_info("makes","make_name");

			// If there are no items, display a message
			if (empty($rows)) 
			{
				echo "No makes exist!";
			}

			
			// If there are items, display them in a drop down list
			else {
				echo "<label for='add_make'>Make:</label>";
				echo "<select name='add_make' id='add_make' required>";
				foreach ($rows as $row) {
					echo "<option value=" . $row["make_id"] . ">" . $row["make_name"] . "</option>";
				}
				//echo "<option value=show_all selected='selected'>View All Categories</option>";
				echo "</select>";
			}

?>
<html>
<button type='submit'>Submit</button>
</form>
</html>