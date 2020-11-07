<?php
include('../Database/db_conn.php');
require_once('../Session & Logout/session.php');//makes sure a session is created

if(isset($_POST['enrolsubmit']) && $_POST['prerequisite'] != ''){
   $studentid = $_SESSION['userID'];
   $unitcode = $_POST['unitcode'];
   $prerequisite = $_POST['prerequisite'];
   $check_prerequisite =  $mysqli->query("SELECT * FROM enrollment WHERE 
 student_id LIKE '%".$studentid."%' AND
 unit_code LIKE '%".$prerequisite."%'");
 $check_alreadyenrolled =  $mysqli->query("SELECT * FROM enrollment WHERE 
 student_id LIKE '%".$studentid."%' AND
 unit_code LIKE '%".$unitcode."%'");
 $result_cnt = $check_prerequisite->num_rows;
 $result_cnt1 = $check_alreadyenrolled->num_rows;
 if ($result_cnt!=0 && $result_cnt1 == 0 ) {
   $query = "
 INSERT INTO enrollment(student_id, unit_code)  
  VALUES('$studentid', '$unitcode')";
  $mysqli->query($query);
  header('Location:index.php?action=enrollmentsuccess');
}
else if ($result_cnt == 0){
   header('Location:index.php?action=prereqerror');
}
else if ($result_cnt1 == 1){
   header('Location:index.php?action=alreadyenrolled');
}
}

else if(isset($_POST['enrolsubmit']) && $_POST['prerequisite'] == ''){
   $studentid = $_SESSION['userID'];
   $unitcode = $_POST['unitcode'];
 
 $check_alreadyenrolled =  $mysqli->query("SELECT * FROM enrollment WHERE 
 student_id LIKE '%".$studentid."%' AND
 unit_code LIKE '%".$unitcode."%'");
 
 $result_cnt1 = $check_alreadyenrolled->num_rows;
 if ($result_cnt1 == 0 ) {
   $query = "
 INSERT INTO enrollment(student_id, unit_code)  
  VALUES('$studentid', '$unitcode')";
  $mysqli->query($query);
  header('Location:index.php?action=enrollmentsuccess');
}
else if ($result_cnt1 == 1){
   header('Location:index.php?action=alreadyenrolled');
}
}
?>