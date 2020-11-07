<?php
include('../Database/db_conn.php');
function generateNewPass($len = 10) {
   $token = "poiuztrewqasdfghjklmnbvcxy1234567890";
   $token = str_shuffle($token);
   $token = substr($token, 0, $len);
   $passhead = '!5Aa';
   $newpass = $passhead.$token;
   return $newpass;
}

if (isset($_GET['email']) && isset($_GET['token'])&& isset($_GET['questionone'])&& isset($_GET['questiontwo'])) {
   global $mysqli;
   $email = $mysqli->real_escape_string($_GET['email']);
   $questionone = $mysqli->real_escape_string($_GET['questionone']);
   $questiontwo = $mysqli->real_escape_string($_GET['questiontwo']);
   $token = $mysqli->real_escape_string($_GET['token']);

  
    $result=$mysqli->query("SELECT user_id FROM user WHERE email LIKE '$email' 
    AND question_one LIKE '$questionone' AND question_two LIKE '$questiontwo' 
    AND token='$token' AND token<>'' AND tokenExpire > NOW()");


   if ($result->num_rows > 0) {
      $newPassword = generateNewPass(6);
      $newPasswordEncrypted = crypt($newPassword, udw);
      $conn->query("UPDATE users SET token='', password = '$newPasswordEncrypted'
         WHERE email='$email'
      ");
 $mysqli->query("UPDATE user SET token='', 
 password = '$newPasswordEncrypted'
 WHERE email='$email' AND question_one LIKE '$questionone' AND question_two LIKE '$questiontwo'
");
      echo "Your New Password Is $newPassword<br><a href='index.php'>Click Here To Log In</a>";
   } else{
   header('Location:../index.php');
}} else {
   header('Location:../index.php');
}
?>
