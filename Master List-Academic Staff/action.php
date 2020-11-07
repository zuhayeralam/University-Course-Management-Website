<?php
include('../Database/db_conn.php');
global $mysqli;
$input = filter_input_array(INPUT_POST);

if ($input["action"] === 'delete') {
    $query = "
 DELETE FROM  stafflist
 WHERE staff_id = '" . $input["staff_id"] . "'
 ";
    $mysqli->query($query);
}

echo json_encode($input);
$mysqli->close();
?>
