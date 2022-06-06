
    <?php
    $db = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');
    if (isset($_SESSION['user']['student_id'])) {
        $student_id = $_SESSION['user']['student_id'];

        // monday input
        if (isset($_POST['create_post'])) {
            global $db, $student_id;
            $day_title = $_POST['mon_day'];
            $week_title = $_POST['week_id'];
            $day_notes  = $_POST['mon_notes'];
            $query = "INSERT INTO logbookdata(week_id, day_title, day_notes, created_at,student_id) ";
            $query .=
                "VALUES({$week_title},'{$day_title}','{$day_notes}',now(), '{$student_id}') ";
            $create_post_query = mysqli_query($db, $query);
            header('location: logbook.php');
            exit(0);
            // confirmQuery($create_post_query);
        }
        // tuesday input
        if (isset($_POST['create_post1'])) {
            global $db, $student_id;
            $day_title = $_POST['tue_day'];
            $week_title = $_POST['week_id'];
            $day_notes  = $_POST['tue_notes'];
            // $student_id = $_SESSION['student_id'];
            $query = "INSERT INTO logbookdata(week_id, day_title, day_notes, created_at,student_id) ";
            $query .=
                "VALUES({$week_title},'{$day_title}','{$day_notes}',now(), '{$student_id}') ";
            $create_post_query = mysqli_query($db, $query);
            header('location: logbook.php');
            exit(0);
            // confirmQuery($create_post_query);
        }
        // wednesday input
        if (isset($_POST['create_post2'])) {
            global $db, $student_id;
            $day_title = $_POST['wed_day'];
            $week_title = $_POST['week_id'];
            $day_notes  = $_POST['wed_notes'];
            // $student_id = $_SESSION['student_id'];
            $query = "INSERT INTO logbookdata(week_id, day_title, day_notes, created_at,student_id) ";
            $query .=
                "VALUES({$week_title},'{$day_title}','{$day_notes}',now(), '{$student_id}') ";
            $create_post_query = mysqli_query($db, $query);
            header('location: logbook.php');
            exit(0);
            // confirmQuery($create_post_query);
        }
        // thursday input
        if (isset($_POST['create_post3'])) {
            global $db, $student_id;
            $day_title = $_POST['thur_day'];
            $week_title = $_POST['week_id'];
            $day_notes  = $_POST['thur_notes'];
            // $student_id = $_SESSION['student_id'];
            $query = "INSERT INTO logbookdata(week_id, day_title, day_notes, created_at,student_id) ";
            $query .=
                "VALUES({$week_title},'{$day_title}','{$day_notes}',now(), '{$student_id}') ";
            $create_post_query = mysqli_query($db, $query);
            header('location: logbook.php');
            exit(0);
            // confirmQuery($create_post_query);
        }
        // friday input
        if (isset($_POST['create_post4'])) {
            global $db, $student_id;
            $day_title = $_POST['fri_day'];
            $week_title = $_POST['week_id'];
            $day_notes  = $_POST['fri_notes'];
            // $student_id = $_SESSION['student_id'];
            $query = "INSERT INTO logbookdata(week_id, day_title, day_notes, created_at,student_id) ";
            $query .=
                "VALUES({$week_title},'{$day_title}','{$day_notes}',now(), '{$student_id}') ";
            $create_post_query = mysqli_query($db, $query);
            header('location: logbook.php');
            exit(0);
            // confirmQuery($create_post_query);
        }
        // saturday input
        if (isset($_POST['create_post5'])) {
            global $db, $student_id;
            $day_title = $_POST['sat_day'];
            $week_title = $_POST['week_id'];
            $day_notes  = $_POST['sat_notes'];
            // $student_id = $_SESSION['student_id'];
            $query = "INSERT INTO logbookdata(week_id, day_title, day_notes, created_at,student_id) ";
            $query .=
                "VALUES({$week_title},'{$day_title}','{$day_notes}',now(), '{$student_id}') ";
            $create_post_query = mysqli_query($db, $query);
            header('location: logbook.php');
            exit(0);
            // confirmQuery($create_post_query);
        }
        // remarks input
        if (isset($_POST['create_post6'])) {
            global $db, $student_id;
            $day_title = $_POST['remark'];
            $week_title = $_POST['week_id'];
            $day_notes  = $_POST['remarks_notes'];
            // $student_id = $_SESSION['student_id'];
            $query = "INSERT INTO logbookdata(week_id, day_title, day_notes, created_at,student_id) ";
            $query .=
                "VALUES({$week_title},'{$day_title}','{$day_notes}',now(), '{$student_id}') ";
            $create_post_query = mysqli_query($db, $query);
            header('location: logbook.php');
            exit(0);
            // confirmQuery($create_post_query);
        }
    }
    ?>
