<?php
session_start();
include '../db_con.php';
include_once "randomString.php";


if (isset($_POST['update_faculty'])) {



    $faculty_id = mysqli_real_escape_string($conn, $_POST['faculty_id']);

    $fac_name = mysqli_real_escape_string($conn, $_POST['fac_name']);
    $fac_contact = mysqli_real_escape_string($conn, $_POST['fac_contact']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);



    unlink($_SESSION['p_p']);

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../img/user-images/" . randomString(8) . "/" . $filename;


    mkdir(dirname($folder));

    if (move_uploaded_file($tempname, $folder)) {
        $_SESSION['p_p'] = $folder;
    }

    $query = "UPDATE faculty SET fac_name='$fac_name', fac_contact='$fac_contact', email='$email',  p_p = '$_SESSION[p_p]'  WHERE faculty_id='$faculty_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // $_SESSION['message'] = "Faculty Updated Successfully";
        header("Location:faculty.php?facedd=1");
        exit(0);
    } else {
        // $_SESSION['message'] = "Faculty Not Updated";
        header("Location: faculty.php?facedi=1");
        exit(0);
    }
}
