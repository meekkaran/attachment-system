<?php include "../includes/db.php";
if (isset($_GET['delete'])) {
    $student_id = $_GET['delete'];
    $sql = "DELETE from `students` where student_id = '$student_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Record deleted from the database")</script>';
    } else {
        echo '<font color="red">Failed to delete Record from database';
    }
}
