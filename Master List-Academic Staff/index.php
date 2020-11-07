<?php
include('../Database/db_conn.php');
$page_title = "Master List-Academic Staff";
include_once('../Components/headerTwo.php');
require_once('../Session & Logout/session.php'); //makes sure a session is created
//allow DC access only
if ($_SESSION['role'] != 1) {
    header('Location:../Session & Logout/logout.php');
}
//message shown if adding new staff fails
if ($_GET['action'] == 'inputerror') {
    echo '<script language="javascript">';
    echo 'alert("Couldn\'t add to list. Staff ID or Staff Name is invalid.")';
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
            <h3>Master List-Academic Staff</h3>
        </div>
        <div class="container clearfix">
            <button class="buttonlight addsearch-button" id="toggleButtonTwo">Add new staff</button>
            <button class="buttonlight addsearch-button float-md-right" id="toggleButtonThree">Search all academic staffs</button>
        </div>
        <!-- Search form for searching all academic staffs,
        as the DC might need to look up the staffs before adding them to list -->
        <div class="slidin-body" id="toggleMeThree">
            <div class="slidin-form" id="searchform">
                <h3>Search Staffs</h3>
                <div class="input-group">
                    <label for="search-input">Search</label>
                    <input type="text" name="searchinput" id="search-input" />
                </div>
                <button id="search-button" name="searchbutton" class="buttonlight">Search</button>
            </div>
        </div>
        <div class="slidin-body" id="search-result"></div>
        <!-- Add or insert form -->
        <div class="slidin-body" id="toggleMeTwo">
            <form class="slidin-form" id="addform" method="POST">
                <h3>Add a staff</h3>
                <div class="input-group">
                    <label for="addstaffid">Staff ID</label>
                    <input type="text" name="staffid" id="addstaffid" />
                </div>
                <div class="input-group">
                    <label for="addstaffname">Staff Name</label>
                    <input type="text" name="staffname" id="addstaffname" />
                </div>
                <input type="submit" id="addsubmit" value="Add" name="addsubmit" class="buttonlight" />
            </form>
        </div>
        <div class="table-top-card">
        <h3>Staff Available for Allocation</h3>
      </div>
        <table class="primary-table" id="editabletable">
            <thead>
                <tr>
                    <th> Staff ID</th>
                    <th> Staff Name</th>
                </tr>
            </thead>
            <tbody>
            <?php
$query = "SELECT * FROM stafflist";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["staff_id"];
        $field2name = $row["name"];

        echo '<tr> 
                  <td>' . $field1name . '</td> 
                  <td>' . $field2name . '</td> 

              </tr>';
    }
    
}
?>
</tbody>
</table>

<?php
if ($result->num_rows == 0) {
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
        if ($('#addstaffid').val() == "") {
            alert("Staff ID is required");
        } else if ($('#staffname').val() == '') {
            alert("Staff Name is required");
        } else {
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: $('#addform').serialize(),
                beforeSend: function() {
                    $('#addsubmit').val("adding  ...");
                },
                success: function(data) {
                    $('#addform')[0].reset();
                    $('#addsubmit').val("Add");
                    $("#toggleButtonTwo")[0].click(); //closing slider 
                    if (data != "false") {
                        alert("You have added a staff successfully");
                        $('#editabletable').html(data);
                        $('#editabletable').Tabledit({
                        url: 'action.php',
                        columns: {
                            identifier: [0, "staff_id"],
                            editable: []
                        },
                        editButton: false,
                        hideIdentifier: false,
                        restoreButton: false,
                        onSuccess: function(data, textStatus, jqXHR) {
                            if (data.action == 'delete') {
                                $('#' + data.staff_id).remove();
                            }
                        }
                    });
                    } else if (data == "false") {
                        alert("Invalid Staff ID or Name or Staff unavailable.");
                    }
                    
                }
            });
        }
    });
    //edit delete
    $('#editabletable').Tabledit({
        url: 'action.php',
        columns: {
            identifier: [0, "staff_id"],
            editable: []
        },
        editButton: false,
        hideIdentifier: false,
        restoreButton: false,
        onSuccess: function(data, textStatus, jqXHR) {
            if (data.action == 'delete') {
                $('#' + data.staff_id).remove();
            }
        }
    });

});
 </script>
<script src="../JSsrc/slideToggleTwo.js"></script>
 <script src="../JSsrc/slideToggleThree.js"></script>
 <script src="../JSsrc/scrollTop.js"></script>