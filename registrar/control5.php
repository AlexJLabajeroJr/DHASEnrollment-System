<?php

session_start();

include '../db_con.php';


if ($_GET['action'] == 'view') {
    // echo $_SESSION['user_id'];
    $sy_id = $_GET['SYID'];
    header("Location: view_pay.php?view=1&SYID=" . urlencode($sy_id));
} elseif ($_GET['action'] == 'archive') {
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
