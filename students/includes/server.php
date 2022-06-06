<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');

// variable declaration
$admissionnumber = "";
$email    = "";
$errors   = array();

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
    register();
}

// REGISTER USER
function register()
{
    // call these variables with the global keyword to make them available in function
    global $db, $errors, $admissionnumber, $email;

    // receive all input values from the form. Call the e() function
    // defined below to escape form values
    $fullname  =  e($_POST['fullname']);
    $admissionnumber    =  e($_POST['admissionnumber']);
    $email       =  e($_POST['email']);
    $company    =  e($_POST['phonenumber']);
    $phonenumber    =  e($_POST['phonenumber']);
    $companyname = e($_POST['companyname']);
    $companycontact = e($_POST['companycontact']);
    $companyaddress = e($_POST['companyaddress']);
    $companyemail = e($_POST['companyemail']);
    $companyregion = e($_POST['companyregion']);
    $startingdate = e($_POST['startingdate']);
    $password_1  =  e($_POST['password_1']);
    $password_2  =  e($_POST['password_2']);

    // form validation: ensure that the form is correctly filled
    if (empty($fullname)) {
        array_push($errors, "Full Name is required");
    }
 
    if (empty($admissionnumber)) {
        array_push($errors, "Username is required");
    }
    if (!preg_match('/^[0-9]*$/', $admissionnumber)) {
        array_push($errors,"Admission number should be numbers only");
    } 
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($phonenumber)) {
        array_push($errors, "Username is required");
    }
    if (empty($companyname)) {
        array_push($errors, "companyname is required");
    }
    if (empty($companycontact)) {
        array_push($errors, "companycontact is required");
    }
    if (empty($companyaddress)) {
        array_push($errors, "companyaddress is required");
    }
    if (empty($companyemail)) {
        array_push($errors, "companyemail is required");
    }
    if (empty($companyregion)) {
        array_push($errors, "companyregion is required");
    }
    if (empty($startingdate)) {
        array_push($errors, "startingdate is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if (strlen($_POST["password_1"]) < 8) 
    {
      array_push($errors,"Your Password Must Contain At Least 8 Characters!"); 
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // Given password
    $password = 'password';

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    } else {
        echo 'Strong password.';
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database
        $query = "INSERT INTO students (fullname,admission_number, email, phone_number,company_name, company_Contact,
         company_address,company_email,company_region,startingdate, password,created_at) 
  			  VALUES('$fullname','$admissionnumber', '$email','$phonenumber','$companyname','$companycontact',
                '$companyaddress','$companyemail','$companyregion','$startingdate', '$password',now())";
        mysqli_query($db, $query);

        // get id of the created user
        $logged_in_user_id = mysqli_insert_id($db);

        $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
        $_SESSION['success']  = "You are now logged in";
        header('location: logbook.php');
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

// escape string
function e($val)
{
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

function display_error()
{
    global $errors;

    if (count($errors) > 0) {
        echo '<div class="error">';
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo '</div>';
    }
}

// LOGIN USER
// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
    login();
}

// LOGIN USER
function login()
{
    global $db, $admissionnumber, $errors;

    // grap form values
    $admissionnumber = $_POST['admissionnumber'];
    $password = $_POST['password'];

    // make sure form is filled properly
    if (empty($admissionnumber)) {
        array_push($errors, "admissionnumber is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    // attempt login if no errors on form
    if (count($errors) == 0) {
        $password = md5($password);

        $query = "SELECT * FROM students WHERE admission_number='$admissionnumber' AND password='$password' LIMIT 1";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) { // user found
            // check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results);

            $_SESSION['user'] = $logged_in_user;
            $_SESSION['success']  = "You are now logged in";

            header('location: logbook.php');
        } else {
            array_push($errors, "Wrong role_id/password combination");
        }
    }
}
