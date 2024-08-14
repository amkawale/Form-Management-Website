<?php
include_once ('global_function.php');


$_SESSION['sequence'] = "";

$rec_form_transaction = [];
// echo $_SESSION['ticket_oid'];

// echo $_SESSION['sequence'];
$section_object_mapping_oid = -1;
$ref_txn_object_oid = -1;
$ref_object_type_oid = -1;
$ref_theme_oid = -1;
$form_mode = "";
$ticket_oid = "0";
$project_oid = "";
$tab_oid = "";
$ref_txn_object_id = -1;
$is_object_type_input = false;
$disable_form_controls = true;
$last_set_access;

$is_object_type_input = false;

if (isset($_REQUEST['json_param'])) {
    $json_param = ($_REQUEST['json_param']);
    $project_oid = $json_param['project_oid'];
    $panel_oid = $json_param['panel_oid'];
    $form_mode = $json_param['form_mode'];
    $tab_oid = $json_param['tab_oid'];
    $ticket_oid = "";

    // echo $_SESSION['ticket_oid'] . '<br>';
    if ($json_param['section_oid'] != "")
        echo generateSection($json_param['section_oid'], $panel_oid, $form_mode, $project_oid, $ticket_oid, $tab_oid);
}

// generates section for panel at coordinates $row_index, $col_index
function generateSection($section_oid, $panel_oid, $form_mode, $project_oid, $ticket_oid, $tab_oid)
{
    include ("php/config.php");

    global $section_object_mapping_oid;
    global $ref_txn_object_oid;
    global $ref_object_type_oid;
    global $ref_theme_oid;
    global $is_object_type_input;
    global $ref_txn_object_id;
    $section_html = "";
    $section_row = "";
    $row_html = "";
    global $disable_form_controls;
    global $last_set_access;

    // fetch project id for validation

    $form_id = $project_oid;
    $tab_id = $tab_oid;
    // echo "SELECT * FROM fm_section_master where panel_id = '" . $panel_oid . "'";
    // echo '<br>';
    // exit;
    $section_end_content = "</div>";
    $rec_section = mysqli_query($con, "SELECT * FROM fm_section_master where panel_id = '" . $panel_oid . "'") or die("Select Error");
    if (mysqli_num_rows($rec_section) > 0) {
        foreach ($rec_section as $row_section) {
            if ($row_section['oid'] == $section_oid) {
                // generate 1 section 
                // $section_font = "";
                $section_css = "";
                $section_header_css = "";

                $section_start_content = "<div class='section container-fluid'  style='$section_css'>
                <div class='configure-panel container-fluid' style='margin-right:0px;margin-top:0px;'> 
                </div>";
                $section_name = trim($row_section['section_name']);
                $section_subtitle = trim($row_section['section_subtitle']);

                $section_title = "<div style='width:100%;padding-bottom:15px;'>";

                if ($section_name != "") {
                    $section_title .= "<div class='py-1' style='$section_header_css'> $section_name  </div>";
                }
                if ($section_subtitle != "") {
                    $section_title .= "<div class='section-subtitle  text-muted' style='padding-left:10px;'> $section_subtitle  </div>";
                }

                $section_title .= "</div>";

                $section_title = strlen($section_title) > 67 ? $section_title : "";
                for ($row = 1; $row <= intval($row_section['row_count']); $row++) {
                    for ($col = 1; $col <= intval($row_section['column_count']); $col++) {
                        $objectHtml = generateTransactionObject($row_section['oid'], $row, $col, $project_oid, $ticket_oid, $form_mode, $tab_id);
                        if ($objectHtml != "NA") {
                            if ($is_object_type_input) {
                                $validation_button = "<button title='Validate' onclick=\"loadObjectValidationModal('$form_id','$ref_txn_object_id')\" type='button' class='btn  btn-success btn-xs'><i aria-hidden='true' class='fa fa-code-fork'></i>
                                </button>";
                            } else {
                                $validation_button = '';
                            }
                            $drag_object = "";
                            // echo $form_mode;

                            if ($form_mode == 'show') {
                                $drag_object = "id='mapped_object_id_{$row_section['section_id']}_{$row}_{$col}' draggable='true' ondragstart='dragStart(\"{$row_section['section_id']}\",$row,$col,\"$section_object_mapping_oid\",\"$ref_theme_oid\")' ondrop='dragStop(\"{$row_section['section_id']}\",$row,$col,\"$section_object_mapping_oid\")' ondragover='allowDrop(event)'";
                            }


                            $row_html .= "<div class='bs5-col section_cell' $drag_object>
                                            <input type='hidden' id='draged_hidden_{$row_section['section_id']}_{$row}_{$col}_{$section_object_mapping_oid}' value=''/>
                                            <input type='hidden' id='droped_hidden_{$row_section['section_id']}_{$row}_{$col}_{$section_object_mapping_oid}' value=''/>
                                    <div class='configure-panel container-fluid' style='margin-right:0px;margin-top:0px;'> 
                                      
                                    </div>
                                     $objectHtml
                                  </div>";
                        } else {
                            $hidden = '';

                            if ($form_mode == 'hidden' || $form_mode == 'MDM')
                                $hidden = "hidden";

                            $row_html .= "<div class='bs5-col section_cell' style='text-align: center;display: flex;align-items: center;flex-direction: column;' draggable='true' ondragstart='dragStart(\"{$row_section['section_id']}\",$row,$col,\"\",\"\")' ondrop='dragStop(\"{$row_section['section_id']}\",$row,$col,\"\",\"\")' ondragover='allowDrop(event)' id='new_object_id_{$row_section['section_id']}_{$row}_{$col}'>
                                        <div class='configure-panel container-fluid' style='margin-right:0px;margin-top:0px;'> 
                                        </div>
                                           ";
                            if ($hidden) {
                                $row_html .= "<div class='bs5-col section_cell' style='margin-bottom: 4rem;border: none;'></div>";
                            }

                            $row_html .= "</div>";
                        }
                    }

                    // reference to limit max cols in a row : row row-cols-3
                    $section_row .= "<div class='bs5-row section d-flex' style='width: 100%;padding-left: 15px;'>" . $row_html . "</div>";
                    $row_html = "";
                }

                // assemble the current section into one row.
                $section_html .= $section_start_content . $section_title . $section_row . $section_end_content;
                $section_row = "";
            }
        }
    }

    return $section_html;
}
function generateTransactionObject($section_oid, $row_index, $col_index, $project_oid, $ticket_oid, $form_mode, $tab_id)
{
    // echo $section_oid . '----' . '<br>';
    // echo $row_index;
    // echo $col_index;

    include ("php/config.php");

    // Start measuring time
    $start_time = microtime(true);

    // Your existing function code
    global $section_object_mapping_oid;
    global $ref_txn_object_oid;
    global $ref_txn_object_id;
    global $report_oid;
    global $ref_object_type_oid;
    global $ref_theme_oid;
    global $is_object_type_input;

    $object_html = '';
    // echo "SELECT  som.oid,som.*,ot.*, som.object_transaction_id, ot.object_id  from fm_section_object_mapping som, fm_object_transaction ot
    // WHERE som.object_transaction_id = ot.object_id and som.form_id = '" . $project_oid . "' and som.oid = '" . $section_oid . "' and som.row_index = '" . $row_index . "' and som.column_index = '" . $col_index . "'" . '<br>';
    // exit;
    $rec_section_mapping = mysqli_query($con, "SELECT  som.oid,som.*,ot.*, som.object_transaction_id, ot.object_id  from fm_section_object_mapping som, fm_object_transaction ot
    WHERE som.object_transaction_id = ot.object_id and som.form_id = '" . $project_oid . "' and som.section_id = '" . $section_oid . "' and som.row_index = '" . $row_index . "' and som.column_index = '" . $col_index . "'") or die("Select Error");
    // $_SESSION['rec_section_mapping'] = $rec_section_mapping;
    // print_r($rec_section_mapping);

    if (mysqli_num_rows($rec_section_mapping) > 0) {
        foreach ($rec_section_mapping as $row_section_mapping) {
            // print_r($row_section_mapping);
            // echo '------->>>>>' . $row_section_mapping['oid'] . '         ' . $section_oid . '<br>';
            // if ($row_section_mapping['oid'] == $section_oid && $row_section_mapping['row_index'] == $row_index && $row_section_mapping['column_index'] == $col_index) {
            // print_r($row_section_mapping);
            // $object = $res[0];
            $section_object_mapping_oid = $row_section_mapping['object_transaction_id'];
            $object_html = renderObjectHTML($row_section_mapping['object_id'], $row_index, $col_index, $project_oid, $ticket_oid, $form_mode, $tab_id);
            // echo $object_html;
            // exit;
            $ref_txn_object_oid = $row_section_mapping['object_id'];
            $ref_object_type_oid = $row_section_mapping['object_type_id'];
            $ref_theme_oid = $row_section_mapping['theme_id'];
            $ref_txn_object_id = $row_section_mapping['object_transaction_id'];
            // }
        }
    }

    if ($object_html == '') {
        $object_html = "NA";
    }
    // End measuring time
    $end_time = microtime(true);
    $execution_time = ($end_time - $start_time) * 1000; // Convert to milliseconds

    // Output execution time
    // echo "Execution time of generateTransactionObject: $execution_time milliseconds<br>";
    return $object_html;
}

function renderObjectHTML($txn_object_oid, $row_index, $col_index, $project_oid, $ticket_oid, $form_mode, $tab_id)
{
    include ("php/config.php");

    global $disable_form_controls;
    global $last_set_access;
    $disabled = "";
    $object_html = '-NA-';
    global $is_object_type_input;
    global $form_mode;
    // echo $ticket_oid . '---<br>';
    $object_value = "";
    $object_id = "";
    $object_type = "";
    $object_data = "";
    $selected = "";
    $object_css = '';

    $rec_q_object = mysqli_query($con, "SELECT  som.*,ot.*, som.object_transaction_id, ot.object_id  from fm_section_object_mapping som, fm_object_transaction ot
    WHERE som.object_transaction_id = ot.object_id and som.form_id = '" . $project_oid . "'") or die("Select Error");


    if (mysqli_num_rows($rec_q_object) > 0) {
        foreach ($rec_q_object as $object) {
            if ($object['object_id'] == $txn_object_oid) {

                $object_value = $object['object_value'];
                $object_id = $object['object_id'];
                $object_type = $object['object_type_id'];
                // echo $object_type;
                // echo $object['theme_id'];
                // echo $object_data . '<br>';
                $options_data = "";

                $is_object_type_input = $object_type != "label" && $object_type != "paragraph" && $object_type != "readonly_textbox" && $object_type != "hidden" ? true : false;
                $object_css = generateObjectCSS($object['theme_id'], $object['object_type_id']);
                // echo $object_css . '----   css<br>';
                $attributes = "";
                // $attributes = generateObjectAttributes($txn_object_oid, $row_index, $col_index);
                // echo $attributes . '<br>';
                if ($object_type == 'label') {
                    $object_html = "<div style='$object_css'><label class='$attributes'   style='$object_css'> " . $object_value . "</label></div>";
                } elseif ($object_type == 'textbox') {
                    $object_html = "<input type='text' $attributes $disabled class='form-control input-sm' style='$object_css' placeholder='" . $object_value . "' name='" . $object_id . "' id='" . $object_id . "' value='" . $object_data . "' /><input type='hidden' id='hidden_" . $object_id . "' value=''>
                    <div class='subtext' id='subtext_$object_id'></div> ";
                } elseif ($object_type == 'date') {
                    $object_html = "<input type='date' $attributes $disabled class='form-control' style='$object_css' placeholder='" . $object_value . "' name='" . $object_id . "' id='" . $object_id . "' value='" . $object_data . "' /><input type='hidden' id='hidden_" . $object_id . "' value=''><div class='subtext' id='subtext_$object_id'></div> ";
                } elseif ($object_type == 'textarea') {
                    $object_html = "<textarea class='form-control' $disabled $attributes  style='$object_css'  placeholder='" . $object_value . "' name='" . $object_id . "' id='" . $object_id . "'>$object_data</textarea><input type='hidden' id='hidden_" . $object_id . "' value=''>
                    <div class='subtext' id='subtext_$object_id'></div>";
                } elseif ($object_type == 'dropdown') {
                    $options_data = "";
                } elseif ($object_type == 'button') {
                    $object_html = "<button type='button' $attributes  style='$object_css' class='btn btn-primary btn-md ' id='" . $object_id . "' name='" . $object_id . "' $disabled >" . $object_value . "</button>";
                } elseif ($object_type == 'hidden') {
                    $object_html = "<input type='hidden' $attributes $disabled style='$object_css' name='" . $object_id . "' id='" . $object_id . "' value='" . $object_value . "' />";
                } elseif ($object_type == 'readonly_textbox') {
                    $object_html = "<input type='text' $attributes $disabled  style='$object_css' class='form-control input-sm' readonly name='" . $object_id . "' id='" . $object_id . "' value='" . $object_value . "' /><div class='subtext' id='subtext_$object_id'></div>";
                } elseif ($object_type == 'file') {
                    $style = '';
                    if ($object_data !== "") {
                        $style .= "width:40%;";
                    }
                    $object_html = "<div style='display: flex; gap:3px'>";
                    if ($object_data !== "") {
                        $rec_q_doc = $_SESSION['rec_q_doc'];
                        if (count($rec_q_doc) > 0) {
                            foreach ($rec_q_doc as $row_doc) {
                                if ($row_doc['object_id'] == $object_id && $row_doc['file_name'] == $object_data && $row_doc['ticket_oid'] == $_SESSION['ticket_oid']) {
                                    $object_html .= "<label style='font-size: 13px'>$object_data</label>
                             <a href='fm_download_document.php?file_name=$object_data' target='_blank'><i class='fa fa-eye'></i></a>&nbsp;
                             <a onclick=\"deleteDocument('" . $row_doc['oid'] . "','" . $_SESSION['ticket_oid'] . "','" . $object_id . "','" . $project_oid . "','" . $tab_id . "')\"><i class='fa fa-trash-o'></i></a>";
                                }
                            }
                        }
                    } else {
                        $object_html = " <input type='file' $attributes $disabled  style='" . $style . $object_css . "' class='form-control input-sm'  style='$object_css'  name='" . $object_id . "' id='" . $object_id . "' value='" . $object_data . "' />";
                    }
                    $object_html .= "<div class='subtext' id='subtext_$object_id'></div></div>";
                } elseif ($object_type == 'paragraph') {
                    $object_html = "<p style='$object_css' $attributes name='" . $object_id . "' id='" . $object_id . "'>" . $object_value . " </p>";
                } elseif ($object_type == 'password') {
                    $object_html = "<input type='password' $attributes $disabled  style='$object_css' class='form-control input-sm '  name='" . $object_id . "' id='" . $object_id . "' value='" . $object_value . "' /><div class='subtext' id='subtext_$object_id'></div>";
                } elseif ($object_type == 'radio' || $object_type == 'checkbox') {
                    $checked_attribute = ($object_data == $object_value) ? 'checked' : '';

                    $object_html = "
                    <div class='' style='$object_css'>
                        <input type='$object_type' $attributes $disabled class='' id='$object_id' value='$object_value' $checked_attribute />
                        <label>$object_value</label>
                    </div>
                    <div class='subtext' id='subtext_$object_id'></div>";
                } elseif ($object_type == 'color') {
                    $object_html = "<input type='{$object_type}' $attributes  style='$object_css' class='form-control input-sm '  name='" . $object_id . "' id='" . $object_id . "' value='" . $object_value . "' /><div class='subtext' id='subtext_$object_id'></div>";
                } else {
                    $object_html = "$object_html";
                }
            }
        }
    }

    return $object_html;
}

function generateObjectAttributes($txn_object_oid, $row_index, $col_index)
{

    $attribute_html = "";
    $attrb_id = "";
    $attrb_name = "";
    $setting_type = "";
    $attrb_default_value = "";
    $param_value = "";

    $rec_object_attribute = $_SESSION['rec_object_attribute'];
    if (count($rec_object_attribute) > 0) {
        foreach ($rec_object_attribute as $object_attribute) {
            if ($object_attribute['object_id'] == $txn_object_oid) {
                // echo $txn_object_oid . '<-------<br>------><hr>';
                // print_r($object_attribute);
                $attrb_id = $object_attribute['param_id']; // p1,p2
                $attrb_name = $object_attribute['param_name']; // placeholder,readonly,maxlength
                $attrb_default_value = $object_attribute['reference_value']; // default value usually ''
                $setting_type = $object_attribute['setting_type']; // default value usually ''
                // echo $setting_type . '---->';

                // $q = "SELECT $attrb_id FROM " . getEntityTableName('fm_object_transaction', 1) . " WHERE object_id = '$txn_object_oid'";
                $rec_param_value = $_SESSION['rec_param_value'];
                if (count($rec_param_value) > 0) {
                    foreach ($rec_param_value as $row_param_value) {
                        if ($row_param_value['object_id'] == $txn_object_oid) {
                            $param_value = $row_param_value[$attrb_id];
                        }
                    }
                }
                // echo $q . '<br>';
                // $attribute_html .= fetchAttributeHTML($attrb_name, $param_value, $setting_type);
                $attribute_html .= " ";
            }
        }
    }

    return $attribute_html;
}

// function fetchAttributeHTML($attrb_name, $param_value, $setting_type)
// {
//     $attr_html = "";

//     if ($setting_type == 'event') {

//         $param_value = htmlspecialchars($param_value ?? '');
//         $attr_html .= "$attrb_name = \"$param_value\"";
//     } else if ($setting_type == 'attribute') {

//         if ($param_value == "yes" || $param_value == "no" || $param_value == "") {
//             $value = $param_value == "yes" ? $attrb_name : ""; // Conditionally assign value
//             $attr_html .= $value;
//         } else {
//             $attr_html .= "$attrb_name = \"$param_value\"";
//         }
//     }
//     return $attr_html;
// }

// function fetchformdata($txn_object_oid, $project_oid)
// {
//     $q_value = "";
//     $res_form_value = $_SESSION['res_form_value'];
//     if (count($res_form_value) > 0) {
//         foreach ($res_form_value as $row_form_value) {
//             if ($row_form_value['form_oid'] == $project_oid && $row_form_value['object_id'] == $txn_object_oid) {
//                 $field_name = $row_form_value['field_name'];
//                 // echo $field_name . '<br>';
//                 if ($field_name != "") {
//                     $rec_form_transaction = $_SESSION['rec_form_transaction'];
//                     if (count($rec_form_transaction) > 0) {
//                         foreach ($rec_form_transaction as $row_form_transaction) {
//                             if ($row_form_transaction['form_oid'] == $project_oid && $row_form_transaction['ticket_oid'] == $_SESSION['ticket_oid']) {
//                                 $q_value = $row_form_transaction[$field_name];
//                                 // echo $q_value . '<br>';
//                             }
//                         }
//                     }
//                 }
//             }
//         }
//     }
//     return $q_value;
// }
