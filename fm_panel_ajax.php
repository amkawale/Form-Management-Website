<?php
$responce = [];
if (isset($_REQUEST['json_param'])) {
    $json_data = $_REQUEST['json_param'];
    $panel_oid = $json_data['panel_oid'];

    $responce['output'] = renderPanel($panel_oid);

    echo json_encode($responce, JSON_UNESCAPED_SLASHES);
}

function renderPanel($panel_oid)
{
    include_once('php/config.php');
    global $responce;
    $panel_id = [];
    $i = 0;
    $result_panel = mysqli_query($con, "select * from fm_panel_master where oid = '" . $panel_oid . "' order by sort_oid") or die("Select Error");
    $div_panel = "<div class='container-fluid'></div>";
    if (mysqli_num_rows($result_panel) > 0) {
        while ($rec_panel = mysqli_fetch_assoc($result_panel)) {
            // $tab_head = generateObjectCSS($row['theme_id'], 'tab_header');

            $div_panel .= "<div class='container-fluid panel_container' id='div_panel_{$rec_panel['oid']}'>

            </div>";
            $panel_id[$i] = $rec_panel["oid"];
            $i++;
        }
    }

    $responce['panel_id'] = implode(":", $panel_id);
    $div_panel .= "</div>";
    // echo $div_panel;

    $tab_div = '<div class="tab-content">';
    $result = mysqli_query($con, "select * from fm_tab_master where oid = '" . $tab_oid . "' order by sort_oid") or die("Select Error");
    if (mysqli_num_rows($result) > 0) {

        while ($rec = mysqli_fetch_assoc($result)) {
            $responce['status'] = 'success';
            $tab_div .= "<div id='tab_oid_{$rec['oid']}' class='container tab-pane active'>
                 $div_panel
            </div>";
        }
    }
    $tab_div .= "</div>";
    return $tab_div;
}
