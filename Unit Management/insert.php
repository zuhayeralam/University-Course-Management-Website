<?php
//masterunitinsert.php  
include('../Database/db_conn.php');
global $mysqli;

if(!empty($_POST))
{
 $output = '';
 $unitcode = $mysqli->real_escape_string($_POST["unitcode"]);  
 $unitname = $mysqli->real_escape_string($_POST["unitname"]);  
 $tutorid = $mysqli->real_escape_string($_POST["tutorid"]);  
 $tutorname = $mysqli->real_escape_string($_POST["tutorname"]);  
 $tutorialday = $mysqli->real_escape_string($_POST["tutorialday"]);  
 $tutorialtime = $mysqli->real_escape_string($_POST["tutorialtime"]);  
 $concat_time = $tutorialday.' '.$tutorialtime;
 $location = $mysqli->real_escape_string($_POST["location"]);  
 $capacity = $mysqli->real_escape_string($_POST["capacity"]);  
    
    $check_unit_query =$mysqli->query("SELECT * FROM unitdetail WHERE 
    unit_code LIKE '%".$unitcode."%' AND
    unit_name LIKE '%".$unitname."%'");
    $result_cnt = $check_unit_query->num_rows;
    
    $check_staff_query =$mysqli->query("SELECT * FROM stafflist WHERE 
    staff_id LIKE '%".$tutorid."%' AND
    name LIKE '%".$tutorname."%'");
    $result_cnt1 = $check_staff_query->num_rows;
    if ($result_cnt!=0 && $result_cnt1!=0) {
    $query = "
    INSERT INTO tutorial(unit_code, unit_name, tutor_id, tutor_name, tutorial_time, location, capacity)  
     VALUES('$unitcode', '$unitname', '$tutorid', '$tutorname','$concat_time', '$location', '$capacity')
    ";
 
    if($mysqli->query($query))
    {
     
     $select_query = $query = "SELECT * FROM tutorial";
     $result = $mysqli->query($select_query);
     $output .= '
     <table class="primary-table" id="editabletable"> 
     <thead>
           <tr> 
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
         <tbody>';
      while ($row = $result->fetch_assoc()) {
         $field1name = $row["tutorial_id"];
        $field2name = $row["unit_code"];
        $field3name = $row["unit_name"];
        $field4name = $row["tutor_id"];
        $field5name = $row["tutor_name"]; 
        $field6name = $row["tutorial_time"]; 
        $field7name = $row["location"]; 
        $field8name = $row["capacity"]; 
  
         $output .='<tr> 
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
     $output .= '</table>';
     echo $output;
   }
 }
 else{
   echo "false";
}
}
   
?>