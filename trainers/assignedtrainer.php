<?php
session_start();

if (!isset($_SESSION['trainer_id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: trainerlogin.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['trainer_id']);
    header("location: trainerlogin.php");
}
?>

<!DOCTYPE html>
<html lang="en" class="bg-pink">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trainer</title>
    <link rel="stylesheet" href="templates/css/style1.css" />
    <link rel="stylesheet" href="templates/css/logbookstyle.css" />
    <link rel="stylesheet" href="templates/css/style.css" />
</head>

<body>
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'dbsupervise');
    $query = "SELECT * FROM trainers WHERE trainer_id = {$_SESSION['trainer_id']}";
    $query_trainer_name = mysqli_query($db, $query);
    if (mysqli_num_rows($query_trainer_name) > 0) {
        $row = mysqli_fetch_row($query_trainer_name);
        $trainer = $row[0];
        echo var_dump($trainer);
    }
    //selecting week from table weeks

    ?>
    <div id="top-navigation">
        <div id="logo"> CIAMS</div>
        <div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp;
            </span><span style="font-family:serif"><?php echo $row[1]; ?></span></div>

    </div>
    <div class="admincontent">
        <div class="sidebar">
            <ul id="menu_list">
                <a class="menu_items_link" href="registeredstudents.php">
                    <li class="menu_items_list">DASHBOARD</li>
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
                <a class="menu_items_link" href="../../index.php">
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
            $db = mysqli_connect('localhost', 'root', '', 'dbsupervise');
            if (isset($_POST['savechanges'])) {
                $admissionnumber = $_POST['admission_number'];
                $query = "INSERT INTO assigned_trainer( admission_number,trainer_id) VALUES({$admissionnumber},'{$_SESSION['trainer_id']}') ";
                $create_post_query = mysqli_query($db, $query);
                // confirmQuery($create_post_query);
                if ($create_post_query) {
                    echo "Data inserted Successfully Proceed to view Student logbooks";
                } else {
                    echo "Data error";
                }
            }

            ?>

        </div>

    </div>

    <!-- footer section -->

</body>

</html>