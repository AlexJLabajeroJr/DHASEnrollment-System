<?php


// ob#05529C_start();
session_start();


if (!isset($_SESSION['student_id'])) {
    header("location: ../index.php");
}



include '../db_con.php';
include('includes/header.php');



if (isset($_POST['refresh'])) {
    header('location:dashboard.php');
}


$emai = $_SESSION['email'];
$pass = $_SESSION['pass'];


$findIfEnroll = "SELECT * from enrollment WHERE student_id = '$_SESSION[student_id]'";
$findIfEnrollresult = mysqli_query($conn, $findIfEnroll);

$findIfEnrollresultrow = mysqli_fetch_assoc($findIfEnrollresult);



$stat = "SELECT * from student WHERE  status = 'Pending' && student_id = '$_SESSION[student_id]'";
$des = mysqli_query($conn, $stat);
$statko = mysqli_fetch_assoc($des);



$sql = "Select * from student where student_id = '$_SESSION[student_id]'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// if (isset($row['p_p'])) {
//     $setIM = "SELECT * FROM student WHERE p_p = '" . $row['p_p'] . "'";
//     $searchIMResult = $conn->query($setIM);
//     $searchIMResultRow = $searchIMResult->fetch_assoc();
// } else {
//     // Handle the error condition when 'p_p' key is not defined in $row array.
// }





// if (isset($row['p_p'])) {
//     $setIM = "SELECT * FROM student WHERE p_p = '" . $row['p_p'] . "'";
//     $searchIMResult = $conn->query($setIM);
//     $searchIMResultRow = $searchIMResult->fetch_assoc();
// } else {
//     // Handle the error condition when 'p_p' key is not defined in $row array.
// }






$sql = "Select * from student where student_id = '$_SESSION[student_id]'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


$setyr = "Select * from school_year where school_year_status = '1'";
$searchYrResult = $conn->query($setyr);
$searchYrRow = $searchYrResult->fetch_assoc();




$setSem = "Select * from tblsemester where SETSEM= '1'";
$searchSemResult = $conn->query($setSem);
$searchSetResultRow = $searchSemResult->fetch_assoc();




$findIfEnroll = "SELECT * from enrollment WHERE student_id = '$_SESSION[student_id]'";
$findIfEnrollresult = mysqli_query($conn, $findIfEnroll);

$findIfEnrollresultrow = mysqli_fetch_assoc($findIfEnrollresult);



$stat = "SELECT * from student WHERE  status = 'Pending' && student_id = '$_SESSION[student_id]'";
$des = mysqli_query($conn, $stat);
$statko = mysqli_fetch_assoc($des);


$staf = "SELECT * from student WHERE status = 'Approved' && student_id = '$_SESSION[student_id]'";
$dest = mysqli_query($conn, $staf);
$statkoyz = mysqli_fetch_assoc($dest);


$stafota = "SELECT * from student WHERE status = 'Decline' && student_id = '$_SESSION[student_id]'";
$destab = mysqli_query($conn, $stafota);
$statopak = mysqli_fetch_assoc($destab);





if (isset($row['p_p'])) {
    $setIM = "SELECT * FROM student WHERE p_p = '" . $row['p_p'] . "'";
    $searchIMResult = $conn->query($setIM);
    $searchIMResultRow = $searchIMResult->fetch_assoc();
} else {
    // Handle the error condition when 'p_p' key is not defined in $row array.
}



$statUE = "SELECT * from schoolyr WHERE student_id = '$_SESSION[student_id]'";
$des = mysqli_query($conn, $statUE);
$scho = mysqli_fetch_assoc($des);




$querk = "SELECT * FROM schoolyr WHERE enrollment_status = 2 AND student_id = $_SESSION[student_id]  ";
$resulk = mysqli_query($conn, $querk);
$rowk = mysqli_fetch_assoc($resulk);



$sql = "SELECT count(*) as 'enrollees' FROM schoolyr WHERE enrollment_status = '2' && student_id = '$_SESSION[student_id]'";
$result = $conn->query($sql);
$enrollees = $result->fetch_assoc();


