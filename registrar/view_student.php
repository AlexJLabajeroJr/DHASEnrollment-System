<?php
include '../db_con.php';




// show box movie goto movie hdtoday.tv

session_start();
// ob_start();
include('includes/header.php');
$page_title = "View Record Page";
if (!isset($_SESSION['registrar_id'])) {
    header("location: ../index.php");
}


if (isset($_POST['refresh'])) {
    header('location:registrar.php');
}



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




if (isset($row['p_p'])) {
    $setIM = "SELECT * FROM student WHERE p_p = '" . $row['p_p'] . "'";
    $searchIMResult = $conn->query($setIM);
    $searchIMResultRow = $searchIMResult->fetch_assoc();
} else {
    // Handle the error condition when 'p_p' key is not defined in $row array.
}




$sadt = "SELECT * FROM account WHERE account_id = $_SESSION[registrar_id]";
$akot = $conn->query($sadt);
$rowt = $akot->fetch_assoc();


$setInt = "SELECT * FROM account WHERE p_p = '" . $rowt['p_p'] . "'";
$searchIMResultt = $conn->query($setInt);
$searchInResultRowt = $searchIMResultt->fetch_assoc();




?>

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
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
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
            </li>

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
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
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-0-primary elevation-4 " style="background-color:   #037d50">
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
                    <img src="<?php echo $searchInResultRowt['p_p']; ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
                </div>










                <div class="pull-left info">
                    <p style="font-size:15px; font-size:15px;
font-family:Segoe UI;" class="text-light text-bold"><b><?= $_SESSION['auth_user']['username']; ?></b></p>
                </div>




            </div>
        </div>


        <!-- <form class="tab-wizard2 wizard-circle wizard" action="../picko/p_p.php" method="POST" enctype="multipart/form-data">


            <div class="form-wrap max-width-600 mx-auto">
                <div class="form-group row">


                    <div class="col-sm-9">
                        <input type="file" name="image" class="form-control-file form-control height-auto" accept="image/*" required>
                    </div>
                    <div class="col-sm-2 mt-2">
                        <button type="submit" class="btn btn-dark btn-xs " name="jobSeekerSubmitBtn">Submit</button>
                    </div>


                </div>
        </form> -->


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
                <li class="nav-item menu-open">
                    <a href="registrar.php" class="nav-link text-light">
                        <i class="nav-icon fas nav-icon fas fa-copy"></i>
                        <p>
                            List of Enrolled Students
                            <!-- <i ></i>   class="right fas fa-angle-left" -->
                        </p>
                    </a>

                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link  text-light">
                        <i class="nav-icon fas fa-book text-light"></i>
                        <p>
                            Enrollment Status
                            <i class="fas fa-angle-left right"></i>
                            <!-- <span class="badge badge-info right">New</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="enrollment_status.php" class="nav-link  text-light">
                                <i class="far fa-circle nav-icon"></i>
                                <p> View Enrollment Status</p>
                            </a>
                        </li>

                    </ul>

                </li>

                <!-- <li class="nav-item menu-open">
                    <a href="#" class="nav-link active text-light">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Enrollment Status
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="enrollment_status.php" class="nav-link active">
                                <i class="nav-icon fas fa-book text-light"></i>
                                <p>Manage Enrollment Status</p>
                            </a>
                        </li>

                    </ul>
                </li> -->

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active text-light">
                        <i class="nav-icon far fa-envelope text-light"></i>
                        <p>
                            Enrollment Summary Report
                            <i class="right fas fa-angle-left text-light"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview text-dark">
                        <li class="nav-item">
                            <a href="summary.php" class="nav-link active bg-light  ">
                                <i class="far fa-circle nav-icon text-dark"></i>
                                <p style="font-size:15px">Manage Report</p>
                            </a>
                        </li>

                    </ul>



                </li>

                <li class="nav-item ">
                    <a href="#" class="nav-link   text-light">
                        <i class="nav-icon fas fa-book text-light"></i>
                        <p>
                            Requirements
                            <i class="fas fa-angle-left right text-light"></i>
                            <!-- <span class="badge badge-info right text-light">New</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="student_requirement.php" class="nav-link  text-light">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Manage Student Requirements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="requirement.php" class="nav-link text-light">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Manage Requirements</p>
                            </a>
                        </li>

                    </ul>

                </li>




                <li class="nav-item">
                    <a href="charges.php" class="nav-link text-light">
                        <i class="nav-icon fa-solid fa-peso-sign"></i>


                        <p>Charges</p>
                    </a>




                </li>


                <li class="nav-item">
                    <a href="archieve.php" class="nav-link text-light">
                        <i class=" nav-icon fa-solid fa-box-archive"></i>


                        <p>Archive</p>
                    </a>




                </li>



                <li class="nav-item">
                    <a href="profile.php" class="nav-link text-light">
                        <i class="nav-icon fa fa-user text-light"></i>
                        <p>My Profile</p>
                    </a>




                </li>


                <!-- 
                <li class="nav-item">
                    <a href="logout_registrar.php" class="nav-link text-light">
                        <i class="nav-icon fas fa-sign-out-alt text-light"></i>
                        <p>Logout</p>
                    </a>




                </li> -->


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
                            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Subject</li> -->
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->



        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-11">

                </div>
                <div class="col-sm-1 ">
                    <a href="summary.php" class="btn btn-sm btn-light border border-1" style="
