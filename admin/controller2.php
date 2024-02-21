
<?php


session_start();

include '../db_con.php';


if ($_GET['action'] == 'view') {
    // echo $_SESSION['user_id'];
    $stud_id = $_GET['student_id'];
    header("Location: view_student1.php?view=1&student_id=" . urlencode($stud_id));
}

?>