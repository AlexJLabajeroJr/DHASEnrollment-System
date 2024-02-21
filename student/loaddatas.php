<?php
if (isset($_GET['GRADE_LEVEL_ID']) && ($_GET['GRADE_LEVEL_ID'] == '23' || $_GET['GRADE_LEVEL_ID'] == '24')) {
?>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Strand for SHS:</label>
        <div class="col-sm-8">
            <select id="strand" name="strand" class="form-control bg-light" required required oninvalid="alert('Please enter your Strand.')">
                <option value="None">--Select strand--</option>
                <option value="GAS">General Academic Strand</option>
                <option value="HUMMS">Humanities and social sciences </option>
                <option value="STEM">Science, technology, engineering, and mathematics</option>
                <option value="ABM">Accountancy, business, and management</option>
            </select>
        </div>
    </div>
<?php
}
?>