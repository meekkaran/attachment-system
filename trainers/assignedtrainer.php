<?php
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
?>

<html>

<head>
    <title>Trainer</title>
    <link rel="stylesheet" href="templates/css/style1.css" />
    <link rel="stylesheet" href="templates/css/logbookstyle.css" />
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
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Add Student</li>
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
        <div class="studentsform">
            <h2>Enter Students Registration Number</h2>
            <div class="formcontainer">
                <form action="assignedtrainer.php" method="post">
                    <label>Admission Number:</label><br>
                    <input type="text" name="admission_number"><br>
                    <br>
                    <hr>
                    <input type="submit" value="Save Changes" name="savechanges" class="savebtn" />
                </form>
            </div>
            <?php
            $db = mysqli_connect("localhost", "karan", "Karanmeek@21", "dbsupervise");
            if (isset($_POST['savechanges'])) {
                $admissionnumber = $_POST['admission_number'];
                $trainer_id = $_SESSION['user']['trainer_id'];
                // first check the database to make sure a user does not already exist  
                $check_select = "SELECT * FROM `assigned_trainer` WHERE admission_number = '$admissionnumber' AND trainer_id = '$trainer_id'";
                $result = mysqli_query($db, $check_select);
                $numrows = mysqli_fetch_assoc($result);
                if ($numrows > 0) {
                    echo "Student already assigned a trainer";
                } else {
                    $query = "INSERT INTO assigned_trainer( admission_number,trainer_id) VALUES('$admissionnumber','$trainer_id') ";
                    $create_post_query = mysqli_query($db, $query);
                    // confirmQuery($create_post_query);
                    if ($create_post_query) {
                        echo "Valid Admission Number,Proceed to view Student logbook";
                    } else {
                        echo "Enter A Valid Admission number";
                    }
                }
            }
            ?>
        </div>
    </div>

    <!-- footer section -->

</body>

</html>