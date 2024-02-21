<div class="modal fade" id="confirm_<?php echo $row1['student_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Schedule </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <form method="POST" action="Pre-registration.php?student_id=<?php echo $row1['student_id']; ?>">
                    <div class="container-fluid">
                        <div class="row ">



                            <input name='confirm' type='submit' value='Confirm' class='form-control bg-danger text-light '>

                            <button type="button" class="btn btn-secondary mt-2" data-dismiss="modal">Close</button>


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






<!--DELETEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE  -->