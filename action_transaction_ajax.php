<?php
include("php/config.php");
$oid = "";
// $object_type_id = "";
if (isset($_REQUEST['json_param'])) {
    $json_param = $_REQUEST['json_param'];
    // print_r($json_param);
    $oid = $json_param['oid'];
    // $object_type_id = $json_param['object_type_id'];
}
// exit;

?>
<input type="hidden" name="oid" id="oid" value="">

<div class="card-body">
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Validation Description</th>
                <th>Action</th>
        </thead>

        <tbody id="dataBody">
            <tr>
                <input type="hidden" name="vgroup_id" id="vgroup_id" value="0">

                <td>
                    New
                </td>
                <td>
                    <input type=" text" id="vgroup_description" class="form-control">
                </td>

                <td>
                    <button class="btn btn-success btn-action" onclick="saveValidationData()">Save</button>
                </td>
            </tr>
            <!-- Existing data will be appended here dynamically -->
        </tbody>

        <tfoot>
            <?php
            $sql = "SELECT * FROM vm_validation_group_master";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $i = 1;
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row['vgroup_description'] ?></td>

                        <td>
                            <button class='btn btn-info btn-action' onclick="editData(<?php echo ("'" . $row['oid'] . "','" . $row['vgroup_description'] . "'") ?>)" data-bs-toggle='modal' data-bs-target='#exampleModal'>Edit</button>
                            <a class='btn btn-primary' href="#">Configure</a>
                            <button class='btn btn-danger btn-action' onclick="deleteValidationData('<?php echo $row['oid'] ?>')">Delete</button>
                        </td>
                    </tr>
            <?php

                }
            } else {
                echo "<tr><td colspan='6'>No data found</td></tr>";
            }
            ?>
        </tfoot>
    </table>
</div>