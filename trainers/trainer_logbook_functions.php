<?php
  if (isset($_POST['create_trainer_comment'])) {
    // global $conn;
    $conn = mysqli_connect("localhost", "root", "", "dbsupervise");
    $student_in = $_POST['students'];
    echo var_dump($student_in);
    $remark = $_POST['trainer_comment'];
    $week_title = $_POST['week_id'];
    $remark_notes  = $_POST['trainer_coment_notes'];
    $query = "INSERT INTO logbookdata(week_id, day_title, day_notes, created_at,student_id) ";
    $query .=
        "VALUES({$week_title},'{$remark}','{$remark_notes}',now(), '{$student_in}') ";
    $create_post_query = mysqli_query($conn, $query);
    header('location: trainerstudentlogbook.php?edit=' . $student_in);
    exit(0);
    // confirmQuery($create_post_query);
}


?>