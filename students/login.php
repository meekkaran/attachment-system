<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');

login();
// LOGIN USER
function login()
{
    global $db, $admissionnumber, $errors;

    // grap form values
    $admissionnumber = $_POST['admissionnumber'];
    $password = $_POST['password'];

    $password = md5($password);

    $query = "SELECT * FROM students WHERE admission_number='$admissionnumber' AND password='$password' LIMIT 1";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) { // user found
        $logged_in_user = mysqli_fetch_assoc($results);

        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";

        $_SESSION['utype'] = "student";

        header('location: logbook.php');
    } else {
        // echo "Wrong role_id/password combination";
        echo "<script> alert('Wrong id/password combination'); window.location.href='studentlogin.php';  </script>";
    }
}
// }
