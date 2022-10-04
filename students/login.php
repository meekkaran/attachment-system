<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'karan', 'Karanmeek@21', 'dbsupervise');

login();
// LOGIN USER
function login()
{
    global $db, $admissionnumber;

    // receive all input values from the form. Call the mysqli_real_escape_string() function
    // defined below to escape form values
    $admissionnumber    =  mysqli_real_escape_string($db, $_POST['admissionnumber']);
    $password  =  mysqli_real_escape_string($db, $_POST['password']);

    //prevent cross-site scripting
    $admissionnumber = htmlspecialchars($admissionnumber);
    $password = htmlspecialchars($password);

    $password = md5($password);

    $query = "SELECT * FROM students WHERE admission_number='$admissionnumber' AND password='$password' LIMIT 1";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) { // user found
        $logged_in_user = mysqli_fetch_assoc($results);

        $_SESSION['user'] = $logged_in_user;
        $_SESSION['utype'] = "student";

        // //INSERT INTO LOGS
        $student_id = $_SESSION['user']['student_id'];
        $date = date('Y-m-d H:i:s');
        $stmt3 = "INSERT INTO studentlogs(student_id,action,time) VALUES('$student_id','Login','$date')";
        $results = mysqli_query($db, $stmt3);

        header('location: logbook.php');
    } else {
        echo "<script> alert('Wrong id/password combination'); window.location.href='studentlogin.php';  </script>";
    }
}
