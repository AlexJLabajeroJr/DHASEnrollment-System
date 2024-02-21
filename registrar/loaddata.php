<?php
include '../db_con.php';

// Get the selected student's ID from the request parameter
$id = isset($_GET['id']) ? $_GET['id'] : null;

// If the ID is not provided or not valid, return an error message
if (!$id || !is_numeric($id)) {
  // echo "<B class = 'alert alert-warning' style = 'color:white; background-color:#E21818'>Error: Invalid student ID</B>";
  echo "<img src='../img/gf.png' height='200px' />";
  echo "<br>";
  echo "<div class = 'badge badge-danger'>INVALID STUDENT_ID</div>";
  exit;
}

// Query the database for the student record
$query = "SELECT * FROM schoolyr AS SCH
          INNER JOIN student AS STUD ON SCH.student_id = STUD.student_id
          INNER JOIN grade_level AS GRAD ON STUD.GRADE_LEVEL_ID = GRAD.GRADE_LEVEL_ID
          WHERE SCH.SYID = $id";

$result = mysqli_query($conn, $query);

// If the query fails or no record is found, return an error message
if (!$result || mysqli_num_rows($result) == 0) {
  echo "<B class = 'badge badge-warning' style = 'background-color:#F0BB62'>Student Record not found!</B>";
  exit;
}

$row = mysqli_fetch_assoc($result);
$student_id = $row['student_id'];

// Query the database for the student's image data
$query = "SELECT p_p FROM student WHERE student_id = $student_id";
$resulter = mysqli_query($conn, $query);

// If the query fails or no record is found, return an error message
if (!$resulter || mysqli_num_rows($resulter) == 0) {
  echo "<img src='../img/FG.png' height='200px' />";
  echo "<br>";
  echo "<br>";
  exit;
}

$rowa = mysqli_fetch_assoc($resulter);
$imageData = $rowa['p_p'];

// Display the image in an HTML img tag
$querying = "SELECT * FROM student as stud INNER JOIN grade_level as grad ON grad.GRADE_LEVEL_ID = stud.GRADE_LEVEL_ID  WHERE student_id = $student_id";
$resultero = mysqli_query($conn, $querying);
$rowad = mysqli_fetch_assoc($resultero);


// $queryinger = "SELECT GRADE_LEVEL_ID FROM student as stud INNER JOIN grade_level as grad ON stud.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID WHERE student_id =  $rowad[student_id]";
// $stmt = mysqli_query($conn, $queryinger);
// $rowado =  mysqli_fetch_assoc($stmt);



// $queryer = "SELECT * FROM schoolyr  WHERE student_id = $student_id";
// $resultero = mysqli_query($conn, $queryer);
// $rowader = mysqli_fetch_assoc($resulter);
// $stud_id = $rowader['student_id'];




// $query1 = "SELECT student_id FROM schoolyr WHERE  SYID = $row[SYID] ";
// $result1 = mysqli_query($conn, $query1);
// $row1 = mysqli_fetch_assoc($result1);

// $query2 = "SELECT * FROM student WHERE student_id =  $row1[student_id] ";
// $result2 = mysqli_query($conn, $query2);
// $row2 = mysqli_fetch_assoc($result2);



// $query4 = "SELECT GRADE_LEVEL FROM grade_level WHERE GRADE_LEVEL_ID =  $row2[GRADE_LEVEL_ID] ";
// $result4 = mysqli_query($conn, $query4);
// $row4 = mysqli_fetch_assoc($result4);


$queryingt = "SELECT * 
FROM student as stud 
INNER JOIN grade_level as grad ON grad.GRADE_LEVEL_ID = stud.GRADE_LEVEL_ID  
WHERE stud.GRADE_lEVEL_ID IN (11, 14, 15, 16, 17, 18) 
AND student_id = $student_id
";
$resulterot = mysqli_query($conn, $queryingt);
$rowadt = mysqli_fetch_assoc($resulterot);



$queryingtot = "SELECT * 
FROM student as stud 
INNER JOIN grade_level as grad ON grad.GRADE_LEVEL_ID = stud.GRADE_LEVEL_ID  
WHERE stud.GRADE_lEVEL_ID IN (19,20,21,22) 
AND student_id = $student_id
";
$resulterotit = mysqli_query($conn, $queryingtot);
$rowadtit = mysqli_fetch_assoc($resulterotit);





$queryingtotie = "SELECT * 
FROM student as stud 
INNER JOIN grade_level as grad ON grad.GRADE_LEVEL_ID = stud.GRADE_LEVEL_ID  
WHERE stud.GRADE_lEVEL_ID IN (23,24) 
AND student_id = $student_id
";
$resulterotits = mysqli_query($conn, $queryingtotie);
$rowadtitoe = mysqli_fetch_assoc($resulterotits);



