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
        echo "Successfully updated trainer's details";
        // header("Location: ../registeredtrainers.php");
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
        <h2> Update A Trainer</h2>
    </div>

    <form method="post" action="">
        <div class="inputform">
            <label>Trainer Full Name</label>
            <input type="text" name="trainername" value="<?php echo $trainername ?>">
        </div>
        <div class="inputform">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email ?>">
        </div>
        <div class="inputform">
            <label>Mobile</label>
            <input type="text" name="mobile" value="<?php echo $mobile ?>">
        </div>
        <div class="inputform">
            <label>Title</label>
            <input type="text" name="title" value="<?php echo $title ?>">
        </div>
        <div class="inputform">
            <label>Password</label>
            <input type="password" name="password" value="<?php echo $password ?>">
        </div>
        <div class="inputform">
            <button type="submit" class="btn" name="submit">Update</button>
            <button type="submit" class="btn" name="submit"><a href="../registeredtrainers.php">BACK</a></button>
        </div>
    </form>
</body>

</html>