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
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Registered Students</li>
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
            <h2>Registered students</h2>

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
                <button class="add"><a href="./add/addstudent.php">Add Student</a></button>
            </div>
            <table border="1" cellpadding="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Reg. Number</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Department</th>
                        <th>Comp. Name</th>
                        <th>Comp. Contact</th>
                        <th>Comp. Address</th>
                        <th>Comp. Email</th>
                        <th>StartingDate</th>
                        <th>Allocated</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <!-- reports php function -->
                <?php
                if (!isset($_POST['choice'])) {
                    $query = "SELECT * FROM students";
                    getData($query);
                } elseif (isset($_POST['choice'])) {
                    $month = $_POST['filterChoice'];
                    $year = $_POST['year'];
                    $department = $_POST['department'];
                    $Allocated = $_POST['Allocated'];


                    $sql = "SELECT * FROM students WHERE YEAR(startingdate)='$year' AND MONTH(startingdate)='$month' AND department='$department' AND Allocated='$Allocated'";
                    getData($sql);
                } elseif (isset($_POST['reset'])) {
                    $query = "SELECT * FROM students";
                    getData($query);
                } else {
                    echo "No data found";
                }
                ?>
                <tbody>
                    <?php
                    function getData($sql)
                    {
                        $conn = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');
                        $data = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($data) > 0) {
                            while ($row = mysqli_fetch_array($data)) {
                                $student_id = $row['student_id'];
                                $fullname = $row['fullname'];
                                $admissionnumber = $row['admission_number'];
                                $email = $row['email'];
                                $phonenumber = $row['phone_number'];
                                $department = $row['department'];
                                $companyname = $row['company_name'];
                                $companycontact = $row['company_contact'];
                                $companyaddress = $row['company_address'];
                                $companyemail = $row['company_email'];
                                $startingdate = $row['startingdate'];
                                $Allocated = $row['Allocated'];

                                echo "<tr>";
                                echo "<td>{$student_id}</td>";
                                echo "<td>{$fullname}</td>";
                                echo "<td>{$admissionnumber}</td>";
                                echo "<td>{$email}</td>";
                                echo "<td>{$phonenumber}</td>";
                                echo "<td>{$department}</td>";
                                echo "<td>{$companyname}</td>";
                                echo "<td>{$companycontact}</td>";
                                echo "<td>{$companyaddress}</td>";
                                echo "<td>{$companyemail}</td>";
                                echo "<td>{$startingdate}</td>";
                                echo "<td>{$Allocated}</td>";
                                echo "<td><a href='update/updatestudents.php?update={$student_id}' class='adminbtn1'>Update</a></td>";
                                echo "<td><a href='delete/deletestudent.php?delete={$student_id}' onclick='return checkdelete()' class='adminbtn'>Delete</a></td>";
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



                    <!-- deleting records from the db -->
                    <?php

                    ?>

                </tbody>
            </table>
        </div>


    </div>


</body>
<script>
    function checkdelete() {
        return confirm('Are you sure you want to delelte this record?');
    }
</script>

</html>