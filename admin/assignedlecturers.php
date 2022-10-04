<?php include "./includes/db.php"; ?>
<html>

<head>
    <title>CIAMS</title>
    <link rel="stylesheet" href="./templates/admin1.css" />
    <link rel="stylesheet" href="./templates/style1.css" />
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
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Assign Supervisors</li>
                </a>
                <a class="menu_items_link" href="registeredtrainers.php">
                    <li class="menu_items_list">Registered Trainers</li>
                </a>
                <a class="menu_items_link" href="studentstrainers.php">
                    <li class="menu_items_list">Students' Trainers</li>
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
                <a class="menu_items_link" href="assignedlecturers.php?logout">
                    <li class="menu_items_list">Logout</li>
                </a>
            </ul>
        </div>
        <div class="main">

            <form action="assignedlecturers.php" method="post">
                <h2>Assign Lecturers to students</h2>
                <label>Student</label>
                <select name="student" class="sel">
                    <?php
                    $db = mysqli_connect('localhost', 'karan', 'Karanmeek@21', 'dbsupervise');
                    $query = "SELECT * FROM students ";
                    $select_all_students = mysqli_query($db, $query);
                    // confirmQuery($select_all_categories);
                    while ($row = mysqli_fetch_assoc($select_all_students)) {
                        $student_id = $row['student_id'];
                        $fullname = $row['fullname'];
                        echo "<option value='{$student_id}'>{$fullname}</option>";
                    }
                    ?>
                </select>
                <label>Lecturer</label>
                <select name="lecturer" class="sel">
                    <?php
                    $db = mysqli_connect('localhost', 'karan', 'Karanmeek@21', 'dbsupervise');
                    $query = "SELECT * FROM lecturers ";
                    $select_all_lecturers = mysqli_query($db, $query);
                    // confirmQuery($select_all_categories);
                    while ($row = mysqli_fetch_assoc($select_all_lecturers)) {
                        $lecturer_id = $row['lecturer_id'];
                        $lecname = $row['lecname'];
                        echo "<option value='{$lecturer_id}'>{$lecname}</option>";
                    }
                    ?>
                </select>
                <br>
                <hr>
                <input type="submit" value="Save Changes" name="save_assigned" class="savebtn" />
            </form>

            <?php

            if (isset($_POST['save_assigned'])) {
                $db = mysqli_connect('localhost', 'karan', 'Karanmeek@21', 'dbsupervise');
                $student = $_POST['student'];
                $lecturer = $_POST['lecturer'];

                // first check the database to make sure a user does not already exist  
                $check_select = "SELECT * FROM `assigned` WHERE student = '$student' AND lecturer = '$lecturer'";
                $result = mysqli_query($db, $check_select);
                $numrows = mysqli_fetch_assoc($result);
                if ($numrows > 0) {
                    echo "Student already assigned a lecturer";
                } else {

                    $query = "INSERT INTO assigned(student, lecturer) ";
                    $query .=
                        "VALUES({$student},'{$lecturer}') ";
                    $create_post_query = mysqli_query($db, $query);
                    if ($create_post_query) {
                        echo "Student assigned to a lecturer successfully";
                        //update lecturer and student table set allocated field to "yes"
                        $query2 = "UPDATE lecturers SET Allocated = 'YES' WHERE lecturer_id ='{$lecturer_id}'";
                        $result2 = mysqli_query($db, $query2);
                        $query3 = "UPDATE students SET Allocated = 'YES' WHERE student_id ='{$student_id}'";
                        $result3 = mysqli_query($db, $query3);
                    } else {
                        echo "Error occurred when assigning!";
                    }
                }
            }
            ?>
            <!-- table displaying lecturers awith their allocated students -->
            <div class="allocated">
                <h1>List of Lecturers with their Allocated Students</h1>
                <table border="1" cellpadding="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Lecturer Name</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT assigned.id, p1.fullname as student,  p2.lecname as lecturer  from assigned
                        INNER join students p1 on assigned.student = p1.student_id
                        INNER join lecturers p2 on assigned.lecturer = p2.lecturer_id";
                        $query_select_all = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($query_select_all)) {
                            $id = $row['id'];
                            $student = $row['student'];
                            $lecturer = $row['lecturer'];


                            echo "<tr>";
                            echo "<td>{$id}</td>";
                            echo "<td>{$student}</td>";
                            echo "<td>{$lecturer}</td>";
                            echo "<td><a href='delete/deleteallocated.php?delete={$id}'class='adminbtn'>Delete</a></td>";
                            echo "</tr>";
                        };
                        ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</body>



</html>