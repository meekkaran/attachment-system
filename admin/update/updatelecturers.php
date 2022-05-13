<?php include('../includes/db.php');
$lecturer_id = $_GET['update'];
$sql = "SELECT *  from `lecturers` where lecturer_id = $lecturer_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$lecname = $row['lecname'];
$role_id = $row['role_id'];
$email = $row['email'];
$phonenumber = $row['phonenumber'];
$password = $row['password'];

if (isset($_POST['submit'])) {
    $lecname = $_POST['lecname'];
    $role_id = $_POST['role_id'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];

    $sql = "update `lecturers` set lecturer_id=$lecturer_id,
    lecname='$lecname',role_id='$role_id',email='$email',
    phonenumber='$phonenumber',password='$password' where lecturer_id = $lecturer_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Data updated carefully";
        header("Location: ../registeredsupervisors.php");
    } else {
        echo "Data error";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>UpdateLecturer</title>
    <link rel="stylesheet" type="text/css" href="../templates/style.css">
</head>

<body>
    <div class="header">
        <h2> Update A Lecturer</h2>
    </div>

    <form method="post" action="">
        <div class="input-group">
            <label>Fullname</label>
            <input type="text" name="lecname" value="<?php echo $lecname ?>">
        </div>
        <div class="input-group">
            <label>Role ID</label>
            <input type="text" name="role_id" value="<?php echo $role_id ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email ?>">
        </div>
        <div class="input-group">
            <label>Phone Number</label>
            <input type="text" name="phonenumber" value="<?php echo $phonenumber ?>">
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