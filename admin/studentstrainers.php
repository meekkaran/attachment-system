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
                    <li class="menu_items_list">Dashboard</li>
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
                <a class="menu_items_link" href="studentstrainers.php">
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Students' Trainers</li>
                </a>
                <a class="menu_items_link" href="studentslogs.php">
                    <li class="menu_items_list">Student Logs</li>
                </a>
                <a class="menu_items_link" href="lecturerlogs.php">
                    <li class="menu_items_list">Lecturer logs</li>
                </a>
                <a class="menu_items_link" href="trainerlogs.php">
                    <li class="menu_items_list">Trainer Logs</li>
                </a>
                <a class="menu_items_link" href="changepassword.php">
                    <li class="menu_items_list">Change Password</li>
                </a>
                <a class="menu_items_link" href="studentstrainers.php?logout?">
                    <li class="menu_items_list">Logout</li>
                </a>
            </ul>
        </div>
        <div class="main">
            <h2>List of students with their trainers</h2>
            <table border="1" cellpadding="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student Adm.No.</th>
                        <th>TrainerId</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM  assigned_trainer";
                    $query_select_all = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($query_select_all)) {
                        $id = $row['id'];
                        $admission_number = $row['admission_number'];
                        $trainer_id = $row['trainer_id'];


                        echo "<tr>";
                        echo "<td>{$id}</td>";
                        echo "<td>{$admission_number}</td>";
                        echo "<td>{$trainer_id}</td>";

                        echo "</tr>";
                    }
                    ?>
                    <!-- deleting records from the db -->

                </tbody>
            </table>
        </div>


    </div>


</body>



</html>