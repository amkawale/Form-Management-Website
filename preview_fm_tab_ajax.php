<?php
include ("php/config.php");
include_once ('global_function.php');



$form_id = "";
$response = [];

if (isset($_REQUEST['json_param'])) {
    $json_param = ($_REQUEST['json_param']); // Decode JSON to associative array

    if ($json_param) { // Check if decoding was successful
        // Generate single tab on click into div_tab
        $tab_oid = $json_param['tab_id'];
        $form_id = $json_param['project_id'];
        $form_mode = $json_param['form_mode'];
        $response['output'] = renderTab($tab_oid, $form_id, $form_mode);

        echo json_encode($response, JSON_UNESCAPED_SLASHES);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid JSON input'], JSON_UNESCAPED_SLASHES);
    }
}

function renderTab($tab_oid, $form_id, $form_mode)
{
    global $con;
    global $response;

    $tab_html = "";
    $session_html = "";
    // echo "SELECT * FROM fm_panel_master WHERE tab_id = '$tab_oid' ORDER BY sort_oid ASC";
    $res2 = mysqli_query($con, "SELECT * FROM fm_tab_master WHERE oid = '" . $tab_oid . "' ORDER BY sort_oid ASC") or die("Select Error");
    $res3 = mysqli_query($con, "SELECT * FROM fm_panel_master WHERE tab_id = '$tab_oid' ORDER BY sort_oid ASC") or die("Select Error");

    $panel_id_list = [];
    $i = 0;
    // Create HTML containers to load panels
    $panel_html = '<div class="container-fluid" id="div_panel_parent">';
    while ($panel = mysqli_fetch_assoc($res3)) {
        // $panel_css = generateObjectCSS($panel['theme_id'], 'panel');

        $panel_html .= "<div class='container-fluid panel_container' id='div_panel{$panel['oid']}'></div>";
        $panel_id_list[$i] = $panel['oid'];
        $i++;
    }
    $response['panel_id_list'] = implode(":", $panel_id_list);
    $panel_html .= "</div>";

    $tab_body_start = '<div class="tab_container">';
    $tab_body_start .= "<div class='container-fluid configure-panel' style=''>
    
    </div>";
    $tab_body_end = '</div>';
    $tab_body_content = '';
    $tab_css = "";

    // Fetch tab data
    if (mysqli_num_rows($res2) > 0) {
        $response['status'] = 'success';
        $tab = mysqli_fetch_assoc($res2);
        $tab_body_content .= '
            <div id="tab' . $tab['oid'] . '" class="tab-pane fade show active" style="' . $tab_css . '">
                ' . $panel_html . '
            </div>';
        $tab_html = $session_html . $tab_body_start . $tab_body_content . $tab_body_end;
    } else {
        $response['status'] = 'no-tabs';
    }

    return $tab_html;
}
