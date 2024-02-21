<?php
session_start();

// Make sure $_SESSION['user_id'] is properly set before assigning it to $_SESSION['student_id']
if (isset($_SESSION['user_id'])) {
   $_SESSION['student_id'] = $_SESSION['user_id'];
}

header("Location: dashboard.php?added=1");
exit;
?>
