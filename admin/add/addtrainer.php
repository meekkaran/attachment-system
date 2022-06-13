<?php include('../includes/db.php');
if (isset($_POST['submit'])) {
    $trainername = $_POST['trainername'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $title = $_POST['title'];
    $password_1  = $_POST['password_1'];
    $password_2  = $_POST['password_2'];

    if (count($errors) == 0) {
        $password = md5($password_1);
        $sql = "INSERT into `trainers` (trainername,email,mobile,title,password, created_at)
    values('$trainername','$email','$mobile','$title','$password', now())";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Successfully added a new trainer";
            // header("Location:../registeredtrainers.php");
        } else {
            echo "Error,check whether you have entered details correctly";
        }
    }
}

function display_error()
{
    global $errors;

    if (count($errors) > 0) {
        echo '<div class="error">';
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo '</div>';
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
            <div class="header">
                <h2> Add A trainer</h2>
            </div>

            <form method="post" action="">
                <?php include('../includes/errors.php'); ?>
                <div class="inputform">
                    <label>Trainer Full Name</label>
                    <input type="text" name="trainername" value="">
                </div>
                <div class="inputform">
                    <label>Email</label>
                    <input type="email" name="email" value="">
                </div>
                <div class="inputform">
                    <label>Mobile</label>
                    <input type="text" name="mobile" value="">
                </div>
                <div class="inputform">
                    <label>Title</label>
                    <input type="text" name="title" value="">
                </div>
                <div class="inputform">
                    <label>Password</label>
                    <input type="password" name="password_1">
                </div>
                <div class="inputform">
                    <label>Confirm password</label>
                    <input type="password" name="password_2">
                </div>
                <div class="inputform">
                    <button type="submit" class="btn" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>