<?php
include('../Database/db_conn.php');
$page_title = "Unit Management";
include_once('../Components/headerTwo.php');
require_once('../Session & Logout/session.php');//makes sure a session is created
if ($_SESSION['role']!=1 && $_SESSION['role']!=3) {
  header('Location:../Session & Logout/logout.php');
}

if ($_GET['action'] == 'successinsertuclec') {
  echo '<script language="javascript">';
  echo 'alert("Allocation successful!")';
  echo '</script>';
}
if ($_GET['action'] == 'failinsertuclec') {
  echo '<script language="javascript">';
  echo 'alert("Allocation failed!")';
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
        <h3>Unit Management</h3>
      </div>
      <div class="container clearfix">
      <?php 
//only allow section for DC
    if($_SESSION['role']==1) { 
?> 
      <button class="buttonlight addsearch-button float-md-left " id="toggleButtonFive">Set Lecture Time</button>
      <button class="buttonlight addsearch-button float-md-left" id="toggleButtonTwo">Add a tutorial</button>
      <?php } ?>
      <button class="buttonlight addsearch-button float-md-right" id="toggleButtonOne">Search available staffs</button>
      <?php 
//only allow section for DC
    if($_SESSION['role']==1) { 
?> 
      <button class="buttonlight addsearch-button float-md-left" id="toggleButtonFour">Set UC or Lecturer</button>
      <?php } ?>
      <button class="buttonlight addsearch-button float-md-right" id="toggleButtonThree">Search all units</button>
      </div>
<!-- Search form -->
<div class="slidin-body" id="toggleMeOne">
        <div class="slidin-form" id="searchform">
          <h3>Search available Staffs</h3>
          <div class="input-group">
            <label for="search-inputstaff">Search</label>
            <input type="text" name="searchinputstaff" id="search-inputstaff"/>
          </div>
          <button id="search-buttonstaff" name="searchbuttonstaff" class="buttonlight">Search</button>
    </div>
      </div>
      <div  class="slidin-body" id="search-resultstaff"></div>
<!-- Search form -->
<div class="slidin-body" id="toggleMeThree">
        <div class="slidin-form" id="searchform">
          <h3>Search from All units</h3>
          <div class="input-group">
            <label for="search-input">Search</label>
            <input type="text" name="searchinput" id="search-input"/>
          </div>
          <button id="search-button" name="searchbutton" class="buttonlight">Search</button>
    </div>
      </div>
      <div  class="slidin-body" id="search-result"></div>
      <!-- set UC or lecturer -->
      <div class="slidin-body" id="toggleMeFour">
            <form class="slidin-form" action="insert_uc_lecturer.php" method="POST">
                <h3>Set UC or Lecturer</h3>
                <div class="input-group">
            <label for="insertunitcode">Unit Code</label>
            <input type="text" name="unitcode" id="insertunitcode" />
          </div>
                <div class="input-group">
                    <label for="addstaffid">Staff ID</label>
                    <input type="text" name="staffid" id="addstaffid" />
                </div>
                <div class="input-group">
                    <label for="addstaffname">Staff Name</label>
                    <input type="text" name="staffname" id="addstaffname" />
                </div>
                <input type="submit" value="Set UC" name="setucsubmit" class="buttonlight" />
                <input type="submit"  value="Set Lecturer" name="setlecsubmit" class="buttonlight" />
            </form>
        </div>
      <!-- set Lecture Time -->
      <div class="slidin-body" id="toggleMeFive">
            <form class="slidin-form" action="insert_uc_lecturer.php" method="POST">
                <h3>Set Lecture Time</h3>
                <div class="input-group">
            <label for="inserttunitcode">Unit Code</label>
            <input type="text" name="unitcode" id="inserttunitcode" />
          </div>
          <div class="input-group">
              <label for="addlectureday">Lecture Day</label>
              <select
              id="addlectureday"
                name="lectureday"
              >
                <option value="Mon">Monday</option>
                <option value="Tue">Tuesday</option>
                <option value="Wed">Wednesday</option>
                <option value="Thu">Thursday</option>
                <option value="Fri">Friday</option>
              </select>
            </div>
          <div class="input-group">
              <label for="addlecturetime">Lecture Time</label>
              <select
              id="addlecturetime"
                name="lecturetime"
              > 
              <?php 

                  for($i=9; $i<=16; $i++)
                  {
                     echo "<option value=\"".$i.":00\">".$i.":00</option>";
                     echo "<option value=\"".$i.":30\">".$i.":30</option>";
                  }
               ?> 
                
              </select>
            </div>
                <input type="submit"  value="Set Lecture Time" name="setlectimesubmit" class="buttonlight" />
            </form>
        </div>
          
      <!-- Add a tutorial-->
      <div class="slidin-body" id="toggleMeTwo">
        <form class="slidin-form" id="addform" method="POST">
          <h3>Add a tutorial</h3>
          <div class="input-group">
            <label for="addunitcode">Unit Code</label>
            <input type="text" name="unitcode" id="addunitcode" />
          </div>
          <div class="input-group">
            <label for="addunitname">Unit Name</label>
            <input type="text" name="unitname" id="addunitname"  />
          </div>
         
          <div class="input-group">
            <label for="addtutorid">Tutor ID</label>
            <input type="text" name="tutorid" id="addtutorid" />
          </div>
          <div class="input-group">
            <label for="addtutorname">Tutor Name</label>
            <input type="text" name="tutorname" id="addtutorname"  />
          </div>
         
         
          <div class="input-group">
              <label for="addtutorialday">Tutorial Day</label>
              <select
              id="addtutorialday"
                name="tutorialday"
              >
                <option value="Mon">Monday</option>
                <option value="Tue">Tuesday</option>
                <option value="Wed">Wednesday</option>
                <option value="Thu">Thursday</option>
                <option value="Fri">Friday</option>
              </select>
            </div>
          <div class="input-group">
              <label for="addtutorialtime">Tutorial Time</label>
              <select
              id="addtutorialtime"
                name="tutorialtime"
              > 
              <?php 

                  for($i=9; $i<=16; $i++)
                  {
                     echo "<option value=\"".$i.":00\">".$i.":00</option>";
                     echo "<option value=\"".$i.":30\">".$i.":30</option>";
                  }
               ?> 
                
              </select>
            </div>
         
          <div class="input-group">
              <label for="addlocation">Location</label>
              <select
              id="addlocation"
                name="location"
              >
                <option value="Pandora">Pandora</option>
                <option value="Rivendell">Rivendell</option>
                <option value="Neverland">Neverland</option>
              </select>
            </div>
            <div class="input-group">
              <label for="addcapacity">Capacity</label>
              <input
              id="addcapacity"
                type="number"
                placeholder="Capacity"
                name="capacity"
              />
              </div>
          <input type="submit" id="addsubmit" value="Add" name="addsubmit" class="buttonlight" />
        </form>
      
      </div>
      <div class="table-top-card">
        <h3>Tutorials</h3>
      </div>
      <table class="primary-table" id="editabletable"> 
<thead>
          <th> ID</th> 
          <th> Unit Code</th> 
          <th> Unit Name</th> 
          <th> Tutor ID</th> 
          <th> Tutor Name </th> 
          <th> Tutorial Time</th> 
          <th> Location </th> 
          <th> Capacity </th> 
      </tr>
 </thead>
    <tbody>
      <?php
      //DC can edit all tutorials
      if($_SESSION['role']==1){
      $query = "SELECT * FROM tutorial ORDER BY unit_name";
      }
      //UC can only edit the tutorial of their unit
      $uc_id =  $_SESSION['userID'];
      if($_SESSION['role']==3){
        $query = "SELECT  tutorial.tutorial_id,tutorial.unit_code,tutorial.unit_name,tutorial.tutor_id, tutorial.tutor_name, tutorial.tutorial_time, tutorial.location, tutorial.capacity
        FROM        tutorial
        INNER JOIN  unitdetail ON tutorial.unit_code = unitdetail.unit_code
        WHERE       unitdetail.UC_id = $uc_id
        ORDER BY    tutorial.unit_name";
        }
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["tutorial_id"];
        $field2name = $row["unit_code"];
        $field3name = $row["unit_name"];
        $field4name = $row["tutor_id"];
        $field5name = $row["tutor_name"]; 
        $field6name = $row["tutorial_time"]; 
        $field7name = $row["location"]; 
        $field8name = $row["capacity"]; 
 
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
                  <td>'.$field6name.'</td> 
                  <td>'.$field7name.'</td> 
                  <td>'.$field8name.'</td> 
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
$result->free();
?>

</main>
   <?php include_once('../Components/footer.php');?>
<script  type="text/javascript">
$(document).ready(function(){
  //search available staffs
  $("#toggleButtonOne").click( function () {
    $("#search-resultstaff").empty();
    $("#search-resultstaff").css({"display":"none"}); 
    $("#search-resultstaff").css({"padding-bottom":"0"}); 
    $("#search-inputstaff").val('');
  });
  
    $("#search-buttonstaff").click( function () {
    var the_query = $("#search-inputstaff").val();
$.get( "search.php", { query: the_query} )
   .done(function( data ) {
  if(data != "false"){
    $("#search-resultstaff").html(data);
    $("#search-resultstaff").css({"padding-bottom":"1rem"});
    $("#search-resultstaff").css({"display":"block"});
    }
   else{
       alert("Don't have record");
   }
});
});
  //search all units
  $("#toggleButtonThree").click( function () {
    $("#search-result").empty();
    $("#search-result").css({"display":"none"}); 
    $("#search-result").css({"padding-bottom":"0"}); 
    $("#search-input").val('');
  });
  
    $("#search-button").click( function () {
    var the_query = $("#search-input").val();
$.get( "../Master List-Unit/search.php", { query: the_query} )
   .done(function( data ) {
  if(data != "false"){
    $("#search-result").html(data);
    $("#search-result").css({"padding-bottom":"1rem"});
    $("#search-result").css({"display":"block"});
    }
   else{
       alert("Don't have record");
   }
});
});
  //insert
  $('#addform').on("submit", function(event){  
  event.preventDefault();  
  if($('#addunitcode').val() == "")  
  {  
   alert("Unit code is required");  
  }  
  else if($('#addunitname').val() == '')  
  {  
   alert("Unit name is required");  
  }  
  else if($('#addtutorialday').val() == '')
  {  
   alert("Tutorialday is required");  
  }
  else if($('#addtutorialtime').val() == '')
  {  
   alert("Tutorial time is required");  
  }
  else if($('#addlocation').val() == '')
  {  
   alert("Location is required");  
  }
  
  else if($('#addcapacity').val() == '')
  {  
   alert("Capacity is required");  
  }
  else  
  {  
   $.ajax({  
    url:"insert.php",  
    method:"POST",  
    data:$('#addform').serialize(),  
    beforeSend:function(){  
     $('#addsubmit').val("adding  ...");  
    },  
    success:function(data){  
     $('#addform')[0].reset();  
     $('#addsubmit').val("Add");
     $("#toggleButtonTwo")[0].click();//closing slider 
     if (data != "false"){
   alert("You have created a new tutorial successfully.");
    $('#editabletable').html(data);
    $('#editabletable').Tabledit({
      url:'action.php',
      columns:{
         identifier:[0, "id"],
       editable:[[3,'tutor_id'],[4, 'tutor_name']]
      },
      buttons: {
        edit: {
    class: 'buttonlight tableedit-button',
    html: '<span> change tutor </span>',
    action: 'edit'
}
},
		hideIdentifier: true,
		restoreButton: false,
    onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id).remove();
       }
      },
      onFail:function()
      {
       alert("Tutor was not found in staff List! refresh the page to see current state.");
      }
     });
     }
   else if (data == "false"){
   alert("Invalid Unit code/name or staff ID/name.");
     }  
     
    }  
   });  
  }  
});
   //edit delete
$('#editabletable').Tabledit({
      url:'action.php',
      columns:{
       identifier:[0, "id"],
       editable:[[3,'tutor_id'],[4, 'tutor_name']]
      },     
       buttons: {
        edit: {
    class: 'buttonlight tableedit-button',
    html: '<span> change tutor </span>',
    action: 'edit'
}
},
		hideIdentifier: true,
		restoreButton: false,
    onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id).remove();
       }
      },
    onFail:function()
      {
       alert("Tutor was not found in staff List! refresh the page to see current state.");
      }
     });

 });  
 </script>
<script src="../JSsrc/slideToggleOne.js"></script>
<script src="../JSsrc/slideToggleTwo.js"></script>
 <script src="../JSsrc/slideToggleThree.js"></script>
 <script src="../JSsrc/slideToggleFour.js"></script>
 <script src="../JSsrc/slideToggleFive.js"></script>
 <script src="../JSsrc/scrollTop.js"></script>