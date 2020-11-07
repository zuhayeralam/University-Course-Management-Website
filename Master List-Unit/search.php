<?php
include('../Database/db_conn.php');
//get the q parameter from URL
$search=$_GET["query"];
$result=$mysqli->query("SELECT * FROM unitdetail 
WHERE unit_code LIKE '%".$search."%' 
OR unit_name LIKE '%".$search."%' 
OR unit_coordinator LIKE '%".$search."%' 
OR lecturer LIKE '%".$search."%' 
OR description LIKE '%".$search."%' 
OR semester LIKE '%".$search."%' 
OR campus LIKE '%".$search."%'");
 $result_cnt = $result->num_rows;
if ($result_cnt!=0 && $search != '') {
   echo"<p style=\"color:var(--dark-secondary-color);
   font-size:36px; margin-left:4rem;\"> We found $result_cnt result(s)</p>";
   while($row = mysqli_fetch_assoc($result))  
   {  
        echo'  <div class="result-table">  
        
        <table class="primary-table">
             <tr>  
                  <td width="30%"><label>ID</label></td>  
                  <td width="70%">'.$row["id"].'</td>  
             </tr>  
             <tr>  
                  <td width="30%"><label>Unit Code</label></td>  
                  <td width="70%">'.$row["unit_code"].'</td>  
             </tr>  
             <tr>  
                  <td width="30%"><label>Unit Name</label></td>  
                  <td width="70%">'.$row["unit_name"].'</td>  
             </tr>  
             <tr>  
                  <td width="30%"><label>Unit Coordinator</label></td>  
                  <td width="70%">'.$row["unit_coordinator"].'</td>  
             </tr>  
             <tr>  
                  <td width="30%"><label>Lecturer</label></td>  
                  <td width="70%">'.$row["lecturer"].'</td>  
             </tr> 
             <tr>  
                  <td width="30%"><label>Description</label></td>  
                  <td width="70%">'.$row["description"].'</td>  
             </tr> 
             <tr>  
                  <td width="30%"><label>Semester</label></td>  
                  <td width="70%">'.$row["semester"].'</td>  
             </tr>
             <tr>  
                  <td width="30%"><label>Campus</label></td>  
                  <td width="70%">'.$row["campus"].'</td>  
             </tr>  </table></div>
             ';  
   }  
} else {
   echo "false";
}
?>