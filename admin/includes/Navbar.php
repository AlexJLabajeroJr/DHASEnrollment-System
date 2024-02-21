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
            <a href="Pre_registration.php" class="nav-link active">
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


        <!-- <li class="nav-item">
            <a href="logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>




        </li> -->


    </ul>
</nav>