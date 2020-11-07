<?php  
//action.php
include('../Database/db_conn.php');
global $mysqli;
$input = filter_input_array(INPUT_POST);

if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM tutorialallocation
 WHERE id = '".$input["id"]."'
 ";
 $mysqli->query($query);
}

echo json_encode($input);

?>