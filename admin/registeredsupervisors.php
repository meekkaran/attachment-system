<?php include "./includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en" class="bg-pink">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Registered Supervisors</li>
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
            <h2>Fixed sidebar menu html css</h2>
            <div class="addbutton">
                <button class="add"><a href="./add/addlecturer.php">Add Lecturer</a></button>
            </div>
            <table border="1" cellpadding="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Roll ID</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>CreatedAt</th>
                        <th>Allocated</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM  lecturers";
                    $query_select_all = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($query_select_all)) {
                        $lecturer_id = $row['lecturer_id'];
                        $lecname = $row['lecname'];
                        $role_id = $row['role_id'];
                        $email = $row['email'];
                        $phonenumber = $row['phonenumber'];
                        $created_at = $row['created_at'];
                        $Allocated = $row['Allocated'];

                        echo "<tr>";
                        echo "<td>{$lecturer_id}</td>";
                        echo "<td>{$lecname}</td>";
                        echo "<td>{$role_id}</td>";
                        echo "<td>{$email}</td>";
                        echo "<td>{$phonenumber}</td>";
                        echo "<td>{$created_at}</td>";
                        echo "<td>{$Allocated}</td>";

                        echo "<td><a href='update/updatelecturers.php?update={$lecturer_id}'class='adminbtn1'>Update</a></td>";
                        echo "<td><a href='registeredsupervisors.php?delete={$lecturer_id}'class='adminbtn'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>
                    <!-- deleting records from the db -->
                    <?php
                    if (isset($_GET['delete'])) {
                        $lecturer_id = $_GET['delete'];
                        $sql = "DELETE from `lecturers` where lecturer_id = $lecturer_id";
                        $result = mysqli_query($conn, $sql);
                    }
                    ?>

                </tbody>
            </table>
        </div>


    </div>


</body>



</html>