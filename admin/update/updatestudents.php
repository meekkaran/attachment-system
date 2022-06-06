<?php include('../includes/db.php');
$student_id = $_GET['update'];
$sql = "SELECT *  from `students` where student_id = $student_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$fullname = $row['fullname'];
$admissionnumber = $row['admission_number'];
$email = $row['email'];
$phonenumber = $row['phone_number'];
$companyname = $row['company_name'];
$companycontact = $row['company_contact'];
$companyaddress = $row['company_address'];
$companyemail = $row['company_email'];
$companyregion = $row['company_region'];
$password = $row['password'];

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $admissionnumber = $_POST['admission_number'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phone_number'];
    $companyname = $_POST['company_name'];
    $companycontact = $_POST['company_contact'];
    $companyaddress = $_POST['company_address'];
    $companyemail = $_POST['company_email'];
    $companyregion = $_POST['company_region'];
    $startingdate = $_POST['startingdate'];
    $password = $_POST['password'];

    $sql = "update `students` set student_id=$student_id,
    fullname='$fullname',admission_number= '$admissionnumber', email='$email',phone_number='$phonenumber',
    company_name= '$companyname',company_contact='$companycontact', company_address='$companyaddress',
    company_email='$companyemail',company_region='$companyregion',startingdate='$startingdate',password='$password' where student_id = $student_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Data updated carefully";
        header("Location: ../registeredstudents.php");
    } else {
        echo "Data error";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>UpdateStudent</title>
    <link rel="stylesheet" type="text/css" href="../templates/style.css">
</head>

<body>
    <div class="header">
        <h2> Update A Student</h2>
    </div>

    <form method="post" action="">
        <div class="input-group">
            <label>Fullname</label>
            <input type="text" name="fullname" value="<?php echo $fullname ?>">
        </div>
        <div class="input-group">
            <label>Admission Number</label>
            <input type="text" name="admission_number" value="<?php echo $admissionnumber ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email ?>">
        </div>
        <div class="input-group">
            <label>Phone Number</label>
            <input type="text" name="phone_number" value="<?php echo $phonenumber ?>">
        </div>
        <div class="input-group">
            <label>Company Name</label>
            <input type="text" name="company_name" value="<?php echo $companyname ?>">
        </div>
        <div class="input-group">
            <label>Company Contact</label>
            <input type="text" name="company_contact" value="<?php echo $companycontact ?>">
        </div>
        <div class="input-group">
            <label>Company Address</label>
            <input type="text" name="company_address" value="<?php echo $companyaddress ?>">
        </div>
        <div class="input-group">
            <label>Company Email</label>
            <input type="text" name="company_email" value="<?php echo $companyemail ?>">
        </div>
        <div class="input-group">
            <label for="companyregion">Company Region:</label>
            <select name="companyregion">
                <option value="Central Region">Central Region</option>
                <option value="Coast Region">Coast Region</option>
                <option value="Eastern Region">Eastern Region</option>
                <option value="Nairobi Region">Nairobi Region</option>
                <option value="North Eastern Region">North Eastern Region</option>
                <option value="Nyanza Region">Nyanza Region</option>
                <option value="Rift Valley Region">Rift Valley Region</option>
                <option value="Western Region">Western Region</option>
            </select>
        </div>
        <div class="input-group">
            <label>Starting Date</label>
            <input type="date" name="startingdate" value="<?php echo $startingdate ?>">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" value="<?php echo $password ?>">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="submit">Update</button>
        </div>
    </form>
</body>

</html>