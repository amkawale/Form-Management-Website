<?php
session_start();

include "php/config.php";
if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
}

$form_id = "";
if (isset($_REQUEST["form_oid"])) {
    $form_id = $_REQUEST["form_oid"];
}
$q = "select * from fm_project_master where oid = '" . $form_id . "'";
$result = mysqli_query($con, $q);
$form_name = "";
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $form_name = $row['project_name'];
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

    <title>Configure</title>

    <?php
    include_once "include_css.php";
    ?>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css\bootstrap5.3\bootstrap5.3-grid.css" rel="stylesheet" type="text/css" />

    <style>
        th {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        li {
            display: list-item;
            list-style-position: inside;
        }

        .section-title {
            font-size: 18pt;
            font-weight: bold;
        }

        div.container-fluid {
            /* border: dashed 1px red; */
        }

        .configure-panel {
            text-align: right;
            margin-top: 0px !important;
            margin-bottom: 3px !important;
            padding-top: 0px !important;
            padding-bottom: 3px !important;
            margin-right: 0px !important;
            padding-right: 0px !important;
            height: 16px;
        }

        .configure-panel>button {
            margin-right: 10px;
        }

        .panel_container {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .panel_cell {
            <?php
            if ($_REQUEST['mode'] == "edit") {
                echo "border: dotted 1px black;";
            }
            ?>
        }

        .section_cell {
            <?php
            // if ($_REQUEST['mode'] == "edit") {
            echo "border: dotted 1px black;";
            // }
            ?>
            padding-left: 0px;
            padding-right: 0px;
        }

        .container,
        .container-fluid {
            padding-left: 0px;
            padding-right: 0px;
        }

        .container,
        .container-fluid {
            padding-left: 0px;
            padding-right: 0px;
        }

        .panel_container {
            border: dashed 1px violet;
        }

        <?php
        // if ($_REQUEST['mode'] == "edit") {
        echo " .form-control {
                border: none;
            }";
        // }
        ?>
        .section_container {
            <?php
            // if ($_REQUEST['mode'] == "edit") {
            echo "border: dashed 1px black;";
            // }
            ?>
            margin-top: 2px;
            margin-bottom: 2px;
        }

        .tab_container {
            /* border: dashed 1px red; */
        }


        /* .section_container>.container-fluid {
                padding-right: 3px;
                padding-left: 3px;
            } */

        .project-title {
            font-size: 18pt;
            font-weight: bold;
        }

        <?= $config_visibility ?>
        .subtext {
            color: red;
            font-size: 8pt;

        }

        .subtext:empty {
            display: none;
        }
    </style>
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
                    <h1 class="mt-4"></h1><a href='javascript:self.history.back()'>
                        <button class='btn btn-primary'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-reply-fill" viewBox="0 0 16 16">
                                <path
                                    d="M5.921 11.9 1.353 8.62a.72.72 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z" />
                            </svg></button></a>Form Item</h1>
                    <button class='btn btn-info'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-gear-fill" viewBox="0 0 16 16">
                            <path
                                d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                        </svg>
                    </button>

                    <div style="float: right;">
                        <div class="ms-auto">
                            <!-- Button trigger modal -->
                            <button class='btn btn-primary btn-action'><a
                                    href="./preview.php?form_oid=<?php echo $row['oid']; ?>"
                                    style="color:white; text-decoration:none;">Preview</a></button>

                        </div>

                        <!-- Modal >
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Form Preview</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                         Modal content goes here -->
                        <!-- <p>Form details or preview content...</p> -->
                        <!-- </div> -->
                        <!-- <div class="modal-footer"> -->
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <!-- </div> -->

                        <!-- </div> -->

                        <!-- </div> -->

                        <!-- </div>-->
                    </div>
                    <div style="float: center;">
                        <h5 align="center"><?php echo $form_name ?></h5>

                        <style>
                            .nav {
                                overflow: hidden;
                                background-color: #333;
                            }
                        </style>


                        <div id="div_project">

                        </div>
                        <div>

                            <input type="hidden" name="tab_reference" id="tab_reference">
                            <input type="hidden" name="load_tab_oid" id="load_tab_oid">

                            <div id="div_tab"></div>

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
        </div>

        <!-- Tab Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">New Tab</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="tab_oid" id="tab_oid" value="0">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="">Tab name</label>
                                    <input type="text" id="tab_name" class="tab_name">

                                </div>
                                <div class="col">
                                    <label for="preference"><b>Select Theme:
                                        </b></label>
                                    <select id="theme_id">
                                        <?php
                                        // Query to fetch data
                                        $result = mysqli_query($con, "SELECT * FROM fm_theme_master") or die("Select Error");

                                        // Check if any rows were returned
                                        if (mysqli_num_rows($result) > 0) {

                                            // Fetch and loop through each row
                                            while ($rec = mysqli_fetch_assoc($result)) {
                                                echo '<option value="' . $rec['oid'] . '">' . $rec['theme_name'] . '</option>';
                                            }
                                            echo '</select>'; // End the dropdown
                                        } else {
                                            echo 'No themes found';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">sequence</label>
                            <input type="text" id="sort_oid" class="sort_oid">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveFormData()">SaveData</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Tab Modal -->


        <!-- Create new panel -->
        <!-- Modal -->
        <div class="modal fade" id="panelexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Panel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="panle_oid" name="panle_oid">
                        <input type="hidden" id="new_tab_oid" name="new_tab_oid" value="">
                        <label for="panel_name">Panel name</label>
                        <input type="text" id="panel_name" class=" panel_name">

                        <div class="form-group mt-3">
                            <div class="row">
                                <div class="col">
                                    <label for="row_count">Rows</label>
                                    <input type="text" id="row_count" class=" row_count">
                                </div>
                                <div class="col">
                                    <label for="column_count">Columns</label>
                                    <input type="text" id="column_count" class=" col_count">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="savePanleData()">SaveData</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ObjectMappingexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Map Object</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="object_section_oid" name="object_section_oid">
                        <input type="hidden" id="section_row_oid" name="section_row_oid">
                        <input type="hidden" id="section_col_oid" name="section_col_oid">
                        <div class="form-group mt-3">
                            <div class="form-group mt-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="row_count">Object Type</label>
                                        <select class="input-group" name="object_type" id="object_type"
                                            onchange="getObject();">
                                            <option value="map_object_type">Object Type</option>
                                            <?php
                                            $result = mysqli_query($con, "SELECT * FROM fm_object_type_master where object_id NOT IN ('section','tab','panel','form_header','panel_header','section_header','session','readonly_textbox','color', 'logo')") or die("Select Error");
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($rec = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="' . $rec['object_id'] . '">' . $rec['object_description'] . '</option>';
                                                }
                                                echo '</select>'; // End the dropdown
                                            } else {
                                                echo 'No themes found';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col" id="display_object">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"
                            onclick="saveobjectmappingData()">SaveData</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="sectionExampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" id="section_oid" name="section_oid">
                    <h5 class="modal-title" id="exampleModalLabel">Add Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="row justify-content-left">
                    <div class="card-body">
                        <div style="float: right;">
                            <label for="preference"><b>Select Theme: </b></label>
                            <select id="section_theme_id">
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
                                ?></a>
                            </select>&nbsp;&nbsp;&nbsp;

                        </div>

                    </div>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="new_panel_oid" name="new_panel_oid" value="">
                    <input type="hidden" id="new_panel_row" name="new_panel_row" value="">
                    <input type="hidden" id="new_panel_col" name="new_panel_col" value="">
                    <label for="panel_oid">section name</label>
                    <input type="text" id="section_name" class="section name">
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col">
                                <label for="row_index">Rows</label>
                                <input type="text" id="row_index" class="row_index">
                            </div>
                            <div class="col">
                                <label for="column_index">Columns</label>
                                <input type="text" id="column_index" class="column_index">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="savesectionData()">SaveData</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
    include_once "include_js.php";
    ?>
    <script>
        var project_id = '<?php echo $form_id ?>';
        // Get modal element
        $(document).ready(function () {
            // we call the function
            loadProject();
        });

        function saveFormData() {
            var tab_oid = $('#tab_oid').val();

            var tab_name = $('#tab_name').val();
            var theme_id = $('#theme_id').val();
            var sort_oid = $('#sort_oid').val();

            var mydata = {};
            mydata["project_id"] = project_id;
            mydata["tab_oid"] = tab_oid;
            mydata["tab_name"] = tab_name;
            mydata["theme_id"] = theme_id;
            mydata["sort_oid"] = sort_oid;

            console.log(mydata);
            // return;
            var json_input = (mydata);
            var script = "configure_save.php";
            // $('#div_loading').fadeIn();
            $.post(script, {
                json_param: json_input
            },
                function (result, status) {
                    console.log(result);
                    // location.reload();
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

        function loadProject() {

            var mydata = {};
            mydata["project_id"] = project_id;

            console.log(mydata);
            var json_input = (mydata);
            var script = "fm_form_ajax.php";
            $.post(script, {
                json_param: json_input
            },
                function (result, status) {
                    $('#div_project').html(result);

                }).fail(
                    function (jqXHR, textStatus, errorThrown) {
                        $('#div_loading').fadeOut();
                        alert(jqXHR.responseText);
                    }
                );
            // }
        }

        //function loadTab(oid) {

        //  var mydata = {};
        // mydata["project_id"] = project_id;
        // mydata["tab_id"] = oid;

        // console.log(mydata);
        //var json_input = (mydata);
        //var script = "fm_tab_ajax.php";
        //$.post(script, {
        //    json_param: json_input
        //},
        //    function (result, status) {
        //var temp = JSON.parse(result);
        // console.log(temp.panel_id);
        //if (temp.status == "success") {
        //  console.log(temp.output);
        // $('#div_tab').html(temp.output);
        //var tab_reference = temp.panel_id.split(":");
        //$('#tab_reference').val(tab_reference);
        //loadPanel()
        //}

        // }).fail(
        //function (jqXHR, textStatus, errorThrown) {
        // $('#div_loading').fadeOut();
        //alert(jqXHR.responseText);
        //}
        //);
        // }
        // }

        //function loadPanel() {
        ///   var tab_reference = $('#tab_reference').val(tab_reference);
        //var mydata = {};
        // mydata["project_id"] = project_id;
        //mydata["tab_id"] = oid;
        //mydata["panel_oid"] = tab_reference;
        //var target_dev = "div_panel_" + tab_reference;
        //console.log(mydata);
        //var json_input = (mydata);
        //var script = "fm_panel_ajax.php";
        //$.post(script, {
        //json_param: json_input
        //},
        //   function (result, status) {
        //  $(target_dev).html(result);

        // }).fail(
        //function (jqXHR, textStatus, errorThrown) {
        //$('#div_loading').fadeOut();
        //alert(jqXHR.responseText);
        // }
        // );
        // }
        // }



        function deleteTab(oid) {
            if (confirm('Are you sure you want to delete this data?')) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'tab_delete.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        if (xhr.responseText == 'success') {
                            // Reload the data or handle success response
                            alert('Data deleted successfully.');
                            // location.reload();
                        } else {
                            alert('Failed to delete data.');
                        }
                    }
                };
                xhr.send(`id=${oid}`);
            }
        }
        function deletePanel(oid) {
            if (confirm('Are you sure you want to delete this data?')) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'panel_delete.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        if (xhr.responseText == 'success') {
                            // Reload the data or handle success response
                            alert('Data deleted successfully.');
                            // location.reload();
                        } else {
                            alert('Failed to delete data.');
                        }
                    }
                };
                xhr.send(`id=${oid}`);
            }
        }
        function deleteObjectMapping(oid, row, col, object_id) {
            if (confirm('Are you sure you want to delete this data?')) {
                var mydata = {};
                mydata["oid"] = oid;
                mydata["row"] = row;
                mydata["col"] = col;
                mydata["object_id"] = object_id;

                console.log(mydata);
                // return;
                var json_input = (mydata);
                var script = "Remove_Mapped_Object_delete.php";
                // $('#div_loading').fadeIn();
                $.post(script, {
                    json_param: json_input
                },
                    function (result, status) {
                        console.log(result);
                        // loadProject(project_oid);
                        // location.reload();
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
        }


        //saving part of panel modal
        function savePanleData() {
            var panel_oid = $('#panel_oid').val();
            var tab_oid = $('#new_tab_oid').val();
            var panel_name = $('#panel_name').val();
            var row_count = $('#row_count').val();
            var column_count = $('#column_count').val();

            var mydata = {};
            mydata["project_id"] = project_id;
            mydata["tab_oid"] = tab_oid;
            mydata["panel_oid"] = panel_oid;
            mydata["panel_name"] = panel_name;
            mydata["row_count"] = row_count;
            mydata["column_count"] = column_count;
            // mydata["sort_oid"] = sort_oid;

            console.log(mydata);
            // return;
            var json_input = (mydata);
            var script = "panel_save.php";
            // $('#div_loading').fadeIn();
            $.post(script, {
                json_param: json_input
            },
                function (result, status) {
                    console.log(result);
                    // loadProject(project_oid);
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


        //section saving part
        function savesectionData() {
            var section_oid = $('#section_oid').val();
            var section_name = $('#section_name').val();
            var section_theme_id = $('#section_theme_id').val();
            var panel_oid = $('#new_panel_oid').val();
            var panel_col = $('#new_panel_col').val();
            var panel_row = $('#new_panel_row').val();
            var row_index = $('#row_index').val();
            var column_index = $('#column_index').val();


            var mydata = {};
            mydata["section_oid"] = section_oid;
            mydata["section_name"] = section_name;
            mydata["section_theme_id"] = section_theme_id;
            mydata["panel_oid"] = panel_oid;

            mydata["panel_col"] = panel_col;
            mydata["panel_row"] = panel_row;
            mydata["row_index"] = row_index;
            mydata["column_index"] = column_index;

            // mydata["sort_oid"] = sort_oid;

            console.log(mydata);
            // return;
            var json_input = (mydata);
            var script = "section_save.php";
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



        //saving part of the object mapping 
    </script>
    <script>
        var project_oid = "<?= $form_id ?>";
        // var last_loaded_tab = -1;
        // var section_oid_list = ''; // loads list of section oid
        // var temp = [];
        // var ref_tab_oid = -1; // used to fetch tab oid for reference across forms/modal
        // var first_load = 0;
        // var ref_panel_arr = {}; // list of panel oids
        // var ref_section_arr = {}; // list of section oids
        // var ref_panel_oid = -1; // for new section creation
        // var ref_panel_row = -1;
        // var ref_panel_col = -1;
        // var ref_object_oid = -1;
        // var ref_section_oid = -1;// for use in mapping object to section
        // var ref_section_x_index = -1;
        // var ref_section_y_index = -1;
        // var ref_object_type_oid = -1; // added by  
        // var ref_config_section_oid = -1;
        // var ref_config_panel_oid = -1;
        // var ref_config_tab_oid = -1;
        // var ref_config_txn_obj_id = -1;
        // var ref_config_sec_obj_map_oid = -1;
        // var ref_config_txn_obj_oid = -1;
        // var tab_id_mapping = ""; //added  by will give current tab_oid.
        // var object_count = ""; // added  by 
        // var object_ids = []; // added  by 
        // var is_dom_completely_loaded = true;
        $(document).ready(function () {
            loadProject(project_oid);
        });

        function loadProject(project_oid, tab_oid = "", row_chk1 = "") {
            // console.log("load function>>>" + tab_oid);
            // console.log("load function>>>" + ref_first_tab_oid);
            // console.log("load function>>>"+tab_id_mapping);

            var form_mode = "edit";
            mydata = {};
            mydata['project_oid'] = project_oid;
            mydata['form_mode'] = form_mode;
            mydata['ticket_oid'] = 0;
            var json_input = mydata;
            var script = "fm_form_ajax.php";

            $('#div_loading').fadeIn();
            $.post(script, {
                json_param: json_input
            },
                function (result, status) {
                    $('#div_project').html(result);
                    // console.log(tab_oid + "___" + row_chk1);
                    if (tab_oid !== "") {
                        changeTabByHref('#tab' + row_chk1, tab_oid);
                    }
                    $('#div_loading').fadeOut();
                }).fail(
                    function (jqXHR, textStatus, errorThrown) {
                        $('#div_loading').fadeOut();
                        alert(jqXHR.responseText);
                    }
                );

        }

        function loadTab(oid) {

            $('#load_tab_oid').val(oid)
            var mydata = {};
            mydata["project_id"] = project_oid;
            mydata["tab_id"] = oid;
            mydata["form_mode"] = "edit";

            console.log(mydata);
            var json_input = (mydata);
            var script = "fm_tab_ajax.php";
            $.post(script, {
                json_param: json_input
            },
                function (result, status) {
                    var temp = JSON.parse(result);
                    // console.log(temp.panel_id_list);
                    if (temp.status == "success") {
                        $('#div_tab').html(temp.output);
                        var tab_reference = temp.panel_id_list.split(":");
                        $('#tab_reference').val(tab_reference);
                        setTimeout(() => {
                            loadPanel(oid);
                        }, 1000);
                    }
                }).fail(
                    function (jqXHR, textStatus, errorThrown) {
                        $('#div_loading').fadeOut();
                        alert(jqXHR.responseText);
                    }
                );
            // }
        }

        function loadPanel(oid) {
            console.clear();
            var tab_reference = $('#tab_reference').val();
            var mydata = {};
            mydata["project_id"] = project_oid;

            mydata["panel_oid"] = tab_reference;
            mydata["form_mode"] = "edit";

            console.log(mydata);
            var target_dev = "#div_panel" + tab_reference;
            var json_input = mydata;
            var script = "form_panel_ajax.php";

            $.post(script, {
                json_param: (json_input) // Convert object to JSON string
            },
                function (result, status) {
                    // Parse JSON response
                    var response = JSON.parse(result);
                    console.log(response);
                    if (response.status === 'success') {
                        var output = response.output.trim(); // Trim whitespace
                        console.log(output);
                        $(target_dev).html(output);
                        loadSection(tab_reference, response.section_oid_list)
                    } else {
                        console.error(response.message || "Error loading panel");
                    }
                }).fail(
                    function (jqXHR, textStatus, errorThrown) {
                        $('#div_loading').fadeOut();
                        alert(jqXHR.responseText);
                    }
                );
        }

        function loadSection(panel_oid, section_oid_list) {
            var tab_id_mapping = $('#tab_reference').val();
            var section_oid_arr = section_oid_list.split(":");
            var script = "form_section_ajax.php";

            function loadNextSection(index) {
                if (index >= section_oid_arr.length) {
                    return;
                }

                var section_oid = section_oid_arr[index];
                var target_div = "#div_section" + section_oid;
                var mydata = {
                    panel_oid: panel_oid,
                    project_oid: project_oid,
                    tab_oid: tab_id_mapping,
                    form_mode: "edit",
                    ticket_oid: 0,
                    section_oid: section_oid
                };
                var json_input = mydata;
                $.post(script, {
                    json_param: (json_input)
                },
                    function (result, status) {
                        console.log(target_div);
                        $(target_div).html(result);
                        loadNextSection(index + 1);
                    }).fail(
                        function (jqXHR, textStatus, errorThrown) {
                            $('#div_loading').fadeOut();
                            alert(jqXHR.responseText);
                        }
                    );
            }
            loadNextSection(0);
        }

        // object mapping function
        function saveobjectmappingData() {

            // var tab_oid = $('#load_tab_oid').val();
            var object_section_oid = $('#object_section_oid').val()
            var load_tab_oid = $('#load_tab_oid').val()
            var section_row_oid = $('#section_row_oid').val()
            var section_col_oid = $('#section_col_oid').val()
            var object_id = $('#object_id').val()

            var mydata = {};
            // mydata["tab_oid"] = tab_oid;
            mydata["project_oid"] = project_oid;
            mydata["tab_oid"] = load_tab_oid;
            mydata["object_section_oid"] = object_section_oid;
            mydata["section_row_oid"] = section_row_oid;
            mydata["section_col_oid"] = section_col_oid;
            mydata["object_id"] = object_id;

            // mydata["sort_oid"] = sort_oid;

            console.log(mydata);
            // return;
            var json_input = (mydata);
            var script = "objectmapping_save.php";
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

        function loadCreatePanelModal(oid) {
            $('#panelexampleModal').modal('show');
            $('#new_tab_oid').val(oid)
        }

        function loadObjectMappingModal(section_oid, row, col) {
            $('#ObjectMappingexampleModal').modal('show');
            $('#object_section_oid').val(section_oid)
            $('#section_row_oid').val(row)
            $('#section_col_oid').val(col)

        }

        function loadCreateSectionModal(panle_oid, panel_row, panel_col, section_oid) {
            $('#sectionExampleModal').modal('show');
            $('#section_oid').val(section_oid)
            $('#new_panel_oid').val(panle_oid)
            $('#new_panel_row').val(panel_row)
            $('#new_panel_col').val(panel_col)

        }

        function getObject() {
            var object_type = $('#object_type').val();
            var mydata = {};
            mydata["object_type"] = object_type;

            console.log(mydata);
            // return;
            var json_input = (mydata);
            var script = "get_objectmapping.php";
            // $('#div_loading').fadeIn();
            $.post(script, {
                json_param: json_input
            },
                function (result, status) {
                    console.log(result);
                    $('#display_object').html(result);
                }).fail(
                    function (jqXHR, textStatus, errorThrown) {
                        $('#div_loading').fadeOut();
                        alert(jqXHR.responseText);
                    }
                );
        }
    </script>
</body>

</html>