<?php include('../includes/db.php');
// delele trainer
if (isset($_GET['delete'])) {
    $trainer_id = $_GET['delete'];
    $sql = "DELETE from `trainers` where trainer_id = '$trainer_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        //insert into trainerlogs
        $date = date('Y-m-d H:i:s');
        $stmt3 = "INSERT INTO trainerlogs(trainer_id,action,time) VALUES('$trainer_id','Deleted Trainer','$date')";
        $query = mysqli_query($conn, $stmt3);
        echo "<script>alert('Record deleted successfully');window.location='../registeredtrainers.php'</script>";
    } else {
        echo "<script>alert('Failed to delete Record from database');window.location='../registeredtrainers.php'</script>";
    }
}
