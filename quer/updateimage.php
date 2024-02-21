<?php
include_once "randomString.php";



$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "my_db";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (mysqli_connect_errno()) {
    echo "failed";
    echo mysqli_connect_error();
    exit();
} else {
}


if (isset($_POST['jobseekerNewImageBtn'])) {



    unlink($_SESSION['p_p']);

    $account_id = $_GET['account_id'];

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../img/user-images/" . randomString(8) . "/" . $filename;


    mkdir(dirname($folder));

    if (move_uploaded_file($tempname, $folder)) {
        $_SESSION['p_p'] = $folder;
    }

    $updateImage =
        "UPDATE account SET 
	       p_p = '$_SESSION[p_p]' 
	  WHERE account_id='$account_id'";
    $result = mysqli_query($conn,     $updateImage);
    header("Location: ../registrar/profile.php?newImage=1");
}
