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











                    <li class="nav-item menu-open">
                        <a class="nav-link active">
                            <i class="nav-icon fas fa-file  "></i>
                            <p>
                                Class List
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="stud_list_per_inst.php" class="nav-link active">
                                    <i class="far fa-dot-circle nav-icon"></i>

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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Student per instructor</li>
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





                <form action="" method="POST">
                    <!-- info row -->
                    <div class="row">


                        <div id="spacing" class="col-md-1"></div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Instructor</label>
                                <select id="XAD" name="INST_ID" class="form-control" required>
                                    <option>Select</option>
                                    <?php



                                    $query = 'SELECT * FROM faculty';
                                    $result = mysqli_query($conn, $query);

                                    $key = '';
                                    $array = array();

                                    while ($row = mysqli_fetch_object($result)) {
                                        if ($key) {
                                            $array[$row->$key] = $row;
                                        } else {
                                            $array[] = $row;
                                        }
                                    }
                                    mysqli_free_result($result);

                                    foreach ($array as $resulta)
                                        echo '<option value=' . $resulta->faculty_id . ' >' . $resulta->fac_name . '</option>';


                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Section</label>
                                <select name="Section" class="form-control" required>
                                    <option>Select</option>
                                    <option value="1">Section 1</option>
                                    <option value="2">Section 2</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                                <br>
                                <div id="loaddata"></div>
                            </div>
                        </div>


                        <div class="col-sm-2 invoice-col">
                            <br />
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header" align="center">
                                Student list per instructor

                            </h2>
                        </div>
                    </div>


                    <?php
                    if (isset($_POST['INST_ID']) && isset($_POST['Subject'])) {
                        $conn = mysqli_connect($sname, $uname, $password, $db_name);
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // $inst_id = mysqli_real_escape_string($conn, $_POST['INST_ID']);
                        // $subject = mysqli_real_escape_string($conn, $_POST['Subject']);
                        $section = mysqli_real_escape_string($conn, $_POST['Section']);

                        $queryer = "SELECT * FROM `subject` s, `schedule` sc, `faculty` i 
            WHERE s.subject_id=sc.subject_id AND sc.faculty_id=i.faculty_id AND i.faculty_id=" . $_POST['INST_ID'] . "
            AND CONCAT(sc.subject_id, sc.day)='" . $_POST['Subject'] . "'";
                        $resulter = mysqli_query($conn, $queryer);
                        if (!$resulter) {
                            die("Query failed: " . mysqli_error($conn));
                        }
                        $resched = $resulter->fetch_assoc();

                        $query = "SELECT * FROM subject WHERE subject_id =" . $_POST['Subject'] . "";
                        $result = mysqli_query($conn, $query);
                        if (!$result) {
                            die("Query failed: " . mysqli_error($conn));
                        }
                        $resSubj = $result->fetch_assoc();

                        mysqli_close($conn);
                    }
                    ?>

                    <div class="container">
                        <table style="max-width:100%" cellpadding="4" cellspacing="7" class="table">
                            <thead>
                                <th><label>Instructor :</label></th>
                                <th><label><?php echo isset($resched['fac_name']) ? $resched['fac_name'] : ''; ?></label></th>
                                <th></th>
                                <th>Day(s)/Time</th>
                                <th><?php echo isset($resched['time']) ? $resched['time'] . ' / ' . $resched['day']  : ''; ?></th>
                            </thead>
                            <thead>
                                <th><label>Subject :</label></th>
                                <th><label><?php echo isset($resSubj['subject_code']) ? $resSubj['subject_code'] : ''; ?></label></th>
                                <th></th>
                                <th><label>Section :</label></th>
                                <th><label><?php echo isset($section) ? $section : ''; ?></label></th>
                            </thead>
                        </table>
                    </div>


                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 col-md-12 table-responsive">
                            <table class="table table-bordered table-striped" style="font-size:11px" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>IdNo.</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Sex</th>
                                        <th>AGE</th>
                                        <th>Contact No.</th>
                                        <th>Civil Status</th>
                                        <th>Course/Year</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (isset($_POST['submit'])) {



                                        $sname = "localhost";
                                        $uname = "root";
                                        $password = "";

                                        $db_name = "my_db";

                                        $conn = mysqli_connect($sname, $uname, $password, $db_name);

                                        if (mysqli_connect_errno()) {
                                            echo "failed";
                                            echo mysqli_connect_error();
                                            exit();
                                        } else {
                                        }

                                        $Subject = isset($_POST['Subject']) ? mysqli_real_escape_string($conn, $_POST['Subject']) : '';
                                        $COURSE_ID = isset($_POST['COURSE_ID']) ? mysqli_real_escape_string($conn, $_POST['COURSE_ID']) : '';
                                        $INST_ID = isset($_POST['INST_ID']) ? mysqli_real_escape_string($conn, $_POST['INST_ID']) : '';
                                        $Section = isset($_POST['Section']) ? mysqli_real_escape_string($conn, $_POST['Section']) : '';



                                        $sql = "SELECT * FROM `faculty` i
                                        INNER JOIN `schedule` sc ON i.`faculty_id` = sc.`faculty_id`
                                        INNER JOIN `enrollment` ss ON sc.`subject_id` = ss.`subject_id`
                                        INNER JOIN `student` s ON ss.`student_id` = s.`student_id`
                                        INNER JOIN `grade_level` c ON s.`GRADE_LEVEL_ID` = c.`GRADE_LEVEL_ID`
                                        WHERE i.`faculty_id` = '$INST_ID'
                                        AND sc.`SECTION` = '$Section'
                                        AND sc.`subject_id` = '$Subject'
                                        AND sc.`GRADE_LEVEL_ID` = '$COURSE_ID'";


                                        // Execute the SQL query
                                        $resultero = mysqli_query($conn, $sql);

                                        // Display the list of students
                                        if (mysqli_num_rows($resultero) > 0) {
                                            while ($row = mysqli_fetch_assoc($resultero)) {
                                                echo '<tr>';
                                                echo '<td><img src="' . $row['p_p'] . '" style="width: 40px; height: 40px; opacity: .8;"></td>';
                                                echo '<td><b>' . $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'] . '</b></td>';
                                                echo '<td>' . $row['street'] . ' ' . $row['barangay'] . ' ' . $row['district'] . ' ' . $row['city'] . '</td>';
                                                echo '<td>' . $row['gender'] . '</td>';

                                                echo '<td>' . $row['contact_number'] . '</td>';


                                    ?>
                                                <td>

                                                    <?php
                                                    if ($row['enrollment_status'] == 1) {
                                                        echo "<B>PENDING</B>";
                                                    }
                                                    if ($row['enrollment_status'] == 2) {
                                                        echo "<B class = 'badge badge-1 bg-success' style = 'background-color:#BFDB38  border-radius: 15px 15px 15px 15px;
                         overflow: hidden;  
                         border-style:solid;
                       border-width: 3px;  border-color:	#ffffff;'>ENROLLED</B>";
                                                    }
                                                    if ($row['enrollment_status'] == 3) {
                                                        echo "<B class = 'badge badge-danger'>REJECT</B>";
                                                    }
                                                    ?>

                                                </td>

                                    <?php

                                                echo '<td>' . $row['GRADE_LEVEL'] . '</td>';
                                                echo '<td>' . $row['strand'] . '</td>';
                                            }
                                            // Count the number of students
                                            $num_students = mysqli_num_rows($result);
                                        } else {
                                            echo '<tr><td colspan="12">No students found</td></tr>';
                                            $num_students = 0;
                                        }
                                        // Free the result set
                                        mysqli_free_result($resultero);
                                        // Close the database connection
                                        mysqli_close($conn);
                                    } else {
                                        $num_students = 0;
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="8" align="right">
                                            <h2>Total Number of Student/s :</h2>
                                        </td>
                                        <td>
                                            <h2><?php echo $num_students; ?></h2>


                                        </td>

                                    </tr>

                                </tfoot>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                </form>


























                <!-- ./col -->


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




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#XAD').change(function() {
            var instId = $(this).val();
            $.ajax({
                url: 'loadsubject.php',
                type: 'POST',
                data: {
                    INST_ID: instId
                },
                success: function(response) {
                    $('#loaddata').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>




<?php include('includes/footer.php'); ?>





















<!-- $sql = "SELECT * 
                                        FROM `schoolyr` sy, `student` s, `enrollment` en, `schedule` sch, `faculty` f, `grade_level` g 
                                        WHERE sy.student_id = s.student_id 
                                          AND f.faculty_id = sch.faculty_id 
                                          AND sch.subject_id = en.subject_id 
                                          AND en.student_id = s.student_id 
                                          AND s.GRADE_LEVEL_ID = g.GRADE_LEVEL_ID 
                                          AND f.faculty_id = " . $_POST['INST_ID'] . " 
                                          AND sch.section = " . $_POST['Section'] . " 
                                          AND CONCAT(sch.subject_id, `day`) = '" . $_POST['Subject'] . "' 
                                          AND sch.grade_level_id = " . $_POST['COURSE_ID'] . " 
                                          AND sy.enrollment_status = 2";
                                 -->