<?php

session_start();

include '../db_con.php';




// if (isset($_GET['student_id'])) {
if ($_GET['action'] == 'confirm') {

    // echo $_GET['user_id'];
    $stud_id = $_GET['student_id'];

    header("Location:view_student.php?view=1&student_id=" . urlencode($stud_id));
} elseif ($_GET['action'] == 'archieve') {
    // echo $_SESSION['user_id'];
    $sy_id = $_GET['SYID'];
    $select = "UPDATE schoolyr SET archieve = '1' WHERE SYID = '{$sy_id}' ";
    $res = mysqli_query($conn, $select);


    if ($res) {
        header("Location:archieve.php?arc=1");
    } else {
        echo error_reporting(E_ALL);
    }
}
