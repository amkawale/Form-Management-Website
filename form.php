<?php
session_start();

include ("php/config.php");
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
        <title>Form List</title>
        <link href="css/styles.css" rel="stylesheet" />
        <?php
        include_once ("include_css.php");
        ?>
        <script>
            function editData(oid, form_name, num_of_tab, status) {
                console.log(oid)
                console.log(form_name)
                console.log(num_of_tab)
                console.log(status)
                $('#form_oid').val(oid);
                $('#formName').val(form_name);
                $('#numTabs').val(num_of_tab);
                $('#form_status').val(status);

            }

            function reset() {
                $('#form_oid').val(0);
                $('#formName').val('');
                $('#numTabs').val(1);
                $('#form_status').val(1);
            }
        </script>

    </head>

    <body class="sb-nav-fixed">
        <?php
        include_once ("nav_top.php");
        ?>

        <div id="layoutSidenav">
            <?php
            include_once ("nav_left.php");
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <!-- <div > -->
                        <h1 class="mt-4"><a href='javascript:self.history.back()'><button class='btn btn-primary'><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-reply-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M5.921 11.9 1.353 8.62a.72.72 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z" />
                                    </svg></button></a>
                            Form List</h1>
                        <!-- </div> -->
                        <ol class="breadcrumb mb-4">
                            <!-- <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li> -->
                            <li class="breadcrumb-item active">Forms Master</li>
                        </ol>

                        <ol class="breadcrumb mb-4">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" onclick="reset();">Add Form</button>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Forms list
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL NO</th>
                                            <th>Form Name</th>
                                            <th>Number Of Tabs</th>
                                            <th>Form Status</th>
                                            <th>Action</th>

                                    </thead>

                                    <body>
                                        <?php
                                        $sql = "SELECT * FROM fm_project_master";
                                        $result = $con->query($sql);

                                        if ($result->num_rows > 0) {
                                            $i = 1;
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo $row['project_name'] ?></td>
                                                    <td><?php echo $row['number_of_tabs'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row['status'] == 0) {
                                                            echo "Active";
                                                        } else {
                                                            echo "In-Active";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <button class='btn btn-info btn-action'
                                                            onclick="editData(<?php echo ("'" . $row['oid'] . "','" . $row['project_name'] . "','" . $row['number_of_tabs'] . "','" . $row['status'] . "'") ?>)"
                                                            ; data-bs-toggle='modal'
                                                            data-bs-target='#exampleModal'>Edit</button>
                                                        <button class='btn btn-primary btn-action'><a
                                                                href="./Configure.php?form_oid=<?php echo $row['oid']; ?>"
                                                                style="color:white; text-decoration:none;">Configure</a></button>
                                                        <button class='btn btn-danger btn-action'
                                                            onclick="deleteData('<?php echo $row['oid'] ?>')">Delete</button>
                                                    </td>
                                                </tr>
                                                <?php

                                            }
                                        } else {
                                            echo "<tr><td colspan='6'>No data found</td></tr>";
                                        }
                                        ?>
                                    </body>
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

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Form</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="form_oid" id="form_oid" value="0">
                        <div class="form-group">
                            <label for="formName">Form Name:</label>
                            <input type="text" id="formName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="numTabs">Number of Tabs:</label>
                            <input type="number" id="numTabs" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="toggleStatus">Form Status:</label>
                            <select class="form-control" name="form_status" id="form_status">
                                <option value="0">Active</option>
                                <option value="1">In-Active</option>
                            </select>
                            <span id="toggleStatusDisplay"></span>
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

        <?php
        include_once ("include_js.php");
        ?>
        <script>
            // Get modal element

            function saveFormData() {
                var form_oid = $('#form_oid').val();
                var form_name = $('#formName').val();
                var numTabs = $('#numTabs').val();
                var toggleStatus = $('#form_status').val();
                var mydata = {};
                mydata["form_oid"] = form_oid;
                mydata["form_name"] = form_name;
                mydata["numTabs"] = numTabs;
                mydata["toggleStatus"] = toggleStatus;
                console.log(mydata);
                // return;
                var json_input = (mydata);
                var script = "save_form_data.php";
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


            function deleteData(id) {
                if (confirm('Are you sure you want to delete this data?')) {
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'delete_form_data.php', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function () {
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