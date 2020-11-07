<?php
//action.php
include('../Database/db_conn.php');
global $mysqli;
$input = filter_input_array(INPUT_POST);

$unit_name   = $mysqli->real_escape_string($input["unit_name"]);
$description = $mysqli->real_escape_string($input["description"]);
$campus      = $mysqli->real_escape_string($input["campus"]);
$semester    = $mysqli->real_escape_string($input["semester"]);

if ($input["action"] === 'edit') {
    $query = "
 UPDATE unitdetail 
 SET campus = '" . $campus . "', 
 unit_name = '" . $unit_name . "',
 description = '" . $description . "', 
 semester = '" . $semester . "' 
 WHERE id = '" . $input["id"] . "'
 ";
    
    $mysqli->query($query);
    
}
if ($input["action"] === 'delete') {
    $query = "
 DELETE FROM unitdetail 
 WHERE id = '" . $input["id"] . "'
 ";
    $mysqli->query($query);
}

echo json_encode($input);

$mysqli->close();
?>