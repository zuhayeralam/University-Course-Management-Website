<?php  
//action.php
include('../Database/db_conn.php');
global $mysqli;
$input = filter_input_array(INPUT_POST);

$name = $mysqli->real_escape_string($input["name"]);
$email = $mysqli->real_escape_string($input["email"]);
$address = $mysqli->real_escape_string($input["address"]);
$dateofbirth = $mysqli->real_escape_string($input["dob"]);
$phonenumber = $mysqli->real_escape_string($input["phone_number"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE students 
 SET name = '".$name."', 
 email = '".$email."',
 address = '".$address."', 
 phone_number = '".$phonenumber."', 
 dob = '".$dateofbirth."' 
 WHERE student_id = '".$input["student_id"]."'
 ";

 $mysqli->query($query);

}
echo json_encode($input);

?>