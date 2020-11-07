<?php  
//action.php
include('../Database/db_conn.php');
global $mysqli;
$input = filter_input_array(INPUT_POST);

 $tutorid = $mysqli->real_escape_string($input["tutor_id"]);
$tutorname = $mysqli->real_escape_string($input["tutor_name"]);


if($input["action"] === 'edit')
{
   $check_staff_query =$mysqli->query("SELECT * FROM stafflist WHERE 
    staff_id = $tutorid AND
    name LIKE '%".$tutorname."%'");
    $result_cnt1 = $check_staff_query->num_rows;
    if ($result_cnt1!=0) {
 $query = "
 UPDATE tutorial 
 SET tutor_id = '".$tutorid."', 
 tutor_name = '".$tutorname."'
 WHERE tutorial_id = '".$input["id"]."'
 ";

 $mysqli->query($query);
    }
else if($tutorid =='' && $tutorname==''){
   $query = "
   UPDATE tutorial 
   SET tutor_id = '', 
   tutor_name = ''
   WHERE tutorial_id = '".$input["id"]."'
   ";
  
   $mysqli->query($query);
}

    else{
      return false;
    }

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM tutorial 
 WHERE tutorial_id = '".$input["id"]."'
 ";
 $mysqli->query($query);
}

echo json_encode($input);

?>