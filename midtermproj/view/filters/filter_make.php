<?php
		$rows=get_info("makes","make_name");

			// If there are no items, display a message
			if (empty($rows)) 
			{
				echo "No makes exist!";
			}

			// If there are items, display them in a drop down list
			else {
				echo "<form method='get'>";
				echo "<label for='filter_make'>Make:</label>";
				echo "<select name='filter_make' id='filter_make'>";
				foreach ($rows as $row) {
					echo "<option value=" . $row["make_id"] . ">" . $row["make_name"] . "</option>";
				}
				//echo "<option value=show_all selected='selected'>View All Categories</option>";
				echo "</select>";
				echo "<input type='hidden' name='hidden_sort_option' value='".$selectedSortOption."'>";
				echo "<input type='hidden' name='hidden_where_from' value='make_id'>";
				echo "<button type='submit'>Submit</button>";
				
				echo "</form>";
			}
		?>    