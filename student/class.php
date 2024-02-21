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


// $findIfEnroll = "SELECT * from enrollment WHERE student_id = '$_SESSION[student_id]'";
// $findIfEnrollresult = mysqli_query($conn, $findIfEnroll);

// $findIfEnrollresultrow = mysqli_fetch_assoc($findIfEnrollresult);



// $stat = "SELECT * from student WHERE  status = 'Pending' && student_id = '$_SESSION[student_id]'";
// $des = mysqli_query($conn, $stat);
// $statko = mysqli_fetch_assoc($des);



// $query = "SELECT *
// FROM `schoolyr` s
// INNER JOIN `school_year` sc ON s.school_year_id = sc.school_year_id 
// INNER JOIN `student` c ON s.student_id = c.student_id
// INNER JOIN `grade_level` g ON g.GRADE_LEVEL_ID = c.GRADE_LEVEL_ID
// WHERE s.enrollment_status = 2  
// ORDER BY s.SYID ASC";
// $result1 = mysqli_query($conn, $query);


// $rowe = mysqli_fetch_assoc($result1);


// $grade_level_id = $rowe['GRADE_LEVEL_ID'];

// $query = "SELECT * FROM  student WHERE GRADE_LEVEL_ID = $grade_level_id";
// $result = mysqli_query($conn, $query);


// $sqerl = "Select * from schoolyr where SYID = '$_SESSION[SYID]'";
// $resulte = $conn->query($sqerl);
// $rows = $resulte->fetch_assoc();







$sql = "Select * from student where student_id = '$_SESSION[student_id]'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();



if (isset($row['p_p'])) {
    $setIM = "SELECT * FROM student WHERE p_p = '" . $row['p_p'] . "'";
    $searchIMResult = $conn->query($setIM);
    $searchIMResultRow = $searchIMResult->fetch_assoc();
} else {
    // Handle the error condition when 'p_p' key is not defined in $row array.
}







// $stat = "SELECT * from student WHERE  status = 'Pending' && student_id = '$_SESSION[student_id]'";
// $des = mysqli_query($conn, $stat);
// $statko = mysqli_fetch_assoc($des);


