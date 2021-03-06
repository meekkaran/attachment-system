<?php
session_start();
include "includes/db.php";

if (!isset($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: studentlogin.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: studentlogin.php");
}
?>

<html>

<head>
    <title>submitReports</title>
    <link rel="stylesheet" href="templates/css/style1.css" />
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="templates/css/reports.css" />
</head>

<body>
    <div id="top-navigation">
        <div id="logo"> CIAMS</div>
        <?php if (isset($_SESSION['user'])) : ?>
            <div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp;
                </span><span style="font-family:serif"><?php echo $_SESSION['user']['fullname']; ?></span></div>
        <?php endif ?>
    </div>
    <div class="admincontent">
        <div class="sidebar">
            <ul id="menu_list">
                <a class="menu_items_link" href="studentprofile.php">
                    <li class="menu_items_list">My Profile</li>
                </a>
                <a class="menu_items_link" href="logbook.php">
                    <li class="menu_items_list">Attachment Logbook</li>
                </a>
                <a class="menu_items_link" href="submitreports.php">
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Submit Reports</li>
                </a>
                <a class="menu_items_link" href="changepassword.php">
                    <li class="menu_items_list">Change Password</li>
                </a>
                <a class="menu_items_link" href="submitreports.php?logout">
                    <li class="menu_items_list">Logout</li>
                </a>
            </ul>
        </div>
    </div>

    <div class="main">
        <form method="post" enctype="multipart/form-data">
            <div class="submitreportbody">
                <h1 style="text-align: center">Upload Report</h1>
                <label>Title</label>
                <input type="text" name="title">
                <label>File Upload</label>
                <input type="File" name="file">
                <input type="submit" name="submit">
                <h4 style="text-align: center"><strong style="color: #E13F41">Please Ensure That your report is in a Microsoft Word format with your index number as its name before uploading it</strong></h4>
                <h4 style="text-align: center">Any work not in Microsoft Word format would be discarded </h4>
            </div>
        </form>
        <?php
        if (isset($_POST["submit"])) {
            #retrieve file title
            $title = $_POST["title"];
            $file = $_FILES['file'];

            #file name with a random number so that similar dont get replaced
            $pname = rand(1000, 10000) . "-" . $_FILES["file"]["name"]; //The original name of the file to be uploaded.

            #temporary file name to store file
            $tname = $_FILES["file"]["tmp_name"]; //The temporary filename of the file in which the uploaded file was stored on the server.
            #upload directory path
            $uploads_dir = "reports";

            #to move uploaded file to specific location
            move_uploaded_file($tname, $uploads_dir . '/' . $pname);

            $student_id = $_SESSION['user']['student_id'];
            #sql query to insert into database
            $sql = "INSERT into fileup(title,report,student_id,posted_at) VALUES('$title','$pname', '$student_id',now())";

            if (mysqli_query($conn, $sql)) {
                echo "File Successfully Uploaded";
            } else {
                echo "Error when uploading report";
            }
        }
        ?>
    </div>
</body>

</html>
</body>

</html>