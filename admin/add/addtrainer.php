<?php include('../includes/db.php');
if (isset($_POST['submit'])) {
    $trainername = $_POST['trainername'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $title = $_POST['title'];
    $password = $_POST['password'];

    $sql = "INSERT into `trainers` (trainername,email,mobile,title,password, created_at)
    values('$trainername','$email','$mobile','$title','$password', now())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Data inserted carefully";
        header("Location:../registeredtrainers.php");
    } else {
        echo "Data error";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>AddTrainer</title>
    <link rel="stylesheet" type="text/css" href="../templates/style.css">
</head>

<body>
    <div class="header">
        <h2> Add A trainer</h2>
    </div>

    <form method="post" action="">
        <div class="input-group">
            <label>Trainer Full Name</label>
            <input type="text" name="trainername" value="">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="">
        </div>
        <div class="input-group">
            <label>Mobile</label>
            <input type="text" name="mobile" value="">
        </div>
        <div class="input-group">
            <label>Title</label>
            <input type="text" name="title" value="">
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