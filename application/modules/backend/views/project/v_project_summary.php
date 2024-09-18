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
.tab-icon a {
    font-size: 14px !important;
    padding: 10px 50px !important;
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
                            
                            <form action="<?php echo site_url('pms_report/projectSummaryReport')?>" method="post">
                             <div class="row">  
                                 <div style="margin-top: 15px;" class="col-md-2">
                                 </div>
                                <div style="margin-top: 15px;" class="col-md-4">
                                    <label>Project Name: </label>
                                    <select required class="form-control select2" placeholder="Select project" id="project_id" name="project_id">
                                       <option class="form-control" value="">Select Project</option>    
                                  <?php foreach ($projects as $project) { ?>
                                       <option class="form-control" <?php if ($project['project_id'] == $project_id) echo 'selected="selected"'; ?> value="<?php echo $project['project_id'] ?>"><?php echo $project['project_name']."(".$project['project_id'].")"; ?></option>
                                   <?php } ?>                                                                                                      
                                       </select>
                                    
                                   </div>
                                <div style="margin-top: 35px;" class="col-md-4">
                                    <input id="form-submit" style="padding: 10px 50px;" type="submit" class="btn btn-primary" value="SEARCH"/>
                                     <a style="padding: 6px 50px;"  href="javascript:" class="btn btn-success" onclick="javascript:printDiv('printablediv')">PRINT</a>                              
                                </div>
                                 <div style="margin-top: 15px;" class="col-md-2">
                                 </div>
                            </div>  
                            </form>

                            <div class="row" id="printablediv">                                 
                                <div class="col-lg-12 col-xl-12" style="align:center">                                   
                                   <ul class="nav nav-tabs">
                                        
                                    </ul>

                                     <div class="tab-content" style="padding:20px">
                                        <div id="summary" class="tab-pane fade  in active show">
                                            <h3 style="text-align: center;">Project Summary</h3>
                                            <p style="text-align: center;">No of Project : <?php echo $project_summary[0]['package_no']; ?></p>
                                            <p style="text-align: center;">Name of Project : <?php echo $project_summary[0]['project_name']; ?></p>
                                            <p style="text-align: center;">Project Implemented By: Green Peak Holdings Ltd.</p>
                                            <p style="text-align: center;">Address: <?php echo $project_summary[0]['district']; ?></p>
                                            <p style="text-align: center;">Location of Project: <?php echo $project_summary[0]['site_location']; ?></p>
                                            <table style="width:100%" class="table">
                                                <tr>
                                                    <th class="table-primary">SL No</th>
                                                    <th class="table-primary">Project Name</th>
                                                    <th class="table-primary">Start Date</th>
                                                    <th class="table-primary">Completion Date</th>
                                                    <th class="table-primary" style="text-align:right">Budgeting Cost</th>
                                                    <th class="table-primary" style="text-align:right">Work Done</th>
                                                    <th class="table-primary" style="text-align:right">Remaining</th>
                                                    <th class="table-primary" style="text-align:right">% of Work done</th>
                                                    
                                                </tr>
                                                
                                                <?php 
                                                foreach ($project_summary as $sl => $row) { ?>
                                                    <tr>
                                                        <td><?php echo ($sl + 1); ?></td>
                                                        <td><?php echo $row['project_name']; ?></td>
                                                        <td><?php echo $row['execution_start_date']; ?></td>
                                                        <td><?php echo $row['actual_completion_date']; ?></td>
                                                        <td style="text-align:right"><?php echo number_format($row['budgetingCost'],2); ?></td>
                                                        <td style="text-align:right"><?php echo number_format($row['Workdone'],2); ?></td>
                                                        <td style="text-align:right"><?php echo number_format($row['budgetingCost'] - $row['Workdone'],2); ?></td>
                                                        <td style="text-align:right">
                                                           <?php
                                                           $percent=number_format((($row['Workdone']*100)/$row['budgetingCost']),2);
                                                           echo $percent;
                                                           ?>
                                                        </td>
                                                        
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
<script type="text/javascript">                 
            function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
                "<html><head><title></title></head><body>" +
                divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;
    }
  
 </script>