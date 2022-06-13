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
                <a class="menu_items_link" href="logbook.php">
                    <li class="menu_items_list">Attachment Logbook</li>
                </a>
                <a class="menu_items_link" href="submitreports.php">
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Submit Reports</li>
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
                <label>Admission number</label>
                <input type="text" name="admissionnumber">
                <label>File Upload</label>
                <input type="File" name="pdf_file" accept=".pdf">
                <input type="submit" name="submit">
                <h4 style="text-align: center"><strong style="color: #E13F41">Please Ensure That your report is in a PDF format with your index number as its name before uploading it</strong></h4>
                <h4 style="text-align: center">Any work not in PDF format would be discarded </h4>
            </div>
        </form>

        <?php
        // If submit button is clicked
        if (isset($_POST['submit'])) {
            // get admissionnumber from the form when submitted
            $admissionnumber = $_POST['admissionnumber'];


            if (isset($_FILES['pdf_file']['name'])) {
                // If the ‘pdf_file’ field has an attachment
                $file_name = $_FILES['pdf_file']['name'];
                $file_tmp = $_FILES['pdf_file']['tmp_name'];

                // Move the uploaded pdf file into the pdf folder
                move_uploaded_file($file_tmp, "../pdf/" . $file_name);
                // Insert the submitted data from the form into the table
                $insertquery =
                    "INSERT INTO pdf_data(admissionnumber,filename) VALUES('$admissionnumber','$file_name')";

                // Execute insert query
                $iquery = mysqli_query($conn, $insertquery);

                if ($iquery) {
        ?>
                    <strong>Success!</strong> Data submitted successfully.
                <?php
                } else {
                ?>
                    <strong>Failed!</strong> Try Again!
                <?php
                }
            } else {
                ?>
                <strong>Failed!</strong> File must be uploaded in PDF format!

        <?php
            } // end if
        } // end if
        ?>


















        <!-- 
if (isset($_POST["submit"])) {
#retrieve file title
$title = $_POST["title"];

#file name with a random number so that similar dont get replaced
$pname = rand(1000, 10000) . "-" . $_FILES["file"]["name"];

#temporary file name to store file
// $tname = $_FILES["files"]["tmp_name"];

#upload directory path
$uploads_dir = "/images";

#to move uploaded file to specific location
// move_uploaded_file($tname, $uploads_dir . '/' . $pname);

$student_id = $_SESSION['user']['student_id'];
#sql query to insert into database
$sql = "INSERT into fileup(title,report,student_id,posted_at) VALUES('$title','$pname', '$student_id',now())";

if (mysqli_query($conn, $sql)) {
echo "File Successfully Uploaded";
} else {
echo "Error when uploading report";
}
}
?> -->
    </div>
</body>

</html>
</body>

</html>