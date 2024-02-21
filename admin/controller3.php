<?php

session_start();

include '../db_con.php';



if ($_GET['action'] == 'Remove') {
    // echo $_SESSION['user_id'];
    $stud_id = $_GET['student_id'];
    $select = "UPDATE schoolyr SET enrollment_status = '1' WHERE student_id = '{$stud_id}' ";
    $res = mysqli_query($conn, $select);


    if ($res) {
        header("Location:Pre_registration.php?Pre=1");
    } else {
        echo error_reporting(E_ALL);
    }
}
