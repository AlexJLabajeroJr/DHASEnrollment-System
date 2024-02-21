<?php


session_start();
include '../db_con.php';

if (isset($_GET['SEMID'])) {



    if ($_GET['SEMID'] == 1) {
        $query = " UPDATE tblsemester SET ";
        $query .= "SETSEM  = '1'";
        $query .= " WHERE SEMID = '1'";
        $result = mysqli_query($conn, $query);

        $query = " UPDATE tblsemester SET ";
        $query .= "SETSEM  = '0'";
        $query .= " WHERE SEMID = '2'";
        $result = mysqli_query($conn, $query);
    } elseif ($_GET['SEMID'] == 2) {
        $query = " UPDATE tblsemester SET ";
        $query .= "SETSEM  = '0'";
        $query .= " WHERE SEMID = '1'";
        $result = mysqli_query($conn, $query);


        $query = " UPDATE tblsemester SET ";
        $query .= "SETSEM  = '1'";
        $query .= " WHERE SEMID = '2'";
        $result = mysqli_query($conn, $query);
    }



    // message("Semester has been updated!", "success");
    header('location: setsem.php?set=1');
}
