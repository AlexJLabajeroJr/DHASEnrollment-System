<?php
include '../db_con.php';


session_start();
$page_title = "Student Requirements Page";
include('includes/header.php');



if (!isset($_SESSION['registrar_id'])) {
    header("location: ../index.php");
}













if (isset($_POST['add_addons'])) {

    $sertype = $_POST['sertype'];
    $SYID = $_POST['SYID'];
    $GRADE_LEVEL = '';

    // Get the grade level of the selected student
    $query = "SELECT GRAD.GRADE_LEVEL FROM schoolyr AS SCH
              INNER JOIN student AS STUD ON SCH.student_id = STUD.student_id
              INNER JOIN grade_level AS GRAD ON STUD.GRADE_LEVEL_ID = GRAD.GRADE_LEVEL_ID
              WHERE SCH.SYID = $SYID";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $GRADE_LEVEL = $row['GRADE_LEVEL'];

    // Check if all the required student requirements are selected based on the grade level
    if ($GRADE_LEVEL <= 6) {
        // Grade level 1-6 must pass requirements with ID's 35,36,37,38,43,44,45,46
        $required_ids = [35, 36, 37, 38, 43, 44, 45, 46];
        $required_names = [];
        foreach ($required_ids as $req_id) {
            $req_query = "SELECT requirement FROM requirement WHERE requirement_id = $req_id";
            $req_result = mysqli_query($conn, $req_query);
            $req_row = mysqli_fetch_assoc($req_result);
            $required_names[$req_id] = $req_row['requirement'];
        }
        $selected_ids = array_map('intval', $sertype);
        $missing_ids = array_diff($required_ids, $selected_ids);
        if (count($missing_ids) == 0) {
            // Insert the interests into the database
            foreach ($sertype as $sertype) {
                $sqli = "INSERT INTO student_requirements (requirement_id,SYID,status) VALUES ('$sertype', '$SYID','Completed')";
                $des = mysqli_query($conn, $sqli);
                if (!$des) {
                    echo mysqli_error($conn);
                }
            }
            header("Location: view_student_req.php?comp=1");
        } else {
            $required_ids = [35, 36, 37, 38, 43];
            $required_names = [];
            foreach ($required_ids as $req_id) {
                $req_query = "SELECT requirement FROM requirement WHERE requirement_id = $req_id";
                $req_result = mysqli_query($conn, $req_query);
                $req_row = mysqli_fetch_assoc($req_result);
                $required_names[$req_id] = $req_row['requirement'];
            }
            $selected_ids = array_map('intval', $sertype);
            $missing_ids = array_diff($required_ids, $selected_ids);
            if (count($missing_ids) == 0) {
                // Insert the interests into the database
                foreach ($sertype as $sertype) {
                    $sqli = "INSERT INTO student_requirements (requirement_id,SYID,status) VALUES ('$sertype', '$SYID','Completed')";
                    $des = mysqli_query($conn, $sqli);
                    if (!$des) {
                        echo mysqli_error($conn);
                    }
                }
                // header("Location: view_student_req.php?comp=1");
            }

            $missing_names = [];
            foreach ($missing_ids as $missing_id) {
                $missing_names[] = $required_names[$missing_id];
            }
            $missing_text = implode(", ", $missing_names);
            header("Location: view_student_req.php?sadist=1");
        }
    } elseif ($GRADE_LEVEL <= 10) {
        // Grade level 7-10 must pass requirements with ID's 35,36,37,38,43,44,45,46,47
        $required_ids = [35, 36, 37, 38, 43, 44, 45, 46, 47];
        $required_names = [];
        foreach ($required_ids as $req_id) {
            $req_query = "SELECT requirement FROM requirement WHERE requirement_id = $req_id";
            $req_result = mysqli_query($conn, $req_query);
            $req_row = mysqli_fetch_assoc($req_result);
            $required_names[$req_id] = $req_row['requirement'];
        }
        $selected_ids = array_map('intval', $sertype);
        $missing_ids = array_diff($required_ids, $selected_ids);
        if (count($missing_ids) == 0) {
            // Insert the interests into the database
            foreach ($sertype as $sertype) {
                $sqli = "INSERT INTO student_requirements (requirement_id,SYID,status) VALUES ('$sertype', '$SYID','Completed')";
                $des = mysqli_query($conn, $sqli);
                if (!$des) {
                    echo mysqli_error($conn);
                }
            }
            header("Location: view_student_req.php?comp=1");
        } else {
            $required_ids = [35, 36, 37, 38, 43];
            $required_names = [];
            foreach ($required_ids as $req_id) {
                $req_query = "SELECT requirement FROM requirement WHERE requirement_id = $req_id";
                $req_result = mysqli_query($conn, $req_query);
                $req_row = mysqli_fetch_assoc($req_result);
                $required_names[$req_id] = $req_row['requirement'];
            }
            $selected_ids = array_map('intval', $sertype);
            $missing_ids = array_diff($required_ids, $selected_ids);
            if (count($missing_ids) == 0) {
                // Insert the interests into the database
                foreach ($sertype as $sertype) {
                    $sqli = "INSERT INTO student_requirements (requirement_id,SYID,status) VALUES ('$sertype', '$SYID','Completed')";
                    $des = mysqli_query($conn, $sqli);
                    if (!$des) {
                        echo mysqli_error($conn);
                    }
                }
                // header("Location: view_student_req.php?comp=1");
            }

            $missing_names = [];
            foreach ($missing_ids as $missing_id) {
                $missing_names[] = $required_names[$missing_id];
            }
            $missing_text = implode(", ", $missing_names);
            header("Location: view_student_req.php?sadf=1");
        }
    } else {
        $required_ids = [35, 36, 37, 38, 43, 44, 45, 46, 47, 48];
        $required_names = [];
        foreach ($required_ids as $req_id) {
            $req_query = "SELECT requirement FROM requirement WHERE requirement_id = $req_id";
            $req_result = mysqli_query($conn, $req_query);
            $req_row = mysqli_fetch_assoc($req_result);
            $required_names[$req_id] = $req_row['requirement'];
        }
        $selected_ids = array_map('intval', $sertype);
        $missing_ids = array_diff($required_ids, $selected_ids);
        if (count($missing_ids) == 0) {
            // Insert the interests into the database
            foreach ($sertype as $sertype) {
                $sqli = "INSERT INTO student_requirements (requirement_id,SYID,status) VALUES ('$sertype', '$SYID','Completed')";
                $des = mysqli_query($conn, $sqli);
                if (!$des) {
                    echo mysqli_error($conn);
                }
            }
            header("Location: view_student_req.php?comp=1");
        } else {

            $required_ids = [35, 36, 37, 38, 43];
            $required_names = [];
            foreach ($required_ids as $req_id) {
                $req_query = "SELECT requirement FROM requirement WHERE requirement_id = $req_id";
                $req_result = mysqli_query($conn, $req_query);
                $req_row = mysqli_fetch_assoc($req_result);
                $required_names[$req_id] = $req_row['requirement'];
            }
            $selected_ids = array_map('intval', $sertype);
            $missing_ids = array_diff($required_ids, $selected_ids);
            if (count($missing_ids) == 0) {
                // Insert the interests into the database
                foreach ($sertype as $sertype) {
                    $sqli = "INSERT INTO student_requirements (requirement_id,SYID,status) VALUES ('$sertype', '$SYID','Completed')";
                    $des = mysqli_query($conn, $sqli);
                    if (!$des) {
                        echo mysqli_error($conn);
                    }
                }
            }

            $missing_names = [];
            foreach ($missing_ids as $missing_id) {
                $missing_names[] = $required_names[$missing_id];
            }
            $missing_text = implode(", ", $missing_names);
            header("Location: view_student_req.php?sad=1");



?>




            <!-- 
           -->















        <?php





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
        $query .= " WHERE stud_req_id = {$stud_req_id}";
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











$sad = "SELECT * FROM account WHERE account_id = $_SESSION[registrar_id]";
$ako = $conn->query($sad);
$row = $ako->fetch_assoc();


$setIn = "SELECT * FROM account WHERE p_p = '" . $row['p_p'] . "'";
$searchIMResult = $conn->query($setIn);
$searchInResultRow = $searchIMResult->fetch_assoc();





?>


<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet" />
<style>
    .chosen-container-single .chosen-single {
        height: 32px;
        border: darkblue;
        border-radius: 4px;
        background-color: #121;
        color: darkgreen;
        font-size: 18px;
        font-weight: 600;
    }

    .chosen-container-single .chosen-search input[type=text] {
        height: 30px;
        border-radius: 4px;
        border: darkblue;
        box-shadow: darkblue;
    }

    .chosen-container-single .chosen-results {
        max-height: 200px;
        overflow-y: auto;
    }

    .chosen-container-single .chosen-results li {
        font-size: 14px;
        color: #121212;
    }
</style>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>

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

                <!-- 
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
                </div> -->



                <!-- <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a> -->






                <div class="pull-left info">
                    <p style="font-size:15px; font-size:15px;
font-family:Segoe UI;" class="text-light text-bold"><b><?= $_SESSION['auth_user']['username']; ?></b></p>
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
                                <i class="far fa-dot-circle nav-icon"></i>
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
                <div class=" row">


                    <div class="col-12 ml-1 mr-1">
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
                                            <h3 class="bg-light text-center  text-light" style=" font-family:Segoe UI; color:white;">MANAGE STUDENT REQUIREMENTS
                                            </h3>
                                        </div>

                                        <div class="col-sm-2">
                                            <form method="POST"><button type="submit" name="refresh" class="btn btn-secondary btn-sm border border-light  border border-2" style="
font-family:Segoe UI; font-size:15px; border-radius: 15px 15px 15px 15px;
    overflow: hidden;   "><i class="fa fa-refresh" aria-hidden="true"></i> Refresh Page Button</button></form>
                                        </div>
                                    </div>
                                </div>
                                <div>




                                     <form method="post" id="availment-form">
                                        <div class="container-fluid  mb-3">



                                            <div class="row">
                                                <!-- <div class="col-sm-2">
                                                </div> -->
                                                <div class="col-sm-9">

                                                    <?php
                                                    $query = "SELECT * FROM schoolyr AS SCH
INNER JOIN student AS STUD ON SCH.student_id = STUD.student_id
INNER JOIN grade_level AS GRAD ON STUD.GRADE_LEVEL_ID = GRAD.GRADE_LEVEL_ID WHERE enrollment_status = 1 OR  enrollment_status = 2 OR payment_status = 0 OR requirement_status = 0 OR requirement_status = 1  ";

                                                    $result = mysqli_query($conn, $query);
                                                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                                    ?>

                                                    <label class=" mt-3">Select Student Record</label>

                                                    <div class="form-group">
                                                        <select id="student-select" name="SYID" class="wew form-control btn btn-lg " style="" required onchange="loaddata()">
                                                            <option style="font-family:Segoe UI;" value=''>Select Student :</option>
                                                            <?php foreach ($row as $data) : ?>
                                                                <option value="<?= $data['SYID']; ?>">
                                                                <?= $data['first_name']; ?>
<?= $data['last_name']; ?>.
<?= $data['middle_name']; ?>
<?= $data['suffix_name']; ?>. | Grade - <?= $data['GRADE_LEVEL']; ?> |
Strand - <?= $data['strand']; ?>

 | 
<?php
if ($data['requirement_status'] == 0) {
    echo "<B class='badge badge-1 text-light bg-dark border border-1' style='background-color: #; overflow: hidden; border-style: solid; border-width: 3px; border-color: #ffffff;'>For Submission</B>";
}
if ($data['requirement_status'] == 1) {
    echo "<B class='badge badge-1 text-light border border-1' style='background-color: #D21312; overflow: hidden; border-style: solid; border-width: 3px; border-color: #ffffff;'>INCOMPLETE</B>";
}
if ($data['requirement_status'] == 2) {
    echo "<B class='badge badge-1 bg-purple text-light border border-1' style='background-color: #; overflow: hidden; border-style: solid; border-width: 3px; border-color: #ffffff;'>COMPLETE</B>";
}
?>








                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                </div>

                                                <div class="col-sm-9 text-center border border-1  mt-4  mb-2 " style="border-radius: 10px 10px 10px  10px ;  border-width: 2px;">



                                                    <div id="loaddata"></div>
                                                </div>





                                                <div class="col-sm-3 mt-4">
                                                    <label class=" mt-3">List of Requirements</label>

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



                                                            <input type="checkbox" class="my-checkbox ml-2 " name="sertype[]" class="check" id="check2" value="<?php echo $row1['requirement_id']; ?>" />


                                                            <?php echo " $row1[requirement]"; ?><br>


                                                        </div>


                                                    <?php
                                                    }

                                                    // echo "<br><p>Select here the type of Requirements</p>";

                                                    ?>


                                                    <br>

                                                    <br>
                                                    <br>

                                                    <a class=" bg-light text-light btn btn-light btn-sm px-5 mb-3 border border-1" style=" 
                                                                border-style:solid;" href='view_student_req.php'> <i class='fa fa-eye'></i> View Requirements</a>





                                                    <input type="submit" class=" bg-blue text-light btn btn-dark-light btn-sm px-5 mb-3" name="<?= $action ?>" value="<?= $btn_value ?>" form="availment-form">





                                                </div>
















                                            </div>
                                        </div>




                                    </form>














                                </div>





                                <div class="card">


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



<!-- <script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

    })
</script> -->

<script>
    $(".wew").chosen({
        placeholder_text_single: "Select a student"
    });
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



<script>
    $('.toastsDefaultDefault').click(function() {
        $(document).Toasts('create', {
            title: 'Notice',
            body: 'Your Pre-registration request has now been Approved this means you can now have your Enrollment form that was created by the Adminitrator .'
        })
    });
</script>



<?php include('includes/footer.php'); ?>