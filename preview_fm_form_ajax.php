<?php
include_once ('global_function.php');
$ticket_oid = '';
if (isset($_REQUEST['json_param'])) {
    $json_param = ($_REQUEST['json_param']);



    if (isset($json_param['project_oid'])) {
        $project_oid = $json_param['project_oid'];

    } else {
        echo "<div class='alert alert-success'>
        <strong>Error!</strong> Invalid Request !.
        </div>";
        exit;
    }
    $form_structure = renderTab($json_param['project_oid']);
    echo $form_structure;
}

function renderTab($form_id)
{

    include ("php/config.php");
    $tab_head = "";
    ?>
    <div class="container mt-3">
        <?php
        $result = mysqli_query($con, "select * from fm_tab_master where form_id = '" . $form_id . "' order by sort_oid") or die("Select Error");
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $tab_head = generateObjectCSS($row['theme_id'], 'tab_header');
            // echo $tab_head;
            // exit;
        } else {
            echo "No results found.";
        }
        ?>
        <!-- Nav pills -->
        <ul class="nav nav-pills" role="tablist" style="<?php echo $tab_head ?>">
            <?php
            $result = mysqli_query($con, "select * from fm_tab_master where form_id = '" . $form_id . "' order by sort_oid") or die("Select Error");
            if (mysqli_num_rows($result) > 0) {
                while ($rec = mysqli_fetch_assoc($result)) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="pill"
                            onclick="loadTab('<?php echo $rec['oid'] ?>')"><?php echo $rec['tab_name'] ?></a>
                    </li>
                    <?php
                }
                ?>
                <!-- <li class="nav-item"> -->
                <!-- <a class="nav-link" data-bs-toggle="pill"> -->
                <!-- <button class="btn btn-info" data-bs-toggle="modal" -->
                <!-- data-bs-target="#exampleModal1"> -->
                <!-- Add Form -->
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" -->
                <!-- class="bi bi-plus-square-fill" viewBox="0 0 16 16"> -->
                <!-- <path -->
                <!-- d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0" /> -->
                <!-- </svg> -->
                <!-- </button> -->
                <!-- </a> -->
                <!-- </li> -->
            </ul>

        </div>
        <?php
            } else {
                echo 'No themes found';
            }
            ?>

    <?php
}
?>