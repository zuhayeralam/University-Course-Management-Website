<?php
include('../Database/db_conn.php');

if (isset($_POST['setucsubmit'])) {
   global $mysqli;
   $unitcode      = $mysqli->real_escape_string($_POST['unitcode']);
   $staffID      = $mysqli->real_escape_string($_POST['staffid']);
   $staffName      = $mysqli->real_escape_string($_POST['staffname']);
   //checks if staff is made available by DC
   $checkOne      = $mysqli->query("SELECT * FROM stafflist WHERE staff_id =$staffID AND name LIKE '%".$staffName."%'");
   $checkTwo      = $mysqli->query("SELECT * FROM unitdetail WHERE unit_code ='".$unitcode."'");

   if ($checkOne->num_rows == 1 && $checkTwo->num_rows == 1) {

      $query = "
      UPDATE unitdetail 
      SET UC_id = '".$staffID."', 
      unit_coordinator = '".$staffName."'
      WHERE unit_code = '".$unitcode."'
      ";
      $query2 = "
      UPDATE user
      SET role = 3 
      WHERE user_id = '".$staffID."' 
      ";
      $mysqli->query($query);
      $mysqli->query($query2);
      header('Location:index.php?action=successinsertuclec');
    } else {
      header('Location:index.php?action=failinsertuclec');
    }
}

if (isset($_POST['setlecsubmit'])) {
    
   global $mysqli;
   $unitcode      = $mysqli->real_escape_string($_POST['unitcode']);
   $staffID      = $mysqli->real_escape_string($_POST['staffid']);
   $staffName      = $mysqli->real_escape_string($_POST['staffname']);
   //checks if staff is made available by DC
   $checkOne      = $mysqli->query("SELECT * FROM stafflist WHERE staff_id =$staffID AND name LIKE '%".$staffName."%'");
   $checkTwo      = $mysqli->query("SELECT * FROM unitdetail WHERE unit_code ='".$unitcode."'");

   if ($checkOne->num_rows == 1 && $checkTwo->num_rows == 1) {

     $query = "
     UPDATE unitdetail 
     SET lecturer_id = '".$staffID."', 
     lecturer = '".$staffName."'
     WHERE unit_code = '".$unitcode."'
     ";
    
     $mysqli->query($query);
     header('Location:index.php?action=successinsertuclec');
   } else { 
       header('Location:index.php?action=failinsertuclec');
   }
}
if (isset($_POST['setlectimesubmit'])) {
    
   global $mysqli;
   $unitcode      = $mysqli->real_escape_string($_POST['unitcode']);
   $lectureday = $mysqli->real_escape_string($_POST["lectureday"]);  
   $lecturetime = $mysqli->real_escape_string($_POST["lecturetime"]);  
   $concat_time = $lectureday.' '.$lecturetime;
   $checkTwo      = $mysqli->query("SELECT * FROM unitdetail WHERE unit_code ='".$unitcode."'");

   if ($checkTwo->num_rows != 0) {

     $query = "
     UPDATE unitdetail 
     SET lecture_time= '".$concat_time."'
     WHERE unit_code = '".$unitcode."'
     ";
    
     $mysqli->query($query);
     header('Location:index.php?action=successinsertuclec');
   } else { 
       header('Location:index.php?action=failinsertuclec');
   }
}

$mysqli->close();
?> 