// $staf = "SELECT * from student WHERE status = 'Approved' && student_id = '$_SESSION[student_id]'";
// $dest = mysqli_query($conn, $staf);
// $statkoyz = mysqli_fetch_assoc($dest);



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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
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

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active text-light">
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
                            <a href="class.php" class="nav-link active bg-light text-dark">
                                <i class="far fa-dot-circle nav-icon text-dark"></i>
                                <p>My Class</p>
                            </a>
                        </li>


                    </ul>

                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-light">
                        <i class="nav-icon far fa-envelope text-light"></i>
                        <p>
                            Notification
                            <i class="right fas fa-angle-left text-light"></i>
                            <span class="right badge badge-danger"> <span id="success"> <?= $enrollees['enrollees']; ?></span></span>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="notification.php" class="nav-link text-light">
                                <i class="far fa-circle nav-icon text-light"></i>
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
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">My Class</li> -->
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- 
                       -->


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
                                                title: '<b class = "  text-success" ><i>Proceed to Next Step of Enrollment !</i> </b>',
                                                text: 'this page contains your schedule',
                                                icon: 'info',

                                                showCloseButton: true,
                                                // showCancelButton: true,
                                                focusConfirm: false,
                                                confirmButtonText: '<a href="#" class = "text-light text-bold">Okay</a>',
                                                confirmButtonAriaLabel: 'Thumbs up, great!'

                                            })
                                        </script>
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


                                    <!-- didi start -->



                                    <?php

                                    // $enrolna = "SELECT * from schoolyr WHERE enrollment_status = '2' && student_id = '$_SESSION[student_id]'";
                                    // $desu = mysqli_query($conn, $enrolna);
                                    // $enrollan = mysqli_fetch_assoc($desu);




                                    $statuer = "SELECT * from schoolyr ";
                                    $desk = mysqli_query($conn, $statuer);
                                    $statkoNGi = mysqli_fetch_assoc($desk);


                                    $query12 = "SELECT student_id FROM schoolyr WHERE enrollment_status = 2 AND  SYID = $statkoNGi[SYID]  ";
                                    $result12 = mysqli_query($conn, $query12);
                                    $row112 = mysqli_fetch_assoc($result12);


                                    $query223 = "SELECT * FROM student WHERE student_id = $row112[student_id] ";
                                    $result23 = mysqli_query($conn, $query223);
                                    $row223 = mysqli_fetch_assoc($result23);

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
                                        <div class="card-body border border-1" style="  border-radius: 15px 15px 50px;   
      ">
                                            <!-- /.card-header -->
                                            <div class="card-body">


                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-3">

                                                            <!-- Profile Image -->
                                                            <div class="card card-primary card-outline">
                                                                <div class="card-body box-profile">







                                                                    <div class="text-center">



                                                                        <?php
                                                                        if (isset($row['p_p'])) {
                                                                            echo '<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>';
                                                                            echo '<img src="' . $searchIMResultRow['p_p'] . '" class="brand-image img-circle elevation-3" style="width: 200px ; height:200px;opacity: .8">';
                                                                        }
                                                                        ?>



                                                                        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="display: none;">
                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                <div class="modal-content">




                                                                                    <form action="../queries/updateImage.php?student_id=<?php echo $searchIMResultRow['student_id']; ?>" method="POST" enctype="multipart/form-data">
                                                                                        <div class="modal-body  pd-5 p-2">
                                                                                            <h5 class="mb-3">Insert new image</h5>
                                                                                            <div class="form-group">
                                                                                                <input type="file" class="form-control-file form-control height-auto" name="image">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="submit" class="btn btn-primary" name="jobseekerNewImageBtn">Submit</button>
                                                                                        </div>
                                                                                    </form>



                                                                                </div>
                                                                            </div>
                                                                        </div>




                                                                    </div>












                                                                    <?php
                                                                    $query = "SELECT * from `student` s, `grade_level` c WHERE s.GRADE_LEVEL_ID=c.GRADE_LEVEL_ID && student_id = '$_SESSION[student_id]'";
                                                                    $result = mysqli_query($conn, $query);
                                                                    $row2 = mysqli_fetch_assoc($result);

                                                                    ?>

                                                                    <!-- About Me Box -->


                                                                    <div class="container-fluid text-center">
                                                                        <div class="row">


                                                                            <h3 class="profile-username text-center" style="font-family:Segoe Script;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?= $row['last_name'] . " " . $row['first_name'] . ", " . $row['suffix_name'] . ", " . $row['middle_name'] . "."  ?></h3>



                                                                            <a href="#" class="btn btn-1 bg-white btn-block">Grade : <?= $row2['GRADE_LEVEL'] . " "  ?> |&nbsp Type : <?= $row2['student_type'] . " "  ?> |&nbsp Strand : <?= $row2['strand'] . " "  ?> </a>



                                                                            <!-- &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<p class='badge badge-1 bg-teal text-center' style='background-color:#5D9C59  border-radius: 15px 15px 15px 15px;
