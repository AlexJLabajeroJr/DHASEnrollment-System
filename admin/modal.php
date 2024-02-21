  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Launch demo modal
  </button> -->


  <div class="modal fade" id="add_<?php echo $row1['schedule_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-right: 500px !important;">
          <div class="modal-content" style="width: 700px !important;">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" class="card-title">Add Schedule</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">









              </div>
              <!-- <div class="modal-footer">

                  <button type="button" class="btn btn-primary">Save changes</button>
              </div> -->
          </div>
      </div>
  </div>









  <!-- EDITTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

  <div class="modal fade" id="edit_<?php echo $row1['schedule_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-right: 800px !important;">
          <div class="modal-content" style=" background-color: #BFCCB5; width: 800px !important;">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" class="card-title">Edit Schedule </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">



                  <form method="POST" action="schedule.php?schedule_id=<?php echo $row1['schedule_id']; ?>">
                      <div class="container-fluid">
                          <div class="row ">

                              <?php



                                $query = "Select * from schedule";
                                $result = mysqli_query($conn, $query);

                                echo "<div class='col-sm-6  text-dark'>";
                                echo "<label for = 'starttime'  > Start_time</label>";


                                ?>
                              <input name='starttime' id='starttime' type='time' class='form-control border border-0  ' value="<?php echo $row1['start_time']; ?>">
                              <?php
                                echo "</div>";





                                $query = "Select * from schedule";
                                $result = mysqli_query($conn, $query);


                                echo "<div class='col-sm-6  text-dark'>";
                                echo "<label for = 'endtime'>End_time</label>";


                                ?>
                              <input name='endtime' id='endtime' type='time' class='form-control border border-0' value="<?php echo $row1['end_time']; ?>">
                              <?php
                                echo "</div>";



                                $query = "Select * from schedule";
                                $result = mysqli_query($conn, $query);


                                echo "<div class='col-sm-6  text-dark'>";
                                echo "<label  for = 'days' >DAY</label>";
                                ?>

                              <input name='days' id='days' type='text' class='form-control border border-0' value="<?php echo $row1['day']; ?>">
                          </div>


                          <?php

                            $query = "Select * from grade_level";
                            $result = mysqli_query($conn, $query);




                            echo "<div class='col-sm-6  text-dark'>";
                            echo "<label  for ='GRADE_LEVEL_ID' >Grade_level</label>";
                            echo "<select name ='GRADE_LEVEL_ID'  id ='GRADE_LEVEL_ID'  class = 'form-control border border-0'>";

                            ?>
                          <option value="<?php echo $row1['GRADE_LEVEL_ID']; ?>" required selected hidden>
                              <?php echo $row1['GRADE_LEVEL']; ?></option>

                          <?php



                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {

                                    echo "<option value = $row[GRADE_LEVEL_ID]>$row[GRADE_LEVEL]</option>";
                                }
                                echo "</select>";
                                mysqli_free_result($result);
                            } else {
                                echo "Failed query";
                            }
                            echo "</div>";




                            echo "<div class='col-sm-6  text-dark'>";
                            echo "<label  for = 'sched_semester'>Semester</label>";
                            echo "<select name = 'sched_semester' id = 'sched_semester'  class = 'form-control border border-0'>";
                            // echo "<option value = ''></option>";
                            echo "<option value = 'Quarter'>Quarter</option>";
                            echo "<option value = 'First'>First</option>";
                            echo "<option value = 'Second'>Second</option>";

                            echo "</select>";
                            echo "</div>";




                            $query = "Select * from room WHERE availability = 1";
                            $result = mysqli_query($conn, $query);

                            echo "<div class='col-sm-6  text-dark'>";
                            echo "<label for = 'room'>ROOM</label>";
                            echo "<select name = 'room'  id = 'room' class = 'form-control border border-0 '>";

                            ?>
                          <option value="<?php echo $row1['room_id']; ?>" required selected hidden>
                              <?php echo $row1['room_name']; ?></option>

                          <?php


                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {

                                    echo "<option value = $row[room_id]>$row[room_name]</option>";
                                }
                                echo "</select>";
                                mysqli_free_result($result);
                            } else {
                                echo "Failed query";
                            }
                            echo "</div>";




                            $query = "Select * from schedule";
                            $result = mysqli_query($conn, $query);


                            echo "<div class='col-sm-6  text-dark'>";
                            echo "<label for = 'SECTION' >Section</label>";


                            ?>
                          <input name='SECTION' id='starttime' type='number' class='form-control border border-0' value="<?php echo $row1['SECTION']; ?>">
                      </div>
                      <?php










                        $query = "Select * from subject ";
                        $result = mysqli_query($conn, $query);

                        echo "<div class='col-sm-6  text-dark'>";
                        echo "<label for = 'subject'>SUBJECT</label>";
                        echo "<select name = 'subject'  id = 'subject' class = 'form-control border border-0 '>";



                        ?>
                      <option value="<?php echo $row1['subject_id']; ?>" required selected hidden>
                          <?php echo $row1['subject_code']; ?></option>

                      <?php


                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {

                                echo "<option value = $row[subject_id]>$row[subject_code]</option>";
                            }
                            echo "</select>";
                            mysqli_free_result($result);
                        } else {
                            echo "Failed query";
                        }
                        echo "</div>";







                        $query = "Select * from faculty";
                        $result = mysqli_query($conn, $query);

                        echo "<div class='col-sm-12  text-dark'>";
                        echo "<label>FACULTY</label>";
                        echo "<select name ='faculty' id ='faculty' class = 'form-control border border-0'>";

                        ?>
                      <option value="<?php echo $row1['faculty_id']; ?>" required selected hidden>
                          <?php echo $row1['fac_name']; ?></option>

                      <?php


                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {

                                echo "<option value = $row[faculty_id]>$row[fac_name]</option>";
                            }
                            echo "</select>";
                            mysqli_free_result($result);
                        } else {
                            echo "Failed query";
                        }
                        echo "</div>";












                        echo "<div class='container mt-5'>";
                        echo "<div class='row'>";
                        echo "<div class='col-sm-8'>";
                        echo "</div>";
                        echo "<div class='col-sm-2'>";
                        echo " <input name='bulbol' type='submit' value='Update' class='form-control bg-primary text-light mt-3 '>";
                        echo "</div>";

                        echo "<div class='col-sm-2'>";
                        echo " <button type='button' class=' form-control btn btn-secondary mt-3' data-dismiss='modal'>Close</button>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";





                        ?>
              </div>
          </div>
          </form>









      </div>

  </div>
  </div>
  </div>




  <!--DELETEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE  -->




  <div class="modal fade" id="delete_<?php echo $row1['schedule_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">



                  <form method="POST" action="schedule.php?schedule_id=<?php echo $row1['schedule_id']; ?>">
                      <div class="container-fluid">
                          <div class="row ">





                              <h3 class="modal-title" id="exampleModalLabel"><b>Are you sure you want to delete this Schedule ? </b></h3>

                              <div class='container mt-5'>
                                  <div class='row'>
                                      <div class='col-sm-8'>
                                      </div>
                                      <div class='col-sm-2'>
                                          <input name='sad' type='submit' value='Delete' class='form-control bg-danger text-light '>

                                      </div>
                                      <div class='col-sm-2'>
                                          <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                                      </div>
                                  </div>
                              </div>









                          </div>
                      </div>
                  </form>



              </div>
              <!-- <div class="modal-footer">

                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
          </div>
      </div>
  </div>





  <!-- FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF -->




  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Launch demo modal
  </button> -->