font-family:Segoe UI; font-size:15px; ">


                        <i class="fas fa-sign-out-alt fa-flip-both" style="color: #000;"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <br>
        <section class="content ">
            <div class="container-fluid border border-1 " style="  border-radius: 10px 10px 10px  10px ; overflow: hidden;  ">
                <div class="row">



                    <div class="col-sm-12 col-sm-12 col-md-12 d-flex align-items-stretch flex-column mt-5 ">
                        <div class="d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0 text-right">

                            </div>
                            <div class="card-body pt-0">
                                <div class="row">


                                    <div class="col-5 border border-1 " style="  border-radius: 10px 10px 10px  10px ; overflow: hidden;  ">

                                        <div class=" card-widget widget-user  ">
                                            <!-- Add the bg color to the header using any of the bg-* classes -->
                                            <div class="mt-5 widget-user-header bg-secondary border border-1 " style="background: url('../img/saddd.png') center right; background-repeat:no-repeat; background-size:30% 150%; border-width:2px; border-radius: 10px 10px 10px  10px ; overflow: hidden; ">
                                                <!-- <h2 class="widget-user-username text-right text-dark text-bold" style="text-transform: uppercase;"><b><?= $row['last_name'] . ", " . $row['first_name'] . " " . $row['suffix_name'] . "." . $row['middle_name'] . ". "  ?></b></h2>
                                                <h5 class="widget-user-desc text-right">Student</h5> -->
                                            </div>
                                            <div class="widget-user-image">
                                                <img src="<?php echo $searchIMResultRow['p_p']; ?>" class="brand-image img-circle elevation-3" style="     overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19); 
    border-style:solid;
  border-width: 3px;  border-color:	#ffff; width: 120px ; height:120px;opacity: .8 border-style:solid">
                                            </div>


                                            <!-- style="background: url('../img/saddd.png') center right; background-repeat:no-repeat; background-size:100% 100%; " -->


                                            <div class="card-footer bg-white border-top
                                            "> <br>
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="description-block">
                                                            <!-- <span class="text-muted text-sm"><b>&nbsp</b><span><b>Grade</b>- <?= $row2['GRADE_LEVEL'] . "" ?></span><b> | </b> <span> <b>Strand</b>- <?= $row['strand'] . "" ?></span> <b> | </b> <span> <b>Type</b> - <?= $row['student_type'] . "" ?> student</span> -->


                                                            <span href="#" class="nav-link" style="font-family:Segoe Script; font-size:30px;">
                                                                <i class="fas fa-lg fa-user"></i><b><?= $row['first_name'] . ", " . $row['middle_name'] . " " . $row['last_name'] . "." . $row['suffix_name'] .  ". "  ?></b>
                                                                <!-- <span class="badge bg-primary float-right">New</span> -->
                                                            </span>

                                                            <span class="nav-link">
                                                                <i class=""></i> Grade level:<b><?= $row2['GRADE_LEVEL'] . "" ?></b> | <i class=""></i> Strand:<b> <?= $row['strand'] . "" ?></b>| <i class=""></i> Type: <b><?= $row['student_type'] . "" ?></b> student
                                                            </span>


                                                        </div>
                                                        <!-- /.description-block -->
                                                    </div>
                                                    <br>
                                                    <div class="col-12">






                                                        <!-- /.description-block -->
                                                    </div>
                                                    <!-- /.col -->

                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                        </div>
                                        <!-- /.widget-user -->
                                    </div>












                                    <div class="col-7 ">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-12 text-center">


                                                    <div class="card bg-light">


                                                        <div class="card-header text-center">
                                                            <h3 class="card-title text-dark "><B>PERSONAL INFORMATION</B></h3>

                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="card-body p-0 text-left">
                                                            <ul class="nav nav-pills flex-column">

                                                                <li class="nav-item">
                                                                    <a href="#" class="nav-link">
                                                                        <i class="far fa-envelope"></i> Email Address : <?= $rowas['email'] . " "  ?>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="#" class="nav-link">
                                                                        <i class="fas fa-lg fa-phone"></i> Contact_no : <?= $row['contact_number'] . ". "  ?>
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>









                                                    <div class="card">


                                                        <div class="card-header text-center">
                                                            <h3 class="card-title text-dark "><b>ADDRESS INFORMATION</b></h3>

                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="card-body p-0 text-left">
                                                            <ul class="nav nav-pills flex-column">
                                                                <li class="nav-item active ">
                                                                    <a href="#" class="nav-link">
                                                                        <i class="fas fa-lg fa-building"></i> Address : <?= $row['unit_number'] . ", " . $row['street'] . " " . $row['barangay'] . "." . $row['district'] .  "." . $row['city'] . " "  ?>
                                                                        <!-- <span class="badge bg-primary float-right">New</span> -->
                                                                    </a>
                                                                </li>
                                                                <!-- <li class="nav-item">
                                                                                    <a href="#" class="nav-link">
                                                                                        <i class="far fa-envelope"></i> Email Address : <?= $rowas['email'] . " "  ?>
                                                                                    </a>
                                                                                </li> -->
                                                                <!-- <li class="nav-item">
                                                                                    <a href="#" class="nav-link">
                                                                                        <i class="fas fa-lg fa-phone"></i> Contact_no : <?= $row['contact_number'] . ". "  ?>
                                                                                    </a>
                                                                                </li> -->
                                                                <!-- <li class="nav-item">


                                                                                </li>
                                                                                <li class="nav-item">
                                                                                    <a href="#" class="nav-link">
                                                                                        <i class="far fa-trash-alt"></i> Trash
                                                                                    </a>
                                                                                </li> -->
                                                            </ul>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>


                                                    <?php if (isset($statko['parent_name'])  != ($statko['guardian_name'])) { ?>


                                                        <div class="card">


                                                            <div class="card-header text-center">
                                                                <h3 class="card-title text-dark "><b>PARENT INFORMATION</b></h3>

                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="card-body p-0 text-left">
                                                                <ul class="nav nav-pills flex-column">
                                                                    <li class="nav-item active ">
                                                                        <a href="#" class="nav-link">
                                                                            <i class="fas fa-lg fa-users"></i> Parent Name:<?= $row['parent_name'] . " "  ?>
                                                                            <!-- <span class="badge bg-primary float-right">New</span> -->
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="#" class="nav-link">
                                                                            <i class="fas fa-lg fa-tasks"></i> Parent Occupation:<?= $row['parent_occupation'] . " "  ?>
                                                                        </a>
                                                                    </li>

                                                                    <li class="nav-item">
                                                                        <a href="#" class="nav-link">
                                                                            <i class="fas fa-lg fa-phone"></i> Parent Contact_no #: <?= $row['parent_contact_no'] . " "  ?>
                                                                        </a>
                                                                    </li>

                                                                </ul>
                                                            </div>


                                                        </div>

                                                    <?php } else if (isset($statko['guardian_name'])  != '') { ?>


                                                        <div class="card">


                                                            <div class="card-header text-center">
                                                                <h3 class="card-title text-dark "><B>GUARDIAN INFORMATION</B></h3>

                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="card-body p-0 text-left">
                                                                <ul class="nav nav-pills flex-column">
                                                                    <li class="nav-item active ">
                                                                        <a href="#" class="nav-link">
                                                                            <i class="fas fa-lg fa-building"></i> Guardian Name: <?= $row['guardian_name'] . " "  ?>
                                                                            <!-- <span class="badge bg-primary float-right">New</span> -->
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="#" class="nav-link">
                                                                            <i class="far fa-envelope"></i> Guardian Occupation: <?= $row['guardian_occupation'] . " "  ?>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="#" class="nav-link">
                                                                            <i class="fas fa-lg fa-phone"></i> Guardian Contact: <?= $row['guardian_contact_no'] . " "  ?>
                                                                        </a>
                                                                    </li>

                                                                </ul>
                                                            </div>


                                                        </div>


                                                    <?php } ?>



                                                    <?php if (isset($statkoyz['student_type'])  != '') { ?>




                                                        <div class="card">


                                                            <div class="card-header text-center">
                                                                <h3 class="card-title text-dark ">
                                                                    <B>TRANSFEREE</B>
                                                                </h3>

                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="card-body p-0 text-left">
                                                                <ul class="nav nav-pills flex-column">
                                                                    <li class="nav-item active ">
                                                                        <a href="#" class="nav-link">
                                                                            <i class="fas fa-lg fa-building"></i> School Last Attended: <?= $row['school_last_attended'] . " "  ?>
                                                                            <!-- <span class="badge bg-primary float-right">New</span> -->
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="#" class="nav-link">
                                                                            <i class="far fa-envelope"></i> School Year: <?= $row['school_year'] . " "  ?>
                                                                        </a>
                                                                    </li>


                                                                </ul>
                                                            </div>


                                                        </div>


                                                    <?php } ?>








                                                </div>
                                            </div>

                                        </div>



                                    </div>
                                </div>

                                <div class="col-2">


                                </div>
                            </div>
                        </div>








                    </div>
                </div>

                <!-- <div class="col-sm-12 col-sm-7 col-md-2 d-flex align-items-stretch flex-column">
                </div> -->


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


<?php include('includes/footer.php'); ?>