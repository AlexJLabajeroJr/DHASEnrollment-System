<?php

session_start();

$page_title = "Index Page";
include('includes/header.php');


include 'db_con.php';


if (isset($_COOKIE['remembered_username'])) {
    $remembered_username = $_COOKIE['remembered_username'];
}

?>

<div class="wrapper">

    <!-- Navbar -->
    <?php include('includes/navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content bg-white">

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
                <div class="row">


                    <div class="col-3">
                        <div class="">
                            <div class="">

                            </div>
                        </div>
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





            
                                <div class="container">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-6 mt-2 mb-5">
                                            <div class="login-box">
                                                <div class="card card-outline card-purple " class=" border border-10 text-light  wow fadeInUp" style="    padding: 15px;
   border-radius: 15px 50px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    text-align: center; border-style: solid;
  border-width: 5px;   ">


                                                    <div class="col-sm-12 text-white ">
                                                        <div>
                                                            <img src="img/log.png" height="75px" class="img-responsive" alt="" />
                                                        </div>

                                                    </div>




                                                    <!-- <div class="col-sm-2 text-purple">
                                                                    </div> -->
                                                    <div class="col-sm-12 text-purple">
                                                        <p style="font-family:Segoe Script; font-size:10px"><b>We care ,We Share!</b></p>
                                                    </div>
                                                    <!-- <div>
                                                                        <img src="img/heart.png" height="30px" />
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                    </div> -->


                                                    <div class="card-header text-center">
                                                        <a href="index.php" style='font-family:Segoe Script ;font-size:40px;'><b>Login</b></a>
                                                    </div>
                                                    <div class="card-body">



                                                        <form method="POST" action="login-action.php">




                                                            <div class="input-group mb-3">
                                                            <input type="email" name="email" placeholder="Email" class = "form-control" value="<?php echo isset($remembered_username) ? $remembered_username : ''; ?>" required>
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text">
                                                                        <span class="fas fa-envelope"></span>
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


                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <div class="icheck-primary">
                                                                    <label for="remember_me">
        <input type="checkbox" name="remember_me" id="remember_me" value="1"> Remember Me
    </label>
                                                                        <p class='text-gray-600'><a href="password-reset.php" class="font-bold" style="color: #1171d1">Forgot your password?</a></p>
                                                                        <label for="agreeTerms">
                                                                            <a href="#">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <!-- /.col -->
                                                                <div class="col-4">
                                                                    <button type="submit" name="login_now_btn" class="btn btn-success btn-block">Sign In</button>
                                                                </div>
                                                                <!-- /.col -->
                                                            </div>





                                                        </form>


                                                        <div class="text-center  text-sm fs-6">
                                                            <p class='text-gray-600'> Did not receive your Email Verification? <a href="resend-email-verification.php" class="font-bold" style="color: #1171d1">Resend</a>.</p>
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



    <?php if (isset($_GET['log'])) : ?>
        <script>
            let timerInterval
            Swal.fire({
                title: 'Logging out!',
                html: 'I will close in <b></b> milliseconds.',
                timer: 300,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })
        </script>
    <?php endif; ?>



    <?php if (isset($_GET['logot'])) : ?>
        <script>
            let timerInterval
            Swal.fire({
                title: 'Logging out!',
                html: 'I will close in <b></b> milliseconds.',
                timer: 300,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })
        </script>
    <?php endif; ?>



    <?php if (isset($_GET['logotot'])) : ?>
        <script>
            let timerInterval
            Swal.fire({
                title: 'Logging out!',
                html: 'I will close in <b></b> milliseconds.',
                timer: 300,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
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