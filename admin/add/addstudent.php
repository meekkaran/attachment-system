<?php include('../includes/db.php');
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $admissionnumber = $_POST['admission_number'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phone_number'];
    $companyname = $_POST['company_name'];
    $companycontact = $_POST['company_contact'];
    $companyaddress = $_POST['company_address'];
    $companyemail = $_POST['company_email'];
    $password = $_POST['password'];

    $sql = "INSERT into `students` (fullname,admission_number, email, phone_number,company_name, company_contact, company_address,
    company_email, password,created_at) 
            VALUES('$fullname','$admissionnumber', '$email','$phonenumber','$companyname','$companycontact','$companyaddress',
            '$companyemail', '$password',now())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Data inserted carefully";
        header("Location: ../registeredstudents.php");
    } else {
        echo "Data error";
    }
}

?>

<!DOCTYPE html>
<html>
<title>AddStudent</title>
<link rel="stylesheet" type="text/css" href="../templates/style.css">
</head>

<body>
    <div class="header">
        <h2>Add Student</h2>
    </div>

    <form method="post" action="">
        <div class="input-group">
            <label>Fullname</label>
            <input type="text" name="fullname" value="">
        </div>
        <div class="input-group">
            <label>Admission Number</label>
            <input type="text" name="admission_number" value="">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email">
        </div>
        <div class="input-group">
            <label>Phone Number</label>
            <input type="text" name="phone_number" value="">
        </div>
        <div class="input-group">
            <label>Company Name</label>
            <input type="text" name="company_name" value="">
        </div>
        <div class="input-group">
            <label>Company Contact</label>
            <input type="text" name="company_contact" value="">
        </div>
        <div class="input-group">
            <label>Company Address</label>
            <input type="text" name="company_address" value="">
        </div>
        <div class="input-group">
            <label>Company Email</label>
            <input type="text" name="company_email" value="">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="submit">Submit</button>
        </div>
    </form>
</body>

</html>