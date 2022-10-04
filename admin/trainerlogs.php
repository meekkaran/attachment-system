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
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Trainer Logs</li>
                </a>
                <a class="menu_items_link" href="registeredstudents.php?logout">
                    <li class="menu_items_list">Logout</li>
                </a>
            </ul>
        </div>
        <div class="main">
            <h2>Students' Logs</h2>

            <!-- fetching reports  -->
            <div classs="reports">
                <form action="" method="GET">
                    <div class="options">
                        <input type="text" name="trainer_id" placeholder="Enter TrainerID" value="<?php if (isset($_GET['trainer_id'])) {
                                                                                                        echo $_GET['trainer_id'];
                                                                                                    } ?>" />
                        <input type="submit" name="search" value="SEARCH BY ID" class="bton">
                        <input type="submit" value="reset" name="reset" class="bton">
                        <button onclick="window.print();" class="bton">Print</button>
                    </div>
                </form>
            </div>
            <table border="1" cellpadding="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Trainer ID</th>
                        <th>Action</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <!-- reports php function -->
                <?php
                // <!-- search lecturer ID function -->
                $conn = mysqli_connect('localhost', 'karan', 'Karanmeek@21', 'dbsupervise');

                if (!isset($_GET['search'])) {
                    $query = "SELECT * FROM trainerlogs";
                    getData($query);
                } elseif (isset($_GET['search'])) {
                    $trainer_id = $_GET['trainer_id'];
                    $sql = "SELECT * FROM trainerlogs WHERE trainer_id='$trainer_id'";
                    getData($sql);
                } elseif (isset($_POST['reset'])) {
                    $query = "SELECT * FROM trainerlogs";
                    getData($query);
                } else {
                    // <tr><td>No data found!</td></tr>

                }
                ?>
                <tbody>
                    <?php
                    function getData($sql)
                    {
                        $conn = mysqli_connect('localhost', 'karan', 'Karanmeek@21', 'dbsupervise');
                        $data = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($data) > 0) {
                            while ($row = mysqli_fetch_array($data)) {
                                $id = $row['id'];
                                $trainer_id = $row['trainer_id'];
                                $action = $row['action'];
                                $time = $row['time'];

                                echo "<tr>";
                                echo "<td>{$id}</td>";
                                echo "<td>{$trainer_id}</td>";
                                echo "<td>{$action}</td>";
                                echo "<td>{$time}</td>";
                                echo "</tr>";
                            }
                        } else { ?>

                            <tr>
                                <td>No data found!</td>
                            </tr>
                    <?php
                        }
                    }

                    ?>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>