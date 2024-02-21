<?php
include '../db_con.php';

$gradeLevelId = isset($_POST['gradeLevelId']) ? $_POST['gradeLevelId'] : '';
$semester = isset($_POST['semester']) ? $_POST['semester'] : '';


echo "Grade Level ID: " . $gradeLevelId . "<br>";
echo "Semester: " . $semester . "<br>";

if ($gradeLevelId && $semester) {
    $stmt = $conn->prepare("SELECT * FROM subject WHERE GRADE_LEVEL_ID = ? AND SEMESTER = ?");
    $stmt->bind_param("is", $gradeLevelId, $semester);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $gradeLevelId = isset($_POST['gradeLevelId']) ? $_POST['gradeLevelId'] : '';
        $semester = isset($_POST['semester']) ? $_POST['semester'] : '';

        $stmt2 = $conn->prepare("SELECT * FROM subject WHERE GRADE_LEVEL_ID = ? AND SEMESTER = ?");
        $stmt2->bind_param("is", $gradeLevelId, $semester);
        $stmt2->execute();
        $result2 = $stmt2->get_result();


        echo "<div class='col-sm-12  text-dark'>";
        echo "<label >SUBJECT</label>";
        echo "<select name = 'subjective' class = 'form-control border border-secondary '>";

        while ($row = mysqli_fetch_assoc($result2)) {
            echo "<option value='{$row['subject_id']}'>{$row['subject_code']}</option>";
        }

        echo "</select>";
        echo "</div>";
        // Close the second prepared statement and its result set
        $stmt2->close();
        $result2->close();
    } else {
        echo "No subjects found";
    }

    // Close the first prepared statement and its result set
    $stmt->close();
    $result->close();
} else {
    echo "Please select a grade level and semester";
}
















// $query = "Select * from subject ";
// $result = mysqli_query($conn, $query);

// echo "<div class='col-sm-6  text-dark'>";
// echo "<label for = 'subject'>SUBJECT</label>";
// echo "<select name = 'subject'  id = 'subject' class = 'form-control border border-secondary '>";



// 

// <option value="<?php echo $row1['subject_id']; >" required selected hidden>
    // <php echo $row1['subject_code']; ></option>

// <php


// if ($result) {
//     while ($row = mysqli_fetch_assoc($result)) {

//         echo "<option value = $row[subject_id]>$row[subject_code]</option>";
//     }
//     echo "</select>";
//     mysqli_free_result($result);
// } else {
//     echo "Failed query";
// }
// echo "</div>";
