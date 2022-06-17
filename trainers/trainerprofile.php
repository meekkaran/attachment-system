<?php
include "./includes/db.php";
session_start();
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


$email = $_SESSION['user']['email'];
$q = mysqli_query($conn, "SELECT * FROM trainers WHERE email = '$email'");
$row = mysqli_fetch_assoc($q);
$trainername = $row['trainername'];
$email = $row['email'];
$mobile = $row['mobile'];
$title = $row['title'];

?>
<html>

<head>
    <title>Trainer</title>
    <link rel="stylesheet" href="templates/css/style1.css" />
    <link rel="stylesheet" href="templates/css/logbookstyle.css" />
    <link rel="stylesheet" href="templates/css/style.css" />
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
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">My Profile</li>
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
                    <li class="menu_items_list">Change Password</li>
                </a>
                <a class="menu_items_link" href="assignedtrainer.php?logout">
                    <li class="menu_items_list">Logout</li>
                </a>
            </ul>
        </div>
    </div>

    <div class="main">
        <form method="post" action="">
            <h2>MY PROFILE</h2>
            <div class="inputform">
                <label>Trainer Full Name</label>
                <input type="text" name="trainername" value="<?php echo $trainername ?>">
            </div>
            <div class="inputform">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email ?>">
            </div>
            <div class="inputform">
                <label>Mobile</label>
                <input type="text" name="mobile" value="<?php echo $mobile ?>">
            </div>
            <div class="inputform">
                <label>Title</label>
                <input type="text" name="title" value="<?php echo $title ?>">
            </div>
        </form>
    </div>
</body>

</html>