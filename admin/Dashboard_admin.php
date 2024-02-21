<?php



// if (!isset($_SESSION['account_id'])) {
//    redirect(web_root . "../index.php");
// }



session_start();
include '../db_con.php';

if (!isset($_SESSION['admin_id'])) {
   header("location: ../index.php");
}


$page_title = "Admin Dashboard ";
include('includes/header.php');




// $currentyear = date('Y');
// $nextyear =  date('Y') + 1;
// $sy = $currentyear . '-' . $nextyear;
// $_SESSION['School_year'] = $sy;



$sql = "SELECT count(*) as 'enrollees' FROM student WHERE NewEnrollees = '1' && status = 'Pending'";
$result = $conn->query($sql);
$enrollees = $result->fetch_assoc();



$setyr = "Select * from school_year where school_year_status = '1'";
$searchYrResult = $conn->query($setyr);
$searchYrRow = $searchYrResult->fetch_assoc();

$setSem = "Select * from tblsemester where SETSEM= '1'";
$searchSemResult = $conn->query($setSem);
$searchSetResultRow = $searchSemResult->fetch_assoc();









$sad = "SELECT * FROM account WHERE account_id = $_SESSION[admin_id]";
$ako = $conn->query($sad);
$row = $ako->fetch_assoc();


$setIn = "SELECT * FROM account WHERE p_p = '" . $row['p_p'] . "'";
$searchIMResult = $conn->query($setIn);
$searchInResultRow = $searchIMResult->fetch_assoc();



// if (isset($row['p_p'])) {
//    $setIM = "SELECT * FROM student WHERE p_p = '" . $row['p_p'] . "'";
//    $searchIMResult = $conn->query($setIM);
//    $searchIMResultRow = $searchIMResult->fetch_assoc();
// } else {
//    // Handle the error condition when 'p_p' key is not defined in $row array.
// }



$sql = "SELECT count(*) as 'enrollee' FROM schoolyr WHERE enrollment_status = '2' && archieve = '0'";
$resulter = $conn->query($sql);
$enrollee = $resulter->fetch_assoc();



$sqler = "SELECT count(*) as 'enrolleer' FROM faculty ";
$resulteri = $conn->query($sqler);
$enrolleer = $resulteri->fetch_assoc();

$sqlerO = "SELECT count(*) as 'enrolleerO' FROM room ";
$resulteriO = $conn->query($sqlerO);
$enrolleerO = $resulteriO->fetch_assoc();




$sql = "SELECT count(*) as 'enrolleez' FROM schoolyr WHERE enrollment_status = '2' && archieve = '0'";
$resulter = $conn->query($sql);
$enrolleez = $resulter->fetch_assoc();



$userAgent = $_SERVER['HTTP_USER_AGENT'];

if (preg_match('/\(.*?\).*?Version\/(.*?)\s/', $userAgent, $matches)) {
    $javascriptVersion = $matches[1];
    echo "JavaScript version: " . $javascriptVersion;
} else {
    echo "Unable to determine JavaScript version.";   
}


?>



