<?php
include '../db_con.php';


session_start();

include('includes/header.php');



if (!isset($_SESSION['registrar_id'])) {
    header("location: ../index.php");
}











if (isset($_POST['add_addons'])) {

    $sertype = $_POST['sertype'];
    $_SESSION['SYID'] = $_POST['SYID'];
    // print_r($sertype);

    // Insert the interests into the database
    foreach ($sertype as $sertype) {
        $sqli = "INSERT INTO student_requirements (requirement_id,SYID) VALUES ('$sertype', '{$_SESSION['SYID']}')";
        $des = mysqli_query($conn, $sqli);
        if ($des) {
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
                    title: 'Student_requirement has been Successfully Added!'
                })
            </script>
        <?php
        } else {
            echo mysqli_query();
        }
    }
}



$sertype =   $_SESSION['SYID'] =  "";

$action = "add_addons";
$btn_value = "Add ";



if (isset($_GET['stud_req_id'])) {
    if (isset($_GET['edit'])) {
        $query = "Select * from student_requirements where stud_req_id = " . $_GET['stud_req_id'];
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "Database query failed";
        } else {
            $row = mysqli_fetch_assoc($result);

            $stud_req_id = $row["stud_req_id"];
            $sertype = $row['requirement_id'];
            $_SESSION['SYID'] = $row["SYID"];

            // $school_year_status = $row["school_year_status"];
            // $sem = $row["sem"];

            $btn_value = "Update User";
            $action = "update_user";
        }
    }

    if (isset($_GET['delete'])) {
        $query = "DELETE FROM student_requirements WHERE stud_req_id =" . $_GET['stud_req_id'];
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
                    title: 'Student_requirement has been Successfully Deleted!'
                })
            </script>
        <?php
        } else {
            echo mysqli_query();
        }
    }
}


if (isset($_POST['update_user'])) {

    $stud_req_id = $row['stud_req_id'];

    $_SESSION['SYID'] = $_POST['SYID'];
    $sertype = $_POST['sertype'];

    // $sem = $_POST['sem'];
    foreach ($sertype as $sertype) {
        $query = " UPDATE student_requirements SET  ";

        $query .= "SYID  = '{$_SESSION['SYID']}',";
        $query .= "requirement_id  = '{$sertype}'";
        // $query .= "sem  = '{$sem}'";
        $query .= " WHERE tsud_req_id = {$stud_req_id}";
        $result = mysqli_query($conn, $query);

        echo $query;

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
                    title: 'Student_requirement has been Successfully Updated!'
                })
            </script>
<?php
        } else {
            echo mysql_error();
        }
    }
}






if (isset($_POST['refresh'])) {
    header('location:student_requirement.php');
}






















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
                    <img src="../img/estipona.jpg" class="img-circle elevation-2" alt="User Image">
                    <!-- <img src="<php echo $searchIMResultRow['p_p']; ?>" alt="" class="avatar-photo"> -->

                </div>


                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="display: none;">
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
                </div>



                <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>







                <div class="pull-left info">
                    <p style="font-size:15px; font-size:20px;
font-family:Segoe Script;" class="text-light text-bold"><b> Hello! <?= $_SESSION['auth_user']['username']; ?></b></p>
                </div>

            </div>
        </div>


        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar  border border-1 bg-light" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar bg-dark border border-1">
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

                <li class="nav-item">
                    <a href="#" class="nav-link  text-light">
                        <i class="nav-icon far fa-envelope text-light"></i>
                        <p>
                            Enrollment Summary Report
                            <i class="right fas fa-angle-left text-light"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="summary.php" class="nav-link  text-light ">
                                <i class="far fa-circle nav-icon text-light"></i>
                                <p>Manage Enrollment Summary Report</p>
                            </a>
                        </li>

                    </ul>



                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link  active text-light">
                        <i class="nav-icon fas fa-book text-light"></i>
                        <p>
                            Requirements
                            <i class="fas fa-angle-left right text-light"></i>
                            <!-- <span class="badge badge-info right text-light">New</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="student_requirement.php" class="nav-link active bg-light">
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
                    <a href="profile.php" class="nav-link text-light">
                        <i class="nav-icon fa fa-user text-light"></i>
                        <p>My Profile</p>
                    </a>




                </li>



                <li class="nav-item">
                    <a href="logout_registrar.php" class="nav-link text-light">
                        <i class="nav-icon fas fa-sign-out-alt text-light"></i>
                        <p>Logout</p>
                    </a>




                </li>


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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Subject</li>
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

                                <div class="container-fluid mt-3 mb-3">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <h3 style="   font-family:Segoe UI; color:white; border-radius: 
                                overflow: hidden; " class="bg-light text-center border border-2 text-light" style=""><b>Manage Student Requirements</b>
                                        </div>
                                        <div class="col-sm-2">

                                            <form method="POST"><button type="submit" name="refresh" class=" bg-gray btn btn-dark-light btn-sm px-5 mb-3" style="
