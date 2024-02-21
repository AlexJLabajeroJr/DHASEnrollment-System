<?php

session_start();
include 'db_con.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $verify_query = "SELECT verify_token,verify_status FROM account WHERE  verify_token = '$token' LIMIT 1";
    $verify_query_run = mysqli_query($conn, $verify_query);;

    if (mysqli_num_rows($verify_query_run) > 0) {

        $row = mysqli_fetch_array($verify_query_run);
        if ($row['verify_status'] == 0) {
            $clicked_token = $row['verify_token'];
            $update_query = "UPDATE account SET verify_status = '1' WHERE verify_token='$clicked_token' LIMIT 1";
            $update_query_run = mysqli_query($conn, $update_query);

            if ($update_query_run) {
                header("Location: index.php?verified=1");
                exit(0);
            } else {

                header("Location: index.php?faileded=1");
                exit(0);
            }
        } else {

            header("Location: index.php?EmailAlready=1");
            exit(0);
        }
    } else {

        header("Location: login.php?notexist=1");
    }
} else {

    header("Location:login.php?notallowed");
}
