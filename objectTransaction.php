<?php
session_start();

include ("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "interns";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the object's current details
if (isset($_GET['id'])) {
    $object_id = $_GET['id'];
    $sql = "SELECT * FROM objects WHERE object_id = $object_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $object_type_id = $row['object_type_id'];
        $object_value = $row['object_value'];
    } else {
        echo "Object not found";
    }
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
    <title>Object Transaction</title>
    <link href="css/styles.css" rel="stylesheet" />
    <?php
    include_once ('include_css.php');
    ?>
    <style>
        .btn-action {
            margin-right: 5px;
        }
    </style>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .thead {

            background-color: #333;
            color: white;
            padding: 10px;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <?php
    include_once ('nav_top.php');
    ?>
    <div id="layoutSidenav">
        <?php
        include_once ('nav_left.php');
        ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="mt-4">
                        <h1><a href='javascript:self.history.back()'><button class='btn btn-primary'><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-reply-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M5.921 11.9 1.353 8.62a.72.72 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z" />
                                    </svg></button></a>
                            Object Transaction</h1>

                        <div class="breadcrumb-item active">Forms Master</div>
                        <!-- </ol> -->
                    </div><br>
                    <div class="card mb-4">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <?php
                                $q = "SELECT * FROM fm_object_type_master WHERE object_id NOT IN ('section','tab','panel','form_header','panel_header','section_header','checkbox','dropdown','session','readonly_textbox','color')";
                                $rec = mysqli_query($con, $q);
                                $rows = [];
                                if ($rec) {
                                    // Fetch and store the results in an array
                                    while ($row = mysqli_fetch_assoc($rec)) {
                                        $rows[] = $row;
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab"
                                                href="#object_content_<?php echo $row['object_id']; ?>"
                                                onclick="loadObjectTable('object_content_<?php echo $row['object_id']; ?>','<?php echo $row['object_id']; ?>')"><?php echo ($row['object_type']); ?></a>
                                        </li>
                                        <?php
                                    }
                                } else {
                                    // Handle the error
                                    echo "Error: " . mysqli_error($con);
                                }
                                ?>
                            </ul>
                            <input type="hidden" name="object_type_id" id="object_type_id" value="">
                            <input type="hidden" name="container_id" id="container_id" value="">

                            <div class="tab-content">
                                <?php
                                // Iterate over the stored results to generate tab content
                                foreach ($rows as $row) {
                                    ?>
                                    <div class="tab-pane container" id="object_content_<?php echo $row['object_id']; ?>">
                                        <?php echo ($row['object_type']); ?>
                                        <div class="card-body">
                                            <div>
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-table me-1"></i>
                                                    </div>
                                                    <div class="table-responsive" id="object_table_div">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>




                    <!-- <div class="card mb-4">
                        <div class="card-body">

                            <div>
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                    </div>

                                </div>



                            </div>
                        </div>
                    </div> -->

                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; CinchIT solutions, Belagavi.</div>

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- 

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="inputPassword6" class="col-form-label">Object Name</label>
                        </div>
                        <div class="col-auto">
                            <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="inputPassword6" class="col-form-label">Object ID</label>
                        </div>
                        <div class="col-auto">
                            <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="inputPassword6" class="col-form-label">Object Value</label>
                        </div>
                        <div class="col-auto">
                            <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div> -->



    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Object</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> -->




    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Object</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="object_txn_oid" id="object_txn_oid" value="0">
                    <div class="form-group">
                        <label for="object_name">Object Name:</label>
                        <input type="text" id="edit_object_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="object_id">Object ID:</label>
                        <input type="text" id="edit_object_id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="object_value">Object Value:</label>
                        <input type="text" id="edit_object_value" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="theme_id">Theme:</label>
                        <select class="form-control" name="edit_theme_id" id="edit_theme_id">
                            <!-- <option value="0">Active</option>
                            <option value="1">In-Active</option> -->
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
                        <span id="toggleStatusDisplay"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveObjectData2()">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once ('include_js.php');
    ?>
    <script>
        function saveObjectData() {
            var object_name = $('#object_name').val();
            var object_id = $('#object_id').val();
            var object_value = $('#object_value').val();
            var theme_id = $('#theme_id').val();

            var mydata = {};
            mydata["object_txn_oid"] = 0;
            mydata["object_name"] = object_name;
            mydata["object_id"] = object_id;
            mydata["object_value"] = object_value;
            mydata["theme_id"] = theme_id;
            console.log(mydata);
            // return;
            var json_input = (mydata);
            var script = "save_data1.php";
            // $('#div_loading').fadeIn();
            $.post(script, {
                json_param: json_input
            },
                function (result, status) {
                    console.log(result);
                    location.reload();
                    // $('#div_loading').fadeOut();
                    // renderDataTable('object_txn_table');
                }).fail(
                    function (jqXHR, textStatus, errorThrown) {
                        $('#div_loading').fadeOut();
                        alert(jqXHR.responseText);
                    }
                );
            // }
        }

        function saveObjectData2() {
            var object_txn_oid = $('#object_txn_oid').val();
            var object_type_id = $('#object_type_id').val();
            var edit_object_name = $('#edit_object_name').val();
            var edit_object_id = $('#edit_object_id').val();
            var edit_object_value = $('#edit_object_value').val();
            var edit_theme_id = $('#edit_theme_id').val();

            var mydata = {};
            mydata["object_txn_oid"] = object_txn_oid;
            mydata["object_type_id"] = object_type_id;
            mydata["object_name"] = edit_object_name;
            mydata["object_id"] = edit_object_id;
            mydata["object_value"] = edit_object_value;
            mydata["theme_id"] = edit_theme_id;
            console.log(mydata);
            // return;
            var json_input = (mydata);
            var script = "save_data1.php";
            // $('#div_loading').fadeIn();
            $.post(script, {
                json_param: json_input
            },
                function (result, status) {
                    console.log(result);
                    // location.reload();
                    // $('#div_loading').fadeOut();
                    // renderDataTable('object_txn_table');
                    var container_id = document.getElementById('container_id').value;
                    $('#exampleModal').modal('toggle');
                    loadObjectTable(container_id, object_type_id)
                }).fail(
                    function (jqXHR, textStatus, errorThrown) {
                        $('#div_loading').fadeOut();
                        alert(jqXHR.responseText);
                    }
                );
            // }
        }

        function saveData() {
            const object_oid = $('#object_oid').val();
            const object_type_id = $('#object_type_id').val();
            const object_name = $('#object_name_' + object_type_id).val();
            const object_id = $('#object_id_' + object_type_id).val();
            const object_value = $('#object_value_' + object_type_id).val();
            const theme_id = $('#theme_id_' + object_type_id).val();

            if (object_name != "" && object_id != "" && object_value != "" && theme_id != "") {

                var mydata = {};
                mydata["object_txn_oid"] = 0;
                mydata["object_oid"] = object_oid.toString();
                mydata["object_type_id"] = object_type_id.toString();
                mydata["object_name"] = object_name.toString();
                mydata["object_id"] = object_id.toString();
                mydata["object_value"] = object_value.toString();
                mydata["theme_id"] = theme_id.toString();
                console.log(mydata);
                // return;
                var json_input = (mydata);
                var script = "save_data1.php";
                $.post(script, {
                    json_param: json_input
                },
                    function (result, status) {
                        var container_id = document.getElementById('container_id').value;
                        loadObjectTable(container_id, object_type_id)
                    }).fail(
                        function (jqXHR, textStatus, errorThrown) {
                            $('#div_loading').fadeOut();
                            alert(jqXHR.responseText);
                        }
                    );
            } else {
                alert("Fill the data");
            }
        }

        function editData(oid, object_name, object_oid, object_value, theme_id) {
            $('#object_txn_oid').val(oid);
            $('#edit_object_name').val(object_name);
            $('#edit_object_id').val(object_oid);
            $('#edit_object_value').val(object_value);
            $('#edit_theme_id').val(theme_id);
        }

        function loadObjectTable(container_id, object_oid) {
            console.log(container_id)
            console.log(object_oid)
            // return;
            var mydata = {};
            mydata["object_oid"] = object_oid.toString();
            var json_input = (mydata);
            var script = "object_transaction_ajax.php";
            $.post(script, {
                json_param: json_input
            },
                function (result, status) {
                    document.getElementById('container_id').value = container_id;
                    document.getElementById('object_type_id').value = object_oid;

                    // $('#object_table_div').html(result);
                    $('#' + container_id).html(result);
                }).fail(
                    function (jqXHR, textStatus, errorThrown) {
                        $('#div_loading').fadeOut();
                        alert(jqXHR.responseText);
                    }
                );
        }



        function deleteData(id) {
            if (confirm('Are you sure you want to delete this data?')) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete_data1.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        if (xhr.responseText == 'success') {
                            // Reload the data
                            // location.reload();
                            var object_oid = $('#object_type_id').val();
                            var container_id = $('#container_id').val();
                            loadObjectTable(container_id, object_oid)

                        } else {
                            alert('Failed to delete data.');
                        }
                    }

                    // if (xhr.readyState == 4 && xhr.status == 200) {
                    //     if (xhr.responseText == 'success') {
                    // Reload the data
                    // loadData();
                    // var object_oid = $('#container_object').val();
                    // var container_id = $('#container_theme').val();
                    //         loadObjectTable(container_id, object_oid)
                    //     } else {
                    //         alert('Failed to delete data.');
                    //     }
                    // }
                };
                xhr.send(`id=${id}`);

            }
        }
        // Load data on page load
        // window.onload = loadData;
    </script>

</body>

</html>