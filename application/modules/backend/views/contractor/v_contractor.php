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
                        <h5>Contractor</h5>
                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                      </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                        <table id="order-table" class="table table-bordered nowrap">
                            <thead>
                                <tr>
                                  <!--  <th style="width:1%;">SL</th>-->
                                    <th>Full Name</th>
                                    <th>Address </th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th style="width:1%;"></th>

                                </tr>
                            </thead>
                            <tbody id="contractorBody">
                                  <?php if (count($contractors)) {
                                                $i=0;
                                                foreach ($contractors as $contractor) { 
                                                    $i++;
                                                    ?>
                                                    <tr>
                                                      <!--  <td><?php echo $i; ?></td>-->
                                                        <td>
                                                            <?php echo summary($contractor['fullname'],40); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo summary($contractor['address'],40); ?>
                                                        </td>

                                                       <td>
                                                            <?php echo $contractor['phone']; ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $contractor['email']; ?>
                                                        </td>

                                                        <td>
                                                            <div class="dropdown">
                                                               <i class="  fa fa-cogs" data-toggle="dropdown"></i>
                                                               
                                                                 <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                                    <!-- 
                                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('contractor/addEditContractor/'.$contractor['contractor_id']); ?>"><i class="fa fa-edit"></i>Edit</a></li>
                                                                    <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_row('<?php echo site_url('contractor/deleteContractor/'.$contractor['contractor_id']); ?>')" ><i class="fa fa-trash"></i>Delete</a></li>
                                                                    -->
                                                                    <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:editProjectContractor('<?php echo $contractor['contractor_id']; ?>')" ><i class="fa fa-trash"></i>Edit</a></li>
                                                                    <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:deleteProjectContractor('<?php echo $contractor['contractor_id']; ?>')" ><i class="fa fa-trash"></i>Delete</a></li>
                                                                    
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
    $('#contractorBody').sortable();
    
     async function editProjectContractor(contractor_id = ''){
        
        var r = confirm("Are you sure?");
        if (r == true){
             var r_status = await validate_password_b();
            if(r_status==true){
                window.location.replace('<?php echo site_url("contractor/addEditContractor"); ?>'+'/'+contractor_id);
            }
        }
    }
    
     async function deleteProjectContractor(contractor_id = ''){
        var r = confirm("Are you sure?");
        if (r == true){
             var r_status = await validate_password_b();
             if (r_status==true){
                $.ajax({
                type:"POST",
                        url:"backend/contractor/deleteProjectContractor",
                        data:{contractor_id:contractor_id},
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