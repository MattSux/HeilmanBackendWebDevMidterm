<?php
function get_all_items()
{
	global $db;
	$query = "SELECT * FROM vehicles ORDER BY vehicle_price DESC";
	$query = $db->prepare($query);
	$query->execute();
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	return $rows;
}

function get_vehicles_by_sort_option_where($sort_option, $where_from, $where_what)
{
	global $db;
	$query = "SELECT * FROM vehicles where $where_from=$where_what ORDER BY $sort_option DESC";
	//$query = "SELECT * FROM vehicles where $where_from='$where_what' ORDER BY $sort_option";
	$query = $db->prepare($query);
	$query->execute();
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	return $rows;
}

function get_vehicles_by_sort_option($sort_option)
{
	global $db;
	$query = "SELECT * FROM vehicles ORDER BY $sort_option DESC";
	$query = $db->prepare($query);
	$query->execute();
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	return $rows;
}

function get_info($from, $by) {
	global $db;
	$query = "SELECT * FROM $from ORDER BY $by";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}

function get_id_value($id_select, $id_from, $id_where, $id_number){
	global $db;
	$query = "SELECT $id_select FROM `$id_from` WHERE $id_where=$id_number";
	$query = $db->prepare($query);
	$query->execute();
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	foreach ($rows as $row) {
	return $row[$id_select];}
}



function delete_vehicle($vehicle_id) {
	global $db;
    $query = "DELETE FROM vehicles WHERE vehicle_id = :vehicleID";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':vehicleID', $vehicle_id);
    $stmt->execute();
}

function delete_by_id($from, $where, $varID) {
	global $db;
    $query = "DELETE FROM $from WHERE $where = $varID";
    $stmt = $db->prepare($query);
    $stmt->execute();
}

function get_all_makes()
{
	global $db;
	$query = "SELECT * FROM makes ORDER BY make_name ASC";
	$query = $db->prepare($query);
	$query->execute();
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	return $rows;
}

function get_all_types()
{
	global $db;
	$query = "SELECT * FROM types ORDER BY type_name ASC";
	$query = $db->prepare($query);
	$query->execute();
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	return $rows;
}

function get_all_classes()
{
	global $db;
	$query = "SELECT * FROM classes ORDER BY class_name ASC";
	$query = $db->prepare($query);
	$query->execute();
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	return $rows;
}

function add_make ($make_name) {
	global $db;
	$query = "INSERT INTO makes
				(make_name)
				VALUES
				('$make_name')";
				$db->exec($query);
}

function add_type ($type_name) {
	global $db;
	$query = "INSERT INTO types
				(type_name)
				VALUES
				('$type_name')";
				$db->exec($query);
}

function add_class ($class_name) {
	global $db;
	$query = "INSERT INTO classes
				(class_name)
				VALUES
				('$class_name')";
				$db->exec($query);
}

function add_item ($vehicle_year,$vehicle_model,$vehicle_price,$vehicle_type,$vehicle_class,$vehicle_make) {
	global $db;
	$query = "INSERT INTO `vehicles`(`vehicle_year`, `vehicle_model`, `vehicle_price`, `type_id`, `class_id`, `make_id`) 
VALUES ('$vehicle_year','$vehicle_model','$vehicle_price','$vehicle_type','$vehicle_class','$vehicle_make')";
				$db->exec($query);
}
?>