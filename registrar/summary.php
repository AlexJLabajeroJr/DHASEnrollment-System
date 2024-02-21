<?php
include '../db_con.php';




// show box movie goto movie hdtoday.tv

session_start();
// ob_start();
$page_title = "Summary Report Page";
include('includes/header.php');

if (!isset($_SESSION['registrar_id'])) {
    header("location: ../index.php");
}


if (isset($_POST['refresh'])) {
    header('location:summary.php');
}


$sql = mysqli_query($conn, "select * from schoolyr");

if (isset($_GET['SYID']) && isset($_GET['enrollment_status'])) {
    $SYID = $_GET['SYID'];
    $enrollment_status = $_GET['enrollment_status'];
    mysqli_query($conn, "update schoolyr set enrollment_status ='$enrollment_status' where SYID='$SYID'");
    header("location:enrollment_status.php");
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
                                    <p class="text-light" style="font-size:15px">Registrar</p>
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
                                <i class="far fa-dot-circle nav-icon text-dark"></i>
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

                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <!-- <h3 class="bg-light  text-center  text-light" style="  font-family:Segoe UI; color:white;">EN<b class="text-lime" style="font-family:Segoe UI;"><i>ROLL</b><b></b></i>MENT SUMMARY REPORT</b></h3> -->


                                            <h3 class="bg-light  text-center  text-light" style="  font-family:Segoe UI; color:white;">ENROLLMENT SUMMARY REPORT</b></h3>
                                        </div>


                                        <div class="col-sm-2">
                                            <form method="POST"><button type="submit" name="refresh" class="btn btn-secondary btn-sm border border-light  border border-2" style="
font-family:Segoe UI; font-size:15px; border-radius: 15px 15px 15px 15px;
    overflow: hidden;   "><i class="fa fa-refresh" aria-hidden="true"></i> Refresh Page Button</button></form>
                                        </div>

                                    </div>
                                </div>
                                <div>


                                    <div class="card-body">
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead class="text-center" style="background-color:#EEEEEE">
                                                    <tr>
                                                        <th scope="col">SY_ID</th>
                                                        <th class="text-left" scope="col">IMAGE</th>
                                                        <th class="text-left" scope="col">Student Name</th>
                                                        <th scope="col">Grade_level</th>
                                                        <th scope="col">Enrollment Status</th>
                                                        <!-- <th scope="col">Date_of_Enrollment</th>
                                                        <th scope="col">Date_of_Pending_Enrollment</th> -->
                                                        <!-- <th scope="col">student_type</th> -->
                                                        <th scope="col">Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <?php


                                                    // $query = "SELECT * FROM  student WHERE status = 'Pending' ORDER BY student_id ASC";
                                                    // $result = mysqli_query($conn, $query);



                                                    $query = "SELECT *
                                                    FROM `schoolyr` s
                                                    INNER JOIN `school_year` sc ON s.school_year_id = sc.school_year_id 
                                                    INNER JOIN `student` c ON s.student_id = c.student_id
                                                    INNER JOIN `grade_level` g ON g.GRADE_LEVEL_ID = c.GRADE_LEVEL_ID
                                                    WHERE s.enrollment_status = 1  
                                                    ORDER BY s.SYID ASC";
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

                                                    foreach ($array as $resulta) {
                                                        echo '<tr>';
                                                        echo '<td>' . $resulta->student_id . '</a></td>';
                                                        echo '<td><img src="' . $resulta->p_p . '" style=" width="40" height="40" opacity: .8" ></td>';
                                                        echo '<td class="text-left" style="font-family: Segoe UI;">' . $resulta->last_name . ' ' . $resulta->first_name . '' . $resulta->middle_name . '</td>';
                                                        echo '<td>' . $resulta->GRADE_LEVEL . '</td>';






                                                        echo '<td>';

                                                        if ($resulta->enrollment_status == 1) {
                                                            echo "<B class='badge badge-1 text-light border border-1 ' style='background-color: #3FA796; border-radius: 15px 15px 15px 15px; overflow: hidden; border-style: solid; border-width: 3px; border-color: #ffffff;'>PENDING</B>";
                                                        }
                                                        if ($resulta->enrollment_status == 2) {
                                                            echo "<B class='badge badge-1 bg-success' style='background-color: #BFDB38; border-radius: 15px 15px 15px 15px; overflow: hidden; border-style: solid; border-width: 3px; border-color: #ffffff;'>ENROLLED</B>";
                                                        }
                                                        if ($resulta->enrollment_status == 3) {
                                                            echo "<B class='badge badge-danger'>REJECT</B>";
                                                        }

                                                        echo '</td>';




                                                        if ($resulta->student_type == 'new' || $resulta->student_type == 'transferee' || $resulta->student_type == 'returnee') {
                                        




        echo '
        <td align="center">

        <div class="btn-group">
        <button type="button" class="btn btn-default btn-flat">Action</button>
        <button type="button" class="btn btn-default btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
           <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu text-center" role="menu">

        
        <a title="Confirm" href="controller.php?action=confirm&student_id=' . $resulta->student_id . '"  class="btn btn-1 btn-sm border border-1 mb-1 "  style = "background-color:#ffff"  >View Information <span class="fas fa-user fw-fa text-dark"></span></a><br>
            <a title="Archieve" href="controller.php?action=archieve&SYID=' . $resulta->SYID . '"  class="btn btn-1 btn-sm border border-1  " style = "background-color:#FFB100">Move to Archive <span class="fa fa-info-circle fw-fa"></span></a>


        </div>
     </div>

     </td>';


        
                                                        } else {
                                                            echo '<td align="center" ></td>';
                                                        }

                                                        echo '</tr>';
                                                    }
                                                    ?>


                                                </tbody>




                                            </table>
                                            </form>



















                                        </div>

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