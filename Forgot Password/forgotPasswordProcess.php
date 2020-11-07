<?php
include('../Database/db_conn.php');
use PHPMailer\PHPMailer\PHPMailer;


   function generateNewString($len = 10) {
		$token = "poiuztrewqasdfghjklmnbvcxy1234567890";
		$token = str_shuffle($token);
		$token = substr($token, 0, $len);

		return $token;
	}



if (isset($_POST['resetsubmit'])) {
   require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
   global $mysqli;

        $email = $mysqli->real_escape_string($_POST['email']);
        $questionone = $mysqli->real_escape_string($_POST['questionone']);
        $questiontwo = $mysqli->real_escape_string($_POST['questiontwo']);
        $result=$mysqli->query("SELECT user_id FROM user WHERE email LIKE '$email' 
        AND question_one LIKE '$questionone' AND question_two LIKE '$questiontwo'");

        if ($result->num_rows > 0) {

            $token = generateNewString();

            $mysqli->query("UPDATE user SET token='$token', 
                      token_expire=DATE_ADD(NOW(), INTERVAL 5 MINUTE)
                      WHERE email='$email' AND question_one LIKE '$questionone' AND question_two LIKE '$questiontwo'
            ");
            $body = "
          Hi,<br><br>
	            
 	            In order to reset your password, please click on the link below:<br>
 	            <a href='
 	            http://domain.com/Forgot Password/resetPassword.php?email=$email&token=$token&questionone=$questionone&questiontwo=$questiontwo
 	            '>http://domain.com/Forgot Password/resetPassword.php?email=$email&token=$token&questionone=$questionone&questiontwo=$questiontwo</a><br><br>
	            
 	            Kind Regards,<br>
 	            UDW Course Management Team
        ";
        $subject= "Reset password.";
  $mail = new PHPMailer();

  //SMTP Settings
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "YOUR-EMAIL-ADDRESS";
  $mail->Password = 'YOUR-PASSWORD';
  $mail->Port = 465; //587
  $mail->SMTPSecure = "ssl"; //tls

  //Email Settings
  $mail->isHTML(true);
  $mail->setFrom('', '');
  $mail->addAddress("YOUR-EMAIL-ADDRESS");
  $mail->Subject = $subject;
  $mail->Body = $body;
  if ($mail->send()) {
   header('Location:index.php?action=emailsent');
} else {
   echo"failed to send email.";
}
    }
    else{
      header('Location:index.php?action=checkinput');
    }
   }
   ?>