<?php

session_start();

include '../db_con.php';



// if (isset($_GET['student_id'])) {
if ($_GET['action'] == 'confirm') {

    // echo $_GET['user_id'];
    $stud_id = $_GET['student_id'];

    $saf = "SELECT * from  school_year WHERE school_year_status = '1'";
    $resup = mysqli_query($conn, $saf);
    $lost = mysqli_fetch_assoc($resup);

    $select = "UPDATE student SET status = 'Approved' WHERE student_id = '$stud_id' ";
    $resut = mysqli_query($conn, $select);

    if ($resut) {

        $sqli = "INSERT INTO `schoolyr`
(`school_year_id`,  `student_id`, `enrollment_status`, `DATE_RESERVED`, `DATE_ENROLLED`, `STATUS`,`archieve`)
VALUES ('" . $lost['school_year_id'] . "','{$stud_id}','1','" . date('Y-m-d') . "','" . date('Y-m-d') . "','New', '0');";
        $resu = mysqli_query($conn, $sqli);
        if ($resu)
            $last_insert_id = mysqli_insert_id($conn);
        echo "Last insert ID: " . $last_insert_id;
        $stud_id = $_GET['student_id'];
        header("Location: pre_enroll.php?Pende=1&student_id=" . urlencode($stud_id));
    }
} elseif ($_GET['action'] == 'view') {
    // echo $_SESSION['user_id'];
    $stud_id = $_GET['student_id'];
    header("Location: view_student.php?view=1&student_id=" . urlencode($stud_id));
} elseif ($_GET['action'] == 'decline') {
    // echo $_SESSION['user_id'];
    $stud_id = $_GET['student_id'];
    $select = "UPDATE student SET status = 'Decline' WHERE student_id = '{$stud_id}' ";
    $res = mysqli_query($conn, $select);


    if ($res) {
        header("Location:Pending.php?Pend=1");
    } else {
        echo error_reporting(E_ALL);
    }
}
