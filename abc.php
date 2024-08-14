<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <!-- Include your CSS and JS libraries here -->
</head>

<body>
    <div class="container-fluid" id="main_page_container" style="margin:1rem; padding:0.5rem;">
        <input type="hidden" id="form_mode" class="form_mode" value="show">
        <input type="hidden" id="tab_oid_flag" class="tab_oid_flag" value="">
        <input type="hidden" id="rule_batch_oid" class="rule_batch_oid" value="1">
        <input type="hidden" id="project_oid" class="project_oid" value="PRJ004">
        <input type="hidden" id="object_count" class="object_count" value="">
        <input type="hidden" id="run_rule_id" class="run_rule_id" value="">

        <div class="container-fluid project-title" style="text-align:center;">
            <p>SP</p>
        </div>

        <div id="div_project">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li id="tab_TAB007" onclick="loadTab('TAB007')">
                            <input type="hidden" id="tab_TAB007_value" value="1">
                            <input type="hidden" id="run_rule_id_TAB007" value="">
                            <input type="hidden" id="action_TAB007" value="">
                            <a data-toggle="tab" href="#tab1" aria-expanded="false">File Upload</a>
                        </li>
                        <li class="active" id="tab_TAB080" onclick="loadTab('TAB080')">
                            <input type="hidden" id="tab_TAB080_value" value="30">
                            <input type="hidden" id="run_rule_id_TAB080" value="">
                            <input type="hidden" id="action_TAB080" value="">
                            <a data-toggle="tab" href="#tab30" aria-expanded="true">New Tab</a>
                        </li>
                        <li id="tab_TAB081" onclick="loadTab('TAB081')">
                            <input type="hidden" id="tab_TAB081_value" value="31">
                            <input type="hidden" id="run_rule_id_TAB081" value="">
                            <input type="hidden" id="action_TAB081" value="">
                            <a data-toggle="tab" href="#tab31">New 1</a>
                        </li>
                        <li title="Create Tab" onclick="openCreateTabModal('PRJ004')" style="color:#337ab7;">
                            <a class="tab-title">
                                <span class="fa fa-plus-circle"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div>
            <div id="div_tab">
                <div class="tab_container">
                    <div class="container-fluid configure-panel">
                        <button class="btn btn-primary btn-xs" title="Add Panel"
                            onclick="loadCreatePanelModal('TAB080')">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-warning btn-xs" title="Configure Tab"
                            onclick="loadConfigureTabModal('TAB080')">
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-danger btn-xs" title="Delete Tab" onclick="deleteTab('TAB080')">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div id="tab30" class="tab-pane tab"
                        style="font-family:RomanArial; padding:0px; padding-right:2px;">
                        <div class="container-fluid" id="div_panel_parent">
                            <div class="container-fluid panel_container" id="div_panelPNL156">
                                <div
                                    style="text-align:center; font-family:sans-serif; border-color:#ffae52; font-weight:bold; font-size:14px;">
                                    <div class="configure-panel container-fluid">
                                        <button class="btn btn-warning btn-xs" title="Configure Panel"
                                            onclick="loadConfigurePanelModal('PNL156')">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </button>
                                        <button class="btn btn-danger btn-xs" title="Delete Panel"
                                            onclick="deletePanel('PNL156')">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div style="width:100%;">
                                        <div class="py-1" style="background-color:#ffae52; font-size:20px;">shivu</div>
                                    </div>
                                    <div class="bs5-row d-flex panel text-center p-1 m-1"
                                        style="background-color:transparent;">
                                        <div class="bs5-col panel_cell p-1 m-1">
                                            <div class="configure-panel container-fluid">
                                                <button class="btn btn-primary btn-xs" title="Add Section"
                                                    onclick="loadCreateSectionModal('PNL156',1,1)">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <div class="parent_section_container container-fluid"
                                                id="div_section_parent">
                                                <!-- Opening a Section -->
                                                <div class="section_container container-fluid" id="div_sectionSEC184">
                                                    <div class="section container-fluid" style="box-shadow:rgba(0, 0, 0, 0.35) 0px 5px 15px; text-align:left; font-family:Times New; padding:6px; font-size:16px; font-weight:bolder; border-radius:15px; box-shadow:rgba(0, 0, 0, 0.04)
                                                    0px 3px 5px; float:center;">
                                                        <div class="configure-panel container-fluid"
                                                            style="margin-right:0px; margin-top:0px;">
                                                            <button class="btn btn-warning btn-xs"
                                                                title="Configure Section"
                                                                onclick="loadConfigureSectionModal('SEC184','SEC184')">
                                                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                                            </button>
                                                            <button class="btn btn-danger btn-xs" title="Delete Section"
                                                                onclick="deleteSection('SEC184','SEC184')">
                                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                        <div style="width:100%; padding-bottom:15px;">
                                                            <div class="py-1"
                                                                style="text-align:left; padding-left:4px; font-size:18px; background-color:#1eb8eb; color:#ffffff; font-weight:bold; border-radius:10px !important;">
                                                                aaaaa</div>
                                                        </div>
                                                        <!-- Opening a row for section cells -->
                                                        <div class="bs5-row section d-flex"
                                                            style="width: 100%; padding-left: 15px;">
                                                            <!-- First section cell -->
                                                            <div class="bs5-col section_cell">
                                                                <!-- Opening a configure panel -->
                                                                <div class="configure-panel container-fluid"
                                                                    style="margin-right:0px; margin-top:0px;">
                                                                    <button class="btn btn-info btn-xs"
                                                                        title="Configure Object"
                                                                        onclick="loadConfigureObjectModal('SEC184',1,1,'lbl_customer_customer_name','lbl_customer_customer_name','label','theme1','lbl_customer_customer_name')">
                                                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                                                    </button>
                                                                    <button class="btn btn-danger btn-xs"
                                                                        title="Remove Mapped Object"
                                                                        onclick="deleteObjectMapping('SEC184',1,1,'lbl_customer_customer_name')">
                                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                                <!-- Input element with label -->
                                                                <div
                                                                    style="text-align:right; margin-bottom:10px; border:none; padding-top:2px; font-size:20px; font-family:cambria; padding-right:4px; color:#000042;">
                                                                    <label class=""
                                                                        style="text-align:right; margin-bottom:10px; border:none; padding-top:2px; font-size:20px; font-family:cambria; padding-right:4px; color:#000042;">
                                                                        Customer Name
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <!-- Second section cell -->
                                                            <div class="bs5-col section_cell">
                                                                <!-- Opening a configure panel -->
                                                                <div class="configure-panel container-fluid"
                                                                    style="margin-right:0px; margin-top:0px;">
                                                                    <button class="btn btn-info btn-xs"
                                                                        title="Configure Object"
                                                                        onclick="loadConfigureObjectModal('SEC184',1,2,'txt_Customer_Name','txt_Customer_Name','textbox','theme1','txt_Customer_Name')">
                                                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                                                    </button>
                                                                    <button title="Validate"
                                                                        onclick="loadObjectValidationModal('PRJ004','txt_Customer_Name')"
                                                                        type="button" class="btn btn-success btn-xs">
                                                                        <i aria-hidden="true"
                                                                            class="fa fa-code-fork"></i>
                                                                    </button>
                                                                    <button class="btn btn-danger btn-xs"
                                                                        title="Remove Mapped Object"
                                                                        onclick="deleteObjectMapping('SEC184',1,2,'txt_Customer_Name')">
                                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                                <!-- Input element -->
                                                                <input type="text" onblur="runRule_R70()"
                                                                    class="form-control input-sm"
                                                                    style="box-shadow:4px; text-align:left; color:#292424; border:1px solid; border-color:#c1bdbd; font-size:14px; height:2.85rem; border-radius:3px !important; font-family:cambria; border-color:#a8cec3;"
                                                                    placeholder="" name="txt_Customer_Name"
                                                                    id="txt_Customer_Name" value="">
                                                                <!-- Additional elements related to the input can be added here -->
                                                            </div>
                                                            <!-- Additional section cells can be added here -->
                                                        </div>
                                                        <!-- Additional rows can be added here -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Additional panels can be added here -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Additional tabs can be added here -->
                </div>
            </div>
        </div>
        <!-- Additional content can be added here -->
    </div>
    <!-- Additional containers or elements can be added here -->
</body>

</html>