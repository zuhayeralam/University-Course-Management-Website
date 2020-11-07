<?php
include('../Database/db_conn.php');
$page_title = "Allocate Tutorial";
include_once('../Components/headerTwo.php');
require_once('../Session & Logout/session.php');//makes sure a session is created
if ($_SESSION['role'] != 5)
{
  header('Location:../Session & Logout/logout.php');
}
if( $_GET['action'] == 'allocationsuccess' ) {
   echo '<script language="javascript">';
   echo 'alert("Successfully allocated in tutorial!")';
   echo '</script>';}
if( $_GET['action'] == 'noroom' ) {
   echo '<script language="javascript">';
   echo 'alert("No room left in this tutorial!")';
   echo '</script>';}
if( $_GET['action'] == 'alreadyenrolled' ) {
   echo '<script language="javascript">';
   echo 'alert("You have already allocated yourself in this tutorial.")';
   echo '</script>';}
?>

<body id="unit-enrollment-body" class="footer-bottom">
<a href="#navigation-bar" class="buttonlight text-decoration-none" id="scrollTopBtn"><i class="fas fa-angle-double-up"></i></a>
    <nav id="navigation-bar">
      <div class="container">
        <img src="../img/CMS logo.png" alt="CMS Logo" />
        <ul>
          <li><a href="../Homepage" class="text-decoration-none">Home</a></li>
          <li><a href="../Unit Detail Page" class="text-decoration-none">Unit Details</a></li>
          <li><a href="../Unit Enrollment Page" class="text-decoration-none">Unit Enrollment</a></li>
        </ul>
      </div>
    </nav>
    <main>
      <div class="page-top-card">
        <h3>Tutorial Allocation</h3>
      </div>
      <div class="container clearfix">
      <button class="buttonlight addsearch-button" id="toggleButtonTwo">Change Enrolment</button>
      </div>
       <!-- Enrolled unit list and unenrollment option -->
 <div class="slidin-body" id="toggleMeTwo">
 <table class="primary-table" id="editabletable"> 
<thead>
      <tr> 
          <th> Tutorial Allocation ID </th> 
          <th> Unit Code </th>
          <th> Unit Name </th>
          <th> Tutorial Time </th>
      </tr>
 </thead>
    <tbody>
      <?php
      $studentid = $_SESSION['userID'];
      $query1 = "SELECT * FROM tutorialallocation WHERE student_id = $studentid";
if ($result = $mysqli->query($query1)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["id"];
        $field2name = $row["unit_code"];
        $field3name = $row["unit_name"];
        $field4name = $row["tutorial_time"];
   
          
        echo '<tr> 
                  <td>'.$field1name.'</td>  
                  <td>'.$field2name.'</td>  
                  <td>'.$field3name.'</td>  
                  <td>'.$field4name.'</td>  
              </tr>';
    }
}
?>
</tbody>
</table>
<?php
    if($result->num_rows == 0){
      echo ' <div class="emptyrecord">
      <h3>No records found.</h3>
    </div>';
    }
?>
      </div>
<!-- enrollment forms -->
<div class="unit-enrollment-grid">
      <?php
      $studentid = $_SESSION['userID'];
      $query = "SELECT tutorial.tutorial_id, tutorial.unit_code, tutorial.unit_name,tutorial.tutorial_time,
      tutorial.location, tutorial.capacity FROM enrollment INNER JOIN tutorial 
      ON enrollment.unit_code = tutorial.unit_code
      WHERE enrollment.student_id = $studentid
      ORDER BY tutorial.unit_name";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["tutorial_id"];
        $field2name = $row["unit_code"]; 
        $field3name = $row["unit_name"]; 
        $field4name = $row["tutorial_time"]; 
        $field5name = $row["location"];
        $field6name = $row["capacity"];
 
        echo '<div class="unit-enrollment-grid-item">
        <h3>Unit Name: '.$field2name.' '.$field3name.'</h3>
      <hr />
      <form action="process.php" method="POST">
      <input type="hidden" name="unitcode" value="'.$field2name.'">
      <input type="hidden" name="unitname" value="'.$field3name.'">
      <input type="hidden" name="tutorialid" value="'.$field1name.'">
      <input type="hidden" name="tutorialtime" value="'.$field4name.'">
      <input type="hidden" name="capacity" value="'.$field6name.'">
      <span >Time: '.$field4name.'</span>
      <span >Location: '.$field5name.'</span>
      <span >Capacity: '.$field6name.'</span>
     <input type="submit" value="Enrol" name="allocatesubmit" class="buttonlight" />
    </form>
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
      url:'action.php',
      columns:{
       identifier:[0, "id"],
        editable:[]
      },
      buttons: {
                
				delete: {
					class: 'buttonlight tableedit-button',
					html: '<span> Withdraw from tutorial </span>',
					action: 'delete'
				}},
      editButton:false,
		hideIdentifier: true,
		restoreButton: false,
    onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        alert("Successfully withdrawn from tutorial.");
        $('#'+data.id).remove();
       }
      }
     });
    //this styling was needed as a consequence of using tabledit
    $(".primary-table").css({"margin-bottom": "5rem"});
 });  
 </script>
<script src="../JSsrc/slideToggleTwo.js"></script>
<script src="../JSsrc/scrollTop.js"></script>