echo "<div class = 'container-fluid border border-1 mt-2 ' style = ' background-color:#41644A;border-radius: 10px 10px 10px  10px ;  border-width: 2px;  border-color:	#121; '>";
echo "<div class = 'row'>";
echo "<div class = 'col-sm-5 mt-2 mb-3 '>";
echo "<img src='" . $imageData . "'  class='brand-image img-circle elevation-3 mt-1 '  style='max-width: 100%; height: auto; width: 180px; height: 180px; object-fit: cover;  border-style:inset;
border-width: 3px;  border-color:	#FDF4F5; '>";

echo "</div>";
echo "<div class = 'col-sm-5 mt-5 '>";
echo " <h2 class = 'text-center mt-2 text-light ' style=' background-color:#;font-family:Segoe Script;  font-size:40px; margin-top: 2px; '><b>" . $rowad['first_name'] . ' ' . $rowad['middle_name'] . '. ' . $rowad['last_name'] . ' ' . $rowad['suffix_name'] . ".</b></h2>";

echo "<p class = 'text-center mt-2 text-light' style=' background-color:#;font-family:Segoe Script;  font-size:15px;'> Grade - " . $rowad['GRADE_LEVEL'] . " |  Type  - " . $rowad['student_type'] . " |  Strand  - " . $rowad['strand'] . "</p>";

echo "<p  class = 'text-center text-light' style=' background-color:#;font-family:Segoe UI;  font-size:14px;'> Contact_no # " . $rowad['contact_number'] . "</div>";




echo "</div>";
echo "</div>";




echo "<div class='container-fluid '>";
echo "<div class='row'>";




if (isset($row['enrollment_status']) == '1') {
  echo "<div class='col-sm-3 text-left'>";


  echo "<p class=' mt-4 ' style='font-family:Segoe UI; font-size:12px; '>&nbsp&nbsp&nbspEnrollment Status : <span class='badge badge-success border border-1' style='font-family: Segoe UI; font-size: 12px;   border-width: 1px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19); margin-top: 2px;'>&nbsp&nbspPENDING&nbsp&nbsp </span> </p>";
  echo "</div>";
} else {
  echo "<div class='col-sm-4 text-left'>";

  echo "<p class='text-left mt-2 form-control form-control-xs border border-top-0 border-left-0 ' style='font-family:Segoe UI; font-size:12px;   border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);'>Guardian Name : " . $rowad['guardian_name'] . "</p>";
  echo "</div>";
  echo "</div>";
}


if (isset($rowad['student_type']) == 'transferee') {
  echo "<div class='col-sm-5 text-left'>";
  echo "<p  class = '  text-left mt-4 form-control form-control-sm border border-top-0 border-left-0  'style='background-color:#s; font-family:Segoe UI;  font-size:14px;   border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19); '> School Last Attended : " . $rowad['school_last_attended'] . "</p>";
  echo "</div>";
  echo "<div class='col-sm-4 text-left'>";
  echo "<p  class = '  text-left mt-4 form-control form-control-sm border border-top-0 border-left-0  'style='background-color:#s; font-family:Segoe UI;  font-size:14px;   border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19); '> School Year : " . $rowad['school_year'] . "</p>";
  echo "</div>";
} else {
}




echo "</div>";
echo "</div>";



echo "<div class = 'container-fluid border border-1'>";
echo "<div class = 'row'>";


echo "<div class = 'col-sm-3'>";


echo "<p  class = '  text-left mt-3 form-control form-control-sm border border-top-0 border-left-0  'style='background-color:#FFEAEA; font-family:Segoe UI;  font-size:14px;    border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);'> Date of Reg : " . $rowad['date_of_registration'] . "</p>";



echo "</div>";

echo "<div class = 'col-sm-1'>";


echo "<p  class = '  text-left mt-3 form-control form-control-sm border border-top-0 border-left-0  'style='background-color:#FFF3E2; font-family:Segoe UI;  font-size:14px;   border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19); '> Age:" . $rowad['age'] . "</p>";



echo "</div>";

echo "<div class = 'col-sm-5 text-center'>";
echo '<input class="  text-center mt-3 form-control form-control-sm border border-top-0  " value=" Birthdate: ' . date("l, F j, Y ", strtotime($rowad['birthdate'])) . '" style=" background-color:#FFF3E2; font-family: Segoe UI; font-size: 14px;   border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);">';



echo "</div>";

echo "<div class = 'col-sm-3 text-center'>";

