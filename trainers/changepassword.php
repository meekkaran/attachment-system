<?php
session_start();
include "includes/db.php";
//no one can access this page apart from the trainers /(security)
if ($_SESSION['utype'] == 'trainer') {
} else {
    echo "<script>alert('You must login first')</script>";
    echo "<script>location.href'trainerlogin.php'</script>";
}

if (!isset($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: trainerlogin.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: trainerlogin.php");
}

//change password

if (isset($_POST['change_pwd'])) {
    $email = $_POST['email'];
    $cpassword = $_POST['cpassword'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    $cpassword = md5($cpassword);

    $stmt = "SELECT * FROM trainers WHERE email='$email' and password='$cpassword'"; #check for a user with the same username and password
    $result = mysqli_query($conn, $stmt);/* execute the query */
    $rows = mysqli_num_rows($result);/* count the number of arrays returened by the query */
    if ($rows !== 1) #if current credentials are wrong
    {
        echo "<script>alert('Invalid username or password')</script>";
    } elseif ($password == $re_password) {
        $password = md5($password);
        $sql = "UPDATE trainers SET password='$password' WHERE email='$email' ";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $trainer_id = $_SESSION['user']['trainer_id'];
            $date = date('Y-m-d H:i:s');
            $stmt3 = "INSERT INTO trainerlogs(trainer_id,action,time) VALUES('$trainer_id','Change Password','$date')";
            $query = mysqli_query($conn, $stmt3);
            echo "<script>alert('Password updated successfully');window.location = 'trainerlogin.php'</script>";
        } else {
            echo "<script>alert('Failed to Update password');window.location = 'changepassword.php'</script>";
        }
    } else {
        echo "<script>alert('The two passwords do not match');window.location = 'changepassword.php'</script>";
    }
};
?>

<html>

<head>
    <title>submitReports</title>
    <link rel="stylesheet" href="templates/css/style1.css" />
    <link rel="stylesheet" type="text/css" href="templates/css/style.css">

</head>

<body>
    <div id="top-navigation">
        <div id="logo"> CIAMS</div>
        <?php if (isset($_SESSION['user'])) : ?>
            <div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp;
                </span><span style="font-family:serif"><?php echo $_SESSION['user']['trainername']; ?></span></div>
        <?php endif ?>
    </div>
    <div class="admincontent">
        <div class="sidebar">
            <ul id="menu_list">
                <a class="menu_items_link" href="trainerprofile.php">
                    <li class="menu_items_list">My Profile</li>
                </a>
                <a class="menu_items_link" href="assignedtrainer.php">
                    <li class="menu_items_list">Add Student</li>
                </a>
                <a class="menu_items_link" href="viewlogbook.php">
                    <li class="menu_items_list">Assigned Student</li>
                </a>
                <a class="menu_items_link" href="">
                    <li class="menu_items_list">Student Logbook</li>
                </a>
                <a class="menu_items_link" href="changepassword.php">
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Change Password</li>
                </a>
                <a class="menu_items_link" href="changepassword.php?logout">
                    <li class="menu_items_list">Logout</li>
                </a>
            </ul>
        </div>
    </div>

    <div class="main">

        <div class="heading">
            <h2>Change Password</h2>
        </div>

        <form method="post" id="studentlogin" action="changepassword.php" onSubmit="return validateForm()">

            <div class="inputform">
                <label>Email</label>
                <input type="text" name="email" id="email">
            </div>
            <div class="inputform">
                <label>Current Password</label>
                <input type="password" name="cpassword" id="cpassword">
            </div>
            <div class="inputform">
                <label>New Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="inputform">
                <label>Repeat New Password</label>
                <input type="password" name="re_password" id="re_password">
            </div>
            <div class="inputform">
                <button type="submit" class="btn" id="change_pwd" name="change_pwd">Login</button>
            </div>
        </form>
        <script>
            function validateForm() {
                //validate email
                email = document.getElementById("email").value;
                if (email.length == 0 || email.indexOf("@") == -1 || email.indexOf(".") == -1) {
                    alert("You must enter a valid email");
                    document.getElementById("email").focus();
                    return false;
                }
                //validating password
                password = document.getElementById("password").value;
                if (password == "" || password.length < 8) {
                    alert("Password should not be empty and it should have more than 8 characters");
                    document.getElementById("password").focus();
                    return false;
                }
                //validating repeat password
                re_password = document.getElementById("re_password").value;
                if (re_password == "" || re_password.length < 8) {
                    alert("password should not be empty and it should have more than 8 characters");
                    document.getElementById("re_password").focus();
                    return false;
                }
            }
        </script>
    </div>
</body>

</html>
</body>

</html>