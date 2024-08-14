<?php
include("php/config.php");
$object_id = "";
if (isset($_REQUEST['json_param'])) {
    $json_param = $_REQUEST['json_param'];
    // print_r($json_param);
    $object_id = $json_param['object_oid'];
}
// exit;

?>


<input type="hidden" name="object_oid" id="object_oid" value="0">
<table class="table table-bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Sr No</th>
            <th>Object Name</th>
            <th>Object ID</th>
            <th>Object Value</th>
            <th>Theme</th>
            <th>Action</th>
        </tr>
    </thead>

    <body>
        <tr>
            <td>New</td>
            <td>
                <input type="text" class="form-control" id="object_name_<?php echo $object_id ?>">
            </td>
            <td>
                <input type="text" class="form-control" id="object_id_<?php echo $object_id ?>">
            </td>
            <td>
                <input type="text" class="form-control" id="object_value_<?php echo $object_id ?>">
            </td>
            <td>
                <select id="theme_id_<?php echo $object_id
                                        ?>" class="form-control">
                    <option value="">Select Theme</option>
                    <?php
                    $result = mysqli_query($con, "SELECT * FROM fm_theme_master") or die("Select Error");
                    if (mysqli_num_rows($result) > 0) {
                        while ($rec = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $rec['theme_id'] . '">' . $rec['theme_name'] . '</option>';
                        }
                        echo '</select>'; // End the dropdown
                    } else {
                        echo 'No themes found';
                    }
                    ?>
                </select>
            </td>
            <td>
                <button class="btn btn-success btn-action" onclick="saveData()">Save</button>
            </td>
        </tr>
        <!-- Existing data will be appended here dynamically -->
    </body>
    <tfoot>
        <?php

        $sql = "SELECT * FROM fm_object_transaction where object_type_id = '" . $object_id . "'";
        // echo $sql;
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>{$row['oid']}</td>
                <td>{$row['object_name']}</td>
                <td>{$row['object_id']}</td>
                <td>{$row['object_value']}</td>
                <td>{$row['theme_id']}</td>
                
                <td>
                <button class='btn btn-info btn-action' data-bs-toggle='modal' data-bs-target='#exampleModal' onclick='editData({$row['oid']}, \"{$row['object_name']}\", \"{$row['object_id']}\", \"{$row['object_value']}\", \"{$row['theme_id']}\")'>Edit</button> 

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