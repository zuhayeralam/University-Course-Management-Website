<?php
include('../Database/db_conn.php');
$page_title = "User Account";
include_once('../Components/headerTwo.php');
require_once('../Session & Logout/session.php');//makes sure a session is created
if ($_SESSION['role'] == 5) {
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
      <button class="buttonlight addsearch-button" id="toggleButtonTwo">Edit Personal Info & availability</button>
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
          <input type="submit" value="Confirm" name="acstaffchangepasswordsubmit" class="buttonlight" />
        </form>
      </div>
 <!-- Change personal info -->
 <div class="slidin-body" id="toggleMeTwo">
 <table class="primary-table" id="editabletable"> 
<thead>
      <tr> 
          <th> Staff ID </th> 
          <th> Name </th> 
          <th> Email </th> 
          <th> Qualification </th> 
          <th> Expertise </th> 
          <th> Phone Number </th> 
          <th> Availability </th> 
      </tr>
 </thead>
    <tbody>
      <?php
      $acstaffuser_id =  $_SESSION['userID'];
      $query = "SELECT * FROM academicstaffs 
      WHERE staff_id = $acstaffuser_id";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
       
        $field1name = $row["staff_id"];
        $field2name = $row["name"];
        $field3name = $row["email"];
        $field4name = $row["qualification"]; 
        $field5name = $row["expertise"]; 
        $field6name = $row["phone_number"]; 
        $field7name = $row["availability"]; 
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
                  <td>'.$field6name.'</td> 
                  <td>'.$field7name.'</td> 
                  
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
        $field1name = $row["staff_id"];
        $field2name = $row["name"];
        $field3name = $row["email"];
        $field4name = $row["qualification"];
        $field5name = $row["expertise"]; 
        $field6name = $row["phone_number"]; 
        
         echo '<div class="unit-details-grid-item">
        <h2>'.$field2name.'</h2>
        <hr />
        <div>
          <p><span >ID: '.$field1name.'</span></p>
          <p><span >Email: '.$field3name.'</span></p>
          <p><span >Qualification: '.$field4name.'</span></p>
          <p><span >Expertise: '.$field5name.'</span></p>
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
      url:'acstaffaccountaction.php',
      columns:{
       identifier:[0, "staff_id"],
        editable:[[1,'name'],[2, 'email'], [3, 'qualification','{"PhD":"PhD","Master":"Master","Bachelor":"Bachelor"}'],
         [4, 'expertise','{"Information Systems":"Information Systems","Human Computer Interaction":"Human Computer Interaction","Network Administration":"Network Administration"}'],
          [5, 'phone_number'],[6, 'availability','{"Available":"Available","Unavailable":"Unavailable"}']]
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
    //this styling was needed for using tabledit
    $(".primary-table").css({"margin-bottom": "5rem"});
 });  
 </script>
   <script src="../JSsrc/slideToggleTwo.js"></script>
    <script src="../JSsrc/slideToggleThree.js"></script>
    <script src="../JSsrc/scrollTop.js"></script>