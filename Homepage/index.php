<?php
$page_title = "Home | CMS";
include_once('../Components/headerTwo.php');
require_once('../Session & Logout/session.php');//makes sure a session is created
?>
<body id="home-body" class="footer-bottom">
<a href="#navigation-bar" class="buttonlight text-decoration-none" id="scrollTopBtn"><i class="fas fa-angle-double-up"></i></a>
    <!-- nav bar -->
    <nav id="navigation-bar">
        <div class="container">
            <img src="../img/CMS logo.png" alt="UDW Logo" />
            <ul>
                <li><a href="index.php" class="current text-decoration-none">Home</a></li>
                <li><a href="../Session & Logout/logout.php" class="text-decoration-none">Log Out</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <!-- welcome section and the grid tiles -->
        <div class="welcome">
            <h1>
          Welcome <br />
          to <br />
          Course Management System
        </h1>
        </div>
        <div class="options-grid">

<?php
//only allow section for students 
    if($_SESSION['role']==5){ 
?> 

<a href="../Unit Enrollment Page" class="text-decoration-none">
    <div class="options-grid-item ">
        <h1>Enrol in a Unit</h1>
    </div>
</a>
<a href="../Tutorial Allocation Page" class="text-decoration-none">
    <div class="options-grid-item ">
        <h1>Allocate Tutorial</h1>
    </div>
</a>
<a href="../Individual Timetable Page" class="text-decoration-none">
    <div class="options-grid-item ">
        <h1>My Timetable</h1>
    </div>
</a>
        
<?php } ?>

<?php 
//only allow section for DC
    if($_SESSION['role']==1) { 
?> 

<a href="../Master List-Unit" class="text-decoration-none">
    <div class="options-grid-item">
        <h1>Master List- Unit</h1>
    </div>
</a>
<a href="../Master List-Academic Staff" class="text-decoration-none">
    <div class="options-grid-item ">
        <h1>Master List- Academic Staff</h1>
    </div>
</a>

<?php } ?>
<?php 
//only allow section for Teaching Staff and DC
    if($_SESSION['role']==4 || $_SESSION['role']==1 || $_SESSION['role']==3) { 
?> 
<a href="../Enrolled Student Details Page" class="text-decoration-none">
    <div class="options-grid-item ">
        <h1>Enrolled Student Details</h1>
    </div>
</a>
<?php } ?>
<?php 
//only allow section for Teaching Staff and DC
    if($_SESSION['role']==1 || $_SESSION['role']==3) { 
?> 
<a href="../Unit Management" class="text-decoration-none">
    <div class="options-grid-item ">
        <h1>Unit Management</h1>
    </div>
</a>  
<?php } ?>
       <!--This Section is for everyone  -->
<a href="../User Account Page" class="text-decoration-none">
    <div class="options-grid-item ">
        <h1>My Account</h1>
    </div>
</a>
<a href="../Unit Detail Page" class="text-decoration-none">
    <div class="options-grid-item ">
        <h1>Unit Handbook</h1>
    </div>
</a>

</div>
</main>

<?php include_once('../Components/footer.php');
?>
    <script src="../JSsrc/scrollTop.js"></script>