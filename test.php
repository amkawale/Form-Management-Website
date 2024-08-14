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
    <?php
    include_once("include_css.php");
    ?>

    <link href="css/styles.css" rel="stylesheet" />
    <script>
        function editData(oid, vgroup_description) {
            console.log(vgroup_description);

            // Set values for the form fields
            $('#oid').val(oid);
            $('#edit_vgroup_description').val(vgroup_description);

        }
        // function editactionData(oid, vgroup_description) {
        //     console.log(vgroup_description);

        //     // Set values for the form fields
        //     $('#oid').val(oid);
        //     $('#edit_vgroup_description').val(vgroup_description);

        // }
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
                    <div class="mt-4">
                        <h1 class="mt-4"><a href='javascript:self.history.back()'><button class='btn btn-primary'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply-fill" viewBox="0 0 16 16">
                                        <path d="M5.921 11.9 1.353 8.62a.72.72 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z" />
                                    </svg></button></a>
                            Validation Transaction</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Forms Master</li>
                        </ol>

                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <div>
                                <div class="row justify-content-left">
                                    <div class="card-body">
                                        <div style="float: right;">
                                            <label for="preference"><b>Select Form: </b></label>
                                            <select id="oid" onchange="loadValidation()">
                                                <option value="">Select Form:</option>
                                                <?php
                                                $result = mysqli_query($con, "SELECT * FROM fm_project_master") or die("Select Error");
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($rec = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="' . $rec['oid'] . '">' . $rec['project_name'] . '</option>';
                                                    }
                                                    echo '</select>'; // End the dropdown
                                                } else {
                                                    echo 'No themes found';
                                                }
                                                ?></a>
                                            </select>&nbsp;&nbsp;&nbsp;

                                        </div>

                                    </div>
                                </div>
                                <input type="hidden" id="container_theme" name="container_theme" value="">
                                <input type="hidden" id="container_object" name="container_object" value="">
                                <div class="card-body" id="theme_object_div">

                                </div>
                            </div>
                            <!-- <div>
                                <div class="card mb-4">
                                    <div class="card-body">

                                    </div>
                                </div>
                            </div> -->
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
                                            <input type=" text" id="agroup_description" class="form-control">
                                        </td>

                                        <td>
                                            <button class="btn btn-success btn-action" onclick="saveActionData()">Save</button>
                                        </td>
                                    </tr>
                                    <!-- Existing data will be appended here dynamically -->
                                </tbody>

                                <tfoot>
                                    <?php
                                    $sql = "SELECT * FROM vm_action_group_master";
                                    $result = $con->query($sql);

                                    if ($result->num_rows > 0) {
                                        $i = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                <td>{$row['oid']}</td>
                                                <td>{$row['agroup_description']}</td>

                                                <td>
                                                    <button class='btn btn-info btn-action' data-bs-toggle='modal' data-bs-target='#actionModal' onclick='editActionData({$row['oid']},\"{$row['agroup_description']})'>Edit</button>
                                                    <a class='btn btn-primary btn-action' href='#'>Configure</a></button>
                                                    <button class='btn btn-danger btn-action' onclick=\"deleteActionData({$row['oid']})\">Delete</button>
                                                </td>
                                            </tr>";
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
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; CinchIT solutions, Belagavi.</div>

                    </div>
                </div>
            </footer>
            <!--Validation Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Validation</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="validation_oid" id="validation_oid" value="0">
                            <div class="form-group">
                                <label for="edit_vgroup_description">Validation Description:</label>
                                <input type="text" id="edit_vgroup_description" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="editValidationData();">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--Action Modal -->
            <div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Action</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="oid" id="oid" value="<?php echo $oid; ?>">
                            <!-- <div class="form-group">
                                <label for="edit_agroup_description">Action Description:</label>
                                <input type="text" id="edit_agroup_description" class="form-control">
                            </div> -->
                            <div class="form-group">
                                <label> Action Description: </label>
                                <input type="text" name="agroup_description" value="<?php echo $agroup_description; ?>" class="form-control"> <br>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
                            <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="editActionData();">Save changes</button> -->
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>

    <?php
    include_once("include_js.php");
    ?>

    <script>
        function loadValidation() {
            var oid = $('#oid').val();
            var mydata = {};
            mydata["oid"] = oid.toString();
            var json_input = (mydata);
            var script = "validation_transaction_ajax.php";
            $.post(script, {
                    json_param: json_input
                },
                function(result, status) {
                    // $('#object_table_div').html(result);
                    $('#theme_object_div').html(result);
                }).fail(
                function(jqXHR, textStatus, errorThrown) {
                    $('#div_loading').fadeOut();
                    alert(jqXHR.responseText);
                }
            );
        }

        function saveValidationData() {
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

        function deleteValidationData(oid) {
            if (confirm('Are you sure you want to delete this data?')) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete_validation_data.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        if (xhr.responseText == 'success') {
                            // Reload the data
                            //loadData();
                            var object_oid = $('#container_object').val();
                            var container_id = $('#container_theme').val();
                            // loadThemeTable(container_id, object_oid)
                            location.reload();
                        } else {
                            alert('Failed to delete data.');
                        }
                    }
                };
                xhr.send(`oid=${oid}`);
            }
        }


        function editValidationData(validation_oid, vgroup_description) {
            // var validation_oid = $('#validation_oid').val();
            // console.log(validation_oid);
            // var object_type_id = $('#object_type_id').val();
            var edit_vgroup_description = $('#edit_vgroup_description').val();

            var mydata = {};
            mydata["validation_oid"] = validation_oid;
            // mydata["object_type_id"] = object_type_id;
            mydata["vgroup_description"] = edit_vgroup_description;

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
                    // location.reload();
                    // $('#div_loading').fadeOut();
                    // renderDataTable('object_txn_table');
                    var container_id = document.getElementById('container_id').value;
                    $('#exampleModal').modal('toggle');
                    // loadObjectTable(container_id, object_type_id)
                }).fail(
                function(jqXHR, textStatus, errorThrown) {
                    $('#div_loading').fadeOut();
                    alert(jqXHR.responseText);
                }
            );
            // }
        }


        function saveActionData() {
            var oid = $('#oid').val();
            var agroup_id = $('#agroup_id').val();
            var agroup_description = $('#agroup_description').val();



            var mydata = {};
            mydata["oid"] = oid;
            mydata["agroup_id"] = agroup_id;
            mydata["agroup_description"] = agroup_description;

            console.log(mydata);
            // return;
            var json_input = (mydata);
            var script = "save_action_data.php";
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

        function deleteActionData(oid) {
            if (confirm('Are you sure you want to delete this data?')) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete_action_data.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        if (xhr.responseText == 'success') {
                            // Reload the data
                            //loadData();
                            var object_oid = $('#container_object').val();
                            var container_id = $('#container_theme').val();
                            // loadThemeTable(container_id, object_oid)
                            location.reload();
                        } else {
                            alert('Failed to delete data.');
                        }
                    }
                };
                xhr.send(`oid=${oid}`);
            }
        }


        // function editData(oid, object_name, object_oid, object_value, theme_id) {
        //     $('#object_txn_oid').val(oid);
        //     $('#edit_object_name').val(object_name);
        //     $('#edit_object_id').val(object_oid);
        //     $('#edit_object_value').val(object_value);
        //     $('#edit_theme_id').val(theme_id);
        // }


        // function loadThemeTable(container_id, object_oid) {
        //     var theme_id = $('#theme_id').val();

        //     // return;
        //     var mydata = {};
        //     mydata["theme_id"] = theme_id.toString();
        //     mydata["object_type_id"] = object_oid.toString();
        //     var json_input = (mydata);
        //     var script = "validation_transaction_ajax.php";
        //     $.post(script, {
        //             json_param: json_input
        //         },
        //         function(result, status) {
        //             $('#container_object').val(object_oid);
        //             $('#container_theme').val(container_id);
        //             // $('#object_table_div').html(result);
        //             $('#' + container_id).html(result);
        //         }).fail(
        //         function(jqXHR, textStatus, errorThrown) {
        //             $('#div_loading').fadeOut();
        //             alert(jqXHR.responseText);
        //         }
        //     );
        // }


        // function saveData() {
        //     var theme_id = $('#theme_id').val();
        //     var object_type_id = $('#container_object').val();
        //     var styleName = document.getElementById('css_property_id_' + object_type_id).value;
        //     var cssProperty = document.getElementById('property_id_' + object_type_id).value;
        //     var value = document.getElementById('value_id_' + object_type_id).value;
        //     if (styleName != "" && cssProperty != "" && value != "") {
        //         var mydata = {};
        //         mydata["oid"] = 0;
        //         mydata["theme_id"] = theme_id.toString();
        //         mydata["object_type_id"] = object_type_id.toString();
        //         mydata["styleName"] = styleName.toString();
        //         mydata["cssProperty"] = cssProperty.toString();
        //         mydata["value"] = value.toString();
        //         console.table(mydata);
        //         // return;
        //         var json_input = (mydata);
        //         var script = "save_data.php";
        //         $.post(script, {
        //                 json_param: json_input
        //             },
        //             function(result, status) {
        //                 var object_oid = $('#container_object').val();
        //                 var container_id = $('#container_theme').val();
        //                 loadThemeTable(container_id, object_oid)
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


        // function saveEditData() {
        //     var theme_id = $('#theme_id').val();
        //     var edit_theme_id = $('#edit_theme_id').val();
        //     var object_type_id = $('#container_object').val();

        //     var styleName = document.getElementById('edit_style_name').value;
        //     var cssProperty = document.getElementById('edit_style_name').value;
        //     var value = document.getElementById('edit_css_value').value;
        //     var mydata = {};
        //     mydata["theme_id"] = theme_id.toString();
        //     mydata["oid"] = edit_theme_id.toString();
        //     mydata["object_type_id"] = object_type_id.toString();
        //     mydata["styleName"] = styleName.toString();
        //     mydata["cssProperty"] = cssProperty.toString();
        //     mydata["value"] = value.toString();
        //     console.table(mydata);
        //     // return;
        //     var json_input = (mydata);
        //     var script = "save_data.php";
        //     $.post(script, {
        //             json_param: json_input
        //         },
        //         function(result, status) {
        //             var object_oid = $('#container_object').val();
        //             var container_id = $('#container_theme').val();
        //             $('#exampleModal').modal('toggle');
        //             loadThemeTable(container_id, object_oid)
        //         }).fail(
        //         function(jqXHR, textStatus, errorThrown) {
        //             $('#div_loading').fadeOut();
        //             alert(jqXHR.responseText);
        //         }
        //     );
        // }


        // function add_css_id(object_type_id) {
        //     var css_property_id = $('#css_property_id_' + object_type_id).val();
        //     console.log(css_property_id);
        //     $('#property_id_' + object_type_id).val(css_property_id);
        // }


        // function editProperty() {
        //     var edit_style_name = $('#edit_style_name').val();
        //     console.log(edit_style_name);
        //     $('#edit_css_property').val(edit_style_name);
        // }
    </script>
</body>

</html>