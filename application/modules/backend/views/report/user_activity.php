<div class="box">
    <!-- form start -->
    <div class="box-body">
        <div class="row">

            <div class="col-sm-6" style="margin:0 auto;">
                <form method="post">
                    <div class="form-group col-sm-6" id="classDiv" style="float:left;margin-left: 100px;">
                        <label>Date </label>
                        <input type="text" name="start_date" class="form-control datepicker" value="<?php echo date('d.m.Y', strtotime($data['start_date'])); ?>" placeholder="Enter Start Date"> To
                        <input type="text" name="end_date" class="form-control datepicker" value="<?php echo date('d.m.Y', strtotime($data['end_date'])); ?>" placeholder="Enter End Date">
                    </div>


                    <div class="col-sm-3" style="float:right;">
                        <button id="get_classreport" type="submit" class="btn btn-success" style="margin-top:23px;">Search</button><br>
                        <button class="btn btn-danger" style="margin-top:23px;" onclick="javascript:printDiv('printablediv')"><span class="fa fa-print"></span> Print</button>
                    </div>
                </form>
            </div>

        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->
<div class="box">
    <div id="printablediv">
        <div style="text-align: center;">

            <h3 class="box-title text-navy" style="text-align: center;width:100%"><i class="fa fa-clipboard"></i> User Activity Report</h3> 
            <b> Date : </b><?php echo date('d-m-Y', strtotime($data['start_date'])); ?> - <?php echo date('d-m-Y', strtotime($data['end_date'])); ?> <br>

        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">

                    <table class="table table-striped table-bordered table-hover no-footer">
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Section</th>
                            <th>Activity</th>
                        </tr>
                        <?php foreach ($rows as $row) { ?>
                            <tr>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo!empty($row['date']) ? date('jS F Y h:i:s A', strtotime($row['date'])) : '-'; ?></td>
                                <td><?php echo $row['section']; ?></td>
                                <td><?php echo $row['activity']; ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="3" style="text-align:right;">Total</td>
                            <td><?php echo count($rows); ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div><!-- row -->
        </div><!-- Body -->
    </div>
</div>
<script type="text/javascript">
    $('.datepicker').datepicker();
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

