<?php include "./includes/db.php"; ?>
<html>

<head>
    <title>CIAMS</title>
    <link rel="stylesheet" href="./templates/admin1.css" />
</head>

<body>
    <div id="top-navigation">
        <div id="logo"> CIAMS</div>
        <div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif"><?php echo "Admin" ?></span></div>
    </div>

    <div class="admincontent">
        <div class="sidebar">
            <ul id="menu_list">
                <a class="menu_items_link" href="dashboard.php">
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Dashboard</li>
                </a>
                <a class="menu_items_link" href="registeredstudents.php">
                    <li class="menu_items_list">Registered Students</li>
                </a>
                <a class="menu_items_link" href="submitreports.php">
                    <li class="menu_items_list">Student Reports</li>
                </a>
                <a class="menu_items_link" href="attachmentlogbooks.php">
                    <li class="menu_items_list">Attachment Logbooks</li>
                </a>
                <a class="menu_items_link" href="registeredsupervisors.php">
                    <li class="menu_items_list">Registered Supervisors</li>
                </a>
                <a class="menu_items_link" href="assignedlecturers.php">
                    <li class="menu_items_list">Assign Supervisors</li>
                </a>
                <a class="menu_items_link" href="registeredtrainers.php">
                    <li class="menu_items_list">Registered Trainers</li>
                </a>
                <a class="menu_items_link" href="studentstrainers.php">
                    <li class="menu_items_list">Students' Trainers</li>
                </a>
                <a class="menu_items_link" href="changepassword.php">
                    <li class="menu_items_list">Change Password</li>
                </a>
                <a class="menu_items_link" href="../../index.php">
                    <li class="menu_items_list">Logout</li>
                </a>
            </ul>
        </div>
        <div class="main">
            <div class="main2">
                <h2>Registered users in the system</h2>
                <div class="columns">
                    <div class="column">
                        <h4>REGISTERED LECTURERS</h4>
                        <?php
                        $conn = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');
                        $query = "SELECT * FROM lecturers ORDER BY lecturer_id";
                        $query_run = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($query_run);
                        echo '<h1> ' . $row . '</h1>';
                        ?>
                    </div>
                    <div class="column">
                        <h4>REGISTERED STUDENTS</h4>
                        <?php
                        $conn = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');
                        $query = "SELECT * FROM students ORDER BY student_id";
                        $query_run = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($query_run);
                        echo '<h1> ' . $row . '</h1>';
                        ?>
                    </div>
                    <div class="column">
                        <h4>REGISTERED TRAINERS</h4>
                        <?php
                        $conn = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');
                        $query = "SELECT * FROM trainers ORDER BY trainer_id";
                        $query_run = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($query_run);
                        echo '<h1> ' . $row . '</h1>';
                        ?>
                    </div>
                </div>
                <h2>List of both students and lecturers who have been assigned </h2>
                <div class="columns">
                    <div class="column">
                        <h4>ALLOCATED LECTURERS</h4>
                        <?php
                        $conn = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');
                        $query = "SELECT * FROM lecturers WHERE Allocated = 'YES'";
                        $query_run = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($query_run);
                        echo '<h1> ' . $row . '</h1>';
                        ?>
                    </div>
                    <div class="column">
                        <h4>ALLOCATED STUDENTS</h4>
                        <?php
                        $conn = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');
                        $query = "SELECT * FROM students WHERE Allocated = 'YES'";
                        $query_run = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($query_run);
                        echo '<h1> ' . $row . '</h1>';
                        ?>
                    </div>
                </div>
                <h2>List of both students and lecturers who have not been assigned </h2>
                <div class="columns">
                    <div class="column">
                        <h4>UNALLOCATED LECTURERS</h4>
                        <?php
                        $conn = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');
                        $query = "SELECT * FROM lecturers WHERE Allocated = 'NO'";
                        $query_run = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($query_run);
                        echo '<h1> ' . $row . '</h1>';
                        ?>
                    </div>
                    <div class="column">
                        <h4>UNALLOCATED STUDENTS</h4>
                        <?php
                        $conn = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');
                        $query = "SELECT * FROM students WHERE Allocated = 'NO'";
                        $query_run = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($query_run);
                        echo '<h1> ' . $row . '</h1>';
                        ?>
                    </div>
                </div>
            </div>

        </div>


</body>



</html>