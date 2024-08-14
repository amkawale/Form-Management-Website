<?php
function generateObjectCSS($theme_id = '', $object_id = '')
{
    include("php/config.php");
    // echo "select * from fm_theme_transaction a inner join fm_object_type_master b ON (a.object_type_id = b.object_type) where a.theme_id = '" . $theme_id . "' and b.object_id = '" . $object_id . "'";
    $css = "";
    $result = mysqli_query($con, "select * from fm_theme_transaction a inner join fm_object_type_master b ON (a.object_type_id = b.object_type) where a.theme_id = '" . $theme_id . "' and b.object_id = '" . $object_id . "'") or die("Select Error");
    if (mysqli_num_rows($result) > 0) {
        while ($rec = mysqli_fetch_assoc($result)) {
            $css .= $rec['css_property'] . ':' . $rec['css_property_value'] . ';';
        }
    }
    return $css;
}
