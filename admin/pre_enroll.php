<?php



session_start();




include '../db_con.php';
include('includes/header.php');

if (!isset($_SESSION['admin_id'])) {
    header("location: ../index.php");
}


if (isset($_POST['refresh'])) {
    header('location:dashboard_admin.php');
}


$emai = $_SESSION['emai'];
$pass = $_SESSION['pass'];



$stud_id = $_GET['student_id'];

$findIfEnroll = "SELECT * from enrollment WHERE student_id = '$stud_id'";
$findIfEnrollresult = mysqli_query($conn, $findIfEnroll);

$findIfEnrollresultrow = mysqli_fetch_assoc($findIfEnrollresult);



// $stat = "SELECT * from student WHERE  status = 'Pending' && student_id = '$_SESSION[student_id]'";
// $des = mysqli_query($conn, $stat);
// $statko = mysqli_fetch_assoc($des);


// $staf = "SELECT * from student WHERE status = 'Approved' && student_id = '$_SESSION[student_id]'";
// $dest = mysqli_query($conn, $staf);
// $statkoyz = mysqli_fetch_assoc($dest);


$sql = "Select * from student where student_id = '$stud_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql = "SELECT count(*) as 'enrollees' FROM student WHERE NewEnrollees = '1' && status = 'Pending'";
$result = $conn->query($sql);
$enrollees = $result->fetch_assoc();





$sql1 = "Select * from enrollment where student_id = '$stud_id'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();


$sqler = "Select * from student as s INNER JOIN grade_level as grad ON s.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID where student_id = '$stud_id'";
$result1 = $conn->query($sqler);
$row3 = $result1->fetch_assoc();






// $supit = $_SESSION['student_id'];
$query = "SELECT * from `student` s, `grade_level` c WHERE s.GRADE_LEVEL_ID=c.GRADE_LEVEL_ID &&student_id = '$stud_id'";
$result = mysqli_query($conn, $query);
$row2 = mysqli_fetch_assoc($result);

$sad = "SELECT * FROM account WHERE account_id = $_SESSION[admin_id]";
$ako = $conn->query($sad);
$rower = $ako->fetch_assoc();

$setIn = "SELECT * FROM account WHERE p_p = '" . $rower['p_p'] . "'";
$searchIMResult = $conn->query($setIn);
$searchInResultRow = $searchIMResult->fetch_assoc();


?>

<script type="text/javascript">
    function toggle_check() {
        var checkboxes = document.getElementsByName('selectedSubjects[]');
        var button = document.getElementById('toggle');

        if (button.value == 'check all') {
            for (var i in checkboxes) {
                checkboxes[i].checked = 'FALSE';
            }
            button.value = 'uncheck all'
        } else {
            for (var i in checkboxes) {
                checkboxes[i].checked = '';
            }
            button.value = 'check all';
        }
    }
</script>

