<?php
include("php/config.php");
$theme_id = "";
$object_type_id = "";
if (isset($_REQUEST['json_param'])) {
    $json_param = $_REQUEST['json_param'];
    // print_r($json_param);
    $theme_id = $json_param['theme_id'];
    $object_type_id = $json_param['object_type_id'];
}
// exit;

?>

<input type="hidden" name="object_oid" id="object_oid" value="0">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Sr No</th>
            <th>Style Name</th>
            <th>Css Property</th>
            <th>VALUE</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody id="dataBody">
        <tr>
            <td>New</td>
            <td>
                <select id="css_property_id_<?php echo $object_type_id ?>" name="css_property_id_<?php echo $object_type_id ?>" class="form-control" onchange="add_css_id('<?php echo $object_type_id ?>')">
                    <option value="">Select Theme</option>
                    <?php
                    $result = mysqli_query($con, "SELECT * FROM fm_css_property_master") or die("Select Error");
                    if (mysqli_num_rows($result) > 0) {
                        while ($rec = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $rec['property_id'] . '">' . $rec['property_name'] . '</option>';
                        }
                        echo '</select>'; // css_property_idEnd the dropdown
                    } else {
                        echo 'No themes found';
                    }
                    ?>
                </select>
            </td>
            <td>
                <input type="text" id="property_id_<?php echo $object_type_id ?>" class="form-control" name="property_id_<?php echo $object_type_id ?>" disabled>
            </td>
            <td>
                <input type="text" id="value_id_<?php echo $object_type_id ?>" class="form-control" name="value_id_<?php echo $object_type_id ?>">
            </td>

            <td>
                <button class="btn btn-success btn-action" onclick="saveData()">Save</button>
            </td>
        </tr>
        <!-- Existing data will be appended here dynamically -->
    </tbody>
    <tfoot>
        <?php

        $sql = "SELECT * FROM fm_theme_transaction where theme_id = '" . $theme_id . "' and object_type_id = '" . $object_type_id . "'";
        // echo $sql;
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>{$row['oid']}</td>
                <td>{$row['css_property']}</td>
                <td>{$row['css_property']}</td>
                <td>{$row['css_property_value']}</td>
                <td>
                    <button class='btn btn-info btn-action'  data-bs-toggle='modal' data-bs-target='#exampleModal'
                    onclick='editData({$row['oid']}, \"" . ($row['css_property']) . "\", \"" . ($row['css_property_value']) . "\")'>Edit</button>                    
                    <button class='btn btn-danger btn-action' onclick='deleteData({$row['oid']})'>Delete</button>
                </td>
            </tr>";
            }
        } else {
            echo "<tr>
                <td colspan='6'>No data found</td>
            </tr>";
        }
        ?>
    </tfoot>
</table>