<div class="wrapper">

   <!-- Preloader -->
   <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="img/d2.png" alt="AdminLTELogo" height="60" width="60">
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



















         <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
               <!-- <img src="../img/saddd.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8 "> -->
               <img src="<?php echo $searchInResultRow['p_p']; ?>" height="35px" /> &nbsp
               <?= $row['name'] ?>
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
font-family:Segoe Script;" class="text-dark text-bold"><b> Hello! <?= $row['name'] ?></b></p>
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

   <!-- /.navbar -->












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
               <!-- <img src="../img/9.jpg" > -->
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


               <li class="nav-item menu-open">
                  <a href="Dashboard_admin.php" class="nav-link active">
                     <i class="nav-icon fas fa-tachometer-alt"></i>
                     <p>
                        Dashboard
                        <!-- <i ></i>   class="right fas fa-angle-left" -->
                     </p>
                  </a>

               </li>
               <li class="nav-item">
                  <a href="Pre_registration.php" class="nav-link">
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
      <div class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1 class="m-0"></h1>
               </div><!-- /.col -->
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active">Dashboard</li> -->
                  </ol>
               </div><!-- /.col -->
            </div><!-- /.row -->
         </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
         <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">


               <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success" style="font-family:Segoe Script;  border-color:	#ffffff; border-radius: 10px 10px 10px;   overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
      ">
                     <div class="inner">


                        <input value="<?= $searchYrRow['school_year']; ?>" class=" form-control bg-success border border-success text-bold" style="font-size:30px;">

                        <p class="mt-3">Active School Year</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                     </div>
                     <a href="school_year.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>


               <div class="col-lg-3 col-6 text-light">
                  <!-- small box -->
                  <div class="small-box bg-warning text-light" style="font-family:Segoe Script;  border-color:	#ffffff; border-radius: 10px 10px 10px;   overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
      ">
                     <div class="inner">
                        <h3><input value="<?= $enrollee['enrollee']; ?>" class=" form-control bg-warning border border-0 text-bold text-light" style="font-size:50px; color:#fff"></h3>

                        <p>Total Students Enrolled</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-person-add"></i>
                     </div>
                     <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>
               <!-- ./col -->

               <!-- ./col -->
               <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info" style="font-family:Segoe Script;  border-color:	#ffffff; border-radius: 10px 10px 10px;   overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
      ">
                     <div class="inner">
                        <h3>44</h3>

                        <p>Total Student</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-bag"></i>
                     </div>
                     <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box  text-light" style=" background-color :#ff4d00; font-family:Segoe Script; border-color: #ffffff; border-radius: 10px 10px 10px; overflow: hidden; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
                  ">
                     <div class="inner">
                        <h3>4</h3>

                        <p>Strand</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                     </div>
                     <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>
               <!-- ./col -->
            </div>


            <!-- right col -->
         </div>




         <div class="row">
            <!-- Left col -->






            <section class="col-lg-3 connectedSortable">
               <!-- Custom tabs (Charts with tabs)-->

               <!-- /.card -->

               <!-- DIRECT CHAT -->
               <div class="card direct-chat direct-chat-primary">

                  <!-- /.card-header -->
                  <div class="card-body">
                     <!-- Conversations are loaded here -->
                     <div class="">






                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
                        <script src="https://code.highcharts.com/highcharts.js"></script>
                        <script src="https://code.highcharts.com/modules/exporting.js"></script>
                        <script src="https://code.highcharts.com/modules/export-data.js"></script>
                        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                        <style>
                           .center-block {
                              display: block;

                           }

                           #container {
                              max-width: 200px;
                              /* Change this value to adjust the maximum width of the chart */
                              margin: 0 auto;
                           }
                        </style>


                        <div class="container-fluid">

                           <div id="container"></div>

                           <!-- <img class="center-block" src="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" width="50"> -->
                        </div>
                        <?php
                        include_once "../db_con.php"; // connection file with database

                        // Get the records on which pie chart is to be drawn
                        $query = "SELECT strand, 
                        SUM(CASE WHEN st.GRADE_LEVEL_ID IN (23, 24) THEN 1 ELSE 0 END) AS gas_count,
                        SUM(CASE WHEN st.GRADE_LEVEL_ID IN (11,14,15,16,17,18,19,20,21,22) AND strand = 'None' THEN 1 ELSE 0 END) AS none_count
                        FROM schoolyr as sch 
                        INNER JOIN student as st ON st.student_id = sch.student_id 
                        INNER JOIN grade_level as gr ON gr.GRADE_LEVEL_ID = st.GRADE_lEVEL_ID 
                        WHERE enrollment_status = 2 AND archieve = 0 
                        GROUP BY st.strand
                        ";

                        $getData = $conn->query($query);

                        ?>

                        <script>
                           // Build the chart
                           Highcharts.chart('container', {
                              chart: {
                                 plotBackgroundColor: null,
                                 plotBorderWidth: null,
                                 plotShadow: false,
                                 type: 'pie'
                              },
                              title: {
                                 text: '<b>PE,JHS & SHS Population</b>   '
                              },
                              tooltip: {
                                 pointFormat: '{point.name} (Percentage {point.grade_level}): <b>{point.percentage:.1f}%</b>'
                              },
                              accessibility: {
                                 point: {
                                    valueSuffix: '%'
                                 }
                              },
                              plotOptions: {
                                 pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    dataLabels: {
                                       enabled: false
                                    },
                                    showInLegend: true
                                 }
                              },
                              series: [{
                                 name: 'GRADE_LEVEL_ID',
                                 colorByPoint: true,
                                 data: [
                                    <?php
                                    $data = '';
                                    if ($getData->num_rows > 0) {
                                       while ($row = $getData->fetch_object()) {

                                          // // set color for grade 1 data points

                                          if ($row->gas_count > 0) {
                                             $data .= '{ name:"Senior High School", grade_level: "", y:' . $row->gas_count . ', color: "#0E185F" },';
                                          }
                                          if ($row->none_count > 0) {
                                             $data .= '{ name:"Primary education, Junior high school", grade_level: "", y:' . $row->none_count . ', color: "#019267" },';
                                          }
                                       }
                                    }
                                    echo $data;
                                    ?>
                                 ]
                              }]
                           });
                        </script>




















                     </div>



                     <!--/.direct-chat-messages-->

                     <!-- Contacts are loaded here -->

                     <!-- /.direct-chat-pane -->
                  </div>

                  <br>
                  <div class="card-header border-0">




                     <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
                     <script src="https://code.highcharts.com/highcharts.js"></script>
                     <script src="https://code.highcharts.com/modules/exporting.js"></script>
                     <script src="https://code.highcharts.com/modules/export-data.js"></script>
                     <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                     <style>
                        .center-block {
                           display: block;
                           margin-left: auto;
                           margin-right: auto;

                        }

                        #containers {
                           max-width: 200px;
                           /* Change this value to adjust the maximum width of the chart */
                           margin: 0 auto;
                        }
                     </style>


                     <div class="containers">
                        <center>
                           <div id="containers"></div>
                        </center>
                        <!-- <img class="center-block" src="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" width="50"> -->
                     </div>
                     <?php
                     include_once "../db_con.php"; // connection file with database

                     // Get the records on which pie chart is to be drawn
                     $query = "SELECT gender, COUNT(*) AS count
