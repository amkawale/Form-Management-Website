<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Validation Transaction</title>
    <link href="css/styles.css" rel="stylesheet" />
    <?php
    include_once("include_css.php");
    ?>
    <script>
        function editData(oid, vgroup_description) {
            console.log(oid)
            console.log(vgroup_id)
            console.log(vgroup_description)
            $('#validation_oid').val(oid);
            $('#vgroup_id').val(vgroup_id);
            $('#vgroup_description').val(vgroup_description);

        }

        function reset() {
            $('#validation_oid').val(0);
            $('#vgroup_id').val('');
            $('#vgroup_description').val(1);
        }
    </script>

</head>

<body class="sb-nav-fixed">
    <?php
    include_once("nav_top.php");
    ?>

    <div id="layoutSidenav">
        <?php
        include_once("nav_left.php");
        ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- <div > -->
                    <div class="mt-4">
                        <h1><a href='javascript:self.history.back()'><button class='btn btn-primary'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply-fill" viewBox="0 0 16 16">
                                        <path d="M5.921 11.9 1.353 8.62a.72.72 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z" />
                                    </svg></button></a>
                            Validation Master
                        </h1>
                        <div class="breadcrumb-item active">Forms Master</div>

                    </div><br>

                    <!-- 
                    Modal
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create/Edit Validation Group</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="form_oid" id="form_oid" value="0">
                                    <div class="form-group">
                                        <label for="formName">Validation Group ID:</label>
                                        <input type="text" id="formName" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="numTabs">Validation Group Description:</label>
                                        <input type="text" id="numTabs" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="saveFormData()">Save
                                        changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
 -->

                    <div class="card mb-4">
                        <div class="card-body">
                            <div>
                                <div class="row justify-content-left">
                                    <div class="card-body">
                                        <div style="float: right;">
                                            <label for="project_group"><b>Select Form Group: &nbsp</b></label>
                                            <select id="project_group">
                                                <?php
                                                // Query to fetch data
                                                $result = mysqli_query($con, "SELECT * FROM fm_project_master") or die("Select Error");

                                                // Check if any rows were returned
                                                if (mysqli_num_rows($result) > 0) {

                                                    // Fetch and loop through each row
                                                    while ($rec = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="' . $rec['oid'] . '">' . $rec['project_name'] . '</option>';
                                                    }
                                                    echo '</select>'; // End the dropdown
                                                } else {
                                                    echo 'No themes found';
                                                }

                                                ?>
                                            </select>&nbsp&nbsp&nbsp&nbsp
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="container_theme" name="container_theme" value="">
                                <input type="hidden" id="container_object" name="container_object" value="">
                                <div class="card-body" id="theme_object_div">

                                </div>
                            </div>
                            <!-- <ol class="breadcrumb mb-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="reset();">Add Form</button>
                    </ol> -->
                            <!-- div> -->
                        </div>
                    </div>


                    <div class="mt-4">
                        <h1>Action Config</h1>
                    </div><br>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Action Description</th>
                                        <th>Action</th>
                                </thead>

                                <tbody id="dataBody">
                                    <tr>
                                        <td>
                                            New
                                        </td>
                                        <td>
                                            <input type=" text" id="vgroup_description" class="form-control">
                                        </td>

                                        <td>
                                            <button class="btn btn-success btn-action" onclick="saveFormData()">Save</button>
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
                                                    <button class='btn btn-primary btn-action'><a href="#" style="color:white; text-decoration:none;">Configure</a></button>
                                                    <button class='btn btn-danger btn-action' onclick="deleteData('<?php echo $row['oid'] ?>')">Delete</button>
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
                    </div>

                </div>
            </main>
            <footer class=" py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; CinchIT solutions,
                            Belagavi.</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- 
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="oid" id="oid" value="0">
                    <div class="form-group">
                        <label for="validationGroup">validation group:</label>
                        <input type="text" id="validationGroup" name="validationGroup" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="vgroup_description">validation Description:</label>
                        <input type="text" id="vgroup_description" name="vgroup_description
                        " class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveFormData()">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div> -->


    <?php
    include_once("include_js.php");
    ?>


    <script>
        // Get modal element

        function saveFormData() {
            var oid = $('#oid').val();
            var vgroup_id = $('#vgroup_id').val();
            var vgroup_description = $('#vgroup_description').val();

            var mydata = {};
            mydata["oid"] = oid;
            mydata["vgroup_id"] = vgroup_id;
            mydata["vgroup_description"] = vgroup_description;

            console.log(mydata);
            // return;
            var json_input = (mydata);
            var script = "save_validation_data.php";
            // $('#div_loading').fadeIn();
            $.post(script, {
                    json_param: json_input
                },
                function(result, status) {
                    console.log(result);
                    location.reload();
                    // $('#div_loading').fadeOut();
                    // renderDataTable('object_txn_table');
                }).fail(
                function(jqXHR, textStatus, errorThrown) {
                    $('#div_loading').fadeOut();
                    alert(jqXHR.responseText);
                }
            );
            // }
        }
        // function saveData() {
        //     const oid = $('#oid').val();
        //     const object_type_id = $('#object_type_id').val();
        //     const object_name = $('#object_name_' + object_type_id).val();
        //     const object_id = $('#object_id_' + object_type_id).val();
        //     const object_value = $('#object_value_' + object_type_id).val();
        //     const theme_id = $('#theme_id_' + object_type_id).val();

        //     if (object_name != "" && object_id != "" && object_value != "" && theme_id != "") {

        //         var mydata = {};
        //         mydata["object_txn_oid"] = 0;
        //         mydata["object_oid"] = object_oid.toString();
        //         mydata["object_type_id"] = object_type_id.toString();
        //         mydata["object_name"] = object_name.toString();
        //         mydata["object_id"] = object_id.toString();
        //         mydata["object_value"] = object_value.toString();
        //         mydata["theme_id"] = theme_id.toString();
        //         console.log(mydata);
        //         // return;
        //         var json_input = (mydata);
        //         var script = "save_data1.php";
        //         $.post(script, {
        //                 json_param: json_input
        //             },
        //             function(result, status) {
        //                 var container_id = document.getElementById('container_id').value;
        //                 loadObjectTable(container_id, object_type_id)
        //             }).fail(
        //             function(jqXHR, textStatus, errorThrown) {
        //                 $('#div_loading').fadeOut();
        //                 alert(jqXHR.responseText);
        //             }
        //         );
        //     } else {
        //         alert("Fill the data");
        //     }
        // }


        function deleteData(id) {
            if (confirm('Are you sure you want to delete this data?')) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete_validation_data.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        if (xhr.responseText == 'success') {
                            // Reload the data
                            location.reload();
                        } else {
                            alert('Failed to delete data.');
                        }
                    }
                };
                xhr.send(`id=${id}`);
            }
        }
    </script>
</body>

</html>