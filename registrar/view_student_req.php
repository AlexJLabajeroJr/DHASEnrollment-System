<?php
include '../db_con.php';


session_start();

include('includes/header.php');
$page_title = "View Student Requirements Page";




if (!isset($_SESSION['registrar_id'])) {
    header("location: ../index.php");
}









if (isset($_POST['add_addons'])) {

    $sertype = $_POST['sertype'];
    $_SESSION['SYID'] = $_POST['SYID'];
    print_r($sertype);

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
                    title: 'Successfully Added!'
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
                    title: 'Successfully Deleted!'
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
                    title: 'Successfully Updated!'
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
                    <?= $row['name'] ?>
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
font-family:Segoe Script;" class="text-dark text-bold"><b> Hello! <?= $row['name'] ?></b></p>
                                    <p style="font-size:15px">Registrar</p>
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




                <li class="nav-item ">
                    <a href="" class="nav-link text-light" style="font-size:14px;">
                        <i class=""></i>
                        <p>
                            &nbsp &nbsp &nbspMAIN NAVIGATION
                            <!-- <i ></i>   class="right fas fa-angle-left" -->
                        </p>
                    </a>

                </li>


                <li class="nav-item ">
                    <a href="registrar.php" class="nav-link  text-light">
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

                <li class="nav-item">
                    <a href="#" class="nav-link  active text-light">
                        <i class="nav-icon fas fa-book text-light"></i>
                        <p>
                            Requirements
                            <i class="fas fa-angle-left right text-light"></i>
                            <span class="badge badge-info right text-light">New</span>
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








        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">

                    <div class="container-fluid mt-3 mb-3">
                        <div class="row">
                            <div class="col-sm-10">
                                <h3 class="bg-light  text-center  text-light" style="  font-family:Segoe UI; color:white;">LIST OF STUDENT REQUIREMENT<b class="text-orange" style="font-family:Segoe UI;"><i> </b><b></b></i></b></h3>
                            </div>
                            <div class="col-sm-2">

                                <a class="btn btn-light btn-xs border border-2" style="
font-family:Segoe UI; font-size:15px; " href='student_requirement.php'> <i class='fa fa-arrow-left'></i>&nbspBack &nbsp</a>
                            </div>

                            <!-- <div class="col-sm-2">
                                            <form method="POST"><button type="submit" name="refresh" class="btn btn-secondary">Refresh Page Button</button></form>
                                        </div> -->
                        </div>
                    </div>
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
                        <div class="col-12 col-md-12 col-lg-9 order-2 order-md-1">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-gray border border-1 active " disabled>
                                        <div class="info-box-content">


                                            <a href="student_requirement.php" class="btn btn-gray float-end text-light" class="btn btn-success btn-sm" style="
font-family:Segoe UI; font-size:15px; border-radius: 15px 15px 15px 15px;
   "> <i class="fa fa-plus" aria-hidden="true"></i><B>ADD REQUIREMENTS</B></a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 ">
                                    <div class="info-box text-light" style="background-color:#070A52;">
                                        <div class="info-box-content text-light ">

                                            <a href="enrollment_status.php" class="text-center text-light" style=" font-family:Segoe UI; color:white;">
                                                <b>MARK AS COMPLETE / INCOMPLETE</b>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box text-light" style="background-color:#BFDB38;">
                                        <div class="info-box-content text-center">
                                            <a href="summary.php" class="text-center text-light" style=" font-family:Segoe UI; color:white;">
                                                <b>INCOMPLETE COMPLETE REQUIREMENTS</b>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">



                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead class="text-center" style="background-color:#EEEEEE">
                                            <tr>
                                                <th scope="col">Student_Requirements_ID</th>
                                                <th scope="col">IMG</th>
                                                <th scope="col">student_name</th>
                                                <th scope="col">Grade_level</th>
                                                <th scope="col">Requirements</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="text-center">

                                            <?php
                                            $query = "SELECT * FROM student_requirements";
                                            $result = mysqli_query($conn, $query);


                                            if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {

                                                    $query1 = "SELECT student_id FROM schoolyr WHERE  SYID = $row[SYID]  ";
                                                    $result1 = mysqli_query($conn, $query1);
                                                    $row1 = mysqli_fetch_assoc($result1);


                                                    $query2 = "SELECT * FROM student WHERE student_id =  $row1[student_id] ";
                                                    $result2 = mysqli_query($conn, $query2);
                                                    $row2 = mysqli_fetch_assoc($result2);


                                                    $query3 = "SELECT requirement FROM requirement WHERE requirement_id =  $row[requirement_id] ";
                                                    $result3 = mysqli_query($conn, $query3);
                                                    $row3 = mysqli_fetch_assoc($result3);


                                                    $query4 = "SELECT GRADE_LEVEL FROM grade_level WHERE GRADE_LEVEL_ID =  $row2[GRADE_LEVEL_ID] ";
                                                    $result4 = mysqli_query($conn, $query4);
                                                    $row4 = mysqli_fetch_assoc($result4);

                                                    echo "<tr>";
                                                    echo "<td>$row[stud_req_id]</td>";
                                                    echo '<td><img src="' . $row2['p_p'] . '" style=" width="40" height="40" opacity: .8" ></td>';
                                                    echo "<td>$row2[first_name] $row2[last_name]$row2[middle_name] $row2[suffix_name] </td>";
                                                    echo "<td>$row4[GRADE_LEVEL]</td>";
                                                    echo "<td>$row3[requirement]</td>";

                                                    echo "<td><a class='btn btn-info btn-xs' href='student_requirement.php?stud_req_id=" . $row['stud_req_id'] . "&edit=1'><i class='fas fa-edit'></i>Edit</a>  <a  class='btn btn-danger btn-xs' href='view_student_req.php?stud_req_id=" . $row['stud_req_id'] . "&delete=1'> <i class='fas fa-trash'></i> Delete</a></td>";


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
                        <div class="col-12 col-md-12 col-lg-3 order-1 order-md-2">
                            <!-- <h3 class="text-primary"><i class="fas fa-paint-brush"></i> AdminLTE v3</h3>
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
                            </div> -->







                            <div class="col-12">
                                <div class="card">




                                    <div class="col-sm-12">
                                        <div class="card card-outline card-purple">
                                            <div class="card-header">
                                                <h3 class="card-title">LIST OF REQUIREMENTS</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <div class="container mt-2">

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <!-- <th>Class Category</th> -->
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th>Applied all levels</th>
                                                                        <td>
                                                                            <p class="mb-0">PSA Birthcertificate</p>
                                                                            <p class="mb-0">Baptismal</p>
                                                                            <p class="mb-0">DSWD Card</p>
                                                                            <p class="mb-0">Medical Record</p>
                                                                            <p class="mb-0">4pc 2x2 picture</p>
                                                                            <p class="mb-0">Entrance Examination</p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            <p>Additional Requirements</p>
                                                                            <p class="mt-4">Elementary</p>
                                                                        </th>
                                                                        <td>
                                                                            <p class="mb-0 mt-5">Good Moral</p>
                                                                            <p class="mb-0">Form 137</p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            <p class="mt-2">Junior High School</p>
                                                                        </th>
                                                                        <td>
                                                                            <p class="mb-0 ">Good Moral</p>
                                                                            <p class="mb-0">Form 137</p>
                                                                            <p class="mb-0">Barangay Clearance Certificate</p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            <p class="mt-2">Senior High School</p>
                                                                        </th>
                                                                        <td>
                                                                            <p class="mb-0 ">Good Moral</p>
                                                                            <p class="mb-0">Form 137</p>
                                                                            <p class="mb-0">Barangay Clearance Certificate</p>
                                                                            <p class="mb-0">Permanent Record (SF10)</p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>







                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>






                                </div>

                            </div>




                            <!-- 
                            <php
                            // Query to get all students with their corresponding completion status
                            $query = "SELECT SCH.SYID, STUD.student_id, STUD.first_name, STUD.last_name, GRAD.GRADE_LEVEL,
    COUNT(CASE WHEN SR.requirement_id IN (35,36,37,38,43,44,45,46) THEN 1 END) AS required_count,
    COUNT(CASE WHEN SR.requirement_id IN (47,48) THEN 1 END) AS optional_count,
    COUNT(SR.requirement_id) AS total_count
    FROM schoolyr AS SCH
    INNER JOIN student AS STUD ON SCH.student_id = STUD.student_id
    INNER JOIN grade_level AS GRAD ON STUD.GRADE_LEVEL_ID = GRAD.GRADE_LEVEL_ID
    LEFT JOIN student_requirements AS SR ON SCH.SYID = SR.SYID AND SR.status = 'Completed' AND SCH.enrollment_status = '2'
    GROUP BY SCH.SYID, STUD.student_id, STUD.first_name, STUD.last_name, GRAD.GRADE_LEVEL";

                            // Execute the query and store the result set
                            $result = mysqli_query($conn, $query);

                            // Check if there are any results
                            if (mysqli_num_rows($result) > 0) {
                                // Start the table and display the header row
                                echo "<table><tr><th>SYID</th><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Grade Level</th><th>Required Count</th><th>Optional Count</th><th>Total Count</th><th>Status</th></tr>";

                                // Loop through each row in the result set
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Determine the completion status of the student
                                    $status = 'Incomplete';
                                    if ($row['total_count'] == $row['required_count'] + $row['optional_count']) {
                                        $status = 'Complete';
                                    }

                                    // Display the row for the student in the table
                                    echo "<tr><td>{$row['SYID']}</td><td>{$row['student_id']}</td><td>{$row['first_name']}</td><td>{$row['last_name']}</td><td>{$row['GRADE_LEVEL']}</td><td>{$row['required_count']}</td><td>{$row['optional_count']}</td><td>{$row['total_count']}</td><td>$status</td></tr>";
                                }

                                // End the table
                                echo "</table>";
                            } else {
                                // Display a message if there are no results
                                echo "No students found.";
                            }
                            ?>



 -->








                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

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

    .checkbox {
        position: relative;
        display: block;
        width: 100%;
        height: 60px;
        background: #E0DCDC;
        overflow: hidden;
    }

    .checkbox:not(:last-child) {
        border-bottom: 2px solid white;
    }

    .check {
        width: 30px;
        height: 30px;
        position: absolute;
        opacity: 0;
    }

    .label span {
        position: absolute;
        margin-top: 15px;
    }

    .path1 {
        stroke-dasharray: 400;
        stroke-dashoffset: 400;
        transition: .5s all;
    }

    .path2 {
        stroke-dasharray: 1800;
        stroke-dashoffset: 1800;
        transition: .5s all;
    }

    .check:checked+label svg g path {
        stroke-dashoffset: 0;
    }
</style>



<?php include('includes/footer.php'); ?>