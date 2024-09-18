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
                        <h5>Project Type List</h5>
                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                      </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                        <table id="order-table" class="table table-bordered nowrap">
                            <thead>
                                <tr>
                                   <!-- <th style="width:1%;">SL</th>-->
                                    <th>Project Type</th>
                                    <th style="width:1%;"></th>

                                </tr>
                            </thead>
                            <tbody id="projectType">
                                  <?php if (count($project_types)) {
                                                $i=0;
                                                foreach ($project_types as $type) { 
                                                    $i++;
                                                    ?>
                                                    <tr>
                                                       <!--  <td><?php echo $i; ?></td>-->
                                                        <td>
                                                            <?php echo $type['type']; ?>
                                                        </td>
                                                        
                                                        <td>
                                                            <div class="dropdown">
                                                               <i class="  fa fa-cogs" data-toggle="dropdown"></i>
                                                               
                                                                 <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                                     <!--
                                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('project_type/addEditproject_type/'.$type['type_id']); ?>"><i class="fa fa-edit"></i>Edit</a></li>
                                                                    <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_row('<?php echo site_url('project_type/deleteType/'.$type['type_id']); ?>')" ><i class="fa fa-trash"></i>Delete</a></li>
                                                                    -->
                                                                    <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:editProjectType('<?php echo $type['type_id']; ?>')" ><i class="fa fa-trash"></i>Edit</a></li>
                                                                    <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:deleteProjectType('<?php echo $type['type_id']; ?>')" ><i class="fa fa-trash"></i>Delete</a></li>
                                                                    
                                                                  </ul>
                                                              </div>
                                              
                                                        </td>
                                                    </tr>
                                    <?php }
                                } ?>

                            </tbody>
                          
                        </table>
                    </div>
                    </div>
            </div>
    
  </div>
<script type="text/javascript">
    $('#projectType').sortable();
    
     function editProjectType(type_id = ''){
        var r = confirm("Are you sure?");
        if(r == true){
            var r_status=validate_password();
            if(r_status==true){
                window.location.replace('<?php echo site_url("project_type/addEditproject_type"); ?>'+'/'+type_id);
            }
        }
    }
    
     function deleteProjectType(type_id = ''){
        var r = confirm("Are you sure?");
        if (r == true){
            var r_status=validate_password();
             if (r_status==true){
                $.ajax({
                type:"POST",
                        url:"backend/project_type/deleteProjectType",
                        data:{type_id:type_id},
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
    
</script>