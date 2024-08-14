<?php
include ("php/config.php");

if (isset($_REQUEST['json_param'])) {
    $json_data = $_REQUEST['json_param'];
    $object_type = $json_data['object_type'];
    ?>
    <label for="row_count">Object</label>
    <select class="input-group" name="object_id" id="object_id">
        <option value="">Select Object</option>
        <?php
        $result = mysqli_query($con, "SELECT * FROM fm_object_transaction where object_type_id = '" . $object_type . "'") or die("Select Error");
        if (mysqli_num_rows($result) > 0) {
            while ($rec = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $rec['object_id'] . '">' . $rec['object_name'] . '</option>';
            }
            echo '</select>'; // End the dropdown
        } else {
            echo 'No themes found';
        }
        ?>
    </select>
    <?php
}
?>