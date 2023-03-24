<html>
<!-- Show sort by options -->
<form method="post" action="">
  <h2>Sort By:</h2>
  <label>
    <input type="radio" name="sort_option" value="vehicle_price" <?php if ($selectedSortOption == 'vehicle_price') echo 'checked'; ?>>
    Price
  </label>
  <label>
    <input type="radio" name="sort_option" value="vehicle_year" <?php if ($selectedSortOption == 'vehicle_year') echo 'checked'; ?>>
    Year
  </label>
  <button type="submit">Apply</button>
  <?php
  if (isset($_GET["filter_make"])) {
  echo "<input type='hidden' name='hidden_where_what' value='".$_GET["filter_make"]."'>";
  }
  else if (isset($_GET["filter_type"])) {
  echo "<input type='hidden' name='hidden_where_what' value='".$_GET["filter_type"]."'>";
  }
  else if (isset($_GET["filter_class"])) {
  echo "<input type='hidden' name='hidden_where_what' value='".$_GET["filter_class"]."'>";
  }
  else if (isset($_GET["hidden_where_from"])) {
  echo "<input type='hidden' name='hidden_where_from' value='".$_GET["hidden_where_from"]."'>";
  }
  ?>
  
</form>

<!-- Show filter by options -->
<?php
	if (file_exists('model/database.php'))
	{
?>
    <h2>Filter By:</h2>
    <select id="selectFilter">
      <option value="">--Please choose an option--</option>
      <option value="option1">Make</option>
      <option value="option2">Type</option>
      <option value="option3">Class</option>
    </select>
<?php
	}
?>
    <div id="filter_make-container" class="hidden">
		<?php
		if (file_exists('view/filters/filter_make.php'))
		{
			include('view/filters/filter_make.php');
		}
		else
		{
			include('../view/filters/filter_make.php');
		}
		?>    
	</div>

    <div id="filter_type-container" class="hidden">
		<?php
		if (file_exists('view/filters/filter_type.php'))
		{
			include('view/filters/filter_type.php');
		}
		else
		{
			include('../view/filters/filter_type.php');
		}
		?>   
    </div>

    <div id="filter_class-container" class="hidden">
		<?php
		if (file_exists('view/filters/filter_class.php'))
		{
			include('view/filters/filter_class.php');
		}
		else
		{
			include('../view/filters/filter_class.php');
		}
		?>   
    </div>
	<h2>Reset View</h2>
	<?php
		echo "<form method='get'>";
					echo "<button name='refresh_page' id='refresh_page' type='submit'>Reset View</button>";
					echo "<input type='hidden' name='hidden_where_from' value='make_id'>";
					echo "</form>";
	?>
    <script>
      const selectFilter = document.getElementById("selectFilter");
      const select2Container = document.getElementById("filter_make-container");
      const select3Container = document.getElementById("filter_type-container");
      const select4Container = document.getElementById("filter_class-container");

      selectFilter.addEventListener("change", () => {
        if (selectFilter.value === "option1") {
          select2Container.classList.remove("hidden");
          select3Container.classList.add("hidden");
          select4Container.classList.add("hidden");
        } else if (selectFilter.value === "option2") {
          select2Container.classList.add("hidden");
          select3Container.classList.remove("hidden");
          select4Container.classList.add("hidden");
        } else if (selectFilter.value === "option3") {
          select2Container.classList.add("hidden");
          select3Container.classList.add("hidden");
          select4Container.classList.remove("hidden");
        } else {
          select2Container.classList.add("hidden");
          select3Container.classList.add("hidden");
          select4Container.classList.add("hidden");
        }
      });
    </script>
</html>