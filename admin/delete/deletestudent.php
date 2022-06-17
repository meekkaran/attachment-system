<!-- delete student -->
<?php include('../includes/db.php');
if (isset($_GET['delete'])) {
    $student_id = $_GET['delete'];
    $sql = "DELETE from `students` where student_id = '$student_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        //insert into studentlogs
        $date = date('Y-m-d H:i:s');
        $stmt3 = "INSERT INTO studentlogs(student_id,action,time) VALUES('$student_id','Deleted student','$date')";
        $query = mysqli_query($conn, $stmt3);
        echo "<script>alert('Record deleted successfully');window.location='../registeredstudents.php'</script>";
    } else {
        echo "<script>alert('Failed to delete Record from database');window.location='../registeredstudents.php'</script>";
    }
}
?>