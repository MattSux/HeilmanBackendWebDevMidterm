		<?php
		$rows=get_info("types","type_name");

			// If there are no items, display a message
			if (empty($rows)) 
			{
				echo "No Types exist!";
			}

			// If there are items, display them in a drop down list
			else {
				echo "<form method='get'>";
				echo "<label for='filter_type'>Type:</label>";
				echo "<select name='filter_type' id='filter_type'>";
				foreach ($rows as $row) {
					echo "<option value=" . $row["type_id"] . ">" . $row["type_name"] . "</option>";
				}
				//echo "<option value=show_all selected='selected'>View All Categories</option>";
				echo "</select>";
				echo "<input type='hidden' name='hidden_sort_option' value='".$selectedSortOption."'>";
				echo "<input type='hidden' name='hidden_where_from' value='type_id'>";
				echo "<button type='submit'>Submit</button>";
				echo "</form>";
			}
		?>   