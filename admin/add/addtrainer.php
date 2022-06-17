<?php include('../includes/db.php');
if (isset($_POST['submit'])) {
    $trainername = $_POST['trainername'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $title = $_POST['title'];
    $password_1  = $_POST['password_1'];
    $password_2  = $_POST['password_2'];

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



?>

<html>

<head>
    <title>CIAMS</title>
    <link rel="stylesheet" href="../templates/admin1.css" />
    <link rel="stylesheet" type="text/css" href="../templates/style.css">
</head>

<body>

    <div class="header">
        <h2> Add A trainer</h2>
    </div>

    <form method="post" action="">
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
            <button type="submit" class="btn" name="submit"><a href="../registeredtrainers.php">BACK</a></button>
        </div>
    </form>

</body>

</html>