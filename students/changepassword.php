<?php
session_start();
include "includes/db.php";

//change password
if (isset($_POST['change_pwd'])) {
    $admissionnumber = $_POST['admissionnumber'];
    $c_password = $_POST['c_password'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];


    $password = md5($password);

    $stmt = "SELECT * FROM students WHERE admissionnumber='$admissionnumber' and password='$password'"; #check for a user with the same username and password 
    $result = mysqli_query($conn, $stmt);/* execute the query */
    $rows = mysqli_num_rows($result);/* count the number of arrays returened by the query */
    if ($rows != 1) #if current credentials are wrong 
    {
        echo "<script>alert('Invalid username or password')</script>";
    }
    if ($password == $re_password) {
        $sql = "UPDATE  students  SET password='$password' WHERE admissionnumber='$admissionnumber' ";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script>alert('Password updated successfully');window.location='changepassword.php'</script>";
        } else {
            echo "<script>alert('Failed to Update password');window.location='changepassword.php'</script>";
        }
    };
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
                </span><span style="font-family:serif"><?php echo $_SESSION['user']['fullname']; ?></span></div>
        <?php endif ?>
    </div>
    <div class="admincontent">
        <div class="sidebar">
            <ul id="menu_list">
                <a class="menu_items_link" href="logbook.php">
                    <li class="menu_items_list">Attachment Logbook</li>
                </a>
                <a class="menu_items_link" href="submitreports.php">
                    <li class="menu_items_list">Submit Reports</li>
                </a>
                <a class="menu_items_link" href="changepassword.php">
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Change Password</li>
                </a>
                <a class="menu_items_link" href="submitreports.php?logout">
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
                <label>Admission Number</label>
                <input type="text" name="admissionnumber" id="admissionnumber">
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
                //validate admission number
                admissionnumber = document.getElementById("admissionnumber").value;
                if (admissionnumber == "" || isNaN(admissionnumber) || admissionnumber.length < 5) {
                    alert("please enter valid admission number");
                    document.getElementById("admissionnumber").focus();
                    return false;
                }
                //validating password
                password = document.getElementById("password").value;
                if (password == "" || password.length < 8) {
                    alert("Password should not be empty and it should have more than 8 characters");
                    document.getElementById("password").focus();
                    return false;
                }
            }
        </script>
    </div>
</body>

</html>
</body>

</html>