echo "<p  class = 'text-left mt-3 form-control form-control-sm border border-top-dark border-right-dark' style='background-color:#FFF3E2;font-family:Segoe UI;  font-size:14px;   border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19); '> Civil Status : " . $rowad['civil_status'] . "</p>";


echo "</div>";
echo "</div>";
echo "</div>";



echo "<div class = 'container-fluid'>";
echo "<div class = 'row'>";


echo "<div class = 'col-sm-3'>";
echo "<p  class = 'text-left mt-3 form-control form-control-sm border border-top-0 border-left-0 '  style=' background-color:#FFF3E2; font-family:Segoe UI;  font-size:14px;   border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);  '> Gender : " . $rowad['gender'] . " </p>";



echo "</div>";

echo "<div class = 'col-sm-6 '>";


echo "<p  class = 'text-left mt-3 form-control form-control-sm border border-1'style='background-color:#FFEAEA; font-family:Segoe UI;  font-size:14px;    border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);'> Address:" . $rowad['unit_number'] . " " . $rowad['street'] . " " . $rowad['barangay'] . " " . $rowad['district'] . " " . $rowad['city'] . "</p>";

echo "</div>";
echo "<div class = 'col-sm-3 '>";
echo "<p  class = 'text-left mt-3 form-control form-control-sm border border-top-0 border-right-0'style='background-color:#FFF3E2;font-family:Segoe UI;  font-size:14px;   border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19); '> Religion : " . $rowad['religion'] . "</p>";

echo "</div>";
echo "</div>";
echo "</div>";




if (isset($rowad['parent_name']) != ($rowad['guardian_name'])) {
  echo "<div class='container-fluid border border-1'>";
  echo "<div class='row'>";
  echo "<div class='col-sm-4'>";
  echo "<p class='text-left mt-3 form-control form-control-sm border border-top-0 border-right-0  border-left-0  border-left-0 ' style='background-color:#FFF3E2;font-family:Segoe UI; font-size:14px;  border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);'>Parent Name:" . $rowad['parent_name'] . "</p>";
  echo "</div>";
  echo "<div class='col-sm-4'>";
  echo "<p class='text-left mt-3 form-control form-control-sm border border-1' style=' background-color:#FFF3E2;font-family:Segoe UI; font-size:14px;   border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);'>Occupation :" . $rowad['parent_occupation'] . " </p>";
  echo "</div>";
  echo "<div class='col-sm-4'>";
  echo "<p class='text-left mt-3 form-control form-control-sm border border-top-0 border-right-0' style='background-color:#FFF3E2;font-family:Segoe UI; font-size:14px;   border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);'>Parent Contact No: " . $rowad['parent_contact_no'] . "</p>";
  echo "</div>";
  echo "</div>";
  echo "</div>";
} else if (isset($rowad['guardian_name']) != '') {
  echo "<div class='container-fluid border border-1 mb-2'>";
  echo "<div class='row'>";
  echo "<div class='col-sm-4'>";
  echo "<p class='text-left mt-3 form-control form-control-sm border border-top-0 border-left-0 ' style='background-color:#FFF3E2;font-family:Segoe UI; font-size:14px;   border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);'>Guardian Name : " . $rowad['guardian_name'] . "</p>";
  echo "</div>";
  echo "<div class='col-sm-4'>";
  echo "<p class='text-left mt-3 form-control form-control-sm border border-1' style='background-color:#FFF3E2;font-family:Segoe UI; font-size:14px;   border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);'>Guardian Occupation :" . $rowad['guardian_occupation'] . " </p>";
  echo "</div>";
  echo "<div class='col-sm-4'>";
  echo "<p class='text-left mt-3 form-control form-control-sm border border-top-0 border-right-0' style='background-color:#FFF3E2;font-family:Segoe UI; font-size:14px;   border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);'>Guardian Contact No: " . $rowad['guardian_contact_no'] . "</p>";
  echo "</div>";
  echo "</div>";
  echo "</div>";
}

// echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">';
// echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">';
// echo '<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>';
// echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>';





