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

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Admin Dashboard</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="assets/images/faces/9.jpg" class="img-circle elevation-2" alt="User Image">
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

               <li class="nav-item ">
                  <a href="" class="nav-link ">
                     <i class="nav-icon fas fa-edit"></i>
                     <p>
                        School_year
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>

                  <ul class="nav nav-treeview">


                     <li class="nav-item">
                        <a href="school_year.php" class="nav-link ">
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


               <li class="nav-item menu-open ">
                  <a href="" class="nav-link active">
                     <i class=" nav-icon fas fa-book"></i>
                     <p>
                        Subject
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>

                  <ul class="nav nav-treeview">


                     <li class="nav-item">
                        <a href="subject.php" class="nav-link active bg-light">
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

               <li class="nav-item">
                  <a href="logout.php" class="nav-link">
                     <i class="nav-icon fas fa-sign-out-alt"></i>
                     <p>Logout</p>
                  </a>




               </li>


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
                            <li class="breadcrumb-item"><a href="faculty.php">Home</a></li>
                            <li class="breadcrumb-item active">Faculty_View</li>
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
                                            <h3 class="bg-light text-center border border-2 text-light" style="color:white;"><b>View Subject Details</b>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="subject.php" class="btn btn-danger float-end">BACK</a>
                                        </div>
                                    </div>
                                </div>
                                </h3>
                                <div>


                                    <div class="card-body">
                                        <!-- /.card-header -->
                                        <div class="card-body">

                                            <?php
                                            if (isset($_GET['subject_id'])) {
                                                $subject_id = mysqli_real_escape_string($conn, $_GET['subject_id']);
                                                $query = "SELECT * FROM subject WHERE subject_id='$subject_id' ";
                                                $query_run = mysqli_query($conn, $query);

                                                if (mysqli_num_rows($query_run) > 0) {
                                                    $subject = mysqli_fetch_array($query_run);
                                            ?>


                                                    <div class="mb-3">
                                                        <label>Subject_Code</label>
                                                        <p class="form-control">
                                                            <?= $subject['subject_code']; ?>
                                                        </p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Subject_Description</label>
                                                        <p class="form-control">
                                                            <?= $subject['subject_description']; ?>
                                                        </p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <?php
                                                        $query = "SELECT * FROM grade_level";
                                                        $result = mysqli_query($conn, $query);

                                                        echo "<label>Grade Level</label>";
                                                        echo "<select <?= $subject['subject_description']; ?> id='GRADE_LEVEL_ID' class='form-control'>";

                                                        if ($result) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo "<option value='{$row['GRADE_LEVEL_ID']}'>{$row['GRADE_NAME']} {$row['GRADE_LEVEL']}</option>";
                                                            }
                                                            echo "</select>";
                                                            mysqli_free_result($result);
                                                        } else {
                                                            echo "Failed query";
                                                        }
                                                        ?>
                                                    </div>


                                                    <div class="mb-3">

                                                        <label class="col-md-4 control-label" for="SEMESTER">Academic Term:</label>
                                                        <select class="form-control input-sm" id="SEMESTER" name="SEMESTER">
                                                            <option value="Quarter" <?= ($subject['SEMESTER'] == 'Quarter') ? 'selected' : '' ?>>Quarter</option>
                                                            <option value="First" <?= ($subject['SEMESTER'] == 'First') ? 'selected' : '' ?>>First</option>
                                                            <option value="Second" <?= ($subject['SEMESTER'] == 'Second') ? 'selected' : '' ?>>Second</option>
                                                            <option value="Summer" <?= ($subject['SEMESTER'] == 'Summer') ? 'selected' : '' ?>>Summer</option>
                                                        </select>
                                                    </div>


                                            <?php
                                                } else {
                                                    echo "<h4>No Such Id Found</h4>";
                                                }
                                            }
                                            ?>

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


    <!-- <php
    ob_end_flush();
    ?> -->

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