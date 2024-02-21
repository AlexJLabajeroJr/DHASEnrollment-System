<?php
include '../db_con.php';


session_start();
ob_start();
$page_title = "Enrollment Status Page";
include('includes/header.php');

if (!isset($_SESSION['registrar_id'])) {
    header("location: ../index.php");
}


// if (isset($_POST['refresh'])) {
//     header('location:registrar.php');
// }




$sql = mysqli_query($conn, "select * from schoolyr");

if (isset($_GET['SYID']) && isset($_GET['enrollment_status'])) {
    $SYID = $_GET['SYID'];
    $enrollment_status = $_GET['enrollment_status'];
    mysqli_query($conn, "UPDATE schoolyr SET enrollment_status = '$enrollment_status', DATE_ENROLLED = '" . date('Y-m-d') . "' WHERE SYID = '$SYID'");
    header("Location: registrar.php?enr=1");
    die();
}





if (isset($_GET['SYID']) && isset($_GET['requirement_status'])) {
    $SYID = $_GET['SYID'];
    $requirement_status = $_GET['requirement_status'];
    mysqli_query($conn, "update schoolyr set requirement_status ='$requirement_status' where SYID='$SYID'");
    header("location:enrollment_status.php?req=1");
    die();
}




if (isset($_GET['SYID']) && isset($_GET['payment_status'])) {
    $SYID = $_GET['SYID'];
    $payment_status = $_GET['payment_status'];
    mysqli_query($conn, "update schoolyr set payment_status ='$payment_status' where SYID='$SYID'");
    header("location:enrollment_status.php?pay=1");
    die();
}






$sad = "SELECT * FROM account WHERE account_id = $_SESSION[registrar_id]";
$ako = $conn->query($sad);
$row = $ako->fetch_assoc();


$setIn = "SELECT * FROM account WHERE p_p = '" . $row['p_p'] . "'";
$searchIMResult = $conn->query($setIn);
$searchInResultRow = $searchIMResult->fetch_assoc();



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
                    <div class="container" style="background-color: #037d50">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <br>
                                <img src="<?php echo $searchInResultRow['p_p']; ?>" class="brand-image img-circle elevation-3" style="opacity: .8" height="100px" />


                            </div>

                            <div class="col-sm-12 text-center">
                                <div class="pull-left info">
                                    <p style="font-size:15px; font-size:20px;
font-family:Segoe Script;" class="text-light text-bold"><b> Hello! <?= $row['name'] ?></b></p>
                                    <p class="text-light" style="font-size:15px">Administrator</p>
                                </div>

                            </div>

                            <div class="col-sm-12 text-center mt-3">

                                <a href="logout_registrar.php" class="nav-link text-dark">


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
                    <img src="<?php echo $searchInResultRow['p_p']; ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <!-- <img src="<php echo $searchIMResultRow['p_p']; ?>" alt="" class="avatar-photo"> -->

                </div>


                <!-- <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="queries/updateImage.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body pd-5 p-2">
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
                </div> -->



                <!-- <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a> -->







                <div class="pull-left info">
                    <p style="font-size:15px; font-size:15px;
