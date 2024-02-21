<?php

include '../db_con.php';
include_once "randomString.php";

if (isset($_POST['jobSeekerSubmitBtn'])) {



    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../img/user-images/" . randomString(8) . "/" . $filename;

    mkdir(dirname($folder));

    if (move_uploaded_file($tempname, $folder)) {
        $_SESSION["p_p"] = $folder;
    }
a

    $sql = "INSERT INTO account (p_p)
        VALUES ('$_SESSION[p_p]')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['account_id'] = $conn->insert_id;
        header("Location:../registrar/profile.php");
        $conn->close();
    }
}


// ../img/user-images/6qgmD9bI/hdd.png