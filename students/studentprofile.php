<?php
session_start();
include "./includes/db.php";

if (!isset($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: studentlogin.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: studentlogin.php");
}
$admissionnumber = $_SESSION['user']['admission_number'];
$q = mysqli_query($conn, "SELECT * FROM students WHERE admission_number = '$admissionnumber'");
$row = mysqli_fetch_assoc($q);
$fullname = $row['fullname'];
$admissionnumber = $row['admission_number'];
$email = $row['email'];
$phonenumber = $row['phone_number'];
$department = $row['department'];
$companyname = $row['company_name'];
$companycontact = $row['company_contact'];
$companyaddress = $row['company_address'];
$companyemail = $row['company_email'];

?>

<html>

<head>
    <title>profile</title>
    <link rel="stylesheet" href="templates/css/style1.css" />
    <link rel="stylesheet" href="templates/css/style.css">
</head>
<style>
    .column {
        float: left;
        width: 100%;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
</style>

<body>
    <div id="top-navigation">
        <div id="logo"> CIAMS</div>
        <?php if (isset($_SESSION['user'])) : ?>
            <div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp;
                </span><span style="font-family:serif"><?php echo $_SESSION['user']['fullname']; ?></span></div>
        <?php endif ?>
    </div>
    <div class="admincontent">
        <div class="sidebar">
            <ul id="menu_list">
                <a class="menu_items_link" href="studentprofile.php">
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">My Profile</li>
                </a>
                <a class="menu_items_link" href="logbook.php">
                    <li class="menu_items_list">Attachment Logbook</li>
                </a>
                <a class="menu_items_link" href="submitreports.php">
                    <li class="menu_items_list">Submit Reports</li>
                </a>
                <a class="menu_items_link" href="changepassword.php">
                    <li class="menu_items_list">Change Password</li>
                </a>
                <a class="menu_items_link" href="submitreports.php?logout">
                    <li class="menu_items_list">Logout</li>
                </a>
            </ul>
        </div>
    </div>

    <div class="main">
        <h2>MY DETAILS</h2>
        <form action="studentprofile.php" method="GET">
            <div class="row">
                <div class="column">
                    <h2>PERSONAL DETAILS</h2>
                    <div class="inputform">
                        <label>Fullname</label>
                        <input type="text" id="fullname" name="fullname" value="<?php echo $fullname ?>">
                    </div>
                    <div class="inputform">
                        <label>Admission Number</label>
                        <input type="text" id="admissionnumber" name="admissionnumber" value="<?php echo $admissionnumber ?>">
                    </div>
                    <div class="inputform">
                        <label>Email</label>
                        <input type="text" id="email" name="email" value="<?php echo $email ?>">
                    </div>
                    <div class="inputform">
                        <label>Phone Number</label>
                        <input type="text" id="phonenumber" name="phonenumber" value="<?php echo $phonenumber ?>">
                    </div>
                    <div class="inputform">
                        <label for="department">Department:</label>
                        <input type="text" id="department" name="department" value="<?php echo $department ?>">
                    </div>
                </div>
                <div class="column">
                    <h2>COMPANY DETAILS</h2>
                    <div class="inputform">
                        <label>Company Name</label>
                        <input type="text" id="companyname" name="companyname" value="<?php echo $companyname ?>">
                    </div>
                    <div class="inputform">
                        <label>Company Contact</label>
                        <input type="text" id="companycontact" name="companycontact" value="<?php echo $companycontact ?>">
                    </div>
                    <div class="inputform">
                        <label>Company Address</label>
                        <input type="text" id="companyaddress" name="companyaddress" value="<?php echo $companyaddress ?>">
                    </div>
                    <div class="inputform">
                        <label>Company Email</label>
                        <input type="text" id="companyemail" name="companyemail" value="<?php echo $companyemail ?>">
                    </div>
                </div>
            </div>
        </form>

    </div>
</body>

</html>
</body>

</html>