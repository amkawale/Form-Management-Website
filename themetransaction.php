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
    <title>Theme Transaction</title>
    <?php
    include_once("include_css.php");
    ?>

    <link href="css/styles.css" rel="stylesheet" />
    <script>
        function editData(oid, css_property, css_property_value) {
            console.log(css_property);
            console.log(css_property_value);

            // Set values for the form fields
            $('#edit_theme_id').val(oid);
            $('#edit_style_name').val(css_property);
            $('#edit_css_property').val(css_property);
            $('#edit_css_value').val(css_property_value);

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
                    <div class="mt-4">
                        <h1 class="mt-4"><a href='javascript:self.history.back()'><button class='btn btn-primary'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply-fill" viewBox="0 0 16 16">
                                        <path d="M5.921 11.9 1.353 8.62a.72.72 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z" />
                                    </svg></button></a>
                            Theme Transaction</h1>
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
                                            <label for="preference"><b>Select Theme: </b></label>
                                            <select id="theme_id" onchange="loadTheme()">
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
                </div>

            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; CinchIT solutions, Belagavi.</div>

                    </div>
                </div>
            </footer>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">EDIT Here...</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="edit_theme_id" id="edit_theme_id" value="">
                            <label><b>select style </b></label><br />
                            <select name="edit_style_name" id="edit_style_name" onchange="editProperty();">
                                <option value="">Select Css Property</option>
                                <?php
                                $result = mysqli_query($con, "SELECT * FROM fm_css_property_master") or die("Select Error");
                                if (mysqli_num_rows($result) > 0) {
                                    while ($rec = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $rec['property_id'] . '">' . $rec['property_name'] . '</option>';
                                    }
                                    echo '</select>'; // End the dropdown
                                } else {
                                    echo 'No themes found';
                                }
                                ?>
                            </select><br /><br />
                            <label><b> css property </b></label><br />
                            <input type="text" name="edit_css_property" id="edit_css_property" value="" disabled><br /><br />
                            <label><b>Enter value for css property</b> </label><br />
                            <input type="text" name="edit_css_value" id="edit_css_value" value=""><br />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="saveEditData();">Save
                                changes</button>
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
        function getdata() {
            // return "hello";
            alert('hello');
        }
    </script>


    <script>
        function loadTheme() {
            var theme_id = $('#theme_id').val();
            var mydata = {};
            mydata["theme_id"] = theme_id.toString();
            var json_input = (mydata);
            var script = "fm_load_them_object_ajax.php";
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

        function saveData() {
            var theme_id = $('#theme_id').val();
            var object_type_id = $('#container_object').val();

            var styleName = document.getElementById('css_property_id_' + object_type_id).value;
            var cssProperty = document.getElementById('property_id_' + object_type_id).value;
            var value = document.getElementById('value_id_' + object_type_id).value;

            if (styleName != "" && cssProperty != "" && value != "") {
                var mydata = {};
                mydata["oid"] = 0;
                mydata["theme_id"] = theme_id.toString();
                mydata["object_type_id"] = object_type_id.toString();
                mydata["styleName"] = styleName.toString();
                mydata["cssProperty"] = cssProperty.toString();
                mydata["value"] = value.toString();
                console.table(mydata);
                // return;
                var json_input = (mydata);
                var script = "save_data.php";
                $.post(script, {
                        json_param: json_input
                    },
                    function(result, status) {
                        var object_oid = $('#container_object').val();
                        var container_id = $('#container_theme').val();
                        loadThemeTable(container_id, object_oid)
                    }).fail(
                    function(jqXHR, textStatus, errorThrown) {
                        $('#div_loading').fadeOut();
                        alert(jqXHR.responseText);
                    }
                );
            } else {
                alert("Fill the data");
            }
        }




        function loadThemeTable(container_id, object_oid) {
            var theme_id = $('#theme_id').val();

            // return;
            var mydata = {};
            mydata["theme_id"] = theme_id.toString();
            mydata["object_type_id"] = object_oid.toString();
            var json_input = (mydata);
            var script = "fm_load_theme_tranasaction_ajax.php";
            $.post(script, {
                    json_param: json_input
                },
                function(result, status) {
                    $('#container_object').val(object_oid);
                    $('#container_theme').val(container_id);
                    // $('#object_table_div').html(result);
                    $('#' + container_id).html(result);
                }).fail(
                function(jqXHR, textStatus, errorThrown) {
                    $('#div_loading').fadeOut();
                    alert(jqXHR.responseText);
                }
            );
        }

        function saveEditData() {
            var theme_id = $('#theme_id').val();
            var edit_theme_id = $('#edit_theme_id').val();
            var object_type_id = $('#container_object').val();

            var styleName = document.getElementById('edit_style_name').value;
            var cssProperty = document.getElementById('edit_style_name').value;
            var value = document.getElementById('edit_css_value').value;


            var mydata = {};
            mydata["theme_id"] = theme_id.toString();
            mydata["oid"] = edit_theme_id.toString();
            mydata["object_type_id"] = object_type_id.toString();
            mydata["styleName"] = styleName.toString();
            mydata["cssProperty"] = cssProperty.toString();
            mydata["value"] = value.toString();
            console.table(mydata);
            // return;
            var json_input = (mydata);
            var script = "save_data.php";
            $.post(script, {
                    json_param: json_input
                },
                function(result, status) {
                    var object_oid = $('#container_object').val();
                    var container_id = $('#container_theme').val();
                    $('#exampleModal').modal('toggle');

                    loadThemeTable(container_id, object_oid)
                }).fail(
                function(jqXHR, textStatus, errorThrown) {
                    $('#div_loading').fadeOut();
                    alert(jqXHR.responseText);
                }
            );
        }

        function deleteData(id) {
            if (confirm('Are you sure you want to delete this data?')) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete_data.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        if (xhr.responseText == 'success') {
                            // Reload the data
                            //loadData();
                            var object_oid = $('#container_object').val();
                            var container_id = $('#container_theme').val();
                            loadThemeTable(container_id, object_oid)
                        } else {
                            alert('Failed to delete data.');
                        }
                    }
                };
                xhr.send(`id=${id}`);
            }
        }

        function add_css_id(object_type_id) {
            var css_property_id = $('#css_property_id_' + object_type_id).val();
            console.log(css_property_id);
            $('#property_id_' + object_type_id).val(css_property_id);


        }

        function editProperty() {
            var edit_style_name = $('#edit_style_name').val();
            console.log(edit_style_name);
            $('#edit_css_property').val(edit_style_name);

        }
    </script>



</body>

</html>