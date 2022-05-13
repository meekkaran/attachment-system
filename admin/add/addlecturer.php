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
<html>

<head>
    <title>AddLecturer</title>
    <link rel="stylesheet" type="text/css" href="../templates/style.css">
</head>

<body>
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
</body>

</html>