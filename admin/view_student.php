<?php
include '../db_con.php';

// ob_start();
session_start();


if (!isset($_SESSION['admin_id'])) {
    header("location: ../index.php");
}



include('includes/header.php');


$sql = "SELECT count(*) as 'enrollees' FROM student WHERE NewEnrollees = '1' && status = 'Pending'";
$result = $conn->query($sql);
$enrollees = $result->fetch_assoc();


$sad = "SELECT * FROM account WHERE account_id = $_SESSION[admin_id]";
$ako = $conn->query($sad);
$row = $ako->fetch_assoc();






$stud_id = $_GET['student_id'];


$findIfEnroll = "SELECT * from enrollment WHERE student_id = '$stud_id'";
$findIfEnrollresult = mysqli_query($conn, $findIfEnroll);

$findIfEnrollresultrow = mysqli_fetch_assoc($findIfEnrollresult);



$stat = "SELECT * from student WHERE student_id = '$stud_id'";
$des = mysqli_query($conn, $stat);
$statko = mysqli_fetch_assoc($des);


$statur = "SELECT * from student WHERE student_type = 'transferee' AND student_id = '$stud_id'";
$desy = mysqli_query($conn, $statur);
$statkoyz = mysqli_fetch_assoc($desy);


$statury = "SELECT * from student WHERE student_type = 'returnee' AND student_id = '$stud_id'";
$desiree = mysqli_query($conn, $statury);
$statkoyzbul = mysqli_fetch_assoc($desiree);





$sql = "SELECT count(*) as 'enrollees' FROM student WHERE NewEnrollees = '1' && status = 'Pending'";
$result = $conn->query($sql);
$enrollees = $result->fetch_assoc();



$setSem = "Select * from tblsemester where SETSEM= '1'";
$searchSemResult = $conn->query($setSem);
$searchSetResultRow = $searchSemResult->fetch_assoc();


$setyr = "Select * from school_year where school_year_status = '1'";
$searchYrResult = $conn->query($setyr);
$searchYrRow = $searchYrResult->fetch_assoc();




$query = "SELECT * from student WHERE student_id = '$stud_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);



$sql1 = "Select * from enrollment where student_id = '$stud_id'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();


$querying = "SELECT * from account WHERE student_id = '$stud_id'";
$resultw = mysqli_query($conn, $querying);
$rowas = mysqli_fetch_assoc($resultw);


// $supit = $_SESSION['student_id'];
$query = "SELECT * from `student` s, `grade_level` c WHERE s.GRADE_LEVEL_ID=c.GRADE_LEVEL_ID &&student_id = '$stud_id'";
$result = mysqli_query($conn, $query);
$row2 = mysqli_fetch_assoc($result);




$sad = "SELECT * FROM account WHERE account_id = $_SESSION[admin_id]";
$ako = $conn->query($sad);
$rowA = $ako->fetch_assoc();


$setIn = "SELECT * FROM account WHERE p_p = '" . $rowA['p_p'] . "'";
$searchIMResult = $conn->query($setIn);
$searchInResultRow = $searchIMResult->fetch_assoc();




if (isset($row['p_p'])) {
    $setIM = "SELECT * FROM student WHERE p_p = '" . $row['p_p'] . "'";
    $searchIMResult = $conn->query($setIM);
    $searchIMResultRow = $searchIMResult->fetch_assoc();
} else {
    // Handle the error condition when 'p_p' key is not defined in $row array.
}


?>

<div class="wrapper">
    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
            </li> -->
            <li class="nav-item d-none d-sm-inline-block">
                <a href="pre_registration.php" class="btn btn-1  bg-warning btn-xs float-end text-right">BACK</a>
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


                    <img src="<?php echo $searchInResultRow['p_p']; ?>" height="35px" /> &nbsp
                    <?= $rowA['name'] ?>
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


                    <div class="container">
                        <div class="row">

                            <div class="col-sm-12 text-center">
                                <br>
                                <img src="<?php echo $searchInResultRow['p_p']; ?>" class="brand-image img-circle elevation-3" style="opacity: .8" height="100px" />


                            </div>

                            <div class="col-sm-12 text-center">
                                <div class="pull-left info">
                                    <p style="font-size:15px; font-size:20px;
