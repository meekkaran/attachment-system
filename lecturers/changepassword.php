<?php
session_start();
include "./includes/db.php";

//change password

if (isset($_POST['change_pwd'])) {
    $role_id = $_POST['role_id'];
    $cpassword = $_POST['cpassword'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    $cpassword = md5($cpassword);

    $stmt = "SELECT * FROM lecturers WHERE role_id='$role_id' and password='$cpassword'"; #check for a user with the same username and password
    $result = mysqli_query($conn, $stmt);/* execute the query */
    $rows = mysqli_num_rows($result);/* count the number of arrays returened by the query */
    if ($rows !== 1) #if current credentials are wrong
    {
        echo "<script>alert('Invalid username or password')</script>";
    } elseif ($password == $re_password) {
        $password = md5($password);
        $sql = "UPDATE lecturers SET password='$password' WHERE role_id='$role_id' ";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            //insert into logs
            $lecturer_id = $_SESSION['user']['lecturer_id'];
            $date = date('Y-m-d H:i:s');
            $stmt3 = "INSERT INTO lecturerlogs(lecturer_id,action,time) VALUES('$lecturer_id','Change password','$date')";
            $query = mysqli_query($conn, $stmt3);

            echo "<script>alert('Password updated successfully');window.location = 'lecturerlogin.php'</script>";
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
                </span><span style="font-family:serif"><?php echo $_SESSION['user']['lecname']; ?></span></div>
        <?php endif ?>
    </div>
    <div class="admincontent">
        <div class="sidebar">
            <ul id="menu_list">
                <a class="menu_items_link" href="lecturerprofile.php">
                    <li class="menu_items_list">My Profile</li>
                </a>
                <a class="menu_items_link" href="assigned.php">
                    <li class="menu_items_list">Assigned Students</li>
                </a>
                <a class="menu_items_link" href="assigned.php">
                    <li class="menu_items_list">Students' Logbooks</li>
                </a>
                <a class="menu_items_link" href="changepassword.php">
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Change Password</li>
                </a>
                <a class="menu_items_link" href="assigned.php?logout">
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
                <label>Role ID</label>
                <input type="text" name="role_id" id="role_id">
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
                //validate role_id
                //if role ID is empty
                role_id = document.getElementById("role_id").value;
                if (role_id == "" || role_id.length < 4) {
                    alert("Please enter your Role ID");
                    document.getElementById("role_id").focus();
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