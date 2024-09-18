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
    .nav li{
        height: 40px;
        line-height: 40px;
    }
    .nav li a{
        padding: 20px !important;
        margin: 20px;
    }
    a.active{
        color:green;
    }
    #details ul{
        padding-left: revert;
        list-style-type: revert;
    }

</style>
<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">


            <div class="row">
                <div class="col-sm-12">
                    <!-- Tab variant tab card start -->
                    <div class="card">

                        <div class="card-block tab-icon">
                            <!-- Row start -->
                            <div class="row">
                                <div class="col-lg-12 col-xl-12">
                                    <ul class="nav nav-tabs">
                                        <li class="active show"><a data-toggle="tab" href="#details">Details Report</a></li>
                                        <li><a data-toggle="tab" href="#summary">Summary Report</a></li>
                                    </ul>

                                    <div class="tab-content" style="padding:20px">

                                        <div id="details" class="tab-pane fade in active show">
                                            <h3 style="text-align: center;">Project Information</h3>
                                            <p style="text-align: center;">No of Project : <?php echo $project_info[0]['package_no']; ?></p>
                                            <p style="text-align: center;">Name of Project : <?php echo $project_info[0]['project_name']; ?></p>
                                            <p style="text-align: center;">Project Implemented By: Green Peak Holdings Ltd.</p>
                                            <p style="text-align: center;">Address: <?php echo $project_info[0]['upazila']; ?>,<?php echo $project_info[0]['district']; ?>,<?php echo $project_info[0]['division']; ?></p>
                                            <p style="text-align: center;">Location of Project: <?php echo $project_info[0]['site_location']; ?></p>
                                            <table class="table">
                                                <tr>
                                                    <th>Task Name</th>
                                                    <th>Specification</th>
                                                    <th>Unit</th>
                                                    <th>Qty</th>
                                                    <th>Rate</th>
                                                    <th>Total</th>
                                                    <th>Consumption Amount</th>
                                                    <th>Remaining Amount</th>
                                                    <th>Starting Date</th>
                                                    <th>Ending Date</th>
                                                    
                                                </tr>
                                                <?php 
                                                $tasks = array();
                                                foreach ($departments as $d => $dept) { ?>
                                                    <tr>
                                                        <td style="text-align: center;background:lightblue;font-weight: bold" colspan="8"><?php echo $dept['dept_name']; ?></td>
                                                    </tr>
                                                    <?php foreach ($dept['tasks'] as $sl => $row) {
//                                                        echo '<pre>';
//                                                        print_r($row);
//                                                        echo '</pre>';
//                                                        exit;
                                                        if(empty($tasks[$row['task_id']])){
                                                        $tasks[$row['task_id']]['task'] = $row;
                                                        $tasks[$row['task_id']]['amount'] = 0;
                                                        }
                                                        ?>
                                                        <?php if (!empty($row['sub_tasks'])) { 
                                                           
                                                            ?>
                                                            <tr>
                                                                <td style="font-weight: bold;background:grey" ><?php echo $row['task_name']; ?></td>
                                                                <td style="font-weight: bold;background:grey"></td>
                                                                <td style="font-weight: bold;background:grey"></td>
                                                                <td style="font-weight: bold;background:grey"></td>
                                                                <td style="font-weight: bold;background:grey"></td>
                                                                <td style="font-weight: bold;background:grey"><?php echo $row['total']; ?></td>
                                                                <td style="font-weight: bold;background:grey"><?php echo $row['total_cons']; ?></td>
                                                                <td style="font-weight: bold;background:grey"><?php echo ($row['total']-$row['total_cons']); ?></td>
                                                                <td style="font-weight: bold;background:grey"></td>
                                                                <td style="font-weight: bold;background:grey"></td>
                                                            </tr>

                                                            <?php foreach ($row['sub_tasks'] as $sl1 => $subtask) { ?>
                                                                <?php if (!empty($subtask['sub_sub_tasks'])) { 
                                                                if(empty($subtask['qty'] * $subtask['rate'])) continue;
                                                                ?>
                                                                    <tr>
                                                                        <td style="padding-left: 20px !important"><?php echo $subtask['task_name']; ?></td>
                                                                        <td><?php echo $subtask['material_specification']; ?></td>
                                                                        <td><?php echo $subtask['unit']; ?></td>
                                                                        <td><?php echo $subtask['qty']; ?></td>
                                                                        <td><?php echo $subtask['rate']; ?></td>
                                                                        <td><?php echo ($subtask['qty'] * $subtask['rate']); 
                                                                        $tasks[$row['task_id']]['amount'] += ($subtask['qty'] * $subtask['rate']);
                                                                        $tasks[$row['task_id']]['consumption_amount']+=$subtask['consumption_amount'];
                                                                        $tasks[$row['task_id']]['remaining_amount']+=$subtask['total']-$subtask['consumption_amount'];
                                                                        ?></td>
                                                                        <td><?php echo $subtask['consumption_amount']; ?></td>
                                                                        <td><?php echo $subtask['total']-$subtask['consumption_amount']; ?></td>
                                                                        <td><?php echo $subtask['start_date']; ?></td>
                                                                        <td><?php echo $subtask['end_date']; ?></td>
                                                                        
                                                                    </tr>

                                                                    <?php foreach ($subtask['sub_sub_tasks'] as $sl2 => $roottask) { 
                                                                    if(empty($roottask['qty'] * $roottask['rate'])) continue;
                                                                    ?>
                                                                        <tr>
                                                                            <td style="padding-left: 40px !important"><?php echo $roottask['task_name']; ?></td>
                                                                            <td><?php echo $roottask['material_specification']; ?></td>
                                                                            <td><?php echo $roottask['unit']; ?></td>
                                                                            <td><?php echo $roottask['qty']; ?></td>
                                                                            <td><?php echo $roottask['rate']; ?></td>
                                                                            <td><?php echo ($roottask['qty'] * $roottask['rate']);
                                                                             $tasks[$row['task_id']]['amount'] += ($roottask['qty'] * $roottask['rate']);
                                                                             $tasks[$row['task_id']]['consumption_amount']+=$roottask['consumption_amount'];
                                                                             $tasks[$row['task_id']]['remaining_amount']+=$roottask['total']-$roottask['consumption_amount'];
                                                                            ?></td>
                                                                            <td><?php echo $roottask['consumption_amount']; ?></td>
                                                                            <td><?php echo $roottask['total']-$roottask['consumption_amount']; ?></td>
                                                                            <td><?php echo $roottask['start_date']; ?></td>
                                                                            <td><?php echo $roottask['end_date']; ?></td>
                                                                            
                                                                        </tr>
                                                                    <?php } ?>

                                                                <?php } else { 
                                                                if(empty($subtask['qty'] * $subtask['rate'])) continue;
                                                                ?>
                                                                    <tr>
                                                                        <td style="padding-left: 20px !important"><?php echo $subtask['task_name']; ?></td>
                                                                        <td><?php echo $subtask['material_specification']; ?></td>
                                                                        <td><?php echo $subtask['unit']; ?></td>
                                                                        <td><?php echo $subtask['qty']; ?></td>
                                                                        <td><?php echo $subtask['rate']; ?></td>
                                                                        <td><?php echo ($subtask['qty'] * $subtask['rate']); 
                                                                        $tasks[$row['task_id']]['amount'] += ($subtask['qty'] * $subtask['rate']);
                                                                        $tasks[$row['task_id']]['consumption_amount']+=$subtask['consumption_amount'];
                                                                        $tasks[$row['task_id']]['remaining_amount']+=$subtask['total']-$subtask['consumption_amount'];
                                                                        ?></td>
                                                                        <td><?php echo $subtask['consumption_amount']; ?></td>
                                                                        <td><?php echo $subtask['total']-$subtask['consumption_amount']; ?></td>
                                                                        <td><?php echo $subtask['start_date']; ?></td>
                                                                        <td><?php echo $subtask['end_date']; ?></td>
                                                                        
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php } ?>

                                                        <?php } else { 
                                                        if(empty($row['qty'] * $row['rate'])) continue;
                                                        ?>
                                                            <tr>
                                                                <td style="padding-left: 20px !important"><?php echo $row['task_name']; ?></td>
                                                                <td><?php echo $row['material_specification']; ?></td>
                                                                <td><?php echo $row['unit']; ?></td>
                                                                <td><?php echo $row['qty']; ?></td>
                                                                <td><?php echo $row['rate']; ?></td>
                                                                <td><?php echo ($row['qty'] * $row['rate']);
                                                                $tasks[$row['task_id']]['amount'] += ($row['qty'] * $row['rate']);
                                                                
                                                                $tasks[$row['task_id']]['consumption_amount']+=$row['consumption_amount'];
                                                                $tasks[$row['task_id']]['remaining_amount']+=$row['total']-$row['consumption_amount'];
                                                                ?></td>
                                                                <td><?php echo $row['consumption_amount']; ?></td>
                                                                <td><?php echo $row['total']-$row['consumption_amount']; ?></td>
                                                                <td><?php echo $row['start_date']; ?></td>
                                                                <td><?php echo $row['end_date']; ?></td>
                                                                
                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                               <tr>
                                                   <td>Grand Total</td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td><b><?php echo number_format($net_total); ?></b></td>
                                                   <td><b><?php echo number_format($net_total_cons); ?></b></td>
                                                   <td><b><?php echo number_format($net_total_remaining); ?></b></td>
                                                   <td></td>
                                                   <td></td>
                                                </tr>             
                                            </table>
                                            
                                        </div>
                                        <div id="summary" class="tab-pane fade">
                                            <h3 style="text-align: center;">Project Information</h3>
                                            <p style="text-align: center;">No of Project : <?php echo $project_info[0]['package_no']; ?></p>
                                            <p style="text-align: center;">Name of Project : <?php echo $project_info[0]['project_name']; ?></p>
                                            <p style="text-align: center;">Project Implemented By: Green Peak Holdings Ltd.</p>
                                            <p style="text-align: center;">Address: <?php echo $project_info[0]['upazila']; ?>,<?php echo $project_info[0]['district']; ?>,<?php echo $project_info[0]['division']; ?></p>
                                            <p style="text-align: center;">Location of Project: <?php echo $project_info[0]['site_location']; ?></p>
                                            <table style="width:100%" class="table table-responsive table-striped">
                                                <tr>
                                                    <th class="table-primary">SL No</th>
                                                    <th class="table-primary">Name Of Work</th>
                                                    <th class="table-primary">Start Date</th>
                                                    <th class="table-primary">Completion Date</th>
                                                    <th class="table-primary">Total</th>
                                                    <th class="table-primary">Work Done</th>
                                                    <th class="table-primary">Remaining</th>
                                                    <th class="table-primary">% of Total Cost</th>
                                                    <th class="table-primary">Remarks</th>
                                                </tr>
                                                <?php 
                                                foreach ($tasks as $sl => $row) { ?>
                                                    <tr>
                                                        <td><?php echo ($sl + 1); ?></td>
                                                        <td><?php echo $row['task']['task_name']; ?></td>
                                                        <td><?php echo $row['task']['start_date']; ?></td>
                                                        <td><?php echo $row['task']['end_date']; ?></td>
                                                        <td><?php echo $row['amount']; ?></td>
                                                        <td><?php echo $row['consumption_amount']; ?></td>
                                                        <td><?php echo $row['remaining_amount']; ?></td>
                                                        <td>
                                                           <?php
                                                           $percent=round((($row['consumption_amount']*100)/$row['amount']),2);
                                                           echo $percent;
                                                           ?>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>

                                </div><!--End Row-->
                            </div><!--End Row-->
                        </div><!--End Row-->
                    </div><!--End Row-->
                </div><!--End Row-->
            </div><!--End Row-->
            <!-- sale revenue card start -->



        </div><!--End tab pane-->







    </div><!--End tab card block-->

    <!-- [ page content ] end -->
</div><!--End Page Body-->
</div><!--End Page Wrapper-->
</div><!--End Main Body-->
