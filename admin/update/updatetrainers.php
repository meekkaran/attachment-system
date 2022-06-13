<?php include('../includes/db.php');
$trainer_id = $_GET['update'];
$sql = "SELECT *  from `trainers` where trainer_id = $trainer_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$trainername = $row['trainername'];
$email = $row['email'];
$mobile = $row['mobile'];
$title = $row['title'];
$password = $row['password'];

if (isset($_POST['submit'])) {
    $trainername = $_POST['trainername'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $title = $_POST['title'];
    $password = $_POST['password'];

    $sql = "update `trainers` set trainer_id=$trainer_id,
    trainername='$trainername',email='$email',mobile='$mobile',password='$password' where trainer_id = $trainer_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Successfully updated trainer's details";
        // header("Location: ../registeredtrainers.php");
    } else {
        echo "Error,check whether you have entered details correctly";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CIAMS</title>
    <link rel="stylesheet" href="../templates/admin1.css" />
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
            <div class="heading">
                <h2> Update A Trainer</h2>
            </div>

            <form method="post" action="">
                <div class="inputform">
                    <label>Trainer Full Name</label>
                    <input type="text" name="trainername" value="<?php echo $trainername ?>">
                </div>
                <div class="inputform">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $email ?>">
                </div>
                <div class="inputform">
                    <label>Mobile</label>
                    <input type="text" name="mobile" value="<?php echo $mobile ?>">
                </div>
                <div class="inputform">
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo $title ?>">
                </div>
                <div class="inputform">
                    <label>Password</label>
                    <input type="password" name="password" value="<?php echo $password ?>">
                </div>
                <div class="inputform">
                    <button type="submit" class="btn" name="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>