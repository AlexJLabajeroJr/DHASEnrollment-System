<?php


echo $_SESSION['scol_id'];

$_SESSION['SYID'] = $_SESSION['scol_id'];


header("Location: enrollment_status.php?added=1");
