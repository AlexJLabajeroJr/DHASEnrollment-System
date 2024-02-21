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


$statUE = "SELECT * from schoolyr WHERE student_id = $stud_id";
$des = mysqli_query($conn, $statUE);
$scho = mysqli_fetch_assoc($des);



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
                <a href="table.php" class="btn btn-1  bg-warning btn-xs float-end text-right">BACK</a>
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
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">

                                    <img src="<?php echo $searchIMResultRow['p_p']; ?>" class="brand-image img-circle elevation-3" style="width: 200px ; height:200px;opacity: .8">';
                                </div>

                                <div class="container-fluid text-center">
                                    <div class="row">


                                        <h3 class="profile-username text-center" style="font-family:Segoe Script;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?= $row['last_name'] . " " . $row['first_name'] . " " . $row['suffix_name'] . ", " . $row['middle_name'] . "."  ?></h3>



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
                                                $stud_id = $_GET['student_id'];
                                                $query = "SELECT GRADE_LEVEL_ID from student WHERE student_id =$stud_id";
                                                $result = mysqli_query($conn, $query);
                                                $row22 = mysqli_fetch_assoc($result);
                                                $GRADE_LEVEL_ID =  $row22['GRADE_LEVEL_ID'];


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










                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
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