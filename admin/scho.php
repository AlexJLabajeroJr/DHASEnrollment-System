<?php
include '../db_con.php';
session_start();

include('includes/header.php');


if (!isset($_SESSION['admin_id'])) {
    header("location: ../index.php");
}





$sql = "SELECT count(*) as 'enrollees' FROM student WHERE NewEnrollees = '1' && status = 'Pending'";
$result = $conn->query($sql);
$enrollees = $result->fetch_assoc();



$query = "SELECT * from school_year ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);


if (isset($_POST['refresh'])) {
    header('location:school_year.php');
}





$sad = "SELECT * FROM account WHERE account_id = $_SESSION[admin_id]";
$ako = $conn->query($sad);
$row = $ako->fetch_assoc();


$setIn = "SELECT * FROM account WHERE p_p = '" . $row['p_p'] . "'";
$searchIMResult = $conn->query($setIn);
$searchInResultRow = $searchIMResult->fetch_assoc();

$setyr = "Select * from school_year where school_year_status = '1'";
$searchYrResult = $conn->query($setyr);
$searchYrRow = $searchYrResult->fetch_assoc();



?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="../img/saddd.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-bold text-light  text-center" style="font-size:11px;">Divine Healer Academy of Sorsogon</span>

        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../img/9.jpg" class="img-circle elevation-2" alt="User Image">
                </div>


                <div class="info">

                    <!-- <p><?= $_SESSION['auth_user']['email']; ?></p> -->
                    <a><?= $_SESSION['auth_user']['username']; ?></a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>


            <!-- Sidebar Menu -->
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
                                <a href="Pre_registration.php" class="nav-link  ">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        New Enrollee

                                        <span class="right badge badge-danger"> <span id="success"> <?= $enrollees['enrollees']; ?></span></span>

                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="" class="nav-link ">
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
                            <li class="nav-item ">
                                <a href="schedule.php" class="nav-link ">
                                    <i class="nav-icon far fa-calendar-alt"></i>
                                    <p>
                                        Schedule
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">


                                    <li class="nav-item">
                                        <a href="schedule.php" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Set Schedule</p>
                                        </a>
                                    </li>


                                </ul>

                            </li>

                            <li class="nav-item menu-open ">
                                <a href="" class="nav-link active">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        School_year
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">


                                    <li class="nav-item">
                                        <a href="school_year.php" class="nav-link active bg-light">
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
                            <li class="breadcrumb-item active">Enrollment</li>
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





                            <?php
                            if (isset($_POST['add_user'])) {
                                $school_year = $_POST['school_year'];
                                $checkSKOject = "SELECT * FROM `school_year` WHERE `school_year` = ?";
                                $stmt = $conn->prepare($checkSKOject);
                                $stmt->bind_param("s", $school_year);
                                $stmt->execute();
                                $checkSkolResult = $stmt->get_result();
                                $maxrows = mysqli_num_rows($checkSkolResult);

                                if ($maxrows > 0) {
                            ?>
                                    <script>
                                        Swal.fire(
                                            'This School Year Has Already Exist!',
                                            ' ',
                                            'error'
                                        )
                                    </script>
                                    <?php
                                } else {
                                    $query = "INSERT INTO school_year (school_year) VALUES (?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->bind_param("s", $school_year);
                                    $result = $stmt->execute();

                                    if ($result) {
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
                                                title: ' Successfully Added!'
                                            })
                                        </script>
                                    <?php
                                    } else {
                                        echo mysqli_error($conn); // Show the actual error message
                                    }
                                }
                            }
                            // $sem
                            $school_year =  "";

                            $action = "add_user";
                            $btn_value = "Add School year";



                            if (isset($_GET['school_year_id'])) {
                                if (isset($_GET['edit'])) {
                                    $query = "Select * from school_year where school_year_id = " . $_GET['school_year_id'];
                                    $result = mysqli_query($conn, $query);
                                    if (!$result) {
                                        echo "Database query failed";
                                    } else {
                                        $row = mysqli_fetch_assoc($result);

                                        $school_year_id = $row["school_year_id"];
                                        $school_year = $row["school_year"];
                                        // $school_year_status = $row["school_year_status"];
                                        // $sem = $row["sem"];

                                        $btn_value = "Update School Year";
                                        $action = "update_user";
                                    }
                                }

                                if (isset($_GET['delete'])) {
                                    $query = "DELETE FROM school_year WHERE school_year_id =" . $_GET['school_year_id'];
                                    $result = mysqli_query($conn, $query);
                                    if ($result) {
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
                                                title: ' Successfully Deleted!'
                                            })
                                        </script>
                                    <?php
                                    } else {
                                        echo mysqli_query();
                                    }
                                }
                            }


                            if (isset($_POST['update_user'])) {


                                $school_year = $_POST['school_year'];
                                // $school_year_status = $_POST['school_year_status'];


                                // $sem = $_POST['sem'];

                                $query = " UPDATE school_year SET  ";

                                $query .= "school_year  = '{$school_year}'";
                                // $query .= "school_year_status  = '{$school_year_status}'";
                                // $query .= "sem  = '{$sem}'";
                                $query .= " WHERE school_year_id = {$school_year_id}";
                                $result = mysqli_query($conn, $query);



                                if ($result) {
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
                                            title: ' Successfully Updated!'
                                        })
                                    </script>

                            <?php
                                } else {
                                    echo mysql_error();
                                }
                            }

                            ?>









                            <section class="content">

                                <!-- Default box -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="bg-light  text-center  text-light" style="  font-family:Segoe UI; color:white;">MANAGE SCHOOL YEAR</b></i></b></h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <div class="info-box bg-light">
                                                            <div class="info-box-content">
                                                                <span class="bg-light  text-center  text-light" style="  font-family:Segoe UI; color:white;">SCHOOL-<b class="text-danger" style="font-family:Segoe UI;">YEAR</b></h3>
                                                                    <span class="info-box-number text-center text-muted mb-0"> <input value="<?= $searchYrRow['school_year']; ?>" class=" form-control bg-light border border-0 text-bold text-center" style="font-size:15px;"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4 ">
                                                        <div class="info-box bg-success text-light">
                                                            <div class="info-box-content text-light ">
                                                                <input type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" name="<?= $action ?>" value="<?= $btn_value ?>">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="info-box bg-secondary ">
                                                            <div class="info-box-content text-center">
                                                                <form method="POST"><button type="submit" name="refresh" class="btn btn-0 text-center text-light">Refresh</button></form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">




                                                        <table data-toggle="table" data-search="true" data-search-highlight="true" data-show-search-button="true" data-pagination="true" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>&nbspSchool_year_id&nbsp</th>
                                                                    <th>&nbspSchool_year&nbsp</th>
                                                                    <!-- <th>&nbspSchool_year_status&nbsp</th> -->

                                                                    <th>&nbspStatus &nbsp</th>
                                                                    <th>&nbspAction&nbsp</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $query = "Select * from school_year";
                                                                $result = mysqli_query($conn, $query);

                                                                if ($result) {
                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        echo "<tr>";

                                                                        echo "<td>" . $row['school_year_id'] . "</td>";
                                                                        echo "<td>" . $row['school_year'] . "</td>";
                                                                        // echo "<td>" . $row['school_year_status'] . "</td>";


                                                                        echo "<td>";
                                                                        $school_year_status = $row['school_year_status'];
                                                                        $school_year_id = $row['school_year_id'];
                                                                        if ($school_year_status == 1) {
                                                                            echo "<a href='deactivate.php?id=$school_year_id'><input type='checkbox' name='school_year_status' value='1' data-toggle='switchbutton' checked data-onlabel='Active' data-offlabel='Inactive' onchange='submit();' checked></a>";
                                                                        } else if ($school_year_status == 0) {
                                                                            echo "<a href='activate.php?id=$school_year_id'><input type='checkbox' data-toggle='switchbutton' data-offlabel='Inactive' name='school_year_id'></a>";
                                                                        }
                                                                        echo "</td>";


                                                                        echo "<td><a class='btn btn-success' href='school_year.php?school_year_id=" . $row['school_year_id'] . "&edit=1'><i class='fas fa-edit'></i>Edit</a>  <a  class='btn btn-danger' href='school_year.php?school_year_id=" . $row['school_year_id'] . "&delete=1'> <i class='fas fa-trash'></i> Delete</a></td>";


                                                                        echo "</tr>";
                                                                    }
                                                                    mysqli_free_result($result);
                                                                } else {
                                                                    echo "Failed query";
                                                                }
                                                                ?>
                                                            </tbody>

                                                        </table>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                                <h3 class="text-primary"><i class="fas fa-paint-brush"></i> AdminLTE v3</h3>
                                                <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
                                                <br>
                                                <div class="text-muted">
                                                    <p class="text-sm">Client Company
                                                        <b class="d-block">Deveint Inc</b>
                                                    </p>
                                                    <p class="text-sm">Project Leader
                                                        <b class="d-block">Tony Chicken</b>
                                                    </p>
                                                </div>

                                                <h5 class="mt-5 text-muted">Project files</h5>
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                                                    </li>
                                                </ul>
                                                <div class="text-center mt-5 mb-3">
                                                    <a href="#" class="btn btn-sm btn-primary">Add files</a>
                                                    <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                            </section>


                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>







    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Manage School_year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">




                    <form class="form-horizontal span6" method="POST">
                        <div class="col-sm-12">


                            <div class="container-fluid">
                                <div class="row">


                                    <label>Schoo_year</label>
                                    <input type="text" name="school_year" placeholder="Ex.2020-2021" id="school_year" class="form-control " value="<?= $school_year ?>">



                                    <input type="submit" name="<?= $action ?>" value="<?= $btn_value ?>" class="btn btn-success btn-sm" style="margin-top:32px">




                                    <br>


                                </div>
                            </div>
                        </div>
                    </form>






                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="button" name="<?= $action ?>" value="<?= $btn_value ?>" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset($_GET['activi'])) : ?>
    <script>
        Swal.fire(
            'Set to Active School_year!',
            ' ',
            'success'
        )
    </script>
<?php endif; ?>



<?php if (isset($_GET['deactiv'])) : ?>
    <script>
        Swal.fire(
            'Set Inactive School_year!',
            ' ',
            'success'
        )
    </script>
<?php endif; ?>





<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.js"></script>
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>


<?php include('includes/footer.php'); ?>