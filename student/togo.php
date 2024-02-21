<?php

session_start();


echo $_SESSION['user_id'];

$_SESSION['student_id'] = $_SESSION['user_id'];

header("Location:dashboard.php?Cont=1");
