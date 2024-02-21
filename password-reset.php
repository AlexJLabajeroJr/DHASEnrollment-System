<?php

session_start();

$page_title = "Home Page";
include('includes/header.php');



include 'db_con.php';


?>




<div class="wrapper">

    <!-- Navbar -->
    <?php include('includes/navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row ">
                        <!-- /.col -->


                        <div class="col-sm-4">
                            <h1 style="font-family:Times New Roman; font-size:20px; " class="text-center">"EDUCARE EST SANARE"</h1>
                            <p style="font-family:Times New Roman; font-size:10px; " class="text-center">"EDUCARE EST SANARE"</p>
                        </div>
                        <div class="col-sm-4">
                            <h1 style="font-family:Segoe Script; font-size:20px; " class="text-center"><b>"EDUCARE EST SANARE"</b></h1>
                            <p style="font-family:Times New Roman; font-size:10px; " class="text-center">"To Educate is to Heal"</p>
                        </div><!-- /.col -->
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Call Us:(083)228-9722</a></li>
                                <li class="breadcrumb-item"><a href="home.php">healingservants@gmail.com</a></li>
                                <li><a href="home.php">www.healingservants.com</a></li>
                                <!-- <li class="breadcrumb-item"><a href="index.php">Login</a></li> -->
                                <!-- <li class="breadcrumb-item active">home</li> -->
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->







            <div class="content">
                <div class="container mt-3 mb-3" class=" container-fluid py-5 bg-dark " style=" background-image:url('img/el.jpg'); background-repeat:no-repeat; ">
                    <div class="row">


                        <div class="col-sm-3">
                            <div class="">
                                <div class="">

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="">
                                <div class="">

                                    <br>
                                    <?php
                                    if (isset($_SESSION['status'])) {
                                    ?>
                                        <div class="alert alert-success">
                                            <h5><?= $_SESSION['status']; ?></h5>
                                        </div>
                                    <?php
                                        unset($_SESSION['status']);
                                    }
                                    ?>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-2"></div>
                                            <div class="col-6 mt-2 mb-5">
                                                <div class="login-box">
                                                    <div class="card" class=" border border-10 text-light " style="   background:;  padding: 15px;
   border-radius: 15px 50px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    text-align: center;  ">

                                                        <div class="col-sm-12 text-white ">
                                                            <div>
                                                                <img src="img/log.png" height="75px" class="img-responsive" alt="" />
                                                            </div>

                                                        </div>

                                                        <div class="card-header text-center">
                                                            <a href="password-reset.php" class="h3" style='font-family:Segoe UI'><b>Reset Password</b></a>
                                                        </div>
                                                        <div class="card-body">


                                                            <form action="password-reset-code.php" method="POST">



                                                                <div class="input-group mb-3">


                                                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas fa-envelope"></span>
                                                                        </div>
                                                                    </div>






                                                                </div>



                                                                <div class="row">

                                                                    <!-- /.col -->
                                                                    <div class="col-12">
                                                                        <button name="password_reset_link" type="submit" class="btn btn-success btn-block">Reset Password</button>
                                                                    </div>
                                                                    <!-- /.col -->
                                                                </div>





                                                            </form>


                                                            <br>

                                                            <div class="text-center  text-sm fs-6">
                                                                <p class='text-gray-600'>Already have an account? <a href="index.php" class="font-bold" style="color: #1171d1">Log
                                                                        in</a>.</p>
                                                            </div>





                                                        </div>
                                                        <!-- /.form-box -->
                                                    </div><!-- /.card -->
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-4">

                                    </div>

                                </div>






                            </div>
                        </div>
                    </div>


                    <div class="col-sm-3">
                        <!-- <div class="card">
                            <div class="">

                            </div>
                        </div> -->
                    </div>


                </div>
            </div>








        </div>






























        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">

            </div>
            <!-- Default to the left -->
            <strong> &copy; Divine Healer Academy of Sorsogon </strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- check -->
    <?php if (isset($_GET['verified'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Your Account has been Verified Successfully!',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    <?php endif; ?>









    <?php if (isset($_GET['faileded'])) : ?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Registration Failed!',
                icon: 'error',
                confirmButtonText: 'Confirm'
            })
        </script>
    <?php endif; ?>



    <?php if (isset($_GET['EmailAlready'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Email Already Verified. Please Login!',
                showConfirmButton: false,
                timer: 6000
            })
        </script>
    <?php endif; ?>











    <!-- check -->

    <?php if (isset($_GET['notexist'])) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'This Token does not Exists',
                footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>



    <?php endif; ?>

    <?php if (isset($_GET['notallowed'])) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Not allowed!',
                footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    <?php endif; ?>



    <style>
        .card {
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
            transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
            padding: 14px 80px 18px 36px;
            cursor: pointer;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
        }

        .card h3 {
            font-weight: 600;
        }
    </style>





    <?php include('includes/footer.php'); ?>