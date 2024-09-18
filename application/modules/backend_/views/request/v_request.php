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
                                             <h3 style="text-align: center;">Request List</h3>
                                            <table class="table">

                                                <thead>

                                                    <tr class="border-bottom-primary">
                                                        <th style="width:1%;">SL</th>
                                                        <th style="width:20%;">Project/Department</th>
                                                        <th style="width:20%;">Task Name</th>
                                                        <th style="width:20%;">Req. for</th>
                                                        <th style="width:50%;">Req. Details</th>
                                                         <th style="width:15%;">User</th>
                                                        <th style="width:5%;">&nbsp;</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="userBody">
                                                    <?php if (count($requests)) {
                                                        $i=0;
                                                        foreach ($requests as $request) {
                                                            $i++;
                                                            ?>
                                                            <tr class="border-bottom-primary">
                                                                
                                                                  <td>
       <?php echo $request['code']; ?>
                                    </td>
                                    <td>
       <?php echo summary($request['project_name'],50); ?>
                                    </td>
                                    <td>
        <?php echo summary($request['task_name'],50); ?>
                                    </td>
                                    <td>
        <?php echo $request['title']; ?>
                                    </td>
                                    <td>
        <?php echo $request['description']; ?>
                                    </td>

                                    <td>
        <?php echo $request['fullname']; ?>
                                    </td>
                                    
                                                                     <div class="dropdown">
                                                               <i class="  fa fa-cogs" data-toggle="dropdown"></i>
                                                               
                                                                 <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                                     <?php if($request['request_type']=='reset'){ ?>
                                                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:approveResetStatus(<?php echo $request['r_id'].','.$request['project_id'].','.$request['dept_id'].','.$request['request_id']; ?>)"><i class="fa fa-eye"></i>Approve</a></li>
                                                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:rejectResetStatus(<?php echo $request['r_id'].','.$request['project_id'].','.$request['dept_id'].','.$request['request_id']; ?>)"><i class="fa fa-trash"></i>Reject</a></li>
                                                                     <?php }else{ ?>
                                                                             <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:approveDeleteFile(<?php echo $request['r_id'].','.$request['project_id'].','.$request['dept_id'].','.$request['request_id']; ?>)"><i class="fa fa-eye"></i>Approve</a></li>
                                                                             <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:rejectDeleteFile(<?php echo $request['r_id'].','.$request['project_id'].','.$request['dept_id'].','.$request['request_id']; ?>)"><i class="fa fa-trash"></i>Reject</a></li>
                                                                     <?php } ?>
                                                                    
                                                                    
                                                                  </ul>
                                                              </div>
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
    $('#userBody').sortable();
</script>
<script type="text/javascript">
    function approveDeleteFile(r_id,project_id,dept_id,file_id){
         var  r=confirm("Are you sure to approve this?");
                    if(r == true){
                        var r_status=validate_password();
                        if(r_status==true){
                           $.ajax({
                                type:"POST",
                                url:"backend/request/approveDeleteFile",
                                data:{r_id:r_id,project_id:project_id,file_id:file_id,dept_id:dept_id},
                                dataType:"json",
                                success: function (data) {
                                        location.reload();

                                }
                            });
                        }
                   }
        
    }
    
    function rejectDeleteFile(r_id,project_id,dept_id,file_id){
        
         var  r=confirm("Are you sure to reject this?");
                    if(r == true){
                        var r_status=validate_password();
                        if(r_status==true){
                           $.ajax({
                                type:"POST",
                                url:"backend/request/rejectDeleteFile",
                                data:{r_id:r_id,project_id:project_id,file_id:file_id,dept_id:dept_id},
                                dataType:"json",
                                success: function (data) {
                                        location.reload();

                                }
                            });
                        }
                   }
        
     }
    
     function approveResetStatus(r_id,project_id,dept_id,status_id){
        
         var  r=confirm("Are you sure to approve this?");
                    if(r == true){
                        var r_status=validate_password();
                        if(r_status==true){
                           $.ajax({
                                type:"POST",
                                url:"backend/request/approveResetStatus",
                                data:{r_id:r_id,project_id:project_id,status_id:status_id,dept_id:dept_id},
                                dataType:"json",
                                success: function (data) {
                                        location.reload();

                                }
                            });
                        }
                   }
        
    }
    
    function rejectResetStatus(r_id,project_id,dept_id,status_id){
        
         var  r=confirm("Are you sure to approve this?");
                    if(r == true){
                        var r_status=validate_password();
                        if(r_status==true){
                           $.ajax({
                                type:"POST",
                                url:"backend/request/rejectResetStatus",
                                data:{r_id:r_id,project_id:project_id,status_id:status_id,dept_id:dept_id},
                                dataType:"json",
                                success: function (data) {
                                        location.reload();

                                }
                            });
                        }
                   }
        
    }
    
    
</script>
