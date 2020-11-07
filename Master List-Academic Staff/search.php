<?php
include('../Database/db_conn.php');
//get the q parameter from URL
$search     = $_GET["query"];
$result     = $mysqli->query("SELECT * FROM academicstaffs 
WHERE staff_id LIKE '%" . $search . "%' 
OR name LIKE '%" . $search . "%' 
OR email LIKE '%" . $search . "%' 
OR qualification LIKE '%" . $search . "%' 
OR expertise LIKE '%" . $search . "%' 
OR phone_number LIKE '%" . $search . "%'");
$result_cnt = $result->num_rows;
if ($result_cnt != 0 && $search != '') {
    echo "<p style=\"color:var(--dark-secondary-color);
   font-size:36px; margin-left:4rem;\"> We found $result_cnt result(s)</p>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo '  <div class="result-table">  
        
        <table class="primary-table">
             <tr>  
                  <td width="30%"><label>ID</label></td>  
                  <td width="70%">' . $row["staff_id"] . '</td>  
             </tr>  
             <tr>  
                  <td width="30%"><label>Unit Code</label></td>  
                  <td width="70%">' . $row["name"] . '</td>  
             </tr>  
             <tr>  
                  <td width="30%"><label>Unit Name</label></td>  
                  <td width="70%">' . $row["email"] . '</td>  
             </tr>  
             <tr>  
                  <td width="30%"><label>Unit Coordinator</label></td>  
                  <td width="70%">' . $row["qualification"] . '</td>  
             </tr>  
             <tr>  
                  <td width="30%"><label>Lecturer</label></td>  
                  <td width="70%">' . $row["expertise"] . '</td>  
             </tr> 
             <tr>  
                  <td width="30%"><label>Description</label></td>  
                  <td width="70%">' . $row["phone_number"] . '</td>  
             </tr>   </table></div>
             ';
    }
} else {
    echo "false";
}
$mysqli->close();
?>