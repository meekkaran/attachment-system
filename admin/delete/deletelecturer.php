<?php include('../includes/db.php');
// delete lecturer
if (isset($_GET['delete'])) {
    $lecturer_id = $_GET['delete'];
    $sql = "DELETE from `lecturers` where lecturer_id = '$lecturer_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        //insert into lecturerlogs

        $date = date('Y-m-d H:i:s');
        $stmt3 = "INSERT INTO lecturerlogs(lecturer_id,action,time) VALUES('$lecturer_id','Deleted Lecturer','$date')";
        $query = mysqli_query($conn, $stmt3);
        echo "<script>alert('Record deleted successfully');window.location='../registeredsupervisors.php'</script>";
    } else {
        echo "<script>alert('Failed to delete Record from database');window.location='../registeredsupervisors.php'</script>";
    }
}
