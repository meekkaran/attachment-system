<?php include('../includes/db.php');
if (isset($_POST['submit'])) {
    $lecname = $_POST['lecname'];
    $role_id = $_POST['role_id'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];

    $sql = "INSERT into `lecturers` (lecname,role_id, email, phonenumber,password, created_at)
    values('$lecname','$role_id','$email','$phonenumber','$password', now())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Data inserted carefully";
        header("Location: ../registeredsupervisors.php");
    } else {
        echo "Data error";
    }
}

?>
<!DOCTYPE html>
<html lang="en" class="bg-pink">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CIAMS</title>
    <link rel="stylesheet" href="../templates/admin1.css" />
    <link rel="stylesheet" href="./templates/style1.css" />
    <link rel="stylesheet" type="text/css" href="../templates/style.css">
</head>

<body>
    <div id="top-navigation">
        <div id="logo"> CIAMS</div>
        <div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif"><?php echo "Admin" ?></span></div>
    </div>

    <div class="admincontent">
        <div class="sidebar">
            <ul id="menu_list">
                <a class="menu_items_link" href="../registeredstudents.php">
                    <li class="menu_items_list">Registered Students</li>
                </a>
                <a class="menu_items_link" href="../submitreports.php">
                    <li class="menu_items_list">Student Reports</li>
                </a>
                <a class="menu_items_link" href="../attachmentlogbooks.php">
                    <li class="menu_items_list">Attachment Logbooks</li>
                </a>
                <a class="menu_items_link" href="../registeredsupervisors.php">
                    <li class="menu_items_list">Registered Supervisors</li>
                </a>
                <a class="menu_items_link" href="../assignedlecturers.php">
                    <li class="menu_items_list">Assign Supervisors</li>
                </a>
                <a class="menu_items_link" href="../registeredtrainers.php">
                    <li class="menu_items_list">Registered Trainers</li>
                </a>
                <a class="menu_items_link" href="../studentstrainers.php">
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
            <div class="header">
                <h2> Add A Lecturer</h2>
            </div>

            <form method="post" action="">
                <div class="input-group">
                    <label>Fullname</label>
                    <input type="text" name="lecname" value="">
                </div>
                <div class="input-group">
                    <label>Role ID</label>
                    <input type="text" name="role_id" value="">
                </div>
                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email">
                </div>
                <div class="input-group">
                    <label>Phone Number</label>
                    <input type="text" name="phonenumber" value="">
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password">
                </div>
                <div class="input-group">
                    <button type="submit" class="btn" name="submit">Submit</button>
                </div>
            </form>

        </div>


    </div>


</body>



</html>