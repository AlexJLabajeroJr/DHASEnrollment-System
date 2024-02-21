<?php
session_start();
include '../db_con.php';
include_once "randomString.php";

if (!isset($_SESSION['admin_id'])) {
    header("location: ../index.php");
}

if (isset($_POST['delete_faculty'])) {
    $faculty_id = mysqli_real_escape_string($conn, $_POST['delete_faculty']);

    $query = "DELETE FROM faculty WHERE faculty_id='$faculty_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // $_SESSION['message'] = "Faculty Deleted Successfully";
        header("Location: faculty.php?facdel=1");

        exit(0);
    } else {
        // $_SESSION['message'] = "Faculty Not Deleted";
        header("Location: faculty.php?facnot=1");
        exit(0);
    }
}

if (isset($_POST['update_faculty'])) {
    $faculty_id = mysqli_real_escape_string($conn, $_POST['faculty_id']);

    $fac_name = mysqli_real_escape_string($conn, $_POST['fac_name']);
    $fac_contact = mysqli_real_escape_string($conn, $_POST['fac_contact']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);



    unlink($_SESSION['p_p']);

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../img/fac-images/" . randomString(8) . "/" . $filename;


    mkdir(dirname($folder));

    if (move_uploaded_file($tempname, $folder)) {
        $_SESSION['p_p'] = $folder;
    }

    $query = "UPDATE faculty SET fac_name='$fac_name', fac_contact='$fac_contact', email='$email',  p_p = '$_SESSION[p_p]'  WHERE faculty_id='$faculty_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // $_SESSION['message'] = "Faculty Updated Successfully";
        header("Location: faculty.php?facedd=1");
        exit(0);
    } else {
        // $_SESSION['message'] = "Faculty Not Updated";
        header("Location: faculty.php?facedi=1");
        exit(0);
    }
}








if (isset($_POST['save_faculty'])) {





    $fac_name = mysqli_real_escape_string($conn, $_POST['fac_name']);
    $fac_contact = mysqli_real_escape_string($conn, $_POST['fac_contact']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../img/fac-images/" . randomString(8) . "/" . $filename;

    mkdir(dirname($folder));

    if (move_uploaded_file($tempname, $folder)) {
        $_SESSION["p_p"] = $folder;
    }

    $checkfac = "Select * from faculty where (faculty_id = '$fac_name'  ||  fac_name = '$fac_name' || fac_contact = '$fac_contact' || email = '$email')";
    $checkFacResult = $conn->query($checkfac);

    if ($checkFacResult->num_rows > 0) {
        header("Location:faculty.php?fac=1");
    } else {
        $setfac = mysqli_query($conn, "INSERT INTO faculty (fac_name,fac_contact,email,p_p) VALUES ('$fac_name','$fac_contact','$email','$_SESSION[p_p]')");
        if ($setfac) {
            header("Location:faculty.php?facadd=1");
            exit(0);
        } else {
            header("Location: faculty.php?facdont=1");
            exit(0);
        }
    }
}
