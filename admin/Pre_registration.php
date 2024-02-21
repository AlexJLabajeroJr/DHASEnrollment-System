<?php
include '../db_con.php';

ob_start();
session_start();

include('includes/header.php');



$sql = "SELECT count(*) as 'enrollees' FROM student WHERE NewEnrollees = '1' && status = 'Pending'";
$result = $conn->query($sql);
$enrollees = $result->fetch_assoc();


if (!isset($_SESSION['admin_id'])) {
    header("location: ../index.php");
}

$sad = "SELECT * FROM account WHERE account_id = $_SESSION[admin_id]";
$ako = $conn->query($sad);
$row = $ako->fetch_assoc();


$setIn = "SELECT * FROM account WHERE p_p = '" . $row['p_p'] . "'";
$searchIMResult = $conn->query($setIn);
$searchInResultRow = $searchIMResult->fetch_assoc();

if (isset($_POST['refresh'])) {
    header('location:Pre_registration.php');
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



            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-plus fa-fw"></i> New <i class="fa fa-caret-down"></i>
                    <!-- <span class="badge badge-warning navbar-badge">15</span> -->
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- <span class="dropdown-item dropdown-header">15 Notifications</span> -->

                    <div class="dropdown-divider"></div>
                    <a href="schedule.php" class="dropdown-item">
                        <i class="fa fa-calendar fa-fw"></i> Schedule
                        <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="subject.php" class="dropdown-item">
                        <i class="fa fa-book fa-fw"></i> Subject
                        <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="room.php" class="dropdown-item">
                        <i class="fa  fa-school  fa-fw"></i> Room
                        <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="profile.php" class="dropdown-item">
                        <i class="fa fa-user  fa-fw"></i> User
                        <!-- <span class="float-right text-muted text-sm">2 days</span> -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <!-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
                </div>
            </li>


            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <!-- <img src="../img/saddd.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8 "> -->
                    <img src="<?php echo $searchInResultRow['p_p']; ?>" height="35px" /> &nbsp
                    <b><?= $row['name'] ?></b>
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
                    <div class="container" style="background-color: #">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <br>
                                <img src="<?php echo $searchInResultRow['p_p']; ?>" class="brand-image img-circle elevation-3" style="opacity: .8" height="100px" />


                            </div>

                            <div class="col-sm-12 text-center">
                                <div class="pull-left info">
                                    <p style="font-size:15px; font-size:20px;
font-family:Segoe Script;" class="text-dark text-bold"><b> Hello! <?= $row['name'] ?></b></p>
                                    <p class="text-dark" style="font-size:15px">Administrator</p>
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
            <div class="form-inline">
                <!-- <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar  bg-light border border-1 bg-light" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar bg-light border border-1">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div> -->
            </div>


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
                        <a href="Dashboard_admin.php" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <!-- <i ></i>   class="right fas fa-angle-left" -->
                            </p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="Pre_registration.php" class="nav-link active ">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                New Enrollee

                                <span class="right badge badge-danger"> <span id="success"> <?= $enrollees['enrollees']; ?></span></span>

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon far fa-plus-square"></i>
                            <p>
                                Enrollment
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="Pending.php" class="nav-link">
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
                                <a href="stud_list_per_inst.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Student_list per Instructors</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="stud_enrolled_per_grad.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Students_Enrolled per Grade level</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="stud_class_sched_p_grad.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Class Sched per Grade level</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="stud_enr_per_sub.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Students Enrolled per Subject</p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="stud_enrolled_per_sem.php" class="nav-link">
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pre-registration requests</li>

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


                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <div>
                                <br>
                                <div class="container-fluid">
                                    <div class="row">

                                        <div class="col-sm-10">
                                            <h3 class="bg-light  text-center  text-light" style="  font-family:Segoe UI; color:white;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPRE-REGIS<b class="text-lightblue" style="font-family:Segoe UI;"><i></b><b></b></i>TRATION REQUEST</b></h3>
                                        </div>

                                        <div class="">

                                        </div>

                                        <div class="col-sm-2 text-center">
                                            <img src="../img/log.png" height="100px" />

                                        </div>

                                    </div>
                                </div>

                                <div>

                                    <!-- /.card-header -->



                                    <!-- <style>
                                                    @keyframes movingArrow {
                                                        0% {
                                                            transform: translateX(0);
                                                        }

                                                        50% {
                                                            transform: translateX(5px);
                                                        }

                                                        100% {
                                                            transform: translateX(0);
                                                        }
                                                    }

                                                    .moving-arrow {
                                                        animation: movingArrow 1.5s infinite;
                                                    }
                                                </style> -->





























































                                    <?php


                                    // Check if the form is submitted
                                    if (isset($_POST['submit_max_students'])) {
                                        $_SESSION['max_students'] = intval($_POST['max_students']);
                                    } elseif (!isset($_SESSION['max_students'])) {
                                        $_SESSION['max_students'] = 30;
                                    }

                                    $max_students = $_SESSION['max_students'];
                                    ?>

                                    <form method="post">
                                        <div class="row align-items-center">
                                            <div class="col-sm-2">
                                                <br>
                                                <br>
                                                <label for="max_students" style="font-size:11px;"></label>
                                                <input class="form-control-sm border border-1" type="number" id="max_students" name="max_students" min="1" style="background-color: #f2f2f2; border: none; padding: 10px;" value="<?php echo $max_students; ?>">
                                            </div>
                                            <div class="col-sm-1">


                                                <button class="btn btn-xs btn-light border border-1 btn-sm w-100 mt-5" type="submit" name="submit_max_students" style="padding: 8px;">
                                                    <i class="fa fa-edit"></i> Set
                                                </button>
                                            </div>

                                            <div class="col-sm-7">
                                            </div>
                                            <div class="col-sm-2">



                                                <style>
                                                    @keyframes movingArrow {
                                                        0% {
                                                            transform: translateX(0);
                                                        }

                                                        50% {
                                                            transform: translateX(5px);
                                                        }

                                                        100% {
                                                            transform: translateX(0);
                                                        }
                                                    }

                                                    .moving-arrow {
                                                        animation: movingArrow 1.5s infinite;
                                                    }
                                                </style>




                                                <a class="btn btn-0 bg-blue mt-5 moving-arrow" type="submit" style="font-size:12px; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19); border-style: outset; border-width: 5px; border-color: #ffffff;" href="table.php" role="button">
                                                    <span class="fa fa-eye fw-fa"></span>&nbsp; View Enrolled Students
                                                </a>


                                            </div>
                                        </div>
                                    </form>

                                    <!-- Table of students -->
                                    <table id="example1" class="table table-bordered table-striped" style="font-size: 12px" cellspacing="0">
                                        <thead class="text-center bg-light" style="font-size: 11px; background-color: #6096B4" cellspacing="0">
                                            <th class="bg-light  text-center  text-light" style="  font-family:Segoe UI; color:white;">Image</th>
                                            <th class="text-left">Name</th>
                                            <th>Sex</th>
                                            <th>Age</th>
                                            <th>Status</th>
                                            <th>Student type</th>

                                            <th>Grade_level</th>
                                            <th>Strand</th>
                                            <th>Contact_number</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody class="text-center" style="font-size: 12px" cellspacing="0">
                                            <?php
                                            // Display the maximum value
                                            echo '<p style="font-size: 13px;  color: #ff0000; padding: 5px;">The standard maximum number of slots for pre-registration requests per grade level is set to: ' . $max_students . '</p>';

                                            if (isset($_POST['submit_max_students'])) {
                                                $max_students = intval($_POST['max_students']);
                                            } elseif (isset($max_students)) {
                                                $max_students = $max_students;
                                            } else {
                                                $max_students = 0; // Set a default value or leave it as 0
                                            }


                                            $query = "SELECT * FROM `student` s, grade_level c WHERE s.GRADE_LEVEL_ID=c.GRADE_LEVEL_ID AND status = 'Pending' ORDER BY student_id ASC";
                                            $result = mysqli_query($conn, $query);

                                            // Process the results
                                            while ($row = mysqli_fetch_object($result)) {
                                                echo '<tr>';
                                                echo '<td><img src="' . $row->p_p . '" style=" width="40" height="40" opacity: .8" ></td>';
                                                echo '<td class = "text-left"><p class="">' . $row->first_name . ' ' . $row->middle_name . '. ' . $row->last_name . '  ' . $row->suffix_name . '</p></td>';

                                                echo '<td>' . $row->gender . '</td>';
                                                echo '<td>' . $row->age . '</td>';
                                                echo '<td><span class="badge badge-1 text-light bg-green  right btn-sm border border-1 text-uppercase" style="background-color: #3FA796; border-radius: 15px 15px 15px 15px; overflow: hidden; border-style: solid; border-width: 3px; border-color: #ffffff;" >' . $row->status . '</span></td>';
                                                echo '<td>' . $row->student_type . '</td>';

                                                echo '<td>' . $row->GRADE_LEVEL . '</td>';
                                                echo '<td>' . $row->strand . '</td>';
                                                echo '<td>' . $row->contact_number . '</td>';
                                                echo '<td class = "text-left" >' . $row->unit_number . ' ' . $row->street . ' ' . $row->barangay . ' ' . $row->district . '' . $row->city . '</td>';

                                                $grade_level_id = $row->GRADE_LEVEL_ID;
                                                $count_query = "SELECT COUNT(*) AS count FROM student WHERE GRADE_LEVEL_ID = $grade_level_id AND status = 'Pending'";
                                                $count_result = mysqli_query($conn, $count_query);
                                                $count_row = mysqli_fetch_assoc($count_result);
                                                $count = $count_row['count'];

                                                if ($count >= $max_students) {
                                                    if ($row->student_type == 'new' || $row->student_type == 'transferee' || $row->student_type == 'returnee'  || $row->student_type == 'old') {
                                                        echo '<td align="center">
                                                        <a title="Confirm" class="btn-xs" style="background-color:#fff200">
                                                        <span class="fa fa-exclamation-triangle"></span>
                                                        <span style="font-size: 11px;">Reached maximum number of request for this grade level</span>
                                                    </a>&nbsp 
                                                    <a title="Decline" href="controller.php?action=decline&student_id=' . $row->student_id . '" class="btn btn-danger btn-xs">
                                                        <span style="font-size: 11px;">Decline</span>
                                                        <span class="fa fa-info-circle fw-fa"></span>
                                                    </a>
            </td>';
                                                    } else {
                                                        echo '<td align="center"></td>';
                                                    }
                                                } else if ($row->student_type == 'new' || $row->student_type == 'transferee' || $row->student_type == 'returnee'  || $row->student_type == 'old') {
                                                    echo '<td align="center">
     

                                    
                <div class="btn-group">
                <button type="button" class="btn btn-default btn-flat">Action</button>
                <button type="button" class="btn btn-default btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                   <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu text-center" role="menu">

                
                <a title="View" href="controller.php?action=view&student_id=' . $row->student_id . '" class="btn btn-1 btn-sm border border-secondary mb-2 "  style = "background-color:#fff">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspView<span class="fa fa fa-eye fw-fa text-dark"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                <br>
           
                <a title="Confirm" href="controller.php?action=confirm&student_id=' . $row->student_id . '" class="btn btn-1 bg-info btn-sm border-1 mb-2 ">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspConfirm <span class="fa fa-info-circle fw-fa"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                <br>
              
                <a title="Decline" href="controller.php?action=decline&student_id=' . $row->student_id . '" class="btn btn-warning btn-sm border-1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDecline <span class="fa fa-ban" aria-hidden="true"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>

                </div>
             </div>









            </td>';
                                                } else {
                                                    echo '<td align="center"></td>';
                                                }

                                                echo '</tr>';
                                            }

                                            ?>
                                        </tbody>
                                    </table>





                                    <?php
                                    ob_end_flush();
                                    ?>


























                                </div>
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


<?php include('includes/footer.php'); ?>