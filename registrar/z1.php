<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Toast Notification | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome CDN link for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="script.js" defer></script>
</head>

<body>
    <ul class="notifications"></ul>
    <div class="buttons">
        <button class="btn" id="success">Success</button>
        <button class="btn" id="error">Error</button>
        <button class="btn" id="warning">Warning</button>
        <button class="btn" id="info">Info</button>
    </div>







    <style>
        /* Import Google font - Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --dark: #34495E;
            --light: #ffffff;
            --success: #0ABF30;
            --error: #E24D4C;
            --warning: #E9BD0C;
            --info: #3498DB;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: var(--dark);
        }

        .notifications {
            position: fixed;
            top: 30px;
            right: 20px;
        }

        .notifications :where(.toast, .column) {
            display: flex;
            align-items: center;
        }

        .notifications .toast {
            width: 400px;
            position: relative;
            overflow: hidden;
            list-style: none;
            border-radius: 4px;
            padding: 16px 17px;
            margin-bottom: 10px;
            background: var(--light);
            justify-content: space-between;
            animation: show_toast 0.3s ease forwards;
        }

        @keyframes show_toast {
            0% {
                transform: translateX(100%);
            }

            40% {
                transform: translateX(-5%);
            }

            80% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-10px);
            }
        }

        .notifications .toast.hide {
            animation: hide_toast 0.3s ease forwards;
        }

        @keyframes hide_toast {
            0% {
                transform: translateX(-10px);
            }

            40% {
                transform: translateX(0%);
            }

            80% {
                transform: translateX(-5%);
            }

            100% {
                transform: translateX(calc(100% + 20px));
            }
        }

        .toast::before {
            position: absolute;
            content: "";
            height: 3px;
            width: 100%;
            bottom: 0px;
            left: 0px;
            animation: progress 5s linear forwards;
        }

        @keyframes progress {
            100% {
                width: 0%;
            }
        }

        .toast.success::before,
        .btn#success {
            background: var(--success);
        }

        .toast.error::before,
        .btn#error {
            background: var(--error);
        }

        .toast.warning::before,
        .btn#warning {
            background: var(--warning);
        }

        .toast.info::before,
        .btn#info {
            background: var(--info);
        }

        .toast .column i {
            font-size: 1.75rem;
        }

        .toast.success .column i {
            color: var(--success);
        }

        .toast.error .column i {
            color: var(--error);
        }

        .toast.warning .column i {
            color: var(--warning);
        }

        .toast.info .column i {
            color: var(--info);
        }

        .toast .column span {
            font-size: 1.07rem;
            margin-left: 12px;
        }
    </style>


    <script>
        const notifications = document.querySelector(".notifications"),
            buttons = document.querySelectorAll(".buttons .btn");
        // Object containing details for different types of toasts
        const toastDetails = {
            timer: 5000,
            success: {
                icon: 'fa-circle-check',
                text: 'Success: This is a success toast.',
            },
            error: {
                icon: 'fa-circle-xmark',
                text: 'Error: This is an error toast.',
            },
            warning: {
                icon: 'fa-triangle-exclamation',
                text: 'Warning: This is a warning toast.',
            },
            info: {
                icon: 'fa-circle-info',
                text: 'Info: This is an information toast.',
            }
        }
        const removeToast = (toast) => {
            toast.classList.add("hide");
            if (toast.timeoutId) clearTimeout(toast.timeoutId); // Clearing the timeout for the toast
            setTimeout(() => toast.remove(), 500); // Removing the toast after 500ms
        }
        const createToast = (id) => {
            // Getting the icon and text for the toast based on the id passed
            const {
                icon,
                text
            } = toastDetails[id];
            const toast = document.createElement("li"); // Creating a new 'li' element for the toast
            toast.className = `toast ${id}`; // Setting the classes for the toast
            // Setting the inner HTML for the toast
            toast.innerHTML = `<div class="column">
    <i class="fa-solid ${icon}"></i>
    <span>${text}</span>
</div>
<i class="fa-solid fa-xmark" onclick="removeToast(this.parentElement)"></i>`;
            notifications.appendChild(toast); // Append the toast to the notification ul
            // Setting a timeout to remove the toast after the specified duration
            toast.timeoutId = setTimeout(() => removeToast(toast), toastDetails.timer);
        }
        // Adding a click event listener to each button to create a toast when clicked
        buttons.forEach(btn => {
            btn.addEventListener("click", () => createToast(btn.id));
        });
    </script>








</body>

























$query = "SELECT * FROM `schoolyr` s, student c WHERE s.student_id=c.student_id AND enrollment_status = 1 ORDER BY SYID ASC";
$result1 = mysqli_query($conn, $query);


$row = mysqli_fetch_assoc($result1);

$SYID = $row['SYID'];


$query = "SELECT * FROM schoolyr WHERE SYID = $SYID";
$resulter = mysqli_query($conn, $query);


$rowe = mysqli_fetch_assoc($resulter);

$student_id = $rowe['student_id'];


$query2 = "SELECT * FROM student WHERE student_id = $student_id";
$result2 = mysqli_query($conn, $query2);


$rowel = mysqli_fetch_assoc($resulter);

$GRADE_LEVEL_ID = $rowel['GRADE_LEVEL_ID'];


$query4 = "SELECT GRADE_LEVEL FROM grade_level WHERE GRADE_LEVEL_ID = $GRADE_LEVEL_ID ";
$result = mysqli_query($conn, $query4);






























<?php
include '../db_con.php';


session_start();
// ob_start();
$page_title = "Profile Page";
include('includes/header.php');

if (!isset($_SESSION['registrar_id'])) {
    header("location: ../index.php");
}


if (isset($_POST['refresh'])) {
    header('location:profile.php');
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



if (isset($row['p_p'])) {
    $setIn = "SELECT * FROM account WHERE p_p = '" . $row['p_p'] . "'";
    $searchIMResult = $conn->query($setIn);
    $searchInResultRow = $searchIMResult->fetch_assoc();
} else {
    // Handle the error condition when 'p_p' key is not defined in $row array.
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
                    <img src="<?php echo $searchInResultRow['p_p']; ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
                </div>









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

                <li class="nav-item">
                    <a href="#" class="nav-link  text-light">
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


                        <p>Archieve</p>
                    </a>




                </li>



                <li class="nav-item">
                    <a href="profile.php" class="nav-link active text-light">
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


        <div class="card container" style="background-image:url('../img/saddd.png'); background-position:top right; background-repeat:no-repeat; overflow:hidden; box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19); text-align:left;">
            <br>
            <div class="text-center" style="font-family:Segoe Script;font-size:30px;">
                <a href="#" class="">
                    <i class="fas fa-user"></i><b>My Profile</b>
                </a>
            </div>
            <br>

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column  mb-3 " style="background-image:url('../img/as.png');   background-repeat:no-repeat;  border-radius: 10px;text-align:center;  overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);">
                            <div class="card bg-lightblue d-flex flex-fill mt-3 ml-1 mr-1  " style=" border-style:inset;
  border-width: 5px;  border-color:#ffff ">
                                <!-- style=" border-radius: 250px 10px 100px 10px;" -->

                                <br>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12 text-center ">

                                            <div class="profile-photo">
                                                <img src="<?php echo $searchInResultRow['p_p']; ?>" class="brand-image img-circle elevation-3" style="width: 150px ; height:150px;opacity: .8 ; 
    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19); 
    border-style:inset;
  border-width: 5px;  border-color:#01ff70">

                                                <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil bg-warning"></i></a>



                                                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">




                                                            <form action="../quer/updateimage.php?account_id=<?php echo $searchInResultRow['account_id']; ?>" method="POST" enctype="multipart/form-data">

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
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">



                                            <h3 class=" text-center h3 " style="font-family:Segoe Script;"><b><?= $row['name'] . " "  ?></b></h3>
                                            <p class="bg-olive   border-bottom-0 border border-6 text-center text-muted font-14 d-hide" style="border-style:dotted;"><b><?= $row['email'] . " "  ?></b><br class="text-bold"><?= $row['role'] . " "  ?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>






                        <div class="col-8 col-sm-8 col-md-8 d-flex align-items-stretch flex-column ">
                            <div class="card-box height-50-p overflow-hidden">
                                <div class="profile-tab height-100-p border-top-0">
                                    <div class="tab height-100-p">
                                        <ul class="nav nav-tabs customtab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link " data-toggle="tab" href="#setting" role="tab" aria-selected="false">Edit Personal Informations</a>
                                                <!-- <h4 class="text-blue h5 mb-20"></h4> -->
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <!-- Setting Tab start -->
                                            <div class="tab-pane fade active show height-25-p" id="setting" role="tabpanel">
                                                <div class="profile-setting">

                                                    <BR>

                                                    <form id="profileEdit" method="POST">
                                                        <ul class="profile-edit-list row pb-0">
                                                            <li class="weight-500 col-md-6">


                                                                <div class="form-group">
                                                                    <label style="font-family:Segoe UI">Email Account:</label>
                                                                    <input class="form-control form-control-lg" name="email" type="email">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Password:</label>
                                                                    <input class="form-control form-control-lg" name="password" type="password">
                                                                </div>


                                                                <div class="form-group mb-0">
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



                                                            </li>
                                                            <li class=" col-md-6 mb-3">

                                                                <div class="form-group mb-3">
                                                                    <label>Username </label>
                                                                    <input class="form-control form-control-lg" name="name" type="text">
                                                                </div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                            </li>
                                                        </ul>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>

                                        <!-- Setting Tab End -->
                                    </div>
                                </div>
                            </div>
                        </div>







                        <!-- <div class="col-12 col-sm-6 col-md-8 d-flex align-items-stretch flex-column">

                        <div class="card card-purple">
                            <div class="card-header">
                                <h3 class="card-title"></h3>`    Vwada
                            </div>DAW
                       /.card-header -->
                        <!-- form start -->
                        <!-- <form class="tab-wizard2 wizard-circle wizard" action="../picko/p_p.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="form-control-file form-control height-auto" accept="image/*" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                /.card-body -->

                        <!-- <div class="card-footer">
                            <button type="submit" class="btn btn-primary " name="jobSeekerSubmitBtn">Submit</button>
                        </div>
                    </form> -->
                        <!-- </div> 

            </div>  -->
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>


</div>
















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
            url: "../quer/updateregistrarInfo.php",
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