if (isset($rowadt)) {
  echo "<div class='container-fluid border border-1'>";
  echo "<div class='row'>";
  echo "<div class = 'text-left mt-2 mb-2'>&nbsp&nbsp&nbsp&nbsp&nbspThis Student Should pass the needed requirements below!</div>";

  echo "</div>";
  echo "</div>";

  echo "<div class='container-fluid border border-1  mb-2'>";
  echo "<div class='row'>";



  echo "<div class='col-sm-3'>";


  echo '<div class="card-body p-0  " style = "  border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);">
    <table class="table table-bordered table-striped table table-sm  mt-2" style="font-size:14px;   border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);" cellspacing="0">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th class = "text-left">(Applied to All Grade level)<B style="color:red">*</B> </th>
          
        </tr>
      </thead>
      <tbody>
        <tr>


      



          <td>1.</td>
          <td class = "text-left" >  PSA Birthcertificate</td>
          
        </tr>
        <tr>
          <td>2.</td>
          <td class = "text-left">Baptismal</td>
        
        </tr>
        <tr>
          <td>3.</td>
          <td class = "text-left">
          DSWD Card
          </td>
         
        </tr>
        <tr>
          <td>4.</td>
          <td class = "text-left">Medical Record</td>
        
        </tr>


        <tr>
        <td>5.</td>
        <td class = "text-left">
        4pc 2x2 picture</td>
        
      </tr>


      <tr>
      <td>6.</td>
      <td class = "text-left">
     

Entrance Examination</td>
    
    </tr>






      </tbody>
    </table>




  </div>';

  echo "</div>";

  echo "<div class='col-sm-3' >";
  echo '<div class="card-body p-0">
    <table class="table table-bordered table-striped table table-sm mt-2" style="font-size:14px " cellspacing="0">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th class = "text-left">Additional</th>
          
        </tr>
      </thead>
      <tbody>
        <tr>


      


          <td>1.</td>
          <td class = "text-left" >Good Moral

     </td>
          
        </tr>
        <tr>
          <td>2.</td>
          <td class = "text-left">Form 137</td>
        
        </tr>
      
        
      </tr>


    
    
    
    </tr>






      </tbody>
    </table>




  </div>';

  echo "</div>";




  echo "<div class='col-sm-6 border border-2' style = '  border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);'>";
  echo "<div class='card-body p-0'>";
  echo "<div class = 'border border-1'>Notice  </div>";
  echo "<p>Failure to pass any of these requirements may result in a delay of enrollment or even the cancellation of student admission. Student should understand that the process of submitting these requirements can be time-consuming and sometimes challenging, but the school assure  that they are necessary to ensure that they have a smooth and successful academic year.</p>";
  echo "<p>Therefore, School strongly encourage students to prioritize the submission of all required documents and materials as soon as possible. This will allow the registrar to process their enrollment smoothly and ensure that we provide you with the appropriate educational program and support.</p>";
  // echo "<p>The School are committed to providing them with the best education and support possible, and we are here to assist you in any way we can. If you have any questions or concerns regarding the enrollment requirements.</p>";
  echo "</div>";
  echo "</div>";





  echo "</div>";
  echo "</div>";
}





if (isset($rowadtit)) {
  echo "<div class='container-fluid border border-1'>";
  echo "<div class='row'>";
  echo "<div class = 'text-left mt-2 mb-2'>&nbsp&nbsp&nbsp&nbsp&nbspThis Student Should pass the needed requirements below!</div>";

  echo "</div>";
  echo "</div>";

  echo "<div class='container-fluid border border-1  mb-2'>";
  echo "<div class='row'>";



  echo "<div class='col-sm-3'>";


  echo '<div class="card-body p-0  " style = "  border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);">
    <table class="table table-bordered table-striped table table-sm  mt-2" style="font-size:14px;   border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);" cellspacing="0">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th class = "text-left">(Applied to All Grade level)<B style="color:red">*</B> </th>
          
        </tr>
      </thead>
      <tbody>
        <tr>


      



          <td>1.</td>
          <td class = "text-left" >  PSA Birthcertificate</td>
          
        </tr>
        <tr>
          <td>2.</td>
          <td class = "text-left">Baptismal</td>
        
        </tr>
        <tr>
          <td>3.</td>
          <td class = "text-left">
          DSWD Card
          </td>
         
        </tr>
        <tr>
          <td>4.</td>
          <td class = "text-left">Medical Record</td>
        
        </tr>


        <tr>
        <td>5.</td>
        <td class = "text-left">
        4pc 2x2 picture</td>
        
      </tr>


      <tr>
      <td>4.</td>
      <td class = "text-left">
     

Entrance Examination</td>
    
    </tr>






      </tbody>
    </table>




  </div>';

  echo "</div>";

  echo "<div class='col-sm-3'>";
  echo '<div class="card-body p-0">
    <table class="table table-bordered table-striped table table-sm mt-2" style="font-size:14px" cellspacing="0">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th class = "text-left">Additional</th>
          
        </tr>
      </thead>
      <tbody>
        <tr>


      


          <td>1.</td>
          <td class = "text-left" >Good Moral

     </td>
          
        </tr>
        <tr>
          <td>2.</td>
          <td class = "text-left">Form 137</td>
        
        </tr>
        <tr>
        <td>3.</td>
        <td class = "text-left">Barangay Clearance Certificate</td>
      
      </tr>
      
        
      </tr>


    
    
    
    </tr>






      </tbody>
    </table>




  </div>';

  echo "</div>";



  echo "<div class='col-sm-6 border border-2' style = ' border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);'>";
  echo "<div class='card-body p-0'>";
  echo "<div class = 'border border-1'>Notice  </div>";
  echo "<p>Failure to pass any of these requirements may result in a delay of enrollment or even the cancellation of student admission. Student should understand that the process of submitting these requirements can be time-consuming and sometimes challenging, but the school assure  that they are necessary to ensure that they have a smooth and successful academic year.</p>";
  echo "<p>Therefore, School strongly encourage students to prioritize the submission of all required documents and materials as soon as possible. This will allow the registrar to process their enrollment smoothly and ensure that we provide you with the appropriate educational program and support.</p>";
  // echo "<p>The School are committed to providing them with the best education and support possible, and we are here to assist you in any way we can. If you have any questions or concerns regarding the enrollment requirements.</p>";
  echo "</div>";
  echo "</div>";





  echo "</div>";
  echo "</div>";
}







