<?php
session_start();
//no one can access this page apart from the lecturers /(security)
if ($_SESSION['utype'] == 'lecturer') {
} else {
    echo "<script>alert('You must login first')</script>";
    echo "<script>location.href'lecturerlogin.php'</script>";
}
if (!isset($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: lecturerlogin.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: lecturerlogin.php");
}
include "lec_student_logbook_function.php";
?>

<html>

<head>

    <title>StudentLogbook</title>
    <link rel="stylesheet" href="templates/css/style1.css" />
    <link rel="stylesheet" href="templates/css/logbookstyle.css" />
</head>

<body>
    <?php
    //selecting week from table weeks
    $db = mysqli_connect('localhost', 'karan', 'Karanmeek@21', 'dbsupervise');
    $query = "SELECT * FROM tbl_weeks";
    $select_all_weeks = mysqli_query($db, $query);
    ?>
    <div id="top-navigation">
        <div id="logo"> CIAMS</div>
        <?php if (isset($_SESSION['user'])) : ?>
            <strong><?php echo $_SESSION['user']['lecturer_id']; ?></strong>

            <small>
                <i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['lecname']); ?>)</i>
                <br>
                <a href="home.php?logout='1'" style="color: red;">logout</a>
                &nbsp; <a href="create_user.php"> + add user</a>
            </small>

        <?php endif ?>
        <?php if (isset($_SESSION['user'])) : ?>
            <div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp;
                </span><span style="font-family:serif"><?php echo $_SESSION['user']['lecname']; ?></span></div>
        <?php endif ?>

    </div>
    <div class="admincontent">
        <div class="sidebar">
            <ul id="menu_list">
                <a class="menu_items_link" href="lecturerprofile.php">
                    <li class="menu_items_list">My Profile</li>
                </a>
                <a class="menu_items_link" href="assigned.php">
                    <li class="menu_items_list">Assigned Students</li>
                </a>
                <a class="menu_items_link" href="lecstudentlogbook.php">
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Students' Logbooks</li>
                </a>
                <a class="menu_items_link" href="changepassword.php">
                    <li class="menu_items_list">Change Password</li>
                </a>
                <a class="menu_items_link" href="lecturerlogin.php?logout">
                    <li class="menu_items_list">Logout</li>
                </a>
            </ul>
        </div>
    </div>

    <div class="main">
        <form method="post" action="lecstudentlogbook.php">
            <div class="nav">
                <div class="form-group">
                    <label for="weeks">WEEKS</label>
                    <select class="form-control" name="week_id" id="weeks">
                        <option value="">--- Choose Week ---</option>
                        <?php foreach ($select_all_weeks as $row) : ?>
                            <option value="<?php echo $row['week_id']; ?>"><?php echo $row['week_title']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form" style="width: 100%;">
                    <hr>
                    <label style="color:black;">YOUR COMMENT</label><br>
                    <?php
                    if (isset($_GET['edit'])) {
                        $students = $_GET['edit'];
                        // $_SESSION['student'] =$student_id;
                    }
                    ?>
                    <input type="text" name="lec_comment" class="lec" value="LEC_COMMENT" placeholder="LEC COMMENT" readonly />
                    <input type="text" name="students" class="lec" value="<?php echo $students; ?>" placeholder="LEC COMMENT" readonly />
                    <textarea style="width: 90%;" type="text" name="lec_coment_notes" class="form-control lec" placeholder="LECTURER COMMENTS"></textarea>

                    <!-- buttons -->
                    <input type="submit" style="background-color: tomato; padding: 10px; border-radius:10px; " name="create_lec_comment" value="LEC REMARK SUBMIT" class="btn save_comment">

                    <hr>
                </div>
            </div>
        </form>
        <div class="article">

            <table class="table table-striped" width="100%" id="mytable" border="2" style="background-color: #84ed86; color: #761a9b; margin: 0 auto;">
                <tr>
                    <th><b>week/12</b></th>
                    <th><b>MONDAY</b></th>
                    <th><b>TUESDAY</b></th>
                    <th><b>WEDNESDAY</b></th>
                    <th><b>THURSDAY</b></th>
                    <th><b>FRIDAY</b></th>
                    <th><b>SATURDAY</b></th>
                    <th><b>LECTURER REMARKS</b></th>
                    <th><b>TRAINER REMARKS</b></th>
                </tr>
                <tbody id="show_data">
                    <?php
                    if (isset($_GET['edit'])) {
                        $student_id = $_GET['edit'];
                        $_SESSION['student'] = $student_id;
                    }
                    // populate logbook data
                    foreach ($select_all_weeks as $key => $t) {
                        echo "<tr>";
                        echo "<td>" . $t['week_title'] . "</td>";
                        $conn = mysqli_connect("localhost", "karan", "Karanmeek@21", "dbsupervise");
                        $query12 = "SELECT * FROM logbookdata WHERE week_id='" . $t['week_id'] . "' AND student_id='" . $student_id . "' ";
                        $res = mysqli_query($conn, $query12);
                        $week_days = array('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'LEC_COMMENT', 'TRAINER_COMMENT');
                        $classes = array();
                        while ($row = mysqli_fetch_assoc($res)) {
                            $classes[$row['day_title']] = $row;
                        }
                        foreach ($week_days as $day) {
                            if (array_key_exists($day, $classes)) {
                                $row = $classes[$day];
                                echo  "<td  style='background-color:green;color:white;'>" . $row['day_notes'] . "<br>" . $row['created_at'] . "</td>";
                            } else {
                                echo "<td style='background-color:red;color:white;'>" . "Pending" . "</td>";
                            }
                        }
                        echo "</tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- footer section -->

</body>

</html>

</body>

</html>