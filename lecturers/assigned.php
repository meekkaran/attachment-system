<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: lecturerlogin.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: lecturerlogin.php");
}
?>

<!DOCTYPE html>
<html lang="en" class="bg-pink">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lecturer</title>
    <link rel="stylesheet" href="templates/css/style1.css" />
    <link rel="stylesheet" href="templates/css/logbookstyle.css" />
</head>

<body>
    <div id="top-navigation">
        <div id="logo"> CIAMS</div>
        <?php if (isset($_SESSION['user'])) : ?>
            <strong><?php echo $_SESSION['user']['lecturer_id']; ?></strong>

            <small>
                <i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['lecname']); ?>)</i>
                <br>
                <a href="home.php?logout='1'" style="color: red;">logout</a>
                &nbsp; <a href="create_user.php"> + add user</a>
            </small>

        <?php endif ?>
        <?php if (isset($_SESSION['user'])) : ?>
            <div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp;
                </span><span style="font-family:serif"><?php echo $_SESSION['user']['lecname']; ?></span></div>
        <?php endif ?>

    </div>
    <div class="admincontent">
        <div class="sidebar">
            <ul id="menu_list">
                <a class="menu_items_link" href="assigned.php">
                    <li class="menu_items_list">HOME</li>
                </a>
                <a class="menu_items_link" href="assigned.php">
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Assigned Students</li>
                </a>
                <a class="menu_items_link" href="assigned.php">
                    <li class="menu_items_list">Students' Logbooks</li>
                </a>
                <a class="menu_items_link" href="changepassword.php">
                    <li class="menu_items_list">Change Password</li>
                </a>
                <a class="menu_items_link" href="lecturerlogin.php">
                    <li class="menu_items_list">Logout</li>
                </a>
            </ul>
        </div>
    </div>

    <div class="main">
        <h2>STUDENTS' LOGBOOKS</h2>
        <div class="article">
            <table class="table table-striped" id="mytable" border="2" style="background-color: #84ed86; color: #761a9b; margin: 0 auto;">
                <tr>
                    <th><b>Full Name</b></th>
                    <th><b>Admission Number</b></th>
                    <th><b>Phone Number</b></th>
                    <th><b>Company Name</b></th>
                    <th><b>Company Address</b></th>
                    <th><b>Action</b></th>
                </tr>
                <tbody id="show_data">

                    <?php
                    $db = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');
                    if (isset($_SESSION['user'])) {
                        $lecturer = $_SESSION['user']['lecturer_id'];
                    }
                    echo var_dump($lecturer);
                    // $lecturer = "SELECT * FROM lecturers WHERE role_id = $lecturer";
                    // $lecturer_query = mysqli_query($db, $lecturer);
                    // while ($lecturer_id = mysqli_fetch_assoc($lecturer_query)) {

                    //     $lec = $lecturer_id['lecturer_id'];
                    //     // $lec = $lecturer_id['lecturer_id'];
                    // }

                    $conn = mysqli_connect("localhost", "root", "meek", "dbsupervise");
                    $sql = "SELECT * FROM assigned LEFT JOIN students ON students.student_id=assigned.student WHERE lecturer={$lecturer}";
                    $res = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($res)) {
                        $student_id = $row['student_id'];
                        $fullname = $row['fullname'];
                        $admissionnumber = $row['admission_number'];
                        $phonenumber = $row['phone_number'];
                        $companyname = $row['company_name'];
                        $companyaddress = $row['company_address'];
                        echo "<tr>";
                        echo "<td>{$fullname}</td>";
                        echo "<td>{$admissionnumber}</td>";
                        echo "<td>{$phonenumber}</td>";
                        echo "<td>{$companyname}</td>";
                        echo "<td>{$companyaddress}</td>";
                        // echo "<td><a href='categories.php?delete={$student_id}'>Delete</a></td>";
                        echo "<td><a href='lecstudentlogbook.php?edit={$student_id}'>Logbook</a></td>";
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