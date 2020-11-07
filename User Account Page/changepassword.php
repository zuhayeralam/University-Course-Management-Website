<?php
include('../Database/db_conn.php');

require_once('../Session & Logout/session.php');

if(isset($_POST['studentchangepasswordsubmit'])){
   global $mysqli;
   $oldpassword = crypt($_POST['oldpassword'], udw);
   $newpassword = crypt($_POST['newpassword'], udw);
   $userID = $_SESSION['userID'];
   
   $result=$mysqli->query("SELECT password FROM students WHERE student_id = $userID AND password LIKE '".$oldpassword."'");

   $result_cnt = $result->num_rows;
   if ($result_cnt == 1) {
      $query = "
      UPDATE students 
      SET password = '".$newpassword."'
      WHERE student_id = $userID
      ";
      $query1 = "
      UPDATE user 
      SET password = '".$newpassword."'
      WHERE user_id = $userID
      ";
 $mysqli->query($query);
 $mysqli->query($query1);
 header('Location:studentaccount.php?action=changepasswordsuccess');
   }
   else{
      header('Location:studentaccount.php?action=changepassworderror');
      
   }
}

if(isset($_POST['acstaffchangepasswordsubmit'])){
   global $mysqli;
   $oldpassword = crypt($_POST['oldpassword'], udw);
   $newpassword = crypt($_POST['newpassword'], udw);
   $userID = $_SESSION['userID'];
   
   $result=$mysqli->query("SELECT password FROM academicstaffs WHERE staff_id = $userID AND password LIKE '".$oldpassword."'");

   $result_cnt = $result->num_rows;
   if ($result_cnt == 1) {
      $query = "
      UPDATE academicstaffs 
      SET password = '".$newpassword."'
      WHERE staff_id = $userID
      ";
      $query1 = "
      UPDATE user 
      SET password = '".$newpassword."'
      WHERE user_id = $userID
      ";
 $mysqli->query($query);
 $mysqli->query($query1);
 header('Location:acstaffaccount.php?action=changepasswordsuccess');
   }
   else{
      header('Location:acstaffaccount.php?action=changepassworderror');
      
   }
}
?>