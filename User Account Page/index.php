<?php
require_once('../Session & Logout/session.php');//makes sure a session is created
 if($_SESSION['role']==5){  
   include('studentaccount.php');
   }
   else{ 
   include('acstaffaccount.php');
   } ?>