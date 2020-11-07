<?php
include('../Database/db_conn.php');

if (isset($_POST['loginsubmit'])) {
    global $mysqli;
    $userID      = $mysqli->real_escape_string($_POST['userID']);
    $password    = crypt($_POST['password'], udw);
    $result      = $mysqli->query("SELECT user_id,role FROM user WHERE user_id LIKE '$userID' AND password LIKE '$password'");
    $result_rows = $result->fetch_assoc();
    $result_cnt  = $result->num_rows;
    if ($result_cnt == 1) {
        session_start();
        $_SESSION['userID'] = $result_rows['user_id'];
        //setting role for access management
        $_SESSION['role']   = $result_rows['role'];
        header('Location:../Homepage/index.php');
    } else {
        header('Location:../index.php?action=loginerror');
    }
}

if (isset($_POST['studentsubmit'])) {
    //checking if id already exists
    $studentID  = $mysqli->real_escape_string($_POST["studentID"]);
    $result     = $mysqli->query("SELECT user_id FROM user WHERE user_id LIKE '$studentID'");
    $result_cnt = $result->num_rows;
    if ($result_cnt != 0) {
        header('Location:registration.php?action=idexists');
    } else {
        $studentID   = $mysqli->real_escape_string($_POST['studentID']);
        $name        = $mysqli->real_escape_string($_POST['name']);
        $email       = $mysqli->real_escape_string($_POST['email']);
        $password    = crypt($_POST['password'], udw); //encryption for secure password storage
        $address     = $mysqli->real_escape_string($_POST['address']);
        $dateofbirth = $mysqli->real_escape_string($_POST['dateofbirth']);
        $phonenumber = $mysqli->real_escape_string($_POST['phonenumber']);
        $questionone = $mysqli->real_escape_string($_POST['questionone']);
        $questiontwo = $mysqli->real_escape_string($_POST['questiontwo']);
        //inserting form information in database
        $query       = "INSERT INTO students(student_id,name,email,password,address,dob,phone_number) VALUES ('$studentID','$name','$email','$password','$address','$dateofbirth','$phonenumber')";
        $result      = $mysqli->query($query);
        //inserting into a user table which is used for authentication and session (access) management
        $query1      = "INSERT INTO user(user_id,email,password,question_one,question_two,role) VALUES ('$studentID','$email', '$password','$questionone','$questiontwo', '5')";
        $result1     = $mysqli->query($query1);
        header('Location:../index.php?action=success');
    }
}

if (isset($_POST['acstaffsubmit'])) {
    //checking if id already exists
    $staffID    = $mysqli->real_escape_string($_POST["staffID"]);
    $result     = $mysqli->query("SELECT user_id FROM user WHERE user_id LIKE '$staffID'");
    $result_cnt = $result->num_rows;
    if ($result_cnt != 0) {
        header('Location:registration.php?action=idexists');
    } else {
        $staffID       = $mysqli->real_escape_string($_POST['staffID']);
        $name          = $mysqli->real_escape_string($_POST['name']);
        $email         = $mysqli->real_escape_string($_POST['email']);
        $password      = crypt($_POST['password'], udw); //encryption for secure password storage
        $qualification = $mysqli->real_escape_string($_POST['qualification']);
        $expertise     = $mysqli->real_escape_string($_POST['expertise']);
        $phonenumber   = $mysqli->real_escape_string($_POST['phonenumber']);
        $questionone   = $mysqli->real_escape_string($_POST['questionone']);
        $questiontwo   = $mysqli->real_escape_string($_POST['questiontwo']);
        //inserting form information in database
        $query         = "INSERT INTO academicstaffs(staff_id,name,email,password,qualification,expertise,phone_number) VALUES ('$staffID','$name','$email','$password','$qualification','$expertise','$phonenumber')";
        $result        = $mysqli->query($query);
        //inserting into a user table which is used for authentication and session(access) management
        $query1        = "INSERT INTO user(user_id,email,password,question_one,question_two,role) VALUES ('$staffID','$email', '$password', '$questionone','$questiontwo','4')";
        $result1       = $mysqli->query($query1);
        header('Location:../index.php?action=success');
    }
}
//closing connection
$mysqli -> close();
?> 