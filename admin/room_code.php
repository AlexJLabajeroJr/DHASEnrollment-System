<?php

include '../db_con.php';

if (isset($_POST['delete_room'])) {
    $room_id = mysqli_real_escape_string($conn, $_POST['delete_room']);

    $query = "DELETE FROM room WHERE room_id='$room_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // $_SESSION['message'] = "Faculty Deleted Successfully";
        header("Location:room.php?roomdel=1");

        exit(0);
    } else {
        // $_SESSION['message'] = "Faculty Not Deleted";
        header("Location:room.php?romnot=1");
        exit(0);
    }
}

if (isset($_POST['update_room'])) {

    $room_id = mysqli_real_escape_string($conn, $_POST['room_id']);
    $room_name = mysqli_real_escape_string($conn, $_POST['room_name']);
    $building_name = mysqli_real_escape_string($conn, $_POST['building_name']);


    $query = "UPDATE room SET room_name='$room_name', building_name='$building_name'  WHERE room_id ='$room_id'";
    $run = mysqli_query($conn, $query);

    if ($run) {
        // $_SESSION['message'] = "Faculty Updated Successfully";
        header("Location: room.php?romedd=1");
        exit(0);
    } else {
        // $_SESSION['message'] = "Faculty Not Updated";
        header("Location:room.php?romedi=1");
        exit(0);
    }
}





if (isset($_POST['save_room'])) {


    // $subject_id = mysqli_real_escape_string($conn, $_POST['subject_id']);
    $room_name = mysqli_real_escape_string($conn, $_POST['room_name']);
    $building_name = mysqli_real_escape_string($conn, $_POST['building_name']);


    $checkrom = "Select * from room where (room_name = '$room_name' && building_name = '$building_name')";
    $checksubRom = $conn->query($checkrom);

    if ($checksubRom->num_rows > 0) {
        header("Location:room.php?ruc=1");
    } else {
        $setrom = mysqli_query($conn, "INSERT INTO room (room_name,building_name) VALUES ('$room_name','$building_name')");
        if ($setrom) {
            header("Location:room.php?romadd=1");
            exit(0);
        } else {
            header("Location:room.php?romdont=1");
            exit(0);
        }
    }
}
