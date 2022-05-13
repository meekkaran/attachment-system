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
        echo "Data updated carefully";
        header("Location: ../registeredtrainers.php");
    } else {
        echo "Data error";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>UpdateTrainer</title>
    <link rel="stylesheet" type="text/css" href="../templates/style.css">
</head>

<body>
    <div class="header">
        <h2> Update A Trainer</h2>
    </div>

    <form method="post" action="">
        <div class="input-group">
            <label>Trainer Full Name</label>
            <input type="text" name="trainername" value="<?php echo $trainername ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email ?>">
        </div>
        <div class="input-group">
            <label>Mobile</label>
            <input type="text" name="mobile" value="<?php echo $mobile ?>">
        </div>
        <div class="input-group">
            <label>Title</label>
            <input type="text" name="title" value="<?php echo $title ?>">
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