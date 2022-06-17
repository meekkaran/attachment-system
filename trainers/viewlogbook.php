<?php
session_start();

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

<!DOCTYPE html>
<html lang="en" class="bg-pink">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trainer</title>
    <link rel="stylesheet" href="templates/css/style1.css" />
    <link rel="stylesheet" href="templates/css/logbookstyle.css" />
</head>

<body>
    <?php
    $db = mysqli_connect('localhost', 'karan', 'Karanmeek@21', 'dbsupervise');
    $query = "SELECT * FROM trainers WHERE trainer_id = {$_SESSION['user']['trainer_id']}";
    $query_trainer_name = mysqli_query($db, $query);
    if (mysqli_num_rows($query_trainer_name) > 0) {
        $row = mysqli_fetch_assoc($query_trainer_name);
        $_SESSION['trainer_id'] = $row['trainer_id'];
        // echo var_dump($_SESSION['student_id']);
    }
    ?>
    <div id="top-navigation">
        <div id="logo"> CIAMS</div>
        <div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp;
            </span><span style="font-family:serif"><?php echo $row['trainername']; ?></span></div>

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
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Assigned Student</li>
                </a>
                <a class="menu_items_link" href="">
                    <li class="menu_items_list">Student Logbook</li>
                </a>
                <a class="menu_items_link" href="changepassword.php">
                    <li class="menu_items_list">Change Password</li>
                </a>
                <a class="menu_items_link" href="viewlogbook.php?logout">
                    <li class="menu_items_list">Logout</li>
                </a>
            </ul>
        </div>
    </div>

    <div class="main">
        <h2>STUDENT LOGBOOK</h2>
        <div class="logbooktable">
            <table class="table table-striped" id="mytable" border="2" style="background-color: #84ed86; color: #761a9b; margin: 0 auto;">
                <tr>
                    <th><b>Full Name</b></th>
                    <th><b>Admission Number</b></th>
                    <th><b>Company Name</b></th>
                    <th><b>Company Address</b></th>
                    <th><b>Action</b></th>
                </tr>
                <tbody id="show_data">

                    <?php
                    $trainer_id = $_SESSION['trainer_id'];
                    $conn = mysqli_connect("localhost", "karan", "Karanmeek@21", "dbsupervise");
                    $sql = "SELECT * FROM assigned_trainer LEFT JOIN students ON students.admission_number=assigned_trainer.admission_number WHERE assigned_trainer.trainer_id=$trainer_id";
                    $res = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($res)) {
                        $student_id = $row['student_id'];
                        $fullname = $row['fullname'];
                        $admissionnumber = $row['admission_number'];
                        $companyname = $row['company_name'];
                        $companyaddress = $row['company_address'];
                        echo "<tr>";
                        echo "<td>{$fullname}</td>";
                        echo "<td>{$admissionnumber}</td>";
                        echo "<td>{$companyname}</td>";
                        echo "<td>{$companyaddress}</td>";
                        echo "<td><a href='trainerstudentlogbook.php?edit={$student_id}'>Logbook</a></td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>


    </div>

    <!-- footer section -->

</body>

</html>