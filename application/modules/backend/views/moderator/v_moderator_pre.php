<style type="text/css">

    .shadow {
        -webkit-box-shadow: 1.5px 1.5px 4px 1px #ccc;  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
        -moz-box-shadow:    1.5px 1.5px 4px 1px #ccc;  /* Firefox 3.5 - 3.6 */
        box-shadow:        1.5px 1.5px 4px 1px #ccc;  /* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */
    }

    #task_tree_details table th{
        border-top:0px !important;
        border-bottom:0px !important;
    }
    #task_tree_details table td{
        border-top:0px !important;
        border-bottom:0px !important;
    }
    #task_files_details table th{
        border-top:0px !important;
        border-bottom:0px !important;
    }
    #task_files_details table td{
        border-top:0px !important;
        border-bottom:0px !important;
    }
    #task_status_details table th{
        border-top:0px !important;
        border-bottom:0px !important;
    }
    #task_status_details table td{
        border-top:0px !important;
        border-bottom:0px !important;
    }
    #task_remarks_details table th{
        border-top:0px !important;
        border-bottom:0px !important;
    }
    #task_remarks_details table td{
        border-top:0px !important;
        border-bottom:0px !important;
    }


    /************* Start switch **************/
    .anil_nepal{padding:0px 0px; width:100%; display:block;}
    .switch {
        position: relative;
        display: inline-block;
        vertical-align: top;
        width: 80px;
        height: 19px;
        padding: 3px;
        margin: 0 7px 8px 0;
        background: linear-gradient(to bottom, #eeeeee, #FFFFFF 25px);
        background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF 25px);
        border-radius: 18px;
        box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
        cursor: pointer;
        box-sizing: content-box;
    }
    label {
        font-weight: inherit;
    }
    input[type=checkbox], input[type=radio] {
        margin: 4px 0 0;

        line-height: normal;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 0;
    }


    .switch-input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        box-sizing: content-box;
    }
    .switch-left-right .switch-input:checked ~ .switch-label {
        background: inherit;
    }
    .switch-input:checked ~ .switch-label {
        background: #E1B42B;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
    }
    .switch-left-right .switch-label {
        overflow: hidden;
    }
    .switch-label, .switch-handle {
        transition: All 0.3s ease;
        -webkit-transition: All 0.3s ease;
        -moz-transition: All 0.3s ease;
        -o-transition: All 0.3s ease;
    }
    .switch-label {
        position: relative;
        display: block;
        height: inherit;
        font-size: 9px;
        text-transform: uppercase;
        background: #eceeef;
        border-radius: inherit;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
        box-sizing: content-box;
    }
    .switch-left-right .switch-input:checked ~ .switch-label:before {
        opacity: 1;
        left: 100px;
    }
    .switch-input:checked ~ .switch-label:before {
        opacity: 0;
    }
    .switch-left-right .switch-label:before {
        background: #eceeef;
        text-align: left;
        padding-left: 80px!important;
    }
    .switch-left-right .switch-label:before, .switch-left-right .switch-label:after {
        width: 20px;
        height: 20px;
        top: 4px;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 11px 0 0 0;
        text-indent: -12px;
        border-radius: 20px;
        box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.2), inset 0 0 3px rgba(0, 0, 0, 0.1);
    }
    .switch-label:before {
        content: attr(data-off);
        right: 11px;
        color: #aaaaaa;
        text-shadow: 0 1px rgba(255, 255, 255, 0.5);
    }

    span.switch-label:after {
        content: attr(data-on);
        left: 11px;
        color: #FFFFFF;
        text-shadow: 0 1px rgba(0, 0, 0, 0.2);
        position: absolute;

    }

    .switch-label:before, .switch-label:after {
        position: absolute;
        top: 50%;
        margin-top: -5px;
        line-height: 1;
        -webkit-transition: inherit;
        -moz-transition: inherit;
        -o-transition: inherit;
        transition: inherit;
        box-sizing: content-box;
    }

    .switch-left-right .switch-input:checked ~ .switch-label:after {
        left: 0!important;
        opacity: 1;
        padding-left: 20px;
    }


    .switch-input:checked ~ .switch-label:after {
        opacity: 1;
    }


    .switch-left-right .switch-label:after {
        text-align: left;
        text-indent: 9px;
        background: #FF7F50!important;
        left: -100px!important;
        opacity: 1;
        width: 100%!important;

    }
    .switch-left-right .switch-label::before, .switch-left-right .switch-label::after {
        width: 117px;
        height: 20px;
        top: -1px;
        left: -49px;
        right: 23px;
        bottom: 0;
        padding: 11px 0 0 0;
        text-indent: -12px;
        border-radius: 20px;
        box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.2), inset 0 0 3px rgba(0, 0, 0, 0.1);
    }
    .switch-input:checked ~ .switch-handle {
        left: 66px;
        box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
    }
    .switch-label, .switch-handle {
        transition: All 0.3s ease;
        -webkit-transition: All 0.3s ease;
        -moz-transition: All 0.3s ease;
        -o-transition: All 0.3s ease;
    }

    .switch-handle {
        position: absolute;
        top: 4px;
        left: 4px;
        width: 16px;
        height: 16px;
        background: linear-gradient(to bottom, #FFFFFF 40%, #f0f0f0);
        background-image: -webkit-linear-gradient(top, #FFFFFF 40%, #f0f0f0);
        border-radius: 100%;
        box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
    }

    .switch-handle:before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -6px 0 0 -6px;
        width: 12px;
        height: 12px;
        background: linear-gradient(to bottom, #eeeeee, #FFFFFF);
        background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF);
        border-radius: 6px;
        box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
    }
    /**************End switch************/         



    .dept-box .card-block :hover {
        background: #E9F9FF;
        color:#000;
    }
    .progress-bar[aria-valuenow="0"] {

        word-wrap:normal;
    }

    .border-bottom-primary:hover {
        cursor: pointer;
        color: #000;
        background: #E9F9FF;
    }

    .common-height{
        min-height:180px;
    }
    .dept-box{
        padding:0px 0px 0px 20px;
    }


    .dept-box:last-child {
        padding:0px 20px 0px 20px; 
    }




</style>

<div class="tab-content card-block">
    <div class="tab-pane active" id="home7" role="tabpanel">
        <div class="card">


            <div id="project_lists" class="card-block" >
                <div class="shadow table-responsive" style="border:1px solid #BFBFBF;padding:10px;">
                    <h3 style="text-align: center;">Ongoing Projects</h3>
                    <table id="" class="table">

                        <thead>

<!--                                                    <tr class="border-bottom-primary">-->
                            <tr class="">
                                <th style="width:10%;">Project Number</th>
                                <th style="width:40%;">Project Name</th>
                                <th style="width:10%;">Type Of Project</th>
                                <th style="width:10%;">Location of project </th>
                                <th style="width:15%;">Progress</th>
                                <th style="width:10%;">&nbsp;</th>

                            </tr>
                        </thead>
                        <tbody id="ongoingProjectTable">
                            <?php
                            if (count($projects)>0) {
                                foreach ($projects as $project) {
                                    ?>
                                    <tr class="border-bottom-primary" onclick="get_project_dept_info(<?php echo $project['project_id'] . ',' . $this->user_id; ?>)">
                                        <td>
        <?php echo $project['code']; ?>
                                        </td>
                                        <td>
                                            <a href="javascript:" onclick="get_project_dept_info(<?php echo $project['project_id'] . ',' . $this->user_id; ?>)"><?php echo summary($project['project_name'], 50); ?></a>
                                        </td>
                                        <td>
        <?php echo $project['ptype']; ?>
                                        </td>


                                        <td>
        <?php echo $project['site_location'] . ',' . $project['upazila'] . ',' . $project['district'] . ',' . $project['division'] . ',' . $project['country']; ?>
                                        </td>

                                        <td>
                                            <a href="javascript:" onclick="get_project_dept_info(<?php echo $project['project_id'] . ',' . $this->user_id; ?>)">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: <?php echo round($project['progress']); ?>%; <?php if (round($project['progress']) > 10) {
            echo 'color:#fff !important';
        } else {
            echo 'color:#000 !important';
        } ?>" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php echo round($project['progress'], 2); ?>%</div>
                                                </div>
                                            </a>    
                                        </td>
                                        <td>
                                            <?php if (!empty($project['pm'])) { ?>
                                                <div class="dropdown">
                                                    <i class="  fa fa-cogs" data-toggle="dropdown"></i>
                                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                        <li role="presentation"><a href="javascript:" onclick="make_as_complete(<?php echo $project['project_id']; ?>)" >Make As Complete</a></li>                                                                           
                                                </div>
                                    <?php } ?>
                                        </td>

                                    </tr>
    <?php
    }
}
?>

                        </tbody>

                    </table>
                </div>
            </div><!--End Ongoing Project Lists-->

            <div id="project_details"  style="display:none;" >
                <div class="card-block"  id="project_basic_info">
                    <div class="shadow table-responsive" style="border:1px solid #BFBFBF;padding:10px;">
                        <button id="back_project_list" class="btn btn-primary" style="float:left;padding:0px 6px;font-size:13px;" ><i class="fa fa-undo" aria-hidden="true"></i> Go Back</button> 

                        <h3 style="text-align: center;">Ongoing Project:<span id="project_code"></span></h3>
                        <table class="table">

                            <thead>

<!--                                                                <tr class="border-bottom-primary">-->
                                <tr>
                                    <th style="width:10%;">Project Code</th>
                                    <th style="width:40%;">Project Name</th>

                                    <th style="width:10%;">Location of project </th>
                                    <th style="width:15%;">Progress</th>

                                </tr>
                            </thead>
                            <tbody id="task_basic_info_details">


                            </tbody>

                        </table>
                    </div>
                </div><!--End Project Basic Info -->

                <div id="project_department" class="container-fluid">
                    <div id="project_department_all" class="row">

                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card sale-card">
                                <div class="card-header">
                                    <h5>Deals Analytics</h5>
                                </div>
                                <div class="card-block">
                                    <div id="sales-analytics" class="chart-shadow" style="height:380px"></div>
                                </div>
                            </div>
                        </div>  
                    </div>


                </div><!-- End Project Department -->

                <div id="department_details" style="display:none;">

                    <div id="dept_progress" style="margin-top:-30px;">
                        <div class="card-block"  >
                            <div class="shadow table-responsive" style="border:1px solid #BFBFBF;padding:10px;">
                                <button id="back_department_list" class="btn btn-primary" style="float:left;padding:0px 6px;font-size:13px;" ><i class="fa fa-undo" aria-hidden="true"></i> Go Back</button> 
                                <input type="hidden" id="specific_dept_id" value="" />
                                <input type="hidden" id="user_role" value="" />
                                <h3 style="text-align:center;"><span id="specific_dept_name">Design</span></h3>
                                <div class="progress" id="dept_progress_bar">
                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                </div>

                            </div>

                        </div><!--End Dept Block-->
                    </div><!--End Dept Progress Bar  -->

                    <div id="dept_task_list" style="margin-top:-30px;">
                        <div class="card-block"  >
                            <div class="shadow table-responsive" style="border:1px solid #BFBFBF;padding:10px;">
                                <table class="table">
                                    <thead>
                                        <tr class="">
                                            <th> SL</th>
                                            <th>Task Name</th>
                                            <th>Starting Date</th>
                                            <th>Ending Date</th>
                                            <th>Progress</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="dept_task_body">

                                    </tbody>
                                </table>

                            </div>

                        </div>

                    </div><!--End Dept Task List -->

                    <div id="dept_task_details" style="display:none;">
                        <div class="row">
                            <div class="col-md-7 " id="task_tree"  style="margin-top:-30px;">
                                <div class="card-block"  style="padding-right:0px;">
                                    <div class="shadow table-responsive common-height" style="border:1px solid #BFBFBF;padding:10px;">
                                        <button id="back_task_list" class="btn btn-primary" style="float:left;padding:0px 6px;font-size:13px;" ><i class="fa fa-undo" aria-hidden="true"></i> Go Back</button> 
                                        <h3 style="text-align: center;">Task Tree</h3>
                                        <div id="task_tree_details">
                                            <table class="table">
                                                <thead>
                                                    <tr class="">
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>

                                                        <th style="width:25%;"></th>

                                                    </tr>
                                                </thead>
                                                <tbody id="dept_task_detail_body">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><!--End Dept Block-->

                            </div><!--End task Tree-->

                            <div class="col-md-5 " id="dept_task_status" style="margin-top:-30px;padding-left: 0px;">
                                <div class="card-block"  style="padding-left: 0px;">
                                    <div class="shadow table-responsive common-height" style="border:1px solid #BFBFBF;padding:10px;">
                                        <h3 style="text-align: center;">Status</h3>
                                        <div id="task_status_details">
                                            <table class="table">
                                                <thead>
                                                    <tr class="">
                                                        <th></th>
                                                        <th></th>



                                                    </tr>
                                                </thead>
                                                <tbody id="dept_task_status_body">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><!--End Dept Block-->
                                <div id="reset_request_modal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Reset Status</h4>
                                                <button id="reset_request_close" type="button" class="close" data-dismiss="modal">&times;</button>

                                            </div>
                                            <div class="modal-body">
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="hidden" id="reset_task_id" value="" />
                                                            <input type="hidden" id="reset_status_id" value="" />
                                                            <input class="form-control "  id="reset_reason_id" name="comment" type="text" value="" placeholder="Reason">
                                                            <span id="reset_reason_error" style="color:red"></span>
                                                        </div>
                                                    </div>


                                                </div><!--End Row-->
                                            </div>
                                            <div class="modal-footer">
                                                <button id="reset_request_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                                <button id="save_reset_request" type="button" class="btn btn-primary" data-dismiss="modal" >Save</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div><!--End Status Tree-->

                            <div class="col-md-7 " id="dept_task_files" style="margin-top:-30px;">
                                <div class="card-block"  style="padding-right:0px;">
                                    <div class="shadow table-responsive common-height" style="border:1px solid #BFBFBF;padding:10px;">
                                        <div id="onscreen_uploader1" class="upload"> 

                                        </div>
                                        <!--
                                        <div id="onscreen_uploader" class="upload"> 

                                       </div>
                                       <input type="hidden" name="files" id="file_name"/>
                                       <input type="hidden" id="file_task_id"/>
                                        -->
                                        <h3 style="text-align: center;">Files</h3>
                                        <div id="task_files_details">
                                            <table class="table">
                                                <thead>
                                                    <tr class="">
                                                        <th></th>
                                                        <th></th>



                                                    </tr>
                                                </thead>
                                                <tbody id="dept_task_files_body">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><!--End Dept Block-->

                                <div id="delete_file_request_modal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete File</h4>
                                                <button id="reset_request_close" type="button" class="close" data-dismiss="modal">&times;</button>

                                            </div>
                                            <div class="modal-body">
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">

                                                            <input type="hidden" id="delete_file_id" value="" />
                                                            <input class="form-control "  id="delete_reason_id" name="delete_reason" type="text" value="" placeholder="Reason">
                                                            <span id="delete_reason_error" style="color:red"></span>
                                                        </div>
                                                    </div>


                                                </div><!--End Row-->
                                            </div>
                                            <div class="modal-footer">
                                                <button id="delete_request_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                                <button id="save_delete_request" type="button" class="btn btn-primary" data-dismiss="modal" >Save</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div><!--End Task Files-->

                            <div class="col-md-5 " id="dept_task_remarks" style="margin-top:-30px;padding-left: 0px;">
                                <div class="card-block" style="padding-left:0px;" >
                                    <div class="shadow table-responsive common-height" style="border:1px solid #BFBFBF;padding:10px;">
                                        <button id="add_remark" class="btn btn-primary" style="float:left;padding:2px 6px;font-size:10px;" data-toggle="modal" data-target="#commentModal"><i class="fa fa-plus" style="margin-right:0px"></i></button> <h3 style="text-align: center;">Remarks</h3>
                                        <div id="task_remarks_details">
                                            <table class="table">
                                                <thead>
                                                    <tr class="">
                                                        <th></th>
                                                        <th></th>



                                                    </tr>
                                                </thead>
                                                <tbody id="dept_task_remark_body">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><!--End Dept Block-->

                                <div id="commentModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Remark</h4>
                                                <button id="task_comment_close" type="button" class="close" data-dismiss="modal">&times;</button>

                                            </div>
                                            <div class="modal-body">
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="hidden" id="comment_task_id" value="" />
                                                            <input class="form-control "  id="comment" name="comment" type="text" value="">
                                                            <span id="dept_name_error" style="color:red"></span>
                                                        </div>
                                                    </div>


                                                </div><!--End Row-->
                                            </div>
                                            <div class="modal-footer">
                                                <button id="task_comment_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                                <button id="comment_save" type="button" class="btn btn-primary" data-dismiss="modal" >Save</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div id="editCommentModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Remark</h4>
                                                <button id="edit_comment_close" type="button" class="close" data-dismiss="modal">&times;</button>

                                            </div>
                                            <div class="modal-body">
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="hidden" id="edit_comment_task_id" value="" />
                                                            <input type="hidden" id="edit_comment_id" value="" />
                                                            <input class="form-control "  id="edit_comment" name="comment" type="text" value="">
                                                            <span id="edit_comment_error" style="color:red"></span>
                                                        </div>
                                                    </div>


                                                </div><!--End Row-->
                                            </div>
                                            <div class="modal-footer">
                                                <button id="edit_comment_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                                <button id="comment_update" type="button" class="btn btn-primary" data-dismiss="modal" >Update</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div><!--End task Remark-->



                        </div>
                    </div>

                    <div id="dept_task_status_details" style="display:none;">
                        <div class="row">
                            <div class="col-md-12" id="dept_task_detail_status_list" style="margin-top:-30px;">
                                <div class="card-block"  >
                                    <div class="shadow table-responsive" style="border:1px solid #BFBFBF;padding:10px;">
                                        <button id="" class="back_task_list btn btn-primary" style="float:left;padding:0px 6px;font-size:13px;" ><i class="fa fa-undo" aria-hidden="true"></i> Go Back</button> 
                                        <h3 style="text-align: center;">Status of <span id="status_task_name"></span></h3>
                                        <div id="task_status_details">
                                            <table class="table">
                                                <thead>
                                                    <tr class="">
                                                        <th></th>
                                                        <th></th>



                                                    </tr>
                                                </thead>
                                                <tbody id="dept_task_details_status_body">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><!--End Dept Block-->
                            </div><!--End Status Tree-->
                        </div> 
                        <div id="details_reset_status_request_modal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Request For Reset Status</h4>
                                        <button id="details_reset_request_close" type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" id="details_reset_status_task_id" value="" />
                                                    <input type="hidden" id="details_reset_status_id" value="" />
                                                    <input class="form-control "  id="details_reset_reason_id" name="comment" type="text" value="" placeholder="Reason">
                                                    <span id="details_reset_reason_error" style="color:red"></span>
                                                </div>
                                            </div>


                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button id="details_reset_request_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button id="details_save_reset_request" type="button" class="btn btn-primary" data-dismiss="modal" >Save</button>
                                    </div>
                                </div>

                            </div>
                        </div><!--End Reset Status Modal For all Status -->
                    </div><!--End Dept Task Status Details-->

                    <div id="dept_task_details_file" style="display:none;">
                        <div class="row">
                            <div class="col-md-12" id="dept_task_detail_status_list" style="margin-top:-30px;">
                                <div class="card-block"  >
                                    <div class="shadow table-responsive" style="border:1px solid #BFBFBF;padding:10px;">
                                        <button id="" class="back_task_list btn btn-primary" style="float:left;padding:0px 6px;font-size:13px;margin-right:5px;" ><i class="fa fa-undo" aria-hidden="true"></i> Go Back</button>

                                        <input type="hidden" name="files" id="file_name"/>
                                        <input type="hidden" id="file_task_id"/>
                                        <h3 style="text-align: center;">Files of <span id="file_task_name"></span></h3>
                                        <div id="task_files_details">
                                            <table class="table">
                                                <thead>
                                                    <tr class="">
                                                        <th></th>
                                                        <th></th>



                                                    </tr>
                                                </thead>
                                                <tbody id="dept_task_details_file_body">

                                                </tbody>
                                            </table>
                                        </div>
                                        <div id="onscreen_uploader" class="upload"> 

                                        </div>
                                    </div>
                                </div><!--End Dept Block-->
                            </div><!--End Status Tree-->
                        </div>   
                        <div id="delete_details_file_request_modal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Request For Delete File</h4>
                                        <button id="details_file_request_close" type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" id="delete_details_file_id" value="" />

                                                    <input class="form-control "  id="delete_details_reason_id" name="comment" type="text" value="" placeholder="Reason">
                                                    <span id="details_delete_file_reason_error" style="color:red"></span>
                                                </div>
                                            </div>


                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button id="" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button id="save_delete_details_file_request" type="button" class="btn btn-primary" data-dismiss="modal" >Save</button>
                                    </div>
                                </div>

                            </div>
                        </div><!--End Reset Status Modal For all Status -->
                    </div><!--End Dept Task File Details-->

                </div><!--End Project Department Details-->

            </div><!--End Project Details-->

        </div><!--End Parent Card block-->


    </div><!--End Ongoing Project Tab-->
</div>

<script type="text/javascript">
    //$("#order-table").orderable();
//    $("#ongoingProjectTable").orderable({
//        onLoad: function () { console.info('I loaded!') },
//        onInit: function () { console.info('I did all my thingies!') },
//        onOrderStart: function (element) { console.info('I\'m reordering! Selected unit: ', element) },
//        onOrderCancel: function (element) { console.info('I\'m not reordering anymore, I got cancelled! Selected unit: ', element) },
//        onOrderFinish: function (element) { console.info('I\'ve finished reordering! Selected unit: ', element) },
//        onOrderReorder: function (element) { console.info('I\'ve finished reordering and I definitely changed order! Changed unit: ', element) },
//    });
    $('#ongoingProjectTable').sortable();</script>




<script type="text/javascript">
    $('.back_task_list').click(function(){
    $('#dept_task_status_details').hide();
    $('#dept_task_details_file').hide();
    $('#dept_task_list').show();
    });
    function update_task_status(task_id = ''){
    // alert('test');
//                   $('#add_remark').hide();
//                   $('#upload_task_file').hide();
//                   $('#dept_task_detail_body a').css("border","none");
//                   $('#task_name_'+task_id).css("border","1px solid #00FF00");
//                   $('#comment_task_id').val(task_id);
//                   $('#file_task_id').val(task_id);
    $('#dept_task_status_details').show();
    $('#dept_task_list').hide();
    var dept_id = $('#specific_dept_id').val();
    var user_role = $('#user_role').val();
    var user_role_array = user_role.split(',');
    $.ajax({
    type:"POST",
            url:"backend/moderator/deptTaskDetailsStatus",
            data:{task_id:task_id, dept_id:dept_id},
            dataType: "json",
            success: function (data) {

//                               if(data.root_task!=''){
//                                   $('#add_remark').show();
//                                   $('#upload_task_file').show();
//                               }
            $('#status_task_name').html(data.task_information[0].task_name);
            var str1 = '';
            $(data.task_status).each(function (j, w) {
            str1 += '<tr class="border-bottom-primary">';
            if (w.status == "incomplete"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:red;>' + (w.status_name).substr(0, 50) + '<span></td>';
            } else if (w.status == "complete"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:green;>' + (w.status_name).substr(0, 50) + '<span></td>';
            } else if (w.status == "reset"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:blue;>' + (w.status_name).substr(0, 50) + '<span></td>';
            }
            str1 += '<td style="width:10%">';
            if (w.status == "incomplete"){
            //  str1+=' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            //   str1+='<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            if ($.inArray('4', user_role_array) > - 1){
            //str1+='<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:completeDetailsStatus('+w.task_id+','+w.dept_task_status_id+');"><i class="fa fa-trash"></i>Mark As Complete</a></li>';
            str1 += '<div class="anil_nepal"><label class="switch switch-left-right" ><input onclick="completeDetailsStatus(' + w.task_id + ',' + w.dept_task_status_id + ');" class="switch-input" type="checkbox">';
            str1 += '<span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> </label>';
            str1 += '</div>';
            }
            //  str1+='</ul></div>';
            } else if (w.status == "complete"){
            // str1+=' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            //  str1+='<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            if ($.inArray('4', user_role_array) > - 1){
            //  str1+='<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:detailsResetStatus('+w.task_id+','+w.dept_task_status_id+');"><i class="fa fa-eye"></i>Request For Reset</a></li>';
            str1 += '<div class="anil_nepal"><label class="switch switch-left-right" ><input onclick="detailsResetStatus(' + w.task_id + ',' + w.dept_task_status_id + ');" class="switch-input" checked type="checkbox">';
            str1 += '<span class="switch-label" data-on="Reset" data-off="Off"></span> <span class="switch-handle"></span> </label>';
            str1 += '</div>';
            }
            // str1+='</ul></div>'; 
            }
            str1 += '</td>';
            str1 += '</tr>';
            });
            $('#dept_task_details_status_body').html(str1);
            }

    }); //end Ajax
    }

    function completeDetailsStatus(task_id = '', status_id = ''){

    var dept_id = $('#specific_dept_id').val();
    var r = confirm("Are you sure?");
    var user_role = $('#user_role').val();
    var user_role_array = user_role.split(',');
    if (r == true){
    var r_status = validate_password();
    if (r_status == true){
    $.ajax({
    type:"POST",
            url:"backend/moderator/completeStatus",
            data:{task_id:task_id, status_id:status_id, dept_id:dept_id},
            dataType:"json",
            success: function (data) {

            if (data.status == "success"){

            var str1 = '';
            $(data.task_status).each(function (j, w) {
            str1 += '<tr class="border-bottom-primary">';
            if (w.status == "incomplete"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:red;>' + (w.status_name).substr(0, 50) + '<span></td>';
            } else if (w.status == "complete"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:green;>' + (w.status_name).substr(0, 50) + '<span></td>';
            } else if (w.status == "reset"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:blue;>' + (w.status_name).substr(0, 50) + '<span></td>';
            }
            str1 += '<td style="width:10%">';
            if (w.status == "incomplete"){
            //str1+=' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            // str1+='<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            if ($.inArray('4', user_role_array) > - 1){
            //  str1+='<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:completeDetailsStatus('+w.task_id+','+w.dept_task_status_id+');"><i class="fa fa-trash"></i>Mark As Complete</a></li>';
            str1 += '<div class="anil_nepal"><label class="switch switch-left-right" ><input onclick="completeDetailsStatus(' + w.task_id + ',' + w.dept_task_status_id + ');" class="switch-input" type="checkbox">';
            str1 += '<span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> </label>';
            str1 += '</div>';
            }
            // str1+='</ul></div>';
            } else if (w.status == "complete"){
            // str1+=' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            //   str1+='<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            if ($.inArray('4', user_role_array) > - 1){
            //str1+='<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:detailsResetStatus('+w.task_id+','+w.dept_task_status_id+');"><i class="fa fa-eye"></i>Request For Reset</a></li>';
            str1 += '<div class="anil_nepal"><label class="switch switch-left-right" ><input onclick="detailsResetStatus(' + w.task_id + ',' + w.dept_task_status_id + ');" class="switch-input" checked type="checkbox">';
            str1 += '<span class="switch-label" data-on="Reset" data-off="Off"></span> <span class="switch-handle"></span> </label>';
            str1 += '</div>';
            }
            //str1+='</ul></div>'; 
            }
            str1 += '</td>';
            str1 += '</tr>';
            });
            $('#dept_task_details_status_body').html(str1);
            }
            }
    });
    }
    }
    }


    function detailsResetStatus(task_id = '', status_id = ''){
    var dept_id = $('#specific_dept_id').val();
    var r = confirm("Are you sure?");
    if (r == true){
    var r_status = validate_password();
    if (r_status == true){
    $('#details_reset_status_task_id').val(task_id);
    $('#details_reset_status_id').val(status_id);
    $('#details_reset_status_reason_id').val('');
    $('#details_reset_status_request_modal').modal('show');
    }
    }
    }



    $('#details_save_reset_request').click(function(){
    var dept_id = $('#specific_dept_id').val();
    var task_id = $('#details_reset_status_task_id').val();
    var status_id = $('#details_reset_status_id').val();
    var reason = $('#details_reset_reason_id').val();
    $.ajax({
    type:"POST",
            url:"backend/moderator/resetStatus",
            data:{task_id:task_id, status_id:status_id, dept_id:dept_id, reason:reason},
            dataType:"json",
            success: function (data) {
            $('#details_reset_status_task_id').val('');
            $('#details_reset_status_id').val('');
            $('#details_reset_reason_id').val('');
            if (data.status == "success"){

            var str1 = '';
            $(data.task_status).each(function (j, w) {
            str1 += '<tr class="border-bottom-primary">';
            if (w.status == "incomplete"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:red;>' + (w.status_name).substr(0, 50) + '<span></td>';
            } else if (w.status == "complete"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:green;>' + (w.status_name).substr(0, 50) + '<span></td>';
            } else if (w.status == "reset"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:blue;>' + (w.status_name).substr(0, 50) + '<span></td>';
            }
            str1 += '<td style="width:10%">';
            if (w.status == "incomplete"){
//                                       str1+=' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
//                                       str1+='<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
//                                       str1+='<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:completeDetailsStatus('+w.task_id+','+w.dept_task_status_id+');"><i class="fa fa-trash"></i>Mark As Complete</a></li>';
//                                       str1+='</ul></div>';
            str1 += '<div class="anil_nepal"><label class="switch switch-left-right" ><input onclick="completeDetailsStatus(' + w.task_id + ',' + w.dept_task_status_id + ');" class="switch-input" type="checkbox">';
            str1 += '<span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> </label>';
            str1 += '</div>';
            } else if (w.status == "complete"){
//                                       str1+=' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
//                                       str1+='<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
//                                       str1+='<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:detailsResetStatus('+w.task_id+','+w.dept_task_status_id+');"><i class="fa fa-eye"></i>Request For Reset</a></li>';
//                                       str1+='</ul></div>'; 
            str1 += '<div class="anil_nepal"><label class="switch switch-left-right" ><input onclick="detailsResetStatus(' + w.task_id + ',' + w.dept_task_status_id + ');" class="switch-input" checked type="checkbox">';
            str1 += '<span class="switch-label" data-on="Reset" data-off="Off"></span> <span class="switch-handle"></span> </label>';
            str1 += '</div>';
            }
            str1 += '</td>';
            str1 += '</tr>';
            });
            $('#dept_task_details_status_body').html(str1);
            }
            }
    }); });
    function view_task_file(task_id = ''){
    var dept_id = $('#specific_dept_id').val();
    $('#file_task_id').val(task_id);
    $('#dept_task_details_file').show();
    $('#dept_task_list').hide();
    var user_role = $('#user_role').val();
    var user_role_array = user_role.split(',');
    if ($.inArray('4', user_role_array) > - 1){
    $('#onscreen_uploader').show();
    $('#onscreen_uploader1').show();
    } else{
    $('#onscreen_uploader').hide();
    $('#onscreen_uploader1').hide();
    }
    $.ajax({
    type:"POST",
            url:"backend/moderator/deptTaskDetailsFile",
            data:{task_id:task_id, dept_id:dept_id},
            dataType: "json",
            success: function (data) {
            $('#file_task_name').html(data.task_information[0].task_name);
            var str = '';
            $(data.task_files).each(function (i, v) {
            str += '<tr class="border-bottom-primary">';
            str += '<td style="width:50%"><i style="padding:5px;"  class="fa fa-file-archive-o"></i>' + v.file_name + '</td>';
            str += '<td style="width:10%">';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            //str+='<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:fileDownload('+v.file_id+');"><i class="fa fa-eye"></i>View Or Download</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('backend/moderator/fileDownload'); ?>/' + v.file_id + '"><i class="fa fa-eye"></i>View Or Download</a></li>';
            if ($.inArray('4', user_role_array) > - 1){
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:deleteDetailsFileRequest(' + v.file_id + ');"><i class="fa fa-trash"></i>Request For Delete</a></li>';
            }
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            $('#dept_task_details_file_body').html(str);
            }

    }); //end Ajax
    }

    function deleteDetailsFileRequest(file_id = ''){

    var dept_id = $('#specific_dept_id').val();
    var r = confirm("Are you sure to delete this file?");
    if (r == true){
    var r_status = validate_password();
    if (r_status == true){
    //  alert(file_id);
    $('#delete_details_file_id').val(file_id);
    $('#delete_details_reason_id').val('');
    $('#delete_details_file_request_modal').modal('show');
    }
    }
    }

    $('#save_delete_details_file_request').click(function(){
    var dept_id = $('#specific_dept_id').val();
    var file_id = $('#delete_details_file_id').val();
    var reason = $('#delete_details_reason_id').val();
    $.ajax({
    type:"POST",
            url:"backend/moderator/requestForDeleteFile",
            data:{file_id:file_id, dept_id:dept_id, reason:reason},
            dataType:"json",
            success: function (data) {

            $('#delete_details_file_id').val('');
            $('#delete_details_reason_id').val('');
            if (data.status == "success"){
            alert('Successfully Request Sent');
            }
            }
 });
    });
    var uploader;
    var temp_file_paths = new Array();
    var file_names = new Array();
    var temp_name;
    $(document).ready(function () {

    $('div[id*="temp_image_"]').on('mouseenter', function () {
    var id = $(this).attr('id');
    $('#' + id).children('.templete_delete').show();
    })
            $('div.temp_image').on('mouseleave', function () {
    $('span.templete_delete').hide();
    })
            initiateUploader($('#file_task_id').val(), $('#specific_dept_id').val());
    $('.btnStart').on('click', function (e) {
    e.preventDefault();
    if ($('select#template').val() == 'null') {
    alert('Please select any templete');
    } else {
    startUpload();
    }

    });
    $('.btnCancel').on('click', function (e) {
    e.preventDefault();
    uploader.stop()
            uploader.splice();
    $(".progressing").hide();
    $(".btnCancel").addClass("disable");
    $(".idle").show();
    });
    $('#onscreen_uploader_browse').html('<i class="fa fa-upload" aria-hidden="true"></i> &nbsp; Upload File');
    $('#onscreen_uploader1_browse').html('<i class="fa fa-upload" aria-hidden="true"></i> &nbsp; Upload File');
    });
    function initiateUploader(task_id, dept_id) {
    //   var dept_id=$('#specific_dept_id').val();
    //      alert(task_id);
    var file_names = new Array();
    $("#onscreen_uploader1").html("");
    $("#onscreen_uploader").html("");
    $("#onscreen_uploader").pluploadQueue({
    // General settings
    runtimes: 'html5,silverlight,flash,html4',
            url: '<?php echo site_url("moderator/image_upload/"); ?>',
            max_file_size: '1024mb',
            chunk_size: '2mb',
            multipart_params:{'task_id':task_id, 'dept_id':dept_id},
            unique_names: true,
            multiple_queues: true,
            rename: true,
            flash_swf_url: 'uploader_js/plupload.flash.swf',
            silverlight_xap_url: 'uploader_js/plupload.silverlight.xap'
    });
    $("#onscreen_uploader1").pluploadQueue({
    // General settings
    runtimes: 'html5,silverlight,flash,html4',
            url: '<?php echo site_url("moderator/image_upload/"); ?>',
            max_file_size: '1024mb',
            chunk_size: '2mb',
            multipart_params:{'task_id':task_id, 'dept_id':dept_id},
            unique_names: true,
            multiple_queues: true,
            rename: true,
            flash_swf_url: 'uploader_js/plupload.flash.swf',
            silverlight_xap_url: 'uploader_js/plupload.silverlight.xap'
    });
    uploader = $('#onscreen_uploader').pluploadQueue();
    uploader1 = $('#onscreen_uploader1').pluploadQueue();
    uploader.bind("FileUploaded", function (up, file, response) {

    $.extend(up.settings.multipart_params, {
    'task_id': $('#file_task_id').val(),
            'dept_id': $('#specific_dept_id').val(),
    });
    var data = $.parseJSON(response.response);
    if (typeof (data.temp_file_path) != 'undefined' && data.temp_file_path != "") {
    temp_file_paths.push(data.temp_file_path);
    }
    if (typeof (data.file_name) != 'undefined' && data.file_name != "") {
    file_names.push(data.file_name);
    }
    var str = '';
    str += '<tr class="border-bottom-primary">';
    str += '<td style="width:50%"><i style="padding:5px;"  class="fa fa-file-archive-o"></i>' + data.file_name + '</td>';
    str += '<td style="width:10%">';
    str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
    str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
    str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('backend/moderator/fileDownload'); ?>/' + data.file_id + '"><i class="fa fa-eye"></i>View Or Download</a></li>';
    str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:deleteRequest(' + data.file_id + ');"><i class="fa fa-trash"></i>Request For Delete</a></li>';
    str += '</ul></div>';
    str += '</td>';
    str += '</tr>';
    // $('#dept_task_files_body').append(str);
    $('#dept_task_details_file_body').append(str);
    });
    uploader1.bind("FileUploaded", function (up, file, response) {

    $.extend(up.settings.multipart_params, {
    'task_id': $('#file_task_id').val(),
            'dept_id': $('#specific_dept_id').val(),
    });
    var data = $.parseJSON(response.response);
    if (typeof (data.temp_file_path) != 'undefined' && data.temp_file_path != "") {
    temp_file_paths.push(data.temp_file_path);
    }
    if (typeof (data.file_name) != 'undefined' && data.file_name != "") {
    file_names.push(data.file_name);
    }
    var str = '';
    str += '<tr class="border-bottom-primary">';
    str += '<td style="width:50%"><i style="padding:5px;"  class="fa fa-file-archive-o"></i>' + data.file_name + '</td>';
    str += '<td style="width:10%">';
    str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
    str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
    str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('backend/moderator/fileDownload'); ?>/' + data.file_id + '"><i class="fa fa-eye"></i>View Or Download</a></li>';
    str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:deleteRequest(' + data.file_id + ');"><i class="fa fa-trash"></i>Request For Delete</a></li>';
    str += '</ul></div>';
    str += '</td>';
    str += '</tr>';
    // $('#dept_task_files_body').append(str);
    $('#dept_task_details_file_body').append(str);
    $('#dept_task_files_body').append(str);
    });
    uploader.bind('BeforeUpload', function (up) {
    $.extend(up.settings.multipart_params, {
    'task_id': $('#file_task_id').val(),
            'dept_id': $('#specific_dept_id').val(),
    });
    });
    uploader1.bind('BeforeUpload', function (up) {
    $.extend(up.settings.multipart_params, {
    'task_id': $('#file_task_id').val(),
            'dept_id': $('#specific_dept_id').val(),
    });
    });
    uploader.bind('UploadFile', function (up, file) {

    //  var dept_id=$('#specific_dept_id').val();

    $.extend(up.settings.multipart_params, {
    'realName': file.name,
            'dept_id': $('#specific_dept_id').val(),
            'task_id': $('#file_task_id').val()
    });
    });
    uploader1.bind('UploadFile', function (up, file) {

    //  var dept_id=$('#specific_dept_id').val();

    $.extend(up.settings.multipart_params, {
    'realName': file.name,
            'dept_id': $('#specific_dept_id').val(),
            'task_id': $('#file_task_id').val()
    });
    });
    uploader.bind('QueueChanged', function () {
    //uploader.start();
    $(".progressing").show();
    $(".btnCancel").removeClass("disable");
    $(".idle").hide();
    });
    uploader1.bind('QueueChanged', function () {
    //uploader.start();
    $(".progressing").show();
    $(".btnCancel").removeClass("disable");
    $(".idle").hide();
    });
    uploader.bind('UploadComplete', function () {

    $(".progressing").hide();
    $(".btnCancel").addClass("disable");
    $(".idle").show();
    var temp = temp_file_paths.join("?~?");
    var file = file_names.join("?~?");
    $("#temp_file_path").val(temp);
    var existing_files = $("#file_name").val();
    if (existing_files != '') {
    // existing_files = existing_files.slice(0, -1);
    $("#file_name").val(file_names + ',' + existing_files);
    //   show_image(file_names + ',' + existing_files)

    } else {
    $("#file_name").val(file_names);
    // show_image(file_names)

    }

    initiateUploader($('#file_task_id').val(), $('#specific_dept_id').val());
    var templete = $('#hidden').val();
    $('#onscreen_uploader_browse').html('Select File');
    });
    uploader1.bind('UploadComplete', function () {

    $(".progressing").hide();
    $(".btnCancel").addClass("disable");
    $(".idle").show();
    var temp = temp_file_paths.join("?~?");
    var file = file_names.join("?~?");
    $("#temp_file_path").val(temp);
    var existing_files = $("#file_name").val();
    $('#task_name_'+$('#file_task_id').val()).click()
    if (existing_files != '') {
    // existing_files = existing_files.slice(0, -1);
    $("#file_name").val(file_names + ',' + existing_files);
    //   show_image(file_names + ',' + existing_files)

    } else {
    $("#file_name").val(file_names);
    // show_image(file_names)

    }

    initiateUploader($('#file_task_id').val(), $('#specific_dept_id').val());
    var templete = $('#hidden').val();
    $('#onscreen_uploader1_browse').html('Select File');
    });
    }

    function startUpload() {
    //$("#file_name").val('');
    uploader.start();
    uploader1.start();
    $('.btnStart').hide();
    $('.btnCancel').show();
    }
    function show_image(files) {
    files = $('#file_name').val();
    files = files.toString().split(",");
    var str = '';
    $(files).each(function (i, v) {
    v = v.replace(v + ',', "");
    if (v != '') {

    str += '<tr class="border-bottom-primary">';
    str += '<td style="width:50%"><i style="padding:5px;"  class="fa fa-file-archive-o"></i>' + v + '</td>';
    str += '<td style="width:10%">';
    str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
    str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
    str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('backend/moderator/fileDownload'); ?>/' + v + '"><i class="fa fa-eye"></i>View Or Download</a></li>';
    str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:deleteRequest(' + v + ');"><i class="fa fa-trash"></i>Request For Delete</a></li>';
    str += '</ul></div>';
    str += '</td>';
    str += '</tr>';
    //     template_content += "<div  id='temp_image_" + i + "'><span style='' class='templete_delete' id='templete_delete_" + i + "'><span class='delete_image' id='delete_image_" + i + "' style='display:none'>" + v + "</span><img src='<?php echo site_url(); ?>assets/images/btn_delete.png'/></span><a style='height:80px;' href='<?php echo site_url(); ?>uploads/attach/" + v + "'>" + v + "</a></div>";
    }
    })
            $('#dept_task_files_body').html(str);
    }


    //Div Link 
    $('#back_project_list').click(function(){
    $('#project_details').hide();
    $('#department_details').hide();
    $('#dept_task_details').hide();
    $('#dept_task_status_details').hide();
    $('#dept_task_details_file').hide();
    $('#project_department').show();
    $('#dept_task_list').show();
    $('#project_lists').show();
    });
    $('#back_department_list').click(function(){
    $('#dept_task_list').show();
    $('#dept_task_status_details').hide();
    $('#dept_task_details_file').hide();
    $('#department_details').hide();
    $('#dept_task_details').hide();
    $('#project_department').show();
    });
    $('#back_task_list').click(function(){
    $('#dept_task_details').hide();
    $('#dept_task_list').show();
    });
    //Div Link End


    //Ongoing Project
    function get_project_dept_info(project_id = '', user_id = ''){
    $('#project_lists').hide();
    //alert('test');
    $.ajax({
    type:"POST",
            url:"backend/moderator/projectAllDepartment",
            data:{project_id:project_id, user_id:user_id},
            dataType: "json",
            success: function (data) {
            //    alert('test');
            // var user_role=data.user_roles;
            // alert(data.user_roles);
            var project_code = data.project_info[0].code;
            // $('#user_role').val(user_role);
            $('#project_code').html(project_code);
            var str = '';
            $(data.project_info).each(function (i, v) {
            var description = v.project_name.substring(0, 50);
            str += '<tr class="border-bottom-primary">';
            str += '<td>' + v.code + '</td>';
            str += '<td>' + description + '</td>';
            str += '<td>' + v.site_location + ',' + v.upazila + ',' + v.district + ',' + v.division + ',' + v.country + '</td>';
            str += '<td><div class="progress"><div class="progress-bar" role="progressbar" style="width: ' + v.progress + '%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">' + parseFloat(v.progress).toFixed(2) + '%</div></div></td>';
            str += '</tr>';
            });
            $('#task_basic_info_details').html(str);
            var str1 = '';
            //str1+='<div class="row">';
            $(data.project_departments).each(function (j, w) {
            if ((user_id == w.user_id) || data.user_roles == 3){
            str1 += '<div class="col-md-2 dept-box" style="margin-top:-30px;"><a href="javascript:" onclick="get_dept_task_info(' + w.dept_id + ',' + w.project_id + ')"><div class="card-block" style="padding:15px 0px;"><div class="shadow table-responsive" style="border:1px solid #BFBFBF;padding:10px;">';
            } else{
            if ($.inArray('2', data.user_roles) > - 1){
            str1 += '<div class="col-md-2 dept-box" style="margin-top:-30px;"><a href="javascript:" onclick="get_dept_task_info(' + w.dept_id + ',' + w.project_id + ')"><div class="card-block" style="padding:15px 0px;"><div class="shadow table-responsive" style="border:1px solid #BFBFBF;padding:10px;">';
            } else{
            str1 += '<div class="col-md-2 dept-box" style="margin-top:-30px;"><div class="card-block" style="padding:15px 0px;"><div class="shadow table-responsive" style="border:1px solid #BFBFBF;padding:10px;">';
            }
            }
            str1 += '<h5 style="text-align: center;">' + w.dept_name + '</h5>';
            str1 += '<div class="progress"><div class="progress-bar" role="progressbar" style="width: ' + w.progress + '%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">' + parseFloat(w.progress).toFixed(2) + '%</div>';
            if ((user_id == w.user_id) || data.user_roles == 3){
            str1 += '</div></div></div></a></div>';
            } else{
            str1 += '</div></div></div></div>';
            }
            });
            //str1+='</div><div class="clearfix"></div>';
            str1 += '</div>';
            $('#project_department_all').html(str1);
            $('#project_details').show();
            }

    }); //end Ajax
    }

    function get_dept_task_info(dept_id = '', project_id = ''){
    $('#specific_dept_id').val(dept_id);
    $('#department_details').show();
    $('#project_department').hide();
    //var test=$.inArray('1', user_role_array)

    $.ajax({
    type:"POST",
            url:"backend/moderator/get_dept_task_list",
            data:{'dept_id':dept_id, 'project_id':project_id},
            dataType: "json",
            success: function (data) {
            var user_role = data.user_roles;
            $('#user_role').val(user_role);
            var user_role_array = user_role.split(',');
            if (data.status == 'success'){
            var dept_info = data.depertment_info[0].dept_name;
            var progress = data.depertment_info[0].progress;
            $('#specific_dept_name').html(dept_info);
            $('#dept_progress_bar').html('<div class="progress-bar" role="progressbar" style="width: ' + progress + '%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">' + parseFloat(progress).toFixed(2) + '%</div>');
            var str = '';
            var j = 0;
            $(data.tasks).each(function (i, v) {
            j = j + 1;
            if (v.sub_tasks != ''){
            str += '<tr class="border-bottom-primary">';
            str += '<td>' + j + '</td>';
            str += '<td>';
            str += '<i id="expand_subtask_' + j + '" class="fa fa-plus" onclick="javascript:expandSubtask(' + j + ')"></i>';
            str += ' <i style="display:none;" id="collapse_subtask_' + j + '"  class="fa fa-minus" onclick="javascript:collapseSubtask(' + j + ')"></i>';
            str += '&nbsp;&nbsp;&nbsp;' + v.task_name;
            str += '</td>';
            str += '<td id="startdate_' + v.task_id + '">' + ' ' + '</td>';
            str += '<td id="enddate_' + v.task_id + '">' + ' ' + '</td>';
            str += '<td>';
            str += '<div class="progress">';
            str += '<div class="progress-bar" role="progressbar" style="width: ' + v.percentage + '%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">' + parseFloat(v.percentage).toFixed(2) + '%</div>';
            str += '</div>';
            str += '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:expandSubtask(' + j + ');"><i class="fa fa-plus"></i>Expand</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:veiw_task(' + v.task_id + ');"><i class="fa fa-eye"></i>View Details</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            var k = 0;
            var I = 0;
            $(v.sub_tasks).each(function (m, n) {

            k = k + 1;
            l = j + "." + k;
            if (n.sub_sub_tasks != ''){

            str += '<tr class="subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td>' + j + "." + k; + '</td>';
            str += '<td style="padding-left:1.9rem !important;">';
            str += '<i id="expand_root_task_' + j + k + '" class="expand_root_task' + j + ' fa fa-plus" onclick="javascript:expandRoottask(' + j + ',' + k + ')"></i>';
            str += '<i style="display:none;" id="collapse_root_task_' + j + k + '" class="collapse_root_task' + j + ' fa fa-minus" onclick="javascript:collapseRoottask(' + j + ',' + k + ')"></i>';
            str += '&nbsp;&nbsp;&nbsp;' + n.task_name;
            str += '</td>';
            str += '<td id="startdate_' + n.task_id + '">' + ' ' + '</td>';
            str += '<td id="enddate_' + n.task_id + '">' + ' ' + '</td>';
            str += '<td>';
            str += '<div class="progress">';
            str += '<div class="progress-bar" role="progressbar" style="width: ' + n.percentage + '%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">' + parseFloat(n.percentage).toFixed(2) + '%</div>';
            str += '</div>';
            str += '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:expandRoottask(' + j + ',' + k + ');"><i class="fa fa-plus"></i>Expand</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            var a = 0;
            $(n.sub_sub_tasks).each(function (o, p) {
            a = a + 1;
            b = j + "." + k + "." + a;
            str += '<tr class="root_task roottask' + j + k + ' border-bottom-primary" style="display:none;">';
            str += '<td style="">' + b + '</td>';
            str += '<td style="padding-left:5.0rem !important;">' + p.task_name + '</td>';
            str += '<td id="startdate_' + p.task_id + '">' + ' ' + '</td>';
            str += '<td id="enddate_' + p.task_id + '">' + ' ' + '</td>';
            str += '<td>';
            str += '<div class="progress">';
            str += '<div class="progress-bar" role="progressbar" style="width: ' + p.percentage + '%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">' + parseFloat(p.percentage).toFixed(2) + '%</div>';
            str += '</div>';
            str += '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            if ($.inArray('4', user_role_array) > - 1){
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:update_task_status(' + p.task_id + ');"><i class="fa fa-edit"></i>Update Status</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:view_task_file(' + p.task_id + ');"><i class="fa fa-plus"></i>Upload File</a></li>';
            }
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:view_task_file(' + p.task_id + ');"><i class="fa fa-eye"></i>View Files</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            } else{
            str += '<tr class="subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="">' + l + '</td>';
            str += '<td style="padding-left:3.0rem !important;">' + n.task_name + '</td>';
            str += '<td id="startdate_' + n.task_id + '">' + ' ' + '</td>';
            str += '<td id="enddate_' + n.task_id + '">' + ' ' + '</td>';
            str += '<td>';
            str += '<div class="progress">';
            str += '<div class="progress-bar" role="progressbar" style="width: ' + n.percentage + '%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">' + parseFloat(n.percentage).toFixed(2) + '%</div>';
            str += '</div>';
            str += '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            if ($.inArray('4', user_role_array) > - 1){
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:update_task_status(' + n.task_id + ',' + n.parent_task_id + ');"><i class="fa fa-edit"></i>Update Status</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:view_task_file(' + n.task_id + ');"><i class="fa fa-plus"></i>Upload File</a></li>';
            }
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:view_task_file(' + n.task_id + ');"><i class="fa fa-eye"></i>View Files</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            }
            });
            } else{
            str += '<tr class="subtask' + j + ' border-bottom-primary">';
            str += '<td>' + j + '</td>';
            str += '<td>' + v.task_name + '</td>';
            str += '<td id="startdate_' + v.task_id + '">' + ' ' + '</td>';
            str += '<td id="enddate_' + v.task_id + '">' + ' ' + '</td>';
            str += '<td>';
            str += '<div class="progress">';
            str += '<div class="progress-bar" role="progressbar" style="width: ' + v.percentage + '%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">' + parseFloat(v.percentage).toFixed(2) + '%</div>';
            str += '</div>';
            str += '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:veiw_task(' + v.task_id + ');"><i class="fa fa-eye"></i>View Details</a></li>';
            if ($.inArray('4', user_role_array) > - 1){
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:update_task_status(' + v.task_id + ');"><i class="fa fa-edit"></i>Update Status</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:view_task_file(' + v.task_id + ');"><i class="fa fa-plus"></i>Upload File</a></li>';
            }
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:view_task_file(' + v.task_id + ');"><i class="fa fa-eye"></i>View Files</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            }

            });
            $('#dept_task_body').html(str);
            $("td[id*='startdate_']").html('');
            $("td[id*='enddate_']").html('');
            $(data.data).each(function(r, w){
            $('#startdate_' + w.task_id).html(dateToDMY(w.start_date));
            $('#enddate_' + w.task_id).html(dateToDMY(w.end_date));
            });
            }
            }
    });
    }

    function expandSubtask(id = ''){
    $('#expand_subtask_' + id).hide();
    $('#collapse_subtask_' + id).show();
    $('.subtask' + id).show();
    }

    function collapseSubtask(id = ''){
    $('.expand_root_task' + id).show();
    $('.collapse_root_task' + id).hide();
    $('#expand_subtask_' + id).show();
    $('#collapse_subtask_' + id).hide();
    $('.subtask' + id).hide();
    //$('.roottask'+id).hide();
    $('.root_task').hide();
    }

    function expandRoottask(id = '', sub = ''){
    $('#expand_root_task_' + id + sub).hide();
    $('#collapse_root_task_' + id + sub).show();
    $('.roottask' + id + sub).show();
    }

    function collapseRoottask(id = '', sub = ''){
    $('#expand_root_task_' + id + sub).show();
    $('#collapse_root_task_' + id + sub).hide();
    $('.roottask' + id + sub).hide();
    }
    //Details task start
    function veiw_task(task_id){
    var dept_id = $('#specific_dept_id').val();
    $('#dept_task_list').hide();
    $('#add_remark').hide();
    $('#onscreen_uploader').hide();
     var user_role = $('#user_role').val();
    var user_role_array = user_role.split(',');
    if ($.inArray('4', user_role_array) > - 1){
    $('#onscreen_uploader1').show();
    } else{
    $('#onscreen_uploader1').hide();
    }
    $('#dept_task_remark_body').html('');
    $('#dept_task_status_body').html('');
    $('#dept_task_files_body').html('');
    $('#dept_task_details').show();
    $.ajax({
    type:"POST",
            url:"backend/moderator/taskViewDetails",
            data:{task_id:task_id, dept_id:dept_id},
            dataType: "json",
            success: function (data) {
            var str = '';
            var j = 0;
            $(data.tasks).each(function (i, v) {
            j = j + 1;
            if (v.sub_tasks != ''){
            str += '<tr class="border-bottom-primary">';
            str += '<td>' + j + '</td>';
            str += '<td>';
            str += '<i id="view_expand_subtask_' + j + '" class="fa fa-plus" onclick="javascript:viewExpandSubtask(' + j + ')"></i>';
            str += ' <i style="display:none;" id="view_collapse_subtask_' + j + '"  class="fa fa-minus" onclick="javascript:viewCollapseSubtask(' + j + ')"></i>';
            str += '&nbsp;&nbsp;&nbsp;<a style="padding:5px;" id="task_name_' + v.task_id + '" href="javascript:taskDetailsInfo(' + v.task_id + ')">';
            str += v.task_name;
            str += '</a>';
            str += '</td>';
            str += '<td>' + ' ' + '</td>';
            str += '<td>' + ' ' + '</td>';
            str += '<td style="width:25%;">';
            str += '<div class="progress">';
            str += '<div class="progress-bar" role="progressbar" style="width: ' + v.percentage + '%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">' + parseFloat(v.percentage).toFixed(2) + '%</div>';
            str += '</div>';
            str += '</td>';
            str += '</tr>';
            var k = 0;
            var I = 0;
            $(v.sub_tasks).each(function (m, n) {

            k = k + 1;
            l = j + "." + k;
            if (n.sub_sub_tasks != ''){

            str += '<tr class="view_subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td>' + j + "." + k; + '</td>';
            str += '<td style="padding-left:1.9rem !important;">';
            str += '<i id="view_expand_root_task_' + j + k + '" class="view_expand_root_task' + j + ' fa fa-plus" onclick="javascript:viewExpandRoottask(' + j + ',' + k + ')"></i>';
            str += '<i style="display:none;" id="view_collapse_root_task_' + j + k + '" class="view_collapse_root_task' + j + ' fa fa-minus" onclick="javascript:viewCollapseRoottask(' + j + ',' + k + ')"></i>';
            str += '&nbsp;&nbsp;&nbsp;<a style="padding:5px;" id="task_name_' + n.task_id + '" href="javascript:taskDetailsInfo(' + n.task_id + ')">';
            str += n.task_name;
            str += '</a>';
            str += '</td>';
            str += '<td>' + ' ' + '</td>';
            str += '<td>' + ' ' + '</td>';
            str += '<td style="width:25%;">';
            str += '<div class="progress">';
            str += '<div class="progress-bar" role="progressbar" style="width: ' + n.percentage + '%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">' + parseFloat(n.percentage).toFixed(2) + '%</div>';
            str += '</div>';
            str += '</td>';
            str += '</tr>';
            var a = 0;
            $(n.sub_sub_tasks).each(function (o, p) {
            a = a + 1;
            b = j + "." + k + "." + a;
            str += '<tr class="view_root_task view_roottask' + j + k + ' border-bottom-primary" style="display:none;">';
            str += '<td style="">' + b + '</td>';
            str += '<td style="padding-left:5.0rem !important;"><a style="padding:5px;" id="task_name_' + p.task_id + '" href="javascript:taskDetailsInfo(' + p.task_id + ')">' + p.task_name + '</a></td>';
            str += '<td id="startdate_' + p.task_id + '">' + ' ' + '</td>';
            str += '<td id="enddate_' + p.task_id + '">' + ' ' + '</td>';
            str += '<td style="width:25%;">';
            str += '<div class="progress">';
            str += '<div class="progress-bar" role="progressbar" style="width: ' + p.percentage + '%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">' + parseFloat(p.percentage).toFixed(2) + '%</div>';
            str += '</div>';
            str += '</td>';
            str += '</tr>';
            });
            } else{
            str += '<tr class="view_subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="">' + l + '</td>';
            str += '<td style="padding-left:3.0rem !important;"><a style="padding:5px;" id="task_name_' + n.task_id + '" href="javascript:taskDetailsInfo(' + n.task_id + ')">' + n.task_name + '</a></td>';
            str += '<td id="startdate_' + n.task_id + '">' + ' ' + '</td>';
            str += '<td id="enddate_' + n.task_id + '">' + ' ' + '</td>';
            str += '<td style="width:25%;">';
            str += '<div class="progress">';
            str += '<div class="progress-bar" role="progressbar" style="width: ' + n.percentage + '%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">' + parseFloat(n.percentage).toFixed(2) + '%</div>';
            str += '</div>';
            str += '</td>';
            str += '</tr>';
            }
            });
            } else{
            str += '<tr class="subtask' + j + ' border-bottom-primary">';
            str += '<td>' + j + '</td>';
            str += '<td><a style="padding:5px;" id="task_name_' + v.task_id + '" href="javascript:taskDetailsInfo(' + v.task_id + ')">' + v.task_name + '</a></td>';
            str += '<td id="startdate_' + v.task_id + '">' + ' ' + '</td>';
            str += '<td id="enddate_' + v.task_id + '">' + ' ' + '</td>';
            str += '<td style="width:25%;">';
            str += '<div class="progress">';
            str += '<div class="progress-bar" role="progressbar" style="width: ' + v.percentage + '%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">' + parseFloat(v.percentage).toFixed(2) + '%</div>';
            str += '</div>';
            str += '</td>';
            str += '</tr>';
            }

            });
            $('#dept_task_detail_body').html(str);
            }

    }); //end Ajax
    }
    //Comment Add Start
    function taskDetailsInfo(task_id = ''){
    // alert('test');
    var dept_id = $('#specific_dept_id').val();
    $('#add_remark').hide();
    $('#onscreen_uploader').hide();
    $('#onscreen_uploader1').hide();
    $('#dept_task_detail_body a').css("border", "none");
    $('#task_name_' + task_id).css("border", "1px solid #00FF00");
    $('#comment_task_id').val(task_id);
    $('#file_task_id').val(task_id);
    var user_role = $('#user_role').val();
    var user_role_array = user_role.split(',');
    $.ajax({
    type:"POST",
            url:"backend/moderator/taskDetailsInfo",
            data:{task_id:task_id, dept_id:dept_id},
            dataType: "json",
            success: function (data) {

            if (data.root_task != ''){
            if ($.inArray('4', user_role_array) > - 1){

            $('#add_remark').show();
            $('#onscreen_uploader').show();
            $('#onscreen_uploader1').show();
            }

            }
            var str = '';
            $(data.task_files).each(function (i, v) {
            str += '<tr class="border-bottom-primary">';
            str += '<td style="width:50%"><i style="padding:5px;"  class="fa fa-file-archive-o"></i>' + v.file_name + '</td>';
            str += '<td style="width:10%">';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            //str+='<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:fileDownload('+v.file_id+');"><i class="fa fa-eye"></i>View Or Download</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('backend/moderator/fileDownload'); ?>/' + v.file_id + '"><i class="fa fa-eye"></i>View Or Download</a></li>';
            if ($.inArray('4', user_role_array) > - 1){
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:deleteRequest(' + v.file_id + ');"><i class="fa fa-trash"></i>Request For Delete</a></li>';
            }
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            $('#dept_task_files_body').html(str);
            var str1 = '';
            $(data.task_status).each(function (j, w) {
            str1 += '<tr class="border-bottom-primary">';
            if (w.status == "incomplete"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:red;>' + (w.status_name).substr(0, 50) + '<span></td>';
            } else if (w.status == "complete"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:green;>' + (w.status_name).substr(0, 50) + '<span></td>';
            } else if (w.status == "reset"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:blue;>' + (w.status_name).substr(0, 50) + '<span></td>';
            }
            str1 += '<td style="width:10%">';
            if (w.status == "incomplete"){

            // str1+=' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            //  str1+='<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            if ($.inArray('4', user_role_array) > - 1){
            str1 += '<div class="anil_nepal"><label class="switch switch-left-right" ><input onclick="completeStatus(' + w.task_id + ',' + w.dept_task_status_id + ');" class="switch-input" type="checkbox">';
            str1 += '<span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> </label>';
            str1 += '</div>';
            //str1+='<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:completeStatus('+w.task_id+','+w.dept_task_status_id+');"><i class="fa fa-trash"></i>Mark As Complete</a></li>';
            }
            // str1+='</ul></div>';
            } else if (w.status == "complete"){
//                                        str1+=' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
//                                        str1+='<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            if ($.inArray('4', user_role_array) > - 1){
            str1 += '<div class="anil_nepal"><label class="switch switch-left-right" ><input onclick="resetStatus(' + w.task_id + ',' + w.dept_task_status_id + ');" class="switch-input" checked type="checkbox">';
            str1 += '<span class="switch-label" data-on="Reset" data-off="Off"></span> <span class="switch-handle"></span> </label>';
            str1 += '</div>';
            // str1+='<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:resetStatus('+w.task_id+','+w.dept_task_status_id+');"><i class="fa fa-eye"></i>Request For Reset</a></li>';
            }
            //  str1+='</ul></div>'; 
            }
            str1 += '</td>';
            str1 += '</tr>';
            });
            $('#dept_task_status_body').html(str1);
            var str2 = '';
            $(data.task_remarks).each(function (k, p) {

            str2 += '<tr class="border-bottom-primary" id="comment_' + p.comment_id + '">';
            str2 += '<td style="width:50%"><i style="padding:5px;"  class="fa fa-file-archive-o"></i>' + p.comment + '</td>';
            str2 += '<td style="width:10%">';
            str2 += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str2 += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            if ($.inArray('4', user_role_array) > - 1){
            str2 += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:editRemark(' + p.task_id + ',' + p.comment_id + ');"><i class="fa fa-eye"></i>Update Remark</a></li>';
            str2 += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:" onclick="deleteRemark(' + p.task_id + ',' + p.comment_id + ');"><i class="fa fa-eye"></i>Delete Remark</a></li>';
            }
            str2 += '</ul></div>';
            str2 += '</td>';
            str2 += '</tr>';
            });
            $('#dept_task_remark_body').html(str2);
            }

    }); //end Ajax
    }
    //Comment Add Start
    $('#task_comment_discard').click(function(){
    $("#comment").val('');
    });
    $('#task_comment_close').click(function(){
    $("#comment").val('');
    });
    $('#comment_save').click(function(){
    var dept_id = $('#specific_dept_id').val();
    var task_id = $('#comment_task_id').val();
    var comment = $('#comment').val();
    var user_role = $('#user_role').val();
    var user_role_array = user_role.split(',');
    //alert('test');
    $.ajax({
    type:"POST",
            url:"backend/moderator/addTaskComment",
            data:{task_id:task_id, dept_id:dept_id, comment:comment},
            dataType:"json",
            success: function (data) {

            if (data.status == "success"){
            var str2 = '';
            $(data.task_remarks).each(function (k, p) {

            str2 += '<tr class="border-bottom-primary" id="comment_' + p.comment_id + '">';
            str2 += '<td style="width:50%"><i style="padding:5px;"  class="fa fa-file-archive-o"></i>' + p.comment + '</td>';
            str2 += '<td style="width:10%">';
            str2 += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str2 += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            if ($.inArray('4', user_role_array) > - 1){
            str2 += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:editRemark(' + p.task_id + ',' + p.comment_id + ');"><i class="fa fa-eye"></i>Update Remark</a></li>';
            str2 += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:" onclick="deleteRemark(' + p.task_id + ',' + p.comment_id + ');"><i class="fa fa-eye"></i>Delete Remark</a></li>';
            }
            str2 += '</ul></div>';
            str2 += '</td>';
            str2 += '</tr>';
            });
            $('#dept_task_remark_body').html(str2);
            }
            }
    });
    });
    //Comment Add End 
    //comment Update Start
    function editRemark(task_id, comment_id){
    $.ajax({
    type:"POST",
            url:"backend/moderator/commentInfo",
            data:{comment_id:comment_id},
            dataType:"json",
            success: function (data) {
            if (data.status == "success"){
            var com_id = data.task_remark[0]['comment_id'];
            var comment = data.task_remark[0]['comment'];
            $('#edit_comment_task_id').val(task_id);
            $('#edit_comment_id').val(com_id);
            $('#edit_comment').val(comment);
            $('#editCommentModal').modal('show');
            }
            }
    });
    }
    function deleteRemark(task_id, comment_id){
    var r = confirm("Are you sure?");
    if (r == true){
    var r_status = validate_password();
    if (r_status == true){
    $.ajax({
    type:"POST",
            url:"backend/moderator/deleteComment",
            data:{comment_id:comment_id},
            dataType:"json",
            success: function (data) {
            if (data.status == "success"){
            $('#comment_' + comment_id).remove();
            }
            }
    });
    } else{
    return false;
    }
    }
    }


    $('#edit_comment_close').click(function(){
    $("#edit_comment").val('');
    $('#edit_comment_id').val('');
    });
    $('#edit_comment_discard').click(function(){
    $("#edit_comment").val('');
    $('#edit_comment_id').val('');
    });
    $('#comment_update').click(function(){
    var comment_id = $('#edit_comment_id').val();
    var comment = $('#edit_comment').val();
    var task_id = $('#edit_comment_task_id').val();
    var dept_id = $('#specific_dept_id').val();
    var user_role = $('#user_role').val();
    var user_role_array = user_role.split(',');
    //alert('test');
    $.ajax({
    type:"POST",
            url:"backend/moderator/updateTaskComment",
            data:{task_id:task_id, dept_id:dept_id, comment_id:comment_id, comment:comment},
            dataType:"json",
            success: function (data) {

            if (data.status == "success"){
            var str2 = '';
            $(data.task_remarks).each(function (k, p) {

            str2 += '<tr class="border-bottom-primary" id="comment_' + p.comment_id + '">';
            str2 += '<td style="width:50%"><i style="padding:5px;"  class="fa fa-file-archive-o"></i>' + p.comment + '</td>';
            str2 += '<td style="width:10%">';
            str2 += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str2 += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            if ($.inArray('4', user_role_array) > - 1){
            str2 += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:editRemark(' + p.task_id + ',' + p.comment_id + ');"><i class="fa fa-eye"></i>Update Remark</a></li>';
            str2 += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:" onclick="deleteRemark(' + p.task_id + ',' + p.comment_id + ');"><i class="fa fa-eye"></i>Delete Remark</a></li>';
            }
            str2 += '</ul></div>';
            str2 += '</td>';
            str2 += '</tr>';
            });
            $('#dept_task_remark_body').html(str2);
            }
            }
    });
    });
    //comment Update End


    //Task File Upload Start
    $('#task_file_discard').click(function(){
    $("#file").val('');
    });
    $('#task_file_close').click(function(){
    $("#file").val('');
    });
//               $("form#data").submit(function(e) {
//                  // alert('test');
//                    e.preventDefault();    
//                    var formData = new FormData(this);
//                    alert('test');
//                    $.ajax({
//                        url: "backend/moderator/addTaskFile",
//                        type: 'POST',
//                        data: formData,
//                        success: function (data) {
//                            alert(data)
//                        },
//                        cache: false,
//                        contentType: false,
//                        processData: false
//                    });
//            });
    $('#file_save').click(function(){
    var task_id = $('#file_task_id').val();
    var task_file = $('#file').val();
//                    var formData = new FormData(this);
//                    alert(formData);
//                    alert('test');
    $.ajax({
    type:"POST",
            url:"backend/moderator/addTaskFile",
            data:{task_id:task_id, task_file:task_file},
            dataType:"json",
            success: function (data) {

            if (data.status == "success"){
            var str = '';
            $(data.task_files).each(function (i, v) {
            str += '<tr class="border-bottom-primary">';
            str += '<td style="width:50%"><i style="padding:5px;"  class="fa fa-file-archive-o"></i>' + v.file_name + '</td>';
            str += '<td style="width:10%">';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:fileDownload(' + v.file_id + ');"><i class="fa fa-eye"></i>View Or Download</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:deleteRequest(' + v.file_id + ');"><i class="fa fa-trash"></i>Request For Delete</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            $('#dept_task_files_body').html(str);
            }
            }
    });
    });
    //Task File Upload End
    function fileDownload(file_id = ''){
    $.ajax({
    type:"POST",
            url:"backend/moderator/fileDownload",
            data:{file_id:file_id},
            dataType:"text",
            success: function (data) {

            if (data.status == "success"){

            }
            }
    });
    }

    //Task File Download Start



    //Task File Download End


    function viewExpandSubtask(id = ''){
    $('#view_expand_subtask_' + id).hide();
    $('#view_collapse_subtask_' + id).show();
    $('.view_subtask' + id).show();
    }

    function viewCollapseSubtask(id = ''){
    $('.view_expand_root_task' + id).show();
    $('.view_collapse_root_task' + id).hide();
    $('#view_expand_subtask_' + id).show();
    $('#view_collapse_subtask_' + id).hide();
    $('.view_subtask' + id).hide();
    //$('.roottask'+id).hide();
    $('.view_root_task').hide();
    }

    function viewExpandRoottask(id = '', sub = ''){
    $('#view_expand_root_task_' + id + sub).hide();
    $('#view_collapse_root_task_' + id + sub).show();
    $('.view_roottask' + id + sub).show();
    }

    function viewCollapseRoottask(id = '', sub = ''){
    $('#view_expand_root_task_' + id + sub).show();
    $('#view_collapse_root_task_' + id + sub).hide();
    $('.view_roottask' + id + sub).hide();
    }

    function completeStatus(task_id = '', status_id = ''){
    var r = confirm("Are you sure?");
    if (r == true){
    var r_status = validate_password();
    if (r_status == true){
    $.ajax({
    type:"POST",
            url:"backend/moderator/completeStatus",
            data:{task_id:task_id, status_id:status_id},
            dataType:"json",
            success: function (data) {

            if (data.status == "success"){

            var str1 = '';
            $(data.task_status).each(function (j, w) {
            str1 += '<tr class="border-bottom-primary">';
            if (w.status == "incomplete"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:red;>' + (w.status_name).substr(0, 50) + '<span></td>';
            } else if (w.status == "complete"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:green;>' + (w.status_name).substr(0, 50) + '<span></td>';
            } else if (w.status == "reset"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:blue;>' + (w.status_name).substr(0, 50) + '<span></td>';
            }
            str1 += '<td style="width:10%">';
            if (w.status == "incomplete"){
//                                                   str1+=' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
//                                                   str1+='<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
//                                                   str1+='<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:completeStatus('+w.task_id+','+w.dept_task_status_id+');"><i class="fa fa-trash"></i>Mark As Complete</a></li>';
//                                                   str1+='</ul></div>';
            str1 += '<div class="anil_nepal"><label class="switch switch-left-right" ><input onclick="completeStatus(' + w.task_id + ',' + w.dept_task_status_id + ');" class="switch-input" type="checkbox">';
            str1 += '<span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> </label>';
            str1 += '</div>';
            } else if (w.status == "complete"){
//                                                   str1+=' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
//                                                   str1+='<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
//                                                   str1+='<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:resetStatus('+w.task_id+','+w.dept_task_status_id+');"><i class="fa fa-eye"></i>Request For Reset</a></li>';
//                                                   str1+='</ul></div>'; 
            str1 += '<div class="anil_nepal"><label class="switch switch-left-right" ><input onclick="resetStatus(' + w.task_id + ',' + w.dept_task_status_id + ');" class="switch-input" checked type="checkbox">';
            str1 += '<span class="switch-label" data-on="Reset" data-off="Off"></span> <span class="switch-handle"></span> </label>';
            str1 += '</div>';
            }
            str1 += '</td>';
            str1 += '</tr>';
            });
            $('#dept_task_status_body').html(str1);
            }
            }
    });
    }
    }
    }

    function resetStatus(task_id = '', status_id = ''){
    var dept_id = $('#specific_dept_id').val();
    var r = confirm("Are you sure?");
    if (r == true){
    var r_status = validate_password();
    if (r_status == true){
    $('#reset_task_id').val(task_id);
    $('#reset_status_id').val(status_id);
    $('#reset_reason_id').val('');
    $('#reset_request_modal').modal('show');
    }
    }
    }



    $('#save_reset_request').click(function(){
    var dept_id = $('#specific_dept_id').val();
    var task_id = $('#reset_task_id').val();
    var status_id = $('#reset_status_id').val();
    var reason = $('#reset_reason_id').val();
    $.ajax({
    type:"POST",
            url:"backend/moderator/resetStatus",
            data:{task_id:task_id, status_id:status_id, dept_id:dept_id, reason:reason},
            dataType:"json",
            success: function (data) {
            $('#reset_task_id').val('');
            $('#reset_status_id').val('');
            $('#reset_reason_id').val('');
            if (data.status == "success"){

            var str1 = '';
            $(data.task_status).each(function (j, w) {
            str1 += '<tr class="border-bottom-primary">';
            if (w.status == "incomplete"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:red;>' + (w.status_name).substr(0, 50) + '<span></td>';
            } else if (w.status == "complete"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:green;>' + (w.status_name).substr(0, 50) + '<span></td>';
            } else if (w.status == "reset"){
            str1 += '<td style="width:50%;"><i style="padding:5px;"  class="fa fa-file-archive-o"></i><span style=color:blue;>' + (w.status_name).substr(0, 50) + '<span></td>';
            }
            str1 += '<td style="width:10%">';
            if (w.status == "incomplete"){
//                                                   str1+=' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
//                                                   str1+='<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
//                                                   str1+='<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:completeStatus('+w.task_id+','+w.dept_task_status_id+');"><i class="fa fa-trash"></i>Mark As Complete</a></li>';
//                                                   str1+='</ul></div>';
            str1 += '<div class="anil_nepal"><label class="switch switch-left-right" ><input onclick="completeStatus(' + w.task_id + ',' + w.dept_task_status_id + ');" class="switch-input" type="checkbox">';
            str1 += '<span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> </label>';
            str1 += '</div>';
            } else if (w.status == "complete"){
//                                                   str1+=' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
//                                                   str1+='<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
//                                                   str1+='<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:resetStatus('+w.task_id+','+w.dept_task_status_id+');"><i class="fa fa-eye"></i>Request For Reset</a></li>';
//                                                   str1+='</ul></div>'; 
            str1 += '<div class="anil_nepal"><label class="switch switch-left-right" ><input onclick="resetStatus(' + w.task_id + ',' + w.dept_task_status_id + ');" class="switch-input" checked type="checkbox">';
            str1 += '<span class="switch-label" data-on="Reset" data-off="Off"></span> <span class="switch-handle"></span> </label>';
            str1 += '</div>';
            }
            str1 += '</td>';
            str1 += '</tr>';
            });
            $('#dept_task_status_body').html(str1);
            }
            }
    });
    });
    function deleteRequest(file_id = ''){

    var dept_id = $('#specific_dept_id').val();
    var r = confirm("Are you sure to delete this file?");
    if (r == true){
    var r_status = validate_password();
    if (r_status == true){
    //  alert(file_id);
    $('#delete_file_id').val(file_id);
    $('#delete_reason_id').val('');
    $('#delete_file_request_modal').modal('show');
    }
    }
    }

    $('#save_delete_request').click(function(){
    var dept_id = $('#specific_dept_id').val();
    var file_id = $('#delete_file_id').val();
    var reason = $('#delete_reason_id').val();
    $.ajax({
    type:"POST",
            url:"backend/moderator/requestForDeleteFile",
            data:{file_id:file_id, dept_id:dept_id, reason:reason},
            dataType:"json",
            success: function (data) {

            $('#delete_file_id').val('');
            $('#delete_reason_id').val('');
            if (data.status == "success"){
            alert('Successfully Request Sent');
            }
            }
    });
    });
    //Details task end
    function make_as_complete(project_id){
    if (validate_password()){
    location.href = '<?php echo site_url('moderator/make_as_complete/'); ?>/' + project_id
    }
    }

    var highestBox = 0;
    $('#dept_task_details').find('.common-height').each(function(){
    if ($('.common-height').height() > highestBox){
    highestBox = $('.common-height').height();
    }

    })
            $('#dept_task_details').find('.common-height').height(highestBox);





</script>