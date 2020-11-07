<?php
include('../Database/db_conn.php');
require_once('../Session & Logout/session.php');//makes sure a session is created

if(isset($_POST['allocatesubmit'])){
   $studentid = $_SESSION['userID'];
   $unitcode = $_POST['unitcode'];
   $unitname = $_POST['unitname'];
   $tutorialid = $_POST['tutorialid'];
   $tutorialtime = $_POST['tutorialtime'];
   $capacity = $_POST['capacity'];
   $check_capacity =  $mysqli->query("SELECT * FROM tutorialallocation WHERE 
 tutorial_id LIKE '%".$tutorialid."%'");
 $check_alreadyenrolled =  $mysqli->query("SELECT * FROM tutorialallocation WHERE 
 student_id LIKE '%".$studentid."%' AND
 tutorial_id LIKE '%".$tutorialid."%'");
 $result_cnt = $check_capacity->num_rows;
 $result_cnt1 = $check_alreadyenrolled->num_rows;
 if ($result_cnt < $capacity && $result_cnt1 == 0 ) {
   $query = "
 INSERT INTO tutorialallocation(student_id, tutorial_id, unit_code,unit_name,tutorial_time)  
  VALUES('$studentid', '$tutorialid','$unitcode','$unitname','$tutorialtime')";
  $mysqli->query($query);
  header('Location:index.php?action=allocationsuccess');
}
else if ($result_cnt >= $capacity){
   header('Location:index.php?action=noroom');
}
else if ($result_cnt1 == 1){
   header('index.php?action=alreadyenrolled');
}
}
?>