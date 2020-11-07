<?php
include('../Database/db_conn.php');
//get the q parameter from URL
$search     = $_GET["query"];
$result     = $mysqli->query("SELECT stafflist.staff_id,academicstaffs.name,academicstaffs.qualification,academicstaffs.expertise,academicstaffs.availability  FROM stafflist 
INNER JOIN academicstaffs ON stafflist.staff_id = academicstaffs.staff_id
WHERE stafflist.staff_id LIKE '%" . $search . "%' 
OR stafflist.name LIKE '%" . $search . "%' 
ORDER BY stafflist.name");
$result_cnt = $result->num_rows;
if ($result_cnt != 0 && $search != '') {
    echo "<p style=\"color:var(--dark-secondary-color);
   font-size:36px; margin-left:4rem;\"> We found $result_cnt result(s)</p>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo '  <div class="result-table">  
        
        <table class="primary-table">
             <tr>  
                  <td width="30%"><label>Staff ID</label></td>  
                  <td width="70%">' . $row["staff_id"] . '</td>  
             </tr>  
             <tr>  
                  <td width="30%"><label>Name</label></td>  
                  <td width="70%">' . $row["name"] . '</td>  
             </tr>  
             <tr>  
                  <td width="30%"><label>Qualification</label></td>  
                  <td width="70%">' . $row["qualification"] . '</td>  
             </tr>  
             <tr>  
                  <td width="30%"><label>Expertise</label></td>  
                  <td width="70%">' . $row["expertise"] . '</td>  
             </tr>  
             <tr>  
                  <td width="30%"><label>Availability</label></td>  
                  <td width="70%">' . $row["availability"] . '</td>  
             </tr>   </table></div>
             ';
    }
} else {
    echo "false";
}
?>