<?php
include('../Database/db_conn.php');
$page_title = "Unit Handbook";
include_once('../Components/headerTwo.php');
require_once('../Session & Logout/session.php');//makes sure a session is created
?>
  <body id="unit-details-body" class="footer-bottom">
  <a href="#navigation-bar" class="buttonlight text-decoration-none" id="scrollTopBtn"><i class="fas fa-angle-double-up"></i></a>
    <nav id="navigation-bar">
      <div class="container">
        <img src="../img/CMS logo.png" alt="CMS Logo" />
        <ul>
          <li><a href="../Homepage" class="text-decoration-none">Home</a></li>
          <!-- link only accessed by student -->
          <?php if($_SESSION['role']==5){ ?> 
          <li><a href="../Unit Enrollment Page" class="text-decoration-none">Enrol</a></li>
          <?php } ?>
          <li><a href="../Session & Logout/logout.php" class="text-decoration-none">Log Out</a></li>
        </ul>
      </div>
    </nav>
    <main>
    <div class="page-top-card">
        <h3>Unit Details</h3>
    </div>

    <div class="container clearfix">
        <button class="buttonlight addsearch-button float-md-right" id="toggleButtonThree">Search all units</button>
    </div>
    <!-- Search form -->
    <div class="slidin-body" id="toggleMeThree">
        <div class="slidin-form" id="searchform">
            <h3>Search a unit</h3>
            <div class="input-group">
                <label for="search-input">Search</label>
                <input type="text" name="searchinput" id="search-input" />
            </div>
            <button id="search-button" name="searchbutton" class="buttonlight">Search</button>
        </div>
    </div>
    <div class="slidin-body" id="search-result"></div>
    <div class="unit-details-grid">
    <?php
$query = "SELECT * FROM unitdetail";
if ($result = $mysqli->query($query))
{
    while ($row = $result->fetch_assoc())
    {
        $field1name = $row["unit_code"];
        $field2name = $row["unit_name"];
        $field3name = $row["unit_coordinator"];
        $field4name = $row["lecturer"];
        $field5name = $row["description"];
        $field6name = $row["semester"];
        $field7name = $row["campus"];

        echo '<div class="unit-details-grid-item">
        <h2>' . $field1name . ' ' . $field2name . '</h2>
        <hr />
        <div>
          <span>Unit Co-ordinator: ' . $field3name . '</span
          ><span>Lecturer: ' . $field4name . '</span>
        </div>
        <div>
          <h3>Introduction</h3>
          <p>
            ' . $field5name . '
          </p>
        </div>
        <div>
          <span>Available: ' . $field6name . '</span> <span>Campus: ' . $field7name . '</span>
        </div>
      </div>';
    }
}
?>
</div>

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
});
</script>
    <script src="../JSsrc/slideToggleThree.js"></script>
    <script src="../JSsrc/scrollTop.js"></script>