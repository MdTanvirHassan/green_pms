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
   
</style>

<div class="tab-content card-block">
                <div class="tab-pane active" id="home7" role="tabpanel">
                        <div class="card">


                                <div id="project_lists" class="card-block" >
                                         <div class="shadow table-responsive" style="border:1px solid #BFBFBF;padding:10px;">
                                             <h3 style="text-align: center;">Critical Task</h3>
                                            <table id="" class="table">

                                                <thead>

                                                    <tr class="border-bottom-primary">
                                                        <th style="width:5%;">Project Code</th>
                                                        <th style="width:10%;">Project Name</th>
                                                        <th style="width:20%;">Department</th>
                                                        <th style="width:20%;">Critical Task Tree </th>
                                                        <th style="width:15%;">Pending Status</th>
                                                        <th style="width:5%;">Risk Level</th>
                                                        

                                                    </tr>
                                                </thead>
                                                <tbody id="ongoingProjectTable">
                                                    <?php if (count($projects)) {
                                                        foreach ($projects as $project) {
                                                            ?>
                                                            <tr class="border-bottom-primary">
                                                                <td>
                                                                    <?php echo $project['code']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo summary($project['project_name'], 50); ?>
                                                                </td>


                                                                <td>
                                                                       <?php echo $project['dept_info']; ?>  
                                                                </td>

                                                                <td>
                                                                    
                                                                </td>
                                                                 <td>
                                                                    
                                                                </td>
                                                                 <td>
                                                                    High
                                                                </td>
                                                               
                                                            </tr>
                                                        <?php }
                                                    }
                                                    ?>

                                                </tbody>

                                            </table>
                                        </div>
                                </div><!--End Ongoing Project Lists-->

                              

                        </div><!--End Parent Card block-->


              </div><!--End Ongoing Project Tab-->
</div>

<script type="text/javascript">
$('#ongoingProjectTable').sortable();
</script>




 