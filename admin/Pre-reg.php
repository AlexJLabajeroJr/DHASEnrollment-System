<?php


include '../db_con.php';
if (isset($_POST['confirm'])) {


    echo $_SESSION['user_id'];
    $user_id = $_SESSION['student_id'];


    $currentyear = date('Y');
    $nextyear =  date('Y') + 1;
    $sy = $currentyear . '-' . $nextyear;
    $_SESSION['SY'] = $sy;



    $student_id = $_POST['student_id'];
    $select = "UPDATE student SET status = 'Approved' WHERE student_id = '$student_id' ";
    $resut = mysqli_query($conn, $select);

    if ($resut) {
        header("Location:Pending.php?Pend=1");
    } else {
        echo error_reporting(E_ALL);
    }


    //                 $sqli = "INSERT INTO `schoolyr`
    //     (`AY`,  `student_id`, `category`, `DATE_RESERVED`, `DATE_ENROLLED`, `STATUS`)
    // VALUES ('" . $_SESSION['SY'] . "',{$user_id},'ENROLLED','" . date('Y-m-d') . "','" . date('Y-m-d') . "','New');";
    //                 $resu = mysqli_query($conn, $sqli);


    //                 if ($resu) {

    //                     header("Location:student_copy.php?");
    //                 } else {
    //                     echo mysql_error();
    //                 }
}




if (isset($_POST['decline'])) {

    // $student_id = $_POST['student_id'];
    // $select = "DELETE  FROM student  WHERE student_id = '$student_id' ";
    // $resut = mysqli_query($conn, $select);
    // header("location:registrar.php");



    $student_id = $_POST['student_id'];
    $select = "UPDATE student SET status = 'Decline' WHERE student_id = '$student_id' ";
    $res = mysqli_query($conn, $select);


    if ($res) {
        header("Location:Pending.php?Pend=1");
    } else {
        echo error_reporting(E_ALL);
    }
}


?>





<!-- ================================================================== -->




<!-- &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

<h1 class="text-center  text-white bg-success col-md-12
">APPROVED LIST </h1>

<table class="table table-bordered col-md-12 text-center">
<thead>
<tr>
<th scope="col">Student_ID</th>
<th scope="col">Name</th>
<th scope="col">Address</th>
<th scope="col">Status</th>
<th scope="col">Contaact_number</th>
<th scope="col">Grade_level</th>


</tr>
</thead>

<?php
$query = "SELECT * FROM  student";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) { ?>


<tbody>
<tr>
<th scope="row"><?php echo $row['student_id']; ?></th>
<td><?php echo $row['first_name']; ?> <?php echo $row['suffix_name']; ?>. <?php echo $row['middle_name']; ?>. <?php echo $row['last_name']; ?></td>
<td><?php echo $row['unit_number']; ?>, <?php echo $row['street']; ?> <?php echo $row['barangay']; ?> <?php echo $row['city']; ?></td>
<td><?php echo $row['status']; ?></td>
<td><?php echo $row['contact_number']; ?></td>
<td><?php echo $row['grade_level']; ?></td>

</tr>
</tbody>

<?php } ?> -->



<!-- 


</div> <!- <div class="col-12 col-lg-3">
<div class="card">
<div class="card-body py-4 px-5">
<div class="d-flex align-items-center">
<div class="avatar avatar-xl">
<img src="assets/images/faces/1.jpg" alt="Face 1">
</div>
<div class="ms-3 name">
<h5 class="font-bold">Admin_cutie</h5>
<h6 class="text-muted mb-0">Alex_igop</h6>
</div>
</div>
</div>
</div>

</div> -->