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
            <h5>Requests</h5>
            <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
        </div>
        <div class="card-block">
            <div class="dt-responsive table-responsive">
                <table id="order-table" class="table table-bordered nowrap">
                    <thead>
                        <tr>
                            <th style="width:1%;">SL</th>
                            <th style="width:20%;">Project/Department</th>
                            <th style="width:20%;">Task Name</th>
                            <th style="width:20%;">Req. for</th>
                            <th style="width:50%;">Req. Details</th>
                            <th style="width:15%;">User</th>
                            <th style="width:5%;">&nbsp;</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($requests)) {
                            foreach ($requests as $request) {
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
                                    

                                    <td>
                                        <div class="dropdown">
                                            <i class="  fa fa-cogs" data-toggle="dropdown"></i>

                                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
        <?php if ($request['request_type'] == 'incomplete') { ?>
                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:approveIncompletionRequest(<?php echo $request['project_id'] . ',' . $request['r_id']; ?>)"><i class="fa fa-eye"></i>Approve</a></li>
                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:rejectIncompletionRequest(<?php echo $request['project_id'] . ',' . $request['r_id']; ?>)"><i class="fa fa-trash"></i>Reject</a></li>
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
        </div>
    </div>

</div>
<script type="text/javascript">
    function approveIncompletionRequest(project_id, r_id) {
        var r = confirm("Are you sure to approve this?");
        if (r == true) {
            var r_status = validate_password();
            if (r_status == true) {
                $.ajax({
                    type: "POST",
                    url: "backend/dashboard/approveIncompletionRequest",
                    data: {project_id: project_id, r_id: r_id},
                    dataType: "json",
                    success: function (data) {
                        location.reload();

                    }
                });
            }
        }

    }


    function rejectIncompletionRequest(project_id, r_id) {
        var r = confirm("Are you sure to reject this?");
        if (r == true) {
            var r_status = validate_password();
            if (r_status == true) {
                $.ajax({
                    type: "POST",
                    url: "backend/dashboard/rejectIncompletionRequest",
                    data: {project_id: project_id, r_id: r_id},
                    dataType: "json",
                    success: function (data) {
                        location.reload();

                    }
                });
            }
        }

    }

</script>
