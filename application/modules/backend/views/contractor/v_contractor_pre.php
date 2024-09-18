
<div class="right_col" style="background-color: #f1f1f1;padding-bottom:20px;">
   
    
    <table id="datatable" class="table table-striped table-bordered table-hover dataTable no-footer">
        <thead>
            <tr>
                <th class="col-lg-2">Full Name</th>
                <th class="col-lg-2">Address</th>
                <th class="col-lg-2">Phone</th>
                 <th class="col-lg-2">Email</th>
                <th class="col-lg-2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($contractors)) {
                foreach ($contractors as $contractor) { ?>
                    <tr>
                        <td>
                            <?php echo $contractor['fullname']; ?>
                        </td>
                        <td>
                            <?php echo $contractor['address']; ?>
                        </td>
                      
                       <td>
                            <?php echo $contractor['phone']; ?>
                        </td>
                        
                        <td>
                            <?php echo $contractor['email']; ?>
                        </td>

                        <td>
                            <a href="<?php echo site_url('contractor/addEditContractor/'.$contractor['contractor_id']); ?>"><button class="btn btn-sm btn-info">Edit</button></a>
                            <button onclick="delete_row('<?php echo site_url('contractor/deleteContractor/'.$contractor['contractor_id']); ?>')" class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
    <?php }
} ?>
        </tbody>
    </table>
</div>