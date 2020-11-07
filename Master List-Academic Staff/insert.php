<?php 
include('../Database/db_conn.php');
global $mysqli;

if (!empty($_POST)) {
    $output      = '';
    $staffid     = $mysqli->real_escape_string($_POST["staffid"]);
    $staffname   = $mysqli->real_escape_string($_POST["staffname"]);
    $check_query = $mysqli->query("SELECT * FROM academicstaffs WHERE 
 staff_id = $staffid  AND
 name LIKE '%".$staffname."%' AND availability = 'Available'");
    $result_cnt  = $check_query->num_rows;
    if ($result_cnt != 0 && $staffid != '' && $staffname != '') {
        $query = "
    INSERT INTO stafflist(staff_id, name)  
     VALUES('$staffid', '$staffname')";
        
        if ($mysqli->query($query)) {
            
            $select_query = $query = "SELECT * FROM stafflist";
            $result       = $mysqli->query($select_query);
            $output .= '
     <table class="primary-table" id="editabletable"> 
     <thead>
           <tr> 
               <th> ID</th> 
               <th> Staff Name</th> 
           </tr>
      </thead>
         <tbody>';
            while ($row = $result->fetch_assoc()) {
                $field1name = $row["staff_id"];
                $field2name = $row["name"];
                
                $output .= '<tr> 
         <td>' . $field1name . '</td> 
         <td>' . $field2name . '</td> 
     </tr>';
            }
            $output .= '</table>';
            echo $output;
        }
    } else {
        echo "false";
    }
}
$mysqli->close();
?>