?>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="wrapper">
    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="img/aa.png" alt="AdminLTELogo" height="60" width="60">
   </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a> -->
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <!-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
               <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
               <form class="form-inline">
                  <div class="input-group input-group-sm">
                     <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                     <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                           <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                           <i class="fas fa-times"></i>
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </li> -->

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <!-- <i class="far fa-comments"></i>
               <span class="badge badge-danger navbar-badge">3</span> -->
                </a>
                <div class="">
                    <!-- <a href="#" class="dropdown-item"> -->
                    <!-- Message Start -->
                    <!-- <div class="media">
                     <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                     <div class="media-body">
                        <h3 class="dropdown-item-title">
                           Brad Diesel
                           <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">Call me whenever you can...</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                     </div>
                  </div> -->
                    <!-- Message End -->
                    <!-- </a> -->
                    <div class=""></div>
                    <a href="#" class="">
                        <!-- Message Start -->
                        <!-- <div class="media">
                     <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                     <div class="media-body">
                        <h3 class="dropdown-item-title">
                           John Pierce
                           <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">I got your message bro</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                     </div>
                  </div> -->
                        <!-- Message End -->
                    </a>
                    <div class=""></div>
                    <a href="#" class="">
                        <!-- Message Start -->
                        <!-- <div class="media">
                     <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                     <div class="media-body">
                        <h3 class="dropdown-item-title">
                           Nora Silvester
                           <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">The subject goes here</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                     </div>
                  </div> -->
                        <!-- Message End -->
                    </a>
                    <div class=""></div>
                    <!-- <a href="#" class="dropdown-item dropdown-footer">See All Messages</a> -->
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <!-- <img src="../img/saddd.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8 "> -->

                    <?php
                    if (isset($row['p_p'])) {
                        echo '<img src="' . $searchIMResultRow['p_p'] . '"  height = "35px">';
                    }
                    ?>


                    <?php
                    if (isset($row['first_name'])) {
                        echo '<b>' . $row['first_name'] . ' ' . $row['last_name'] . '</b>';
                    }
                    ?>
                    <!-- <span class="badge badge-warning navbar-badge">15</span> -->
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- <span class="dropdown-item dropdown-header">15 Notifications</span>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item">
                  <i class="fas fa-envelope mr-2"></i> 4 new messages
                  <span class="float-right text-muted text-sm">3 mins</span>
               </a>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item">
                  <i class="fas fa-users mr-2"></i> 8 friend requests
                  <span class="float-right text-muted text-sm">12 hours</span>
               </a>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item">
                  <i class="fas fa-file mr-2"></i> 3 new reports
                  <span class="float-right text-muted text-sm">2 days</span>
               </a>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
                    <div class="container text-light" style="background-color: #00008b">
                        <div class="row">
                            <div class="col-sm-12 text-center text-light">
                                <br>


                                <?php
                                if (isset($row['p_p'])) {
                                    echo '<img src="' . $row['p_p'] . '" class="bg-light brand-image img-circle elevation-3" style="opacity: .8; height: 100px;">';
                                }
                                ?>


                            </div>

                            <div class="col-sm-12 text-center">
                                <div class="pull-left info">





                                    <?php
                                    if (isset($row['first_name'])) {
                                        echo '<p style="font-size:15px; font-size:20px;
                                        font-family:Segoe Script;" class="text-light text-bold"><b> Hello! ' . $row['first_name'] . ' ' . $row['last_name'] . '</b></p>';
                                    }
                                    ?>

                                    <p class="text-light" style="font-size:15px">Student</p>
                                </div>

                            </div>

                            <div class="col-sm-12 text-center mt-3">

                                <a href="logoutStudent.php" class="nav-link text-dark">


                                    <p class="bg-primary"> <i class="nav-icon fas fa-sign-out-alt text-light"></i>Logout</p>
                                </a>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>

                </div>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
               <i class="fas fa-expand-arrows-alt"></i>
            </a>
         </li> -->
            <!-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
               <i class="fas fa-th-large"></i>
            </a>
         </li> -->
        </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-0-primary elevation-4 " style="background-color:#00008b">
        <!-- Brand Logo -->
        <!-- Brand Logo -->
        <a href="Dashboard_admin.php" class="brand-link">
            <img src="../img/saddd.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-bold text-warning text-center" style="font-size:9px;
