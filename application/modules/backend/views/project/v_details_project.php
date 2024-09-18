<style>

    .dropdown-menu > li > a {
        display: block;
        padding: 3px 20px;
        clear: both;
        font-weight: 400;
        line-height: 1.42857143;
        color: #333;
        white-space: nowrap;
    }

    /* Department List */
    .dropdown i {
        margin-right: 0.5rem;
    }
    .btn {
        border-radius: 2px;
        text-transform: capitalize;
        font-size: 15px;
        padding: 3px 9px;
        cursor: pointer;
    }


    .form-group {
        margin-bottom: 0em;
    }
    label{
        font-size: 12px;
    }
    .discard{
        border: none;
        background: #FF0000;
        color:#ffffff;
        font-size: 12px;
        padding: 3px 10px;
    }
    .save{
        border: none;
        background: #00FF00;
        color:#ffffff;
        font-size: 12px;
        padding: 3px 10px;
    }
    .font-large-2 {
        font-size: 2rem !important;
    }
    .bg-info {

        height: 43px;
        background-color: #2d6183 !important;

    }

    .p-2 {
        padding: 0.5rem 1.0rem !important;
    }


    select.form-control,select.form-control:hover {
        font-size: 14px;
        border-radius: 2px;
        border: 1px solid #ccc;
    }

</style>
<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
            <!-- [ page content ] start -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- Tab variant tab card start -->
                    <div class="card">

                        <div class="card-block tab-icon">
                            <!-- Row start -->
                            <div class="row">
                                <div class="col-lg-12 col-xl-12">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs md-tabs " role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home7" role="tab"><i class=" fa fa-cog"></i><br>Overview</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#task7" role="tab"><i class="fa fa-cog "></i><br>Work Area</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#department7" role="tab"><i class="fa fa-check-square"></i><br>Segment</a>
                                            <div class="slide"></div>
                                        </li>
<!--                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#status7" role="tab"><i class="fa fa-exclamation-triangle"></i><br>Status</a>
                                            <div class="slide"></div>
                                        </li>-->
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#dept_task7" role="tab"><i class="fa fa-adjust"></i><br>Segment to Work Area</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#users7" role="tab"><i class="fa fa-user"></i><br>Users</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#documents" role="tab"><i class="fa fa-file"></i><br>Documents</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('project/addEditProject/' . $project_info[0]['project_id']); ?>"><i class="fa fa-th"></i><br>Edit Project</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('project/report/' . $project_info[0]['project_id']); ?>"><i class="fa fa-list-ol"></i><br>Report</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->

                                </div>

                            </div>
                            <!-- Row end -->
                        </div>
                    </div>
                    <!-- Tab variant tab card start -->
                </div>
            </div>
            <div class="tab-content card-block">
                <div class="tab-pane active" id="home7" role="tabpanel">

                    <div class="row">
                        <div class="col-md-12">

                            <div class="card sale-card">

                                <input type="hidden" id="project_id" value="<?php echo $project_info[0]['project_id']; ?>" />
                                <input type="hidden" id="project_equivalent_value" value="<?php if (!empty($project_info[0]['project_value'])) echo $project_info[0]['project_value']; ?>"   />     

                                <div class="card-block" style="padding-top: 5px;">
                                    <h6>Project Overview</h6>
                                    <h4 style="margin-bottom:55px;">

                                        <span class="badge badge-info badge-pill float-left" style="color:#ffffff;"><?php if (!empty($project_info[0]['project_name'])) echo $project_info[0]['project_name'] . '-' . $project_info[0]['code']; ?></span>
                                        <span class="badge badge-warning badge-pill float-right" style="background:#FF8D43;color:#ffffff;"><?php if (!empty($project_info[0]['type'])) echo $project_info[0]['type']; ?></span>
                                    </h4>
                                    <hr />
                                    <div class="row">
                                        <div class="col-md-4 " style="border-right:1px solid #B0B6C0;">
                                            <h6>Project Owner</h6>
                                            <span><?php if (!empty($project_info[0]['owner_name'])) echo $project_info[0]['owner_name']; ?></span>
                                        </div>
                                        <div class="col-md-4" style="border-right:1px solid #B0B6C0;">
                                            <h6>Package No.</h6>
                                            <span><?php if (!empty($project_info[0]['package_no'])) echo $project_info[0]['package_no']; ?></span>
                                        </div>
                                        <div class="col-md-4">
                                            <h6>Project Manager</h6>
                                            <span><?php if (!empty($project_info[0]['contractor_name'])) echo $project_info[0]['contractor_name']; ?></span>
                                        </div>
                                    </div><!--End Row-->
                                    <br>
                                    <div class="row">

                                        <div class="col-md-4" style="padding-right: 0px;">
                                            <div class="media align-items-stretch" style="margin-bottom: 5px;">
                                                <div class="p-2 text-center bg-info rounded-left" style="height:86px;">
                                                    <i class="fa fa-camera font-large-2 text-white" style="margin-top:15px;"></i>
                                                </div>
                                                <div class="p-2 media-body" style="background: #f2f3f8;">
                                                    <h6 style="margin-top:15px;">Segment &nbsp;&nbsp;&nbsp;<i class="fa fa-exclamation-triangle" style="color:red;"></i> <span id="dept_val"><?php if ($dept_ramain_value > 0) echo $dept_ramain_value; ?></span></h6>

                                                    <h6 class="text-bold-400 mb-0"><?php echo count($departments); ?></h6>

                                                </div>
                                            </div> 

                                            <div class="media align-items-stretch" style="margin-bottom: 5px;">
                                                <div class="p-2 text-center bg-info rounded-left" style="height:86px;">
                                                    <i class="fa fa-camera font-large-2 text-white" style="margin-top:10px;"></i>
                                                </div>
                                                <div class="p-2 media-body" style="background: #f2f3f8;">
                                                    <h6 style="margin-top:15px;">Work Area</h6>
                                                    <h6 class="text-bold-400 mb-0"><?php echo count($tasks); ?></h6>

                                                </div>
                                            </div> 
                                            <div class="media align-items-stretch">
                                                <div class="p-2 text-center bg-info rounded-left" style="height:86px;">
                                                    <i class="fa fa-camera font-large-2 text-white" style="margin-top:10px;"></i>
                                                </div>
                                                <div class="p-2 media-body" style="background: #f2f3f8;">
                                                    <h6 style="margin-top:15px;">Location</h6>

                                                    <?php echo $project_info[0]['site_location'] . ',' . $project_info[0]['upazila'] . ',' . $project_info[0]['district'] . ',' . $project_info[0]['division'] . ',' . $project_info[0]['country']; ?>


                                                </div>
                                            </div> 

                                        </div>
                                        <div class="col-md-4" style="padding-right: 0px;">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <span class="badge  badge-pill float-right" style="background:#A7ABF2;color:#ffffff;font-size:15px"><?php if (!empty($project_info[0]['contract_date'])) echo date('d/m/Y', strtotime($project_info[0]['contract_date'])); ?></span>
                                                    Contract Date
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="badge badge-info badge-pill float-right" style="font-size:15px"><?php if (!empty($project_info[0]['contract_period'])) echo $project_info[0]['contract_period']; ?></span>
                                                    Contract Period
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="badge badge-info badge-pill float-right" style="font-size:15px"><?php if (!empty($project_info[0]['execution_period'])) echo $project_info[0]['execution_period']; ?></span>
                                                    Execution Period
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="badge badge-warning badge-pill float-right" style="background:#FF8D43;color:#ffffff;font-size:15px"><?php if (!empty($project_info[0]['execution_start_date'])) echo date('d/m/Y', strtotime($project_info[0]['execution_start_date'])); ?></span>
                                                    Execution Start Date
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="badge badge-warning badge-pill float-right" style="background:#FF8D43;color:#ffffff;font-size:15px"><?php if (!empty($project_info[0]['scheduled_completion_date'])) echo date('d/m/Y', strtotime($project_info[0]['scheduled_completion_date'])); ?></span>
                                                    Completion Date
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="badge badge-warning badge-pill float-right" style="background:#FF8D43;color:#ffffff;font-size:15px"><?php if (!empty($project_info[0]['actual_completion_date'])) echo date('d/m/Y', strtotime($project_info[0]['actual_completion_date'])); ?></span>
                                                    Actual Date of Completion
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="list-group">
                                               <!-- <?php foreach ($project_currency_info as $currency_info) { ?>
                                                    <li class="list-group-item">
                                                        <span class="badge badge-primary badge-pill float-right"><?php echo $currency_info['symbol_left'] . number_format($currency_info['equivalant_value']); ?></span>
                                                        Project Value <?php echo $currency_info['title']; ?>
                                                    </li>
                                                <?php } ?>-->

<!--                                                <li class="list-group-item">
                                                    <span class="badge  badge-pill float-right" style="background:#FF3D57;color:#ffffff;"><?php if (!empty($project_info[0]['project_value'])) echo $project_info[0]['symbol_left'] . number_format($project_info[0]['project_value']); ?></span>
                                                    Eqv. Project Value
                                                </li>-->
                                                <li class="list-group-item">
                                                    Total Budgeting Value
                                                    <span class="badge  badge-primary badge-pill float-right" style="font-size:15px"><?php if (!empty($budgeting[0]['total'])) echo $budgeting[0]['symbol_left'] . number_format($budgeting[0]['total'],2); ?></span>
                                                    
                                                </li>
                                                <li class="list-group-item">
                                                    Work done value
                                                    <span class="badge  badge-primary badge-pill float-right" style="font-size:15px"><?php if (!empty($budgeting[0]['consumption'])) echo $budgeting[0]['symbol_left'] . number_format($budgeting[0]['consumption'],2); ?></span>
                                                    
                                                </li>
                                            </ul>
                                        </div>

                                    </div><!--End Row-->


                                </div><!--End Card Block-->

                            </div>
                        </div><!--End Col-md-12 col-xl-8 -->

                    </div><!--End Row-->
                    <!-- sale revenue card start -->



                </div><!--End tab pane-->
                <div class="tab-pane" id="task7" role="tabpanel">

                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card sale-card">



                                <div class="card-block" style="padding-top: 5px;">
                                    <button id="new_task"  class="btn btn-primary" style="float:left;padding:2px 6px;font-size:10px;" data-toggle="modal" data-target="#taskModal"><i class="fa fa-plus" style="margin-right:0px"></i></button>
                                    <p style="text-align: center;margin-bottom: 0px;font-weight: bold;color:#4099FF;font-size:20px;">Task Tree</p>   

                                    <div class="table-responsive">
                                        <table class="table" id="main_task_body">
                                            <thead>
                                                <tr class="border-bottom-primary">
                                                    <th>SL</th>
                                                    <th>Task Name</th>
