<?php
include '../db_con.php';
if ($_REQUEST['student_id']) {
    $sql = "SELECT student_id, first_name, city,  FROM student 
WHERE student_id='" . $_REQUEST['student_id'] . "'";
    $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    $data = array();
    while ($rows = mysqli_fetch_assoc($resultset)) {
        $data = $rows;
    }
    echo json_encode($data);
} else {
    echo 0;
}
