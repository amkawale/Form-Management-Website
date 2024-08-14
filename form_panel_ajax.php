<?php

$response = ['status' => 'N/A'];
session_start();

if (isset($_REQUEST['json_param'])) {
    $json_param = ($_REQUEST['json_param']); // Decode JSON to associative array

    if ($json_param && isset($json_param['panel_oid']) && $json_param['panel_oid'] != "") {
        $panel_oid = $json_param['panel_oid'];
        $form_mode = $json_param['form_mode'];

        $panel_html = renderPanel($panel_oid, $form_mode);
        $response['status'] = 'success';
        $response['output'] = $panel_html;
    } else {
        $response['status'] = "no_panels";
        $response['output'] = "<div class='alert alert-warning'> No Panel Mapped!</div>";
    }
    echo json_encode($response, JSON_UNESCAPED_SLASHES);
}

function renderPanel($panel_oid, $form_mode)
{
    include("php/config.php");

    global $response;
    $panel_html = "";
    $panel_row = "";
    $row_html = '';

    // Fetch panel and section information
    $section_oid_list = [];
    $i = 0;
    // echo "SELECT * FROM fm_section_master WHERE panel_id = '$panel_oid' ORDER BY sort_oid ASC";
    // echo "SELECT * FROM fm_panel_master WHERE oid = '$panel_oid'";
    $res2 = mysqli_query($con, "SELECT * FROM fm_section_master WHERE panel_id = '$panel_oid' ORDER BY sort_oid ASC") or die("Select Error");
    while ($section = mysqli_fetch_assoc($res2)) {
        $section_oid_list[$i] = $section['oid'];
        $i++;
    }

    $response['section_oid_list'] = implode(':', $section_oid_list);
    $panel_css = "";
    $panel_header_css = "";
    $res = mysqli_query($con, "SELECT * FROM fm_panel_master WHERE oid = '$panel_oid'") or die("Select Error");

    if (mysqli_num_rows($res) > 0) {
        $panel = mysqli_fetch_assoc($res);
        $panel_name = htmlspecialchars($panel['panel_name']);
        $panel_sub = htmlspecialchars($panel['panel_subtitle']);
        $panel_sub2 = htmlspecialchars($panel['panel_subtitle2']);

        $panel_start_content = "<div class='' style='$panel_css'>
            <div class='configure-panel container-fluid' style=''> 
                <button class='btn btn-warning btn-sm' title='Configure Panel' onclick='loadConfigurePanelModal(\"$panel_oid\")'> 
                    <i class='fa fa-wrench' aria-hidden='true'></i> 
                </button>
                <button class='btn btn-danger btn-sm' title='Delete Panel' onclick='deletePanel(\"$panel_oid\")'> 
                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                </button>
            </div>";

        $panel_end_content = "</div>";

        $panel_title = "<div style='width:100%;'>";
        if ($panel_name != "") {
            $panel_title .= "<div class='py-1' style='$panel_header_css'> $panel_name </div>";
        }
        if ($panel_sub != "") {
            $panel_title .= "<div class='panel-subtitle text-muted' style='padding-left:10px;'> $panel_sub </div>";
        }
        if ($panel_sub2 != "") {
            $panel_title .= "<div class='panel-subtitle2 text-muted' style='padding-left:10px;'> $panel_sub2 </div>";
        }
        $panel_title .= "</div>";

        // Loop through rows and columns to generate sections
        for ($row = 1; $row <= intval($panel['row_count']); $row++) {
            for ($col = 1; $col <= intval($panel['column_count']); $col++) {
                $res3 = mysqli_query($con, "SELECT * FROM fm_section_master WHERE panel_id = '$panel_oid' AND row_index = $row AND column_index = $col ORDER BY sort_oid ASC") or die("Select Error");

                $section_html = "<div class='parent_section_container container-fluid' id='div_section_parent'>";
                while ($sec = mysqli_fetch_assoc($res3)) {
                    $section_html .= "<div class='section_container container-fluid' id='div_section" . htmlspecialchars($sec['oid']) . "'></div>";
                }
                $section_html .= "</div>";

                $row_html .= "<div class='col p-1 m-1'>
                    <div class='configure-panel container-fluid' style=''> 
                        <button class='btn btn-primary btn-sm' title='Add Section' data-bs-target='#sectionxampleModal' onclick='loadCreateSectionModal(\"$panel_oid\", \"$row\", \"$col\")'> 
                            <i class='fa fa-plus' aria-hidden='true'></i> 
                        </button>
                    </div> 
                    $section_html 
                </div>";
            }

            $panel_row .= "<div class='bs5-row d-flex panel text-center p-1 m-1' style='background-color:transparent'>$row_html</div>";
            $row_html = "";
        }

        // Assemble the current panel into one container
        $panel_html .= $panel_start_content . $panel_title . $panel_row . $panel_end_content;
        $panel_row = "";
    } else {
        $response['status'] = "no_panels";
    }
    return $panel_html;
}