<!--                                                    <th>Origin</th>
                                                    <th>Unit</th>
                                                    <th>Qty</th>
                                                    <th>Task Value</th>-->
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="task_body">
                                                <?php if (!empty($tasks)) { ?>
                                                    <?php
                                                    $i = 0;
                                                    foreach ($tasks as $key => $task) {
                                                        $i++;
                                                        ?>

                                                        <?php
                                                        if (!empty($tasks[$key]['sub_tasks'])) {
                                                            $j = 0;
                                                            ?>
                                                            <tr class="border-bottom-primary" data-index="<?php echo $task['task_id']; ?>" data-position="<?php echo $task['task_id']; ?>">
                                                                <!-- 
                                                                 <td>
                                                                     <button id="expand_subtask_<?php echo $i; ?>" class="btn btn-primary" style="padding:2px 6px;font-size:10px;" onclick="javascript:expandSubtask(<?php echo $i; ?>)"><i class="fa fa-plus"></i></button>
                                                                     <button style="padding:2px 6px;font-size:10px;display:none;" id="collapse_subtask_<?php echo $i; ?>" class="btn btn-primary" style="" onclick="javascript:collapseSubtask(<?php echo $i; ?>)"><i  class="fa fa-minus"></i></button><?php //echo $i;   ?>
                                                                 </td>
                                                                -->
                                                                <td>
                                                                    <i id="expand_subtask_<?php echo $i; ?>" class="fa fa-plus" onclick="javascript:expandSubtask(<?php echo $i; ?>)"></i>
                                                                    <i style="display:none;" id="collapse_subtask_<?php echo $i; ?>"  class="fa fa-minus" onclick="javascript:collapseSubtask(<?php echo $i; ?>)"></i><?php //echo $i;   ?>
                                                                </td>
                                                                <td style="white-space:normal;width:50%"><?php echo $task['task_name']; ?></td>
<!--                                                                <td><?php echo $task['origin']; ?></td>
                                                                <td><?php echo $task['unit']; ?></td>
                                                                <td><?php echo $task['quantity']; ?></td>
                                                                <td><?php echo $task['task_value']; ?></td>-->
                                                                <td> 
                                                                    <div class="dropdown">
                                                                        <i class="  fa fa-cogs" data-toggle="dropdown"></i>

                                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                                            <!--

                                                                             <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('project/addEditProject/' . $project['project_id']); ?>"><i class="fa fa-edit"></i>Edit</a></li>
                                                                             <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_row('<?php echo site_url('project/deleteProject/' . $project['project_id']); ?>')" ><i class="fa fa-trash"></i>Delete</a></li>
                                                                            -->
                                                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_task(<?php echo $task['task_id'] ?>);" ><i class="fa fa-plus"></i>Add Subtask</a></li>
                                                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_task(<?php echo $task['task_id'] ?>);"><i class="fa fa-edit"></i>Edit Task</a></li>
                                                                            <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_task('<?php echo $task['task_id'] ?>')" ><i class="fa fa-trash"></i>Delete Task</a></li>

                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            foreach ($tasks[$key]['sub_tasks'] as $key1 => $subtask) {
                                                                $j++;
                                                                ?>
                                                                <?php
                                                                if (!empty($subtask['sub_sub_tasks'])) {
                                                                    $k = 0;
                                                                    ?>

                                                                    <tr data-index="<?php echo $subtask['task_id']; ?>" data-position="<?php echo $subtask['task_id']; ?>" class="subtask<?php echo $i; ?>  border-bottom-primary" style="display:none;">
                                                                        <!--  
                                                                          <td  style="padding-left:1.2rem !important;">
                                                                              <button id="expand_root_task_<?php echo $i . $j; ?>" class="expand_root_task<?php echo $i; ?> btn btn-primary" style="padding:2px 6px;font-size:10px;" onclick="javascript:expandRoottask(<?php echo $i, ',' . $j; ?>)"><i class="fa fa-plus"></i></button>
                                                                              <button id="collpase_root_task_<?php echo $i . $j; ?>" class="collapse_root_task<?php echo $i; ?> btn btn-primary" style="padding:2px 6px;font-size:10px;display:none;" onclick="javascript:collapseRoottask(<?php echo $i . ',' . $j; ?>)"><i class="fa fa-minus"></i></button><?php //echo $i.'.'.$j;   ?>
                                                                          </td>
                                                                        -->
                                                                        <td  style="padding-left:1.2rem !important;">
                                                                            <i id="expand_root_task_<?php echo $i . $j; ?>" class="expand_root_task<?php echo $i; ?> fa fa-plus" onclick="javascript:expandRoottask(<?php echo $i, ',' . $j; ?>)"></i>
                                                                            <i style="display:none;" id="collapse_root_task_<?php echo $i . $j; ?>" class="collapse_root_task<?php echo $i; ?> fa fa-minus" onclick="javascript:collapseRoottask(<?php echo $i . ',' . $j; ?>)"></i><?php //echo $i.'.'.$j;   ?>
                                                                        </td>

                                                                        <td style="padding-left:1.5rem !important;"><?php echo $subtask['task_name']; ?></td>
<!--                                                                        <td><?php echo $subtask['origin']; ?></td>
                                                                        <td><?php echo $subtask['unit']; ?></td>
                                                                        <td><?php echo $subtask['quantity']; ?></td>
                                                                        <td><?php echo $subtask['task_value']; ?></td>-->
                                                                        <td> 
                                                                            <div class="dropdown">
                                                                                <i class="  fa fa-cogs" data-toggle="dropdown"></i>

                                                                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                                                    <!--

                                                                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('project/addEditProject/' . $project['project_id']); ?>"><i class="fa fa-edit"></i>Edit</a></li>
                                                                                     <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_row('<?php echo site_url('project/deleteProject/' . $project['project_id']); ?>')" ><i class="fa fa-trash"></i>Delete</a></li>
                                                                                    -->
                                                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_sub_task(<?php echo $subtask['task_id'] . ',' . $subtask['parent_task_id'] ?>);" ><i class="fa fa-plus"></i>Add Root Task</a></li>
                                                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_sub_task(<?php echo $subtask['task_id'] ?>);"><i class="fa fa-edit"></i>Edit Subtask</a></li>
                                                                                    <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_task('<?php echo $subtask['task_id'] ?>')" ><i class="fa fa-trash"></i>Delete Subtask</a></li>

                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    </tr>


                                                                    <?php
                                                                    foreach ($subtask['sub_sub_tasks'] as $key2 => $sub_sub_task) {
                                                                        $k++;
                                                                        ?>
                                                                        <tr data-index="<?php echo $sub_sub_task['task_id']; ?>" data-position="<?php echo $sub_sub_task['task_id']; ?>" class="roottask<?php echo $i; ?> border-bottom-primary" style="display:none;">

                                                                            <td style="padding-left:2.0rem !important;"><?php echo $i . '.' . $j . '.' . $k; ?></td>
                                                                            <td style="padding-left:2.3rem !important;"><?php echo $sub_sub_task['task_name']; ?></td>
<!--                                                                            <td><?php echo $sub_sub_task['origin']; ?></td>
                                                                            <td><?php echo $sub_sub_task['unit']; ?></td>
                                                                            <td><?php echo $sub_sub_task['quantity']; ?></td>
                                                                            <td><?php echo $sub_sub_task['task_value']; ?></td>-->
                                                                            <td> 
                                                                                <div class="dropdown">
                                                                                    <i class="  fa fa-cogs" data-toggle="dropdown"></i>

                                                                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">


                                                                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_root_task(<?php echo $sub_sub_task['task_id'] ?>);"><i class="fa fa-edit"></i>Edit Root Task</a></li>
                                                                                        <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_task('<?php echo $sub_sub_task['task_id'] ?>')" ><i class="fa fa-trash"></i>Delete Root Task</a></li>

                                                                                    </ul>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <tr data-index="<?php echo $subtask['task_id']; ?>" data-position="<?php echo $subtask['task_id']; ?>" class="subtask<?php echo $i; ?> border-bottom-primary" style="display:none;">

                                                                        <td style="padding-left:1.2rem !important;"><?php echo $i . '.' . $j; ?></td>
                                                                        <td style="padding-left:1.5rem !important;"><?php echo $subtask['task_name']; ?></td>
<!--                                                                        <td><?php echo $subtask['origin']; ?></td>
                                                                        <td><?php echo $subtask['unit']; ?></td>
                                                                        <td><?php echo $subtask['quantity']; ?></td>
                                                                        <td><?php echo $subtask['task_value']; ?></td>-->
                                                                        <td> 
                                                                            <div class="dropdown">
                                                                                <i class="  fa fa-cogs" data-toggle="dropdown"></i>

                                                                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                                                    <!--

                                                                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('project/addEditProject/' . $project['project_id']); ?>"><i class="fa fa-edit"></i>Edit</a></li>
                                                                                     <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_row('<?php echo site_url('project/deleteProject/' . $project['project_id']); ?>')" ><i class="fa fa-trash"></i>Delete</a></li>
                                                                                    -->
                                                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_sub_task(<?php echo $subtask['task_id'] . ',' . $subtask['parent_task_id'] ?>);" ><i class="fa fa-plus"></i>Add Root Task</a></li>
                                                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_sub_task(<?php echo $subtask['task_id'] ?>);"><i class="fa fa-edit"></i>Edit Subtask</a></li>
                                                                                    <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_task('<?php echo $subtask['task_id'] ?>')" ><i class="fa fa-trash"></i>Delete Subtask</a></li>

                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>  
            <?php }
        } else {
            ?>
                                                            <tr data-index="<?php echo $task['task_id']; ?>" data-position="<?php echo $task['task_id']; ?>" class="subtask<?php echo $i; ?> border-bottom-primary" >

                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $task['task_name']; ?></td>
<!--                                                                <td><?php echo $task['origin']; ?></td>
                                                                <td><?php echo $task['unit']; ?></td>
                                                                <td><?php echo $task['quantity']; ?></td>
                                                                <td><?php echo $task['task_value']; ?></td>-->
                                                                <td> 
                                                                    <div class="dropdown">
                                                                        <i class="  fa fa-cogs" data-toggle="dropdown"></i>

                                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                                            <!--

                                                                             <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('project/addEditProject/' . $project['project_id']); ?>"><i class="fa fa-edit"></i>Edit</a></li>
                                                                             <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_row('<?php echo site_url('project/deleteProject/' . $project['project_id']); ?>')" ><i class="fa fa-trash"></i>Delete</a></li>
                                                                            -->
                                                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_task(<?php echo $task['task_id'] ?>);" ><i class="fa fa-plus"></i>Add Subtask</a></li>
                                                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_task(<?php echo $task['task_id'] ?>);"><i class="fa fa-edit"></i>Edit Task</a></li>
                                                                            <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_task('<?php echo $task['task_id'] ?>')" ><i class="fa fa-trash"></i>Delete Task</a></li>

                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
        <?php } ?>    
    <?php } ?>
<?php } ?>

                                            </tbody>
                                        </table>
                                    </div><!--End Table Responsive-->

                                </div><!--End Card Block-->

                            </div><!--End Card Sale Block-->
                        </div><!--End Col-md-12 col-xl-8 -->
                        <div id="taskModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">New Task</h6>
                                        <button id="task_close" type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Task Name</label>
                                                    <select id="task_name" class="js-example-data-array form-control">
                                                        <?php foreach($item_category as $r){ ?>
                                                        <option><?php echo $r['c_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
<!--                                                    <input  id="task_name" type="text" class="form-control form-txt-primary">-->
                                                    <span id="task_name_error" style="color:red"></span>
                                                </div>
                                            </div>
<!--                                            <div class="col-md-12">
                                                <div class="row">

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Origin</label>
                                                            <input  id="task_origin" type="text" class="form-control form-txt-primary" >
                                                            <span id="task_origin_error" style="color:red"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Unit</label>
                                                            <input  id="task_unit" type="text" class="form-control form-txt-primary" placeholder="">
                                                            <span id="task_unit_error" style="color:red"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Quantity</label>
                                                            <input  id="task_quantity" type="text" class="form-control form-txt-primary" placeholder="">
                                                            <span id="task_quantity_error" style="color:red"></span>
                                                        </div>
                                                    </div>   
                                                </div>   
                                            </div>-->



<!--                                            <div class="col-md-12">
                                                <div id="task_currency">

                                                </div>End Task Currency          
                                            </div>-->


<!--                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Eq. Currency Value</label>
                                                    <input readonly  id="task_equivalent_currency_value" type="text" class="form-control form-txt-primary" >
                                                    <span id="task_equivalent_currency_value_error" style="color:red"></span>
                                                </div>
                                            </div>    
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Task Value %</label>
                                                    <input readonly id="task_equivalent_value" type="text" class="form-control form-txt-primary" >
                                                    <span id="task_equivalent_value_error" style="color:red"></span>
                                                </div>
                                            </div>     -->

                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button id="task_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button id="add_task" type="button" class="btn btn-primary" >Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="editTaskModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="head_edit_task_name">New Task</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input id="edit_task_id" type="hidden" class="form-control form-txt-primary">
                                                    <label style="margin-bottom: 0px;">Task Name</label>
                                                   <select id="edit_task_name" class="js-example-data-array form-control">
                                                        <?php foreach($item_category as $r){ ?>
                                                        <option><?php echo $r['c_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                     <!--<input  id="edit_task_name" type="text" class="form-control form-txt-primary">-->
                                                    <span id="edit_task_name_error" style="color:red"></span>
                                                </div>
                                            </div>
<!--                                            <div class="col-md-12">
                                                <div class="row">

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Origin</label>
                                                            <input  id="edit_task_origin" type="text" class="form-control form-txt-primary" >
                                                            <span id="edit_task_origin_error" style="color:red"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Unit</label>
                                                            <input  id="edit_task_unit" type="text" class="form-control form-txt-primary" placeholder="">
                                                            <span id="edit_task_unit_error" style="color:red"></span>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Quantity</label>
                                                            <input  id="edit_task_quantity" type="text" class="form-control form-txt-primary" placeholder="">
                                                            <span id="edit_task_quantity_error" style="color:red"></span>
                                                        </div>
                                                    </div>   
                                                </div>   
                                            </div>-->



<!--                                            <div class="col-md-12">
                                                <div id="edit_task_currency">

                                                </div>End Edit Task Currency    
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Eq. Currency Value</label>
                                                    <input readonly  id="edit_task_equivalent_currency_value" type="text" class="form-control form-txt-primary" >
                                                    <span id="edit_task_equivalent_currency_value_error" style="color:red"></span>
                                                </div>
                                            </div>        


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Task Value %</label>
                                                    <input readonly  id="edit_task_equivalent_value" type="text" class="form-control form-txt-primary" >
                                                </div>
                                            </div>     -->

                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button id="edit_task_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button id="update_task" type="button" class="btn btn-primary" data-dismiss="modal">Update</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="subTaskModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">New Subtask</h4>
                                        <button id="subtask_close" type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Task Name</label>
                                                    <input type="hidden" id="eq_task_value_id" value="" />
                                                    <input type="hidden" id="parent_task_id" value="" />
                                                    <input readonly id="parent_task_name" type="text" class="form-control form-txt-primary">
                                                </div>
                                            </div> 

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Subtask Name</label>
                                                    <select name="sub_task_name" id="sub_task_name" class="js-example-data-array form-control col-sm-12">
                                                        
                                                    </select>
                                                    <!--<input  id="sub_task_name" type="text" class="form-control form-txt-primary">-->
                                                    <span id="sub_task_name_error" style="color:red"></span>
                                                </div>
                                            </div>
<!--                                            <div class="col-md-12">
                                                <div class="row">

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Origin</label>
                                                            <input  id="sub_task_origin" type="text" class="form-control form-txt-primary" >
                                                            <span id="sub_task_origin_error" style="color:red"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Unit</label>
                                                            <input  id="sub_task_unit" type="text" class="form-control form-txt-primary" placeholder="">
                                                            <span id="sub_task_origin_error" style="color:red"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Quantity</label>
                                                            <input  id="sub_task_quantity" type="text" class="form-control form-txt-primary" placeholder="">
                                                            <span id="sub_task_quantity_error" style="color:red"></span>
                                                        </div>
                                                    </div>   
                                                </div>   
                                            </div>-->



<!--                                            <div class="col-md-12">
                                                <div id="sub_task_currency">
                                                </div> End Subtask Currency   
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Eq. Currency Value</label>
                                                    <input readonly  id="sub_task_equivalent_currency_value" type="text" class="form-control form-txt-primary" >
                                                    <span id="sub_task_equivalent_currency_error" style="color:red"></span>
                                                </div>
                                            </div>    
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Eq Task Value %</label>
                                                    <input readonly  id="sub_task_equivalent_value" type="text" class="form-control form-txt-primary" >
                                                </div>
                                            </div>     -->

                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button id="discard_sub_task" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button id="add_sub_task" type="button" class="btn btn-primary" >Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="editSubTaskModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">SubTask: <span id="s_task_name"></span> of <span id="sub_task_head"></span></h4>
                                        <button id="edit_sub_task_close" type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Task Name</label>
                                                    <input type="hidden" id="edit_project_id" value="" />
                                                    <input type="hidden" id="edit_eq_sub_task_value_id" value="" />
                                                    <input type="hidden" id="edit_sub_task_id" value="" />
                                                    <input type="hidden" id="edit_parent_task_id" value="" />
                                                    <input readonly id="edit_parent_task_name" type="text" class="form-control form-txt-primary">

                                                </div>
                                            </div> 

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Subtask Name</label>
                                                    <select name="edit_sub_task_name" id="edit_sub_task_name" class="js-example-data-array form-control col-sm-12">
                                                        
                                                    </select>
                                                    <!--<input  id="edit_sub_task_name" type="text" class="form-control form-txt-primary">-->
                                                    <span id="edit_sub_task_name_error" style="color:red"></span>
                                                </div>
                                            </div>
<!--                                            <div class="col-md-12">
                                                <div class="row">

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Origin</label>
                                                            <input  id="edit_sub_task_origin" type="text" class="form-control form-txt-primary" >
                                                            <span id="edit_sub_task_origin_error" style="color:red"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Unit</label>
                                                            <input  id="edit_sub_task_unit" type="text" class="form-control form-txt-primary" placeholder="">
                                                            <span id="edit_sub_task_unit_error" style="color:red"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Quantity</label>
                                                            <input  id="edit_sub_task_quantity" type="text" class="form-control form-txt-primary" placeholder="">
                                                            <span id="edit_sub_task_quantity_error" style="color:red"></span>
                                                        </div>
                                                    </div>   
                                                </div>   
                                            </div>



                                            <div class="col-md-12">
                                                <div id="edit_sub_task_currency">

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Eq Task Value</label>
                                                    <input readonly  id="edit_sub_task_equivalent_currency_value" type="text" class="form-control form-txt-primary" >
                                                    <span id="edit_sub_task_equivalent_currency_error" style="color:red"></span>
                                                </div>
                                            </div>      
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Task Value %</label>
                                                    <input readonly  id="edit_sub_task_equivalent_value" type="text" class="form-control form-txt-primary" >
                                                </div>
                                            </div>     -->

                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button id="discard_update_sub_task" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button id="update_sub_task" type="button" class="btn btn-primary" data-dismiss="modal">Update</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="rootTaskModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">New Root Tasks</h4>
                                        <button id="root_task_close" type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Task Name</label>
                                                    <input type="hidden" id="root_eq_task_value_id" value="" />
                                                    <input type="hidden" id="root_parent_task_id" value="" />
                                                    <input readonly id="root_parent_task_name" type="text" class="form-control form-txt-primary">
                                                </div>
                                            </div> 

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Subtask Name</label>
                                                    <input type="hidden" id="root_sub_task_id" value="" />
                                                    <input readonly id="root_sub_task_name" type="text" class="form-control form-txt-primary">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Root Task Name</label>
                                                    <input  id="root_task_name" type="text" class="form-control form-txt-primary">
                                                    <span id="root_task_name_error" style="color:red"></span>
                                                </div>
                                            </div>
<!--                                            <div class="col-md-12">
                                                <div class="row">

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Origin</label>
                                                            <input  id="root_task_origin" type="text" class="form-control form-txt-primary" >
                                                            <span id="root_task_origin_error" style="color:red"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Unit</label>
                                                            <input  id="root_task_unit" type="text" class="form-control form-txt-primary" placeholder="">
                                                            <span id="root_task_unit_error" style="color:red"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Quantity</label>
                                                            <input  id="root_task_quantity" type="text" class="form-control form-txt-primary" placeholder="">
                                                            <span id="root_task_quantity_error" style="color:red"></span>
                                                        </div>
                                                    </div>   
                                                </div>   
                                            </div>



                                            <div class="col-md-12">
                                                <div id="root_task_currency">

                                                </div>End Root Currency    
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Eq Currency Value</label>
                                                    <input readonly  id="root_task_equivalent_currency_value" type="text" class="form-control form-txt-primary" >
                                                    <span id="root_task_equivalent_currency_error" style="color:red"></span>
                                                </div>
                                            </div> 

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Task Value %</label>
                                                    <input readonly  id="root_task_equivalent_value" type="text" class="form-control form-txt-primary" >
                                                </div>
                                            </div>     -->

                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button id="discard_root_task" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button id="add_root_task" type="button" class="btn btn-primary" >Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="editRootTaskModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Root Task: <span id="r_task_name"></span> of <span id="root_task_head"></span></h4>
                                        <button id="edit_root_task_close" type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Task Name</label>
                                                    <input type="hidden" id="edit_root_eq_task_value_id" value="" />
                                                    <input type="hidden" id="edit_root_parent_id" value="" />
                                                    <input type="hidden" id="edit_root_sub_task_id" value="" />
                                                    <input type="hidden" id="edit_root_task_id" value="" />
                                                    <input readonly id="edit_root_parent_task_name" type="text" class="form-control form-txt-primary">
                                                </div>
                                            </div> 

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Subtask Name</label>
                                                    <input readonly id="edit_root_sub_task_name" type="text" class="form-control form-txt-primary">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Root Task Name</label>
                                                    <input  id="edit_root_task_name" type="text" class="form-control form-txt-primary">
                                                    <span id="edit_root_task_name_error" style="color:red"></span>
                                                </div>
                                            </div>
<!--                                            <div class="col-md-12">
                                                <div class="row">

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Origin</label>
                                                            <input  id="edit_root_task_origin" type="text" class="form-control form-txt-primary" >
                                                            <span id="edit_root_task_origin_error" style="color:red"></span>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Unit</label>
                                                            <input  id="edit_root_task_unit" type="text" class="form-control form-txt-primary" placeholder="">
                                                            <span id="edit_root_task_unit_error" style="color:red"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Quantity</label>
                                                            <input  id="edit_root_task_quantity" type="text" class="form-control form-txt-primary" placeholder="">
                                                            <span id="edit_root_task_quantity_error" style="color:red"></span>
                                                        </div>
                                                    </div>   
                                                </div>   
                                            </div>



                                            <div class="col-md-12">
                                                <div id="edit_root_task_currency">

                                                </div> End Root Task Currency 
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Eq. Currency Value %</label>
                                                    <input readonly  id="edit_root_task_equivalent_currency_value" type="text" class="form-control form-txt-primary" >
                                                    <span id="edit_root_task_equivalent_currency_error" style="color:red"></span>
                                                </div>
                                            </div>    

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Task Value %</label>
                                                    <input readonly id="edit_root_task_equivalent_value" type="text" class="form-control form-txt-primary" >
                                                </div>
                                            </div>     -->

                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button id="discard_edit_root_task" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button id="update_root_task" type="button" class="btn btn-primary" data-dismiss="modal">Update</button>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div><!--End Row-->
                    <!-- sale revenue card start -->



                </div><!--End tab pane task-->
                <div class="tab-pane" id="department7" role="tabpanel">

                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card sale-card">



                                <div class="card-block" style="padding-top: 5px;">
                                    <button id="new_department" class="btn btn-primary" style="float:left;padding:2px 6px;font-size:10px;" data-toggle="modal" data-target="#departmentModal"><i class="fa fa-plus" style="margin-right:0px"></i></button>
                                    <p style="text-align: center;margin-bottom: 0px;font-weight: bold;color:#4099FF;font-size:20px;">Department List</p>   

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr class="border-bottom-primary">
                                                    <th>SL</th>
                                                    <th>Department Name</th>                                                        
                                                    <th>Department Value</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="department_body">
                                                <?php if (!empty($departments)) { ?>
                                                    <?php
                                                    $i = 0;

                                                    foreach ($departments as $department) {
                                                        $i++;
                                                        ?>
                                                        <tr class="border-bottom-primary">

                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $department['dept_name']; ?></td>
                                                            <td><?php echo $department['dept_value']; ?></td>

                                                            <td> 
                                                                <div class="dropdown">
                                                                    <i class="  fa fa-cogs" data-toggle="dropdown"></i>

                                                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">


                                                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_department(<?php echo $department['dept_id'] ?>);"><i class="fa fa-edit"></i>Edit</a></li>
                                                                        <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_department('<?php echo $department['dept_id'] ?>')" ><i class="fa fa-trash"></i>Delete</a></li>

                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
    <?php } ?>      
<?php } ?>             

                                            </tbody>
                                        </table>
                                    </div><!--End Table Responsive-->

                                </div><!--End Card Block-->

                            </div><!--End Card Sale Block-->
                        </div><!--End Col-md-12 col-xl-8 -->

                        <div id="departmentModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Department Enrollment</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Department Name</label>
                                                    <input class="form-control "  id="department_name" name="department_name" type="text" value="">
                                                    <span id="dept_name_error" style="color:red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Department Value</label>
                                                    <input class="form-control "  id="department_value" name="department_value" type="text" value="">
                                                    <span id="dept_value_error" style="color:red"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Text Color</label>
                                                    <input class="form-control "  id="text_color_hex" name="text_color" type="text" value="">
                                                    <input style="width:50%;"  id="text_color" name="text_color" type="color" value="">

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Box Color</label>
                                                    <input class="form-control "  id="box_color_hex" name="box_color" type="text" value="">
                                                    <input style="width:50%;"  id="box_color" name="text_color" type="color" value="">
                                                </div>
                                            </div>

                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button id="dept_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button id="department_save" type="button" class="btn btn-primary" >Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="departmentEditModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Department Enrollment</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <input class="form-control "  id="dept_id" name="" type="hidden" value="">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Department Name</label>
                                                    <input class="form-control "  id="edit_department_name" name="department_name" type="text" value="">
                                                    <span id="edit_dept_name_error" style="color:red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Department Value</label>
                                                    <input class="form-control "  id="edit_department_value" name="department_value" type="text" value="">
                                                    <span id="edit_dept_value_error" style="color:red"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Text Color</label>
                                                    <input class="form-control "  id="edit_text_color_hex" name="text_color" type="text" value="">
                                                    <input style="width:50%;"  id="edit_text_color" name="text_color" type="color" value="">

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Box Color</label>
                                                    <input class="form-control "  id="edit_box_color_hex" name="box_color" type="text" value="">
                                                    <input style="width:50%;"  id="edit_box_color" name="text_color" type="color" value="">
                                                </div>
                                            </div>


                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button id="discard_edit_department" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button id="department_update" type="button" class="btn btn-primary" >Update</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!--End Row-->
                    <!-- sale revenue card start -->



                </div><!--End tab pane department-->

<!--                <div class="tab-pane" id="status7" role="tabpanel">

                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card sale-card">



                                <div class="card-block" style="padding-top: 5px;">


                                    <div class="col-md-4 pull-right" style="float: right;">
                                        <select id="search_dept_id" style="float: right;" name="dept_id" class="js-example-data-array form-control col-sm-12">
                                            <option value="">Select Department</option>
<?php foreach ($departments as $department) { ?>
                                                <option value="<?php echo $department['dept_id'] ?>"><?php echo $department['dept_name'] ?></option>
<?php } ?>
                                        </select>
                                    </div>

                                    <button class="btn btn-primary" style="float:left;padding:2px 6px;font-size:10px;" data-toggle="modal" data-target="#statusModal"><i class="fa fa-plus" style="margin-right:0px"></i></button>
                                    <p style="text-align: center;margin-bottom: 0px;font-weight: bold;color:#4099FF;font-size:20px;">Status List</p>   

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr class="border-bottom-primary">
                                                    <th>SL</th>
                                                    
                                                    <th>Department</th>
                                                    
                                                    <th>Status Name</th>                                                        

                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="status_body">
                                                <?php if (!empty($status)) { ?>
                                                    <?php
                                                    $i = 0;

                                                    foreach ($status as $st) {
                                                        $i++;
                                                        ?>
                                                        <tr class="border-bottom-primary">

                                                            <td><?php echo $i; ?></td>
                                                            
                                                            <td><?php echo $st['dept_name']; ?></td>
                                                            
                                                            <td><?php echo $st['status_name']; ?></td>


                                                            <td style="text-align: right;"> 
                                                                <div class="dropdown">
                                                                    <i class="  fa fa-cogs" data-toggle="dropdown"></i>

                                                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">


                                                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_status(<?php echo $st['status_id'] ?>);"><i class="fa fa-edit"></i>Edit</a></li>
                                                                        <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_status('<?php echo $st['status_id'] ?>')" ><i class="fa fa-trash"></i>Delete</a></li>

                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
    <?php } ?>      
<?php } ?>             

                                            </tbody>
                                        </table>
                                    </div>End Table Responsive

                                </div>End Card Block

                            </div>End Card Sale Block
                        </div>End Col-md-12 col-xl-8 

                        <div id="statusModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                 Modal content
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Status</h4>
                                        <button id="status_close" type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Department</label>
                                                    <select id="status_dept_id" name="dept_id" class="js-example-data-array form-control col-sm-12">
                                                        <option value="">Select Department</option>
<?php foreach ($departments as $department) { ?>
                                                            <option value="<?php echo $department['dept_id'] ?>"><?php echo $department['dept_name'] ?></option>
<?php } ?>


                                                    </select>
                                                    <span id="status_dept_error" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Status Name</label>
                                                    <input class="form-control "  id="status_name" name="status_name" type="text" value="">
                                                    <span id="status_name_error" style="color:red;"></span>
                                                </div>
                                            </div>

                                        </div>End Row
                                    </div>
                                    <div class="modal-footer">
                                        <button id="status_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button id="status_save" type="button" class="btn btn-primary" >Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="statusEditModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                 Modal content
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Status</h4>
                                        <button id="edit_status_close" type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <input class="form-control "  id="status_id" name="" type="hidden" value="">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Department</label>
                                                    <select id="edit_status_dept_id" name="dept_id" class="js-example-data-array form-control col-sm-12">
                                                        <option value="">Select Department</option>
<?php foreach ($departments as $department) { ?>
                                                            <option value="<?php echo $department['dept_id'] ?>"><?php echo $department['dept_name'] ?></option>
<?php } ?>


                                                    </select>
                                                    <span id="edit_status_dept_error" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Status Name</label>
                                                    <input class="form-control "  id="edit_status_name" name="status_name" type="text" value="">
                                                    <span id="edit_status_name_error" style="color:red;"></span>
                                                </div>
                                            </div>

                                        </div>End Row
                                    </div>
                                    <div class="modal-footer">
                                        <button id="edit_status_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button id="status_update" type="button" class="btn btn-primary" data-dismiss="modal">Update</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>End Row
                     sale revenue card start 



                </div>End tab pane status-->

                <div class="tab-pane" id="users7" role="tabpanel">

                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card sale-card">



                                <div class="card-block" style="padding-top: 5px;">


                                    <button class="btn btn-primary" style="float:left;padding:2px 6px;font-size:10px;" data-toggle="modal" data-target="#userModal"><i class="fa fa-plus" style="margin-right:0px"></i></button>
                                    <p style="text-align: center;margin-bottom: 0px;font-weight: bold;color:#4099FF;font-size:20px;">Users List</p>   

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr class="border-bottom-primary">
                                                    <th>SL</th>
                                                    <th>User Name</th>
                                                    <th>User Role</th>

                                                    <th>Department Name</th>

                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="assign_user_body">
                                                <?php if (!empty($project_users)) { ?>
                                                    <?php
                                                    $i = 0;

                                                    foreach ($project_users as $usr) {
                                                        $i++;
                                                        switch ($usr['user_type']) {
                                                            case 1 : $type = 'Admin';
                                                                break;
                                                            case 2 : $type = 'Project Manager';
                                                                break;
                                                            case 3 : $type = 'Monitor';
                                                                break;
                                                            case 4 : $type = 'Moderator';
                                                                break;
                                                            default : $type = 'Moderator';
                                                                break;
                                                        }
                                                        ?>
                                                        <tr class="border-bottom-primary">

                                                            <td><?php echo $i; ?></td>

                                                            <td><?php echo $usr['username']; ?></td>


                                                            <td><?php echo $type; ?></td>

                                                            <td><?php echo $usr['dept_name']; ?></td>


                                                            <td style="text-align: right;"> 
                                                                <div class="dropdown">
                                                                    <i class="  fa fa-cogs" data-toggle="dropdown"></i>

                                                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">


                                                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_assign_user(<?php echo $usr['assign_user_id'] ?>);"><i class="fa fa-edit"></i>Edit</a></li>
                                                                        <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_assign_user('<?php echo $usr['assign_user_id'] ?>')" ><i class="fa fa-trash"></i>Delete</a></li>

                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
    <?php } ?>      
<?php } ?>             

                                            </tbody>
                                        </table>
                                    </div><!--End Table Responsive-->

                                </div><!--End Card Block-->

                            </div><!--End Card Sale Block-->
                        </div><!--End Col-md-12 col-xl-8 -->

                        <div id="userModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Assign User</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>User Role</label>
                                                    <select id="assign_user_type" name="assign_user_type" class="js-example-data-array form-control col-sm-12">
                                                        <option value="">Select User Role</option>
                                                        <!--<option value="1">Admin</option>-->
                                                        <option value="2">Project Manager</option>
                                                        <option value="3">Monitor</option>
                                                        <option value="4">Moderator</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="show_department" style="display:none;">
                                                <div class="form-group">
                                                    <label>Department Name</label>
                                                    <select id="assign_user_dept_id" name="assign_dept_id" class="js-example-data-array form-control col-sm-12">
                                                        <option value="">Select Department</option>
<?php foreach ($departments as $department) { ?>
                                                            <option value="<?php echo $department['dept_id'] ?>"><?php echo $department['dept_name'] ?></option>
<?php } ?>


                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>User Name</label>
                                                    <select id="assign_user_id" name="assign_user_id" class="js-example-data-array form-control col-sm-12">
                                                        <option value="">Select User</option>
<?php foreach ($users as $user) { ?>
                                                            <option value="<?php echo $user['user_id'] ?>"><?php echo $user['username'] ?></option>
<?php } ?>


                                                    </select>
                                                </div>
                                            </div>

                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <input id="assign_user_edit_id" type="hidden">
                                        <button id="assign_user_save" type="button" class="btn btn-primary">Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div><!--End Row-->
                    <!-- sale revenue card start -->



                </div><!--End tab pane status-->
                <div class="tab-pane" id="documents" role="tabpanel">

                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card sale-card">



                                <div class="card-block" style="padding-top: 5px;">


                                    <button class="btn btn-primary" style="float:left;padding:2px 6px;font-size:10px;" data-toggle="modal" data-target="#documentsModal"><i class="fa fa-plus" style="margin-right:0px"></i></button>
                                    <p style="text-align: center;margin-bottom: 0px;font-weight: bold;color:#4099FF;font-size:20px;">Documents List</p>   

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr class="border-bottom-primary">
                                                    <th>SL</th>
                                                    <th>Title</th>
                                                    <th>Details</th>
                                                    <th>Renewal Date</th>
                                                    <th>Remaining Days</th>
                                                    <th>Document</th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="assign_user_body">
                                                <?php if (!empty($documents)) { ?>
                                                    <?php
                                                    $i = 0;

                                                    foreach ($documents as $document) {
                                                        $i++;
                                                        ?>
                                                        <tr class="border-bottom-primary">

                                                            <td><?php echo $i; ?></td>

                                                            <td id="tit_<?php echo $document['id']; ?>"><?php echo $document['title']; ?></td>


                                                            <td id="desc_<?php echo $document['id']; ?>"><?php echo $document['description']; ?></td>

                                                            <td id="file_date_<?php echo $document['id']; ?>"><?php echo $document['renew_date']; ?></td>
                                                            <td><?php 
                                                                $now = time(); // or your date as well
                                                                $your_date = strtotime($document['renew_date']);
                                                                $datediff = $your_date-$now;
                                                                echo round($datediff / (60 * 60 * 24));
                                                               ?>
                                                            </td>
                                                            <td id="file_<?php echo $document['id']; ?>">
                                                                <?php
                                                                $ext = pathinfo($document['file'], PATHINFO_EXTENSION);
                                                                if(in_array($ext, array('jpg','png','jpeg','gif'))){
                                                                ?>
                                                                <a href="<?php echo site_url('assets/uploads/files/'.$document['file']); ?>" target="_blank"><img style="width:80px;height:80px" src="assets/uploads/files/<?php echo $document['file']; ?>"></a>
                                                                <?php }else{ ?>
                                                                <a href="<?php echo site_url('assets/uploads/files/'.$document['file']); ?>" target="_blank" class="btn btn-info">View</a>
                                                                <?php } ?>
                                                            </td>
                                                            <td style="text-align: right;"> 
                                                                <div class="dropdown">
                                                                    <i class="  fa fa-cogs" data-toggle="dropdown"></i>

                                                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">


                                                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_document(<?php echo $document['id'] ?>);"><i class="fa fa-edit"></i>Edit</a></li>
                                                                        <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_document('<?php echo $document['id'] ?>')" ><i class="fa fa-trash"></i>Delete</a></li>

                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
    <?php } ?>      
<?php } ?>             

                                            </tbody>
                                        </table>
                                    </div><!--End Table Responsive-->

                                </div><!--End Card Block-->

                            </div><!--End Card Sale Block-->
                        </div><!--End Col-md-12 col-xl-8 -->

                        <div id="documentsModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <form action="<?php echo site_url('project/upload_document/'.$project_info[0]['project_id']); ?>" method="post" enctype="multipart/form-data">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Upload Document</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" id="file_title" name="title">
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control" id="file_desc" name="description"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Renew Date</label>
                                                    <input type="text" id="file_date" class="form-control datepicker" name="renew_date">
                                                </div>
                                                <div class="form-group">
                                                    <label>Upload Document</label>
                                                    <input type="file" class="form-control" name="file">
                                                    <input type="hidden" class="form-control" name="id" id="doc_id">
                                                </div>
                                            </div>
                                            
                                

                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-left" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                                </div>

                            </div>
                        </div>



                    </div><!--End Row-->
                    <!-- sale revenue card start -->



                </div><!--End tab pane status-->




                <div class="tab-pane" id="dept_task7" role="tabpanel">

                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card sale-card">



                                <div class="card-block" style="padding-top: 5px;">
                                    <div class="col-md-4 pull-right" style="float: right;">
                                        <select id="dep_task_search_dept_id" style="float: right;" name="dep_task_search_dept_id" class="js-example-data-array form-control col-sm-12">
                                            <option value="">Select Department</option>
<?php foreach ($departments as $department) { ?>
                                                <option value="<?php echo $department['dept_id'] ?>"><?php echo $department['dept_name'] ?></option>
<?php } ?>
                                        </select>
                                    </div>
                                    <p style="text-align: center;margin-bottom: 0px;font-weight: bold;color:#4099FF;font-size:20px;">Department Task Tree</p>   

                                    <div class="table-responsive">
                                        <button class="btn btn-sm btn-primary" id="set_date"> Set Date</button>
                                        <button class="btn btn-sm btn-primary" id="set_status"> Set Status</button>
                                        <br>
                                        <table class="table">
                                            <thead>
                                                <tr class="border-bottom-primary">
                                                    <th><input type="checkbox" id="checkall"> SL</th>
                                                    <th>Task Name</th>
                                                    <th>Specification</th>
                                                    <th>Unit</th>
                                                    <th style="text-align:right">Qty</th>
                                                    <th style="text-align:right">Rate</th>
                                                    <th style="text-align:right">Total</th>
                                                    <th style="text-align:right">Starting Date</th>
                                                    <th style="text-align:right">Ending Date</th>
                                                    <!--<th>Moderator</th>-->
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="task_body">
                                                <?php if (!empty($tasks)) { ?>
                                                    <?php
                                                    $i = 0;
                                                    foreach ($tasks as $key => $task) {
                                                        $i++;
                                                        ?>

                                                        <?php
                                                        if (!empty($tasks[$key]['sub_tasks'])) {
                                                            $j = 0;
                                                            ?>
                                                            <tr class="border-bottom-primary">

                                                                                                                   <!-- <td><input type="checkbox" name="dept_check[]" id="dept_check_<?php echo $task['task_id'] ?>"> <?php echo $i; ?></td>-->
                                                                <td>
                                                                    <input type="checkbox" name="dept_check[]" id="dept_check_<?php echo $task['task_id'] ?>">
                                                                    <i id="dept_expand_subtask_<?php echo $i; ?>" class="fa fa-plus" onclick="javascript:deptExpandSubtask(<?php echo $i; ?>)"></i>
                                                                    <i style="display:none;" id="dept_collapse_subtask_<?php echo $i; ?>"  class="fa fa-minus" onclick="javascript:deptCollapseSubtask(<?php echo $i; ?>)"></i>
                                                                </td>
                                                                <td><?php echo summary($task['task_name'], 70); ?></td>
                                                                <td id="meterial_specification_<?php echo $task['task_id'] ?>"></td>
                                                                <td id="unit_<?php echo $task['task_id'] ?>"></td>
                                                                <td style="text-align:right" id="qty_<?php echo $task['task_id'] ?>"></td>
                                                                <td style="text-align:right" id="rate_<?php echo $task['task_id'] ?>" ></td>
                                                                <td style="text-align:right" id="total_<?php echo $task['task_id'] ?>"></td>
                                                                <td style="text-align:right" id="startdate_<?php echo $task['task_id'] ?>"></td>
                                                                <td style="text-align:right" id="enddate_<?php echo $task['task_id'] ?>"></td>
                                                                <!--<td id="moderator_<?php echo $task['task_id'] ?>"><a href="javascript:">Set Moderator</a></td>-->

                                                                <td> 
                                                                    <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>
                                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:" onclick="set_dept_task_value(<?php echo $task['task_id'] ?>)"><i class="fa fa-trash"></i>Set Task Value</a></li>
                                                                            <!--<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:" onclick="set_dept_task_risk_level(<?php echo $task['task_id'] ?>)"><i class="fa fa-trash"></i>Set Risk Level</a></li>-->

                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            foreach ($tasks[$key]['sub_tasks'] as $key1 => $subtask) {
                                                                $j++;
                                                                ?>
                <?php
                if (!empty($subtask['sub_sub_tasks'])) {
                    $k = 0;
                    ?>

                                                                    <tr class="dept_subtask<?php echo $i; ?> border-bottom-primary" style="display:none;">

                                                                                                                                                   <!-- <td><input type="checkbox" name="dept_check[]" id="dept_check_<?php echo $subtask['task_id'] ?>"> <?php echo $i . '.' . $j; ?></td>-->

                                                                        <td>
                                                                            <input type="checkbox" name="dept_check[]" id="dept_check_<?php echo $subtask['task_id'] ?>"> 
                                                                            <i id="dept_expand_root_task_<?php echo $i . $j; ?>" class="dept_expand_root_task<?php echo $i; ?> fa fa-plus" onclick="javascript:deptExpandRoottask(<?php echo $i, ',' . $j; ?>)"></i>
                                                                            <i style="display:none;" id="dept_collapse_root_task_<?php echo $i . $j; ?>" class="dept_collapse_root_task<?php echo $i; ?> fa fa-minus" onclick="javascript:deptCollapseRoottask(<?php echo $i . ',' . $j; ?>)"></i>
                                                                        </td>
                                                                        <td style="padding-left:1.2rem !important;"><?php echo summary($subtask['task_name'], 70); ?></td>
                                                                        <td id="meterial_specification_<?php echo $subtask['task_id'] ?>"></td>
                                                                        <td id="unit_<?php echo $subtask['task_id'] ?>"></td>
                                                                        <td style="text-align:right" id="qty_<?php echo $subtask['task_id'] ?>"></td>
                                                                        <td style="text-align:right" id="rate_<?php echo $subtask['task_id'] ?>" ></td>
                                                                        <td style="text-align:right" id="total_<?php echo $subtask['task_id'] ?>"></td>
                                                                        <td style="text-align:right" id="startdate_<?php echo $subtask['task_id'] ?>"></td>
                                                                        <td style="text-align:right" id="enddate_<?php echo $subtask['task_id'] ?>"></td>
                                                                        <!--<td id="moderator_<?php echo $subtask['task_id'] ?>"><a href="javascript:">Set Moderator</a></td>-->

                                                                        <td> 

                                                                        </td>
                                                                    </tr>


                    <?php
                    foreach ($subtask['sub_sub_tasks'] as $key2 => $sub_sub_task) {
                        $k++;
                        ?>
                                                                        <tr class="dept_roottask<?php echo $i; ?> border-bottom-primary" style="display:none;">

                                                                                                                                                         <!--   <td><input type="checkbox" name="dept_check[]" id="dept_check_<?php echo $sub_sub_task['task_id'] ?>" class="rootitem"> <?php echo $i . '.' . $j . '.' . $k; ?></td>-->
                                                                            <td style="padding-left:2.0rem !important;">
                                                                                <input type="checkbox" name="dept_check[]" id="dept_check_<?php echo $sub_sub_task['task_id'] ?>" class="rootitem"><?php echo $i . '.' . $j . '.' . $k; ?> 
                                                                            </td>
                                                                            <td style="padding-left:2.3rem !important;"><?php echo summary($sub_sub_task['task_name'], 70); ?></td>
                                                                            <td id="meterial_specification_<?php echo $sub_sub_task['task_id'] ?>"></td>
                                                                            <td id="unit_<?php echo $sub_sub_task['task_id'] ?>"></td>
                                                                            <td style="text-align:right" id="qty_<?php echo $sub_sub_task['task_id'] ?>"></td>
                                                                            <td style="text-align:right" id="rate_<?php echo $sub_sub_task['task_id'] ?>" ></td>
                                                                            <td style="text-align:right" id="total_<?php echo $sub_sub_task['task_id'] ?>"></td>
                                                                            <td style="text-align:right" id="startdate_<?php echo $sub_sub_task['task_id'] ?>"></td>
                                                                            <td style="text-align:right" id="enddate_<?php echo $sub_sub_task['task_id'] ?>"></td>
                                                                            <!--<td id="moderator_<?php echo $sub_sub_task['task_id'] ?>"><a href="javascript:">Set Moderator</a></td>-->

                                                                            <td> 
                                                                               <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>
                                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:" onclick="set_dept_task_value(<?php echo $sub_sub_task['task_id'] ?>)"><i class="fa fa-trash"></i>Set Task Value</a></li>
                                                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:" onclick="get_dept_task_status(<?php echo $sub_sub_task['task_id'] ?>)"><i class="fa fa-trash"></i>Set Status</a></li>

                                                                        </ul>
                                                                    </div>
                                                                            </td>
                                                                        </tr>
                    <?php }
                } else {
                    ?>
                                                                    <tr class="dept_subtask<?php echo $i; ?> border-bottom-primary" style="display:none;">

                                                                        <td style="padding-left:1.2rem !important;"><input type="checkbox" name="dept_check[]" id="dept_check_<?php echo $subtask['task_id'] ?>" class="rootitem"><?php echo $i . '.' . $j; ?></td>
                                                                        <td style="padding-left:1.5rem !important;"><?php echo summary($subtask['task_name'], 70); ?></td>
                                                                        <td id="meterial_specification_<?php echo $subtask['task_id'] ?>"></td>
                                                                        <td id="unit_<?php echo $subtask['task_id'] ?>"></td>
                                                                        <td style="text-align:right" id="qty_<?php echo $subtask['task_id'] ?>"></td>
                                                                        <td style="text-align:right" id="rate_<?php echo $subtask['task_id'] ?>" ></td>
                                                                        <td style="text-align:right" id="total_<?php echo $subtask['task_id'] ?>"></td>
                                                                        <td style="text-align:right" id="startdate_<?php echo $subtask['task_id'] ?>"></td>
                                                                        <td style="text-align:right" id="enddate_<?php echo $subtask['task_id'] ?>"></td>
                                                                        <!--<td id="moderator_<?php echo $subtask['task_id'] ?>">Moderator</td>-->

                                                                        <td>
                                                                            
                                                                                                                             <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>
                                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:" onclick="set_dept_task_value(<?php echo $subtask['task_id'] ?>)"><i class="fa fa-trash"></i>Set Task Value</a></li>
                                                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:" onclick="get_dept_task_status(<?php echo $subtask['task_id'] ?>)"><i class="fa fa-trash"></i>Set Status</a></li>

                                                                        </ul>
                                                                    </div>
                                                                            
                                                                          
                                                                        </td>
                                                                    </tr>
                <?php } ?>  
            <?php }
        } else {
            ?>
                                                            <tr class="dept_subtask<?php echo $i; ?> border-bottom-primary">

                                                                <td><input type="checkbox" name="dept_check[]" id="dept_check_<?php echo $task['task_id'] ?>" class="rootitem"><?php echo $i; ?></td>
                                                                <td><?php echo summary($task['task_name'], 70); ?></td>
                                                                <td id="meterial_specification_<?php echo $task['task_id'] ?>"></td>
                                                                <td id="unit_<?php echo $task['task_id'] ?>"></td>
                                                                <td style="text-align:right" id="qty_<?php echo $task['task_id'] ?>"></td>
                                                                <td style="text-align:right" id="rate_<?php echo $task['task_id'] ?>" ></td>
                                                                <td style="text-align:right" id="total_<?php echo $task['task_id'] ?>"></td>
                                                                <td style="text-align:right" id="startdate_<?php echo $task['task_id'] ?>"></td>
                                                                <td style="text-align:right" id="enddate_<?php echo $task['task_id'] ?>"></td>
                                                                <!--<td id="moderator_<?php echo $task['task_id'] ?>"><a href="javascript:">Set Moderator</a></td>-->

                                                                <td> 
                                                                    <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>
                                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:" onclick="set_dept_task_value(<?php echo $task['task_id'] ?>)"><i class="fa fa-trash"></i>Set Task Value</a></li>
                                                                            <!--<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:" onclick="set_dept_task_risk_level(<?php echo $task['task_id'] ?>)"><i class="fa fa-trash"></i>Set Risk Level</a></li>-->
                                                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:" onclick="get_dept_task_status(<?php echo $task['task_id'] ?>)"><i class="fa fa-trash"></i>Set Status</a></li>

                                                                        </ul>
                                                                    </div>


                                                                </td>
                                                            </tr>
        <?php } ?>    
    <?php } ?>
<?php } ?>
                                              <tr class="border-bottom-primary">
                                                    <td style="text-align:right">Grand Total</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td style="text-align:right" id="task_grand_total_amount"></td>
                                                    <td></td>
                                                    <td></td>
                                                    <!--<th>Moderator</th>-->
                                                    <td></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div><!--End Table Responsive-->

                                </div><!--End Card Block-->

                            </div><!--End Card Sale Block-->
                        </div><!--End Col-md-12 col-xl-8 -->


                        <div id="dept_task_risk_Modal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Risk Level</h4>
                                        <button id="risk_close" type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">

                                        <div class="row">

                                            <input type="hidden" id="risk_task_id" value="" />
                                            <div class="col-md-12">
                                                <div class="row">

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Crisis Note</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Above</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Below</label>
                                                        </div>
                                                    </div>

                                                </div> 
                                                <div class="row">

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Critical</label>
                                                            <input  id="critical" type="hidden" class="form-control form-txt-primary" value="Critical" >

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"> 
                                                        <div class="form-group">

                                                            <input  id="critical_above" type="text" class="form-control form-txt-primary" placeholder="Above">
                                                            <span id="critical_above_error" style="color:red"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">

                                                            <input  id="critical_below" type="text" class="form-control form-txt-primary" placeholder="Below">
                                                            <span id="critical_below_error" style="color:red"></span>
                                                        </div>
                                                    </div>

                                                </div>
                                                <br>
                                                <div class="row">

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">High</label>
                                                            <input  id="high" type="hidden" class="form-control form-txt-primary" value="High" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <input  id="high_above" type="text" class="form-control form-txt-primary" placeholder="Above">
                                                            <span id="high_above_error" style="color:red"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <input  id="high_below" type="text" class="form-control form-txt-primary" placeholder="Below">
                                                            <span id="high_below_error" style="color:red"></span>
                                                        </div>
                                                    </div>

                                                </div>   
                                                <br>
                                                <div class="row">

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Moderate</label>
                                                            <input  id="moderate" type="hidden" class="form-control form-txt-primary" value="Moderate" >

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"> 
                                                        <div class="form-group">

                                                            <input  id="moderate_above" type="text" class="form-control form-txt-primary" placeholder="Above">
                                                            <span id="moderate_above_error" style="color:red"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">

                                                            <input  id="moderate_below" type="text" class="form-control form-txt-primary" placeholder="Below">
                                                            <span id="moderate_below_error" style="color:red"></span>
                                                        </div>
                                                    </div>

                                                </div>
                                                <br>
                                                <div class="row">

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 0px;">Low</label>
                                                            <input  id="low" type="hidden" class="form-control form-txt-primary" value="Low" >

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"> 
                                                        <div class="form-group">

                                                            <input  id="low_above" type="text" class="form-control form-txt-primary" placeholder="Above">
                                                            <span id="low_above_error" style="color:red"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4"> 
                                                        <div class="form-group">

                                                            <input  id="low_below" type="text" class="form-control form-txt-primary" placeholder="Below">
                                                            <span id="low_below_error" style="color:red"></span>
                                                        </div>
                                                    </div>

                                                </div>  
                                            </div>






                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button id="risk_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button id="add_risk" type="button" class="btn btn-primary" data-dismiss="modal" >Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>





                        <div id="dept_task_status_Modal" class="modal fade bd-example-modal-lg" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4  class="modal-title"> <span id="dept_task_set_status"></span> Enrolled Output</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-8" style="border-right: 1px solid#000;">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr class="border-bottom-primary">
                                                                <th>SL</th>
                                                                <th>Status Name</th>
                                                                <th>Value</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="dept_task_status_body">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Enrolled Status to Task</h4>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label style="margin-bottom: 0px;">Status</label>
                                                        <select id="enrolled_status" name="enrolled_status" class="js-example-data-array form-control col-sm-12">


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label style="margin-bottom: 0px;">Percentage</label>
                                                        <input  id="enrolled_percentage" type="text" class="form-control form-txt-primary">
                                                        <input  id="enrolled_task_id" type="hidden">
                                                        <input  id="dept_task_status_id" type="hidden">
                                                    </div>
                                                </div>

                                            </div>



                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button id="task_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button id="enrolled_save" type="button" class="btn btn-primary" >Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="moderatorModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Set Moderator</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Select Moderator</label>
                                                    <select id="dept_task_moderator_id" name="dept_task_moderator_id" class="js-example-data-array form-control col-sm-12">


                                                    </select>
                                                    <input type="hidden" id="set_moderator_task">
                                                </div>

                                            </div>


                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button id="task_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button id="set_moderator" type="button" class="btn btn-primary" >Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="set_dateModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Set Date</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Start Date</label>
                                                    <input type="text" value="" required class="form-control fill datepicker" id="set_start_date" name="start_date[]" placeholder="DD/MM/YYYY">

                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">End Date</label>
                                                    <input type="text" value="" required class="form-control fill datepicker" id="set_end_date" name="end_date[]" placeholder="DD/MM/YYYY">

                                                </div>
                                            </div>


                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button id="task_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button onclick="save_date()" type="button" class="btn btn-primary" >Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="set_valueModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Set Specification</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Task Name</label>
                                                    <input type="text" value="" required class="form-control" id="set_taskname" name="specification" readonly>

                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Material Specification</label>
                                                    <input type="text" value="" required class="form-control" id="set_specification" name="specification" placeholder="Material Specification">

                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Unit</label>
                                                    <input type="text" value="" required class="form-control" id="set_unit" name="unit" placeholder="Unit">

                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Quantity</label>
                                                    <input type="text" value="" required onkeyup="calculatetasktotal()" class="form-control" id="set_qty" name="qty" placeholder="Quantity">

                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Rate</label>
                                                    <input type="hidden" id="set_task_value">
                                                    <input type="text" value="" required onkeyup="calculatetasktotal()" class="form-control" id="set_rate" name="Rate" placeholder="Unit">

                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Total Amount</label>
                                                    <input type="text" class="form-control" id="set_t_amount" name="t_amount" disabled placeholder="Total Amount">

                                                </div>

                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Start Date</label>
                                                    <input type="text" value="" required class="form-control fill datepicker" id="dept_task_start_date" name="start_date[]" placeholder="DD/MM/YYYY">

                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">End Date</label>
                                                    <input type="text" value="" required class="form-control fill datepicker" id="dept_task_end_date" name="end_date[]" placeholder="DD/MM/YYYY">
                                                </div>

                                                <div class="form-group">
                                                    <label style="margin-bottom: 0px;">Remarks</label>
                                                    <input type="text" class="form-control" id="set_remarks" name="remarks" placeholder="Set Remark">

                                                </div>
                                            </div>


                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button id="task_value_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button onclick="set_task_value()" type="button" class="btn btn-primary" >Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="set_statusModal" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Enrolled Output</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-8" style="border-right: 1px solid#000;">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr class="border-bottom-primary">
                                                                <th>SL</th>
                                                                <th>Status Name</th>
                                                                <th>Value</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="multiple_dept_task_status_body">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Enrolled Status to Task</h4>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label style="margin-bottom: 0px;">Status</label>
                                                        <select id="multiple_enrolled_status" name="enrolled_status" class="js-example-data-array form-control col-sm-12">


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label style="margin-bottom: 0px;">Percentage</label>
                                                        <input required  id="multiple_enrolled_percentage" type="text" class="form-control form-txt-primary">

                                                    </div>
                                                </div>

                                            </div>



                                        </div><!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button id="task_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button id="multiple_enrolled_save" type="button" class="btn btn-primary" >Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!--End Row-->
                    <!-- sale revenue card start -->

                </div><!--End tab pane task-->




            </div><!--End tab card block-->

            <!-- [ page content ] end -->
        </div><!--End Page Body-->
    </div><!--End Page Wrapper-->
</div><!--End Main Body-->

<!-- Table Sortable -->
<script type="text/javascript">
// $('#task_body').sortable({
//      update: function ( event, ui ){
//            console.log($(this));
//            $(this).children().each(function(index){
//                if($(this).attr('data-position')!=(index+1)){
//                    $(this).attr('data-position',(index+1)).addClass('updated');
//                }
//                saveNewPosition();
//                
//            });
//      }
//  });  
//  
//  function saveNewPosition(){
//      var positions=[];
//      $('.updated').each(function(){
//          positions.push([$(this).attr('data-index'),$(this).attr('data-position')]);
//        //  alert($(this).attr('data-index'));
//          $(this).removeClass('updated');
//      });
//
//     $.ajax({
//                type:"POST",
//                url:"backend/project/updateTaskPosition",
//                data:{'positions':positions,'update':1},
//                dataType: "text",
//                success: function (data) {  
//                  // alert(data);
//                }
//     })
//      
//  }
</script>    
<!-- Table Sortable -->


<!-- Assign Task Module -->
<script type="text/javascript">
    function edit_document(id){
        $('#file_title').val($('#tit_'+id).html());
        $('#file_desc').val($('#desc_'+id).html());
        $('#file_date').val($('#file_date_'+id).html());
        $('#doc_id').val(id);
        $('#documentsModal').modal('show')
    }
    function delete_document(id){
        if(confirm('Are you sure to delete ? ')==true){
            location.href = '<?php echo site_url('project/delete_project/') ?>/'+id;
        }
    }
    function calculatetasktotal(){
        var qty = Number($('#set_qty').val())
        var rate = Number($('#set_rate').val())
        $('#set_t_amount').val((rate*qty))
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
    $('.roottask' + id).hide();
    }

    function expandRoottask(id = '', sub = ''){
    $('#expand_root_task_' + id + sub).hide();
    $('#collapse_root_task_' + id + sub).show();
    $('.roottask' + id).show();
    }

    function collapseRoottask(id = '', sub = ''){
    $('#expand_root_task_' + id + sub).show();
    $('#collapse_root_task_' + id + sub).hide();
    $('.roottask' + id).hide();
    }

    $('#new_task').click(function(){
    //alert('test');
    var project_id = $('#project_id').val();
    $.ajax({
    type:"POST",
            url:"backend/project/projectCurrencyInfo",
            data:{project_id:project_id},
            dataType: "json",
            success: function (data) {
            var total_currency = data.project_currency_info.length;
            //alert(total_currency);
            var str = '';
            str += '<div class="row">';
            str += '<input type="hidden" id="total_currency" value="' + total_currency + ' " >';
            $(data.project_currency_info).each(function (i, v) {
            i = i + 1;
            str += '<div class="col-md-6"><div class="form-group">';
            str += '<label style="margin-bottom: 0px;">' + v.title + ' Value%</label>';
            str += '<input type="hidden" id="currency_id_' + i + '" value="' + v.currency_id + '" >';
            str += ' <input type="hidden" id="currency_eq_' + i + '" value="' + v.equivalant_value + '" >';
            str += '<input id="task_currency_value_' + i + '" type="text" class="form-control form-txt-primary" placeholder="' + v.remainig_equivalant_value + '" value="" onkeyup="javascript:task_currency_amount_calculation(' + i + ')" onblur="javascript:task_currency_amount_calculation(' + i + ')" onchange="javascript:task_currency_amount_calculation(' + i + ')"  >';
            str += '<span style="color:red" id="task_currency_value_error_' + i + '"></span>';
            str += ' </div></div>';
            str += '<div class="col-md-6"><div class="form-group">';
            str += '<label style="margin-bottom: 0px;">' + v.title + ' Amount</label>';
            str += '<input type="hidden" id="task_currency_exchange_rate_' + i + '" value="' + v.currency_rate + '" >';
            str += '<input id="task_currency_amount_' + i + '" type="text" class="form-control form-txt-primary" placeholder="' + v.remaining_equivalant_amount + '" value="" onkeyup="javascript:task_currency_value_calculation(' + i + ')" onblur="javascript:task_currency_value_calculation(' + i + ')" onchange="javascript:task_currency_value_calculation(' + i + ')" >';
            str += '<span style="color:red" id="task_currency_amount_error_' + i + '"></span>';
            str += '</div></div>';
            });
            str += '</div>';
            $('#task_currency').html(str);
            }
    })
//         var str='';
//         str+='<div class="row">';
//         str+='<input type="hidden" id="total_currency" value="" >';
//         str+='<div class="col-md-6"><div class="form-group">';
//         str+='<label style="margin-bottom: 0px;">'+1+' Value%</label>';
//         str+='<input type="hidden" id="currency_id_'+1+' " value="'+1+'">';
//         str+=' <input type="hidden" id="currency_eq_'+1+' " value="'+1+'" >';
//         str+='<input id="task_currency_value_'+1+' " type="text" class="form-control form-txt-primary" placeholder="" value="" onkeyup="javascript:task_currency_amount_calculation('+1+')" onblur="javascript:task_currency_amount_calculation('+1+')" onchange="javascript:task_currency_amount_calculation('+1+')">';
//         str+=' </div></div>';
//         str+='<div class="col-md-6"><div class="form-group">';
//         str+='<label style="margin-bottom: 0px;">'+1+' Amount</label>';
//         str+='<input type="hidden" id="task_currency_exchange_rate_'+1+' value="'+1+'" >';
//         str+='<input id="task_currency_amount_'+1+' " type="text" class="form-control form-txt-primary" placeholder="" value="" onkeyup="javascript:task_currency_value_calculation('+1+')" onblur="javascript:task_currency_value_calculation('+1+')" onchange="javascript:task_currency_value_calculation('+1+')">';
//         str+='</div></div>';
//         str+='</div>';
//         $('#task_currency').html(str);
    });
    function task_currency_amount_calculation(id = ''){

    var remaining_task_value = Number($('#task_currency_value_' + id).attr('placeholder'));
    var remaining_task_amount = Number($('#task_currency_amount_' + id).attr('placeholder'));
    var equivalent_project_value = Number($('#project_equivalent_value').val());
    var exchange_rate;
    var total_eq_val = $('#currency_eq_' + id).val();
    var eq_val_percent = $('#task_currency_value_' + id).val();
    var amount = (Number(total_eq_val) * Number(eq_val_percent)) / 100;
    //alert(amount)
    //  var exchange_amount=amount/exchange_rate;
    //    if(!($.isNumeric(eq_val_percent))){
    if (!($.isNumeric(eq_val_percent))){
    $('#task_currency_value_' + id).val('');
    $('#task_currency_amount_' + id).val('');
    return false;
    } else{
    if (eq_val_percent < 0){
    $('#task_currency_value_' + id).val('');
    $('#task_currency_amount_' + id).val('');
    return false;
    }
    }
    if (eq_val_percent < 0){
    $('#task_currency_value_' + id).val('');
    $('#task_currency_amount_' + id).val('');
    return false;
    }
    if (amount != 0){
    $('#task_currency_amount_' + id).val(amount.toFixed(6));
    } else{
    $('#task_currency_amount_' + id).val('');
    }

    if (remaining_task_amount < amount){
    $('#task_currency_amount_' + id).val('');
    $('#task_currency_amount_' + id).css('border', '1px solid red');
    $('#task_currency_amount_error_' + id).html('Amount should not be more than ' + remaining_task_amount);
    } else{
    $('#task_currency_amount_' + id).css('border', '1px solid #ccc');
    $('#task_currency_amount_error_' + id).html('');
    }
    if (eq_val_percent != '' || eq_val_percent != 0){

    if (eq_val_percent <= remaining_task_value){
    $('#task_currency_value_' + id).val(eq_val_percent);
    $('#task_currency_value_' + id).css('border', '1px solid #ccc');
    $('#task_currency_value_error_' + id).html('');
    } else{
    $('#task_currency_value_' + id).val('');
    $('#task_currency_value_' + id).css('border', '1px solid red');
    $('#task_currency_value_error_' + id).html('Value should not be more than ' + remaining_task_value + '%');
    }
    } else{
    $('#task_currency_value_' + id).val('');
    $('#task_currency_value_' + id).css('border', '1px solid #ccc');
    $('#task_currency_value_error_' + id).html('');
    }

    var currency_qty = Number($('#total_currency').val());
    var total_currency_amount = 0;
    for (var i = 1; i <= currency_qty; i++){
    c_amount = $('#task_currency_amount_' + i).val();
    exchange_rate = Number($('#task_currency_exchange_rate_' + i).val());
    // var currency_amount=c_amount*exchange_rate;
    var currency_amount = c_amount / exchange_rate;
    total_currency_amount = Number(total_currency_amount) + Number(currency_amount);
    }
    // alert(total_currency_amount);
    $('#task_equivalent_currency_value').val(total_currency_amount);
    var task_value = (total_currency_amount / equivalent_project_value) * 100;
    // $('#project_value').val(total_amt.toFixed(6));
    $('#task_equivalent_value').val(task_value.toFixed(6));
    }
    function task_currency_value_calculation(id = ''){
    var remaining_task_value = Number($('#task_currency_value_' + id).attr('placeholder'));
    var remaining_task_amount = Number($('#task_currency_amount_' + id).attr('placeholder'));
    // alert(remaining_value);
    var equivalent_project_value = Number($('#project_equivalent_value').val());
    // var exchange_rate=Number($('#task_currency_exchange_rate_'+id).val());
    var exchange_rate;
    var total_eq_val = Number($('#currency_eq_' + id).val());
    var eq_val_amount = Number($('#task_currency_amount_' + id).val());
    //var amount=exchange_rate*eq_val_amount;
    //var currency_value=(amount*100)/total_eq_val;

    var currency_value = (eq_val_amount * 100) / total_eq_val;
    if (!($.isNumeric(eq_val_amount))){
    $('#task_currency_value_' + id).val('');
    $('#task_currency_amount_' + id).val('');
    return false;
    } else{
    if (eq_val_amount < 0){
    $('#task_currency_value_' + id).val('');
    $('#task_currency_amount_' + id).val('');
    return false;
    }
    }

    if (remaining_task_amount < eq_val_amount){
    $('#task_currency_amount_' + id).val('');
    $('#task_currency_amount_' + id).css('border', '1px solid red');
    $('#task_currency_amount_error_' + id).html('Amount should not be more than ' + remaining_task_amount);
    } else{
    $('#task_currency_amount_' + id).css('border', '1px solid #ccc');
    $('#task_currency_amount_error_' + id).html('');
    }
    if (currency_value != '' || currency_value != 0){
    if (currency_value <= remaining_task_value){
    $('#task_currency_value_' + id).val(currency_value.toFixed(6));
    $('#task_currency_value_' + id).css('border', '1px solid #ccc');
    $('#task_currency_value_error_' + id).html('');
    } else{
    $('#task_currency_value_' + id).val('');
    $('#task_currency_value_' + id).css('border', '1px solid red');
    $('#task_currency_value_error_' + id).html('Value should not be more than ' + remaining_task_value + '%');
    }
    } else{
    $('#task_currency_value_' + id).val('');
    $('#task_currency_value_' + id).css('border', '1px solid #ccc');
    $('#task_currency_value_error_' + id).html('');
    }

    var currency_qty = $('#total_currency').val();
    var total_currency_amount = 0;
    for (var i = 1; i <= currency_qty; i++){
//            var currency_amount=$('#task_currency_amount_'+i).val();
//            total_currency_amount=Number(total_currency_amount)+Number(currency_amount);
    c_amount = $('#task_currency_amount_' + i).val();
    exchange_rate = Number($('#task_currency_exchange_rate_' + i).val());
    var currency_amount = c_amount / exchange_rate;
    total_currency_amount = Number(total_currency_amount) + Number(currency_amount);
    }
    $('#task_equivalent_currency_value').val(total_currency_amount);
    var task_value = (total_currency_amount / equivalent_project_value) * 100;
    $('#task_equivalent_value').val(task_value.toFixed(6));
    }

    function edit_task_currency_amount_calculation(id = ''){
    //alert(id);
    var equivalent_project_value = Number($('#project_equivalent_value').val());
    var exchange_rate;
    var total_eq_val = $('#edit_currency_eq_' + id).val();
    var eq_val_percent = $('#edit_task_currency_value_' + id).val();
    // var amount=(total_eq_val*eq_val_percent)/100;
    var amount = (Number(total_eq_val) * Number(eq_val_percent)) / 100;
    $('#edit_task_currency_amount_' + id).val(amount.toFixed(6));
    var currency_qty = Number($('#edit_total_currency').val());
    var total_currency_amount = 0;
    for (var j = 1; j <= currency_qty; j++){
    c_amount = $('#edit_task_currency_amount_' + j).val();
    exchange_rate = Number($('#edit_task_currency_exchange_rate_' + j).val());
    var currency_amount = c_amount / exchange_rate;
    total_currency_amount = Number(total_currency_amount) + Number(currency_amount);
    }
    //alert(total_currency_amount);
    $('#edit_task_equivalent_currency_value').val(total_currency_amount);
    var task_value = (total_currency_amount / equivalent_project_value) * 100;
    $('#edit_task_equivalent_value').val(task_value.toFixed(6));
    }

    function edit_task_currency_value_calculation(id = ''){
    var equivalent_project_value = Number($('#project_equivalent_value').val());
    var exchange_rate;
    var total_eq_val = Number($('#edit_currency_eq_' + id).val());
    var eq_val_amount = Number($('#edit_task_currency_amount_' + id).val());
    var currency_value = (eq_val_amount * 100) / total_eq_val;
    $('#edit_task_currency_value_' + id).val(currency_value.toFixed(6));
    var currency_qty = $('#edit_total_currency').val();
    var total_currency_amount = 0;
    for (var j = 1; j <= currency_qty; j++){
//            var currency_amount=$('#task_currency_amount_'+i).val();
//            total_currency_amount=Number(total_currency_amount)+Number(currency_amount);
    c_amount = $('#edit_task_currency_amount_' + j).val();
    exchange_rate = Number($('#edit_task_currency_exchange_rate_' + j).val());
    var currency_amount = c_amount / exchange_rate;
    total_currency_amount = Number(total_currency_amount) + Number(currency_amount);
    }
    $('#edit_task_equivalent_currency_value').val(total_currency_amount);
    var task_value = (total_currency_amount / equivalent_project_value) * 100;
    $('#edit_task_equivalent_value').val(task_value.toFixed(6));
    }

    function delete_task(task_id = ''){
    var project_id = $('#project_id').val();
    //   alert(task_id);
    var r = confirm("Are you sure?");
    if (r == true){
    $.ajax({
    type:"POST",
            url:"backend/project/deleteTask",
            data:{project_id:project_id, task_id:task_id},
            dataType: "json",
            success: function (data) {
            if (data.status = "success"){
            var str = '';
            var j = 0;
            $(data.tasks).each(function (i, v) {
            j = j + 1;
            if (v.sub_tasks != ''){
            str += '<tr class="border-bottom-primary">';
            str += '<td><i id="expand_subtask_' + j + '" class="fa fa-plus" onclick="javascript:expandSubtask(' + j + ')"></i>';
            str += ' <i style="display:none;" id="collapse_subtask_' + j + '"  class="fa fa-minus" onclick="javascript:collapseSubtask(' + j + ')"></i>';
            str += '</td>'
                    str += '<td>' + v.task_name + '</td>';
//            str += '<td>' + v.origin + '</td>';
//            str += '<td>' + v.unit + '</td>';
//            str += '<td>' + v.quantity + '</td>';
//            str += '<td>' + v.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_task(' + v.task_id + ');"><i class="fa fa-plus"></i>Add Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_task(' + v.task_id + ');"><i class="fa fa-edit"></i>Edit Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + v.task_id + ');"><i class="fa fa-trash"></i>Delete Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            var k = 0;
            $(v.sub_tasks).each(function (m, n) {
            k = k + 1;
            l = j + "." + k;
            if (n.sub_sub_tasks != ''){

            str += '<tr class="subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:1.2rem !important;">';
            str += '<i id="expand_root_task_' + j + k + '" class="expand_root_task' + j + ' fa fa-plus" onclick="javascript:expandRoottask(' + j + ',' + k + ')"></i>';
            str += '<i style="display:none;" id="collapse_root_task_' + j + k + '" class="collapse_root_task' + j + ' fa fa-minus" onclick="javascript:collapseRoottask(' + j + ',' + k + ')"></i>';
            str += '</td>';
            str += '<td style="padding-left:1.5rem !important;">' + n.task_name + '</td>';
//            str += '<td>' + n.origin + '</td>';
//            str += '<td>' + n.unit + '</td>';
//            str += '<td>' + n.quantity + '</td>';
//            str += '<td>' + n.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_sub_task(' + n.task_id + ',' + n.parent_task_id + ');"><i class="fa fa-plus"></i>Add Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_sub_task(' + n.task_id + ');"><i class="fa fa-edit"></i>Edit Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + n.task_id + ');"><i class="fa fa-trash"></i>Delete Subtask</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            var a = 0;
            $(n.sub_sub_tasks).each(function (o, p) {
            a = a + 1;
            b = j + "." + k + "." + a;
            str += '<tr class="roottask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:2.0rem !important;">' + b + '</td>';
            str += '<td style="padding-left:2.3rem !important;">' + p.task_name + '</td>';
//            str += '<td>' + p.origin + '</td>';
//            str += '<td>' + p.unit + '</td>';
//            str += '<td>' + p.quantity + '</td>';
//            str += '<td>' + p.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_root_task(' + p.task_id + ');"><i class="fa fa-edit"></i>Edit Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + p.task_id + ');"><i class="fa fa-trash"></i>Delete Root Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            } else{
            str += '<tr class="subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:1.2rem !important;">' + l + '</td>';
            str += '<td style="padding-left:1.5rem !important;">' + n.task_name + '</td>';
//            str += '<td>' + n.origin + '</td>';
//            str += '<td>' + n.unit + '</td>';
//            str += '<td>' + n.quantity + '</td>';
//            str += '<td>' + n.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_sub_task(' + n.task_id + ',' + n.parent_task_id + ');"><i class="fa fa-plus"></i>Add Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_sub_task(' + n.task_id + ');"><i class="fa fa-edit"></i>Edit Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + n.task_id + ');"><i class="fa fa-trash"></i>Delete Subtask</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            }
            });
            } else{
            str += '<tr class="subtask' + j + ' border-bottom-primary">';
            str += '<td>' + j + '</td>';
            str += '<td>' + v.task_name + '</td>';
//            str += '<td>' + v.origin + '</td>';
//            str += '<td>' + v.unit + '</td>';
//            str += '<td>' + v.quantity + '</td>';
//            str += '<td>' + v.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_task(' + v.task_id + ');"><i class="fa fa-plus"></i>Add Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_task(' + v.task_id + ');"><i class="fa fa-edit"></i>Edit Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + v.task_id + ');"><i class="fa fa-trash"></i>Delete Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            }

            });
            $('#task_body').html(str);
            }
            }
    })
    }

    }
    $('#task_discard').click(function(){
    $("#taskModal :input").val('');
    $('#task_currency').html('');
    $('#task_name_error').html("");
    $('#task_origin_error').html("");
    $('#task_unit_error').html("");
    $('#task_quantity_error').html("");
    $('#task_equivalent_currency_value_error').html('');
    $('#task_name').css('border', '1px solid #ccc');
    $('#task_origin').css('border', '1px solid #ccc');
    $('#task_unit').css('border', '1px solid #ccc');
    $('#task_quantity').css('border', '1px solid #ccc');
    $('#task_equivalent_currency_value').css('border', '1px solid #ccc');
    });
    $('#task_close').click(function(){
    $("#taskModal :input").val('');
    $('#task_currency').html('');
    $('#task_name_error').html("");
    $('#task_origin_error').html("");
    $('#task_unit_error').html("");
    $('#task_quantity_error').html("");
    $('#task_equivalent_currency_value_error').html('');
    $('#task_name').css('border', '1px solid #ccc');
    $('#task_origin').css('border', '1px solid #ccc');
    $('#task_unit').css('border', '1px solid #ccc');
    $('#task_quantity').css('border', '1px solid #ccc');
    $('#task_equivalent_currency_value').css('border', '1px solid #ccc');
    });
    $('#add_task').click(function(){
    var cur_qty = Number($('#total_currency').val());
    var currency = [];
    for (var z = 1; z <= cur_qty; z++){
    var id = $('#currency_id_' + z).val();
    var value = $('#task_currency_value_' + z).val();
    var camount = $('#task_currency_amount_' + z).val();
    currency.push({
    c_id: id,
            c_value:value,
            c_amount:camount
    });
    }
    var project_id = $('#project_id').val();
    var task_name = $('#task_name').val();
    var origin = $('#task_origin').val();
    var unit = $('#task_unit').val();
    var quantity = $('#task_quantity').val();
    var task_value = $('#task_equivalent_value').val();
    var task_equivalent_currency = $('#task_equivalent_currency_value').val();
    if (task_name == '' && origin == '' && unit == '' && quantity == '' && task_equivalent_currency == ''){
    $('#task_name_error').html("Please fill name field");
    $('#task_origin_error').html("Please fill origin field");
    $('#task_unit_error').html("Please fill unit field");
    $('#task_quantity_error').html("Please fill quantity field");
    $('#task_equivalent_currency_value_error').html('Please fill equivalent currency field');
    $('#task_name').css('border', '1px solid red');
    $('#task_origin').css('border', '1px solid red');
    $('#task_unit').css('border', '1px solid red');
    $('#task_quantity').css('border', '1px solid red');
    $('#task_equivalent_currency_value').css('border', '1px solid red');
    return false;
    } else if (task_name == ''){

    $('#task_name_error').html("Please fill name field");
    $('#task_origin_error').html("");
    $('#task_unit_error').html("");
    $('#task_quantity_error').html("");
    $('#task_equivalent_currency_value_error').html('');
    $('#task_name').css('border', '1px solid red');
    $('#task_origin').css('border', '1px solid #ccc');
    $('#task_unit').css('border', '1px solid #ccc');
    $('#task_quantity').css('border', '1px solid #ccc');
    $('#task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (origin == ''){
    $('#task_name_error').html("");
    $('#task_origin_error').html("Please fill origin field");
    $('#task_unit_error').html("");
    $('#task_quantity_error').html("");
    $('#task_equivalent_currency_value_error').html('');
    $('#task_name').css('border', '1px solid #ccc');
    $('#task_origin').css('border', '1px solid red');
    $('#task_unit').css('border', '1px solid #ccc');
    $('#task_quantity').css('border', '1px solid #ccc');
    $('#task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (unit == ''){
    $('#task_name_error').html("");
    $('#task_origin_error').html("");
    $('#task_unit_error').html("Please fill unit field");
    $('#task_quantity_error').html("");
    $('#task_equivalent_currency_value_error').html('');
    $('#task_name').css('border', '1px solid #ccc');
    $('#task_origin').css('border', '1px solid #ccc');
    $('#task_unit').css('border', '1px solid red');
    $('#task_quantity').css('border', '1px solid #ccc');
    $('#task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (quantity == ''){
    $('#task_name_error').html("");
    $('#task_origin_error').html("");
    $('#task_unit_error').html("");
    $('#task_quantity_error').html("Please fill quantity field");
    $('#task_equivalent_currency_value_error').html('');
    $('#task_name').css('border', '1px solid #ccc');
    $('#task_origin').css('border', '1px solid #cc');
    $('#task_unit').css('border', '1px solid #ccc');
    $('#task_quantity').css('border', '1px solid red');
    $('#task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (task_equivalent_currency == ''){
    $('#task_name_error').html("");
    $('#task_origin_error').html("");
    $('#task_unit_error').html("");
    $('#task_quantity_error').html("");
    $('#task_equivalent_currency_value_error').html('Please fill origin field');
    $('#task_name').css('border', '1px solid #ccc');
    $('#task_origin').css('border', '1px solid #ccc');
    $('#task_unit').css('border', '1px solid #ccc');
    $('#task_quantity').css('border', '1px solid #ccc');
    $('#task_equivalent_currency_value').css('border', '1px solid red');
    return false;
    }
    $.ajax({
    type:"POST",
            url:"backend/project/addEditProjectTask",
            data:{currency:currency, project_id:project_id, task_name:task_name, origin:origin, unit:unit, quantity:quantity, task_equivalent_currency:task_equivalent_currency, task_value:task_value},
            dataType: "json",
            success: function (data) {


            if (data.status == "success"){
            //   alert('test');
            $("#taskModal :input").val('');
            $('#task_name_error').html("");
            $('#task_origin_error').html("");
            $('#task_unit_error').html("");
            $('#task_quantity_error').html("");
            $('#task_equivalent_currency_value_error').html('');
            $('#task_name').css('border', '1px solid #ccc');
            $('#task_origin').css('border', '1px solid #ccc');
            $('#task_unit').css('border', '1px solid #ccc');
            $('#task_quantity').css('border', '1px solid #ccc');
            $('#task_equivalent_currency_value').css('border', '1px solid #ccc');
            var total_currency = data.project_currency_info.length;
            var str1 = '';
            str1 += '<div class="row">';
            str1 += '<input type="hidden" id="total_currency" value="' + total_currency + ' " >';
            $(data.project_currency_info).each(function (s, t) {
            s = s + 1;
            str1 += '<div class="col-md-6"><div class="form-group">';
            str1 += '<label style="margin-bottom: 0px;">' + t.title + ' Value%</label>';
            str1 += '<input type="hidden" id="currency_id_' + s + '" value="' + t.currency_id + '" >';
            str1 += ' <input type="hidden" id="currency_eq_' + s + '" value="' + t.equivalant_value + '" >';
            str1 += '<input id="task_currency_value_' + s + '" type="text" class="form-control form-txt-primary" placeholder="' + t.remainig_equivalant_value + '" value="" onkeyup="javascript:task_currency_amount_calculation(' + s + ')" onblur="javascript:task_currency_amount_calculation(' + s + ')" onchange="javascript:task_currency_amount_calculation(' + s + ')" >';
            str1 += ' </div></div>';
            str1 += '<div class="col-md-6"><div class="form-group">';
            str1 += '<label style="margin-bottom: 0px;">' + t.title + ' Amount</label>';
            str1 += '<input type="hidden" id="task_currency_exchange_rate_' + s + '" value="' + t.currency_rate + '" >';
            str1 += '<input id="task_currency_amount_' + s + '" type="text" class="form-control form-txt-primary" placeholder="' + t.remaining_equivalant_amount + '" value="" onkeyup="javascript:task_currency_value_calculation(' + s + ')" onblur="javascript:task_currency_value_calculation(' + s + ')" onchange="javascript:task_currency_value_calculation(' + s + ')" >';
            str1 += '</div></div>';
            });
            str1 += '</div>';
            $('#task_currency').html(str1);
            var str = '';
            var j = 0;
            $(data.tasks).each(function (i, v) {
            j = j + 1;
            if (v.sub_tasks != ''){
            str += '<tr class="border-bottom-primary">';
            str += '<td><i id="expand_subtask_' + j + '" class="fa fa-plus" onclick="javascript:expandSubtask(' + j + ')"></i>';
            str += ' <i style="display:none;" id="collapse_subtask_' + j + '"  class="fa fa-minus" onclick="javascript:collapseSubtask(' + j + ')"></i>';
            str += '</td>'
                    str += '<td>' + v.task_name + '</td>';
//            str += '<td>' + v.origin + '</td>';
//            str += '<td>' + v.unit + '</td>';
//            str += '<td>' + v.quantity + '</td>';
//            str += '<td>' + v.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_task(' + v.task_id + ');"><i class="fa fa-plus"></i>Add Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_task(' + v.task_id + ');"><i class="fa fa-edit"></i>Edit Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + v.task_id + ');"><i class="fa fa-trash"></i>Delete Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            var k = 0;
            $(v.sub_tasks).each(function (m, n) {
            k = k + 1;
            l = j + "." + k;
            if (n.sub_sub_tasks != ''){

            str += '<tr class="subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:1.2rem !important;">';
            str += '<i id="expand_root_task_' + j + k + '" class="expand_root_task' + j + ' fa fa-plus" onclick="javascript:expandRoottask(' + j + ',' + k + ')"></i>';
            str += '<i style="display:none;" id="collapse_root_task_' + j + k + '" class="collapse_root_task' + j + ' fa fa-minus" onclick="javascript:collapseRoottask(' + j + ',' + k + ')"></i>';
            str += '</td>';
            str += '<td style="padding-left:1.5rem !important;">' + n.task_name + '</td>';
//            str += '<td>' + n.origin + '</td>';
//            str += '<td>' + n.unit + '</td>';
//            str += '<td>' + n.quantity + '</td>';
//            str += '<td>' + n.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_sub_task(' + n.task_id + ',' + n.parent_task_id + ');"><i class="fa fa-plus"></i>Add Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_sub_task(' + n.task_id + ');"><i class="fa fa-edit"></i>Edit Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + n.task_id + ');"><i class="fa fa-trash"></i>Delete Subtask</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            var a = 0;
            $(n.sub_sub_tasks).each(function (o, p) {
            a = a + 1;
            b = j + "." + k + "." + a;
            str += '<tr class="roottask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:2.0rem !important;">' + b + '</td>';
            str += '<td style="padding-left:2.3rem !important;">' + p.task_name + '</td>';
//            str += '<td>' + p.origin + '</td>';
//            str += '<td>' + p.unit + '</td>';
//            str += '<td>' + p.quantity + '</td>';
//            str += '<td>' + p.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_root_task(' + p.task_id + ');"><i class="fa fa-edit"></i>Edit Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + p.task_id + ');"><i class="fa fa-trash"></i>Delete Root Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            } else{
            str += '<tr class="subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:1.2rem !important;">' + l + '</td>';
            str += '<td style="padding-left:1.5rem !important;">' + n.task_name + '</td>';
//            str += '<td>' + n.origin + '</td>';
//            str += '<td>' + n.unit + '</td>';
//            str += '<td>' + n.quantity + '</td>';
//            str += '<td>' + n.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_sub_task(' + n.task_id + ',' + n.parent_task_id + ');"><i class="fa fa-plus"></i>Add Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_sub_task(' + n.task_id + ');"><i class="fa fa-edit"></i>Edit Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + n.task_id + ');"><i class="fa fa-trash"></i>Delete Subtask</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            }
            });
            } else{
            str += '<tr class="subtask' + j + ' border-bottom-primary">';
            str += '<td>' + j + '</td>';
            str += '<td>' + v.task_name + '</td>';
//            str += '<td>' + v.origin + '</td>';
//            str += '<td>' + v.unit + '</td>';
//            str += '<td>' + v.quantity + '</td>';
//            str += '<td>' + v.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_task(' + v.task_id + ');"><i class="fa fa-plus"></i>Add Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_task(' + v.task_id + ');"><i class="fa fa-edit"></i>Edit Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + v.task_id + ');"><i class="fa fa-trash"></i>Delete Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            }

            });
            $('#task_body').html(str);
            // $('#taskModal').modal('show');


            } else{
            $('#task_name').css('border', '1px solid red');
            $('#task_name_error').html("This task already exists");
            }
            }
    })

    });
    function edit_task(task_id = ''){
    var project_id = $('#project_id').val();
    $.ajax({
    type:"POST",
            url:"backend/project/taskInfo",
            data:{project_id:project_id, task_id:task_id},
            dataType: "json",
            success: function (data) {


            $('#edit_task_id').val(task_id);
            var task_name = data.task_info[0]['task_name'];
            var origin = data.task_info[0]['origin'];
            var unit = data.task_info[0]['unit'];
            var quantity = data.task_info[0]['quantity'];
            var equivalent_value = data.task_info[0]['task_value'];
            var task_equivalent_currency_value = data.task_info[0]['task_equivalent_currency'];
            $('#head_edit_task_name').html(task_name);
            $('#edit_task_name').val(task_name).trigger('change');;
            $('#edit_task_origin').val(origin);
            $('#edit_task_unit').val(unit);
            $('#edit_task_quantity').val(quantity);
            $('#edit_task_equivalent_value').val(equivalent_value);
            $('#edit_task_equivalent_currency_value').val(task_equivalent_currency_value);
            $('#editTaskModal').modal('show');
            var total_currency = data.task_currencies.length;
            var str = '';
            str += '<div class="row">';
            str += '<input type="hidden" id="edit_total_currency" value="' + total_currency + ' " >';
            $(data.task_currencies).each(function (i, v) {
            i = i + 1;
            str += '<div class="col-md-6"><div class="form-group">';
            str += '<label style="margin-bottom: 0px;">' + v.title + ' Value%</label>';
            str += '<input type="hidden" id="edit_currency_id_' + i + '" value="' + v.currency_id + '" >';
            str += ' <input type="hidden" id="edit_currency_eq_' + i + '" value="' + v.project_eq_value + '" >';
            str += '<input id="edit_task_currency_value_' + i + '" type="text" class="form-control form-txt-primary" placeholder="' + v.equivalant_value + '" value="' + v.equivalant_value + '" onkeyup="javascript:edit_task_currency_amount_calculation(' + i + ')" onblur="javascript:edit_task_currency_amount_calculation(' + i + ')" onchange="javascript:edit_task_currency_amount_calculation(' + i + ')" >';
            str += ' </div></div>';
            str += '<div class="col-md-6"><div class="form-group">';
            str += '<label style="margin-bottom: 0px;">' + v.title + ' Amount</label>';
            str += '<input type="hidden" id="edit_task_currency_exchange_rate_' + i + '" value="' + v.project_currency_rate + '" >';
            str += '<input id="edit_task_currency_amount_' + i + '" type="text" class="form-control form-txt-primary" placeholder="' + v.equivalant_amount + '" value="' + v.equivalant_amount + '" onkeyup="javascript:edit_task_currency_value_calculation(' + i + ')" onblur="javascript:edit_task_currency_value_calculation(' + i + ')" onchange="javascript:edit_task_currency_value_calculation(' + i + ')" >';
            str += '</div></div>';
            });
            str += '</div>';
            $('#edit_task_currency').html(str);
//                $('#task').hide();
//                $('#root_task').hide();
//                $('#sub_task').hide();
//                $('#edit_task').show();


            }
    })
    }

    $('#edit_task_discard').click(function(){
//         $("#edit_task :input").val('');
//         $('#edit_task').hide();
//         $('#root_task').hide();
//         $('#sub_task').hide();
//         $('#task').show();
    $("#editTaskModal :input").val('');
    });
    $('#update_task').click(function(){
    var cur_qty = Number($('#edit_total_currency').val());
    var currency = [];
    for (var z = 1; z <= cur_qty; z++){
    var id = $('#edit_currency_id_' + z).val();
    var value = $('#edit_task_currency_value_' + z).val();
    var camount = $('#edit_task_currency_amount_' + z).val();
    currency.push({
    c_id: id,
            c_value:value,
            c_amount:camount
    });
    }
    var project_id = $('#project_id').val();
    var task_id = $('#edit_task_id').val();
    var task_name = $('#edit_task_name').val();
    var origin = $('#edit_task_origin').val();
    var unit = $('#edit_task_unit').val();
    var quantity = $('#edit_task_quantity').val();
    var task_value = $('#edit_task_equivalent_value').val();
    var task_equivalent_currency = $('#edit_task_equivalent_currency_value').val();
    if (task_name == '' && origin == '' && unit == '' && quantity == '' && task_equivalent_currency == ''){
    $('#edit_task_name_error').html("Please fill name field");
    $('#edit_task_origin_error').html("Please fill origin field");
    $('#edit_task_unit_error').html("Please fill unit field");
    $('#edit_task_quantity_error').html("Please fill quantity field");
    $('#edit_task_equivalent_currency_value_error').html('Please fill equivalent currency field');
    $('#edit_task_name').css('border', '1px solid red');
    $('#edit_task_origin').css('border', '1px solid red');
    $('#edit_task_unit').css('border', '1px solid red');
    $('#edit_task_quantity').css('border', '1px solid red');
    $('#edit_task_equivalent_currency_value').css('border', '1px solid red');
    return false;
    } else if (task_name == ''){

    $('#edit_task_name_error').html("Please fill name field");
    $('#edit_task_origin_error').html("");
    $('#edit_task_unit_error').html("");
    $('#edit_task_quantity_error').html("");
    $('#edit_task_equivalent_currency_value_error').html('');
    $('#edit_task_name').css('border', '1px solid red');
    $('#edit_task_origin').css('border', '1px solid #ccc');
    $('#edit_task_unit').css('border', '1px solid #ccc');
    $('#edit_task_quantity').css('border', '1px solid #ccc');
    $('#edit_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (origin == ''){
    $('#edit_task_name_error').html("");
    $('#edit_task_origin_error').html("Please fill origin field");
    $('#edit_task_unit_error').html("");
    $('#edit_task_quantity_error').html("");
    $('#edit_task_equivalent_currency_value_error').html('');
    $('#edit_task_name').css('border', '1px solid #ccc');
    $('#edit_task_origin').css('border', '1px solid red');
    $('#edit_task_unit').css('border', '1px solid #ccc');
    $('#edit_task_quantity').css('border', '1px solid #ccc');
    $('#edit_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (unit == ''){
    $('#edit_task_name_error').html("");
    $('#edit_task_origin_error').html("");
    $('#edit_task_unit_error').html("Please fill unit field");
    $('#edit_task_quantity_error').html("");
    $('#edit_task_equivalent_currency_value_error').html('');
    $('#edit_task_name').css('border', '1px solid #ccc');
    $('#edit_task_origin').css('border', '1px solid #ccc');
    $('#edit_task_unit').css('border', '1px solid red');
    $('#edit_task_quantity').css('border', '1px solid #ccc');
    $('#edit_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (quantity == ''){
    $('#edit_task_name_error').html("");
    $('#edit_task_origin_error').html("");
    $('#edit_task_unit_error').html("");
    $('#edit_task_quantity_error').html("Please fill quantity field");
    $('#edit_task_equivalent_currency_value_error').html('');
    $('#edit_task_name').css('border', '1px solid #ccc');
    $('#edit_task_origin').css('border', '1px solid #cc');
    $('#edit_task_unit').css('border', '1px solid #ccc');
    $('#edit_task_quantity').css('border', '1px solid red');
    $('#edit_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (task_equivalent_currency == ''){
    $('#edit_task_name_error').html("");
    $('#edit_task_origin_error').html("");
    $('#edit_task_unit_error').html("");
    $('#edit_task_quantity_error').html("");
    $('#edit_task_equivalent_currency_value_error').html('Please fill origin field');
    $('#edit_task_name').css('border', '1px solid #ccc');
    $('#edit_task_origin').css('border', '1px solid #ccc');
    $('#edit_task_unit').css('border', '1px solid #ccc');
    $('#edit_task_quantity').css('border', '1px solid #ccc');
    $('#edit_task_equivalent_currency_value').css('border', '1px solid red');
    return false;
    }
    $.ajax({
    type:"POST",
            url:"backend/project/EditProjectTask",
            data:{currency:currency, project_id:project_id, task_id:task_id, task_name:task_name, origin:origin, unit:unit, quantity:quantity, task_equivalent_currency:task_equivalent_currency, task_value:task_value},
            dataType: "json",
            success: function (data) {

            $('#edit_task_name_error').html("");
            $('#edit_task_origin_error').html("");
            $('#edit_task_unit_error').html("");
            $('#edit_task_quantity_error').html("");
            $('#edit_task_equivalent_currency_value_error').html('');
            $('#edit_task_name').css('border', '1px solid #ccc');
            $('#edit_task_origin').css('border', '1px solid #ccc');
            $('#edit_task_unit').css('border', '1px solid #ccc');
            $('#edit_task_quantity').css('border', '1px solid #ccc');
            $('#edit_task_equivalent_currency_value').css('border', '1px solid #ccc');
            $("#editTaskModal :input").val('');
            var str = '';
            var j = 0;
            $(data.tasks).each(function (i, v) {
            j = j + 1;
            if (v.sub_tasks != ''){
            str += '<tr class="border-bottom-primary">';
            str += '<td><i id="expand_subtask_' + j + '" class="fa fa-plus" onclick="javascript:expandSubtask(' + j + ')"></i>';
            str += ' <i style="display:none;" id="collapse_subtask_' + j + '"  class="fa fa-minus" onclick="javascript:collapseSubtask(' + j + ')"></i>';
            str += '</td>'
                    str += '<td>' + v.task_name + '</td>';
//            str += '<td>' + v.origin + '</td>';
//            str += '<td>' + v.unit + '</td>';
//            str += '<td>' + v.quantity + '</td>';
//            str += '<td>' + v.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_task(' + v.task_id + ');"><i class="fa fa-plus"></i>Add Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_task(' + v.task_id + ');"><i class="fa fa-edit"></i>Edit Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + v.task_id + ');"><i class="fa fa-trash"></i>Delete Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            var k = 0;
            $(v.sub_tasks).each(function (m, n) {
            k = k + 1;
            l = j + "." + k;
            if (n.sub_sub_tasks != ''){

            str += '<tr class="subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:1.2rem !important;">';
            str += '<i id="expand_root_task_' + j + k + '" class="expand_root_task' + j + ' fa fa-plus" onclick="javascript:expandRoottask(' + j + ',' + k + ')"></i>';
            str += '<i style="display:none;" id="collapse_root_task_' + j + k + '" class="collapse_root_task' + j + ' fa fa-minus" onclick="javascript:collapseRoottask(' + j + ',' + k + ')"></i>';
            str += '</td>';
            str += '<td style="padding-left:1.5rem !important;">' + n.task_name + '</td>';
//            str += '<td>' + n.origin + '</td>';
//            str += '<td>' + n.unit + '</td>';
//            str += '<td>' + n.quantity + '</td>';
//            str += '<td>' + n.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_sub_task(' + n.task_id + ',' + n.parent_task_id + ');"><i class="fa fa-plus"></i>Add Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_sub_task(' + n.task_id + ');"><i class="fa fa-edit"></i>Edit Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + n.task_id + ');"><i class="fa fa-trash"></i>Delete Subtask</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            var a = 0;
            $(n.sub_sub_tasks).each(function (o, p) {
            a = a + 1;
            b = j + "." + k + "." + a;
            str += '<tr class="roottask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:2.0rem !important;">' + b + '</td>';
            str += '<td style="padding-left:2.3rem !important;">' + p.task_name + '</td>';
//            str += '<td>' + p.origin + '</td>';
//            str += '<td>' + p.unit + '</td>';
//            str += '<td>' + p.quantity + '</td>';
//            str += '<td>' + p.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_root_task(' + p.task_id + ');"><i class="fa fa-edit"></i>Edit Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + p.task_id + ');"><i class="fa fa-trash"></i>Delete Root Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            } else{
            str += '<tr class="subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:1.2rem !important;">' + l + '</td>';
            str += '<td style="padding-left:1.5rem !important;">' + n.task_name + '</td>';
//            str += '<td>' + n.origin + '</td>';
//            str += '<td>' + n.unit + '</td>';
//            str += '<td>' + n.quantity + '</td>';
//            str += '<td>' + n.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_sub_task(' + n.task_id + ',' + n.parent_task_id + ');"><i class="fa fa-plus"></i>Add Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_sub_task(' + n.task_id + ');"><i class="fa fa-edit"></i>Edit Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + n.task_id + ');"><i class="fa fa-trash"></i>Delete Subtask</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            }
            });
            } else{
            str += '<tr class="subtask' + j + ' border-bottom-primary">';
            str += '<td>' + j + '</td>';
            str += '<td>' + v.task_name + '</td>';
//            str += '<td>' + v.origin + '</td>';
//            str += '<td>' + v.unit + '</td>';
//            str += '<td>' + v.quantity + '</td>';
//            str += '<td>' + v.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_task(' + v.task_id + ');"><i class="fa fa-plus"></i>Add Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_task(' + v.task_id + ');"><i class="fa fa-edit"></i>Edit Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + v.task_id + ');"><i class="fa fa-trash"></i>Delete Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            }

            });
            $('#task_body').html(str);
            }
    })

    });</script>
<script type="text/javascript">


    function sub_task_currency_amount_calculation(id = ''){
    var remaining_task_value = Number($('#sub_task_currency_value_' + id).attr('placeholder'));
    var remaining_task_amount = Number($('#sub_task_currency_amount_' + id).attr('placeholder'));
    var equivalent_task_value = Number($('#eq_task_value_id').val());
    var exchange_rate;
    var total_eq_val = $('#sub_task_currency_eq_' + id).val();
    var eq_val_percent = $('#sub_task_currency_value_' + id).val();
    // var amount=(total_eq_val*eq_val_percent)/100;
    var amount = (Number(total_eq_val) * Number(eq_val_percent)) / 100;
    //  var exchange_amount=amount/exchange_rate;
    //  $('#sub_task_currency_amount_'+id).val(amount);
    if (!($.isNumeric(eq_val_percent))){
    $('#sub_task_currency_value_' + id).val('');
    $('#sub_task_currency_amount_' + id).val('');
    return false;
    } else{
    if (eq_val_percent < 0){
    $('#sub_task_currency_value_' + id).val('');
    $('#sub_task_currency_amount_' + id).val('');
    return false;
    }
    }
    if (amount != 0){
    $('#sub_task_currency_amount_' + id).val(amount.toFixed(6));
    } else{
    $('#sub_task_currency_amount_' + id).val('');
    }

    if (parseInt(remaining_task_amount) < parseInt(amount)){
    $('#sub_task_currency_amount_' + id).val('');
    $('#sub_task_currency_amount_' + id).css('border', '1px solid red');
    $('#sub_task_currency_amount_error_' + id).html('Amount should not be more than ' + remaining_task_amount);
    } else{
    $('#sub_task_currency_amount_' + id).css('border', '1px solid #ccc');
    $('#sub_task_currency_amount_error_' + id).html('');
    }
    if (eq_val_percent != '' || eq_val_percent != 0){
    if (eq_val_percent <= remaining_task_value){
    $('#sub_task_currency_value_' + id).val(eq_val_percent);
    $('#sub_task_currency_value_' + id).css('border', '1px solid #ccc');
    $('#sub_task_currency_value_error_' + id).html('');
    } else{
    $('#sub_task_currency_value_' + id).val('');
    $('#sub_task_currency_value_' + id).css('border', '1px solid red');
    $('#sub_task_currency_value_error_' + id).html('Value should not be more than ' + remaining_task_value + '%');
    }
    } else{
    $('#sub_task_currency_value_' + id).val('');
    $('#sub_task_currency_value_' + id).css('border', '1px solid #ccc');
    $('#sub_task_currency_value_error_' + id).html('');
    }

    var currency_qty = Number($('#sub_task_total_currency').val());
    var total_currency_amount = 0;
    for (var i = 1; i <= currency_qty; i++){
    c_amount = $('#sub_task_currency_amount_' + i).val();
    exchange_rate = Number($('#sub_task_currency_exchange_rate_' + i).val());
    var currency_amount = c_amount / exchange_rate;
    total_currency_amount = Number(total_currency_amount) + Number(currency_amount);
    }
    //alert(total_currency_amount);
    $('#sub_task_equivalent_currency_value').val(total_currency_amount);
    var task_value = (total_currency_amount / equivalent_task_value) * 100;
    $('#sub_task_equivalent_value').val(task_value.toFixed(6));
    }
    function sub_task_currency_value_calculation(id = ''){
    var remaining_task_value = Number($('#sub_task_currency_value_' + id).attr('placeholder'));
    var remaining_task_amount = Number($('#sub_task_currency_amount_' + id).attr('placeholder'));
    var equivalent_task_value = Number($('#eq_task_value_id').val());
    // var exchange_rate=Number($('#task_currency_exchange_rate_'+id).val());
    var exchange_rate;
    var total_eq_val = Number($('#sub_task_currency_eq_' + id).val());
    var eq_val_amount = Number($('#sub_task_currency_amount_' + id).val());
    //var amount=exchange_rate*eq_val_amount;
    //var currency_value=(amount*100)/total_eq_val;
    // alert(currency_value);
    var currency_value = (eq_val_amount * 100) / total_eq_val;
    // $('#sub_task_currency_value_'+id).val(currency_value);
    if (!($.isNumeric(eq_val_amount))){
    $('#sub_task_currency_value_' + id).val('');
    $('#sub_task_currency_amount_' + id).val('');
    return false;
    } else{
    if (eq_val_amount < 0){
    $('#sub_task_currency_value_' + id).val('');
    $('#sub_task_currency_amount_' + id).val('');
    return false;
    }
    }

    if (parseInt(remaining_task_amount) < parseInt(eq_val_amount)){

    $('#sub_task_currency_amount_' + id).val('');
    $('#sub_task_currency_amount_' + id).css('border', '1px solid red');
    $('#sub_task_currency_amount_error_' + id).html('Amount should not be more than ' + remaining_task_amount);
    } else{

    $('#sub_task_currency_amount_' + id).css('border', '1px solid #ccc');
    $('#sub_task_currency_amount_error_' + id).html('');
    }
    if (currency_value != '' || currency_value != 0){
    if (parseInt(currency_value) <= parseInt(remaining_task_value)){

    $('#sub_task_currency_value_' + id).val(currency_value.toFixed(6));
    $('#sub_task_currency_value_' + id).css('border', '1px solid #ccc');
    $('#sub_task_currency_value_error_' + id).html('');
    } else{
    $('#sub_task_currency_value_' + id).val('');
    $('#sub_task_currency_value_' + id).css('border', '1px solid red');
    $('#sub_task_currency_value_error_' + id).html('Value should not be more than ' + remaining_task_value + '%');
    }
    } else{
    $('#sub_task_currency_value_' + id).val('');
    $('#sub_task_currency_value_' + id).css('border', '1px solid #ccc');
    $('#sub_task_currency_value_error_' + id).html('');
    }

    var currency_qty = $('#sub_task_total_currency').val();
    var total_currency_amount = 0;
    for (var i = 1; i <= currency_qty; i++){
//            var currency_amount=$('#task_currency_amount_'+i).val();
//            total_currency_amount=Number(total_currency_amount)+Number(currency_amount);
    c_amount = $('#sub_task_currency_amount_' + i).val();
    exchange_rate = Number($('#sub_task_currency_exchange_rate_' + i).val());
    var currency_amount = c_amount / exchange_rate;
    total_currency_amount = Number(total_currency_amount) + Number(currency_amount);
    }
    $('#sub_task_equivalent_currency_value').val(total_currency_amount);
    var task_value = (total_currency_amount / equivalent_task_value) * 100;
    $('#sub_task_equivalent_value').val(task_value.toFixed(6));
    }

    function edit_sub_task_currency_amount_calculation(id = ''){
    //alert(id);
    var equivalent_task_value = Number($('#edit_eq_sub_task_value_id').val());
    var exchange_rate;
    var total_eq_val = $('#edit_sub_task_currency_eq_' + id).val();
    var eq_val_percent = $('#edit_sub_task_currency_value_' + id).val();
    //var amount=(total_eq_val*eq_val_percent)/100;
    var amount = (Number(total_eq_val) * Number(eq_val_percent)) / 100;
    $('#edit_sub_task_currency_amount_' + id).val(amount.toFixed(6));
    var currency_qty = Number($('#edit_sub_task_total_currency').val());
    var total_currency_amount = 0;
    for (var j = 1; j <= currency_qty; j++){
    c_amount = $('#edit_sub_task_currency_amount_' + j).val();
    exchange_rate = Number($('#edit_sub_task_currency_exchange_rate_' + j).val());
    var currency_amount = c_amount / exchange_rate;
    total_currency_amount = Number(total_currency_amount) + Number(currency_amount);
    }
    //alert(total_currency_amount);
    $('#edit_sub_task_equivalent_currency_value').val(total_currency_amount);
    var task_value = (total_currency_amount / equivalent_task_value) * 100;
    $('#edit_sub_task_equivalent_value').val(task_value.toFixed(6));
    }

    function edit_sub_task_currency_value_calculation(id = ''){
    var equivalent_task_value = Number($('#edit_eq_sub_task_value_id').val());
    var exchange_rate;
    var total_eq_val = Number($('#edit_sub_task_currency_eq_' + id).val());
    var eq_val_amount = Number($('#edit_sub_task_currency_amount_' + id).val());
    var currency_value = (eq_val_amount * 100) / total_eq_val;
    $('#edit_sub_task_currency_value_' + id).val(currency_value.toFixed(6));
    var currency_qty = $('#edit_sub_task_total_currency').val();
    var total_currency_amount = 0;
    for (var j = 1; j <= currency_qty; j++){
//            var currency_amount=$('#task_currency_amount_'+i).val();
//            total_currency_amount=Number(total_currency_amount)+Number(currency_amount);
    c_amount = $('#edit_sub_task_currency_amount_' + j).val();
    exchange_rate = Number($('#edit_sub_task_currency_exchange_rate_' + j).val());
    var currency_amount = c_amount / exchange_rate;
    total_currency_amount = Number(total_currency_amount) + Number(currency_amount);
    }
    $('#edit_sub_task_equivalent_currency_value').val(total_currency_amount);
    var task_value = (total_currency_amount / equivalent_task_value) * 100;
    $('#edit_sub_task_equivalent_value').val(task_value.toFixed(6));
    }


    function add_task(task_id = ''){
    //alert('test');
    var project_id = $('#project_id').val();
    // alert(task_id);
    if (task_id != ''){

    $.ajax({
    type:"POST",
            url:"backend/project/subTaskInfo",
            data:{project_id:project_id, task_id:task_id},
            dataType: "json",
            success: function (data) {
            $('#parent_task_id').val(task_id);
            var task_name = data.task_info[0]['task_name'];
            var origin = data.task_info[0]['origin'];
            var unit = data.task_info[0]['unit'];
            var task_value = data.task_info[0]['task_equivalent_currency'];
            $('#eq_task_value_id').val(task_value);
            $('#parent_task_name').val(task_name);
            $('#sub_task_origin').val(origin);
            $('#sub_task_unit').val(unit);
            var total_currency = data.task_currencies.length;
            var str = '';
            str += '<div class="row">';
            str += '<input type="hidden" id="sub_task_total_currency" value="' + total_currency + ' " >';
            $(data.task_currencies).each(function (i, v) {
            //  alert('test');
            i = i + 1;
            str += '<div class="col-md-6"><div class="form-group">';
            str += '<label style="margin-bottom: 0px;">' + v.title + ' Value%</label>';
            str += '<input type="hidden" id="sub_task_currency_id_' + i + '" value="' + v.currency_id + '" >';
            str += ' <input type="hidden" id="sub_task_currency_eq_' + i + '" value="' + v.equivalant_amount + '" >';
            str += '<input id="sub_task_currency_value_' + i + '" type="text" class="form-control form-txt-primary" placeholder="' + v.remainig_equivalant_value + '" value="" onkeyup="javascript:sub_task_currency_amount_calculation(' + i + ')" onblur="javascript:sub_task_currency_amount_calculation(' + i + ')" onchange="javascript:sub_task_currency_amount_calculation(' + i + ')" >';
            str += '<span style="color:red" id="sub_task_currency_value_error_' + i + '"></span>';
            str += ' </div></div>';
            str += '<div class="col-md-6"><div class="form-group">';
            str += '<label style="margin-bottom: 0px;">' + v.title + ' Amount</label>';
            str += '<input type="hidden" id="sub_task_currency_exchange_rate_' + i + '" value="' + v.project_currency_rate + '" >';
            str += '<input id="sub_task_currency_amount_' + i + '" type="text" class="form-control form-txt-primary" placeholder="' + v.remaining_equivalant_amount + '" value="" onkeyup="javascript:sub_task_currency_value_calculation(' + i + ')" onblur="javascript:sub_task_currency_value_calculation(' + i + ')" onchange="javascript:sub_task_currency_value_calculation(' + i + ')" >';
            str += '<span style="color:red" id="sub_task_currency_amount_error_' + i + '"></span>';
            str += '</div></div>';
            });
            str += '</div>';
            $('#sub_task_currency').html(str);
            var str = '<option value=="">Select Subtask Name</option>';
            $(data.items).each(function (i, v) {
                str+='<option>'+v.item_name+'</option>';
            })
            $('#sub_task_name').html(str);
            //$('#sub_task_name').select2();
            $('#subTaskModal').modal('show');
            }
    })
    }
    }


    $('#subtask_close').click(function(){
    $("#subTaskModal :input").val('');
    $('#sub_task_name_error').html("");
    $('#sub_task_origin_error').html("");
    $('#sub_task_unit_error').html("");
    $('#sub_task_quantity_error').html("");
    $('#sub_task_equivalent_currency_value_error').html('');
    $('#sub_task_name').css('border', '1px solid #ccc');
    $('#sub_task_origin').css('border', '1px solid #ccc');
    $('#sub_task_unit').css('border', '1px solid #ccc');
    $('#sub_task_quantity').css('border', '1px solid #ccc');
    $('#sub_task_equivalent_currency_value').css('border', '1px solid #ccc');
    });
    $('#discard_sub_task').click(function(){
    $("#subTaskModal :input").val('');
    $('#sub_task_name_error').html("");
    $('#sub_task_origin_error').html("");
    $('#sub_task_unit_error').html("");
    $('#sub_task_quantity_error').html("");
    $('#sub_task_equivalent_currency_value_error').html('');
    $('#sub_task_name').css('border', '1px solid #ccc');
    $('#sub_task_origin').css('border', '1px solid #ccc');
    $('#sub_task_unit').css('border', '1px solid #ccc');
    $('#sub_task_quantity').css('border', '1px solid #ccc');
    $('#sub_task_equivalent_currency_value').css('border', '1px solid #ccc');
    });
    $('#add_sub_task').click(function(){
    var cur_qty = Number($('#sub_task_total_currency').val());
    var currency = [];
    for (var z = 1; z <= cur_qty; z++){
    var id = $('#sub_task_currency_id_' + z).val();
    var value = $('#sub_task_currency_value_' + z).val();
    var camount = $('#sub_task_currency_amount_' + z).val();
    currency.push({
    c_id: id,
            c_value:value,
            c_amount:camount
    });
    }
    var project_id = $('#project_id').val();
    var parent_task_id = $('#parent_task_id').val();
    var task_name = $('#sub_task_name').val();
    var origin = $('#sub_task_origin').val();
    var unit = $('#sub_task_unit').val();
    var quantity = $('#sub_task_quantity').val();
    var task_value = $('#sub_task_equivalent_value').val();
    var task_equivalent_currency = $('#sub_task_equivalent_currency_value').val();
    if (task_name == '' && origin == '' && unit == '' && quantity == '' && task_equivalent_currency == ''){
    $('#sub_task_name_error').html("Please fill name field");
    $('#sub_task_origin_error').html("Please fill origin field");
    $('#sub_task_unit_error').html("Please fill unit field");
    $('#sub_task_quantity_error').html("Please fill quantity field");
    $('#sub_task_equivalent_currency_value_error').html('Please fill equivalent currency field');
    $('#sub_task_name').css('border', '1px solid red');
    $('#sub_task_origin').css('border', '1px solid red');
    $('#sub_task_unit').css('border', '1px solid red');
    $('#sub_task_quantity').css('border', '1px solid red');
    $('#sub_task_equivalent_currency_value').css('border', '1px solid red');
    return false;
    } else if (task_name == ''){

    $('#sub_task_name_error').html("Please fill name field");
    $('#sub_task_origin_error').html("");
    $('#sub_task_unit_error').html("");
    $('#sub_task_quantity_error').html("");
    $('#sub_task_equivalent_currency_value_error').html('');
    $('#sub_task_name').css('border', '1px solid red');
    $('#sub_task_origin').css('border', '1px solid #ccc');
    $('#sub_task_unit').css('border', '1px solid #ccc');
    $('#sub_task_quantity').css('border', '1px solid #ccc');
    $('#sub_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (origin == ''){
    $('#sub_task_name_error').html("");
    $('#sub_task_origin_error').html("Please fill origin field");
    $('#sub_task_unit_error').html("");
    $('#sub_task_quantity_error').html("");
    $('#sub_task_equivalent_currency_value_error').html('');
    $('#sub_task_name').css('border', '1px solid #ccc');
    $('#sub_task_origin').css('border', '1px solid red');
    $('#sub_task_unit').css('border', '1px solid #ccc');
    $('#sub_task_quantity').css('border', '1px solid #ccc');
    $('#sub_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (unit == ''){
    $('#sub_task_name_error').html("");
    $('#sub_task_origin_error').html("");
    $('#sub_task_unit_error').html("Please fill unit field");
    $('#sub_task_quantity_error').html("");
    $('#sub_task_equivalent_currency_value_error').html('');
    $('#sub_task_name').css('border', '1px solid #ccc');
    $('#sub_task_origin').css('border', '1px solid #ccc');
    $('#sub_task_unit').css('border', '1px solid red');
    $('#sub_task_quantity').css('border', '1px solid #ccc');
    $('#sub_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (quantity == ''){
    $('#sub_task_name_error').html("");
    $('#sub_task_origin_error').html("");
    $('#sub_task_unit_error').html("");
    $('#sub_task_quantity_error').html("Please fill quantity field");
    $('#sub_task_equivalent_currency_value_error').html('');
    $('#sub_task_name').css('border', '1px solid #ccc');
    $('#sub_task_origin').css('border', '1px solid #cc');
    $('#sub_task_unit').css('border', '1px solid #ccc');
    $('#sub_task_quantity').css('border', '1px solid red');
    $('#sub_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (task_equivalent_currency == ''){
    $('#sub_task_name_error').html("");
    $('#sub_task_origin_error').html("");
    $('#sub_task_unit_error').html("");
    $('#sub_task_quantity_error').html("");
    $('#sub_task_equivalent_currency_value_error').html('Please fill origin field');
    $('#sub_task_name').css('border', '1px solid #ccc');
    $('#sub_task_origin').css('border', '1px solid #ccc');
    $('#sub_task_unit').css('border', '1px solid #ccc');
    $('#sub_task_quantity').css('border', '1px solid #ccc');
    $('#sub_task_equivalent_currency_value').css('border', '1px solid red');
    return false;
    }


    $.ajax({
    type:"POST",
            url:"backend/project/addEditSubTask",
            data:{currency:currency, project_id:project_id, parent_task_id:parent_task_id, task_name:task_name, origin:origin, unit:unit, quantity:quantity, task_value:task_value, task_equivalent_currency:task_equivalent_currency},
            dataType: "json",
            success: function (data) {
            // $('#sub_task_name').val('');
            // $('#subTaskModal').modal('show');
            if (data.status == "success"){
            $('#sub_task_name').val('').trigger('change');
            $('#sub_task_quantity').val('');
            $('#sub_task_equivalent_value').val('');
            $('#sub_task_name_error').html("");
            $('#sub_task_origin_error').html("");
            $('#sub_task_unit_error').html("");
            $('#sub_task_quantity_error').html("");
            $('#sub_task_equivalent_currency_value_error').html('');
            $('#sub_task_name').css('border', '1px solid #ccc');
            $('#sub_task_origin').css('border', '1px solid #ccc');
            $('#sub_task_unit').css('border', '1px solid #ccc');
            $('#sub_task_quantity').css('border', '1px solid #ccc');
            $('#sub_task_equivalent_currency_value').css('border', '1px solid #ccc');
            var total_currency = data.task_currencies.length;
            var str1 = '';
            str1 += '<div class="row">';
            str1 += '<input type="hidden" id="sub_task_total_currency" value="' + total_currency + ' " >';
            $(data.task_currencies).each(function (z, t) {
            //  alert('test');
            z = z + 1;
            str1 += '<div class="col-md-6"><div class="form-group">';
            str1 += '<label style="margin-bottom: 0px;">' + t.title + ' Value%</label>';
            str1 += '<input type="hidden" id="sub_task_currency_id_' + z + '" value="' + t.currency_id + '" >';
            str1 += ' <input type="hidden" id="sub_task_currency_eq_' + z + '" value="' + t.equivalant_amount + '" >';
            str1 += '<input id="sub_task_currency_value_' + z + '" type="text" class="form-control form-txt-primary" placeholder="' + t.remainig_equivalant_value + '" value="" onkeyup="javascript:sub_task_currency_amount_calculation(' + z + ')" onblur="javascript:sub_task_currency_amount_calculation(' + z + ')" onchange="javascript:sub_task_currency_amount_calculation(' + z + ')" >';
            str1 += ' </div></div>';
            str1 += '<div class="col-md-6"><div class="form-group">';
            str1 += '<label style="margin-bottom: 0px;">' + t.title + ' Amount</label>';
            str1 += '<input type="hidden" id="sub_task_currency_exchange_rate_' + z + '" value="' + t.project_currency_rate + '" >';
            str1 += '<input id="sub_task_currency_amount_' + z + '" type="text" class="form-control form-txt-primary" placeholder="' + t.remaining_equivalant_amount + '" value="" onkeyup="javascript:sub_task_currency_value_calculation(' + z + ')" onblur="javascript:sub_task_currency_value_calculation(' + z + ')" onchange="javascript:sub_task_currency_value_calculation(' + z + ')" >';
            str1 += '</div></div>';
            });
            str1 += '</div>';
            $('#sub_task_currency').html(str1);
            var str = '';
            var j = 0;
            $(data.tasks).each(function (i, v) {
            j = j + 1;
            if (v.sub_tasks != ''){
            str += '<tr class="border-bottom-primary">';
            str += '<td><i id="expand_subtask_' + j + '" class="fa fa-plus" onclick="javascript:expandSubtask(' + j + ')"></i>';
            str += ' <i style="display:none;" id="collapse_subtask_' + j + '"  class="fa fa-minus" onclick="javascript:collapseSubtask(' + j + ')"></i>';
            str += '</td>'
                    str += '<td>' + v.task_name + '</td>';
//            str += '<td>' + v.origin + '</td>';
//            str += '<td>' + v.unit + '</td>';
//            str += '<td>' + v.quantity + '</td>';
//            str += '<td>' + v.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_task(' + v.task_id + ');"><i class="fa fa-plus"></i>Add Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_task(' + v.task_id + ');"><i class="fa fa-edit"></i>Edit Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + v.task_id + ');"><i class="fa fa-trash"></i>Delete Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            var k = 0;
            $(v.sub_tasks).each(function (m, n) {
            k = k + 1;
            l = j + "." + k;
            if (n.sub_sub_tasks != ''){

            str += '<tr class="subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:1.2rem !important;">';
            str += '<i id="expand_root_task_' + j + k + '" class="expand_root_task' + j + ' fa fa-plus" onclick="javascript:expandRoottask(' + j + ',' + k + ')"></i>';
            str += '<i style="display:none;" id="collapse_root_task_' + j + k + '" class="collapse_root_task' + j + ' fa fa-minus" onclick="javascript:collapseRoottask(' + j + ',' + k + ')"></i>';
            str += '</td>';
            str += '<td style="padding-left:1.5rem !important;">' + n.task_name + '</td>';
//            str += '<td>' + n.origin + '</td>';
//            str += '<td>' + n.unit + '</td>';
//            str += '<td>' + n.quantity + '</td>';
//            str += '<td>' + n.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_sub_task(' + n.task_id + ',' + n.parent_task_id + ');"><i class="fa fa-plus"></i>Add Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_sub_task(' + n.task_id + ');"><i class="fa fa-edit"></i>Edit Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + n.task_id + ');"><i class="fa fa-trash"></i>Delete Subtask</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            var a = 0;
            $(n.sub_sub_tasks).each(function (o, p) {
            a = a + 1;
            b = j + "." + k + "." + a;
            str += '<tr class="roottask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:2.0rem !important;">' + b + '</td>';
            str += '<td style="padding-left:2.3rem !important;">' + p.task_name + '</td>';
//            str += '<td>' + p.origin + '</td>';
//            str += '<td>' + p.unit + '</td>';
//            str += '<td>' + p.quantity + '</td>';
//            str += '<td>' + p.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_root_task(' + p.task_id + ');"><i class="fa fa-edit"></i>Edit Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + p.task_id + ');"><i class="fa fa-trash"></i>Delete Root Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            } else{
            str += '<tr class="subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:1.2rem !important;">' + l + '</td>';
            str += '<td style="padding-left:1.5rem !important;">' + n.task_name + '</td>';
//            str += '<td>' + n.origin + '</td>';
//            str += '<td>' + n.unit + '</td>';
//            str += '<td>' + n.quantity + '</td>';
//            str += '<td>' + n.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_sub_task(' + n.task_id + ',' + n.parent_task_id + ');"><i class="fa fa-plus"></i>Add Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_sub_task(' + n.task_id + ');"><i class="fa fa-edit"></i>Edit Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + n.task_id + ');"><i class="fa fa-trash"></i>Delete Subtask</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            }
            });
            } else{
            str += '<tr class="subtask' + j + ' border-bottom-primary">';
            str += '<td>' + j + '</td>';
            str += '<td>' + v.task_name + '</td>';
//            str += '<td>' + v.origin + '</td>';
//            str += '<td>' + v.unit + '</td>';
//            str += '<td>' + v.quantity + '</td>';
//            str += '<td>' + v.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_task(' + v.task_id + ');"><i class="fa fa-plus"></i>Add Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_task(' + v.task_id + ');"><i class="fa fa-edit"></i>Edit Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + v.task_id + ');"><i class="fa fa-trash"></i>Delete Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            }

            });
            $('#task_body').html(str);
            } else{
            $('#sub_task_name_error').html("This task already exists");
            $('#sub_task_name').css('border', '1px solid red');
            }


            }
    })

    });
    function edit_sub_task(task_id = ''){
    var project_id = $('#project_id').val();
    $.ajax({
    type:"POST",
            url:"backend/project/editsubTaskInfo",
            data:{project_id:project_id, task_id:task_id},
            dataType: "json",
            success: function (data) {
            $('#edit_project_id').val(project_id);
            $('#edit_sub_task_id').val(task_id);
            var parent_task_name = data.parent_task_info[0]['task_name'];
            var task_equivalent_value = data.parent_task_info[0]['task_equivalent_currency'];
            var parent_task_id = data.parent_task_info[0]['task_id'];
            $('#edit_parent_task_id').val(parent_task_id);
            $("#edit_eq_sub_task_value_id").val(task_equivalent_value);
            var task_name = data.task_info[0]['task_name'];
            var origin = data.task_info[0]['origin'];
            var unit = data.task_info[0]['unit'];
            var quantity = data.task_info[0]['quantity'];
            var equivalent_value = data.task_info[0]['task_value'];
            var equivalent_currency_value = data.task_info[0]['task_equivalent_currency'];
            $('#sub_task_head').html(parent_task_name);
            $('#edit_parent_task_name').val(parent_task_name);
            var str = '<option value=="">Select Subtask Name</option>';
            $(data.items).each(function (i, v) {
                str+='<option>'+v.item_name+'</option>';
            })
            $('#edit_sub_task_name').html(str);
            $('#edit_sub_task_name').val(task_name).trigger("change");
            $('#s_task_name').html(task_name);
            $('#edit_sub_task_origin').val(origin);
            $('#edit_sub_task_unit').val(unit);
            $('#edit_sub_task_quantity').val(quantity);
            $('#edit_sub_task_equivalent_currency_value').val(equivalent_currency_value);
            $('#edit_sub_task_equivalent_value').val(equivalent_value);
            var total_currency = data.task_currencies.length;
            var str = '';
            str += '<div class="row">';
            str += '<input type="hidden" id="edit_sub_task_total_currency" value="' + total_currency + ' " >';
            $(data.task_currencies).each(function (i, v) {
            i = i + 1;
            str += '<div class="col-md-6"><div class="form-group">';
            str += '<label style="margin-bottom: 0px;">' + v.title + ' Value%</label>';
            str += '<input type="hidden" id="edit_sub_task_currency_id_' + i + '" value="' + v.currency_id + '" >';
            str += ' <input type="hidden" id="edit_sub_task_currency_eq_' + i + '" value="' + v.currency_equi_amount + '" >';
            str += '<input id="edit_sub_task_currency_value_' + i + '" type="text" class="form-control form-txt-primary" placeholder="' + v.equivalant_value + '" value="' + v.equivalant_value + '" onkeyup="javascript:edit_sub_task_currency_amount_calculation(' + i + ')" onblur="javascript:edit_sub_task_currency_amount_calculation(' + i + ')" onchange="javascript:edit_sub_task_currency_amount_calculation(' + i + ')" >';
            str += ' </div></div>';
            str += '<div class="col-md-6"><div class="form-group">';
            str += '<label style="margin-bottom: 0px;">' + v.title + ' Amount</label>';
            str += '<input type="hidden" id="edit_sub_task_currency_exchange_rate_' + i + '" value="' + v.project_currency_rate + '" >';
            str += '<input id="edit_sub_task_currency_amount_' + i + '" type="text" class="form-control form-txt-primary" placeholder="' + v.equivalant_amount + '" value="' + v.equivalant_amount + '" onkeyup="javascript:edit_sub_task_currency_value_calculation(' + i + ')" onblur="javascript:edit_sub_task_currency_value_calculation(' + i + ')" onchange="javascript:edit_sub_task_currency_value_calculation(' + i + ')" >';
            str += '</div></div>';
            });
            str += '</div>';
            $('#edit_sub_task_currency').html(str);
            $('#editSubTaskModal').modal('show');
            }
    })
    }

    $('#discard_update_sub_task').click(function(){
    $("#editSubTaskModal :input").val('');
    $('#edit_sub_task_name_error').html("");
    $('#edit_sub_task_origin_error').html("");
    $('#edit_sub_task_unit_error').html("");
    $('#edit_sub_task_quantity_error').html("");
    $('#edit_sub_task_equivalent_currency_value_error').html('');
    $('#edit_sub_task_name').css('border', '1px solid #ccc');
    $('#edit_sub_task_origin').css('border', '1px solid #ccc');
    $('#edit_sub_task_unit').css('border', '1px solid #ccc');
    $('#edit_sub_task_quantity').css('border', '1px solid #ccc');
    $('#edit_sub_task_equivalent_currency_value').css('border', '1px solid #ccc');
    });
    $('#edit_sub_task_close').click(function (){
    $("#editSubTaskModal :input").val('');
    $('#edit_sub_task_name_error').html("");
    $('#edit_sub_task_origin_error').html("");
    $('#edit_sub_task_unit_error').html("");
    $('#edit_sub_task_quantity_error').html("");
    $('#edit_sub_task_equivalent_currency_value_error').html('');
    $('#edit_sub_task_name').css('border', '1px solid #ccc');
    $('#edit_sub_task_origin').css('border', '1px solid #ccc');
    $('#edit_sub_task_unit').css('border', '1px solid #ccc');
    $('#edit_sub_task_quantity').css('border', '1px solid #ccc');
    $('#edit_sub_task_equivalent_currency_value').css('border', '1px solid #ccc');
    });
    $('#update_sub_task').click(function(){
    var cur_qty = Number($('#edit_sub_task_total_currency').val());
    var currency = [];
    for (var z = 1; z <= cur_qty; z++){
    var id = $('#edit_sub_task_currency_id_' + z).val();
    var value = $('#edit_sub_task_currency_value_' + z).val();
    var camount = $('#edit_sub_task_currency_amount_' + z).val();
    currency.push({
    c_id: id,
            c_value:value,
            c_amount:camount
    });
    }
    var project_id = $('#edit_project_id').val();
    var parent_task_id = $('#edit_parent_task_id').val();
    var task_id = $('#edit_sub_task_id').val();
    var task_name = $('#edit_sub_task_name').val();
    var origin = $('#edit_sub_task_origin').val();
    var unit = $('#edit_sub_task_unit').val();
    var quantity = $('#edit_sub_task_quantity').val();
    var task_value = $('#edit_sub_task_equivalent_value').val();
    var task_equivalent_currency = $('#edit_sub_task_equivalent_currency_value').val();
    if (task_name == '' && origin == '' && unit == '' && quantity == '' && task_equivalent_currency == ''){
    $('#edit_sub_task_name_error').html("Please fill name field");
    $('#edit_sub_task_origin_error').html("Please fill origin field");
    $('#edit_sub_task_unit_error').html("Please fill unit field");
    $('#edit_sub_task_quantity_error').html("Please fill quantity field");
    $('#edit_sub_task_equivalent_currency_value_error').html('Please fill equivalent currency field');
    $('#edit_sub_task_name').css('border', '1px solid red');
    $('#edit_sub_task_origin').css('border', '1px solid red');
    $('#edit_sub_task_unit').css('border', '1px solid red');
    $('#edit_sub_task_quantity').css('border', '1px solid red');
    $('#edit_sub_task_equivalent_currency_value').css('border', '1px solid red');
    return false;
    } else if (task_name == ''){

    $('#edit_sub_task_name_error').html("Please fill name field");
    $('#edit_sub_task_origin_error').html("");
    $('#edit_sub_task_unit_error').html("");
    $('#edit_sub_task_quantity_error').html("");
    $('#edit_sub_task_equivalent_currency_value_error').html('');
    $('#edit_sub_task_name').css('border', '1px solid red');
    $('#edit_sub_task_origin').css('border', '1px solid #ccc');
    $('#edit_sub_task_unit').css('border', '1px solid #ccc');
    $('#edit_sub_task_quantity').css('border', '1px solid #ccc');
    $('#edit_sub_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (origin == ''){
    $('#edit_sub_task_name_error').html("");
    $('#edit_sub_task_origin_error').html("Please fill origin field");
    $('#edit_sub_task_unit_error').html("");
    $('#edit_sub_task_quantity_error').html("");
    $('#edit_sub_task_equivalent_currency_value_error').html('');
    $('#edit_sub_task_name').css('border', '1px solid #ccc');
    $('#edit_sub_task_origin').css('border', '1px solid red');
    $('#edit_sub_task_unit').css('border', '1px solid #ccc');
    $('#edit_sub_task_quantity').css('border', '1px solid #ccc');
    $('#edit_sub_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (unit == ''){
    $('#edit_sub_task_name_error').html("");
    $('#edit_sub_task_origin_error').html("");
    $('#edit_sub_task_unit_error').html("Please fill unit field");
    $('#edit_sub_task_quantity_error').html("");
    $('#edit_sub_task_equivalent_currency_value_error').html('');
    $('#edit_sub_task_name').css('border', '1px solid #ccc');
    $('#edit_sub_task_origin').css('border', '1px solid #ccc');
    $('#edit_sub_task_unit').css('border', '1px solid red');
    $('#edit_sub_task_quantity').css('border', '1px solid #ccc');
    $('#edit_sub_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (quantity == ''){
    $('#edit_sub_task_name_error').html("");
    $('#edit_sub_task_origin_error').html("");
    $('#edit_sub_task_unit_error').html("");
    $('#edit_sub_task_quantity_error').html("Please fill quantity field");
    $('#edit_sub_task_equivalent_currency_value_error').html('');
    $('#edit_sub_task_name').css('border', '1px solid #ccc');
    $('#edit_sub_task_origin').css('border', '1px solid #cc');
    $('#edit_sub_task_unit').css('border', '1px solid #ccc');
    $('#edit_sub_task_quantity').css('border', '1px solid red');
    $('#edit_sub_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (task_equivalent_currency == ''){
    $('#edit_sub_task_name_error').html("");
    $('#edit_sub_task_origin_error').html("");
    $('#edit_sub_task_unit_error').html("");
    $('#edit_sub_task_quantity_error').html("");
    $('#edit_sub_task_equivalent_currency_value_error').html('Please fill origin field');
    $('#edit_sub_task_name').css('border', '1px solid #ccc');
    $('#edit_sub_task_origin').css('border', '1px solid #ccc');
    $('#edit_sub_task_unit').css('border', '1px solid #ccc');
    $('#edit_sub_task_quantity').css('border', '1px solid #ccc');
    $('#edit_sub_task_equivalent_currency_value').css('border', '1px solid red');
    return false;
    }
    $.ajax({
    type:"POST",
            url:"backend/project/editProjectTask",
            data:{currency:currency, parent_task_id:parent_task_id, project_id:project_id, task_id:task_id, task_name:task_name, origin:origin, unit:unit, quantity:quantity, task_value:task_value, task_equivalent_currency:task_equivalent_currency},
            dataType: "json",
            success: function (data) {
            if (data.status = "success"){
            $("#editSubTaskModal :input").val('');
            $('#edit_sub_task_name_error').html("");
            $('#edit_sub_task_origin_error').html("");
            $('#edit_sub_task_unit_error').html("");
            $('#edit_sub_task_quantity_error').html("");
            $('#edit_sub_task_equivalent_currency_value_error').html('');
            $('#edit_sub_task_name').css('border', '1px solid #ccc');
            $('#edit_sub_task_origin').css('border', '1px solid #ccc');
            $('#edit_sub_task_unit').css('border', '1px solid #ccc');
            $('#edit_sub_task_quantity').css('border', '1px solid #ccc');
            $('#edit_sub_task_equivalent_currency_value').css('border', '1px solid #ccc');
            var str = '';
            var j = 0;
            $(data.tasks).each(function (i, v) {
            j = j + 1;
            if (v.sub_tasks != ''){
            str += '<tr class="border-bottom-primary">';
            str += '<td><i id="expand_subtask_' + j + '" class="fa fa-plus" onclick="javascript:expandSubtask(' + j + ')"></i>';
            str += ' <i style="display:none;" id="collapse_subtask_' + j + '"  class="fa fa-minus" onclick="javascript:collapseSubtask(' + j + ')"></i>';
            str += '</td>'
                    str += '<td>' + v.task_name + '</td>';
//            str += '<td>' + v.origin + '</td>';
//            str += '<td>' + v.unit + '</td>';
//            str += '<td>' + v.quantity + '</td>';
//            str += '<td>' + v.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_task(' + v.task_id + ');"><i class="fa fa-plus"></i>Add Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_task(' + v.task_id + ');"><i class="fa fa-edit"></i>Edit Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + v.task_id + ');"><i class="fa fa-trash"></i>Delete Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            var k = 0;
            $(v.sub_tasks).each(function (m, n) {
            k = k + 1;
            l = j + "." + k;
            if (n.sub_sub_tasks != ''){

            str += '<tr class="subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:1.2rem !important;">';
            str += '<i id="expand_root_task_' + j + k + '" class="expand_root_task' + j + ' fa fa-plus" onclick="javascript:expandRoottask(' + j + ',' + k + ')"></i>';
            str += '<i style="display:none;" id="collapse_root_task_' + j + k + '" class="collapse_root_task' + j + ' fa fa-minus" onclick="javascript:collapseRoottask(' + j + ',' + k + ')"></i>';
            str += '</td>';
            str += '<td style="padding-left:1.5rem !important;">' + n.task_name + '</td>';
//            str += '<td>' + n.origin + '</td>';
//            str += '<td>' + n.unit + '</td>';
//            str += '<td>' + n.quantity + '</td>';
//            str += '<td>' + n.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_sub_task(' + n.task_id + ',' + n.parent_task_id + ');"><i class="fa fa-plus"></i>Add Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_sub_task(' + n.task_id + ');"><i class="fa fa-edit"></i>Edit Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + n.task_id + ');"><i class="fa fa-trash"></i>Delete Subtask</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            var a = 0;
            $(n.sub_sub_tasks).each(function (o, p) {
            a = a + 1;
            b = j + "." + k + "." + a;
            str += '<tr class="roottask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:2.0rem !important;">' + b + '</td>';
            str += '<td style="padding-left:2.3rem !important;">' + p.task_name + '</td>';
//            str += '<td>' + p.origin + '</td>';
//            str += '<td>' + p.unit + '</td>';
//            str += '<td>' + p.quantity + '</td>';
//            str += '<td>' + p.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_root_task(' + p.task_id + ');"><i class="fa fa-edit"></i>Edit Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + p.task_id + ');"><i class="fa fa-trash"></i>Delete Root Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            } else{
            str += '<tr class="subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:1.2rem !important;">' + l + '</td>';
            str += '<td style="padding-left:1.5rem !important;">' + n.task_name + '</td>';
//            str += '<td>' + n.origin + '</td>';
//            str += '<td>' + n.unit + '</td>';
//            str += '<td>' + n.quantity + '</td>';
//            str += '<td>' + n.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_sub_task(' + n.task_id + ',' + n.parent_task_id + ');"><i class="fa fa-plus"></i>Add Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_sub_task(' + n.task_id + ');"><i class="fa fa-edit"></i>Edit Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + n.task_id + ');"><i class="fa fa-trash"></i>Delete Subtask</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            }
            });
            } else{
            str += '<tr class="subtask' + j + ' border-bottom-primary">';
            str += '<td>' + j + '</td>';
            str += '<td>' + v.task_name + '</td>';
//            str += '<td>' + v.origin + '</td>';
//            str += '<td>' + v.unit + '</td>';
//            str += '<td>' + v.quantity + '</td>';
//            str += '<td>' + v.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_task(' + v.task_id + ');"><i class="fa fa-plus"></i>Add Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_task(' + v.task_id + ');"><i class="fa fa-edit"></i>Edit Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + v.task_id + ');"><i class="fa fa-trash"></i>Delete Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            }

            });
            $('#task_body').html(str);
            }
            }
    })

    });</script>
<script type="text/javascript">

    function root_task_currency_amount_calculation(id = ''){
    var remaining_task_value = Number($('#root_task_currency_value_' + id).attr('placeholder'));
    var remaining_task_amount = Number($('#root_task_currency_amount_' + id).attr('placeholder'));
    //alert(id);
    var equivalent_task_value = Number($('#root_eq_task_value_id').val());
    var exchange_rate;
    var total_eq_val = $('#root_task_currency_eq_' + id).val();
    var eq_val_percent = $('#root_task_currency_value_' + id).val();
    // var amount=(total_eq_val*eq_val_percent)/100;
    var amount = (Number(total_eq_val) * Number(eq_val_percent)) / 100;
    //  var exchange_amount=amount/exchange_rate;
    //$('#root_task_currency_amount_'+id).val(amount);

    if (!($.isNumeric(eq_val_percent))){
    $('#root_task_currency_value_' + id).val('');
    $('#root_task_currency_amount_' + id).val('');
    return false;
    } else{
    if (eq_val_percent < 0){
    $('#root_task_currency_value_' + id).val('');
    $('#root_task_currency_amount_' + id).val('');
    return false;
    }
    }
    if (amount != 0){
    $('#root_task_currency_amount_' + id).val(amount.toFixed(6));
    } else{
    $('#root_task_currency_amount_' + id).val('');
    }

    if (remaining_task_amount < amount){
    $('#root_task_currency_amount_' + id).val('');
    $('#root_task_currency_amount_' + id).css('border', '1px solid red');
    $('#root_task_currency_amount_error_' + id).html('Amount should not be more than ' + remaining_task_amount);
    } else{
    $('#root_task_currency_amount_' + id).css('border', '1px solid #ccc');
    $('#root_task_currency_amount_error_' + id).html('');
    }
    if (eq_val_percent != '' || eq_val_percent != 0){
    if (eq_val_percent <= remaining_task_value){
    $('#root_task_currency_value_' + id).val(eq_val_percent);
    $('#root_task_currency_value_' + id).css('border', '1px solid #ccc');
    $('#root_task_currency_value_error_' + id).html('');
    } else{
    $('#root_task_currency_value_' + id).val('');
    $('#root_task_currency_value_' + id).css('border', '1px solid red');
    $('#root_task_currency_value_error_' + id).html('Value should not be more than ' + remaining_task_value + '%');
    }
    } else{
    $('#root_task_currency_value_' + id).val('');
    $('#root_task_currency_value_' + id).css('border', '1px solid #ccc');
    $('#root_task_currency_value_error_' + id).html('');
    }

    //alert(eq_val_percent);
    var currency_qty = Number($('#root_task_total_currency').val());
    var total_currency_amount = 0;
    for (var i = 1; i <= currency_qty; i++){
    c_amount = $('#root_task_currency_amount_' + i).val();
    exchange_rate = Number($('#root_task_currency_exchange_rate_' + i).val());
    var currency_amount = c_amount / exchange_rate;
    total_currency_amount = Number(total_currency_amount) + Number(currency_amount);
    }
    //alert(total_currency_amount);
    $('#root_task_equivalent_currency_value').val(total_currency_amount);
    var task_value = (total_currency_amount / equivalent_task_value) * 100;
    $('#root_task_equivalent_value').val(task_value.toFixed(6));
    }
    function root_task_currency_value_calculation(id = ''){
    var remaining_task_value = Number($('#root_task_currency_value_' + id).attr('placeholder'));
    var remaining_task_amount = Number($('#root_task_currency_amount_' + id).attr('placeholder'));
    var equivalent_task_value = Number($('#root_eq_task_value_id').val());
    // var exchange_rate=Number($('#task_currency_exchange_rate_'+id).val());
    var exchange_rate;
    var total_eq_val = Number($('#root_task_currency_eq_' + id).val());
    var eq_val_amount = Number($('#root_task_currency_amount_' + id).val());
    //var amount=exchange_rate*eq_val_amount;
    //var currency_value=(amount*100)/total_eq_val;
    // alert(currency_value);
    var currency_value = (eq_val_amount * 100) / total_eq_val;
    //   $('#root_task_currency_value_'+id).val(currency_value);
    if (!($.isNumeric(eq_val_amount))){
    $('#root_task_currency_value_' + id).val('');
    $('#root_task_currency_amount_' + id).val('');
    return false;
    } else{
    if (eq_val_amount < 0){
    $('#root_task_currency_value_' + id).val('');
    $('#root_task_currency_amount_' + id).val('');
    return false;
    }
    }

    if (remaining_task_amount < eq_val_amount){
    $('#root_task_currency_amount_' + id).val('');
    $('#root_task_currency_amount_' + id).css('border', '1px solid red');
    $('#root_task_currency_amount_error_' + id).html('Amount should not be more than ' + remaining_task_amount);
    } else{
    $('#root_task_currency_amount_' + id).css('border', '1px solid #ccc');
    $('#root_task_currency_amount_error_' + id).html('');
    }
    if (currency_value != '' || currency_value != 0){
    if (currency_value <= remaining_task_value){
    $('#root_task_currency_value_' + id).val(currency_value.toFixed(6));
    $('#root_task_currency_value_' + id).css('border', '1px solid #ccc');
    $('#root_task_currency_value_error_' + id).html('');
    } else{
    $('#root_task_currency_value_' + id).val('');
    $('#root_task_currency_value_' + id).css('border', '1px solid red');
    $('#root_task_currency_value_error_' + id).html('Value should not be more than ' + remaining_task_value + '%');
    }
    } else{
    $('#root_task_currency_value_' + id).val('');
    $('#root_task_currency_value_' + id).css('border', '1px solid #ccc');
    $('#root_task_currency_value_error_' + id).html('');
    }

    var currency_qty = $('#root_task_total_currency').val();
    var total_currency_amount = 0;
    for (var i = 1; i <= currency_qty; i++){
//            var currency_amount=$('#task_currency_amount_'+i).val();
//            total_currency_amount=Number(total_currency_amount)+Number(currency_amount);
    c_amount = $('#root_task_currency_amount_' + i).val();
    exchange_rate = Number($('#root_task_currency_exchange_rate_' + i).val());
    var currency_amount = c_amount / exchange_rate;
    total_currency_amount = Number(total_currency_amount) + Number(currency_amount);
    }
    $('#root_task_equivalent_currency_value').val(total_currency_amount);
    var task_value = (total_currency_amount / equivalent_task_value) * 100;
    $('#root_task_equivalent_value').val(task_value.toFixed(6));
    }

    function edit_root_task_currency_amount_calculation(id = ''){
    //alert(id);
    var equivalent_task_value = Number($('#edit_root_eq_task_value_id').val());
    var exchange_rate;
    var total_eq_val = $('#edit_root_task_currency_eq_' + id).val();
    var eq_val_percent = $('#edit_root_task_currency_value_' + id).val();
    // var amount=(total_eq_val*eq_val_percent)/100;
    var amount = (Number(total_eq_val) * Number(eq_val_percent)) / 100;
    $('#edit_root_task_currency_amount_' + id).val(amount.toFixed(6));
    var currency_qty = Number($('#edit_root_task_total_currency').val());
    var total_currency_amount = 0;
    for (var j = 1; j <= currency_qty; j++){
    c_amount = $('#edit_root_task_currency_amount_' + j).val();
    exchange_rate = Number($('#edit_root_task_currency_exchange_rate_' + j).val());
    var currency_amount = c_amount / exchange_rate;
    total_currency_amount = Number(total_currency_amount) + Number(currency_amount);
    }
    //alert(total_currency_amount);
    $('#edit_root_task_equivalent_currency_value').val(total_currency_amount);
    var task_value = (total_currency_amount / equivalent_task_value) * 100;
    $('#edit_root_task_equivalent_value').val(task_value.toFixed(6));
    }

    function edit_root_task_currency_value_calculation(id = ''){
    var equivalent_task_value = Number($('#edit_root_eq_task_value_id').val());
    var exchange_rate;
    var total_eq_val = Number($('#edit_root_task_currency_eq_' + id).val());
    var eq_val_amount = Number($('#edit_root_task_currency_amount_' + id).val());
    var currency_value = (eq_val_amount * 100) / total_eq_val;
    $('#edit_root_task_currency_value_' + id).val(currency_value.toFixed(6));
    var currency_qty = $('#edit_root_task_total_currency').val();
    var total_currency_amount = 0;
    for (var j = 1; j <= currency_qty; j++){
//            var currency_amount=$('#task_currency_amount_'+i).val();
//            total_currency_amount=Number(total_currency_amount)+Number(currency_amount);
    c_amount = $('#edit_root_task_currency_amount_' + j).val();
    exchange_rate = Number($('#edit_root_task_currency_exchange_rate_' + j).val());
    var currency_amount = c_amount / exchange_rate;
    total_currency_amount = Number(total_currency_amount) + Number(currency_amount);
    }
    $('#edit_root_task_equivalent_currency_value').val(total_currency_amount);
    var task_value = (total_currency_amount / equivalent_task_value) * 100;
    $('#edit_root_task_equivalent_value').val(task_value.toFixed(6));
    }
    function add_sub_task(sub_task_id = '', parent_task_id = ''){
    var project_id = $('#project_id').val();
    if (sub_task_id != ''){
//            $('#task').hide();
//            $('#root_task').show();
//            $('#sub_task').hide();
    $('#rootTaskModal').modal('show');
    $.ajax({
    type:"POST",
            url:"backend/project/taskSubtaskInfo",
            data:{project_id:project_id, task_id:parent_task_id, sub_task_id:sub_task_id},
            dataType: "json",
            success: function (data) {
            $('#root_parent_task_id').val(parent_task_id);
            $('#root_sub_task_id').val(sub_task_id);
            var parent_task_name = data.task_info[0]['task_name'];
//               alert(parent_task_name);
            var sub_task_name = data.sub_task_info[0]['task_name'];
            var origin = data.sub_task_info[0]['origin'];
            var unit = data.sub_task_info[0]['unit'];
            var subtack_equivalent_currency = data.sub_task_info[0]['task_equivalent_currency'];
            $('#root_eq_task_value_id').val(subtack_equivalent_currency);
            $('#root_parent_task_name').val(parent_task_name);
            $('#root_sub_task_name').val(sub_task_name);
            $('#root_task_origin').val(origin);
            $('#root_task_unit').val(unit);
            var total_currency = data.task_currencies.length;
            var str = '';
            str += '<div class="row">';
            str += '<input type="hidden" id="root_task_total_currency" value="' + total_currency + ' " >';
            $(data.task_currencies).each(function (i, v) {
            //  alert('test');
            i = i + 1;
            str += '<div class="col-md-6"><div class="form-group">';
            str += '<label style="margin-bottom: 0px;">' + v.title + ' Value%</label>';
            str += '<input type="hidden" id="root_task_currency_id_' + i + '" value="' + v.currency_id + '" >';
            str += ' <input type="hidden" id="root_task_currency_eq_' + i + '" value="' + v.equivalant_amount + '" >';
            str += '<input id="root_task_currency_value_' + i + '" type="text" class="form-control form-txt-primary" placeholder="' + v.remainig_equivalant_value + '" value="" onkeyup="javascript:root_task_currency_amount_calculation(' + i + ')" onblur="javascript:root_task_currency_amount_calculation(' + i + ')" onchange="javascript:root_task_currency_amount_calculation(' + i + ')" >';
            str += '<span style="color:red" id="root_task_currency_value_error_' + i + '"></span>';
            str += ' </div></div>';
            str += '<div class="col-md-6"><div class="form-group">';
            str += '<label style="margin-bottom: 0px;">' + v.title + ' Amount</label>';
            str += '<input type="hidden" id="root_task_currency_exchange_rate_' + i + '" value="' + v.project_currency_rate + '" >';
            str += '<input id="root_task_currency_amount_' + i + '" type="text" class="form-control form-txt-primary" placeholder="' + v.remaining_equivalant_amount + '" value="" onkeyup="javascript:root_task_currency_value_calculation(' + i + ')" onblur="javascript:root_task_currency_value_calculation(' + i + ')" onchange="javascript:root_task_currency_value_calculation(' + i + ')" >';
            str += '<span style="color:red" id="root_task_currency_amount_error_' + i + '"></span>';
            str += '</div></div>';
            });
            str += '</div>';
            $('#root_task_currency').html(str);
            }
    })
    }
    }

    $('#discard_root_task').click(function(){
    $("#rootTaskModal :input").val('');
    $('#root_task_name_error').html("");
    $('#root_task_origin_error').html("");
    $('#root_task_unit_error').html("");
    $('#root_task_quantity_error').html("");
    $('#sub_task_equivalent_currency_value_error').html('');
    $('#root_task_name').css('border', '1px solid #ccc');
    $('#root_task_origin').css('border', '1px solid #ccc');
    $('#root_task_unit').css('border', '1px solid #ccc');
    $('#root_task_quantity').css('border', '1px solid #ccc');
    $('#root_task_equivalent_currency_value').css('border', '1px solid #ccc');
    });
    $('#root_task_close').click(function(){
    $("#rootTaskModal :input").val('');
    $('#root_task_name_error').html("");
    $('#root_task_origin_error').html("");
    $('#root_task_unit_error').html("");
    $('#root_task_quantity_error').html("");
    $('#sub_task_equivalent_currency_value_error').html('');
    $('#root_task_name').css('border', '1px solid #ccc');
    $('#root_task_origin').css('border', '1px solid #ccc');
    $('#root_task_unit').css('border', '1px solid #ccc');
    $('#root_task_quantity').css('border', '1px solid #ccc');
    $('#root_task_equivalent_currency_value').css('border', '1px solid #ccc');
    });
    $('#add_root_task').click(function(){
    var cur_qty = Number($('#root_task_total_currency').val());
    var currency = [];
    for (var z = 1; z <= cur_qty; z++){
    var id = $('#root_task_currency_id_' + z).val();
    var value = $('#root_task_currency_value_' + z).val();
    var camount = $('#root_task_currency_amount_' + z).val();
    currency.push({
    c_id: id,
            c_value:value,
            c_amount:camount
    });
    }
    var project_id = $('#project_id').val();
    var parent_task_id = $('#root_parent_task_id').val();
    var sub_task_id = $('#root_sub_task_id').val();
    var task_name = $('#root_task_name').val();
    var origin = $('#root_task_origin').val();
    var unit = $('#root_task_unit').val();
    var quantity = $('#root_task_quantity').val();
    var task_value = $('#root_task_equivalent_value').val();
    var task_equivalent_currency = $('#root_task_equivalent_currency_value').val();
    if (task_name == '' && origin == '' && unit == '' && quantity == '' && task_equivalent_currency == ''){
    $('#root_task_name_error').html("Please fill name field");
    $('#root_task_origin_error').html("Please fill origin field");
    $('#root_task_unit_error').html("Please fill unit field");
    $('#root_task_quantity_error').html("Please fill quantity field");
    $('#root_task_equivalent_currency_value_error').html('Please fill equivalent currency field');
    $('#root_task_name').css('border', '1px solid red');
    $('#root_task_origin').css('border', '1px solid red');
    $('#root_task_unit').css('border', '1px solid red');
    $('#root_task_quantity').css('border', '1px solid red');
    $('#root_task_equivalent_currency_value').css('border', '1px solid red');
    return false;
    } else if (task_name == ''){

    $('#root_task_name_error').html("Please fill name field");
    $('#root_task_origin_error').html("");
    $('#root_task_unit_error').html("");
    $('#root_task_quantity_error').html("");
    $('#root_task_equivalent_currency_value_error').html('');
    $('#root_task_name').css('border', '1px solid red');
    $('#root_task_origin').css('border', '1px solid #ccc');
    $('#root_task_unit').css('border', '1px solid #ccc');
    $('#root_task_quantity').css('border', '1px solid #ccc');
    $('#root_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (origin == ''){
    $('#root_task_name_error').html("");
    $('#root_task_origin_error').html("Please fill origin field");
    $('#root_task_unit_error').html("");
    $('#root_task_quantity_error').html("");
    $('#root_task_equivalent_currency_value_error').html('');
    $('#root_task_name').css('border', '1px solid #ccc');
    $('#root_task_origin').css('border', '1px solid red');
    $('#root_task_unit').css('border', '1px solid #ccc');
    $('#root_task_quantity').css('border', '1px solid #ccc');
    $('#root_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (unit == ''){
    $('#root_task_name_error').html("");
    $('#root_task_origin_error').html("");
    $('#root_task_unit_error').html("Please fill unit field");
    $('#root_task_quantity_error').html("");
    $('#root_task_equivalent_currency_value_error').html('');
    $('#root_task_name').css('border', '1px solid #ccc');
    $('#root_task_origin').css('border', '1px solid #ccc');
    $('#root_task_unit').css('border', '1px solid red');
    $('#root_task_quantity').css('border', '1px solid #ccc');
    $('#root_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (quantity == ''){
    $('#root_task_name_error').html("");
    $('#root_task_origin_error').html("");
    $('#root_task_unit_error').html("");
    $('#root_task_quantity_error').html("Please fill quantity field");
    $('#root_task_equivalent_currency_value_error').html('');
    $('#root_task_name').css('border', '1px solid #ccc');
    $('#root_task_origin').css('border', '1px solid #cc');
    $('#root_task_unit').css('border', '1px solid #ccc');
    $('#root_task_quantity').css('border', '1px solid red');
    $('#root_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (task_equivalent_currency == ''){
    $('#root_task_name_error').html("");
    $('#root_task_origin_error').html("");
    $('#root_task_unit_error').html("");
    $('#root_task_quantity_error').html("");
    $('#root_task_equivalent_currency_value_error').html('Please fill origin field');
    $('#root_task_name').css('border', '1px solid #ccc');
    $('#root_task_origin').css('border', '1px solid #ccc');
    $('#root_task_unit').css('border', '1px solid #ccc');
    $('#root_task_quantity').css('border', '1px solid #ccc');
    $('#root_task_equivalent_currency_value').css('border', '1px solid red');
    return false;
    }
    $.ajax({
    type:"POST",
            url:"backend/project/addEditRootTask",
            data:{currency:currency, project_id:project_id, parent_task_id:parent_task_id, sub_task_id:sub_task_id, task_name:task_name, origin:origin, unit:unit, quantity:quantity, task_value:task_value, task_equivalent_currency:task_equivalent_currency},
            dataType: "json",
            success: function (data) {
            //$('#rootTaskModal').modal('show');
            if (data.status == "success"){
            $('#root_task_name').val('');
            $('#root_task_quantity').val('');
            $('#root_task_equivalent_value').val('');
            $('#root_task_name_error').html("");
            $('#root_task_origin_error').html("");
            $('#root_task_unit_error').html("");
            $('#root_task_quantity_error').html("");
            $('#root_task_equivalent_currency_value_error').html('');
            $('#root_task_name').css('border', '1px solid #ccc');
            $('#root_task_origin').css('border', '1px solid #ccc');
            $('#root_task_unit').css('border', '1px solid #ccc');
            $('#root_task_quantity').css('border', '1px solid #ccc');
            $('#root_task_equivalent_currency_value').css('border', '1px solid #ccc');
            var total_currency = data.task_currencies.length;
            var str1 = '';
            str1 += '<div class="row">';
            str1 += '<input type="hidden" id="root_task_total_currency" value="' + total_currency + ' " >';
            $(data.task_currencies).each(function (z, t) {
            //  alert('test');
            z = z + 1;
            str1 += '<div class="col-md-6"><div class="form-group">';
            str1 += '<label style="margin-bottom: 0px;">' + t.title + ' Value%</label>';
            str1 += '<input type="hidden" id="root_task_currency_id_' + z + '" value="' + t.currency_id + '" >';
            str1 += ' <input type="hidden" id="root_task_currency_eq_' + z + '" value="' + t.equivalant_amount + '" >';
            str1 += '<input id="root_task_currency_value_' + z + '" type="text" class="form-control form-txt-primary" placeholder="' + t.remainig_equivalant_value + '" value="" onkeyup="javascript:root_task_currency_amount_calculation(' + z + ')" onblur="javascript:root_task_currency_amount_calculation(' + z + ')" onchange="javascript:root_task_currency_amount_calculation(' + z + ')" >';
            str1 += ' </div></div>';
            str1 += '<div class="col-md-6"><div class="form-group">';
            str1 += '<label style="margin-bottom: 0px;">' + t.title + ' Amount</label>';
            str1 += '<input type="hidden" id="root_task_currency_exchange_rate_' + z + '" value="' + t.project_currency_rate + '" >';
            str1 += '<input id="root_task_currency_amount_' + z + '" type="text" class="form-control form-txt-primary" placeholder="' + t.remaining_equivalant_amount + '" value="" onkeyup="javascript:root_task_currency_value_calculation(' + z + ')" onblur="javascript:root_task_currency_value_calculation(' + z + ')" onchange="javascript:root_task_currency_value_calculation(' + z + ')" >';
            str1 += '</div></div>';
            });
            str1 += '</div>';
            $('#root_task_currency').html(str1);
            var str = '';
            var j = 0;
            $(data.tasks).each(function (i, v) {
            j = j + 1;
            if (v.sub_tasks != ''){
            str += '<tr class="border-bottom-primary">';
            str += '<td><i id="expand_subtask_' + j + '" class="fa fa-plus" onclick="javascript:expandSubtask(' + j + ')"></i>';
            str += ' <i style="display:none;" id="collapse_subtask_' + j + '"  class="fa fa-minus" onclick="javascript:collapseSubtask(' + j + ')"></i>';
            str += '</td>'
                    str += '<td>' + v.task_name + '</td>';
//            str += '<td>' + v.origin + '</td>';
//            str += '<td>' + v.unit + '</td>';
//            str += '<td>' + v.quantity + '</td>';
//            str += '<td>' + v.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_task(' + v.task_id + ');"><i class="fa fa-plus"></i>Add Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_task(' + v.task_id + ');"><i class="fa fa-edit"></i>Edit Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + v.task_id + ');"><i class="fa fa-trash"></i>Delete Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            var k = 0;
            $(v.sub_tasks).each(function (m, n) {
            k = k + 1;
            l = j + "." + k;
            if (n.sub_sub_tasks != ''){

            str += '<tr class="subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:1.2rem !important;">';
            str += '<i id="expand_root_task_' + j + k + '" class="expand_root_task' + j + ' fa fa-plus" onclick="javascript:expandRoottask(' + j + ',' + k + ')"></i>';
            str += '<i style="display:none;" id="collapse_root_task_' + j + k + '" class="collapse_root_task' + j + ' fa fa-minus" onclick="javascript:collapseRoottask(' + j + ',' + k + ')"></i>';
            str += '</td>';
            str += '<td style="padding-left:1.5rem !important;">' + n.task_name + '</td>';
//            str += '<td>' + n.origin + '</td>';
//            str += '<td>' + n.unit + '</td>';
//            str += '<td>' + n.quantity + '</td>';
//            str += '<td>' + n.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_sub_task(' + n.task_id + ',' + n.parent_task_id + ');"><i class="fa fa-plus"></i>Add Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_sub_task(' + n.task_id + ');"><i class="fa fa-edit"></i>Edit Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + n.task_id + ');"><i class="fa fa-trash"></i>Delete Subtask</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            var a = 0;
            $(n.sub_sub_tasks).each(function (o, p) {
            a = a + 1;
            b = j + "." + k + "." + a;
            str += '<tr class="roottask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:2.0rem !important;">' + b + '</td>';
            str += '<td style="padding-left:2.3rem !important;">' + p.task_name + '</td>';
//            str += '<td>' + p.origin + '</td>';
//            str += '<td>' + p.unit + '</td>';
//            str += '<td>' + p.quantity + '</td>';
//            str += '<td>' + p.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_root_task(' + p.task_id + ');"><i class="fa fa-edit"></i>Edit Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + p.task_id + ');"><i class="fa fa-trash"></i>Delete Root Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            } else{
            str += '<tr class="subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:1.2rem !important;">' + l + '</td>';
            str += '<td style="padding-left:1.5rem !important;">' + n.task_name + '</td>';
//            str += '<td>' + n.origin + '</td>';
//            str += '<td>' + n.unit + '</td>';
//            str += '<td>' + n.quantity + '</td>';
//            str += '<td>' + n.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_sub_task(' + n.task_id + ',' + n.parent_task_id + ');"><i class="fa fa-plus"></i>Add Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_sub_task(' + n.task_id + ');"><i class="fa fa-edit"></i>Edit Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + n.task_id + ');"><i class="fa fa-trash"></i>Delete Subtask</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            }
            });
            } else{
            str += '<tr class="subtask' + j + ' border-bottom-primary">';
            str += '<td>' + j + '</td>';
            str += '<td>' + v.task_name + '</td>';
//            str += '<td>' + v.origin + '</td>';
//            str += '<td>' + v.unit + '</td>';
//            str += '<td>' + v.quantity + '</td>';
//            str += '<td>' + v.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_task(' + v.task_id + ');"><i class="fa fa-plus"></i>Add Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_task(' + v.task_id + ');"><i class="fa fa-edit"></i>Edit Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + v.task_id + ');"><i class="fa fa-trash"></i>Delete Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            }

            });
            $('#task_body').html(str);
            } else{
            $('#root_task_name_error').html("This task already exists");
            $('#root_task_name').css('border', '1px solid red');
            }
            }
    })

    });
    function edit_root_task(task_id = ''){
    var project_id = $('#project_id').val();
    $.ajax({
    type:"POST",
            url:"backend/project/editrootTaskInfo",
            data:{project_id:project_id, task_id:task_id},
            dataType: "json",
            success: function (data) {


            $('#edit_root_task_id').val(task_id);
            var parent_task_name = data.parent_task_info[0]['task_name'];
            var parent_task_id = data.parent_task_info[0]['task_id'];
            var sub_task_id = data.sub_task_info[0]['task_id'];
            $('#edit_root_parent_id').val(parent_task_id);
            $('#edit_root_sub_task_id').val(sub_task_id);
            var sub_task_name = data.sub_task_info[0]['task_name'];
            var task_name = data.task_info[0]['task_name'];
            var origin = data.task_info[0]['origin'];
            var unit = data.task_info[0]['unit'];
            var quantity = data.task_info[0]['quantity'];
            var equivalent_value = data.task_info[0]['task_value'];
            var task_equivalent_currency = data.task_info[0]['task_equivalent_currency'];
            var subtack_equivalent_currency = data.sub_task_info[0]['task_equivalent_currency'];
            $('#edit_root_eq_task_value_id').val(subtack_equivalent_currency);
            $('#root_task_head').html(sub_task_name);
            $('#edit_root_parent_task_name').val(parent_task_name);
            $('#edit_root_sub_task_name').val(sub_task_name);
            $('#edit_root_task_name').val(task_name);
            $('#r_task_name').html(task_name);
            $('#edit_root_task_origin').val(origin);
            $('#edit_root_task_unit').val(unit);
            $('#edit_root_task_quantity').val(quantity);
            $('#edit_root_task_equivalent_value').val(equivalent_value);
            $('#edit_root_task_equivalent_currency_value').val(task_equivalent_currency);
            var total_currency = data.task_currencies.length;
            var str = '';
            str += '<div class="row">';
            str += '<input type="hidden" id="edit_root_task_total_currency" value="' + total_currency + ' " >';
            $(data.task_currencies).each(function (i, v) {
            i = i + 1;
            str += '<div class="col-md-6"><div class="form-group">';
            str += '<label style="margin-bottom: 0px;">' + v.title + ' Value%</label>';
            str += '<input type="hidden" id="edit_root_task_currency_id_' + i + '" value="' + v.currency_id + '" >';
            str += ' <input type="hidden" id="edit_root_task_currency_eq_' + i + '" value="' + v.currency_equi_amount + '" >';
            str += '<input id="edit_root_task_currency_value_' + i + '" type="text" class="form-control form-txt-primary" placeholder="' + v.equivalant_value + '" value="' + v.equivalant_value + '" onkeyup="javascript:edit_root_task_currency_amount_calculation(' + i + ')" onblur="javascript:edit_root_task_currency_amount_calculation(' + i + ')" onchange="javascript:edit_root_task_currency_amount_calculation(' + i + ')" >';
            str += ' </div></div>';
            str += '<div class="col-md-6"><div class="form-group">';
            str += '<label style="margin-bottom: 0px;">' + v.title + ' Amount</label>';
            str += '<input type="hidden" id="edit_root_task_currency_exchange_rate_' + i + '" value="' + v.project_currency_rate + '" >';
            str += '<input id="edit_root_task_currency_amount_' + i + '" type="text" class="form-control form-txt-primary" placeholder="' + v.equivalant_amount + '" value="' + v.equivalant_amount + '" onkeyup="javascript:edit_root_task_currency_value_calculation(' + i + ')" onblur="javascript:edit_root_task_currency_value_calculation(' + i + ')" onchange="javascript:edit_root_task_currency_value_calculation(' + i + ')" >';
            str += '</div></div>';
            });
            str += '</div>';
            $('#edit_root_task_currency').html(str);
            $('#editRootTaskModal').modal('show');
            }
    })
    }

    $('#discard_edit_root_task').click(function(){
    $("#editRootTaskModal :input").val('');
    $('#edit_root_task_name_error').html("");
    $('#edit_root_task_origin_error').html("");
    $('#edit_root_task_unit_error').html("");
    $('#edit_root_task_quantity_error').html("");
    $('#edit_root_task_equivalent_currency_value_error').html('');
    $('#edit_root_task_name').css('border', '1px solid #ccc');
    $('#edit_root_task_origin').css('border', '1px solid #ccc');
    $('#edit_root_task_unit').css('border', '1px solid #ccc');
    $('#edit_root_task_quantity').css('border', '1px solid #ccc');
    $('#edit_root_task_equivalent_currency_value').css('border', '1px solid #ccc');
    });
    $('#edit_root_task_close').click(function(){
    $("#editRootTaskModal :input").val('');
    $('#edit_root_task_name_error').html("");
    $('#edit_root_task_origin_error').html("");
    $('#edit_root_task_unit_error').html("");
    $('#edit_root_task_quantity_error').html("");
    $('#edit_root_task_equivalent_currency_value_error').html('');
    $('#edit_root_task_name').css('border', '1px solid #ccc');
    $('#edit_root_task_origin').css('border', '1px solid #ccc');
    $('#edit_root_task_unit').css('border', '1px solid #ccc');
    $('#edit_root_task_quantity').css('border', '1px solid #ccc');
    $('#edit_root_task_equivalent_currency_value').css('border', '1px solid #ccc');
    });
    $('#update_root_task').click(function(){
    var cur_qty = Number($('#edit_root_task_total_currency').val());
    var currency = [];
    for (var z = 1; z <= cur_qty; z++){
    var id = $('#edit_root_task_currency_id_' + z).val();
    var value = $('#edit_root_task_currency_value_' + z).val();
    var camount = $('#edit_root_task_currency_amount_' + z).val();
    currency.push({
    c_id: id,
            c_value:value,
            c_amount:camount
    });
    }
    var project_id = $('#project_id').val();
    var parent_task_id = $('#edit_root_parent_id').val();
    var sub_task_id = $('#edit_root_sub_task_id').val();
    var task_id = $('#edit_root_task_id').val();
    var task_name = $('#edit_root_task_name').val();
    var origin = $('#edit_root_task_origin').val();
    var unit = $('#edit_root_task_unit').val();
    var quantity = $('#edit_root_task_quantity').val();
    var task_value = $('#edit_root_task_equivalent_value').val();
    var task_equivalent_currency = $('#edit_root_task_equivalent_currency_value').val();
    if (task_name == '' && origin == '' && unit == '' && quantity == '' && task_equivalent_currency == ''){
    $('#edit_root_task_name_error').html("Please fill name field");
    $('#edit_root_task_origin_error').html("Please fill origin field");
    $('#edit_root_task_unit_error').html("Please fill unit field");
    $('#edit_root_task_quantity_error').html("Please fill quantity field");
    $('#edit_root_task_equivalent_currency_value_error').html('Please fill equivalent currency field');
    $('#edit_root_task_name').css('border', '1px solid red');
    $('#edit_root_task_origin').css('border', '1px solid red');
    $('#edit_root_task_unit').css('border', '1px solid red');
    $('#edit_root_task_quantity').css('border', '1px solid red');
    $('#edit_root_task_equivalent_currency_value').css('border', '1px solid red');
    return false;
    } else if (task_name == ''){

    $('#edit_root_task_name_error').html("Please fill name field");
    $('#edit_root_task_origin_error').html("");
    $('#edit_root_task_unit_error').html("");
    $('#edit_root_task_quantity_error').html("");
    $('#edit_root_task_equivalent_currency_value_error').html('');
    $('#edit_root_task_name').css('border', '1px solid red');
    $('#edit_root_task_origin').css('border', '1px solid #ccc');
    $('#edit_root_task_unit').css('border', '1px solid #ccc');
    $('#edit_root_task_quantity').css('border', '1px solid #ccc');
    $('#edit_root_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (origin == ''){
    $('#edit_root_task_name_error').html("");
    $('#edit_root_task_origin_error').html("Please fill origin field");
    $('#edit_root_task_unit_error').html("");
    $('#edit_root_task_quantity_error').html("");
    $('#edit_root_task_equivalent_currency_value_error').html('');
    $('#edit_root_task_name').css('border', '1px solid #ccc');
    $('#edit_root_task_origin').css('border', '1px solid red');
    $('#edit_root_task_unit').css('border', '1px solid #ccc');
    $('#edit_root_task_quantity').css('border', '1px solid #ccc');
    $('#edit_root_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (unit == ''){
    $('#edit_root_task_name_error').html("");
    $('#edit_root_task_origin_error').html("");
    $('#edit_root_task_unit_error').html("Please fill unit field");
    $('#edit_root_task_quantity_error').html("");
    $('#edit_root_task_equivalent_currency_value_error').html('');
    $('#edit_root_task_name').css('border', '1px solid #ccc');
    $('#edit_root_task_origin').css('border', '1px solid #ccc');
    $('#edit_root_task_unit').css('border', '1px solid red');
    $('#edit_root_task_quantity').css('border', '1px solid #ccc');
    $('#edit_root_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (quantity == ''){
    $('#edit_root_task_name_error').html("");
    $('#edit_root_task_origin_error').html("");
    $('#edit_root_task_unit_error').html("");
    $('#edit_root_task_quantity_error').html("Please fill quantity field");
    $('#edit_root_task_equivalent_currency_value_error').html('');
    $('#edit_root_task_name').css('border', '1px solid #ccc');
    $('#edit_root_task_origin').css('border', '1px solid #cc');
    $('#edit_root_task_unit').css('border', '1px solid #ccc');
    $('#edit_root_task_quantity').css('border', '1px solid red');
    $('#edit_root_task_equivalent_currency_value').css('border', '1px solid #ccc');
    return false;
    } else if (task_equivalent_currency == ''){
    $('#edit_root_task_name_error').html("");
    $('#edit_root_task_origin_error').html("");
    $('#edit_root_task_unit_error').html("");
    $('#edit_root_task_quantity_error').html("");
    $('#root_task_equivalent_currency_value_error').html('Please fill origin field');
    $('#edit_root_task_name').css('border', '1px solid #ccc');
    $('#edit_root_task_origin').css('border', '1px solid #ccc');
    $('#edit_root_task_unit').css('border', '1px solid #ccc');
    $('#edit_root_task_quantity').css('border', '1px solid #ccc');
    $('#edit_root_task_equivalent_currency_value').css('border', '1px solid red');
    return false;
    }
    $.ajax({
    type:"POST",
            url:"backend/project/editProjectTask",
            data:{currency:currency, project_id:project_id, parent_task_id:parent_task_id, sub_task_id:sub_task_id, task_id:task_id, task_name:task_name, origin:origin, unit:unit, quantity:quantity, task_value:task_value, task_equivalent_currency:task_equivalent_currency},
            dataType: "json",
            success: function (data) {
            if (data.status == "success"){
            $("#editRootTaskModal :input").val('');
            $('#edit_root_task_name_error').html("");
            $('#edit_root_task_origin_error').html("");
            $('#edit_root_task_unit_error').html("");
            $('#edit_root_task_quantity_error').html("");
            $('#edit_root_task_equivalent_currency_value_error').html('');
            $('#edit_root_task_name').css('border', '1px solid #ccc');
            $('#edit_root_task_origin').css('border', '1px solid #ccc');
            $('#edit_root_task_unit').css('border', '1px solid #ccc');
            $('#edit_root_task_quantity').css('border', '1px solid #ccc');
            $('#edit_root_task_equivalent_currency_value').css('border', '1px solid #ccc');
            var str = '';
            var j = 0;
            $(data.tasks).each(function (i, v) {
            j = j + 1;
            if (v.sub_tasks != ''){
            str += '<tr class="border-bottom-primary">';
            str += '<td><i id="expand_subtask_' + j + '" class="fa fa-plus" onclick="javascript:expandSubtask(' + j + ')"></i>';
            str += ' <i style="display:none;" id="collapse_subtask_' + j + '"  class="fa fa-minus" onclick="javascript:collapseSubtask(' + j + ')"></i>';
            str += '</td>'
                    str += '<td>' + v.task_name + '</td>';
//            str += '<td>' + v.origin + '</td>';
//            str += '<td>' + v.unit + '</td>';
//            str += '<td>' + v.quantity + '</td>';
//            str += '<td>' + v.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_task(' + v.task_id + ');"><i class="fa fa-plus"></i>Add Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_task(' + v.task_id + ');"><i class="fa fa-edit"></i>Edit Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + v.task_id + ');"><i class="fa fa-trash"></i>Delete Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            var k = 0;
            $(v.sub_tasks).each(function (m, n) {
            k = k + 1;
            l = j + "." + k;
            if (n.sub_sub_tasks != ''){

            str += '<tr class="subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:1.2rem !important;">';
            str += '<i id="expand_root_task_' + j + k + '" class="expand_root_task' + j + ' fa fa-plus" onclick="javascript:expandRoottask(' + j + ',' + k + ')"></i>';
            str += '<i style="display:none;" id="collapse_root_task_' + j + k + '" class="collapse_root_task' + j + ' fa fa-minus" onclick="javascript:collapseRoottask(' + j + ',' + k + ')"></i>';
            str += '</td>';
            str += '<td style="padding-left:1.5rem !important;">' + n.task_name + '</td>';
//            str += '<td>' + n.origin + '</td>';
//            str += '<td>' + n.unit + '</td>';
//            str += '<td>' + n.quantity + '</td>';
//            str += '<td>' + n.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_sub_task(' + n.task_id + ',' + n.parent_task_id + ');"><i class="fa fa-plus"></i>Add Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_sub_task(' + n.task_id + ');"><i class="fa fa-edit"></i>Edit Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + n.task_id + ');"><i class="fa fa-trash"></i>Delete Subtask</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            var a = 0;
            $(n.sub_sub_tasks).each(function (o, p) {
            a = a + 1;
            b = j + "." + k + "." + a;
            str += '<tr class="roottask'+j+' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:2.0rem !important;">' + b + '</td>';
            str += '<td style="padding-left:2.3rem !important;">' + p.task_name + '</td>';
//            str += '<td>' + p.origin + '</td>';
//            str += '<td>' + p.unit + '</td>';
//            str += '<td>' + p.quantity + '</td>';
//            str += '<td>' + p.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_root_task(' + p.task_id + ');"><i class="fa fa-edit"></i>Edit Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + p.task_id + ');"><i class="fa fa-trash"></i>Delete Root Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            } else{
            str += '<tr class="subtask' + j + ' border-bottom-primary" style="display:none;">';
            str += '<td style="padding-left:1.2rem !important;">' + l + '</td>';
            str += '<td style="padding-left:1.5rem !important;">' + n.task_name + '</td>';
//            str += '<td>' + n.origin + '</td>';
//            str += '<td>' + n.unit + '</td>';
//            str += '<td>' + n.quantity + '</td>';
//            str += '<td>' + n.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_sub_task(' + n.task_id + ',' + n.parent_task_id + ');"><i class="fa fa-plus"></i>Add Root Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_sub_task(' + n.task_id + ');"><i class="fa fa-edit"></i>Edit Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + n.task_id + ');"><i class="fa fa-trash"></i>Delete Subtask</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            }
            });
            } else{
            str += '<tr class="subtask' + j + ' border-bottom-primary">';
            str += '<td>' + j + '</td>';
            str += '<td>' + v.task_name + '</td>';
//            str += '<td>' + v.origin + '</td>';
//            str += '<td>' + v.unit + '</td>';
//            str += '<td>' + v.quantity + '</td>';
//            str += '<td>' + v.task_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:add_task(' + v.task_id + ');"><i class="fa fa-plus"></i>Add Subtask</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_task(' + v.task_id + ');"><i class="fa fa-edit"></i>Edit Task</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_task(' + v.task_id + ');"><i class="fa fa-trash"></i>Delete Task</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            }

            });
            $('#task_body').html(str);
            }

            }
    })

    });</script>
<!-- Assign Department Module -->
<script type="text/javascript">
    $('#new_department').click(function(){
    // alert('test');
    var project_id = $('#project_id').val();
    $.ajax({
    type:"POST",
            url:"backend/project/departmentValueInfo",
            data:{project_id:project_id},
            dataType:"json",
            success:function (data){
            if (data.status = "success"){
            var dept_value = 100 - (data.dept_info[0]['toal_dept_value']);
            $('#department_value').attr("placeholder", dept_value);
            }
            }
    });
    });
    $('#dept_discard').click(function(){
    $("#departmentModal :input").val('');
    $('#dept_name_error').html('');
    $('#dept_value_error').html('');
    $('#department_name').css('border', '1px solid #ccc');
    $('#department_value').css('border', '1px solid #ccc');
    });
    $('#text_color').on('change', function() {
    $('#text_color_hex').val(this.value);
    });
    $('#text_color_hex').on('change', function() {
    $('#text_color').val(this.value);
    });
    $('#box_color').on('change', function() {
    $('#box_color_hex').val(this.value);
    });
    $('#box_color_hex').on('change', function() {
    $('#box_color').val(this.value);
    });
    $('#department_save').click(function(){
    var project_id = $('#project_id').val();
    var dept_name = $('#department_name').val();
    var dept_value = $('#department_value').val();
    var text_color = $('#text_color_hex').val();
    var box_color = $('#box_color_hex').val();
    if (dept_name == '' && dept_value == ''){
    $('#dept_name_error').html('Please fill name field');
    $('#dept_value_error').html('Please fill value field');
    $('#department_name').css('border', '1px solid red');
    $('#department_value').css('border', '1px solid red');
    return false;
    } else if (dept_name == ''){
    $('#dept_name_error').html('Please fill name field');
    $('#dept_value_error').html('');
    $('#department_name').css('border', '1px solid red');
    $('#department_value').css('border', '1px solid #ccc');
    return false;
    } else if (dept_value == ''){
    $('#dept_value_error').html('Please fill value field');
    $('#dept_name_error').html('');
    $('#department_value').css('border', '1px solid red');
    $('#department_name').css('border', '1px solid #ccc');
    return false;
    }
    $.ajax({
    type:"POST",
            url:"backend/project/addDepartment",
            data:{project_id:project_id, dept_name:dept_name, dept_value:dept_value, text_color:text_color, box_color:box_color},
            dataType: "json",
            success: function (data) {

            if (data.status == "success"){
            var dept_value = 100 - (data.dept_info[0]['toal_dept_value']);
            $('#department_value').attr("placeholder", dept_value);
            $('#department_name').css('border', '1px solid #ccc');
            $('#department_value').css('border', '1px solid #ccc');
            $('#dept_name_error').html('');
            $('#dept_value_error').html('');
            if (dept_value != 0){
            $('#dept_val').html(dept_value);
            } else{
            $('#dept_val').html('');
            }
            var str = '';
            var str1 = '<option value="">Select Department</option>';
            var j = 0;
            $(data.departments).each(function (i, v) {

            str1 += '<option value="' + v.dept_id + '">' + v.dept_name + '</option>';
            j = j + 1;
            str += '<tr class="border-bottom-primary">';
            str += '<td>' + j + '</td>';
            str += '<td>' + v.dept_name + '</td>';
            str += '<td>' + v.dept_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_department(' + v.dept_id + ');"><i class="fa fa-edit"></i>Edit</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_department(' + v.dept_id + ');"><i class="fa fa-trash"></i>Delete</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            $('#department_body').html(str);
            $('#search_dept_id').html(str1);
            $('#status_dept_id').html(str1);
            $('#edit_status_dept_id').html(str1);
            $('#assign_user_dept_id').html(str1);
            $('#dep_task_search_dept_id').html(str1);
            $("#departmentModal :input").val('');
            $('#departmentModal :span').html('');
            } else{
            if (data.error_no == 1){
            $('#dept_name_error').html(data.error);
            $('#department_name').css('border', '1px solid red');
            $('#department_value').css('border', '1px solid #ccc');
            $('#dept_value_error').html('');
            } else if (data.error_no == 2){
            $('#dept_value_error').html(data.error);
            $('#department_value').css('border', '1px solid red');
            $('#department_name').css('border', '1px solid #ccc');
            $('#dept_name_error').html('');
            }



            }
            }
    })

    });
    function edit_department(dept_id = ''){
    //  alert('test');
    $.ajax({
    type:"POST",
            url:"backend/project/editDepartment",
            data:{dept_id:dept_id},
            dataType: "json",
            success: function (data) {

            $('#dept_id').val(dept_id);
            var dept_name = data.dept_info[0]['dept_name'];
            var dept_value = data.dept_info[0]['dept_value'];
            var text_color = data.dept_info[0]['text_color'];
            var box_color = data.dept_info[0]['box_color'];
            $('#edit_department_name').val(dept_name);
            $('#edit_department_value').val(dept_value);
            $('#edit_text_color_hex').val(text_color);
            $('#edit_text_color').val(text_color);
            $('#edit_box_color_hex').val(text_color);
            $('#edit_box_color').val(box_color);
            $('#edit_department_value').val(dept_value);
            $('#departmentEditModal').modal('show');
            }
    })
    }

    $('#discard_edit_department').click(function(){
    $('#departmentEditModal :input').val('');
    $('#edit_dept_name_error').html('');
    $('#edit_dept_value_error').html('');
    $('#edit_department_name').css('border', '1px solid #ccc');
    $('#edit_department_value').css('border', '1px solid #ccc');
    });
    $('#edit_text_color').on('change', function() {
    $('#edit_text_color_hex').val(this.value);
    });
    $('#edit_text_color_hex').on('change', function() {
    $('#edit_text_color').val(this.value);
    });
    $('#edit_box_color').on('change', function() {
    $('#edit_box_color_hex').val(this.value);
    });
    $('#edit_box_color_hex').on('change', function() {
    $('#edit_box_color').val(this.value);
    });
    $('#department_update').click(function(){
    var project_id = $('#project_id').val();
    var dept_id = $('#dept_id').val();
    var dept_name = $('#edit_department_name').val();
    var dept_value = $('#edit_department_value').val();
    var text_color = $('#edit_text_color_hex').val();
    var box_color = $('#edit_box_color_hex').val();
    // alert(text_color);
    if (dept_name == '' && dept_value == ''){
    $('#edit_dept_name_error').html('Please fill name field');
    $('#edit_dept_value_error').html('Please fill value field');
    $('#edit_department_name').css('border', '1px solid red');
    $('#edit_department_value').css('border', '1px solid red');
    return false;
    } else if (dept_name == ''){
    $('#edit_dept_name_error').html('Please fill name field');
    $('#edit_dept_value_error').html('');
    $('#edit_department_name').css('border', '1px solid red');
    $('#edit_department_value').css('border', '1px solid #ccc');
    return false;
    } else if (dept_value == ''){
    $('#edit_dept_value_error').html('Please fill value field');
    $('#edit_dept_name_error').html('');
    $('#edit_department_value').css('border', '1px solid red');
    $('#edit_department_name').css('border', '1px solid #ccc');
    return false;
    }
    $.ajax({
    type:"POST",
            url:"backend/project/editActionDepartment",
            data:{project_id:project_id, dept_id:dept_id, dept_name:dept_name, dept_value:dept_value, text_color:text_color, box_color:box_color},
            dataType: "json",
            success: function (data) {
            if (data.status == "success"){
            var dept_value = 100 - (data.dept_info[0]['toal_dept_value']);
            if (dept_value != 0){
            $('#dept_val').html(dept_value);
            } else{
            $('#dept_val').html('');
            }

            $('#edit_dept_name_error').html('');
            $('#edit_dept_value_error').html('');
            $('#edit_department_name').css('border', '1px solid #ccc');
            $('#edit_department_value').css('border', '1px solid #ccc');
            $('#edit_department_name').val(data.department_info[0]['dept_name']);
            $('#edit_department_value').val(data.department_info[0]['dept_value']);
            var str = '';
            var str1 = '<option value="">Select Department</option>';
            var j = 0;
            $(data.departments).each(function (i, v) {
            str1 += '<option value="' + v.dept_id + '">' + v.dept_name + '</option>';
            j = j + 1;
            str += '<tr class="border-bottom-primary">';
            str += '<td>' + j + '</td>';
            str += '<td>' + v.dept_name + '</td>';
            str += '<td>' + v.dept_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_department(' + v.dept_id + ');"><i class="fa fa-edit"></i>Edit</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_department(' + v.dept_id + ');"><i class="fa fa-trash"></i>Delete</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            $('#department_body').html(str);
            $('#search_dept_id').html(str1);
            $('#status_dept_id').html(str1);
            $('#edit_status_dept_id').html(str1);
            $('#assign_user_dept_id').html(str1);
            $('#dep_task_search_dept_id').html(str1);
            $('#departmentEditModal').modal('toggle');
            $("#departmentEditModal :input").val('');
            } else{

            if (data.error_no == 1){
            $('#edit_dept_name_error').html(data.error);
            $('#edit_department_name').css('border', '1px solid red');
            $('#edit_department_value').css('border', '1px solid #ccc');
            $('#dept_value_error').html('');
            } else if (data.error_no == 2){
            $('#edit_dept_value_error').html(data.error);
            $('#edit_department_value').css('border', '1px solid red');
            $('#edit_department_name').css('border', '1px solid #ccc');
            $('#dept_name_error').html('');
            } else{
            $('#edit_dept_name_error').html('');
            $('#edit_dept_value_error').html('');
            $('#edit_department_name').css('border', '1px solid #ccc');
            $('#edit_department_value').css('border', '1px solid #ccc');
            $('#departmentEditModal').modal('toggle');
            }
            }
            }
    })

    });
    function delete_department(dept_id = ''){
    //   alert(task_id);
    var project_id = $('#project_id').val();
    var r = confirm("Are you sure?");
    if (r == true){
    $.ajax({
    type:"POST",
            url:"backend/project/deleteDepartment",
            data:{project_id:project_id, dept_id:dept_id},
            dataType: "json",
            success: function (data) {
            if (data.status == "success"){

            var dept_value = 100 - (data.dept_info[0]['toal_dept_value']);
            if (dept_value != 0){
            $('#dept_val').html(dept_value);
            } else{
            $('#dept_val').html('');
            }

            var str = '';
            var str1 = '<option value="">Select Department</option>';
            var j = 0;
            $(data.departments).each(function (i, v) {
            str1 += '<option value="' + v.dept_id + '">' + v.dept_name + '</option>';
            j = j + 1;
            str += '<tr class="border-bottom-primary">';
            str += '<td>' + j + '</td>';
            str += '<td>' + v.dept_name + '</td>';
            str += '<td>' + v.dept_value + '</td>';
            str += '<td>';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_department(' + v.dept_id + ');"><i class="fa fa-edit"></i>Edit</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_department(' + v.dept_id + ');"><i class="fa fa-trash"></i>Delete</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            $('#department_body').html(str);
            $('#search_dept_id').html(str1);
            $('#status_dept_id').html(str1);
            $('#edit_status_dept_id').html(str1);
            $('#assign_user_dept_id').html(str1);
            $('#dep_task_search_dept_id').html(str1);
            }
            }
    })
    }

    }

</script>
<!-- Assign Status Module -->
<script type="text/javascript">
    $('#search_dept_id').change(function(){
    // alert('test');
    var project_id = $('#project_id').val();
    var dept_id = $('#search_dept_id').val();
    if (dept_id != ''){
    $.ajax({
    type:"POST",
            url:"backend/project/deptStatus",
            data:{project_id:project_id, dept_id:dept_id},
            dataType: "json",
            success: function (data) {
            if (data.status = "success"){
            var str = '';
            var j = 0;
            $(data.project_status).each(function (i, v) {
            j = j + 1;
            str += '<tr class="border-bottom-primary">';
            str += '<td>' + j + '</td>';
            //str+='<td>'+v.dept_name+'</td>';
            str += '<td>' + v.status_name + '</td>';
            str += '<td style="text-align:right;">';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_status(' + v.status_id + ');"><i class="fa fa-edit"></i>Edit</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_status(' + v.status_id + ');"><i class="fa fa-trash"></i>Delete</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            $('#status_body').html(str);
            }
            }
    })
    }

    });
    $('#status_discard').click(function(){
    //$('#status_dept_id').val('');
    $('#status_name').css("border", "1px solid #ccc");
    $('#status_dept_id').css("border", "1px solid #ccc");
    $('#status_dept_error').html("");
    $('#status_name_error').html("");
    });
    $('#status_close').click(function(){
    $('#status_name').css("border", "1px solid #ccc");
    $('#status_dept_id').css("border", "1px solid #ccc");
    $('#status_dept_id').val('');
    $('#status_dept_error').html("");
    $('#status_name_error').html("");
    });
    $('#status_save').click(function(){
    var project_id = $('#project_id').val();
    var status_name = $('#status_name').val();
    var dept_id = $('#status_dept_id').val();
    if (dept_id == ''){
    $('#status_dept_error').html("Please select department");
    $('#status_dept_id').css("border", "1px solid red");
    return false;
    }

    if (status_name == ''){
    $('#status_dept_id').css("border", "1px solid #ccc");
    $('#status_dept_error').html("");
    $('#status_name').css("border", "1px solid red");
    $('#status_name_error').html("Please fill status field");
    return false;
    }

    $.ajax({
    type:"POST",
            url:"backend/project/addStatus",
            data:{project_id:project_id, dept_id:dept_id, status_name:status_name},
            dataType: "json",
            success: function (data) {
            if (data.status == "success"){
            $('#status_name').css("border", "1px solid #ccc");
            $('#status_dept_id').css("border", "1px solid #ccc");
            $('#status_dept_error').html("");
            $('#status_name_error').html("");
            var str = '';
            var j = 0;
            $(data.project_status).each(function (i, v) {
            j = j + 1;
            str += '<tr class="border-bottom-primary">';
            str += '<td>' + j + '</td>';
            //str+='<td>'+v.dept_name+'</td>';
            str += '<td>' + v.status_name + '</td>';
            str += '<td style="text-align:right;">';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_status(' + v.status_id + ');"><i class="fa fa-edit"></i>Edit</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_status(' + v.status_id + ');"><i class="fa fa-trash"></i>Delete</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            $('#status_body').html(str);
            $("#status_name").val('');
            //$('#status_dept_id').val("").trigger("change");
            //$('#statusModal').modal('show');


            } else{
            $('#status_name_error').html("This status already exists.");
            $('#status_name').css("border", "1px solid red");
            }
            }
    })

    });
    function edit_status(status_id = ''){
    //  alert('test');
    $.ajax({
    type:"POST",
            url:"backend/project/editStatus",
            data:{status_id:status_id},
            dataType: "json",
            success: function (data) {


            $('#status_id').val(status_id);
            var status_name = data.status_info[0]['status_name'];
            var dept_id = data.status_info[0]['dept_id'];
            $('#edit_status_name').val(status_name);
            $('#edit_status_dept_id').val(dept_id);
            $('#statusEditModal').modal('show');
            }
    })
    }

    $('#status_update').click(function(){
    var project_id = $('#project_id').val();
    var dept_id = $('#edit_status_dept_id').val();
    var status_id = $('#status_id').val();
    var status_name = $('#edit_status_name').val();
    if (dept_id == ''){
    $('#edit_status_dept_error').html("Please select department");
    $('#edit_status_dept_id').css("border", "1px solid red");
    return false;
    }

    if (status_name == ''){
    $('#edit_status_dept_id').css("border", "1px solid #ccc");
    $('#edit_status_dept_error').html("");
    $('#edit_status_name').css("border", "1px solid red");
    $('#edit_status_name_error').html("Please fill status field");
    return false;
    }

    $.ajax({
    type:"POST",
            url:"backend/project/editActionStatus",
            data:{project_id:project_id, dept_id:dept_id, status_id:status_id, status_name:status_name},
            dataType: "json",
            success: function (data) {
            if (data.status == "success"){
            var str = '';
            var j = 0;
            $(data.project_status).each(function (i, v) {
            j = j + 1;
            str += '<tr class="border-bottom-primary">';
            str += '<td>' + j + '</td>';
            //str+='<td>'+v.dept_name+'</td>';
            str += '<td>' + v.status_name + '</td>';
            str += '<td style="text-align:right;">';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_status(' + v.status_id + ');"><i class="fa fa-edit"></i>Edit</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_status(' + v.status_id + ');"><i class="fa fa-trash"></i>Delete</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            $('#status_body').html(str);
            $("#statusEditModal :input").val('');
            }
            }
    })

    });
    $('#edit_status_discard').click(function(){
    //$('#status_dept_id').val('');
    $('#edit_status_name').css("border", "1px solid #ccc");
    $('#edit_status_dept_id').css("border", "1px solid #ccc");
    $('#edit_status_dept_error').html("");
    $('#edit_status_name_error').html("");
    });
    $('#status_close').click(function(){
    $('#edit_status_name').css("border", "1px solid #ccc");
    $('#edit_status_dept_id').css("border", "1px solid #ccc");
    $('#edit_status_dept_id').val('');
    $('#edit_status_dept_error').html("");
    $('#edit_status_name_error').html("");
    });
    function delete_status(status_id = ''){
    //   alert(task_id);
    var project_id = $('#project_id').val();
    var search_dept_id = $('#search_dept_id').val();
    var r = confirm("Are you sure?");
    if (r == true){
    $.ajax({
    type:"POST",
            url:"backend/project/deleteStatus",
            data:{project_id:project_id, status_id:status_id, dept_id:search_dept_id},
            dataType: "json",
            success: function (data) {
            if (data.status = "success"){
            var str = '';
            var j = 0;
            $(data.project_status).each(function (i, v) {
            j = j + 1;
            str += '<tr class="border-bottom-primary">';
            str += '<td>' + j + '</td>';
            //str+='<td>'+v.dept_name+'</td>';
            str += '<td>' + v.status_name + '</td>';
            str += '<td style="text-align:right;">';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_status(' + v.status_id + ');"><i class="fa fa-edit"></i>Edit</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_status(' + v.status_id + ');"><i class="fa fa-trash"></i>Delete</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            $('#status_body').html(str);
            }
            }
    })
    }

    }

</script>
<!-- Assign Dept Task Module -->
<script type="text/javascript">
    function deptExpandSubtask(id = ''){
    $('#dept_expand_subtask_' + id).hide();
    $('#dept_collapse_subtask_' + id).show();
    $('.dept_subtask' + id).show();
    }

    function deptCollapseSubtask(id = ''){
    $('.dept_expand_root_task' + id).show();
    $('.dept_collapse_root_task' + id).hide();
    $('#dept_expand_subtask_' + id).show();
    $('#dept_collapse_subtask_' + id).hide();
    $('.dept_subtask' + id).hide();
    $('.dept_roottask' + id).hide();
    }

    function deptExpandRoottask(id = '', sub = ''){
    $('#dept_expand_root_task_' + id + sub).hide();
    $('#dept_collapse_root_task_' + id + sub).show();
    $('.dept_roottask' + id).show();
    }

    function deptCollapseRoottask(id = '', sub = ''){
    $('#dept_expand_root_task_' + id + sub).show();
    $('#dept_collapse_root_task_' + id + sub).hide();
    $('.dept_roottask' + id).hide();
    }
</script>
<!-- Assign User Module -->
<script>
    $('#assign_user_type').change(function(){
    var role = $(this).val();
    if (role == 4){
    $('#show_department').show();
    } else{
    $('#show_department').hide();
    }
    })
            $('#assign_user_save').click(function(){
    var role = $('#assign_user_type').val();
    var dept_id = $('#assign_user_dept_id').val();
    var user_id = $('#assign_user_id').val();
    var user_edit_id = $('#assign_user_edit_id').val();
    if (role == ''){
    alert('Please select any role');
    return false;
    }
    if (role == 4 && dept_id == ''){
    alert('Please select any department');
    return false;
    }
    if (role < 4){
    dept_id = '0';
    }
    if (user_id == ''){
    alert('Please select any user');
    return false;
    }
    $.ajax({
    type:"POST",
            url:"backend/user/assign_user",
            data:{"role":role, "dept_id":dept_id, "user_id":user_id, 'user_edit_id':user_edit_id, 'project_id':<?php echo $project_info[0]['project_id']; ?>},
            dataType: "json",
            success: function (data) {
            if (data.status = "success"){

            if (user_edit_id == ''){
            var type = 'Admin';
            if (data.data.user_type == 1){
            type = 'Admin';
            }
            if (data.data.user_type == 2){
            type = 'Project Manager';
            }
            if (data.data.user_type == 3){
            type = 'Monitor';
            }
            if (data.data.user_type == 4){
            type = 'Moderator';
            }
            str = '<tr class="border-bottom-primary">';
            str += '<td>' + ($('#assign_user_body').find('tr').length + 1) + '</td>';
            str += '<td>' + data.data.username + '</td>';
            str += '<td>' + type + '</td>';
            str += '<td>' + data.data.dept_name + '</td>';
            str += '<td style="text-align:right;">';
            str += ' <div class="dropdown"> <i class="  fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_assign_user(' + data.data.assign_user_id + ');"><i class="fa fa-edit"></i>Edit</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_assign_user(' + data.data.assign_user_id + ');"><i class="fa fa-trash"></i>Delete</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            $('#assign_user_body').append(str);
            $('.js-example-data-array').val('').trigger("change");
            } else{
            var str = '';
            var j = 0;
            $(data.data).each(function (i, v) {
            if (v.dept_name == 'null' || v.dept_name == null){
            var dept = '';
            } else{
            var dept = v.dept_name;
            }
            var type = 'Admin';
            if (v.user_type == 1){
            type = 'Admin';
            }
            if (v.user_type == 2){
            type = 'Project Manager';
            }
            if (v.user_type == 3){
            type = 'Monitor';
            }
            if (v.user_type == 4){
            type = 'Moderator';
            }
            j = j + 1;
            str += '<tr class="border-bottom-primary">';
            str += '<td>' + j + '</td>';
            str += '<td>' + v.username + '</td>';
            str += '<td>' + type + '</td>';
            str += '<td>' + dept + '</td>';
            str += '<td style="text-align:right;">';
            str += ' <div class="dropdown"> <i class="fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_assign_user(' + v.assign_user_id + ');"><i class="fa fa-edit"></i>Edit</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_assign_user(' + v.assign_user_id + ');"><i class="fa fa-trash"></i>Delete</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            $('.js-example-data-array').val('').trigger("change");
            $('#assign_user_body').html(str);
            }
            }
            }
    })

    })

            function delete_assign_user(assign_user_id){
            //   alert(task_id);
            var project_id = $('#project_id').val();
            var r = confirm("Are you sure?");
            if (r == true){
            $.ajax({
            type:"POST",
                    url:"backend/user/deleteassign_user_id",
                    data:{"assign_user_id":assign_user_id, 'project_id':project_id},
                    dataType: "json",
                    success: function (data) {
                    if (data.status = "success"){
                    var str = '';
                    var j = 0;
                    $(data.data).each(function (i, v) {
                    if (v.dept_name == 'null' || v.dept_name == null){
                    var dept = '';
                    } else{
                    var dept = v.dept_name;
                    }
                    var type = 'Admin';
                    if (v.user_type == 1){
                    type = 'Admin';
                    }
                    if (v.user_type == 2){
                    type = 'Project Manager';
                    }
                    if (v.user_type == 3){
                    type = 'Monitor';
                    }
                    if (v.user_type == 4){
                    type = 'Moderator';
                    }
                    j = j + 1;
                    str += '<tr class="border-bottom-primary">';
                    str += '<td>' + j + '</td>';
                    str += '<td>' + v.username + '</td>';
                    str += '<td>' + type + '</td>';
                    str += '<td>' + dept + '</td>';
                    str += '<td style="text-align:right;">';
                    str += ' <div class="dropdown"> <i class="fa fa-cogs" data-toggle="dropdown"></i>';
                    str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
                    str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_assign_user(' + v.assign_user_id + ');"><i class="fa fa-edit"></i>Edit</a></li>';
                    str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_assign_user(' + v.assign_user_id + ');"><i class="fa fa-trash"></i>Delete</a></li>';
                    str += '</ul></div>';
                    str += '</td>';
                    str += '</tr>';
                    });
                    $('#assign_user_body').html(str);
                    }
                    }
            })
            }

            }
    function edit_assign_user(assign_user_id){
    $.ajax({
    type:"POST",
            url:"backend/user/get_assign_user_id",
            data:{'assign_user_id':assign_user_id},
            dataType: "json",
            success: function (data) {

            $('#assign_user_type').val(data.data.user_type).trigger("change");
            $('#assign_user_dept_id').val(data.data.department_id).trigger("change");
            $('#assign_user_id').val(data.data.user_id).trigger("change");
            $('#assign_user_edit_id').val(assign_user_id);
            var role = data.data.user_type;
            if (role == 4){
            $('#show_department').show();
            } else{
            $('#show_department').hide();
            }
            $('#userModal').modal('show');
            }
    })
    }
</script>


<script>

    //Dept Task Value Start
    function set_dept_task_value(task_id){
    var project_id = $('#project_id').val();
    var dept_id = $('#dep_task_search_dept_id').val();
    $('#risk_task_id').val(task_id);
    if (dept_id == ''){
    alert('Please select department first');
    return false;
    } else{
        $('#set_task_value').val(task_id);
    $.ajax({
    type:"POST",
            url:"backend/user/getTaskValue",
            data:{'dept_id':dept_id, 'project_id':project_id, 'task_id':task_id},
            dataType: "json",
            success: function (data) {
            if (data.taskvalue != ''){
            $('#set_taskname').val(data.taskvalue.task_name)
            $('#set_specification').val(data.taskvalue.meterial_specification)
                    $('#set_unit').val(data.taskvalue.unit)
                    $('#set_qty').val(data.taskvalue.qty)
                    $('#set_rate').val(data.taskvalue.rate)
                    $('#dept_task_start_date').val(get_format(data.taskvalue.start_date))
                    $('#dept_task_end_date').val(get_format(data.taskvalue.end_date))
                    $('#set_t_amount').val(data.taskvalue.total)
                    $('#set_remarks').val(data.taskvalue.remark)
            }
            $('#set_valueModal').modal('show');
            }
    });
    }


    }
    //Dept Task Risk Level Start
    function set_dept_task_risk_level(task_id){
    var project_id = $('#project_id').val();
    var dept_id = $('#dep_task_search_dept_id').val();
    $('#risk_task_id').val(task_id);
    if (dept_id == ''){
    alert('Please select department first');
    return false;
    } else{
    $.ajax({
    type:"POST",
            url:"backend/user/getRiskLevel",
            data:{'dept_id':dept_id, 'project_id':project_id, 'task_id':task_id},
            dataType: "json",
            success: function (data) {
            if (data.risk != ''){
            $(data.risk).each(function(i, v){
            if (v.rist_lavel == 'Critical'){
            $('#critical_above').val(v.above);
            $('#critical_below').val(v.below);
            } else if (v.rist_lavel == 'High'){
            $('#high_above').val(v.above);
            $('#high_below').val(v.below);
            } else if (v.rist_lavel == 'Moderate'){
            $('#moderate_above').val(v.above);
            $('#moderate_below').val(v.below);
            } else if (v.rist_lavel == 'Low'){
            $('#low_above').val(v.above);
            $('#low_below').val(v.below);
            }

            });
            }
            $('#dept_task_risk_Modal').modal('show');
            }
    });
    }


    }
    $('#add_risk').click(function(){
    var dept_id = $('#dep_task_search_dept_id').val();
    var project_id = $('#project_id').val();
    var task_id = $('#risk_task_id').val();
    var critical_above = $('#critical_above').val();
    if (critical_above == ''){
    $('#critical_above').css('border', '1px solid red');
    $('#critical_above_error').html('Plese fill the critical above field');
    return false;
    }
    var critical_below = $('#critical_below').val();
    if (critical_below == ''){
    $('#critical_above').css('border', '1px solid #cccccc');
    $('#critical_above_error').html('');
    $('#critical_below').css('border', '1px solid red');
    $('#critical_below_error').html('Plese fill the critical below field');
    return false;
    }
    var high_above = $('#high_above').val();
    if (high_above == ''){
    $('#critical_above').css('border', '1px solid #cccccc');
    $('#critical_above_error').html('');
    $('#critical_below').css('border', '1px solid #cccccc');
    $('#critical_below_error').html('');
    $('#high_above').css('border', '1px solid red');
    $('#high_above_error').html('Plese fill the high above field');
    return false;
    }
    var high_below = $('#high_below').val();
    if (high_below == ''){

    $('#critical_above').css('border', '1px solid #cccccc');
    $('#critical_above_error').html('');
    $('#critical_below').css('border', '1px solid #cccccc');
    $('#critical_below_error').html('');
    $('#high_above').css('border', '1px solid #cccccc');
    $('#high_above_error').html('');
    $('#high_below').css('border', '1px solid red');
    $('#high_below_error').html('Plese fill the high below field');
    return false;
    }
    var moderate_above = $('#moderate_above').val();
    if (moderate_above == ''){
    $('#critical_above').css('border', '1px solid #cccccc');
    $('#critical_above_error').html('');
    $('#critical_below').css('border', '1px solid #cccccc');
    $('#critical_below_error').html('');
    $('#high_above').css('border', '1px solid #cccccc');
    $('#high_above_error').html('');
    $('#high_below').css('border', '1px solid #cccccc');
    $('#high_below_error').html('');
    $('#moderate_above').css('border', '1px solid red');
    $('#moderate_above_error').html('Plese fill the moderate above field');
    return false;
    }
    var moderate_below = $('#moderate_below').val();
    if (moderate_below == ''){

    $('#critical_above').css('border', '1px solid #cccccc');
    $('#critical_above_error').html('');
    $('#critical_below').css('border', '1px solid #cccccc');
    $('#critical_below_error').html('');
    $('#high_above').css('border', '1px solid #cccccc');
    $('#high_above_error').html('');
    $('#high_below').css('border', '1px solid #cccccc');
    $('#high_below_error').html('');
    $('#moderate_above').css('border', '1px solid #cccccc');
    $('#moderate_above_error').html('');
    $('#moderate_below').css('border', '1px solid red');
    $('#moderate_below_error').html('Plese fill the moderate below field');
    return false;
    }
    var low_above = $('#low_above').val();
    if (low_above == ''){
    $('#critical_above').css('border', '1px solid #cccccc');
    $('#critical_above_error').html('');
    $('#critical_below').css('border', '1px solid #cccccc');
    $('#critical_below_error').html('');
    $('#high_above').css('border', '1px solid #cccccc');
    $('#high_above_error').html('');
    $('#high_below').css('border', '1px solid #cccccc');
    $('#high_below_error').html('');
    $('#moderate_above').css('border', '1px solid #cccccc');
    $('#moderate_above_error').html('');
    $('#moderate_below').css('border', '1px solid #cccccc');
    $('#moderate_below_error').html('');
    $('#low_above').css('border', '1px solid red');
    $('#low_above_error').html('Plese fill the low above field');
    return false;
    }
    var low_below = $('#low_below').val();
    if (low_below == ''){
    $('#critical_above').css('border', '1px solid #cccccc');
    $('#critical_above_error').html('');
    $('#critical_below').css('border', '1px solid #cccccc');
    $('#critical_below_error').html('');
    $('#high_above').css('border', '1px solid #cccccc');
    $('#high_above_error').html('');
    $('#high_below').css('border', '1px solid #cccccc');
    $('#high_below_error').html('');
    $('#moderate_above').css('border', '1px solid #cccccc');
    $('#moderate_above_error').html('');
    $('#moderate_below').css('border', '1px solid #cccccc');
    $('#moderate_below_error').html('');
    $('#low_above').css('border', '1px solid #cccccc');
    $('#low_above_error').html('');
    $('#low_below').css('border', '1px solid red');
    $('#low_below_error').html('Plese fill the low below field');
    return false;
    }

    var critical = $('#critical').val();
    var high = $('#high').val();
    var moderate = $('#moderate').val();
    var low = $('#low').val();
    var risk = [];
    if (critical != ''){
    risk.push({
    rist_lavel:critical,
            above:critical_above,
            below:critical_below
    });
    }

    if (high != ''){
    risk.push({
    rist_lavel:high,
            above:high_above,
            below:high_below
    });
    }

    if (moderate != ''){
    risk.push({
    rist_lavel:moderate,
            above:moderate_above,
            below:moderate_below
    });
    }
    if (low != ''){
    risk.push({
    rist_lavel:low,
            above:low_above,
            below:low_below
    });
    }

    $.ajax({
    type:"POST",
            url:"backend/user/saveRiskLevel",
            data:{'dept_id':dept_id, 'project_id':project_id, 'task_id':task_id, 'risk':risk},
            dataType: "json",
            success: function (data) {
            if (data.status == 'success'){
            alert('Successfully set risk level');
            }
            }
    });
    });
    $('#risk_discard').click(function(){
    $('#critical_above').val('');
    $('#critical_below').val('');
    $('#high_above').val('');
    $('#high_below').val('');
    $('#moderate_above').val('');
    $('#moderate_below').val('');
    $('#low_above').val('');
    $('#low_below').val('');
    $('#critical_above').css('border', '1px solid #cccccc');
    $('#critical_below').css('border', '1px solid #cccccc');
    $('#high_above').css('border', '1px solid #cccccc');
    $('#high_below').css('border', '1px solid #cccccc');
    $('#moderate_above').css('border', '1px solid #cccccc');
    $('#moderate_below').css('border', '1px solid #cccccc');
    $('#low_above').css('border', '1px solid #cccccc');
    $('#low_below').css('border', '1px solid #cccccc');
    $('#critical_above_error').html('');
    $('#critical_below_error').html('');
    $('#high_above_error').html('');
    $('#high_below_error').html('');
    $('#moderate_above_error').html('');
    $('#moderate_below_error').html('');
    $('#low_above_error').html('');
    $('#low_below_error').html('');
    });
    $('#risk_close').click(function(){
    $('#critical_above').val('');
    $('#critical_below').val('');
    $('#high_above').val('');
    $('#high_below').val('');
    $('#moderate_above').val('');
    $('#moderate_below').val('');
    $('#low_above').val('');
    $('#low_below').val('');
    $('#critical_above').css('border', '1px solid #cccccc');
    $('#critical_below').css('border', '1px solid #cccccc');
    $('#high_above').css('border', '1px solid #cccccc');
    $('#high_below').css('border', '1px solid #cccccc');
    $('#moderate_above').css('border', '1px solid #cccccc');
    $('#moderate_below').css('border', '1px solid #cccccc');
    $('#low_above').css('border', '1px solid #cccccc');
    $('#low_below').css('border', '1px solid #cccccc');
    $('#critical_above_error').html('');
    $('#critical_below_error').html('');
    $('#high_above_error').html('');
    $('#high_below_error').html('');
    $('#moderate_above_error').html('');
    $('#moderate_below_error').html('');
    $('#low_above_error').html('');
    $('#low_below_error').html('');
    });
    //Dept Task Risk Level End



    $('#dep_task_search_dept_id').change(function(){
        var dept_id = $(this).val();
        $.ajax({
        type:"POST",
                url:"backend/user/get_dept_task_list",
                data:{'dept_id':dept_id, 'project_id':$('#project_id').val()},
                dataType: "json",
                success: function (data) {
                    if (data.status == 'success'){
                        $("td[id*='startdate_']").html('');
                        $("td[id*='enddate_']").html('');
                        $("td[id*='meterial_specification_']").html('');
                        $("td[id*='unit_']").html('');
                        $("td[id*='qty_']").html('');
                        $("td[id*='rate_']").html('');
                        $("td[id*='total_']").html('');
                        $("td[id*='moderator_']").html('<a href="javascript:">Set Moderator</a>');
                        $(data.data.task).each(function(r, v){
                            $('#meterial_specification_' + v.task_id).html(v.meterial_specification);
                            $('#unit_' + v.task_id).html(v.unit);
                            $('#qty_' + v.task_id).html(parseFloat(v.qty).toFixed(2));
                            $('#rate_' + v.task_id).html(parseFloat(v.rate).toFixed(2));
                            $('#total_' + v.task_id).html(parseFloat(v.total).toFixed(2));
                            $('#startdate_' + v.task_id).html(dateToDMY(v.start_date));
                            $('#enddate_' + v.task_id).html(dateToDMY(v.end_date));
                            if (v.username)
                                    $('#moderator_' + v.task_id).html('<a href="javascript:">' + v.username + '</a>');
                            else
                                    $('#moderator_' + v.task_id).html('<a href="javascript:">Set Moderator</a>');
                        })
                        
                        $(data.data.parent_tasks).each(function(r1, v1){
                            if(v1.total)
                            $('#total_' + v1.task_id).html(parseFloat(v1.total).toFixed(2));                                                        
                        })
                        if(data.data.net_total)
                        $('#task_grand_total_amount').html(parseFloat(data.data.net_total).toFixed(2));      
                    }
             }
        })
    })

            $("td[id*='moderator_']").click(function () {
    var dept_id = $('#dep_task_search_dept_id').val();
    if (dept_id == ''){
    alert('Please select department first');
    return false;
    }
    var splitedArray = $(this).attr('id').split('_');
    var id = splitedArray[1];
    $.ajax({
    type:"POST",
            url:"backend/user/get_moderator",
            data:{'dept_id':dept_id, 'project_id':$('#project_id').val(), 'id':id},
            dataType: "json",
            success: function (data) {
            if (data.status == 'success'){
            $('#dept_task_moderator_id').html('<option value="">Select Moderator</option>');
            $(data.data).each(function(i, v){
            $('#dept_task_moderator_id').append('<option value="' + v.user_id + '">' + v.username + '</option>');
            });
            $('#dept_task_moderator_id').val(data.task.moderator).trigger('change');
            $('#dept_task_start_date').val(get_format(data.task.start_date));
            $('#dept_task_end_date').val(get_format(data.task.end_date));
            $('#set_moderator_task').val(id);
            $('#moderatorModal').modal('show');
            }
            }
    })
    })
            $("#set_moderator").click(function () {
    var moderator = $('#dept_task_moderator_id').val();
    var start_date = $('#dept_task_start_date').val();
    var end_date = $('#dept_task_end_date').val();
    var dept_id = $('#dep_task_search_dept_id').val();
    
                var specification = $('#set_specification').val();
            var unit = $('#set_unit').val();
            var rate = $('#set_rate').val();
            var qty = $('#set_qty').val();
            var remarks = $('#set_remarks').val();
            var t_amount = $('#set_t_amount').val();
    
    if (dept_id == ''){
    alert('Please select department first');
    return false;
    }
    var id = $('#set_moderator_task').val();
    $.ajax({
    type:"POST",
            url:"backend/user/set_moderator",
            data:{'dept_id':dept_id, 'project_id':$('#project_id').val(), 'id':id, 'moderator':moderator, 'start_date':start_date, 'end_date':end_date},
            dataType: "json",
            success: function (data) {
            if (data.status == 'success'){
            //$("#moderator_" + id).html(data.data);
            $("#startdate_" + id).html(start_date);
            $("#enddate_" + id).html(end_date);
            $("#meterial_specification_" + id).html(specification);
            $("#unit_" + id).html(unit);
            $("#rate_" + id).html(rate.toFixed(2));
            $("#qty_" + id).html(qty.toFixed(2));
            $("#total_" + id).html(t_amount.toFixed(2));
           // $('#dept_task_moderator_id').val('').trigger("change");
            $('#set_valueModal').modal('hide');
            }
            }
    })
    })
           function set_task_value(){
    var start_date = $('#dept_task_start_date').val();
    var end_date = $('#dept_task_end_date').val();
    var dept_id = $('#dep_task_search_dept_id').val();
    
                var specification = $('#set_specification').val();
            var unit = $('#set_unit').val();
            var rate = $('#set_rate').val();
            var qty = $('#set_qty').val();
            var remarks = $('#set_remarks').val();
            var t_amount = $('#set_t_amount').val();
    
    if (dept_id == ''){
    alert('Please select department first');
    return false;
    }
    var id = $('#set_task_value').val();
    $.ajax({
    type:"POST",
            url:"backend/user/set_moderator",
            data:{'dept_id':dept_id, 'project_id':$('#project_id').val(),'rate':rate,'remarks':remarks,'t_amount':t_amount,'unit':unit,'qty':qty,'specification':specification, 'id':id, 'start_date':start_date, 'end_date':end_date},
            dataType: "json",
            success: function (data) {
            if (data.status == 'success'){
            $("#startdate_" + id).html(start_date);
            $("#enddate_" + id).html(end_date);
            $("#meterial_specification_" + id).html(specification);
            $("#unit_" + id).html(unit);
            $("#rate_" + id).html(rate.toFixed(2));
            $("#qty_" + id).html(qty.toFixed(2));
            $("#total_" + id).html(t_amount.toFixed(2));
           // $('#dept_task_moderator_id').val('').trigger("change");
            $('#set_valueModal').modal('hide');
            }
            }
    })
           }
    
    function save_task_value(){
       //  var moderator = $('#dept_task_moderator_id').val();
    var start_date = $('#dept_task_start_date').val();
    var end_date = $('#dept_task_end_date').val();
    var dept_id = $('#dep_task_search_dept_id').val();
    if (dept_id == ''){
    alert('Please select department first');
    return false;
    }
    var id = $('#set_moderator_task').val();
    $.ajax({
    type:"POST",
            url:"backend/user/set_task_value",
            data:{'dept_id':dept_id, 'project_id':$('#project_id').val(), 'id':id, 'moderator':moderator, 'start_date':start_date, 'end_date':end_date},
            dataType: "json",
            success: function (data) {
            if (data.status == 'success'){
            $("#moderator_" + id).html(data.data);
            $("#startdate_" + id).html(start_date);
            $("#enddate_" + id).html(end_date);
            $('#dept_task_moderator_id').val('').trigger("change");
            $('#moderatorModal').modal('hide');
            }
            }
    })
    }
    
            $("#enrolled_save").click(function () {
    var status = $('#enrolled_status').val();
    var percentage = $('#enrolled_percentage').val();
    if (!status){
    alert('Please select status');
    return false;
    }
    if (!percentage){
    alert('Please enter amount');
    return false;
    }
    var dept_id = $('#dep_task_search_dept_id').val();
    if (dept_id == ''){
    alert('Please select department first');
    return false;
    }
    var id = $('#enrolled_task_id').val();
    $.ajax({
    type:"POST",
            url:"backend/user/save_department_task_status",
            data:{'dept_id':dept_id, 'project_id':$('#project_id').val(), 'id':id, 'status':status, 'percentage':percentage, 'dept_task_status_id':$('#dept_task_status_id').val()},
            dataType: "json",
            success: function (data) {
            $('#dept_task_status_id').val('')
                    if (data.status == 'success'){
            var str = "";
            var j = 0;
            var total = 0;
            $(data.data).each(function(i, v){
            total = total + Number(v.percentage);
            j = j + 1;
            str += '<tr class="border-bottom-primary" id="dept_task_status_row_' + v.dept_task_status_id + '">';
            str += '<td style="width:5%">' + j + '</td>';
            str += '<td style="width:70%;white-space:normal">' + v.status_name + '</td>';
            str += '<td style="width:10%">' + v.percentage + '</td>';
            str += '<td style="text-align:right;width:10%">';
            str += ' <div class="dropdown"> <i class="fa fa-cogs" data-toggle="dropdown"></i>';
            str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_dipt_task_status(' + v.dept_task_status_id + ');"><i class="fa fa-edit"></i>Edit</a></li>';
            str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_dipt_task_status(' + v.dept_task_status_id + ');"><i class="fa fa-trash"></i>Delete</a></li>';
            str += '</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            $('#dept_task_status_body').html(str);
            var str = "<option value=''>Select Status</option>";
            $(data.project_status).each(function(i, v){
            str += '<option value="' + v.status_id + '">' + v.status_name + '</option>';
            });
            $('#enrolled_status').html(str);
            $('#enrolled_percentage').attr('placeholder', (100 - Number(total)));
            $('#enrolled_percentage').val('');
            $('#enrolled_status').val('').trigger("change");
            }
            }
    })
    })

            function get_dept_task_status(task_id){
            //alert(dept_task_status_body)
            //alert(enrolled_status)
            var dept_id = $('#dep_task_search_dept_id').val();
            if (dept_id == ''){
            alert('Please select department first');
            return false;
            }
            $.ajax({
            type:"POST",
                    url:"backend/user/get_enrolled_status",
                    data:{'dept_id':dept_id, 'project_id':$('#project_id').val(), 'id':task_id},
                    dataType: "json",
                    success: function (data) {
                    if (data.status == 'success'){
                    $('#enrolled_task_id').val(task_id);
                    var str = "";
                    var j = 0;
                    var total = 0;
                    if (data != ''){
                    //alert(data.data[0]);
                    if (data.data != ''){
                    var task1_name = data.data[0]['task_name'];
                    } else{
                    task1_name = '';
                    }
                    $(data.data).each(function(i, v){
                    if (v.status_name){
                    total = total + Number(v.percentage);
                    j = j + 1;
                    str += '<tr class="border-bottom-primary" id="dept_task_status_row_' + v.dept_task_status_id + '">';
                    str += '<td style="width:5%">' + j + '</td>';
                    str += '<td style="width:70%;white-space:normal">' + v.status_name + '</td>';
                    str += '<td style="width:10%">' + v.percentage + '</td>';
                    str += '<td style="text-align:right;width:10%">';
                    str += ' <div class="dropdown"> <i class="fa fa-cogs" data-toggle="dropdown"></i>';
                    str += '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
                    str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_dipt_task_status(' + v.dept_task_status_id + ');"><i class="fa fa-edit"></i>Edit</a></li>';
                    str += '<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_dipt_task_status(' + v.dept_task_status_id + ');"><i class="fa fa-trash"></i>Delete</a></li>';
                    str += '</ul></div>';
                    str += '</td>';
                    str += '</tr>';
                    }
                    });
                    $('#dept_task_status_body').html(str);
                    $('#dept_task_set_status').html(task1_name);
                    }
                    var str = "<option value=''>Select Status</option>";
                    $(data.project_status).each(function(i, v){
                    str += '<option value="' + v.status_id + '">' + v.status_name + '</option>';
                    });
                    $('#enrolled_percentage').attr('placeholder', (100 - Number(total)));
                    $('#enrolled_status').html(str);
                    $('#dept_task_status_Modal').modal('show');
                    }
                    }
            })

            }
    $('#enrolled_percentage').change(function(){
    if (Number($('#enrolled_percentage').attr('placeholder')) < Number($('#enrolled_percentage').val())){
    alert('You cannot enter more than 100. You have remaining ' + Number($('#enrolled_percentage').attr('placeholder')));
    $('#enrolled_percentage').val(0);
    $('#enrolled_percentage').focus();
    return false;
    }

    })
            function edit_dipt_task_status(dept_task_status_id){
            $('#dept_task_status_id').val('');
            $.ajax({
            type:"POST",
                    url:"backend/user/get_dept_task_status",
                    data:{'id':dept_task_status_id},
                    dataType: "json",
                    success: function (data) {
                    if (data.status == 'success'){

                    var str = "<option value=''>Select Status</option>";
                    $(data.project_status).each(function(i, v){
                    str += '<option value="' + v.status_id + '">' + v.status_name + '</option>';
                    });
                    $('#enrolled_status').html(str);
                    $('#dept_task_status_id').val(dept_task_status_id)
                            $('#enrolled_status').val(data.data.status_id).trigger('change')
                            $('#enrolled_percentage').val(data.data.percentage);
                    $('#enrolled_percentage').attr('placeholder', (Number($('#enrolled_percentage').attr('placeholder')) + Number(data.data.percentage)));
                    }
                    }
            })
            }
    function delete_dipt_task_status(dept_task_status_id){
    if (confirm('Are you sure ?') == true){
    $('#dept_task_status_id').val('');
    $.ajax({
    type:"POST",
            url:"backend/user/delete_dept_task_status",
            data:{'id':dept_task_status_id},
            dataType: "json",
            success: function (data) {
            if (data.status == 'success'){
            $('#dept_task_status_row_' + dept_task_status_id).remove();
            var str = "<option value=''>Select Status</option>";
            $(data.project_status).each(function(i, v){
            str += '<option value="' + v.status_id + '">' + v.status_name + '</option>';
            });
            $('#enrolled_status').html(str);
            }
            }
    })
    }
    }

    $('#checkall').click(function(){
    if ($(this).is(':checked') == true){
    $("input[id*='dept_check_']").each(function(){
    $(this).prop('checked', true);
    })
    } else{
    $("input[id*='dept_check_']").each(function(){
    $(this).prop('checked', false);
    })
    }
    })
            $('#set_date').click(function(){

    var checked_item = new Array();
    $("input[id*='dept_check_']").each(function(){
    if ($(this).is(':checked') == true){
    var splitedArray = $(this).attr('id').split('_');
    checked_item.push(splitedArray[2]);
    }
    })
            if (checked_item.length == 0){
    alert('Please select any item');
    return false;
    }
    var dept_id = $('#dep_task_search_dept_id').val();
    if (dept_id == ''){
    alert('Please select department first');
    return false;
    }
    $('#set_dateModal').modal('show');
    })
            $('#set_status').click(function(){

    var checked_item = new Array();
    $("input[id*='dept_check_']").each(function(){
    if ($(this).is(':checked') == true){
    var splitedArray = $(this).attr('id').split('_');
    checked_item.push(splitedArray[2]);
    }
    })
            if (checked_item.length == 0){
    alert('Please select any item');
    return false;
    }
    var dept_id = $('#dep_task_search_dept_id').val();
    if (dept_id == ''){
    alert('Please select department first');
    return false;
    }
    $.ajax({
    type:"POST",
            url:"backend/user/get_multiple_status",
            data:{'dept_id':dept_id, 'project_id':$('#project_id').val()},
            dataType: "json",
            success: function (data) {
            if (data.status == 'success'){
            var str = "<option value=''>Select Status</option>";
            $(data.project_status).each(function(i, v){
            str += '<option value="' + v.status_id + '">' + v.status_name + '</option>';
            });
            $('#multiple_enrolled_status').html(str);
            $('#set_statusModal').modal('show');
            }
            }
    })

    })
            function save_date(){
            var start_date = $('#set_start_date').val();
            var end_date = $('#set_end_date').val();
            if (start_date == ''){
            alert('Please Enter Any Start Date');
            return false;
            }
            if (end_date == ''){
            alert('Please Enter Any End Date');
            return false;
            }
            var checked_item = new Array();
            $("input[id*='dept_check_']").each(function(){
            if ($(this).is(':checked') == true){
            var splitedArray = $(this).attr('id').split('_');
            checked_item.push(splitedArray[2]);
            }
            })
                    if (checked_item.length == 0){
            alert('Please select any item');
            return false;
            }
            var dept_id = $('#dep_task_search_dept_id').val();
            if (dept_id == ''){
            alert('Please select department first');
            return false;
            }
            $.ajax({
            type:"POST",
                    url:"backend/user/set_date",
                    data:{'dept_id':dept_id, 'project_id':$('#project_id').val(), 'task_ids':checked_item, 'start_date':start_date, 'end_date':end_date},
                    dataType: "json",
                    success: function (data) {
                    if (data.status == 'success'){
                    $('#set_start_date').val('');
                    $('#set_end_date').val('');
                    $(data.data).each(function(r, v){
                    $('#startdate_' + v.task_id).html(dateToDMY(v.start_date));
                    $('#enddate_' + v.task_id).html(dateToDMY(v.end_date));
                    if (v.username)
                            $('#moderator_' + v.task_id).html('<a href="javascript:">' + v.username + '</a>');
                    else
                            $('#moderator_' + v.task_id).html('<a href="javascript:">Set Moderator</a>');
                    })
                            $("input[id*='dept_check_']").prop('checked', false);
                    $('#checkall').prop('checked', false);
                    $('#set_dateModal').modal('hide');
                    }
                    }
            })
            }
    $("#multiple_enrolled_save").click(function () {

    var checked_item = new Array();
    $(".rootitem").each(function(){
    if ($(this).is(':checked') == true){
    var splitedArray = $(this).attr('id').split('_');
    checked_item.push(splitedArray[2]);
    }
    })
            if (checked_item.length == 0){
    alert('Please select any item');
    return false;
    }

    var status = $('#multiple_enrolled_status').val();
    var percentage = $('#multiple_enrolled_percentage').val();
    var dept_id = $('#dep_task_search_dept_id').val();
    if (dept_id == ''){
    alert('Please select department first');
    return false;
    }
    $.ajax({
    type:"POST",
            url:"backend/user/save_multiple_department_task_status",
            data:{'dept_id':dept_id, 'project_id':$('#project_id').val(), 'task_ids':checked_item, 'status':status, 'percentage':percentage},
            dataType: "json",
            success: function (data) {
            $('#dept_task_status_id').val('')
                    if (data.status == 'success'){
            var str = "";
            var j = 0;
            $(data.data).each(function(i, dt){
            $(dt).each(function(rr, v){
            j = j + 1;
            str += '<tr class="border-bottom-primary" id="dept_task_status_row_' + v.dept_task_status_id + '">';
            str += '<td style="width:10%">' + j + '</td>';
            str += '<td style="white-space:normal;width:70%">' + v.status_name + '</td>';
            str += '<td style="width:10%">' + v.percentage + '</td>';
            str += '<td style="text-align:right;width:5%">';
//                              str+=' <div class="dropdown"> <i class="fa fa-cogs" data-toggle="dropdown"></i>';
//                              str+='<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
//                              str+='<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:edit_multiple_dipt_task_status('+v.dept_task_status_id+');"><i class="fa fa-edit"></i>Edit</a></li>';
//                              str+='<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:delete_multiple_dipt_task_status('+v.dept_task_status_id+');"><i class="fa fa-trash"></i>Delete</a></li>';
//                              str+='</ul></div>';
            str += '</td>';
            str += '</tr>';
            });
            });
            $('#multiple_dept_task_status_body').html(str);
            $('#multiple_enrolled_percentage').val('');
            $('#multiple_enrolled_status').val('').trigger("change");
            }
            }
    })
    })
            $('#dept_task_start_date').change(function(){
    var pattern = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
    var arrayDate = $(this).val().match(pattern);
    var today = new Date(arrayDate[3], arrayDate[2] - 1, arrayDate[1]);
    $('#dept_task_end_date').datepicker('setStartDate', dateToDMY(today));
    })
            $('#set_start_date').change(function(){
    var pattern = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
    var arrayDate = $(this).val().match(pattern);
    var today = new Date(arrayDate[3], arrayDate[2] - 1, arrayDate[1]);
    $('#set_end_date').datepicker('setStartDate', dateToDMY(today));
    })

            $(function () {
            var pattern = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
            var date = '<?php echo date('d/m/Y', strtotime($project_info[0]['contract_date'])); ?>';
            var arrayDate = date.match(pattern);
            var today = new Date(arrayDate[3], arrayDate[2] - 1, arrayDate[1]);
            var date2 = '<?php echo date('d/m/Y', strtotime($project_info[0]['actual_completion_date'])); ?>';
            var arrayDate = date2.match(pattern);
            var today2 = new Date(arrayDate[3], arrayDate[2] - 1, arrayDate[1]);
            // alert(date2)
            setTimeout(function(){
            // alert(today);
            //   alert(today2);
            $('.datepicker').datepicker('setStartDate', dateToDMY(today));
            $('.datepicker').datepicker('setEndDate', dateToDMY(today2));
            }, 3000);
            });
    $('#main_task_body tbody').sortable({
    update: function (event, ui){
    console.log($(this));
    $(this).children().each(function(index){
    if ($(this).attr('data-position') != (index + 1)){
    $(this).attr('data-position', (index + 1)).addClass('updated');
    }
    saveNewPosition();
    });
    }
    });
    function saveNewPosition(){
    var positions = [];
    $('.updated').each(function(){
    positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
    $(this).find('td').eq(0).html($(this).attr('data-position'));
    //  alert($(this).attr('data-index'));
    $(this).removeClass('updated');
    });
    //    alert(positions);
    $.ajax({
    type:"POST",
            url:"backend/project/updateTaskPosition",
            data:{'positions':positions, 'update':1},
            dataType: "text",
            success: function (data) {
            // alert(data);
            }
    })

    }
</script>

