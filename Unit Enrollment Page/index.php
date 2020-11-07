<?php
include ('../Database/db_conn.php');
$page_title = "Enrollment";
include_once ('../Components/headerTwo.php');
require_once ('../Session & Logout/session.php'); //makes sure a session is created
if ($_SESSION['role'] != 5)
{
    header('Location:../Session & Logout/logout.php');
}
if ($_GET['action'] == 'enrollmentsuccess')
{
    echo '<script language="javascript">';
    echo 'alert("Successfully enrolled!")';
    echo '</script>';
}
if ($_GET['action'] == 'prereqerror')
{
    echo '<script language="javascript">';
    echo 'alert("You have not completed the pre-requisite unit!")';
    echo '</script>';
}
if ($_GET['action'] == 'alreadyenrolled')
{
    echo '<script language="javascript">';
    echo 'alert("You have already enrolled in this unit.")';
    echo '</script>';
}
?>
<body id="unit-enrollment-body" class="footer-bottom">
<a href="#navigation-bar" class="buttonlight text-decoration-none" id="scrollTopBtn"><i class="fas fa-angle-double-up"></i></a>
    <nav id="navigation-bar">
        <div class="container">
            <img src="../img/CMS logo.png" alt="CMS Logo" />
            <ul>
                <li><a href="../Homepage" class="text-decoration-none">Home</a></li>
                <li><a href="../Unit Detail Page" class="text-decoration-none">Unit Details</a></li>
            </ul>
        </div>
    </nav>
    <main>
        <div class="page-top-card">
            <h3>Unit Enrollment</h3>
        </div>
        <div class="container clearfix">
            <button class="buttonlight addsearch-button" id="toggleButtonTwo">Change Enrolment</button>
            <button class="buttonlight addsearch-button float-md-right" id="toggleButtonThree">Search all Units</button>
        </div>
         <!-- Search form -->
         <div class="slidin-body" id="toggleMeThree">
            <div class="slidin-form" id="searchform">
                <h3>Search units</h3>
                <div class="input-group">
                    <label for="search-input">Search all units</label>
                    <input type="text" name="searchinput" id="search-input" />
                </div>
                <button id="search-button" name="searchbutton" class="buttonlight">Search</button>
            </div>
        </div>
        <div class="slidin-body" id="search-result"></div>
        <!-- Enrolled unit list and unenrollment option -->
        <div class="slidin-body" id="toggleMeTwo">
            <table class="primary-table" id="editabletable">
                <thead>
                    <tr>
                        <th> Enrollment ID </th>
                        <th> Enrolled Unit </th>
                        <th> Unit Name</th>
                    </tr>
                </thead>
                <tbody>
                <?php
$studentid = $_SESSION['userID'];
$query1 = "SELECT enrollment.id, enrollment.student_id, enrollment.unit_code, unitdetail.unit_name FROM enrollment 
INNER JOIN unitdetail ON enrollment.unit_code = unitdetail.unit_code
 WHERE enrollment.student_id = $studentid
ORDER BY    enrollment.id";
if ($result = $mysqli->query($query1))
{
    while ($row = $result->fetch_assoc())
    {
        $field1name = $row["id"];
        $field3name = $row["unit_code"];
        $field4name = $row["unit_name"];

        echo '<tr> 
                  <td>' . $field1name . '</td>  
                  <td>' . $field3name . '</td>  
                  <td>' . $field4name . '</td>  
              </tr>';
    }
    if ($result->num_rows == 0)
    {
        echo ' <div class="emptyrecord">
      <h3>No records found.</h3>
    </div>';
    }
}
?>

</tbody>
</table>
      </div>
<!-- enrollment forms -->
<div class="unit-enrollment-grid">
<?php
$query = "SELECT * FROM unitdetail";
if ($result = $mysqli->query($query))
{
    while ($row = $result->fetch_assoc())
    {
        $field1name = $row["unit_code"];
        $field2name = $row["unit_name"];
        $field3name = $row["semester"];
        $field4name = $row["campus"];
        $field5name = $row["prerequisite"];

        echo '<div class="unit-enrollment-grid-item">
        <h3>Unit Name: ' . $field1name . ' ' . $field2name . '</h3>
      <hr />
      <form action="process.php" method="POST">
      <input type="hidden" name="unitcode" value="' . $field1name . '">
      <input type="hidden" name="prerequisite" value="' . $field5name . '">
      <span >Campus: ' . $field4name . '</span>
      <span >Semester: ' . $field3name . '</span>
      <span >Pre-requisite: ' . $field5name . '</span>
     <input type="submit" value="Enrol" name="enrolsubmit" class="buttonlight" />
    </form>
    </div>';
    }
}
?>
</div>
<?php
if ($result->num_rows == 0)
{
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
        $.get("../Master List-Unit/search.php", {
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
    //edit delete
    $('#editabletable').Tabledit({
        url: 'action.php',
        columns: {
            identifier: [0, "id"],
            editable: []
        },
        buttons: {

            delete: {
                class: 'buttonlight tableedit-button',
                html: '<span> Withdraw </span>',
                action: 'delete'
            }
        },
        editButton: false,
        hideIdentifier: true,
        restoreButton: false,
        onSuccess: function(data, textStatus, jqXHR) {
            if (data.action == 'delete') {
                alert("Successfully withdrawn from unit.");
                $('#' + data.id).remove();
            }
        }
    });
    //this styling was needed as a consequence of using tabledit
    $(".primary-table").css({
        "margin-bottom": "5rem"
    });
});
 </script>
<script src="../JSsrc/slideToggleTwo.js"></script>
<script src="../JSsrc/slideToggleThree.js"></script>
<script src="../JSsrc/scrollTop.js"></script>