font-family:Segoe Script;  font-weight: bold;"><b>Divine Healer Academy of Sorsogon</b>

            </span>

        </a>

        <!-- Sidebar -->
        <div class=" sidebar " style=" height: auto;">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-2  mb-1 d-flex">
                <div class="pull-left image">
                    <?php
                    if (isset($row['p_p'])) {
                        echo '<img src="' . $searchIMResultRow['p_p'] . '" class="brand-image img-circle elevation-3" style="opacity: .8">';
                    }
                    ?>
                </div>
                <div class="pull-left info">
                    <?php
                    if (isset($row['first_name'])) {
                        echo '<p style="font-family: Segoe UI;" class="text-light">' . $row['first_name'] . ' ' . $row['last_name'] . '</p>';
                    }
                    ?>
                </div>

            </div>
        </div>


        <!-- Main Sidebar Container -->


        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar  border border-1 bg-light" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar bg-dark border border-1">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                <li class="nav-item header text-light" style="font-size:14px;">

                    <a href="#" class="nav-link text-light ">
                        <p>
                            &nbsp &nbsp &nbspMAIN NAVIGATION
                            <!-- <i ></i>   class="right fas fa-angle-left" -->
                        </p>
                    </a>

                </li>


                <li class="nav-item ">
                    <a href="dashboard.php" class="nav-link text-light ">
                        <i class="nav-icon fas nav-icon fas fa-copy"></i>
                        <p>
                            Pre-Registration Form
                            <!-- <i ></i>   class="right fas fa-angle-left" -->
                        </p>
                    </a>

                </li>

                <li class="nav-item ">
                    <a href="#" class="nav-link  text-light">
                        <i class="nav-icon fas fa-book text-light"></i>
                        <p>
                            Enrollment
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="Enroll.php" class="nav-link text-light ">
                                <i class="far fa-circle nav-icon text-light"></i>
                                <p>My Enrollment Form</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="class.php" class="nav-link text-light ">
                                <i class="far fa-circle nav-icon text-light"></i>
                                <p>My Class</p>
                            </a>
                        </li>


                    </ul>

                </li>
                <li class="nav-item menu-open">
                    <a href="" class="nav-link active text-light">
                        <i class="nav-icon far fa-envelope text-light"></i>
                        <p>
                            Notification
                            <i class="right fas fa-angle-left text-light"></i>
                            <span class="right badge badge-danger"> <span id="success"> <?= $enrollees['enrollees']; ?></span></span>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="notification.php" class="nav-link active bg-light text-dark">
                                <i class="far fa-dot-circle nav-icon text-dark"></i>
                                <p>View Notifications</p>
                            </a>
                        </li>

                    </ul>



                </li>


                <li class="nav-item">
                    <a href="logoutStudent.php" class="nav-link text-light">
                        <i class="nav-icon fas fa-sign-out-alt text-light"></i>
                        <p>Logout</p>
                    </a>




                </li>


            </ul>
        </nav>


        <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            <div>


                                <div>










                                    <?php
                                    if ($rowk) {
                                    ?>
                                        <script>
                                            const Toast = Swal.mixin({
                                                toast: true,
                                                position: 'top-end',
                                                showConfirmButton: false,
                                                timer: 3000,
                                                timerProgressBar: true,
                                                didOpen: (toast) => {
                                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                }
                                            })

                                            Toast.fire({
                                                icon: 'success',
                                                title: 'Successfully Enrolled!'
                                            })
                                        </script>

                                    <?php

                                    } else if (isset($row['status']) == '') {
                                    ?>
                                        <script>
                                            Swal.fire({
                                                title: '<b class = " text-warning" > &nbsp <i>Fill out the Pre-registration Form</i> </b>',
                                                text: 'Then wait for the Admin Approval',
                                                icon: 'warning',

                                                showCloseButton: true,
                                                // showCancelButton: true,
                                                focusConfirm: false,
                                                confirmButtonText: '<a href="dashboard.php" class = "text-light text-bold">Fill out now!</a>',
                                                confirmButtonAriaLabel: 'Thumbs up, great!'

                                            })
                                        </script>
                                    <?php


                                    } else if ($statko) {
                                    ?>
                                        <script>
                                            Swal.fire({
                                                title: '<b class = "  text-success" ><i>Pre-registration request is pending</i> </b>',
                                                text: 'Wait for the Admin Approval',
                                                icon: 'info',

                                                showCloseButton: true,
                                                // showCancelButton: true,
                                                focusConfirm: false,
                                                confirmButtonText: '<a href="dashboard.php" class = "text-light text-bold">Back to Dashboard</a>',
                                                confirmButtonAriaLabel: 'Thumbs up, great!'

                                            })
                                        </script>
                                    <?php

                                    } else if ($statkoyz) {
                                    ?>
                                        <script>
                                            Swal.fire({
                                                title: '<span class="text-dark enrollment-message">You can only view this once you Enrolled.</span>',
                                                text: '',
                                                icon: 'info',
                                                showCloseButton: true,
                                                focusConfirm: false,
                                                confirmButtonText: '<a href="#" class="text-light text-bold">Okay</a>',
                                                confirmButtonAriaLabel: 'Thumbs up, great!',
                                                customClass: {
                                                    icon: 'red-icon'
                                                }
                                            });
                                        </script>

                                        <style>
                                            .enrollment-message {
                                                background-color: #ccffcc;
                                                border-radius: 10px;
                                                font-family: Courier;
                                                font-size: 17px;
                                                overflow: hidden;
                                                padding: 10px;
                                            }

                                            .red-icon .swal2-icon::before {
                                                color: red !important;
                                            }
                                        </style>
                                    <?php
                                    } else if ($statopak) {
                                    ?>
                                        <script>
                                            Swal.fire({

                                                title: '<b class = " text-red" > &nbsp<b>Your Pre-registration request has been Declined!</b> </b>',
                                                text: 'This is due to maximum student request',
                                                icon: 'error',

                                                showCloseButton: true,
                                                // showCancelButton: true,
                                                focusConfirm: false,
                                                confirmButtonText: '<a href="dashboard.php" class = "text-light text-bold">Okay!</a>',
                                                confirmButtonAriaLabel: 'Thumbs up, great!'

                                            })
                                        </script>



                                    <?php
                                    }
                                    ?>



                                    <?php

                                    $enr = "SELECT * from schoolyr WHERE   status = 'Pending' && student_id = '$_SESSION[student_id]'";
                                    $des = mysqli_query($conn, $enr);
                                    $statko = mysqli_fetch_assoc($des);




                                    $stat = "SELECT * from schoolyr ";
                                    $des = mysqli_query($conn, $stat);
                                    $statkoNG = mysqli_fetch_assoc($des);


                                    $query1 = "SELECT student_id FROM schoolyr WHERE  SYID = $statkoNG[SYID]  ";
                                    $result1 = mysqli_query($conn, $query1);
                                    $row11 = mysqli_fetch_assoc($result1);


                                    $query22 = "SELECT * FROM student WHERE student_id = $row11[student_id] ";
                                    $result2 = mysqli_query($conn, $query22);
                                    $row22 = mysqli_fetch_assoc($result2);





                                    $query101 = "SELECT * FROM schoolyr WHERE enrollment_status = 2 AND student_id = $_SESSION[student_id]  ";
                                    $result1 = mysqli_query($conn, $query101);
                                    $row121 = mysqli_fetch_assoc($result1);


                                    ?>




                                    <?php if (isset($row121)) { ?>
                                        <div class="card-body border border-1">
                                            <!-- /.card-header -->
                                            <div class="card-body">




                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-sm-1">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="lockscreen-wrapper">
                                                                <div class="lockscreen-logo">
                                                                    <a style="font-family:'Courier New', Courier, monospace;">My REQUIREMENTS</a>
                                                                </div>
                                                                <!-- User name -->
                                                                <div class="lockscreen-name text-sm"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</div>

                                                                <!-- START LOCK SCREEN ITEM -->
                                                                <div class="lockscreen-item">
                                                                    <!-- lockscreen image -->

                                                                    <div class="lockscreen-image ">
                                                                        <img src="<?php echo $searchIMResultRow['p_p']; ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
                                                                    </div>
                                                                    <!-- /.lockscreen-image -->

                                                                    <!-- lockscreen credentials (contains the form) -->
                                                                    <form class="lockscreen-credentials">
                                                                        <div class="input-group">

                                                                            <p style=" font-weight: bold; font-size: 1.2rem; margin-bottom: 10px; background-color:#ffcccc">Important Notice</p>

                                                                            <div class="input-group-append">
                                                                                <button type="button" class="btn ">
                                                                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<i class="fas fa-arrow-right text-muted"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                    <!-- /.lockscreen credentials -->

                                                                </div>
                                                                <!-- /.lockscreen-item -->
                                                                <!-- <div class="help-block text-center">
                                                                Enter your password to retrieve your session
                                                            </div>
                                                            <div class="text-center">
                                                                <a href="login.html">Or sign in as a different user</a>
                                                            </div> -->
                                                                <?php
                                                                $querk = "SELECT * FROM schoolyr WHERE requirement_status = 2 AND student_id = $_SESSION[student_id] ";
                                                                $resulk = mysqli_query($conn, $querk);
                                                                $rowk = mysqli_fetch_assoc($resulk);

                                                                $querky = "SELECT * FROM schoolyr WHERE requirement_status = 1 AND student_id = $_SESSION[student_id] ";
                                                                $resulky = mysqli_query($conn, $querky);
                                                                $rowky = mysqli_fetch_assoc($resulky);

                                                                ?>



                                                                <?php if ($rowky) { ?>

                                                                    <div style="border: 2px solid #000; padding: 10px; margin: 10px;">


                                                                        <p>Failure to pass any of these requirements may result in a delay of enrollment or even the cancellation of student admission. Students should understand that the process of submitting these requirements can be time-consuming and sometimes challenging, but the school assures that they are necessary to ensure that they have a smooth and successful academic year.</p>
                                                                    </div>

                                                                <?php } ?>


                                                                <?php if ($rowk) { ?>



                                                                    <div style="border: 2px solid #000; padding: 10px; margin: 10px;">


                                                                        <p>We would like to congratulate you for fulfilling all the outstanding requirements and meeting the academic standards of the Divine Healer Academy of Sorsogon. We appreciate your dedication and hard work in completing all the necessary tasks to pass the Academic year.</p>
                                                                    </div>

                                                                <?php } ?>

                                                            </div>
                                                        </div>


                                                        &nbsp &nbsp &nbsp &nbsp

                                                        <div class="col-sm-7">


                                                            <?php
                                                            // database connection details

                                                            // get the SYID from the query string


                                                            // database query to retrieve incomplete requirements
                                                            $sql = "SELECT * FROM student_requirements AS sr 
        INNER JOIN schoolyr AS sch ON sr.SYID = sch.SYID 
        INNER JOIN requirement AS r ON sr.requirement_id = r.requirement_id 
        INNER JOIN student as stud ON stud.student_id = sch.student_id 
        INNER JOIN grade_level as grad ON grad.GRADE_lEVEL_ID = stud.GRADE_lEVEL_ID
        WHERE sch.student_id = '$_SESSION[student_id]'";

                                                            $result = mysqli_query($conn, $sql);

                                                            // check for errors in the database query
                                                            if (!$result) {
                                                                die("Query failed: " . mysqli_error($conn));
                                                            }

                                                            // initialize an empty array to hold the incomplete requirements for each grade level
                                                            $incomplete_requirements = array();

                                                            // loop through the query results and group the incomplete requirements by grade level
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $grade_level_id = $row['GRADE_LEVEL_ID'];
                                                                $requirement_name = $row['requirement'];
                                                                $requirement_status = $row['requirement_status'];
                                                                if (!isset($incomplete_requirements[$grade_level_id])) {
                                                                    $incomplete_requirements[$grade_level_id] = array();
                                                                }
                                                                if ($requirement_status == 1) {
                                                                    $incomplete_requirements[$grade_level_id][] = $requirement_name;
                                                                } elseif ($requirement_status == 2) {
                                                                    $incomplete_requirements[$grade_level_id] = "Complete";
                                                                }
                                                            }

                                                            // output the incomplete or complete requirements for each grade level
                                                            foreach ($incomplete_requirements as $grade_level_id => $requirements) {
                                                                if (is_array($requirements)) {
                                                                    $requirements_text = implode(" || ", $requirements);
                                                                    switch ($grade_level_id) {
                                                                        case 11:
                                                                        case 14:
                                                                        case 15:
                                                                        case 16:
                                                                        case 17:
                                                                        case 18:
                                                                            echo "<span style='background-color: #ffcccc; padding: 10px;' >Incomplete Requirments :  No Moral Certificate || No Form 137</span> <span style='color:red'></span>";
                                                                            break;
                                                                        case 19:
                                                                        case 20:
                                                                        case 21:
                                                                        case 22:
                                                                            echo "<span style='background-color: #ffcccc; padding: 10px;' >Incomplete Requirments :  No Moral Certicate || No Form 137 || No Barangay Clearance Certificate</span> <span style='color:red'></span>";
                                                                            break;
                                                                        case 23:
                                                                        case 24:
                                                                            echo "<span style='background-color: #ffcccc; padding: 10px;' >Incomplete Requirments :  No Moral Certicate || No Form 137 || No Barangay Clearance Certificate || No Permanent Record (SF10)</span> <span style='color:red'></span>";
                                                                            break;
                                                                        default:
                                                                            break;
                                                                    }
                                                                } else {
                                                                    echo "<span style='background-color: #ccffcc; padding: 10px;' >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspComplete Requirements&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span> <span style='color:red'></span> <br>";
                                                                }
                                                            }
                                                            ?>


                                                            <div class="mt-3">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Requirements</th>
                                                                            <th>Check</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $stat = "SELECT * FROM student_requirements AS sr 
                        INNER JOIN schoolyr AS sch ON sr.SYID = sch.SYID 
                        INNER JOIN requirement AS r ON sr.requirement_id = r.requirement_id 
                        WHERE student_id = '$_SESSION[student_id]'";
                                                                        $des = mysqli_query($conn, $stat);
                                                                        if ($des) {
                                                                            while ($row56 = mysqli_fetch_assoc($des)) {
                                                                                echo "<tr>";
                                                                                echo "<td>$row56[requirement]</td>";
                                                                                echo "<td><input type='checkbox' name='requirement_ids[]' value='$row56[requirement_id]' checked class='styled-checkbox'></td>";
                                                                                echo "</tr>";
                                                                            }
                                                                            mysqli_free_result($result);
                                                                        } else {
                                                                            echo "Failed query";
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                                <!-- <button type="button" onclick="checkAll()">Check All</button> -->
                                                                </form>

                                                                <script>
                                                                    function checkAll() {
                                                                        var checkboxes = document.getElementsByName('requirement_ids[]');
                                                                        for (var i = 0; i < checkboxes.length; i++) {
                                                                            checkboxes[i].checked = true;
                                                                        }
                                                                    }
                                                                </script>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>







                                                <!-- 
                                            Dear Students,

                                            We would like to remind you that the enrollment process for the upcoming academic term is fast approaching. As you prepare to join our institution, we would like to emphasize that meeting the necessary requirements for enrollment is essential.

                                            We kindly remind you that failing to meet these requirements will render your application incomplete, and consequently, your admission will not be processed. Therefore, we strongly encourage you to ensure that you have fulfilled all the necessary criteria for enrollment to avoid any inconvenience.

                                            Should you require any clarification or assistance in meeting these requirements, please do not hesitate to contact our admissions office for guidance.

                                            We wish you the very best as you finalize your preparations for enrollment and look forward to welcoming you to our esteemed institution.

                                            Sincerely,

                                            [Your Name]

                                            [Your Title/Position]

                                            [Institution Name]






                                        </div>














                                        In a letter or email to the student:
                                        Dear [Student's Name],
                                        I am writing to inform you that you have not met the requirements for [course/program/degree]. In order to successfully complete [course/program/degree], you must fulfill the following requirements: [list the specific requirements]. Unfortunately, you have not met these requirements at this time.

                                        We encourage you to take the necessary steps to fulfill these requirements as soon as possible. If you have any questions or concerns, please do not hesitate to contact [the appropriate person or office].

                                        Sincerely,
                                        [Your Name]

                                        In a meeting with the student:
                                        "Based on our review of your progress, it appears that you have not met the requirements for [course/program/degree]. In order to successfully complete [course/program/degree], you must fulfill the following requirements: [list the specific requirements]. Unfortunately, you have not met these requirements at this time.
                                        We would like to work with you to create a plan for how you can fulfill these requirements as soon as possible. Please let us know if you have any questions or concerns, and we will be happy to provide guidance and support."

                                        It's important to use a professional and respectful tone when communicating this information to the student. Be clear about the specific requirements that need to be met and offer guidance and support in helping the student fulfill them.











                                        These requirements are necessary for us to process your enrollment and ensure that we have accurate information about you. Please take note that failure to submit any of these requirements may result in a delay in your enrollment or even the cancellation of your admission.

                                        We encourage you to submit the aforementioned requirements as soon as possible to avoid any inconvenience. You may submit them personally at our school office or send them via email at [insert email address]. If you have any questions or concerns, please do not hesitate to reach out to us.

                                        Thank you for your cooperation.

                                        Sincerely,
                                        [School Name] -->




                                                <!-- <div class="container mt-5">
                                                <h3>List Requirements</h3>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Class Category</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>Applied all levels</th>
                                                                    <td>
                                                                        <p class="mb-0">PSA Birthcertificate</p>
                                                                        <p class="mb-0">Baptismal</p>
                                                                        <p class="mb-0">DSWD Card</p>
                                                                        <p class="mb-0">Medical Record</p>
                                                                        <p class="mb-0">4pc 2x2 picture</p>
                                                                        <p class="mb-0">Entrance Examination</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <p>Additional Requirements</p>
                                                                        <p class="mt-2">Elementary</p>
                                                                    </th>
                                                                    <td>
                                                                        <p class="mb-0 mt-4">Good Moral</p>
                                                                        <p class="mb-0">Form 137</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <p class="mt-5">Junior High School</p>
                                                                    </th>
                                                                    <td>
                                                                        <p class="mb-0 mt-5">Good Moral</p>
                                                                        <p class="mb-0">Form 137</p>
                                                                        <p class="mb-0">Barangay Clearance Certificate</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <p class="mt-5">Senior High School</p>
                                                                    </th>
                                                                    <td>
                                                                        <p class="mb-0 mt-5">Good Moral</p>
                                                                        <p class="mb-0">Form 137</p>
                                                                        <p class="mb-0">Barangay Clearance Certificate</p>
                                                                        <p class="mb-0">Permanent Record (SF10)</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>






















                                        </div>
                                        < /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>



                                    <?php } else { ?>

                                        <!-- <div class="alert alert-0" style='background-color: #ffcccc; padding: 10px;' role="alert">
    No Enrolled Subjects
</div> -->


                                    <?php } ?>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; <a>2023 DHAS ENROLLMENT SYSTEM | Developed by Alex J. Labajero jr.</a></strong>


    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<style>
    .styled-checkbox {
        position: relative;
        display: inline-block;
        cursor: pointer;
        padding-left: 25px;
        margin-right: 10px;
    }

    .styled-checkbox:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 18px;
        height: 18px;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
    }

    .styled-checkbox:checked:before {
        content: '\2713';
        color: #007bff;
        font-size: 16px;
        text-align: center;
        line-height: 18px;
    }
</style>

<?php
ob_end_flush();
?>



<?php include('includes/footer.php'); ?>