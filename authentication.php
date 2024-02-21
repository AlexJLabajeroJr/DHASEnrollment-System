<?php

session_start();
if (!isset($_SESSION['authenticated'])) {
    $_SESSION['status'] = "Please Login to Access User Dashboard";
    header('Location:index.php');
    exit(0);
}


// https://databases-auth.000webhost.com/sql.php?server=1&db=id20454552_my_db&table=room&pos=0