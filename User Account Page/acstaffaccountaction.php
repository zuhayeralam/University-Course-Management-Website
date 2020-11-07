<?php  
//action.php
include('../Database/db_conn.php');
global $mysqli;
$input = filter_input_array(INPUT_POST);

$name = $mysqli->real_escape_string($input["name"]);
$email = $mysqli->real_escape_string($input["email"]);
$qualification = $mysqli->real_escape_string($input["qualification"]);
$expertise = $mysqli->real_escape_string($input["expertise"]);
$phonenumber = $mysqli->real_escape_string($input["phone_number"]);
$availability = $mysqli->real_escape_string($input["availability"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE academicstaffs 
 SET name = '".$name."', 
 email = '".$email."',
 qualification = '".$qualification."', 
 expertise = '".$expertise."', 
 availability = '".$availability."', 
 phone_number = '".$phonenumber."' 
 WHERE staff_id = '".$input["staff_id"]."'
 ";
 $query1 = "
 UPDATE stafflist 
 SET name = '".$name."' 
 WHERE staff_id = '".$input["staff_id"]."'
 ";

 $mysqli->query($query);
 $mysqli->query($query1);
}
echo json_encode($input);

?>