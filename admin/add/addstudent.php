<?php include('../includes/db.php');
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $admissionnumber = $_POST['admission_number'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phone_number'];
    $department = $_POST['department'];
    $companyname = $_POST['company_name'];
    $companycontact = $_POST['company_contact'];
    $companyaddress = $_POST['company_address'];
    $companyemail = $_POST['company_email'];
    $startingdate = $_POST['startingdate'];
    $password_1  =  $_POST['password_1'];
    $password_2  = $_POST['password_2'];

    $password = md5($password_1);
    $sql = "INSERT into `students` (fullname,admission_number, email, phone_number, department, company_name, company_contact,
    company_address, company_email, startingdate, password,created_at) 
            VALUES('$fullname','$admissionnumber', '$email','$phonenumber', '$department','$companyname','$companycontact',
            '$companyaddress','$companyemail','$startingdate', '$password',now())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Successfully added a student";
        // header("Location: ../registeredstudents.php");
    } else {
        echo "Error,check whether you have entered details correctly";
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
            <div class="heading">
                <h2>Add Student</h2>
            </div>

            <form method="post" action="">
                <div class="inputform">
                    <label>Fullname</label>
                    <input type="text" name="fullname" value="">
                </div>
                <div class="inputform">
                    <label>Admission Number</label>
                    <input type="text" name="admission_number" value="">
                </div>
                <div class="inputform">
                    <label>Email</label>
                    <input type="email" name="email">
                </div>
                <div class="inputform">
                    <label>Phone Number</label>
                    <input type="text" name="phone_number" value="">
                </div>
                <div class="inputform">
                    <label for="department">Department:</label>
                    <select name="department">
                        <option value="Mathematics and Actuarial Science">Mathematics and Actuarial Science</option>
                        <option value="Computer and Information Science">Computer and Information Science</option>
                        <option value="Community Health and Development">Community Health and Development</option>
                        <option value="Natural Sciences">Natural Sciences</option>
                        <option value="Nursing">Nursing</option>
                    </select>
                </div>
                <div class="inputform">
                    <label>Company Name</label>
                    <input type="text" name="company_name" value="">
                </div>
                <div class="inputform">
                    <label>Company Contact</label>
                    <input type="text" name="company_contact" value="">
                </div>
                <div class="inputform">
                    <label>Company Address</label>
                    <input type="text" name="company_address" value="">
                </div>
                <div class="inputform">
                    <label>Company Email</label>
                    <input type="text" name="company_email" value="">
                </div>
                <div class="inputform">
                    <label>Starting Date</label>
                    <input type="date" name="startingdate" value="">
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