<?php
include "./includes/db.php";
session_start();
//no one can access this page apart from the lecturers /(security)
if ($_SESSION['utype'] == 'lecturer') {
} else {
    echo "<script>alert('You must login first')</script>";
    echo "<script>location.href'lecturerlogin.php'</script>";
}

if (!isset($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: lecturerlogin.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: lecturerlogin.php");
}
$role_id = $_SESSION['user']['role_id'];
$q = mysqli_query($conn, "SELECT * FROM lecturers WHERE role_id = '$role_id'");
$row = mysqli_fetch_assoc($q);
$lecname = $row['lecname'];
$role_id = $row['role_id'];
$email = $row['email'];
$phonenumber = $row['phonenumber'];
$department = $row['department'];

?>

<html>

<head>
    <title>Lecturer</title>
    <link rel="stylesheet" href="templates/css/style.css">
    <link rel="stylesheet" href="templates/css/style1.css" />
    <link rel="stylesheet" href="templates/css/logbookstyle.css" />
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
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">My Profile</li>
                </a>
                <a class="menu_items_link" href="assigned.php">
                    <li class="menu_items_list">Assigned Students</li>
                </a>
                <a class="menu_items_link" href="assigned.php">
                    <li class="menu_items_list">Students' Logbooks</li>
                </a>
                <a class="menu_items_link" href="changepassword.php">
                    <li class="menu_items_list">Change Password</li>
                </a>
                <a class="menu_items_link" href="assigned.php?logout">
                    <li class="menu_items_list">Logout</li>
                </a>
            </ul>
        </div>
    </div>

    <div class="main">
        <h2>MY PROFILE</h2>
        <form method="GET" action="lecturerprofile.php">
            <h2>MY DETAILS</h2>
            <div class="inputform">
                <label>Fullname</label>
                <input type="text" name="lecname" value="<?php echo $lecname ?>">
            </div>
            <div class="inputform">
                <label>Role ID</label>
                <input type="text" name="role_id" value="<?php echo $role_id ?>">
            </div>
            <div class="inputform">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email ?>">
            </div>
            <div class="inputform">
                <label>Phone Number</label>
                <input type="text" name="phonenumber" value="<?php echo $phonenumber ?>">
            </div>
            <div class="inputform">
                <label for="department">Department:</label>
                <input type="text" id="department" name="department" value="<?php echo $department ?>">
            </div>
        </form>
    </div>

    <!-- footer section -->
</body>

</html>