<style type="text/css">
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
</style>
<div class="right_col" style="padding-bottom:20px;">




    <div class="card">
        <div class="card-header">
            <h5>Project List</h5>
            <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>

            <div class="col-sm-2 pull-right">
               <!-- <a href="<?php echo site_url('backend/project/importProject') ?>" >    <button type="button" class="btn btn-primary m-b-0">Import From Excel</button></a>-->
            </div>
        </div>
        <div class="card-block">
            
                <div class="row" style="">
                    <div class="col-md-4">

                    </div>
                    <div style="text-align: center" class="col-md-3">
                         <select class="custom-select" id="order_by" name="equivalent_currency">
                            <option value=""> Select Order By</option>
                            <option <?php if($order_by=='code') echo 'selected'; ?> value="code">Code</option>
                            <option <?php if($order_by=='project_name') echo 'selected'; ?> value="project_name">Name</option>
                            <option <?php if($order_by=='package_no') echo 'selected'; ?> value="package_no">Package No</option>
                            <option <?php if($order_by=='contract_date') echo 'selected'; ?> value="contract_date">Contract Date</option>
                            <option <?php if($order_by=='actual_completion_date') echo 'selected'; ?> value="actual_completion_date">Completion Date</option>
                            
                        </select>                

                    </div>
                </div>     
                <table id="order-table" class="table table-bordered nowrap">
                     
                    <thead>
                        <tr>
                           <!-- <th style="width:1%;">SL</th>-->
                            <th style="width:10%;">Project Code</th>
                            <th style="width:50%;">Project Name</th>

                            <th style="width:10%;">Package No</th>
                            <th style="width:10%;">Contract Date </th>
                            <th style="width:10%;">Actual Completion Date</th>
                            <th style="width:7%;">Progress</th>
                            <th style="width:3%;"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($projects)) {
                            $i=0;
                            foreach ($projects as $project) {
                                $i++;
                                ?>
                                <tr data-index="<?php echo $project['project_id'];  ?>" data-position="<?php echo $project['position'];  ?>">
                                   <!-- <td><?php echo $i; ?></td>-->
                                    <td>
        <?php echo $project['code']; ?>
                                    </td>
                                    <td>
        <?php echo summary($project['project_name'], 40); ?>
                                    </td>

                                    <td>
        <?php echo $project['package_no']; ?>
                                    </td>

                                    <td>
        <?php if (!empty($project['contract_date'])) echo date('d-m-Y', strtotime($project['contract_date'])); ?>
                                    </td>

                                    <td>
        <?php if (!empty($project['actual_completion_date'])) echo date('d-m-Y', strtotime($project['actual_completion_date'])); ?>
                                    </td>

                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: <?php echo $project['progress']; ?>%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php if (!empty($project['progress'])) echo round($project['progress'],2) . '%'; ?></div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <i class="  fa fa-cogs" data-toggle="dropdown"></i>

                                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('project/viewProject/' . $project['project_id']); ?>"><i class="fa fa-eye"></i>Go Inside</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:cloneProject('<?php echo $project['project_id']; ?>')" ><i class="fa fa-eye"></i>Clone</a></li>
                                              <!--  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('project/addEditProject/' . $project['project_id']); ?>"><i class="fa fa-edit"></i>Edit</a></li>-->
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:editProject('<?php echo $project['project_id']; ?>')"><i class="fa fa-edit"></i>Edit</a></li>
                                              <!-- <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_row('<?php echo site_url('project/deleteProject/' . $project['project_id']); ?>')" ><i class="fa fa-trash"></i>Delete</a></li>-->
                                                <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:deleteProject('<?php echo $project['project_id']; ?>')" ><i class="fa fa-trash"></i>Delete</a></li>


                                            </ul>
                                        </div>
                                        <!--
                                        <a href="<?php echo site_url('project_owner/addEditProjectOwner/' . $owner['project_owner_id']); ?>"><button class="btn btn-sm btn-info">Edit</button></a>
                                         <button onclick="delete_row('<?php echo site_url('project_owner/deleteProjectOwner/' . $owner['project_owner_id']); ?>')" class="btn btn-sm btn-danger">Delete</button>
                                        -->

                                    </td>
                                    <input type="hidden" value="<?php echo $project['project_id']; ?>" id="item" name="item">
                                </tr>
                            <?php }
                        }
                        ?>

                    </tbody>

                </table>
        
        </div>
    </div>

