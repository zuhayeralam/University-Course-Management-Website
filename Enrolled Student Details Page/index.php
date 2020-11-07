<?php
include('../Database/db_conn.php');
$page_title = "Enrolled Student Details";

include_once('../Components/headerTwo.php');
require_once('../Session & Logout/session.php');//makes sure a session is created
if ($_SESSION['role'] == 5) {
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
          <li><a href="../Session & Logout/logout.php" class="text-decoration-none">Log Out</a></li>
        </ul>
      </div>
    </nav>
    <main>
      <div class="page-top-card">
        <h3>Enrolled Students detail</h3>
      </div>
      <div class="container clearfix">
      <button class="buttonlight addsearch-button float-md-right" name="exportButton" id="exportButton">Export  <i class="far fa-file-excel"></i></button>
      </div>
 <div >
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
      
$query = "SELECT  tutorialallocation.student_id,students.name, tutorialallocation.unit_code,tutorialallocation.unit_name,tutorialallocation.tutorial_time
FROM tutorialallocation
INNER JOIN students ON students.student_id = tutorialallocation.student_id
ORDER BY students.name";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["student_id"];
        $field2name = $row["name"];
        $field3name = $row["unit_code"];
        $field4name = $row["unit_name"];
        $field5name = $row["tutorial_time"]; 
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
   <script src="../JSsrc/jquery.table2excel.js"></script>
<script  type="text/javascript">
 $(document).ready(function(){  
   $("#exportButton").click(function(){

	  $("#exportabletable").table2excel({

	    // exclude CSS class

	    exclude: ".noExl",

	    name: "Worksheet Name",

	    filename: "Enrolled_Students", //do not include extension

	    fileext: ".xls" // file extension

	  });

	});
 });
 </script>
     <script src="../JSsrc/scrollTop.js"></script>
