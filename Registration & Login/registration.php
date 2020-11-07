<?php
$page_title = "Register";
include_once('../Components/headerTwo.php');
//if the id input in registration form already exists, shows message
if ($_GET['action'] == 'idexists') {
    echo '<script language="javascript">';
    echo 'alert("ID already exists.")';
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
                    <li><a href="../index.php" class="text-decoration-none">Home</a></li>
                    <li><a id="toggleButton" href="#" class="text-decoration-none">Log In</a></li>
                </ul>
            </div>
        </nav>
        <div class="slidin-body" id="toggleMe">
            <form class="slidin-form" action="process-form.php" method="POST">
                <img src="../img/CMS logo.png" alt="CMS logo" />
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
                    Forgot password? click <a href="../Forgot Password" target="_blank">here</a> to reset.</p>
            </form>
        </div>
        <div class="reg-form">
            <div>
                <img src="../img/CMS logo.png" alt="CMS Logo" />
                <h3>Registration</h3>
            </div>
            <div class="reg-tabs" class="reg-tab-switch">
                <div onclick="changeTab(this)" data-tab="reg-student-form" class="reg-student-form-tab">
                    Student
                </div>
                <div onclick="changeTab(this)" data-tab="reg-acstaff-form" class="reg-acstaff-form-tab">
                    Academic Staff
                </div>
            </div>
            <!-- reg-form wrapper wraps both forms,shows the form
           for academic staff when "active" class is appended  -->
            <div class="reg-form-wrapper" id="form-body">
                <!-- form for students -->
                <form class="reg-student-form" action="process-form.php" method="POST" onSubmit="return checkPassword(this)">
                    <div class="reg-input-group">
                        <label for="studentID">Student ID</label>
                        <input name="studentID" id="studentID" type="number" placeholder="Student ID" required />
                    </div>
                    <div class="reg-input-group">
                        <label for="studentname">Name</label>
                        <input type="text" placeholder="Name" id="studentname" name="name" />
                    </div>
                    <div class="reg-input-group">
                        <label for="studentemail">Email</label>
                        <input id="studentemail" type="email" name="email" placeholder="Email" required />
                    </div>
                    <div class="reg-input-group">
                        <label for="studentpassword">Password</label>
                        <input id="studentpassword" type="password" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*?[!@#$%^])(?=.*[a-z])(?=.*[A-Z]).{6,12}" title="6 to 12 characters in length.Must contain at least 1 lower case letter, 1 uppercase letter, 1 number and one of
           following special characters ! @ # $ % ^" required />
                    </div>
                    <div class="reg-input-group">
                        <label for="studentconfirmpassword">Confirm Password</label>
                        <input id="studentconfirmpassword" type="password" placeholder="Password" name="confirmPassword" required />
                    </div>
                    <div class="reg-input-group">
                        <label for="studentaddress">Address</label>
                        <input id="studentaddress" type="text" name="address" placeholder="Address" />
                    </div>
                    <div class="reg-input-group">
                        <label for="studentdob">Date of Birth</label>
                        <input id="studentdob" type="date" name="dateofbirth" placeholder="Date of birth" />
                    </div>
                    <div class="reg-input-group">
                        <label for="studentphonenumber">Phone Number</label>
                        <input id="studentphonenumber" type="tel" name="phonenumber" placeholder="Phone number" />
                    </div>
                    <div class="reg-input-group">
                        <label for="studentquestion1">Name of your first school?</label>
                        <input id="studentquestion1" type="text" name="questionone" />
                    </div>
                    <div class="reg-input-group">
                        <label for="studentquestion2">Favourite dessert?</label>
                        <input id="studentquestion2" type="text" name="questiontwo" />
                    </div>
                    <div class="reg-input-group">
                        <input type="submit" value="Submit" name="studentsubmit" class="buttonlight" />
                    </div>
                </form>
                <!-- form for teachers -->
                <form class="reg-acstaff-form" action="process-form.php" method="POST" onSubmit="return checkPassword(this)">
                    <div class="reg-input-group">
                        <label for="acstaffname">Name</label>
                        <input type="text" placeholder="Name" id="acstaffname" name="name" />
                    </div>
                    <div class="reg-input-group">
                        <label for="staffID">Staff ID</label>
                        <input id="staffID" type="number" placeholder="Staff ID" name="staffID" required />
                    </div>
                    <div class="reg-input-group">
                        <label for="acstaffemail">Email</label>
                        <input id="acstaffemail" type="email" placeholder="Email" name="email" required />
                    </div>
                    <div class="reg-input-group">
                        <label for="acstaffpassword">Password</label>
                        <input id="acstaffpassword" type="password" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*?[!@#$%^])(?=.*[a-z])(?=.*[A-Z]).{6,12}" title="6 to 12 characters in length.Must contain at least 1 lower case letter, 1 uppercase letter, 1 number and one of
           following special characters ! @ # $ % ^" required />
                    </div>
                    <div class="reg-input-group">
                        <label for="acstaffconfirmpassword">Confirm Password</label>
                        <input id="acstaffconfirmpassword" type="password" placeholder="Password" name="confirmpassword" required />
                    </div>
                    <div class="reg-input-group">
                        <label for="acstaffqualification">Qualification</label>
                        <select id="acstaffqualification" name="qualification">
                            <option value="PhD">PhD</option>
                            <option value="Master">Master</option>
                            <option value="Bachelor">Bachelor</option>
                        </select>
                    </div>
                    <div class="reg-input-group">
                        <label for="acstaffexpertise">Expertise</label>
                        <select name="expertise" id="acstaffexpertise">
                            <option value="Information Systems">Information Systems</option>
                            <option value="Human Computer Interaction">Human Computer Interaction</option>
                            <option value="Network Administration">Network Administration</option>
                        </select>
                    </div>
                    <div class="reg-input-group">
                        <label for="acstaffphonenumber">Phone Number</label>
                        <input id="acstaffphonenumber" type="tel" placeholder="Phone number" name="phonenumber" />
                    </div>
                    <div class="reg-input-group">
                        <label for="acstaffquestion1">Name of your first school?</label>
                        <input id="acstaffquestion1" type="text" name="questionone" />
                    </div>
                    <div class="reg-input-group">
                        <label for="acstaffquestion2">Favourite dessert?</label>
                        <input id="acstaffquestion2" type="text" name="questiontwo" />
                    </div>
                    <div class="reg-input-group">
                        <input type="submit" value="Submit" name="acstaffsubmit" class="buttonlight" />
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php 
include_once('../Components/footer.php');
?>
  <script src="../JSsrc/regform-tabswitch.js"></script>
  <script src="../JSsrc/checkPassword.js"></script>
  <script src="../JSsrc/slideToggle.js"></script>
  <script src="../JSsrc/scrollTop.js"></script>