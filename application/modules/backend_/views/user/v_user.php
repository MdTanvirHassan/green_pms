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
                        <h5>User List</h5>
                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                      </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                        <table id="order-table" class="table table-bordered nowrap">
                            <thead>
                                <tr>
                                
                                    <th style="width: 10%;">Image</th>
                                    <th style="width: 10%;">Username</th>
                                    <th style="width: 15%;">Full Name </th>
                                    <th style="width: 24%;">Address</th>
                                    <th style="width: 10%;">Phone</th>
                                    <th style="width: 1%;"> </th>

                                </tr>
                            </thead>
                            <tbody id="userTable">
                                  <?php if (count($users)) {
                                                $i=0;
                                                foreach($users as $user) { 
                                                    $i++;
                                                    ?>
                                                    <tr>
                                                    
                                                        <td>
                                                            <img src="<?php echo !empty($user['image']) ? site_url('images/users').'/'.$user['image'] :site_url().'/images/user.png'; ?>" class="img-responsive img-circle" style="width:50px;">
                                                        </td>
                                                           <td>
                                                            <?php echo $user['username']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user['fullname']; ?>
                                                        </td>


                                                        <td>
                                                            <?php echo $user['address']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user['phone']; ?>
                                                        </td>
                                                     

                                                        <td>
                                                            <div class="dropdown">
                                                               <i class="  fa fa-cogs" data-toggle="dropdown"></i>
                                                               
                                                                 <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                                    <!--<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('user/addEditUser/'.$user['user_id']); ?>"><i class="fa fa-edit"></i>Edit</a></li>-->
                                                                     <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:editUser('<?php echo $user['user_id']; ?>')" ><i class="fa fa-trash"></i>Edit</a></li>
                                                                  <!--  <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_row('<?php echo site_url('user/deleteUser/'.$user['user_id']); ?>')" ><i class="fa fa-trash"></i>Delete</a></li>-->
                                                                     <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:deleteUser('<?php echo $user['user_id']; ?>')" ><i class="fa fa-trash"></i>Delete</a></li>
                                                                    
                                                                    
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
    $('#userTable').sortable();
    
    function editUser(user_id = ''){
        var r = confirm("Are you sure?");
        if (r == true){
            var r_status=validate_password();
            if(r_status==true){
                window.location.replace('<?php echo site_url("user/addEditUser"); ?>'+'/'+user_id);
            }
        }
    }
    
     function deleteUser(user_id = ''){
        var r = confirm("Are you sure?");
        
        if (r == true){
            var r_status=validate_password();
             if (r_status==true){
                $.ajax({
                type:"POST",
                        url:"backend/user/deleteUser",
                        data:{user_id:user_id},
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