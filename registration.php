<?php

session_start();

$page_title = "Registration Page";
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

        <!-- Content Header (Page header) -->

        <div class="container " style=" background-image:url('img/el.png'); background-repeat:no-repeat; background-size:100% 100%; ">
            <div class="content-header">
                <div class="container">
                    <div class="row ">
                        <!-- /.col -->



                        <div class="col-sm-4">
                            <h1 style="font-family:Segoe Script; font-size:26px; " class="text-center"><b></b></h1>
                            <p style="font-family:Segoe UI; font-size:18px; " class="text-center"><br><br><br><br></p>
                        </div>
                        <div class="col-sm-4">

                        </div><!-- /.col -->
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="home.php">Call Us:(083)228-9722</a></li>
                                        <li class="breadcrumb-item"><a href="home.php">healingservants@gmail.com</a></li>
                                        <li><a href="home.php">www.healingservants.com</a></li> -->
                                <!-- <li class="breadcrumb-item"><a href="index.php">Login</a></li> -->
                                <!-- <li class="breadcrumb-item active">home</li> -->
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->







            <div class="content">

                <div class=" row">


                    <div class="col-3">
                        <!-- <div class="card">
                                <div class="">

                                </div>
                            </div> -->
                    </div>




                    <div class="col-6">
                        <div class="">
                            <div class="">
                                <br>
                                <?php
                                if (isset($_SESSION['status'])) {
                                ?>
                                    <div class=" alert alert-success">
                                        <h5><?= $_SESSION['status']; ?></h5>
                                    </div>
                                <?php
                                    unset($_SESSION['status']);
                                }
                                ?>

                                <!-- style=" border-radius: 15px 50px;  box-shadow: 0 4px 8px 0 rgba(255, 255, 255), 0 6px 20px 0 rgba(255, 255, 255);
    text-align: center;  " -->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-6 mt-2 mb-5">
                                            <div class="register-box">
                                                <div class="card card-outline card-purple " class=" border border-10 text-light  wow fadeInUp" style="    padding: 15px;
   border-radius: 15px 50px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    text-align: center; border-style: solid;
  border-width: 5px;   ">


                                                    <div class="col-sm-12 text-white ">
                                                        <div>

                                                            <img src="img/log.png" height="75px" class="img-responsive" alt="" />
                                                        </div>

                                                        <div class="col-sm-12 text-purple">
                                                            <p style="font-family:Segoe Script; font-size:10px"><b>We care ,We Share!</b></p>
                                                        </div>

                                                    </div>

                                                    <div class="card-header text-center">
                                                        <a href="index.php" style='font-family:Segoe Script ;font-size:40px;'><b>Register</b></a>
                                                    </div>
                                                    <div class="card-body">



                                                        <form method="POST" action="register-action.php">
                                                            <div class="input-group mb-3">
                                                                <input type="text" name="name" id="name" class="form-control" placeholder="Username" required="">
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text">
                                                                        <span class="fas fa-user"></span>
                                                                    </div>
                                                                </div>

                                                            </div>




                                                            <div class="input-group mb-3">
                                                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text">
                                                                        <span class="fas fa-lock"></span>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="input-group mb-3">
                                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text">
                                                                        <span class="fas fa-envelope"></span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <!-- <div class="icheck-primary">
                                                                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                                                            <label for="agreeTerms">
                                                                                I agree to the <a href="#">terms</a>
                                                                            </label>
                                                                        </div> -->

                                                                    <p class=' text-gray-600 mt-2 text-primary'><a href="index.php" class="font-bold" style="color: #1171d1">I Already have an Account</a></p>
                                                                </div>
                                                                <!-- /.col -->
                                                                <div class="col-4">
                                                                    <button type="submit" name="register_btn" class="btn btn-prima  ry btn-block">Register</button>
                                                                </div>
                                                                <!-- /.col -->
                                                            </div>
                                                        </form>

                                                        <br>
                                                        <div class="text-center  text-sm fs-6">

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


                <div class="col-3">
                    <div class="">
                        <div class="">

                        </div>
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
            <strong>Copyright &copy; <a>2023 DHAS ENROLLMENT SYSTEM | Developed by Alex J. Labajero jr.</a></strong>


        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->




    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>









    <?php if (isset($_GET['EmailAlreadyUsed'])) : ?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Email Address is already used!',
                icon: 'error',
                confirmButtonText: 'Confirm'
            })
        </script>
    <?php endif; ?>




    <?php if (isset($_GET['alreadyUsed'])) : ?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'User Credentials has been used!',
                icon: 'error',
                confirmButtonText: 'Confirm'
            })
        </script>
    <?php endif; ?>


    <?php if (isset($_GET['success'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: '',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    <?php endif; ?>


    <?php if (isset($_GET['faileded'])) : ?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Verification Failed',
                icon: 'error',
                confirmButtonText: 'Confirm'
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