font-family:Segoe UI;" class="text-light text-bold"><b> <?= $_SESSION['auth_user']['username']; ?></b></p>
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






                <li class="nav-item menu-open">
                    <a href="" class="nav-link text-light" style="font-size:14px;">
                        <i class=""></i>
                        <p>
                            &nbsp &nbsp &nbspMAIN NAVIGATION
                            <!-- <i ></i>   class="right fas fa-angle-left" -->
                        </p>
                    </a>

                </li>




                <li class="nav-item menu-open">
                    <a href="registrar.php" class="nav-link text-light">
                        <i class="nav-icon fas nav-icon fas fa-copy"></i>
                        <p>
                            List of Enrolled Students
                            <!-- <i ></i>   class="right fas fa-angle-left" -->
                        </p>
                    </a>

                </li>


                <li class="nav-item menu-open">
                    <a href="#" class="nav-link  active text-light">
                        <i class="nav-icon fas fa-book text-light"></i>
                        <p>
                            Enrollment Status
                            <i class="fas fa-angle-left right"></i>
                            <!-- <span class="badge badge-info right">New</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="enrollment_status.php" class="nav-link active bg-light">
                                <i class="far fa-dot-circle nav-icon"></i>
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

                <li class="nav-item">
                    <a href="#" class="nav-link text-light">
                        <i class="nav-icon far fa-envelope text-light"></i>
                        <p>
                            Enrollment Summary Report
                            <i class="right fas fa-angle-left text-light"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="summary.php" class="nav-link text-light">
                                <i class="far fa-circle nav-icon text-light"></i>
                                <p>Manage Enrollment Summary Report</p>
                            </a>
                        </li>

                    </ul>



                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link text-light">
                        <i class="nav-icon fas fa-book text-light"></i>
                        <p>
                            Requirements
                            <i class="fas fa-angle-left right text-light"></i>
                            <!-- <span class="badge badge-info right text-light">New</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="student_requirement.php" class="nav-link text-light">
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
                        <i class="nav-icon fa-sharp fa-solid fa-peso-sign text-light"></i>
                        <i class=""></i>

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



                <!-- <li class="nav-item">
                    <a href="logout_registrar.php" class="nav-link text-light">
                        <i class="nav-icon fas fa-sign-out-alt text-light"></i>
                        <p>Logout</p>
                    </a>




                </li> -->


            </ul>
        </nav>


        <!-- /.sidebar -->
    </aside>



    <!-- Main Sidebar Container -->

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

                                <!-- <php include('faculty_message.php'); ?> -->

                                <div class="container mt-3">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <h3 class="bg-light text-center  text-light" style=" font-family:Segoe UI; color:white;">LIST OF PENDING ENROLLMENT</b></h3>

                                            <!-- 
                                            <h3 class="bg-light text-center  text-light" style=" font-family:Segoe UI; color:white;">LIST OF <b class="text-warning" style="font-family:Segoe UI;"><i>PEN</b><b>DING</b></i> ENROLLMENT</b></h3> -->


                                        </div>


                                        <div class="col-sm-2">
                                            <form method="POST"><button type="submit" name="refresh" class="btn btn-secondary btn-sm border border-light  border border-2" style="
