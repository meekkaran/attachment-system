<?php include('../includes/db.php');
// delete allocated lecturers and students
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE from `assigned` where id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Record deleted successfully');window.location='../assignedlecturers.php'</script>";
    } else {
        echo "<script>alert('Failed to delete Record from database');window.location='../assignedlecturers.php'</script>";
    }
}