font-family:Segoe Script;" class="text-dark text-bold"><b> Hello! <?= $rowA['name'] ?></b></p>
                                    <p style="font-size:15px">Administrator</p>
                                </div>

                            </div>

                            <div class="col-sm-12 text-center mt-3">

                                <a href="logout.php" class="nav-link text-dark">


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
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #670000">
        <!-- Brand Logo -->
        <a href="Dashboard_admin.php" class="brand-link">
            <img src="../img/saddd.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-bold text-warning text-center" style="font-size:11px;">Divine Healer Academy of Sorsogon</span>

        </a>

        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src=" <?php echo $searchInResultRow['p_p']; ?>" class="img-circle elevation-2" alt="User Image">
                </div>


                <div class="info">

                    <!-- <p><?= $_SESSION['auth_user']['email']; ?></p> -->
                    <a><?= $_SESSION['auth_user']['username']; ?></a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <!-- <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar  bg-light border border-1 bg-light" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar bg-light border border-1">
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
                    <li class="nav-item ">
                        <a href="Dashboard_admin.php" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <!-- <i ></i>   class="right fas fa-angle-left" -->
                            </p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="Pre_registration.php" class="nav-link  ">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                New Enrollee

                                <span class="right badge badge-danger"> <span id="success"> <?= $enrollees['enrollees']; ?></span></span>

                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="" class="nav-link active">
                            <i class="nav-icon far fa-plus-square"></i>
                            <p>
                                Enrollment
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="Pending.php" class="nav-link active bg-light">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View Pre-registration Status</p>
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li class="nav-item">
                        <a href="schedule.php" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Schedule
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="schedule.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Set Schedule</p>
                                </a>
                            </li>


                        </ul>

                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                School_year
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="school_year.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Set School_year</p>
                                </a>
                            </li>


                        </ul>

                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Semester
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="setsem.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Set Semester</p>
                                </a>
                            </li>


                        </ul>

                    </li>



                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Faculty
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="faculty.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Faculty</p>
                                </a>
                            </li>


                        </ul>

                    </li>








                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-columns"></i>
                            <p>
                                Room
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="room.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Room</p>
                                </a>
                            </li>


                        </ul>

                    </li>


                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class=" nav-icon fas fa-book"></i>
                            <p>
                                Subject
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="subject.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Subject</p>
                                </a>
                            </li>


                        </ul>

                    </li>


                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class=" nav-icon far fa-envelope"></i>
                            <p>
                                Grade_level
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="grade_level.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Grade_level/Strand</p>
                                </a>
                            </li>


                        </ul>

                    </li>






                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="nav-icon fas fa-file  "></i>
                            <p>
                                Class List
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="stud_per_fac.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Student_list per Instructors</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="notification.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Students_Enrolled per Year</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="notification.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Students Enrolled per Subjects</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="notification.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Students Enrolled per Semester</p>
                                </a>
                            </li>


                        </ul>


                    </li>


                    <li class="nav-item">
                        <a href="profile.php" class="nav-link  text-light">
                            <i class="nav-icon fa fa-user text-light"></i>
                            <p>My Profile</p>
                        </a>




                    </li>

                    <!-- <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>




                    </li> -->


                </ul>
            </nav>


        </div>
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
                            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Enrollment</li> -->
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
                        <div class="card">

                            <!-- /.card-header -->
                            <form action="actions/editAction.php" method="POST">
                                <div class="container mt-5">
                                    <div class="col-sm-12 ">
                                        <div class="row">






                                            <div class=" border border-1" style="  border-radius: 10px 10px 10px  10px ; overflow: hidden;  ">
                                                <div class="container-fluid mt-2 mb-2 ">
                                                    <div class="row">


                                                        <div class="col-sm-12">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-sm-9">

                                                                        <div class='container-fluid mt-5'>
                                                                            <div class='row'>


                                                                                <div class='col-sm-1 mt-1 '>
                                                                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                                                                    &nbsp
                                                                                    &nbsp
                                                                                    &nbsp
                                                                                    &nbsp
                                                                                    &nbsp
                                                                                    &nbsp
                                                                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                                                                </div>

                                                                                <div class='col-sm-2 '>
                                                                                    <img src='../img/log.png' alt='logo' class='d-block logo-img' height='110' width='160' style='margin-left: 50px'>
                                                                                </div>
                                                                                <div class='mr-4'>
                                                                                </div>
                                                                                &nbsp
                                                                                <div class='col-sm-8 text-center mt-6 mr-2'>
                                                                                    <h4>DIVINE HEALER ACADEMY OF SORSOGON</h4>
                                                                                    <p style='font-size: 16px'>EL Retiro Compound, Cabid-an, Sor. City <br> Call Us:(083)228-9722
                                                                                        healingservants@gmail.com
                                                                                        </br></p>



                                                                                </div>


                                                                                <!-- 
                                                                                <div class='col-sm-1'>
                                                                                </div> -->
                                                                            </div>

                                                                        </div>




                                                                    </div>


                                                                    <div class="col-sm-2 border border-1 ">
                                                                        <div class="form-group mt-2 ">
                                                                            <img src="<?php echo $searchIMResultRow['p_p']; ?>" style=" width: 170px ; height:170px;opacity: .8 border-style:solid">
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <br>

                                                        </div>


                                                        <br>




                                                        <div class="col-sm-6 ">

                                                            <div class="form-group text-center">

                                                                <?php if ($row['GRADE_LEVEL_ID'] == '23' || $row['GRADE_LEVEL_ID'] == '24') { ?>

                                                                    <input value=" <?= $searchSetResultRow['SEMESTER']; ?> Semester" class=" form-control input-sm  bg-light border border-1   text-center">
                                                                <?php } else {
                                                                    // echo '<div class="alert alert-success text-center mt-4" role="alert" style = "font-size:10px">
                                                                    //         //   COMPLETE THE PRE-REGISTRATION FORM
                                                                    //           </div>';
                                                                } ?>

                                                            </div>


                                                        </div>





                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group text-center">

                                                                <input value=" Academic Year : <?= $searchYrRow['school_year']; ?> " class=" form-control input-sm   bg-light border border-1 text-center">
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-2 ">

                                                            <label class="">Date_of_registration<B style="color:red">*</B> </label>
                                                            <input type="date" name="date_of_registration" class="form-control  bg-light border border-1  " value="<?= $row['date_of_registration'] ?>" <?php

                                                                                                                                                                                                        ?> disabled required>

                                                        </div>

                                                        <div class="col-sm-2 ">
                                                            <label>Student_Type <B style="color:red">*</B> </label>
                                                            <input type="text" name="student_type" class="form-control  bg-light border border-1 input-sm  " value="<?= $row['student_type'] ?>" <?php

                                                                                                                                                                                                    ?> disabled required>
                                                        </div>



















                                                        <div class="col-sm-5 ">
                                                            <label>School_last_attended (transferee only) <B style="color:red">*</B></label>
                                                            <input type="text" name="school_last_attended" class="form-control bg-light border border-1 border   input-sm  " value="<?= $row['school_last_attended'] ?>" <?php



                                                                                                                                                                                                                            ?> disabled required>
                                                        </div>


                                                        <div class="col-sm-3 ">
                                                            <label>School_year (transferee only) <B style="color:red">*</B></label>
                                                            <input type="text" name="school_year" class="form-control  bg-light border border-1  input-sm " value="<?= $row['school_year'] ?>" <?php



                                                                                                                                                                                                ?> disabled required>
                                                        </div>










                                                        <div class="col-md-3 col-12">

                                                            <?php
                                                            $query = "SELECT * from grade_level where GRADE_LEVEL_ID = '$row[GRADE_LEVEL_ID]'";
                                                            $result = mysqli_query($conn, $query);
                                                            $bulbol = mysqli_fetch_assoc($result);
                                                            ?>

                                                            <label class="mt-3">Grade Level</label>
                                                            <!-- <p><?= $data['GRADE_LEVEL']; ?></p> -->
                                                            <div class="form-group">

                                                                <input id="strand" name="GRADE_LEVEL" class="form-control   bg-light border border-1 " class="form-control  bg-light border border-1  " value=<?= $bulbol['GRADE_LEVEL']; ?> disabled required>


                                                                <!-- <php foreach ($result as $data) : ?>
                                                                    <option value="new"></option>
                                                                <php endforeach; ?> -->

                                                            </div>

                                                        </div>












                                                        <div class="col-sm-3">
                                                            <label class="mt-3">LRN: <B style="color:red">*</B></label>
                                                            <input type="text" name="LRN" class="form-control  bg-light border border-1  " value="<?= $row['LRN'] ?>" <?php


                                                                                                                                                                        ?> disabled required>
                                                        </div>




                                                        <div class="col-sm-3">

                                                            <label class="mt-3">Strand: (SHS only) <B style="color:red">*</B></label>

                                                            <input id="student_type" name="student_type" class="form-control   bg-light border border-1 " class="form-control  bg-light border border-1 " value="<?= $row['strand']; ?>" disabled required>

                                                            <!-- <option value="new"></option> -->
                                                            <!-- </input> -->

                                                        </div>





                                                        <div class="col-sm-3 ">


                                                            <label class="mt-3"> <B style="color:red">*</B></label>
                                                            <input type="text" name="first_name" class="form-control input-sm  ">
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>


                                            <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->


                                            <div class="container-fluid  mt-4 mb-4 border border-1" style="  border-radius: 10px 10px 10px  10px ; overflow: hidden;  ">
                                                <h5 class=" text-center  text-dark mt-3 mb-3" style="  font-family:Segoe UI; color:dark;">PERSONAL INFORMATION</b></h3>
                                                    <div class="row">


                                                        <div class="col-sm-3 ">


                                                            <label>First_name <B style="color:red">*</B></label>
                                                            <input type="text" name="first_name" class="form-control  bg-light border border-1  input-sm  " value="<?= $row['first_name'] ?>" <?php

                                                                                                                                                                                                ?> disabled required>
                                                        </div>




                                                        <div class="col-sm-3 ">
                                                            <label>Last_name <B style="color:red">*</B> </label>
                                                            <input type="text" name="last_name" class="form-control bg-light border border-1   input-sm  " value="<?= $row['last_name'] ?>" <?php



                                                                                                                                                                                            ?> disabled required>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <label>Middle_name <B style="color:red">*</B> </label>
                                                            <input type="text" name="middle_name" class="form-control bg-light border border-1  " value="<?= $row['middle_name'] ?>" <?php



                                                                                                                                                                                        ?> disabled required>
                                                        </div>

                                                        <div class="col-sm-2 ">
                                                            <label>Suffix_name <B style="color:red">*</B></label>
                                                            <input type="text" name="suffix_name" class="form-control bg-light border border-1  " value="<?= $row['suffix_name'] ?>" <?php


                                                                                                                                                                                        ?>disabled required>
                                                        </div>

                                                        <div class="col-sm-1 ">
                                                            <label>Age <B style="color:red">*</B></label>
                                                            <input type="number" name="age" class="form-control  bg-light border border-1  " value="<?= $row['age'] ?>" <?php



                                                                                                                                                                        ?> disabled required>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="mt-3">Civil_status <B style="color:red">*</B></label>
                                                            <input type="text" name="civil_status" class="form-control bg-light border border-1  " value="<?= $row['civil_status'] ?>" <?php


                                                                                                                                                                                        ?> disabled required>
                                                        </div>
                                                        <!-- 
                                                               <div class="col-sm-4 ">
                                                                  <label class="mt-3">Email <B style="color:red">*</B></label>
                                                                  <input type="text" name="email" class="form-control  " value="<?= $row['email'] ?>" <?php



                                                                                                                                                        ?> required>
                                                               </div> -->




                                                        <div class="col-sm-3 ">
                                                            <label class="mt-3">Contact_number <B style="color:red">*</B></label>
                                                            <input type="text" name="contact_number" class="form-control  bg-light border border-1  " value="<?= $row['contact_number'] ?>" <?php


                                                                                                                                                                                            ?> disabled required>
                                                        </div>


                                                        <!-- <div class="col-sm-3 ">
                                                <label class="mt-3">Email </label>
                                                <input type="text" name="email" class="form-control border border-dark " value="<?= $row['email'] ?>" <?php


                                                                                                                                                        ?>>
                                             </div> -->





                                                        <div class="col-sm-2 ">
                                                            <label class="mt-3">Birth_date <B style="color:red">*</B></label>
                                                            <input type="date" name="birthdate" class="form-control bg-light border border-1  " value="<?= $row['birthdate'] ?>" <?php


                                                                                                                                                                                    ?>disabled required>
                                                        </div>



                                                        <div class="col-sm-4  ">
                                                            <label class="mt-3">Birth_place <B style="color:red">*</B></label>
                                                            <input type="text" name="birthplace" class="form-control bg-light border border-1  " value="<?= $row['birthplace'] ?>" <?php

                                                                                                                                                                                    ?> disabled required>
                                                        </div>









                                                        <div class="col-sm-2 mb-3 ">
                                                            <label class="mt-3">Height(cm)</label>
                                                            <input type="text" name="height" class="form-control bg-light border border-1  " value="<?= $row['height'] ?>" <?php


                                                                                                                                                                            ?> disabled required>
                                                        </div>




                                                        <div class="col-sm-2 mb-3 ">
                                                            <label class="mt-3">Weight(Kg)</label>
                                                            <input type="text" name="weight" class="form-control bg-light border border-1  " value="<?= $row['weight'] ?>" <?php

                                                                                                                                                                            ?>disabled required>
                                                        </div>


                                                        <div class="col-sm-3 mb-3 ">
                                                            <label class="mt-3">Gender <B style="color:red">*</B></label>
                                                            <input type="text" name="gender" class="form-control bg-light border border-1  " value="<?= $row['gender'] ?>" <?php



                                                                                                                                                                            ?>disabled required>
                                                        </div>


                                                        <div class="col-sm-5 mb-3">
                                                            <label class="mt-3">Religion <B style="color:red">*</B></label>
                                                            <input type="text" name="religion" class="form-control  bg-light border border-1  " value="<?= $row['religion'] ?>" <?php


                                                                                                                                                                                ?>disabled required>
                                                        </div>


                                                    </div>
                                            </div>
                                            <!-- dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd -->





                                            <div class="container-fluid  mb-4  border border-1" style="  border-radius: 10px 10px 10px  10px ; overflow: hidden;  ">
                                                <h4 class="container-fluid mb-4">
                                                    <h5 class=" text-center  text-dark mt-3 mb-3" style="  font-family:Segoe UI; color:dark;">ADDRESS INFORMATION</b></h3>
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-3">
                                                                <label class="mt-3">House_Number</label>
                                                                <input type="text" name="unit_number" class="form-control bg-light border border-1  " value="<?= $row['unit_number'] ?>" <?php


                                                                                                                                                                                            ?>disabled required>
                                                            </div>


                                                            <div class="col-sm-2 mb-3 ">
                                                                <label class="mt-3">Street <B style="color:red">*</B></label>
                                                                <input type="text" name="street" class="form-control bg-light border border-1 " value="<?= $row['street'] ?>" <?php


                                                                                                                                                                                ?>disabled required>
                                                            </div>

                                                            <div class="col-sm-2 mb-3 ">
                                                                <label class="mt-3">Barangay <B style="color:red">*</B></label>
                                                                <input type="text" name="barangay" class="form-control bg-light border border-1" value="<?= $row['barangay'] ?>" <?php


                                                                                                                                                                                    ?>disabled required>
                                                            </div>



                                                            <div class="col-sm-2 mb-3 ">
                                                                <label class="mt-3">District</label>
                                                                <input type="text" name="district" class="form-control bg-light border border-1" value="<?= $row['district'] ?>" <?php

                                                                                                                                                                                    ?>disabled required>
                                                            </div>






                                                            <div class="col-sm-1 mb-3">
                                                                <label class="mt-3">Zip_code <B style="color:red">*</B></label>
                                                                <input type="text" name="zip_code" class="form-control bg-light border border-1  " value="<?= $row['zip_code'] ?>" <?php



                                                                                                                                                                                    ?>disabled required>
                                                            </div>



                                                            <div class="col-sm-3 mb-3">
                                                                <label class="mt-3">City <B style="color:red">*</B></label>
                                                                <input type="text" name="city" class="form-control bg-light border border-1 " value="<?= $row['city'] ?>" <?php



                                                                                                                                                                            ?>disabled required>
                                                            </div>

                                                        </div>
                                            </div>





                                            <div class="container-fluid border border-1" style="  border-radius: 10px 10px 10px  10px ; overflow: hidden;  ">
                                                <h4 class="container-fluid mb-4">

                                                    <h5 class=" text-center  text-dark mt-3 mb-3" style="  font-family:Segoe UI; color:dark;">PARENT/GUARDIAN INFORMATION</b></h3>
                                                        <div class="row">

                                                            <div class="col-sm-4">
                                                                <label class="mt-3"><b>Parent_name</b></label>
                                                                <input type="text" name="parent_name" class="form-control bg-light border border-1 " value="<?= $row['parent_name'] ?>" <?php

                                                                                                                                                                                        ?>disabled required>
                                                            </div>

                                                            <div class="col-sm-4 ">
                                                                <label class="mt-3">Parent_occupation</label>
                                                                <input type="text" name="parent_occupation" class="form-control bg-light border border-1 " value="<?= $row['parent_occupation'] ?>" <?php

                                                                                                                                                                                                    ?>disabled required>
                                                            </div>

                                                            <div class="col-sm-4 ">
                                                                <label class="mt-3">Parent_contact_no</label>
                                                                <input type="text" name="parent_contact_no" class="form-control  bg-light border border-1" value="<?= $row['parent_contact_no'] ?>" <?php


                                                                                                                                                                                                    ?>disabled required>
                                                            </div>

                                                            <div class="col-sm-4 ">
                                                                <label class="mt-3">Guardian_name</label>
                                                                <input type="text" name="guardian_name" class="form-control bg-light border border-1 " value="<?= $row['guardian_name'] ?>" <?php

                                                                                                                                                                                            ?>disabled required>
                                                            </div>



                                                            <div class="col-sm-4">
                                                                <label class="mt-3">Guardian_occupation</label>
                                                                <input type="text" name="guardian_occupation" class="form-control bg-light border border-1 " value="<?= $row['guardian_occupation'] ?>" <?php


                                                                                                                                                                                                        ?>disabled required>
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <label class="mt-3">Guardian_contact_no</label>
                                                                <input type="text" name="guardian_contact_no" class="form-control bg-light border border-1 " value="<?= $row['guardian_contact_no'] ?>" <?php

                                                                                                                                                                                                        ?>disabled required>
                                                            </div>



                                                            <div class="col-sm-3 mt-2 d-flex justify-content-start align-items-center" class="form-control ">

                                                            </div>

                                                            <div class="col-sm-3 mt-2 d-flex justify-content-start align-items-center" class="form-control ">

                                                            </div>


                                                            <div class="col-sm-3 mt-2 d-flex justify-content-start align-items-center" class="form-control ">

                                                            </div>
                                                            <div class="col-sm-1 mt-2 d-flex justify-content-start align-items-center" class="form-control ">

                                                            </div>


                                                            <!-- 
                                                               <div class="form-group row">
                                                                  <label class="col-sm-4 col-form-label">Upload Image <B style="color:red">*</B></label>

                                                                  <div class="col-sm-8">
                                                                     <input type="file" name="name" class="form-control-file form-control height-auto" accept="image/*" required>
                                                                  </div>
                                                               </div> -->

                                                            <div class="col-sm-2 mt-2 d-flex justify-content-start align-items-center" class="form-control ">
                                                                <!-- <input type="submit" name="<?= $action ?>" value="<?= $btn_value ?>" class="btn btn-success btn-sm mb-3" style="margin-top:33px"> -->
                                                            </div>
                                                            <br>



                                                        </div>
                                            </div>

                            </form>



                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                        <br>
                        <br>
                        <div class="container text-right">
                            <div class="row">
                                <div class="col-sm-11 ">

                                </div>
                                <div class="col-sm-1 ">
                                    <button type="button" id="printBtn" onclick=" printPart()" class="btn btn-block btn-primary">Print</button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>




                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- <footer class="main-footer">
        <div class="float-right d-none d-sm-block">

        </div>
        <strong>&copy;<a href="https://adminlte.io"> Divine Healer Academy of Sorsogon</a>.</strong> All rights reserved.
    </footer> -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script type="text/javascript">
    function status_update(value, student_id) {
        //alert(id);  
        let url = "http://localhost/Enrollment/admin/Pending.php";
        window.location.href = url + "?student_id=" + student_id + "&status=" + value;
    }
</script>




<script>
    function printPart() {
        window.print();
    }
</script>

<style>
    @media print {
        #printBtn {
            display: none;
        }

        .con {
            width: 100%;
        }

        .logo-img {}

    }
</style>
<!-- jQuery -->


<?php include('includes/footer.php'); ?>