</div>
<script type="text/javascript">
    //$("#order-table").orderable();
//    $("#order-table").orderable({
//        onLoad: function () { console.info('I loaded!') },
//        onInit: function () { console.info('I did all my thingies!') },
//        onOrderStart: function (element) { console.info('I\'m reordering! Selected unit: ', element) },
//        onOrderCancel: function (element) { console.info('I\'m not reordering anymore, I got cancelled! Selected unit: ', element) },
//        onOrderFinish: function (element) { console.info('I\'ve finished reordering! Selected unit: ', element) },
//        onOrderReorder: function (element) { console.info('I\'ve finished reordering and I definitely changed order! Changed unit: ', element) },
//    });
 //   $('tbody').sortable();
 var $sortable=$('tbody');
// $sortable.sortable({
//      stop: function(event,u1){
//          var parameters= $sortable.sortable('toArray');
//          $.ajax({
//                type:"POST",
//                url:"backend/project/updateProjectPosition",
//                data:{'value':parameters},
//                dataType: "text",
//                success: function (data) {  
//                   alert(data);
//                }
//           })
//          
//      }
// });
    
//  $sortable.sortable({
//      stop: function ( event, ui ) {
//          var parameters = $sortable.sortable("toArray");
//          $.post("backend/project/updateProjectPosition",{value:parameters},function(result){
//              alert(result);
//          });
//      }
//  });  
  
  $('tbody').sortable({
      update: function ( event, ui ){
            console.log($(this));
            $(this).children().each(function(index){
                if($(this).attr('data-position')!=(index+1)){
                    $(this).attr('data-position',(index+1)).addClass('updated');
                }
                saveNewPosition();
                
            });
      }
  });  
  
  function saveNewPosition(){
      var positions=[];
      $('.updated').each(function(){
          positions.push([$(this).attr('data-index'),$(this).attr('data-position')]);
        //  alert($(this).attr('data-index'));
          $(this).removeClass('updated');
      });
 //    alert(positions);
     $.ajax({
                type:"POST",
                url:"backend/project/updateProjectPosition",
                data:{'positions':positions,'update':1},
                dataType: "text",
                success: function (data) {  
                  // alert(data);
                }
     })
      
  }
    
</script>
<script type="text/javascript">
    $('#order_by').change(function(){
        var order_by=$('#order_by').val();
        if(order_by!=''){
            window.location.replace('<?php echo site_url("project/index"); ?>'+'/'+order_by);
        }else{
            window.location.replace('<?php echo site_url("project/index"); ?>');
        }    
    });
    async function editProject(project_id = ''){
        var r = confirm("Are you sure?");
        if (r == true){
            var r_status = await validate_password_b();
            if(r_status==true){
                window.location.replace('<?php echo site_url("project/addEditProject"); ?>'+'/'+project_id);
            }
        }
    }
    
    function deleteProject(project_id = ''){
        var r = confirm("Are you sure?");
        if (r == true){
            var r_status=validate_password();
             if (r_status==true){
                $.ajax({
                type:"POST",
                        url:"backend/project/deleteProject",
                        data:{project_id:project_id},
                        dataType: "json",
                        success: function (data) {
                            if(data.status=='success'){
                                alert('Successfully Deleted');
                            }else{
                                alert('Not Deleted');
                            }       
                            location.reload();
       
                        }
                })
            }
        }

    }

    function cloneProject(project_id = ''){
        var r = confirm("Are you sure?");
        if (r == true){
            var r_status=validate_password();
            if (r_status==true){
                $.ajax({
                        type:"POST",
                        url:"backend/project/cloneProject",
                        data:{project_id:project_id},
                        dataType: "text",
                        success: function (data) {
                            location.reload();
                        }
                })
            }
        }

    }



</script>