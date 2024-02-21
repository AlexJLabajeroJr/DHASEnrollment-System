<?php
if (isset($_GET['student_type']) && $_GET['student_type'] == 'transferee') {
    $row = isset($_GET['row']) ? json_decode($_GET['row'], true) : array();
?>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">School_last_attended </label>
        <div class="col-sm-8">
            <input type="text" name="school_last_attended" placeholder="ex. Sorsogon Pilot Elementary School" class="form-control input-sm" value="<?= isset($row['school_last_attended']) ? $row['school_last_attended'] : '' ?>" <?php if (isset($row['school_last_attended'])) ?> required oninvalid="alert('Please enter your School last attended.')">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">School_year</label>
        <div class="col-sm-8">
            <input type="text" name="school_year" placeholder="ex. 2019-2020" class="form-control input-sm" value="<?= isset($row['school_year']) ? $row['school_year'] : '' ?>" <?php if (isset($row['school_year']))  ?> required oninvalid="alert('Please enter your School year.')">
        </div>
    </div>
<?php
} else {
?>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">School_last_attended </label>
        <div class="col-sm-8">
            <input type="text" name="school_last_attended" placeholder="ex. Sorsogon Pilot Elementary School" class="form-control input-sm" value="<?= isset($row['school_last_attended']) ? $row['school_last_attended'] : '' ?>" <?php if (isset($row['school_last_attended'])) echo "disabled" ?> required oninvalid="alert('Please enter your School last attended.')">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">School_year</label>
        <div class="col-sm-8">
            <input type="text" name="school_year" placeholder="ex. 2019-2020" class="form-control input-sm" value="<?= isset($row['school_year']) ? $row['school_year'] : '' ?>" <?php if (isset($row['school_year']))  echo "disabled"  ?> required oninvalid="alert('Please enter your School year.')">
        </div>
    </div>


<?php
}
?>