<div class="wrapper">
    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <!-- <nav class="main-header navbar navbar-expand navbar-white navbar-light"> -->
    <!-- Left navbar links -->
    <!-- <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul> -->

    <!-- Right navbar links -->
    <!-- <ul class="navbar-nav ml-auto"> -->
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
    <!-- </a> -->
    <!-- <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li> -->
    <!-- Notifications Dropdown Menu -->
    <!-- <li class="nav-item dropdown">
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
        </ul> -->
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
                        <a href="Pre_registration.php" class="nav-link active ">
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
                        <!-- <a href="logout.php" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a> -->




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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create Enrollment Form</li>
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

                                <div>

                                    <!-- /.card-header -->
                                    <div class="card-body">



                                        <div class="container">
                                            <!-- <h3 class=" text-center  text-dark" style ="font-family:Segoe UI;">Create Student Enrollment Form</h3> -->
                                            <div class="row">

                                                <div class="col-3 d-flex align-items-center">
                                                    <!-- <h4>STUDENT NAME: </h4> -->
                                                    <!-- <p class="mt-2 ml-3" style="font-size: 25px;  text-decoration: underline;"><?= $row['last_name'] . " " . $row['first_name'] . " " . $row['middle_name'] ?></p> -->
                                                </div>
                                                <div class="col-6 mt-3 text-center" style="font-size: 25px;">
                                                    <p style="margin-bottom: 0px;"> <?= $row['last_name'] . " " . $row['first_name'] . ", " . $row['suffix_name'] . ", " . $row['middle_name'] . "."  ?></p>
                                                    <div style="border-bottom: 3px solid black">
                                                    </div>
                                                </div>
                                                <!-- <div class="col-4 text-center">
                                                    <p class="mt-3" style='font-size: 13px'>Date registered: <?= $row1['enrollment_date'] ?></p>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="d-flex">
                                                        <!-- <h5>Reg Status: </h5>
                                                        <div>
                                                            <p class="ml-5" style="margin-bottom: 0px !important;"><?= $row['student_type'] ?></p>
                                                            <div style="border-bottom: 2px solid black; width: 70px; margin-left: 30px !important"></div>
                                                        </div> -->
                                                    </div>



                                                </div>

                                                <div class="col-3 mt-2">


                                                    <div class="d-flex" style="font-family:Segoe UI;">
                                                        <h6>&nbsp&nbsp &nbsp&nbsp&nbspStudent_name</h6>

                                                    </div>



                                                    <div class="d-flex" style="font-family:Segoe UI;">
                                                        <span class="text-muted text-sm"><span class="badge badge- right"><b>Grade</b>- <?= $row3['GRADE_LEVEL'] . "" ?></span><b> | </b> <span class="badge badge- right"> <b>Strand</b>- <?= $row['strand'] . "" ?></span> <b> | </b> <span class="badge badge- right"> <b>Type</b> - <?= $row['student_type'] . "" ?></span>
                                                    </div>


                                                    <br>
                                                    <div class="col-sm-12">

                                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="badge badge-info right">Student Subject</span>

                                                    </div>




                                                </div>


















                                                <?php

                                                $sql = "Select * from student where status = 'Approved' &&  student_id = '$stud_id'";
                                                $result = $conn->query($sql);
                                                if (mysqli_num_rows($result) > 0) {

                                                    $Display = True;

                                                    if ($Display) {

                                                        echo "<div class  = 'container-fluid ' >";
                                                        echo "<div class  = 'row' >";
                                                        echo "<div class  = 'col-sm-11' >";
                                                        echo '<p>&nbsp</>';
                                                        echo "</div>";



                                                        echo "<div class  = 'col-sm-1' >";
                                                        if ($findIfEnrollresultrow == null) {

                                                            echo '<input type="button" id="toggle"class="btn btn-light btn btn-xs border border-secondary" value="check all" onclick="toggle_check()">';
                                                        }
                                                        echo "</div>";
                                                        echo "</div>";
                                                        echo "</div>";


                                                ?>


                                                        <div class="table-responsive ">
                                                            <form action="enroll_process.php?student_id=<?php echo $stud_id; ?>" method="post">

                                                                <table class="table table-striped ">
                                                                    <thead>

                                                                        <th> Subject_Description </th>
                                                                        <th> Subject_code </th>
                                                                        <th> Room </th>
                                                                        <th> Grade_level </th>
                                                                        <th> Start_time </th>
                                                                        <th> End_time </th>
                                                                        <th> Day </th>

                                                                        <?php
                                                                        if ($findIfEnrollresultrow == null) {
                                                                            echo '<th> Enroll_subject </th>';
                                                                        }
                                                                        echo '</tr>';
                                                                        ?>
                                                                    </thead>

                                                                    <tbody class="text-center">
                                                                        <?php
                                                                        $stud_id = $_GET['student_id'];
                                                                        $query = "SELECT GRADE_LEVEL_ID from student WHERE student_id = '$stud_id';";
                                                                        $result = mysqli_query($conn, $query);

                                                                        $row = mysqli_fetch_assoc($result);
                                                                        $GRADE_LEVEL_ID =  $row['GRADE_LEVEL_ID'];


                                                                        // echo $_SESSION['user_id'];




                                                                        $getSched = mysqli_query($conn, "SELECT * FROM `subject` as subj  INNER JOIN schedule as sched ON sched.subject_id = subj.subject_id INNER JOIN room as r ON sched.room_id = r.room_id  INNER JOIN grade_level as v ON sched.GRADE_LEVEL_ID= v.GRADE_LEVEL_ID ");

                                                                        $getSem = mysqli_query($conn, "SELECT * FROM `tblsemester` WHERE SETSEM = 1");

                                                                        $sem = mysqli_fetch_assoc($getSem)['SEMESTER'];


                                                                        while ($row = mysqli_fetch_assoc($getSched)) {
                                                                            if ($row['GRADE_LEVEL_ID'] == $GRADE_LEVEL_ID) {

                                                                                if ($row['sched_semester'] == $sem or $row['sched_semester'] == 'Quarter') {

                                                                                    echo '<tr>';

                                                                                    echo '<td>' . $row['subject_description'] . '</td>';
                                                                                    echo '<td>' . $row['subject_code'] . '</td>';
                                                                                    echo '<td>' . $row['room_name'] . '</td>';
                                                                                    echo '<td>' . $row['GRADE_LEVEL'] . '</td>';
                                                                                    // echo '<td>'.$row['faculty_fname'].'</td>';
                                                                                    // echo '<td>'.$row['faculty_lname'].'</td>';
                                                                                    echo '<td>' . date("g:iA", strtotime($row['start_time'])) . '</td>';
                                                                                    echo '<td>' . date("g:iA", strtotime($row['end_time'])) . '</td>';
                                                                                    echo '<td>' . $row['day'] . '</td>';

                                                                                    if ($findIfEnrollresultrow == '') {
                                                                                        echo '<td><input type="checkbox" name="selectedSubjects[]" value="' . $row['subject_id'] . '"/></td>';
                                                                                    }
                                                                                    echo '</tr>';
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>

                                                                    </tbody>



                                                                </table>
                                                                <br>









                                                                <div class="text-right">
                                                                    <?php
                                                                    if ($findIfEnrollresultrow == '') {

                                                                        echo '<input type="submit" class="btn btn-success btn-sm" value="Enroll Subjects" />';
                                                                    }

                                                                    ?>
                                                                </div>




                                                            </form>
                                                        </div>

                                                <?php
                                                    }
                                                }

                                                ?>



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