<?php
include('../Database/db_conn.php');
$page_title = "My Timetable";
include_once('../Components/headerTwo.php');
require_once('../Session & Logout/session.php');//makes sure a session is created
if ($_SESSION['role'] != 5) {
  header('Location:../Session & Logout/logout.php');
}

?>
  <body id="unit-details-body" class="footer-bottom">
  <a href="#navigation-bar" class="buttonlight text-decoration-none" id="scrollTopBtn"><i class="fas fa-angle-double-up"></i></a>
    <nav id="navigation-bar">
      <div class="container">
        <img src="../img/CMS logo.png" alt="CMS Logo" />
        <ul>
          <li><a href="../Homepage" class="text-decoration-none">Home</a></li>
          <li><a href="../Tutorial Allocation Page" class="text-decoration-none">Tutorial allocation</a></li>
          <li><a href="../Session & Logout/logout.php" class="text-decoration-none">Log Out</a></li>
        </ul>
      </div>
    </nav>
    <main>
      <div class="page-top-card">
        <h3>My Timetable</h3>
      </div>

 <div >
      <table class="primary-table"id="exportabletable"> 
<thead>
      <tr> 
          <th> Unit Code</th> 
          <th> Unit Name</th> 
          <th> Tutorial Time</th> 
          <th> Lecturer </th> 
          <th> Lecture Time </th> 
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
   <script src="../JSsrc/scrollTop.js"></script>

