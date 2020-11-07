<?php
//masterunitinsert.php  
include('../Database/db_conn.php');
global $mysqli;

if (!empty($_POST)) {
    $output          = '';
    $unitcode        = $mysqli->real_escape_string($_POST["unitcode"]);
    $unitname        = $mysqli->real_escape_string($_POST["unitname"]);
    $unitdescription = $mysqli->real_escape_string($_POST["description"]);
    $unitsemester    = $mysqli->real_escape_string($_POST["semester"]);
    $unitcampus      = $mysqli->real_escape_string($_POST["campus"]);
    
    
    $query = "
    INSERT INTO unitdetail(unit_code, unit_name, description, semester, campus)  
     VALUES('$unitcode', '$unitname', '$unitdescription', '$unitsemester','$unitcampus')
    ";
    
    if ($mysqli->query($query)) {
        
        $select_query = $query = "SELECT * FROM unitdetail";
        $result       = $mysqli->query($select_query);
        $output .= '
     <table class="primary-table" id="editabletable"> 
     <thead>
           <tr> 
               <th> ID</th> 
               <th> Unit Code</th> 
               <th> Unit Name</th> 
               <th> Unit Coordinator </th> 
               <th> Lecturer </th> 
               <th> Description</th> 
               <th> Semester </th> 
               <th> Campus </th> 
           </tr>
      </thead>
         <tbody>';
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["id"];
            $field2name = $row["unit_code"];
            $field3name = $row["unit_name"];
            $field4name = $row["unit_coordinator"];
            $field5name = $row["lecturer"];
            $field6name = $row["description"];
            $field7name = $row["semester"];
            $field8name = $row["campus"];
            
            $output .= '<tr> 
         <td>' . $field1name . '</td> 
         <td>' . $field2name . '</td> 
         <td>' . $field3name . '</td> 
         <td>' . $field4name . '</td> 
         <td>' . $field5name . '</td> 
         <td>' . $field6name . '</td> 
         <td>' . $field7name . '</td> 
         <td>' . $field8name . '</td> 
     </tr>';
        }
        $output .= '</table>';
        echo $output;
    }
}

$mysqli->close();
?>