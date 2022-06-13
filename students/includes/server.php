<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');

// variable declaration
$admissionnumber = "";
$email    = "";
$errors   = array();

register();

// REGISTER USER
function register()
{
    // call these variables with the global keyword to make them available in function
    global $db, $admissionnumber, $email;

    // receive all input values from the form. Call the e() function
    // defined below to escape form values
    $fullname  =  e($_POST['fullname']);
    $admissionnumber    =  e($_POST['admissionnumber']);
    $email       =  e($_POST['email']);
    $phonenumber    =  e($_POST['phonenumber']);
    $department = e($_POST['department']);
    $companyname = e($_POST['companyname']);
    $companycontact = e($_POST['companycontact']);
    $companyaddress = e($_POST['companyaddress']);
    $companyemail = e($_POST['companyemail']);
    $startingdate = e($_POST['startingdate']);
    $password_1  =  e($_POST['password_1']);

    //prevent cross-site scripting
    $fullname = htmlspecialchars($fullname);
    $admissionnumber = htmlspecialchars($admissionnumber);
    $email = htmlspecialchars($email);
    $department = htmlspecialchars($department);
    $phonenumber = htmlspecialchars($phonenumber);
    $companyname = htmlspecialchars($companyname);
    $companyaddress = htmlspecialchars($companyaddress);
    $companyemail = htmlspecialchars($companyemail);


    // register user if there are no errors in the form
    // if (count($errors) == 0) {
    $password = md5($password_1); //encrypt the password before saving in the database
    $query = "INSERT INTO students (fullname,admission_number, email, phone_number, department, company_name, company_Contact,
         company_address,company_email, startingdate, password,created_at) 
  			  VALUES('$fullname','$admissionnumber', '$email','$phonenumber', '$department', '$companyname','$companycontact',
                '$companyaddress','$companyemail', '$startingdate', '$password',now())";
    // mysqli_query($db, $query);
    if (mysqli_query($db, $query)) {
        echo "<script>alert('sccessfull')</script>";
    } else {
        echo "<script>alert('error')</script>";
    }

    // get id of the created user
    $logged_in_user_id = mysqli_insert_id($db);//returns generated id of most recent query

    $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
    $_SESSION['success']  = "You are now logged in";
    header('location:../studentlogin.php');
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



//if a student wants to change password
if (isset($_POST['forgot-password'])) {    /* if user wants to change the password */
    $admissionnumber    =  e($_POST['admissionnumber']);/* escaping special chars from sql injection */
    $password_1  =  $_POST['password_1'];
    $password_2  =  $_POST['password_2'];

    // $password = $_POST['pwd'];/* new password */
    // $repwd = $_POST['re_pwd'];/* repeat password */

    $password = md5($password_1);

    // $pwd = md5($password);
    // $c_pwd = $_POST['cpwd'];
    // $cpwd = md5($c_pwd);

    $conn = "SELECT * FROM students WHERE admissionnumber='$admissionnumber' and password='$password'  "; #check for a user with the same username and password 
    $result = mysqli_query($db, $conn);/* execute the query */
    $rows = mysqli_num_rows($result);/* count the number of arrays returened by the query */
    if ($rows != 1) #if current credentials are wrong 
    {
        $_SESSION['message'] = ' ***Invalid admissionnumber or password';/* inform user to  change their credentials */
        header('location: forgot_password.php');/* redirect back to the login */
        die;/* stop executing the script */
    }

    if ($password_1 == $password_2) {/* if the password and the repeat password are the same */
        #$sql = "UPDATE  users  SET pwd='$pwd' WHERE uname='$username' ";/* update the password */
        $sql = "UPDATE students  SET password='$password' WHERE admissionnumber='$admissionnumber' ";
        $query = mysqli_query($db, $sql);
        if ($query) {
            echo "password has been changed successfully";
            header('location:studentlogin.php');
        }
    }
}
