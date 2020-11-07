<?php
include('../Database/db_conn.php');
$page_title = "User Account";
include_once('../Components/headerTwo.php');
require_once('../Session & Logout/session.php');//makes sure a session is created
if ($_SESSION['role'] != 5)
{
  header('Location:../Session & Logout/logout.php');
}
if( $_GET['action'] == 'changepassworderror' ) {
   echo '<script language="javascript">';
   echo 'alert("Password changing failed. Check your old password.")';
   echo '</script>';
   }
 if( $_GET['action'] == 'changepasswordsuccess' ) {
      echo '<script language="javascript">';
      echo 'alert("Password changing was successful")';
      echo '</script>';
    }

?>
  <body id="unit-details-body" class="footer-bottom">
  <a href="#navigation-bar" class="buttonlight text-decoration-none" id="scrollTopBtn"><i class="fas fa-angle-double-up"></i></a>
    <nav id="navigation-bar">
      <div class="container">
        <img src="../img/CMS logo.png" alt="CMS Logo" />
        <ul>
          <li><a href="../Homepage" class="text-decoration-none">Home</a></li>
          <li><a href="../Session & Logout/logout.php" class="text-decoration-none">Log Out</a></li>
        </ul>
      </div>
    </nav>
    <main>
      <div class="page-top-card">
        <h3>Account</h3>
      </div>
      
      <div class="container clearfix">
      <button class="buttonlight addsearch-button" id="toggleButtonTwo">Edit Personal Info</button>
      <button class="buttonlight addsearch-button float-md-right" id="toggleButtonOne">View Timetable</button>
      <button class="buttonlight addsearch-button float-md-right" id="toggleButtonThree">Change Password</button>
      </div>
    <!-- Changepassword -->
      <div class="slidin-body" id="toggleMeThree">
        <form class="slidin-form" action="changepassword.php" method="POST">
          <h3>Change Password</h3>
          
          <div class="input-group">
            <label for="oldpassword">Old Password</label>
            <input
              type="password"
              name="oldpassword"
              id="oldpassword"
              required
            />
          </div>
          <div class="input-group">
            <label for="newpassword"> New Password</label>
            <input
              type="password"
              name="newpassword"
              id="newpassword"
              pattern="(?=.*\d)(?=.*?[!@#$%^])(?=.*[a-z])(?=.*[A-Z]).{6,12}"
                title="6 to 12 characters in length.Must contain at least 1 lower case letter, 1 uppercase letter, 1 number and one of
           following special characters ! @ # $ % ^"
              required
            />
          </div>
          <input type="submit" value="Confirm" name="studentchangepasswordsubmit" class="buttonlight" />
        </form>
      </div>
 <!-- View timetable -->
 <div class="slidin-body" id="toggleMeOne">
 <table class="primary-table"id="exportabletable"> 
<thead>
      <tr> 
          <th> Student ID</th> 
          <th> Student Name</th> 
          <th> Unit Code</th> 
          <th> Unit Name </th> 
          <th> Tutorial Time </th> 
      </tr>
 </thead>
    <tbody>
      <?php
      $studentuser_id =  $_SESSION['userID'];
$query = "SELECT  tutorialallocation.unit_code,tutorialallocation.unit_name,tutorialallocation.tutorial_time,unitdetail.lecturer,unitdetail.lecture_time
FROM        tutorialallocation
INNER JOIN  unitdetail ON tutorialallocation.unit_code = unitdetail.unit_code
WHERE       tutorialallocation.student_id = $studentuser_id
ORDER BY    tutorialallocation.unit_name";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["unit_code"];
        $field2name = $row["unit_name"];
        $field3name = $row["tutorial_time"];
        $field4name = $row["lecturer"];
        $field5name = $row["lecture_time"]; 
         echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
              </tr>';
    }
    
}
?>
</tbody>
</table>
      </div>
 <!-- Change personal info -->
 <div class="slidin-body" id="toggleMeTwo">
 <table class="primary-table" id="editabletable"> 
<thead>
      <tr> 
          <th> Student ID </th> 
          <th> Name </th> 
          <th> Email </th> 
          <th> Address </th> 
          <th> Date of Birth </th> 
          <th> Phone Number </th> 
      </tr>
 </thead>
    <tbody>
      <?php
      $studentuser_id =  $_SESSION['userID'];
      $query = "SELECT * FROM students 
      WHERE student_id LIKE '%".$studentuser_id."%'";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
       
        $field1name = $row["student_id"];
        $field2name = $row["name"];
        $field3name = $row["email"];
        $field4name = $row["address"]; 
        $field5name = $row["dob"]; 
        $field6name = $row["phone_number"]; 
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
                  <td>'.$field6name.'</td> 
              </tr>';
    }
    
}
?>
</tbody>
</table>
      </div>
      <div class="unit-details-grid">
        
        <?php
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["student_id"];
        $field2name = $row["name"];
        $field3name = $row["email"];
        $field4name = $row["address"];
        $field5name = $row["dob"]; 
        $field6name = $row["phone_number"]; 
        
         echo '<div class="unit-details-grid-item">
        <h2>'.$field2name.'</h2>
        <hr />
        <div>
          <p><span >ID: '.$field1name.'</span></p>
          <p><span >Email: '.$field3name.'</span></p>
          <p><span >Address: '.$field4name.'</span></p>
          <p><span >Date of Birth: '.$field5name.'</span></p>
          <p><span >Phone Number: '.$field6name.'</span></p>
        </div>
      </div>';
    }
}
?>         
</div>
<?php
if($result->num_rows == 0){
  echo ' <div class="emptyrecord">
  <h3>No records found.</h3>
</div>';
}
$result->free();
?>
    </main>
    <?php include_once('../Components/footer.php');?>
    <script  type="text/javascript">

$(document).ready(function(){
    //edit delete
$('#editabletable').Tabledit({
      url:'studentaccountaction.php',
      columns:{
       identifier:[0, "student_id"],
        editable:[[1,'name'],[2, 'email'], [3, 'address'], [4, 'dob'], [5, 'phone_number']]
      },
      deleteButton:false,
		hideIdentifier: true,
		restoreButton: false,
    onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'edit')
       {
        alert("Successfully edited your details. Refresh the page to see updated details.");
       }
      }
     });
    //this styling was needed as a consequence of using tabledit
    $(".primary-table").css({"margin-bottom": "5rem"});
 });  
 </script>
   <script src="../JSsrc/slideToggleTwo.js"></script>
    <script src="../JSsrc/slideToggleThree.js"></script>
    <script src="../JSsrc/slideToggleOne.js"></script>
    <script src="../JSsrc/scrollTop.js"></script>