<?php include('../includes/db.php');
$lecturer_id = $_GET['update'];
$sql = "SELECT *  from `lecturers` where lecturer_id = $lecturer_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$lecname = $row['lecname'];
$role_id = $row['role_id'];
$email = $row['email'];
$phonenumber = $row['phonenumber'];
$department = $row['department'];
$password = $row['password'];

if (isset($_POST['submit'])) {
    $lecname = $_POST['lecname'];
    $role_id = $_POST['role_id'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $department = $_POST['department'];
    $password = $_POST['password'];

    $sql = "update `lecturers` set lecturer_id=$lecturer_id,
    lecname='$lecname',role_id='$role_id',email='$email',
    phonenumber='$phonenumber', department='$department',password='$password' where lecturer_id = $lecturer_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Successfully updated lecturer's details";
        // header("Location: ../registeredsupervisors.php");
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
        <h2> Update A Lecturer</h2>
    </div>

    <form method="post" action="">
        <div class="inputform">
            <label>Fullname</label>
            <input type="text" name="lecname" value="<?php echo $lecname ?>">
        </div>
        <div class="inputform">
            <label>Role ID</label>
            <input type="text" name="role_id" value="<?php echo $role_id ?>">
        </div>
        <div class="inputform">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email ?>">
        </div>
        <div class="inputform">
            <label>Phone Number</label>
            <input type="text" name="phonenumber" value="<?php echo $phonenumber ?>">
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
            <label>Password</label>
            <input type="password" name="password" value="<?php echo $password ?>">
        </div>
        <div class="inputform">
            <button type="submit" class="btn" name="submit">Update</button>
            <button type="submit" class="btn" name="submit"><a href="../registeredsupervisors.php">BACK</a></button>
        </div>
    </form>
</body>

</html>