<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'karan', 'Karanmeek@21', 'dbsupervise');

login();
// LOGIN USER
function login()
{
    global $db, $role_id;

    // receive all input values from the form. Call the mysqli_real_escape_string() function
    // defined below to escape form values
    $role_id    = mysqli_real_escape_string($db, $_POST['role_id']);
    $password    = mysqli_real_escape_string($db, $_POST['password']);

    //prevent cross-site scripting
    $role_id = htmlspecialchars($role_id);
    $password = htmlspecialchars($password);

    $password = md5($password);

    $query = "SELECT * FROM lecturers WHERE role_id='$role_id' AND password='$password' LIMIT 1";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) { // user found
        $logged_in_user = mysqli_fetch_assoc($results);

        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";

        $_SESSION['utype'] = "lecturer";
        //insert into logs
        $lecturer_id = $_SESSION['user']['lecturer_id'];
        $date = date('Y-m-d H:i:s');
        $stmt3 = "INSERT INTO lecturerlogs(lecturer_id,action,time) VALUES('$lecturer_id','Login','$date')";
        $query = mysqli_query($db, $stmt3);

        header('location: assigned.php');
    } else {
        echo "<script> alert('Wrong id/password combination'); window.location.href='lecturerlogin.php';  </script>";
    }
}
