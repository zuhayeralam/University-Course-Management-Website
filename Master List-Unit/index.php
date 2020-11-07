<?php
include('../Database/db_conn.php');
$page_title = "Master List-Unit";
include_once('../Components/headerTwo.php');
require_once('../Session & Logout/session.php');//makes sure a session is created
// Only allow DC to access this page. This is to protect the page from URL access.
if($_SESSION['role']!=1) { 
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
            <h3>Master List-Unit</h3>
        </div>
        <div class="container clearfix">
            <button class="buttonlight addsearch-button" id="toggleButtonTwo">Add a unit</button>
            <button class="buttonlight addsearch-button float-md-right" id="toggleButtonThree">Search</button>
        </div>
        <!-- Search form for searching all units -->
        <div class="slidin-body" id="toggleMeThree">
            <div class="slidin-form" id="searchform">
                <h3>Search Units</h3>
                <div class="input-group">
                    <label for="search-input">Search</label>
                    <input type="text" name="searchinput" id="search-input" />
                </div>
                <button id="search-button" name="searchbutton" class="buttonlight">Search</button>
            </div>
        </div>
        <div class="slidin-body" id="search-result"></div>
        <!-- Add or insert form for adding a new unit -->
        <div class="slidin-body" id="toggleMeTwo">
            <form class="slidin-form" id="addform" method="POST">
                <h3>Add a unit</h3>
                <div class="input-group">
                    <label for="addunitcode">Unit Code</label>
                    <input type="text" name="unitcode" id="addunitcode" />
                </div>
                <div class="input-group">
                    <label for="addunitname">Unit Name</label>
                    <input type="text" name="unitname" id="addunitname" />
                </div>
                <div class="input-group">
                    <label for="adddescription">Description</label>
                    <textarea name="description" id="adddescription"></textarea>
                </div>
                <div class="input-group">
                    <label for="addsemester">Semester</label>
                    <select id="addsemester" name="semester">
                        <option value="Semester 1">Semester 1</option>
                        <option value="Semester 2">Semester 2</option>
                        <option value="Winter School">Winter School</option>
                        <option value="Spring School">Spring School</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="addcampus">Campus</label>
                    <select id="addcampus" name="campus">
                        <option value="Pandora">Pandora</option>
                        <option value="Rivendell">Rivendell</option>
                        <option value="Neverland">Neverland</option>
                    </select>
                </div>
                <input type="submit" id="addsubmit" value="Add" name="addsubmit" class="buttonlight" />
            </form>
        </div>
        <div class="table-top-card">
        <h3>Units</h3>
      </div>
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
            <tbody>
            <?php
$query = "SELECT * FROM unitdetail";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["id"];
        $field2name = $row["unit_code"];
        $field3name = $row["unit_name"];
        $field4name = $row["unit_coordinator"];
        $field5name = $row["lecturer"];
        $field6name = $row["description"];
        $field7name = $row["semester"];
        $field8name = $row["campus"];
        
        echo '<tr> 
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
$(document).ready(function() {
    //search
    $("#toggleButtonThree").click(function() {
        $("#search-result").empty();
        $("#search-result").css({
            "display": "none"
        });
        $("#search-result").css({
            "padding-bottom": "0"
        });
        $("#search-input").val('');
    });

    $("#search-button").click(function() {
        var the_query = $("#search-input").val();
        $.get("search.php", {
                query: the_query
            })
            .done(function(data) {
                if (data != "false") {
                    $("#search-result").html(data);
                    $("#search-result").css({
                        "padding-bottom": "1rem"
                    });
                    $("#search-result").css({
                        "display": "block"
                    });
                } else {
                    alert("Don't have record");
                }
            });
    });
    //insert
    $('#addform').on("submit", function(event) {
        event.preventDefault();
        if ($('#addunitcode').val() == "") {
            alert("Unit code is required");
        } else if ($('#addunitname').val() == '') {
            alert("Unit name is required");
        } else if ($('#adddescription').val() == '') {
            alert("Description is required");
        } else if ($('#addsemester').val() == '') {
            alert("Semester is required");
        } else if ($('#addcampus').val() == '') {
            alert("Campus is required");
        } else {
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: $('#addform').serialize(),
                beforeSend: function() {
                    $('#addsubmit').val("adding  ...");
                },
                success: function(data) {
                    alert("You have added a unit successfully");
                    $('#addform')[0].reset();
                    $('#addsubmit').val("Add");
                    $("#toggleButtonTwo")[0].click(); //closing slider 
                    $('#editabletable').html(data);
                    $('#editabletable').Tabledit({
                        url: 'action.php',
                        columns: {
                            identifier: [0, "id"],
                            editable: [
                                [2, 'unit_name'],
                                [5, 'description'],
                                [6, 'semester'],
                                [7, 'campus']
                            ]
                        },
                        hideIdentifier: true,
                        restoreButton: false,
                        onSuccess: function(data, textStatus, jqXHR) {
                            if (data.action == 'delete') {
                                $('#' + data.id).remove();
                            }
                        }
                    });
                }
            });
        }
    });
    //edit delete
    $('#editabletable').Tabledit({
        url: 'action.php',
        columns: {
            identifier: [0, "id"],
            editable: [
                [2, 'unit_name'],
                [5, 'description'],
                [6, 'semester', '{"Semester 1":"Semester 1","Semester 2":"Semester 2","Winter School":"Winter School","Spring School":"Spring School"}'],
                [7, 'campus', '{"Pandora":"Pandora","Rivendell":"Rivendell","Neverland":"Neverland"}']
            ]
        },
        hideIdentifier: true,
        restoreButton: false,
        onSuccess: function(data, textStatus, jqXHR) {
            if (data.action == 'delete') {
                $('#' + data.id).remove();
            }
        }
    });

});
 </script>
<script src="../JSsrc/slideToggleTwo.js"></script>
 <script src="../JSsrc/slideToggleThree.js"></script>
 <script src="../JSsrc/scrollTop.js"></script>