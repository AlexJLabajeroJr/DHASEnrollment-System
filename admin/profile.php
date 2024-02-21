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
            <!-- <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item"> -->
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
            <!-- </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"> -->
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
            <!-- </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"> -->
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
            <!-- </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li> -->














            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-plus fa-fw"></i> New <i class="fa fa-caret-down"></i>
                    <!-- <span class="badge badge-warning navbar-badge">15</span> -->
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- <span class="dropdown-item dropdown-header">15 Notifications</span> -->

                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-calendar fa-fw"></i> Schedule
                        <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-book fa-fw"></i> Subject
                        <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa  fa-building  fa-fw"></i> Department
                        <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-user  fa-fw"></i> User
                        <!-- <span class="float-right text-muted text-sm">2 days</span> -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <!-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
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
                        <a href="Pre_registration.php" class="nav-link ">
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
                        <a href="profile.php" class="nav-link active  text-light">
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
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pre-registration requests</li> -->
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->

        <!-- Main content -->
        <section style=" background-color: #eee;">
            <div class="container py-5">
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                            <div class="text-center" style="font-family:Segoe Script;font-size:30px;">
                                <a href="#" class="">
                                    <i class="fas fa-user"></i><b>My Profile</b>
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <div class="profile-photo">
                                    <img src="<?php echo $searchInResultRow['p_p']; ?>" class="brand-image img-circle elevation-3" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;  height: 150px;  border-style:solid;
  border-width: 5px;  border-color:#FFDEDE">

                                    <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil bg-warning"></i></a>



                                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">




                                                <form action="../query/updateimage.php?account_id=<?php echo $searchInResultRow['account_id']; ?>" method="POST" enctype="multipart/form-data">

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
                                    </div>
                                </div>
                                <h5 class="my-3" style="font-family:Segoe Script;"><?= $row['name'] . " "  ?></h5>
                                <p class="text-muted mb-1" style="font-family:Segoe UI;"><?= $row['email'] . " "  ?></p>
                                <p class="text-muted mb-4" style="font-family:Segoe UI;">School <?= $row['role'] . " "  ?></p>
                                <div class="d-flex justify-content-center mb-4">
                                    <!-- <button type="button" class="btn btn-primary">Follow</button>
                                    <button type="button" class="btn btn-outline-primary ms-1">Message</button> -->
                                </div>

                            </div>
                        </div>
                        <!-- <div class="card mb-4 mb-lg-0" style="background-image:url('../img/saddd.png');   background-repeat:no-repeat;  border-radius: 10px; ">
                                <div class="card-body p-0">
                                    <ul class="list-group list-group-flush rounded-3">
                                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                            <i class="fas fa-globe fa-lg text-warning"></i>
                                            <p class="mb-0">https://mdbootstrap.com</p>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                            <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                            <p class="mb-0">mdbootstrap</p>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                            <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                            <p class="mb-0">@mdbootstrap</p>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                            <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                            <p class="mb-0">mdbootstrap</p>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                            <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                            <p class="mb-0">mdbootstrap</p>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">

                                <form id="profileEdit" method="POST">



                                    <div class="row">
                                        <div class="col-sm-9">
                                            <p class="mb-1">Username</p>
                                            <input class="form-control form-control-lg" name="name" type="text">
                                        </div>
                                    </div>


                                    <div class="row">

                                        <div class="col-sm-9">
                                            <p class="mb-1 mt-1">Email</p>
                                            <input class="form-control form-control-lg" name="email" type="email">
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-sm-9">
                                            <p class="mb-1 mt-1">Password</p>
                                            <input class="form-control form-control-lg" name="password" type="password">
                                        </div>
                                    </div>



                                    <br>

                                    <div class="row">

                                        <div class="col-sm-9">


                                            <a href="#" class=" text-right btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#Medium-modal" type="button">
                                                Update Information
                                            </a>


                                            <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myLargeModalLabel">Input Old Password</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>


                                                        <div class="modal-body">
                                                            <div class="input-group custom">
                                                                <input type="password" class="form-control form-control-lg" placeholder="**********" name="passwordRetype">


                                                                <div class="input-group-append custom">
                                                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnClose">Close</button>
                                                            <button type="submit" class="btn btn-primary" name="submitBtn">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>










                    <br>


                    <br>

                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>


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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php if (isset($_GET['newImage'])) : ?>
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
            title: 'New Profile Picture Is successfully updated!'
        })
    </script>

<?php endif; ?>


<script>
    //CODE FOR AJAX INSERT
    $("#profileEdit").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        $.ajax({
            type: "POST",
            url: "../query/updateadminInfo.php",
            data: form.serialize(),
            success: function(data) {
                var closeModalBtn = document.getElementById("btnClose");
                closeModalBtn.click();
                Swal.fire(
                    'Personal Informations',
                    'Are successfully updated',
                    'success'
                ).then((result) => {
                    if (result) {
                        location.reload();
                    }
                })
            },
            error: function(request, status, error) {
                var closeModalBtn = document.getElementById("btnClose");
                closeModalBtn.click();
                if (error == "Bad Request") {
                    Swal.fire(
                        'Password',
                        'Is incorrect',
                        'error'
                    )
                } else if (error == "Internal Server Error") {
                    Swal.fire(
                        'Email Account',
                        'Has been used by other',
                        'error'
                    )
                }
            }
        });
    });



    //END CODE FOR AJAX INSERT
</script>

<?php include('includes/footer.php'); ?>