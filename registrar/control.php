<?php

session_start();

include '../db_con.php';

// if (isset($_GET['student_id'])) {
// if ($_GET['action'] == 'confirm') {

//     // echo $_GET['user_id'];
//     $stud_id = $_GET['student_id'];



//     $saf = "SELECT * from  school_year WHERE school_year_status = '1'";
//     $resup = mysqli_query($conn, $saf);
//     $lost = mysqli_fetch_assoc($resup);



//     $select = "UPDATE student SET status = 'Approved' WHERE student_id = '$stud_id' ";
//     $resut = mysqli_query($conn, $select);

//     if ($resut) {

//         $sqli = "INSERT INTO `schoolyr`
// (`school_year_id`,  `student_id`, `enrollment_status`, `DATE_RESERVED`, `DATE_ENROLLED`, `STATUS`)
// VALUES ('" . $lost['school_year_id'] . "','{$stud_id}','1','" . date('Y-m-d') . "','" . date('Y-m-d') . "','New');";
//         $resu = mysqli_query($conn, $sqli);
//         if ($resu)
//             $last_insert_id = mysqli_insert_id($conn);
//         echo "Last insert ID: " . $last_insert_id;
//         $stud_id = $_GET['student_id'];
//         header("Location: pre_enroll.php?Pend=1&student_id=" . urlencode($stud_id));
//         // ob_end_flush();
//     } else {
//         echo error_reporting(E_ALL);
//     }




//     // if ($resu) {

//     //     header("Location:student_copy.php?");
//     //     exit();
//     // } else {
//     //     echo error_reporting(E_ALL);
//     // }
// }
if ($_GET['action'] == 'view') {
    // echo $_SESSION['user_id'];
    $sy_id = $_GET['SYID'];
    header("Location: view_enrolled_stud.php?view=1&SYID=" . urlencode($sy_id));
    // } elseif ($_GET['action'] == 'decline') {
    //     // echo $_SESSION['user_id'];
    //     $stud_id = $_GET['student_id'];
    //     $select = "UPDATE student SET status = 'Decline' WHERE student_id = '{$stud_id}' ";
    //     $res = mysqli_query($conn, $select);


    //     if ($res) {
    //         header("Location:Pending.php?Pend=1");
    //     } else {
    //         echo error_reporting(E_ALL);
    //     }
    // }




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