font-family:Segoe UI; font-size:15px; border-radius: 15px 15px 15px 15px;
    overflow: hidden;   "><i class="fa fa-refresh" aria-hidden="true"></i> Refresh Page Button</button></form>
                                        </div>
                                    </div>
                                </div>
                                </h3>
                                <div>


                                    <div class="card-body">
                                        <form method="post">
                                            <div class="card-body">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead class="text-center" style="background-color:#EEEEEE">
                                                        <tr>
                                                            <!-- <th scope="col">SY_ID</th> -->
                                                            <th scope="col">School_year</th>
                                                            <th scope="col">Image</th>
                                                            <th scope="col">Student_Name</th>
                                                            <th scope="col">Grade_level</th>
                                                            <th scope="col">Date_of_Enrollment</th>

                                                            <th scope="col">student_type</th>
                                                            <th scope="col">Payment Status</th>
                                                            <th scope="col">Requirement_status</th>
                                                            <th scope="col">View Student requirements</th>
                                                            <th scope="col">Action(Payment)</th>
                                                            <th scope="col">Action(Requirement)</th>
                                                            <th scope="col">Action(Enrollment)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                        <?php


                                                        // $query = "SELECT * FROM  student WHERE status = 'Pending' ORDER BY student_id ASC";
                                                        // 
                                                        //     $query = "SELECT *
                                                        // FROM `schoolyr` s
                                                        // INNER JOIN `school_year` sc ON s.school_year_id = sc.school_year_id 
                                                        // INNER JOIN `student` c ON s.student_id = c.student_id
                                                        // INNER JOIN `grade_level` g ON g.GRADE_LEVEL_ID = c.GRADE_LEVEL_ID
                                                        // WHERE s.enrollment_status = 1  
                                                        // ORDER BY s.SYID ASC";
                                                        //     $result = mysqli_query($conn, $query);





                                                        // $getSchol = mysqli_query($conn, "SELECT * FROM `schoolyr` as schlyr INNER JOIN school_year as schol ON schlyr.school_year_id = schol.school_year_id INNER JOIN student as stud ON schlyr.student_id = stud.student_id ;");




                                                        $query = "SELECT * FROM schoolyr as sch INNER JOIN school_year as scol ON sch.school_year_id = scol.school_year_id WHERE enrollment_status = 1 AND archieve = 0 ";
                                                        $result = mysqli_query($conn, $query);

                                                        $i = 1;


                                                        if (mysqli_num_rows($sql) > 0) {


                                                            while ($row = mysqli_fetch_assoc($result)) {



                                                                $query1 = "SELECT student_id FROM schoolyr WHERE  SYID = $row[SYID] ";
                                                                $result1 = mysqli_query($conn, $query1);
                                                                $row1 = mysqli_fetch_assoc($result1);

                                                                $query2 = "SELECT * FROM student WHERE student_id =  $row1[student_id] ";
                                                                $result2 = mysqli_query($conn, $query2);
                                                                $row2 = mysqli_fetch_assoc($result2);



                                                                $query4 = "SELECT GRADE_LEVEL FROM grade_level WHERE GRADE_LEVEL_ID =  $row2[GRADE_LEVEL_ID] ";
                                                                $result4 = mysqli_query($conn, $query4);
                                                                $row4 = mysqli_fetch_assoc($result4);





                                                                echo '<tr>';
                                                                // echo '<td>' . $row['SYID'] . '</td>';
                                                                echo '<td>' . $row['school_year'] . '</td>';

                                                                echo '<td><img src="' . $row2['p_p'] . '" style=" width="40" height="40" opacity: .8" ></td>';

                                                                echo '<td class="text-left" style="font-family: Segoe UI;">' . $row2['first_name'] . '. ' . $row2['middle_name'] . ' ' . $row2['last_name'] . ' . ' . $row2['suffix_name'] . '.</td>';
                                                                echo '<td>' . $row4['GRADE_LEVEL'] . '</td>';
                                                                // echo '<td>' . $row['DATE_RESERVED'] . '</td>';

                                                                echo '<td>' . date("l, F j, Y  h:iA", strtotime($row['DATE_ENROLLED'])) . '</td>';







                                                                echo '<td>';

                                                                if ($row2['student_type'] == 'new') {
                                                                    echo "<B class='badge badge-1 badge-1  text-dark border border-1 ' style='background-color: #BEF0CB; border-radius: 15px 15px 15px 15px; overflow: hidden; border-style: solid; border-width: 3px; border-color: #ffffff;'>New</B>";
                                                                }
                                                                if ($row2['student_type'] == 'transferee') {
                                                                    echo "<B class='badge badge-1 text-light' style='background-color: #EF5B0C; border-radius: 15px 15px 15px 15px; overflow: hidden; border-style: solid; border-width: 3px; border-color: #ffffff;'>Transferee</B>";
                                                                }
                                                                if ($row2['student_type'] == 'returnee') {
                                                                    echo "<B class='badge badge-1 text-light border border-1 ' style='background-color: #913175; border-radius: 15px 15px 15px 15px; overflow: hidden; border-style: solid; border-width: 3px; border-color: #ffffff;'>Returnee</B>";
                                                                }

                                                                echo '</td>';



                                                        ?>
                                                                <td>

                                                                    <?php
                                                                    if ($row['payment_status'] == 0) {

                                                                        echo "<B class='badge badge-1 text-light border border-1 bg-dark ' style='background-color: #; border-radius: 15px 15px 15px 15px; overflow: hidden; border-style: solid; border-width: 3px; border-color: #ffffff;'>Unpaid</B>";
                                                                    }
                                                                    if ($row['payment_status'] == 1) {
                                                                        echo "<B class='badge badge-1 bg-warning text-light border border-1 ' style='background-color: #; border-radius: 15px 15px 15px 15px; overflow: hidden; border-style: solid; border-width: 3px; border-color: #ffffff;'>Partially Paid</B>";
                                                                    }
                                                                    if ($row['payment_status'] == 2) {
                                                                        echo "<B class='badge badge-1 bg-green text-light border border-1 ' style='background-color: #3FA796; border-radius: 15px 15px 15px 15px; overflow: hidden; border-style: solid; border-width: 3px; border-color: #ffffff;'>Fully Paid</B>";
                                                                    }
                                                                    ?>

                                                                </td>




                                                                <td>

                                                                    <?php

                                                                    if ($row['requirement_status'] == 0) {

                                                                        echo "<B class='badge badge-1 text-light bg-lightblue border border-1 ' style='background-color: #;  overflow: hidden; border-style: solid; border-width: 3px; border-color: #ffffff;'>For Submission</B>";
                                                                    }
                                                                    if ($row['requirement_status'] == 1) {

                                                                        echo "<B class='badge badge-1 text-light  border border-1 ' style='background-color: #D21312;  overflow: hidden; border-style: solid; border-width: 3px; border-color: #ffffff;'>INCOMPLETE</B>";
                                                                    }
                                                                    if ($row['requirement_status'] == 2) {
                                                                        echo "<B class='badge badge-1 bg-purple  text-light border border-1 ' style='background-color: #; overflow: hidden; border-style: solid; border-width: 3px; border-color: #ffffff;'>COMPLETE</B>";
                                                                    }

                                                                    ?>

                                                                </td>




                                                                <?php














                                                                echo '
<td align="center">


<a title="View" href="control1.php?action=view&SYID=' . $row['SYID'] . '" class="btn btn-light btn-sm border border-1 bg-light mb-2 " style  = " box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 4px 20px 0 rgba(0, 0, 0, 0.1); 
border-style:solid;">View Requirements<span class="fa fa-eye"></span></a>





</td>';

                                                                ?>







                                                                <td>
                                                                    <select class="form-control badge badge-xs" onchange="status_updatesu(this.options[this.selectedIndex].value,'<?php echo $row['SYID'] ?>')">
                                                                        <option value="">Update Status</option>
                                                                        <option value="0">Unpaid</option>
                                                                        <option value="1">Partially paid</option>
                                                                        <option value="2">Fully Paid</option>
                                                                        <!-- <option value="3">REJECT</option> -->
                                                                    </select>
                                                                </td>



                                                                <td>
                                                                    <select class="form-control badge badge-xs" onchange="status_updates(this.options[this.selectedIndex].value,'<?php echo $row['SYID'] ?>')">
                                                                        <option value="">Update Status</option>
                                                                        <option value="0">For Submission</option>
                                                                        <option value="1">Incomplete</option>
                                                                        <option value="2">Complete</option>
                                                                        <!-- <option value="3">REJECT</option> -->
                                                                    </select>
                                                                </td>




                                                                <td>
                                                                    <select class="form-control badge badge-xs" onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['SYID'] ?>')">
                                                                        <option value="">Update Status</option>
                                                                        <option value="1">PENDING</option>
                                                                        <option value="2">ENROLLED</option>
                                                                        <!-- <option value="3">REJECT</option> -->
                                                                    </select>
                                                                </td>





                                                                <!-- <php include('modal.php'); ?> -->


                                                                <!-- 
                                                            $getSem = mysqli_query($conn, "SELECT * FROM `tblsemester` WHERE SETSEM = 1");

                                                            $sem = mysqli_fetch_assoc($getSem)['SEMESTER'];


                                                            while ($row = mysqli_fetch_assoc($getSched)) {
                                                            if ($row['GRADE_LEVEL_ID'] == $GRADE_LEVEL_ID) {

                                                            if ($row['sched_semester'] == $sem or $row['sched_semester'] == 'Quarter') { -->


                                                        <?php


                                                            }


                                                            echo '</tr>';
                                                        }
                                                        ?>

                                                    </tbody>














                                                </table>
                                        </form>


                                        <?php


                                        // if (isset($_POST['update'])) {




                                        //     $currentyear = date('Y');
                                        //     $nextyear =  date('Y') + 1;
                                        //     $sy = $currentyear . '-' . $nextyear;
                                        //     $_SESSION['SY'] = $sy;



                                        //     // $student_id = $_POST['student_id'];
                                        //     // $select = "UPDATE student SET status = 'Enrolled' WHERE student_id = '$student_id' ";
                                        //     // $resut = mysqli_query($conn, $select);

                                        //     // header("location:registrar.php");



                                        //     //                                             $sqli = "INSERT INTO `schoolyr`
                                        //     // (`AY`,  `student_id`, `category`, `DATE_RESERVED`, `DATE_ENROLLED`, `STATUS`)
                                        //     // VALUES ('" . $_SESSION['SY'] . "','{$row2}','ENROLLED','" . date('Y-m-d') . "','" . date('Y-m-d') . "','New');";
                                        //     //                                             $resu = mysqli_query($conn, $sqli);


                                        //     //                                             if ($resu) {

                                        //     //                                                 header("Location:student_copy.php?");
                                        //     //                                             } else {
                                        //     //                                                 echo mysql_error();
                                        //     //                                             }
                                        // }



                                        // if (isset($_POST['update'])) {

                                        //     // $student_id = $_POST['student_id'];
                                        //     // $select = "DELETE  FROM student  WHERE student_id = '$student_id' ";
                                        //     // $resut = mysqli_query($conn, $select);
                                        //     // header("location:registrar.php");


                                        //     $SYID = $_SESSION['SYID'];
                                        //     $sel = "UPDATE schoolyr SET 'category' = 'ENROLLED' WHERE SYID = '$SYID' ";
                                        //     $resOL = mysqli_query($conn, $sel);
                                        //     $_SESSION['scol_id'] = $row2['SYID'];

                                        //     if ($resOL) {
                                        //         header("Location:goto.php");
                                        //     } else {
                                        //         echo error_reporting(E_ALL);
                                        //     }
                                        // }


                                        // 
                                        ?>


                                    </div>








                                    <!-- 
                                       $getSched = mysqli_query($conn, "SELECT * FROM `schedule` as sched  INNER JOIN subject as subj ON sched.subject_id = subj.subject_id INNER JOIN room as r ON sched.room_id = r.room_id INNER JOIN faculty as f ON sched.faculty_id = f.faculty_id  INNER JOIN grade_level as v ON sched.GRADE_LEVEL_ID= v.GRADE_LEVEL_ID ;");


                                       while ($row2 = mysqli_fetch_assoc($getSched)) {

                                          echo '<tr>';
                                          echo '<td>' . date("g:iA", strtotime($row2['start_time'])) . '</td>';
                                          echo '<td>' . date("g:iA", strtotime($row2['end_time'])) . '</td>';
                                          echo '<td>' . $row2['day'] . '</td>';
                                          echo '<td>' . $row2['subject_description'] . '</td>';
                                          echo '<td>' . $row2['subject_code'] . '</td>';
                                          echo '<td>' . $row2['sched_semester'] . '</td>';
                                          echo '<td>' . $row2['sched_sy'] . '</td>';
                                          echo '<td>' . $row2['GRADE_LEVEL'] . '</td>';
                                          echo '<td>' . $row2['room_name'] . '</td>';
                                          echo '<td>' . $row2['SECTION'] . '</td>';
                                          echo '<td>' . $row2['fac_name'] . '</td>';
                                      
































                                </div>
                              /.card-body -->
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



<script type="text/javascript">
    function status_update(value, SYID) {
        //alert(id);  
        let url = "http://localhost/Enrollment/registrar/enrollment_status.php";
        window.location.href = url + "?SYID=" + SYID + "&enrollment_status=" + value;
    }
</script>




<script type="text/javascript">
    function status_updates(value, SYID) {
        //alert(id);  
        let url = "http://localhost/Enrollment/registrar/enrollment_status.php";
        window.location.href = url + "?SYID=" + SYID + "&requirement_status=" + value;
    }
</script>



<script type="text/javascript">
    function status_updatesu(value, SYID) {
        //alert(id);  
        let url = "http://localhost/Enrollment/registrar/enrollment_status.php";
        window.location.href = url + "?SYID=" + SYID + "&payment_status=" + value;
    }
</script>

<?php
ob_end_flush();
?>


<!-- jQuery -->






















<?php if (isset($_GET['added'])) : ?>
    <script>
        Swal.fire(

            'Success',
            'Successfully Updated!',
            'success'
        )
    </script>
<?php endif; ?>







<?php include('includes/footer.php'); ?>