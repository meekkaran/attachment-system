<?php include "./includes/db.php"; ?>
<!DOCTYPE html>
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
                <a class="menu_items_link" href="registeredtrainers.php?logout">
                    <li class="menu_items_list">Logout</li>
                </a>
            </ul>
        </div>
        <div class="main">
            <h2>Registered Lecturers</h2>
            <!-- fetching reports  -->
            <div class="reports">
                <form action="#" method="post">
                    <div class="options">
                        <select name="filterChoice">
                            <option selected="selected">select month</option>
                            <option value='01'> JANUARY </option>
                            <option value='02'> FEBRUARY </option>
                            <option value='03'> MARCH </option>
                            <option value='04'> APRIL </option>
                            <option value='05'> MAY </option>
                            <option value='06'> JUNE </option>
                            <option value='07'> JULY </option>
                            <option value='08'> AUGUST </option>
                            <option value='09'> SEPTEMBER </option>
                            <option value='10'> OCTOBER </option>
                            <option value='11'> NOVEMBER </option>
                            <option value='12'> DECEMBER </option>
                        </select>
                        <select name="year" id="year">
                            <option select="selected">select year</option>
                            <?php
                            for ($i = 2018; $i <= date('Y'); $i++) {
                                echo "<option>$i</option>";
                                //given that variable i which has the year 2000
                                //if i variable is less and equal to the current Year
                                //echo the number with option output
                                //++ is an increment operator and the loop will end at the current year
                            }
                            ?>
                        </select>
                        <select name="department" id="department">
                            <option select="department">Department</option>
                            <option value="Mathematics and Actuarial Science">Mathematics and Actuarial Science</option>
                            <option value="Computer and Information Science">Computer and Information Science</option>
                            <option value="Community Health and Development">Community Health and Development</option>
                            <option value="Natural Sciences">Natural Sciences</option>
                            <option value="Nursing">Nursing</option>
                        </select>
                        <select name="Allocated" id="Allocated">
                            <option select="selected">Allocated</option>
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select>
                        <input type="submit" value="filter" name="choice" class="bton">
                        <input type="submit" value="reset" name="reset" class="bton">
                        <button onclick="window.print();" class="bton">Print</button>
                    </div>
                </form>
            </div>

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
                        <th>Department</th>
                        <th>CreatedAt</th>
                        <th>Allocated</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                if (!isset($_POST['choice'])) {
                    $query = "SELECT * FROM lecturers";
                    getData($query);
                } elseif (isset($_POST['choice'])) {
                    $month = $_POST['filterChoice'];
                    $year = $_POST['year'];
                    $department = $_POST['department'];
                    $Allocated = $_POST['Allocated'];

                    $sql = "SELECT * FROM lecturers WHERE YEAR(created_at)='$year' AND MONTH(created_at)='$month' AND department='$department' AND Allocated='$Allocated'";
                    getData($sql);
                } elseif (isset($_POST['reset'])) {
                    $query = "SELECT * FROM lecturers";
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
                                $lecturer_id = $row['lecturer_id'];
                                $lecname = $row['lecname'];
                                $role_id = $row['role_id'];
                                $email = $row['email'];
                                $phonenumber = $row['phonenumber'];
                                $department = $row['department'];
                                $created_at = $row['created_at'];
                                $Allocated = $row['Allocated'];

                                echo "<tr>";
                                echo "<td>{$lecturer_id}</td>";
                                echo "<td>{$lecname}</td>";
                                echo "<td>{$role_id}</td>";
                                echo "<td>{$email}</td>";
                                echo "<td>{$phonenumber}</td>";
                                echo "<td>{$department}</td>";
                                echo "<td>{$created_at}</td>";
                                echo "<td>{$Allocated}</td>";

                                echo "<td><a href='update/updatelecturers.php?update={$lecturer_id}'class='adminbtn1'>Update</a></td>";
                                echo "<td><a href='delete/deletelecturer.php?delete={$lecturer_id}' class='adminbtn'>Delete</a></td>";
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