<!-- delete student -->
<?php include "includes/db.php";
session_start();

if (isset($_GET['delete'])) {
    $student_id = $_GET['delete'];
    $sql = "DELETE from `students` where student_id = '$student_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        //insert into studentlogs
        $admissionnumber = $_SESSION['admissionnumber'];
        $date = date('Y-m-d H:i:s');
        $stmt3 = "INSERT INTO studentlogs(admissionnumber,action,time) VALUES('$admissionnumber','Deleted student','$date')";
        $query = mysqli_query($conn, $stmt3);
        echo "<script>alert('Record deleted successfully');window.location='registeredstudents.php'</script>";
    } else {
        echo "<script>alert('Failed to delete Record from database');window.location='registeredstudents.php'</script>";
    }
}
// delete lecturer
if (isset($_GET['delete'])) {
    $lecturer_id = $_GET['delete'];
    $sql = "DELETE from `lecturers` where lecturer_id = '$lecturer_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        //insert into lecturerlogs
        $role_id = $_SESSION['user']['role_id'];
        $date = date('Y-m-d H:i:s');
        $stmt3 = "INSERT INTO lecturerlogs(role_id,action,time) VALUES('$admissionnumber','Deleted Lecturer','$date')";
        $query = mysqli_query($conn, $stmt3);
        echo "<script>alert('Record deleted successfully');window.location='registeredsupervisors.php'</script>";
    } else {
        echo "<script>alert('Failed to delete Record from database');window.location='registeredsupervisors.php'</script>";
    }
}

// delele trainer
if (isset($_GET['delete'])) {
    $trainer_id = $_GET['delete'];
    $sql = "DELETE from `trainers` where trainer_id = '$trainer_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        //insert into trainerlogs
        $email = $_SESSION['user']['email'];
        $date = date('Y-m-d H:i:s');
        $stmt3 = "INSERT INTO trainerlogs(email,action,time) VALUES('$email','Deleted Trainer','$date')";
        $query = mysqli_query($conn, $stmt3);
        echo "<script>alert('Record deleted successfully');window.location='registeredtrainers.php'</script>";
    } else {
        echo "<script>alert('Failed to delete Record from database');window.location='registeredtrainers.php'</script>";
    }
}

// delete allocated lecturers and students
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE from `assigned` where id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Record deleted successfully');window.location='assignedlecturers.php'</script>";
    } else {
        echo "<script>alert('Failed to delete Record from database');window.location='assignedlecturers.php'</script>";
    }
}
?>