if (isset($rowadtitoe)) {
  echo "<div class='container-fluid border border-1'>";
  echo "<div class='row'>";
  echo "<div class = 'text-left mt-2 mb-2'>&nbsp&nbsp&nbsp&nbsp&nbspThis Student Should pass the needed requirements below!</div>";

  echo "</div>";
  echo "</div>";

  echo "<div class='container-fluid border border-1  mb-2'>";
  echo "<div class='row'>";



  echo "<div class='col-sm-3'>";


  echo '<div class="card-body p-0  " style = "  border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);">
    <table class="table table-bordered table-striped table table-sm  mt-2" style="font-size:14px;   border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);" cellspacing="0">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th class = "text-left">(Applied to All Grade level)<B style="color:red">*</B> </th>
          
        </tr>
      </thead>
      <tbody>
        <tr>


      



          <td>1.</td>
          <td class = "text-left" >  PSA Birthcertificate</td>
          
        </tr>
        <tr>
          <td>2.</td>
          <td class = "text-left">Baptismal</td>
        
        </tr>
        <tr>
          <td>3.</td>
          <td class = "text-left">
          DSWD Card
          </td>
         
        </tr>
        <tr>
          <td>4.</td>
          <td class = "text-left">Medical Record</td>
        
        </tr>


        <tr>
        <td>5.</td>
        <td class = "text-left">
        4pc 2x2 picture</td>
        
      </tr>


      <tr>
      <td>4.</td>
      <td class = "text-left">
     

Entrance Examination</td>
    
    </tr>






      </tbody>
    </table>




  </div>';

  echo "</div>";

  echo "<div class='col-sm-3' style = ''>";
  echo '<div class="card-body p-0">


       <table class="table table-bordered table-striped table table-sm mt-2" style="font-size:14px" cellspacing="0">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th class = "text-left">Additional</th>
          
        </tr>
      </thead>
      <tbody>
        <tr>


      


          <td>1.</td>
          <td class = "text-left" >Good Moral

     </td>
          
        </tr>
        <tr>
          <td>2.</td>
          <td class = "text-left">Form 137</td>
        
        </tr>
        <tr>
        <td>3.</td>
        <td class = "text-left">Barangay Clearance Certificate</td>
      
      </tr>

      <tr>
      <td>3.</td>
      <td class = "text-left">Permanent Record(SF10)</td>
    
    </tr>
      
        
      </tr>


    
    
    
    </tr>






      </tbody>
    </table>




  </div>';

  echo "</div>";



  echo "<div class='col-sm-6 border border-2' style = ' border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);'>";
  echo "<div class='card-body p-0'>";
  echo "<div class = 'border border-1'>Notice  </div>";
  echo "<p>Failure to pass any of these requirements may result in a delay of enrollment or even the cancellation of student admission. Student should understand that the process of submitting these requirements can be time-consuming and sometimes challenging, but the school assure  that they are necessary to ensure that they have a smooth and successful academic year.</p>";
  echo "<p>Therefore, School strongly encourage students to prioritize the submission of all required documents and materials as soon as possible. This will allow the registrar to process their enrollment smoothly and ensure that we provide you with the appropriate educational program and support.</p>";
  // echo "<p>The School are committed to providing them with the best education and support possible, and we are here to assist you in any way we can. If you have any questions or concerns regarding the enrollment requirements.</p>";
  echo "</div>";
  echo "</div>";



  echo "</div>";
  echo "</div>";
}
