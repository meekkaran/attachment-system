<?php include('../includes/db.php');
$student_id = $_GET['update'];
$sql = "SELECT *  from `students` where student_id = $student_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
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
$password = $row['password'];

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
    $password = $_POST['password'];

    $sql = "update `students` set student_id=$student_id,
    fullname='$fullname',admission_number= '$admissionnumber', email='$email',phone_number='$phonenumber',
     department='$department',
    company_name= '$companyname',company_contact='$companycontact', company_address='$companyaddress',
    company_email='$companyemail',startingdate='$startingdate',password='$password' where student_id = $student_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Successfully updated student's details";
        // header("Location: ../registeredstudents.php");
    } else {
        echo "Error,check whether you have entered details correctly";
    }
}

?>
<html>

<head>

    <title>CIAMS</title>
    <link rel="stylesheet" href="../templates/admin1.css" />
    <link rel="stylesheet" type="text/css" href="../templates/style.css">
</head>

<body>

    <div class="heading">
        <h2> Update A Student</h2>
    </div>

    <form method="post" action="">
        <div class="inputform">
            <label>Fullname</label>
            <input type="text" name="fullname" value="<?php echo $fullname ?>">
        </div>
        <div class="inputform">
            <label>Admission Number</label>
            <input type="text" name="admission_number" value="<?php echo $admissionnumber ?>">
        </div>
        <div class="inputform">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email ?>">
        </div>
        <div class="inputform">
            <label>Phone Number</label>
            <input type="text" name="phone_number" value="<?php echo $phonenumber ?>">
        </div>
        <div class="inputform">
            <label for="department">Department:</label>
            <select name="department">
                <option selected disabled><?php echo $department ?></option>
                <option value="Mathematics and Actuarial Science">Mathematics and Actuarial Science</option>
                <option value="Computer and Information Science">Computer and Information Science</option>
                <option value="Community Health and Development">Community Health and Development</option>
                <option value="Natural Sciences">Natural Sciences</option>
                <option value="Nursing">Nursing</option>
            </select>
        </div>
        <div class="inputform">
            <label>Company Name</label>
            <input type="text" name="company_name" value="<?php echo $companyname ?>">
        </div>
        <div class="inputform">
            <label>Company Contact</label>
            <input type="text" name="company_contact" value="<?php echo $companycontact ?>">
        </div>
        <div class="inputform">
            <label>Company Address</label>
            <input type="text" name="company_address" value="<?php echo $companyaddress ?>">
        </div>
        <div class="inputform">
            <label>Company Email</label>
            <input type="text" name="company_email" value="<?php echo $companyemail ?>">
        </div>
        <div class="inputform">
            <label>Starting Date</label>
            <input type="date" name="startingdate" value="<?php echo $startingdate ?>">
        </div>
        <div class="inputform">
            <label>Password</label>
            <input type="password" name="password" value="<?php echo $password ?>">
        </div>
        <div class="inputform">
            <button type="submit" class="btn" name="submit">Update</button>
            <button type="submit" class="btn" name="submit"><a href="../registeredstudents.php">BACK</a></button>
        </div>
    </form>
</body>

</html>