FROM (
SELECT 'Male' AS gender
FROM grade_level as gr
LEFT JOIN student as st ON gr.GRADE_LEVEL_ID = st.GRADE_lEVEL_ID 
LEFT JOIN schoolyr as sch ON sch.student_id = st.student_id 
WHERE gr.GRADE_LEVEL BETWEEN 1 AND 12 AND st.gender = 'Male'

UNION ALL

SELECT 'Female' AS gender
FROM grade_level as gr
LEFT JOIN student as st ON gr.GRADE_LEVEL_ID = st.GRADE_lEVEL_ID 
LEFT JOIN schoolyr as sch ON sch.student_id = st.student_id 
WHERE gr.GRADE_LEVEL BETWEEN 1 AND 12 AND st.gender = 'Female'
) AS t
GROUP BY gender

";

                     $getData = $conn->query($query);

                     ?>

                     <script>
                        // Build the chart
                        Highcharts.chart('containers', {
                           chart: {
                              plotBackgroundColor: null,
                              plotBorderWidth: null,
                              plotShadow: false,
                              type: 'pie'
                           },
                           title: {
                              text: '<b>Population per Gender</b>   '
                           },
                           tooltip: {
                              pointFormat: '{point.name} (Percentage): <b>{point.percentage:.1f}%</b>'
                           },
                           accessibility: {
                              point: {
                                 valueSuffix: '%'
                              }
                           },
                           plotOptions: {
                              pie: {
                                 allowPointSelect: true,
                                 cursor: 'pointer',
                                 dataLabels: {
                                    enabled: false
                                 },
                                 showInLegend: true
                              }
                           },
                           colors: ['#0072B2', '#E69F00'],
                           series: [{
                              name: 'Gender',
                              colorByPoint: true,
                              data: [
                                 <?php
                                 $data = '';
                                 if ($getData->num_rows > 0) {
                                    while ($row = $getData->fetch_object()) {
                                       $data .= '{ name:"' . $row->gender . '", y:' . $row->count . ' },';
                                    }
                                 }

                                 echo $data;
                                 ?>
                              ]
                           }]
                        });
                     </script>



                  </div>



                  <!-- /.card-body -->
                  <div class="card-footer">

                  </div>
                  <!-- /.card-footer-->
               </div>
               <!--/.direct-chat -->

               <!-- TO DO List -->


               <!-- /.card-header -->
               <div class="card-body">
                  <!-- Conversations are loaded here -->

                  <!-- /.card-header -->

                  <!-- /.card-body -->



               </div>


               <!-- /.card -->
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->


            <section class="col-lg-6 connectedSortable">





               <div class="card bg-gradient-light text-center mt-4">
                  <div class="card-header border-0">


                     <div class="card">
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <div style="width: 400px;">
                           <canvas id="myChart"></canvas>
                        </div>

                        <?php
                        // include database connection
                        include '../db_con.php';

                        // retrieve data from database
                        $query = $conn->query("
                     SELECT COUNT(*) AS total, GRADE_LEVEL, strand
                     FROM schoolyr AS sch 
                     INNER JOIN student AS st ON st.student_id = sch.student_id 
                     INNER JOIN grade_level AS gr ON gr.GRADE_LEVEL_ID = st.GRADE_lEVEL_ID 
                     WHERE enrollment_status = 2 AND archieve = 0 
                     GROUP BY GRADE_LEVEL, strand
                     ORDER BY CAST(GRADE_LEVEL AS UNSIGNED) ASC
                     
                     
               ");

                        if (!$query) {
                           // handle error if query fails
                           die('Error retrieving data: ' . $conn->error);
                        }

                        // initialize arrays for chart data
                        $labels = [];
                        $data = [];

                        // fetch data into arrays
                        while ($row = $query->fetch_assoc()) {
                           $labels[] = $row['GRADE_LEVEL'] . "";
                           $data[] = (int) $row['total'];
                        }

                        // encode arrays as JSON for use in chart
                        $labelsJson = json_encode($labels);
                        $dataJson = json_encode($data);

                        // check if data was retrieved correctly
                        // var_dump($labels, $data);
                        ?>

                        <script>
                           const labels = <?php echo $labelsJson ?>;
                           const data = {
                              labels: labels,
                              datasets: [{
                                 label: 'Total Enrolled Student per Grade level',
                                 data: <?php echo $dataJson ?>,
                                 backgroundColor: [
                                    'rgba(45,159,193,255)',
                                    'rgb(514, 12, 235)',
                                    'rgb(255, 206, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(153, 102, 255)',
                                    'rgb(255, 159, 64)',
                                    'rgb(5, 159, 64)',
                                    'rgb(125, 59, 64)',
                                    'rgb(245, 59, 64)',
                                    'rgb(245, 519, 64)',
                                    'rgb(123, 8, 614)',
                                    'rgb(23, 8, 614)',
                                 ],
                                 borderColor: [
                                    'rgba(45,159,193,255)',
                                    'rgb(514, 12, 235)',
                                    'rgb(255, 206, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(153, 102, 255)',
                                    'rgb(255, 159, 64)',
                                    'rgb(5, 159, 64)',
                                    'rgb(125, 59, 64)',
                                    'rgb(245, 59, 64)',
                                    'rgb(245, 519, 64)',
                                    'rgb(123, 8, 614)',
                                    'rgb(13, 8, 614)'

                                 ],
                                 borderWidth: 1
                              }]
                           };



                           const config = {
                              type: 'bar',
                              data: data,
                              options: {
                                 plugins: {
                                    tooltip: {
                                       callbacks: {
                                          label: function(context) {
                                             var label = context.dataset.label || '';
                                             if (label) {
                                                label += ': ';
                                             }
                                             if (context.parsed.y !== null) {
                                                label += context.parsed.y + '';
                                             }
                                             return label;
                                          }
                                       }
                                    }
                                 },
                                 scales: {
                                    y: {
                                       beginAtZero: true,
                                       ticks: {
                                          stepSize: 1
                                       }
                                    }
                                 }
                              }
                           };


                           var myChart = new Chart(
                              document.getElementById('myChart'),
                              config
                           );
                        </script>
                     </div>
                     <!-- <div class="card-body"> -->
                     <!-- dddddddddddddddddddd -->
                     <!-- </div> -->
                     <!-- /.card-body -->
                     <!-- <div class="card-footer bg-transparent">
                     <div class="row">

                     </div>

                  </div> -->
                     <!-- /.card-footer -->
                  </div>

               </div>

               <!-- /.card -->

               <!-- Calendar -->
               <div class="card bg-gradient-light">
                  <div class="card-header border-0">





                     <div class="card ">
                        <?php
                        include '../db_con.php';

                        // retrieve data from database
                        $queryert = $conn->query("
                            SELECT 
                                SUM(CASE WHEN strand = 'GAS' THEN 1 ELSE 0 END) AS GAS_total,
                                SUM(CASE WHEN strand = 'STEM' THEN 1 ELSE 0 END) AS STEM_total,
                                SUM(CASE WHEN strand = 'HUMMS' THEN 1 ELSE 0 END) AS HUMMS_total,
                                SUM(CASE WHEN strand = 'ABM' THEN 1 ELSE 0 END) AS ABM_total
                            FROM schoolyr AS sch 
                            INNER JOIN student AS st ON st.student_id = sch.student_id 
                            INNER JOIN grade_level AS gr ON gr.GRADE_LEVEL_ID = st.GRADE_lEVEL_ID 
                            WHERE enrollment_status = 2 AND archieve = 0 AND gr.GRADE_LEVEL IN ('11', '12')
                        ");

                        if (!$queryert) {
                           // handle error if query fails
                           die('Error retrieving data: ' . $conn->error);
                        }


                        $data = array();
                        if ($queryert->num_rows > 0) {
                           while ($row = $queryert->fetch_assoc()) {
                              $data[] = [
                                 'GAS' => (int) $row['GAS_total'],
                                 'STEM' => (int) $row['STEM_total'],
                                 'HUMMS' => (int) $row['HUMMS_total'],
                                 'ABM' => (int) $row['ABM_total']
                              ];
                           }
                        }


                        ?>


                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <?php
                        include '../db_con.php';

                        // retrieve data from database
                        $queryert = $conn->query("
    SELECT 
        SUM(CASE WHEN strand = 'GAS' THEN 1 ELSE 0 END) AS GAS_total,
        SUM(CASE WHEN strand = 'STEM' THEN 1 ELSE 0 END) AS STEM_total,
        SUM(CASE WHEN strand = 'HUMMS' THEN 1 ELSE 0 END) AS HUMMS_total,
        SUM(CASE WHEN strand = 'ABM' THEN 1 ELSE 0 END) AS ABM_total
    FROM schoolyr AS sch 
    INNER JOIN student AS st ON st.student_id = sch.student_id 
    INNER JOIN grade_level AS gr ON gr.GRADE_LEVEL_ID = st.GRADE_lEVEL_ID 
    WHERE enrollment_status = 2 AND archieve = 0 AND gr.GRADE_LEVEL IN ('11', '12')
");

                        if (!$queryert) {
                           // handle error if query fails
                           die('Error retrieving data: ' . $conn->error);
                        }


                        $data = array();
                        if ($queryert->num_rows > 0) {
                           while ($row = $queryert->fetch_assoc()) {
                              $data[] = [
                                 'GAS' => (int) $row['GAS_total'],
                                 'STEM' => (int) $row['STEM_total'],
                                 'HUMMS' => (int) $row['HUMMS_total'],
                                 'ABM' => (int) $row['ABM_total']
                              ];
                           }
                        }


                        ?>


                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                           google.charts.load('current', {
                              'packages': ['corechart']
                           });
                           google.charts.setOnLoadCallback(drawChart);

                           function drawChart() {
                              var data = google.visualization.arrayToDataTable([
                                 ['Strand', 'Total Students'],
                                 <?php foreach (['GAS', 'STEM', 'HUMMS', 'ABM'] as $label) { ?>['<?php echo $label; ?>', <?php echo $data[0][$label]; ?>],
                                 <?php } ?>
                              ]);

                              var options = {
                                 title: 'Total Students by Strand',
                                 subtitle: 'Grade Levels 11 and 12',
                                 legend: {
                                    position: 'none'
                                 },
                                 colors: ['#3366CC'],
                                 chartArea: {
                                    width: '80%',
                                    height: '70%'
                                 },
                                 hAxis: {
                                    title: 'Total Students',
                                    minValue: 0,
                                    textStyle: {
                                       bold: true,
                                       fontSize: 12,
                                       color: '#4d4d4d'
                                    },
                                    titleTextStyle: {
                                       bold: true,
                                       fontSize: 14,
                                       color: '#4d4d4d'
                                    }
                                 },
                                 vAxis: {
                                    title: 'Strand',
                                    textStyle: {
                                       fontSize: 12,
                                       color: '#4d4d4d'
                                    },
                                    titleTextStyle: {
                                       fontSize: 14,
                                       color: '#4d4d4d'
                                    }
                                 }
                              };

                              var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_material'));

                              chart.draw(data, options);
                           }
                        </script>

                        <div id="columnchart_material" style=" height: 300px;"></div>



                     </div>
























                     <!-- /.card -->
            </section>






            <section class="col-lg-3 connectedSortable">






               <div class="card bg-gradient-light">
                  <!-- small card -->
                  <div class="small-box bg-light">
                     <div class="inner">
                        Total Faculty
                        <h3><input value="<?= $enrolleer['enrolleer']; ?>" class=" form-control border border-0 text-bold text-purple bg-light" style="font-size:50px; "></h3>
                     </div>
                     <div class="icon">
                        <i class="fa-solid fa-person-chalkboard"></i>
                     </div>
                     <a href="faculty.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                     </a>
                  </div>
               </div>




               <div class="card bg-gradient-light">
                  <!-- small card -->
                  <div class="small-box bg-light">
                     <div class="inner">
                        Total Room
                        <h3><input value="<?= $enrolleerO['enrolleerO']; ?>" class=" form-control border border-0 text-bold text-dark" style="font-size:50px; "></h3>
                     </div>
                     <div class="icon">
                        <i class="ionicons ion-ios-home"></i>
                     </div>
                     <a href="room.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>


                     </a>


                     <button type="button" class="btn btn-default btn-xs toastsDefaultDefault mt-2 ml-2 mb-2">

                        <i class="fas fa-bullhorn"></i> View Available Room
                     </button>
                  </div>
               </div>



               <div class="">























                  <?php

                  include '../db_con.php';

                  // Query to select all students with student_type equal to 'new', 'old', 'transferee', or 'returnee', and count the number of occurrences for each student_type
                  $query = "SELECT st.student_type, COUNT(*) as number
FROM student as st
INNER JOIN schoolyr as sch ON st.student_id = sch.student_id
INNER JOIN grade_level as gr ON gr.GRADE_LEVEL_ID = st.GRADE_lEVEL_ID
WHERE st.student_type IN ('new', 'old', 'transferee', 'returnee')
AND sch.enrollment_status = 2 
AND sch.archieve = 0 
GROUP BY st.student_type";

                  $result = mysqli_query($conn, $query);
                  ?>



                  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                  <script type="text/javascript">
                     google.charts.load('current', {
                        'packages': ['corechart']
                     });
                     google.charts.setOnLoadCallback(drawChart);

                     function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                           ['Student Type', 'Number'],
                           <?php
                           // Loop through the result set and generate the data for the pie chart
                           while ($row = mysqli_fetch_assoc($result)) {
                              echo "['" . $row["student_type"] . "', " . $row["number"] . "],";
                           }
                           ?>
                        ]);
                        var options = {
                           title: 'Distribution of Student Types',
                           pieHole: 0.4
                        };
                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                        chart.draw(data, options);
                     }
                  </script>




                  <!--<h6 align="center">Make Simple Pie Chart by Google Chart API with PHP MySQL</h6>-->
                  <div class="container-fluid">
                     <div class="row">
                        <div id="piechart" style="  max-width: 20px;"></div>
                     </div>
                  </div>






























               </div>












               <!-- Map card -->

               <!-- /.card -->

               <!-- solid sales graph -->
               <div class="card bg-gradient-light">








               </div>

               <div class="card card-outline card-purple">
                  <!-- BABAYI -->

                  <!-- <div class="card-header"> -->
                  <!--<h5 class="card-title">Room Available</h5>-->

                  <!-- <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                           <i class="fas fa-minus"></i>
                        </button>
                     </div> -->
                  <!-- <div class="icon">
                        <i class="ionicons ion-woman"></i>
                     </div> -->
                  <!-- /.card-tools -->
                  <!-- </div> -->
                  <!-- /.card-header -->
                  <div class="card-body">
                     <div class="container mt-2">

                        <div class="row">
                           <div class="col-sm-12">











                           </div>







                        </div>
                     </div>

                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->


         </div>












         <!-- /.card -->

         <!-- Calendar -->
         <!--<div class="card bg-gradient-light">-->
         <!--   <div class="card-header border-0">-->

         <!--      Total Faculty-->
         <!-- /. tools -->
         <!--   </div>-->
         <!-- /.card-header -->
         <!--   <div class="card-body pt-0">-->
         <!--The calendar -->
         <!--      <div id="calendar" style="width: 100%"></div>-->
         <!--   </div>-->
         <!-- /.card-body -->
         <!--</div>-->




         
         <!-- /.card -->
      </section>




      <!-- right col -->
   </div>
   <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
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



<script>
   $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
         title: 'Room Availability',
         body: `<table class="table table-bordered table-striped" style="font-size:10px" cellspacing="0">
                  <thead class="text-center">
                     <tr>
                        <th>&nbspRoom_name&nbsp</th>
                        <th>&nbspBuilding_name&nbsp</th>
                     </tr>
                  </thead>
                  <tbody class="text-center">
                     <?php
                     $query = "Select * from room WHERE availability =1";
                     $query_run = mysqli_query($conn, $query);

                     if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $room) {
                     ?>
                     <tr>
                        <td><?= $room['room_name']; ?></td>
                        <td><?= $room['building_name']; ?></td>
                     </tr>
                     <?php
                        }
                     } else {
                        echo "<h5> No Record Found </h5>";
                     }
                     ?>
                  </tbody>
               </table>`
      });
   });
</script>












<?php include('includes/footer.php'); ?>