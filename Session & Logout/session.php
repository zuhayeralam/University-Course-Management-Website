<?php
   session_start();
   if(!isset($_SESSION['userID']) && !isset($_SESSION['role'])){
      header('Location:../index.php');
   }
?>
<!-- ROLE: student = 5, academic staff = 4 , UC = 3, DC = 1-->