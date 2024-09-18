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
</style>
<div class="right_col" style="padding-bottom:20px;">
   
    
   
    
                  <div class="card">
                        <div class="card-header">
                        <h5>Project Owner</h5>
                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                   </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                        <table id="order-table" class="table table-bordered nowrap">
                            <thead>
                                <tr>
                                   
                                    <th>Full Name</th>
                                    <th>Address </th>
                                    <th>Phone</th>
                                    <th style="width:1%;"></th>

                                </tr>
                            </thead>
                            <tbody id="ownerBody">
                                  <?php if (count($owners)) {
                                                $i=0;
                                                foreach ($owners as $owner) { 
                                                    $i++;
                                                    ?>
                                                    <tr>
                                                        
                                                        <td>
                                                            <?php echo summary($owner['fullname'],40); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo summary($owner['address'],40); ?>
                                                        </td>

                                                       <td>
                                                            <?php echo $owner['phone']; ?>
                                                        </td>


                                                        <td>
                                                            <div class="dropdown">
                                                               <i class="  fa fa-cogs" data-toggle="dropdown"></i>
                                                               
                                                                 <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                                     <!--
                                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('project_owner/addEditProjectOwner/'.$owner['project_owner_id']); ?>"><i class="fa fa-edit"></i>Edit</a></li>
                                                                    <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_row('<?php echo site_url('project_owner/deleteProjectOwner/'.$owner['project_owner_id']); ?>')" ><i class="fa fa-trash"></i>Delete</a></li>
                                                                    -->
                                                                    <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:editProjectOwner('<?php echo $owner['project_owner_id'];?>')" ><i class="fa fa-trash"></i>Edit</a></li>
                                                                    <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:deleteProjectOwner('<?php echo $owner['project_owner_id'];?>')" ><i class="fa fa-trash"></i>Delete</a></li>
                                                                    
                                                                  </ul>
                                                              </div>
                                                            <!--
                                                            <a href="<?php echo site_url('project_owner/addEditProjectOwner/'.$owner['project_owner_id']); ?>"><button class="btn btn-sm btn-info">Edit</button></a>
                                                             <button onclick="delete_row('<?php echo site_url('project_owner/deleteProjectOwner/'.$owner['project_owner_id']); ?>')" class="btn btn-sm btn-danger">Delete</button>
                                                            -->

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
    $('#ownerBody').sortable();
    
    async function editProjectOwner(project_owner_id = ''){
        
        var r = confirm("Are you sure?");
        if (r == true){
           // var r_status=validate_password();
           var r_status = await validate_password_b();
            if(r_status==true){
                window.location.replace('<?php echo site_url("project_owner/addEditProjectOwner"); ?>'+'/'+project_owner_id);
            }
        }
    }
    
     async function deleteProjectOwner(project_owner_id = ''){
        var r = confirm("Are you sure?");
        if (r == true){
            //var r_status=validate_password();
            var r_status = await validate_password_b();
             if (r_status==true){
                $.ajax({
                type:"POST",
                        url:"backend/project_owner/deleteProjectOwner",
                        data:{project_owner_id:project_owner_id},
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