overflow: hidden;  
border-style:outset;
border-width: 3px;  border-color:	#ffffff;'>ENROLLED</p> -->


                                                                        </div>
                                                                    </div>
                                                                    <p class="text-muted text-center"><b>Student</b></p>





                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                            <!-- /.card -->

                                                            <!-- About Me Box -->
                                                            <div class="card card-1 border border-1">
                                                                <div class="card-header text-light  " style="background-color: #00008b;">
                                                                    <h3 class="card-title ">Student Information</h3>
                                                                </div>
                                                                <!-- /.card-header -->
                                                                <div class="card-body">



                                                                    <?php
                                                                    if (!empty($scho['DATE_ENROLLED'])) {
                                                                        echo '<div class="col-xs-12 mb-1" style="font-size:15px;">Date Enrolled :<span class="badge badge-xs badge-success">' . date('F d, Y', strtotime($scho['DATE_ENROLLED'])) . '</span></div>';
                                                                    }
                                                                    ?>

                                                                    <?php
                                                                    if ($row['student_type'] == 'transferee') {
                                                                    ?>
                                                                        <strong><i class=" fas fa-book mr-1"></i> School last Attended</strong>
                                                                        <p class="text-muted">
                                                                            <?= $row['school_last_attended'] . ""  ?>
                                                                        </p>
                                                                        <hr>
                                                                        <strong><i class="fas fa-calendar mr-1"></i> School Year</strong>
                                                                        <p class="text-muted">
                                                                            <?= $row['school_year'] . ""  ?>
                                                                        </p>
                                                                    <?php
                                                                    }
                                                                    ?>







                                                                    <hr>

                                                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                                                                    <p class="text-muted" style="text-transform:uppercase;"> <?= $row['street'] . " " . $row['barangay'] . ", " . $row['district'] . ", " . $row['city'] . "."  ?></p>

                                                                    <hr>



                                                                    <strong><i class="fas fa-phone-alt mr-1"></i> Contact Number</strong>

                                                                    <p class="text-muted">
                                                                        <?= $row['contact_number'] . ""  ?>
                                                                    </p>

                                                                    <hr>




                                                                    <?php
                                                                    if (isset($row['parent_name']) != ($row['guardian_name'])) {



                                                                        echo "<strong><i class='fas fa-users  mr-1'></i> Parent Name</strong>";
                                                                        echo "<p class='text-muted' style='text-transform:uppercase;'>" . $row['parent_name'] . '.</p>';
                                                                        echo "<hr>";


                                                                        echo "<strong><i class='fa fa-briefcase'></i> Parent Occupation </strong>";
                                                                        echo "<p class='text-muted' style='text-transform:uppercase;'>" . $row['parent_occupation'] . '.</p>';
                                                                        echo "<hr>";


                                                                        echo "<strong><i class='fa fa-mobile'></i> Parent Contact No</strong>";
                                                                        echo "<p class='text-muted' style='text-transform:uppercase;'>" . $row['parent_contact_no'] . '.</p>';
                                                                        echo "<hr>";
                                                                    } elseif (isset($row['guardian_name']) != '') {




                                                                        echo "<strong><i class='fas fa-users  mr-1'></i> Guardian Name</strong>";
                                                                        echo "<p class='text-muted' style='text-transform:uppercase;'>" . $row['guardian_name'] . '.</p>';
                                                                        echo "<hr>";


                                                                        echo "<strong><i class='fa fa-briefcase'></i> Guardian Occupation </strong>";
                                                                        echo "<p class='text-muted' style='text-transform:uppercase;'>" . $row['guardian_occupation'] . '.</p>';
                                                                        echo "<hr>";


                                                                        echo "<strong><i class='fa fa-mobile'></i> Guardian Contact No</strong>";
                                                                        echo "<p class='text-muted' style='text-transform:uppercase;'>" . $row['guardian_contact_no'] . '.</p>';
                                                                        echo "<hr>";
                                                                    }
                                                                    ?>



                                                                    <!-- <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong> -->

                                                                    <!-- <p class="text-muted">
                                                                    <span class="tag tag-danger">UI Design</span>
                                                                    <span class="tag tag-success">Coding</span>
                                                                    <span class="tag tag-info">Javascript</span>
                                                                    <span class="tag tag-warning">PHP</span>
                                                                    <span class="tag tag-primary">Node.js</span>
                                                                </p> -->

                                                                    <hr>



                                                                    <!-- 
                                                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->














                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                            <!-- /.card -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-md-9 border border-1">
                                                            <div class="card">
                                                                <div class="card-header p-2">
                                                                    <ul class="nav nav-pills">
                                                                        <li class="nav-item"><a class="nav-link active " href="#activity" data-toggle="tab">My Schedule</a></li>
                                                                        <!--<li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>-->
                                                                        <!--<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>-->
                                                                    </ul>
                                                                </div><!-- /.card-header -->
                                                                <div class="card-body">
                                                                    <div class="tab-content">


                                                                        <div class="active tab-pane border border-1" id="activity">




                                                                            <div class="alert alert-0 text-center" style='background-color: #ccffcc; padding: 10px;' role="alert">List of Subjects</div>






                                                                            <table class="table table-hover mb-0 text-center">
                                                                                <thead class="bg-light ">




                                                                                    <th>Time</th>
                                                                                    <th> Day </th>
                                                                                    <th> IMG </th>
                                                                                    <th> Teacher </th>


                                                                                    <th> Subject</th>
                                                                                    <th>Room </th>
                                                                                    <!-- <th> Room </th> -->
                                                                                    <!-- <th> Grade_level </th> -->



                                                                                    <!-- <php
                                                   if ($findIfEnrollresultrow == null) {
                                                      echo '<th> Enroll_subject </th>';
                                                   }
                                                   echo '</tr>';
                                                   ?> -->
                                                                                </thead>

                                                                                <tbody>
                                                 <?php
                                                     $supa = $_SESSION['student_id'];
                                                 $query = "SELECT GRADE_LEVEL_ID from student WHERE student_id = $supa";
                                                 $result = mysqli_query($conn, $query);
                                                          $row = mysqli_fetch_assoc($result);
                                                $GRADE_LEVEL_ID =  $row['GRADE_LEVEL_ID'];


                                                                                    // echo $_SESSION['user_id']
                                           $getSched = mysqli_query($conn, "SELECT * FROM `subject` as subj  INNER JOIN schedule as sched ON sched.subject_id = subj.subject_id INNER JOIN room as r ON sched.room_id = r.room_id INNER JOIN faculty as fac ON sched.faculty_id = fac.faculty_id INNER JOIN grade_level as v ON sched.GRADE_LEVEL_ID= v.GRADE_LEVEL_ID  ");

                                                 $getSem = mysqli_query($conn, "SELECT * FROM `tblsemester` WHERE SETSEM = 1");

                                         $sem = mysqli_fetch_assoc($getSem)['SEMESTER'];


                                     while ($row = mysqli_fetch_assoc($getSched)) {
                                             if ($row['GRADE_LEVEL_ID'] == $GRADE_LEVEL_ID) {

                                             if ($row['sched_semester'] == $sem or $row['sched_semester'] == 'Quarter') {

                                                  echo '<tr>';



                          echo '<td>' . date("g:iA", strtotime($row['start_time'])) . ' - ' . date("g:iA", strtotime($row['end_time'])) . ' </td>';

                                      echo '<td>' . $row['day'] . '</td>';
                                         echo '<td><img src="' . $row['p_p'] . '" style="width: 40px; height: 40px; opacity: 0.8; border-radius: 50%;"></td>';


                                              echo '<td>' . $row['fac_name'] . '</td>';








                                      echo '<td>' . $row['subject_description'] . ' (' . $row['subject_code'] . ')</td>';

                                  echo '<td>' . $row['room_name'] . '</td>';
                                                                                                // echo '<td>' . $row['GRADE_LEVEL'] . '</td>';
                                                                                                // echo '<td>'.$row['faculty_fname'].'</td>';
                                                                                                // echo '<td>'.$row['faculty_lname'].'</td>';



                                                                                                // if ($findIfEnrollresultrow == null) {
                                                                                                //    echo '<td><input type="checkbox" name="selectedSubjects[]" value="' . $row['subject_id'] . '"/></td>';
                                                                                                // }
                                                                                                echo '</tr>';
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                    ?></tbody>
                                                                            </table>







                                                                        </div>
                                                                        <!-- /.tab-pane -->
                                                                        <div class="tab-pane" id="timeline">
                                                                            <!-- The timeline -->




                                                                        </div>
                                                                    </div>

                                                                    <div>

                                                                    </div>
                                                                    <!-- END timeline item -->

                                                                </div>
                                                            </div>
                                                            <!-- /.tab-pane -->

                                                            <div class="tab-pane" id="settings">

                                                            </div>
                                                            <!-- /.tab-pane -->
                                                        </div>
                                                        <!-- /.tab-content -->
                                                    </div><!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <!-- /.col -->
                                        </div>



                                    <?php } else { ?>

                                        <!-- <div class="alert alert-0" style='background-color: #ffcccc; padding: 10px;' role="alert">
                                            No Enrolled Subjects
                                        </div> -->


                                    <?php } ?>
                                    <!-- /.row -->
                                </div>





                            </div>

                        </div>










                        <!-- end -->


















                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
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
    <div class="float-right d-none d-sm-block">

    </div>
    <strong>&copy;<a href="https://adminlte.io"> Divine Healer Academy of Sorsogon</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<?php if (isset($_GET[''])) : ?>
    <script>
        Swal.fire(
            '',
            '',
            'success'
        )
    </script>
<?php endif ?>





<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php if (isset($_GET['newImage'])) : ?>
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
            title: 'New Profile Picture Is successfully updated!'
        })
    </script>

<?php endif; ?>









<?php
ob_end_flush();
?>



<?php include('includes/footer.php'); ?>