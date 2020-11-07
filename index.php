<?php
$page_title = "UDW | CMS";
include_once('./Components/header.php');
// Message shown if registration is successful
if ($_GET['action'] == 'success') {
    echo '<script language="javascript">';
    echo 'alert("Registration Successful")';
    echo '</script>';
}
// Message shown if Login fails
if ($_GET['action'] == 'loginerror') {
    echo '<script language="javascript">';
    echo 'alert("Login unsuccesful. check your ID and password.")';
    echo '</script>';
} 
?>

<body id="home-body" class="footer-bottom">
    <main>
        <nav id="navigation-bar">
            <div class="container">
                <img src="img/UDW Logo.png" alt="UDW Logo" />
                <ul>
                    <li><a href="index.php" class="text-decoration-none">Home</a></li>
                    <li><a href="./Registration & Login/registration.php" class="text-decoration-none">Register</a></li>
                    <li><a id="toggleButton" href="#" class="text-decoration-none">Log In</a></li>
                </ul>
            </div>
        </nav>
        <div class="slidin-body" id="toggleMe">
            <form class="slidin-form" action="./Registration & Login/process-form.php" method="POST">
                <img src="img/CMS logo.png" alt="CMS logo" />
                <h3>Log In</h3>
                <div class="input-group">
                    <label for="userID">User ID</label>
                    <input type="number" name="userID" id="userID" required />
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required />
                </div>
                <input type="submit" value="login" name="loginsubmit" class="buttonlight" />
                <p>
                    Forgot password? click <a href="./Forgot Password" target="_blank">here</a> to reset.</p>
            </form>
        </div>
        <!-- welcome section and the grid tiles -->
        <div class="welcome">
            <h1>
          Welcome <br />
          to <br />
          Course Management System
        </h1>
        </div>
    </main>
<?php 
  include_once('./Components/footerOne.php');
?>     
<script src="JSsrc/slideToggle.js"></script>