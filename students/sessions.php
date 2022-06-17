<?php
session_start();
$student_id = $_SESSION['user']['student_id'];
echo $student_id;
?>