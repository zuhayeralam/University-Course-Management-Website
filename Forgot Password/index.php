<?php
include('../Database/db_conn.php');
$page_title = "Reset Password";
include_once('../Components/headerTwo.php');
if( $_GET['action'] == 'emailsent' ) {
   echo '<script language="javascript">';
   echo 'alert("Email Sent! check your email!")';
   echo '</script>';
   }
   
   if( $_GET['action'] == 'checkinput' ) {
     echo '<script language="javascript">';
     echo 'alert("user doesn\'t exist. Check your email and answers.")';
     echo '</script>';
     }
?>
 <body id="reg-body" class="footer-bottom">
 <a href="#navigation-bar" class="buttonlight text-decoration-none" id="scrollTopBtn"><i class="fas fa-angle-double-up"></i></a>
    <main>
      <nav id="navigation-bar">
        <div class="container">
          <img src="../img/UDW Logo.png" alt="UDW Logo" />
          <ul>
            <li><a href="../index.php"class="text-decoration-none">Home</a></li>
          </ul>
        </div>
      </nav>
      <div >
        <form class="slidin-form" method="POST" action="forgotPasswordProcess.php">
          <h3>Reset Password</h3>
          <div class="input-group">
              <label for="email">Email</label>
              <input
              id="email"
                type="email"
                name="email"
                required
              />
            </div>
            <div class="input-group">
              <label for="studentquestion1">Name of your first school?</label>
              <input
              id="studentquestion1"
                type="text"
                name="questionone"
              />
              </div>
            <div class="input-group">
              <label for="studentquestion2">Favourite dessert?</label>
              <input
              id="studentquestion2"
                type="text"
                name="questiontwo"
              />
              </div>
          <input type="submit" value="Reset" name="resetsubmit" class="buttonlight" />
        </form>
      </div>
      </main>
<?php include_once('../Components/footer.php');
?>
  <script src="../JSsrc/scrollTop.js"></script>
