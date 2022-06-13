<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');

login();
// LOGIN USER
function login()
{
    global $db, $role_id, $errors;

    // grap form values
    $role_id = $_POST['role_id'];
    $password = $_POST['password'];


    $password = md5($password);

    $query = "SELECT * FROM lecturers WHERE role_id='$role_id' AND password='$password' LIMIT 1";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) { // user found
        // check if user is admin or user
        $logged_in_user = mysqli_fetch_assoc($results);

        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";

        $_SESSION['utype'] = "lecturer";

        header('location: assigned.php');
    } else {
        echo "Wrong id or username";
    }
}
