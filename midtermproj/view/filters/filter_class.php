		<?php
$rows=get_info("classes","class_name");

			// If there are no items, display a message
			if (empty($rows)) 
			{
				echo "No Classes exist!";
			}

			// If there are items, display them in a drop down list
			else {
				echo "<form method='get'>";
				echo "<label for='filter_class'>Class:</label>";
				echo "<select name='filter_class' id='filter_class'>";
				foreach ($rows as $row) {
					echo "<option value=" . $row["class_id"] . ">" . $row["class_name"] . "</option>";
				}
				//echo "<option value=show_all selected='selected'>View All Categories</option>";
				echo "</select>";
				echo "<input type='hidden' name='hidden_sort_option' value='".$selectedSortOption."'>";
				echo "<input type='hidden' name='hidden_where_from' value='class_id'>";
				echo "<button type='submit'>Submit</button>";
				echo "</form>";
			}
		?>   