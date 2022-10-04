<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'karan', 'Karanmeek@21', 'dbsupervise');

// variable declaration
$admissionnumber = "";
$email    = "";


if (isset($_POST['register_btn'])) {
    register();
}


// REGISTER USER
function register()
{
    // call these variables with the global keyword to make them available in function
    global $db, $admissionnumber, $email;

    // receive all input values from the form. Call the mysqli_real_escape_string() function
    // defined below to escape form values
    $fullname  =  mysqli_real_escape_string($db, $_POST['fullname']);
    $admissionnumber    =  mysqli_real_escape_string($db, $_POST['admissionnumber']);
    $email       =  mysqli_real_escape_string($db, $_POST['email']);
    $phonenumber    =  mysqli_real_escape_string($db, $_POST['phonenumber']);
    $department = mysqli_real_escape_string($db, $_POST['department']);
    $companyname = mysqli_real_escape_string($db, $_POST['companyname']);
    $companycontact = mysqli_real_escape_string($db, $_POST['companycontact']);
    $companyaddress = mysqli_real_escape_string($db, $_POST['companyaddress']);
    $companyemail = mysqli_real_escape_string($db, $_POST['companyemail']);
    $startingdate = mysqli_real_escape_string($db, $_POST['startingdate']);
    $password_1  =  mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2  =  mysqli_real_escape_string($db, $_POST['password_2']);

    //prevent cross-site scripting
    $fullname = htmlspecialchars($fullname);
    $admissionnumber = htmlspecialchars($admissionnumber);
    $email = htmlspecialchars($email);
    $department = htmlspecialchars($department);
    $phonenumber = htmlspecialchars($phonenumber);
    $companyname = htmlspecialchars($companyname);
    $companyaddress = htmlspecialchars($companyaddress);
    $companyemail = htmlspecialchars($companyemail);
    $password_1 = htmlspecialchars($password_1);
    $password_2 = htmlspecialchars($password_2);



    // first check the database to make sure 
    // a user does not already exist with the same admissionnumber and/or email
    $user_check_query = "SELECT * FROM students WHERE admission_number='$admissionnumber' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user  != "") { // if user exists
        if ($user['admission_number'] === $admissionnumber) {
            echo "<script>alert('admissionnumber already exists');window.location='../studentregistration.php'</script>";
        }

        if ($user['email'] === $email) {
            echo "<script>alert('Email already exists');window.location='../studentregistration.php'</script>";
        }
    }
    //make sure both passwords do match
    elseif ($password_1 !== $password_2) {
        echo "<script>alert('The two Passwords do not match!');window.location='../studentregistration.php'</script>";
    } else {

        $password = md5($password_1); //encrypt assword before saving to db
        $query = "INSERT INTO students (fullname,admission_number, email, phone_number, department, company_name, company_Contact,
        company_address,company_email, startingdate, password,created_at) 
               VALUES('$fullname','$admissionnumber', '$email','$phonenumber', '$department', '$companyname','$companycontact',
               '$companyaddress','$companyemail', '$startingdate', '$password',now())";
        $result2 = mysqli_query($db, $query);
        if ($result2) {
            echo "<script>alert('sccessfull')</script>";
            // get id of the created user
            $logged_in_user_id = mysqli_insert_id($db); //returns generated id of most recent query

            $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
            $_SESSION['success']  = "You are now logged in";
            header('location:../studentlogin.php');
        } else {
            echo "<script>alert('error')</script>";
            header('location:../studentregistration.php');
        }
    }
}


// return user array from their id
function getUserById($id)
{
    global $db;
    $query = "SELECT * FROM students WHERE student_id=" . $id;
    $result = mysqli_query($db, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}