font-family:; font-size:15px; border-radius: 10px 10px 10px 10px;
    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 4px 20px 0 rgba(0, 0, 0, 0.19); 
    border-style:solid;
  border-width: 3px;  border-color:	#ffffff;"><i class='bi bi-refresh'></i>Refresh</button></form>
                                        </div>

                                        <!-- <div class="col-sm-2">
                                            <form method="POST"><button type="submit" name="refresh" class="btn btn-secondary">Refresh Page Button</button></form>
                                        </div> -->
                                    </div>
                                </div>
                                </h3>
                                <div>


                                    <!-- 
                                border-radius: 15px 15px 15px 15px;
    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19); 
    border-style:outset;
  border-width: 3px;  border-color:	ffffff; -->


                                    <form method="post" id="availment-form">
                                        <div class="container border border-1 mb-3">



                                            <div class="row">
                                                <!-- <div class="col-sm-2">
                                                </div> -->
                                                <div class="col-sm-6">

                                                    <?php
                                                    $query = "SELECT * FROM schoolyr AS SCH
INNER JOIN student AS STUD ON SCH.student_id = STUD.student_id
INNER JOIN grade_level AS GRAD ON STUD.GRADE_LEVEL_ID = GRAD.GRADE_LEVEL_ID WHERE enrollment_status = 1";

                                                    $result = mysqli_query($conn, $query);
                                                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                    // $query233 = "SELECT * FROM student WHERE student_id =   $result1er[student_id] ";
                                                    // $result255 = mysqli_query($conn, $query233);



                                                    // $query455 = "SELECT GRADE_LEVEL FROM grade_level WHERE GRADE_LEVEL_ID =    $result255[GRADE_LEVEL_ID] ";
                                                    // $result455 = mysqli_query($conn, $query455);


                                                    ?>


                                                    <label class="mt-3">Select Student Record</label>
                                                    <div class="form-group">
                                                        <select id="student-select" name="SYID" class="wew form-control" required onchange="loaddata()">
                                                            <option value=''>Select Student:</option>
                                                            <?php foreach ($row as $data) : ?>
                                                                <option value="<?= $data['SYID']; ?>">
                                                                    <?= $data['first_name']; ?> <?= $data['last_name']; ?> || Grade - <?= $data['GRADE_LEVEL']; ?> | <?= $data['strand']; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>



                                                </div>
                                                <div class="col-sm-3">
                                                    <div id="loaddata"></div>
                                                </div>















                                                <div class="col-sm-3 ">
                                                    <?php

                                                    $conn = mysqli_connect("localhost", "root", "", "my_db");

                                                    $query1 = "SELECT * FROM requirement";
                                                    $result1 = mysqli_query($conn, $query1);
                                                    ?>
                                                    <!-- <label style="font-family:Segoe Script;">Select</label> -->
                                                    <?php



                                                    while ($row1 = mysqli_fetch_array($result1)) {
                                                    ?>


                                                        <div class="line">



                                                            <input type="checkbox" class="my-checkbox" name="sertype[]" class="check" id="check2" value="<?php echo $row1['requirement_id']; //echo $row1['Service_ID'] == $women
                                                                                                                                                            ?>" />


                                                            <?php echo " $row1[requirement]"; ?><br>


                                                        </div>


                                                    <?php
                                                    }

                                                    // echo "<br><p>Select here the type of Requirements</p>";

                                                    ?>

                                                </div>












                                                <!-- <div class="col-sm-2" style="  background-image:url(' ../img/saddd.png'); background-position:top; background-repeat:no-repeat;">
                                                </div> -->




                                                <div class="container">
                                                    <div class="row">

                                                        <div class="col-6">
                                                        </div>
                                                        <div class=" col-2">
                                                            <br>


                                                        </div>

                                                        <div class="col-2">
                                                            <br>
                                                            <a class=" bg-warning text-light btn btn-dark-light btn-sm px-5 mb-3" style="
font-family:; font-size:15px; border-radius: 10px 10px 10px 10px;
    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 4px 20px 0 rgba(0, 0, 0, 0.19); 
    border-style:solid;
  border-width: 3px;  border-color:	#000;" href='view_student_req.php'> <i class='fa fa-eye'></i> View</a>
                                                        </div>


                                                        <div class="col-1">
                                                            <br>


                                                            <input type="submit" class=" bg-blue text-light btn btn-dark-light btn-sm px-5 mb-3" style="
font-family:; font-size:15px; border-radius: 10px 10px 10px 10px;
    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 4px 20px 0 rgba(0, 0, 0, 0.19); 
    border-style:solid;
  border-width: 3px;  border-color:	#000;" name="<?= $action ?>" value="<?= $btn_value ?>" form="availment-form">
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                    </form>














                                </div>














                            </div>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet" />
</link>

<style>
    .label {
        display: block;

    }

    h1 {
        color: white;
    }

    .holder {
        width: 400px;
        margin: 0 auto;
    }

    .my-checkbox {
        transform: scale(2);
        margin-right: 11px;
    }

    #student-image {
        width: 200px;
        height: 200px;
        opacity: 1;
    }
</style>

<script>
    $(".wew").chosen();
</script>
<script>
    function loaddata() {
        var selectElement = document.getElementById("student-select");
        var selectedStudentId = selectElement.value;

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var responseData = xhr.responseText;
                document.getElementById("loaddata").innerHTML = responseData;
            }
        };
        xhr.open("GET", "loaddata.php?id=" + selectedStudentId, true);
        xhr.send();
    }
</script>

<!-- Display the student's image -->
<!-- <img id="student-image" class="brand-image img-circle elevation-3" style="width:100px; height:100px; opacity:.8;"> -->



<?php include('includes/footer.php'); ?>