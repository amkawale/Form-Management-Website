<?php
include ("php/config.php");
$object_id = "";
// exit;

?>
<div class="card-body">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <?php
        $q = "SELECT * FROM fm_object_type_master WHERE object_id NOT IN ('section','tab','panel','form_header','panel_header','section_header','session','readonly_textbox','color')";
        $rec = mysqli_query($con, $q);
        $rows = [];
        if ($rec) {
            // Fetch and store the results in an array
            while ($row = mysqli_fetch_assoc($rec)) {
                $rows[] = $row;
                ?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#object_content_<?php echo $row['object_id']; ?>"
                        onclick="loadThemeTable('object_content_<?php echo $row['object_id']; ?>','<?php echo $row['object_id']; ?>')"><?php echo ($row['object_type']); ?></a>
                </li>
                <?php
            }
        } else {
            // Handle the error
            echo "Error: " . mysqli_error($con);
        }
        ?>
    </ul>
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