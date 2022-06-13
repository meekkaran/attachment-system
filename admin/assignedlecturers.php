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
                <a class="menu_items_link" href="changepassword.php">
                    <li class="menu_items_list">Change Password</li>
                </a>
                <a class="menu_items_link" href="../../index.php">
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
                    $db = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');
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
                    $db = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');
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
            $db = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');
            if (isset($_POST['save_assigned'])) {
                $student = $_POST['student'];
                $lecturer = $_POST['lecturer'];
                $query = "INSERT INTO assigned(student, lecturer) ";
                $query .=
                    "VALUES({$student},'{$lecturer}') ";
                $create_post_query = mysqli_query($db, $query);
                if ($create_post_query) {
                    echo "Student assigned to a lecturer successfully";
                    // header("Location: ../registeredstudents.php");
                } else {
                    echo "Data error";
                }

                $query2 = "UPDATE lecturers SET Allocated = 'YES' WHERE lecturer_id ='{$lecturer_id}'";
                $result = mysqli_query($db, $query2);
                $query3 = "UPDATE students SET Allocated = 'YES' WHERE student_id ='{$student_id}'";
                $result1 = mysqli_query($db, $query3);
            }
            ?>
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
                        // $query = "SELECT * FROM  assigned";
                        $query = "SELECT  assigned.id,
                        p1.fullname as student,  p2.lecname as lecturer  from assigned
                        join students p1 on assigned.student = p1.student_id
                        join lecturers p2 on assigned.lecturer = p2.lecturer_id";
                        $query_select_all = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($query_select_all)) {
                            $id = $row['id'];
                            $student = $row['student'];
                            $lecturer = $row['lecturer'];


                            echo "<tr>";
                            echo "<td>{$id}</td>";
                            echo "<td>{$student}</td>";
                            echo "<td>{$lecturer}</td>";
                            echo "<td><a href='assignedlecturers.php?delete={$lecturer_id}'class='adminbtn'>Delete</a></td>";

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