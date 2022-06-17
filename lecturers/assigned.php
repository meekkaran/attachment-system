<?php
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
?>

<html>

<head>
    <title>Lecturer</title>
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
                    <li class="menu_items_list">My Profile</li>
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
                <a class="menu_items_link" href="assigned.php?logout">
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
                    <th><b>Department</b></th>
                    <th><b>Company Name</b></th>
                    <th><b>Company Contact</b></th>
                    <th><b>Company Address</b></th>
                    <th><b>Action</b></th>
                </tr>
                <tbody id="show_data">

                    <?php
                    $db = mysqli_connect('localhost', 'karan', 'Karanmeek@21', 'dbsupervise');
                    if (isset($_SESSION['user'])) {
                        $lecturer = $_SESSION['user']['lecturer_id'];
                    }
                    echo var_dump($lecturer);


                    $conn = mysqli_connect('localhost', 'karan', 'Karanmeek@21', 'dbsupervise');
                    $sql = "SELECT * FROM assigned LEFT JOIN students ON students.student_id=assigned.student WHERE lecturer={$lecturer}";
                    $res = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($res)) {
                        $student_id = $row['student_id'];
                        $fullname = $row['fullname'];
                        $admissionnumber = $row['admission_number'];
                        $phonenumber = $row['phone_number'];
                        $department = $row['department'];
                        $companyname = $row['company_name'];
                        $companycontact = $row['company_contact'];
                        $companyaddress = $row['company_address'];
                        echo "<tr>";
                        echo "<td>{$fullname}</td>";
                        echo "<td>{$admissionnumber}</td>";
                        echo "<td>{$phonenumber}</td>";
                        echo "<td>{$department}</td>";
                        echo "<td>{$companyname}</td>";
                        echo "<td>{$companycontact}</td>";
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