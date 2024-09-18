


<?php foreach ($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach ($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<!-- page content -->
<style>
    .page-title .title_center{
        padding-top: 0px;
    }
</style>
<div class="right_col" role="main" >
    <div class="">
        <div class="page-title">
            <div class="title_center">
<!--                <h3><?php echo $title; ?>
                    <?php if (isset($this->l_no) && !empty($this->l_no)) echo '- Loan ID-' . $this->l_no[0]['l_no']; ?>
                </h3>-->

            </div>


        </div>

        <div class="row">
            <div class="x_panel m_panel">
                <?php if ($this->sub_menu != 'bankinfo') { ?>
                    <?php if (isset($this->l_no) && !empty($this->l_no)) { ?>

                        <a class="btn btn-info pull-right" style="cursor: pointer;position: absolute;right: 12px;z-index: 999999" href="<?php echo site_url('backend/report/index/' . $this->menu . '/loan_used/' . $this->l_no[0]['l_no']); ?>" target="_blank">Report</a>
                    <?php } else { ?>

                        <a class="btn btn-info pull-right" style="cursor: pointer;position: absolute;right: 12px;z-index: 999999" href="<?php echo site_url('backend/report/index/' . $this->menu . '/' . $this->sub_menu); ?>" target="_blank">Report</a>
                    <?php } ?>
                <?php } ?>
                <div class="clearfix"></div>
                <?php echo $output; ?>

            </div>

        </div>


    </div>
</div>
<script>
    $('#field-bg_duration').blur(function () {
        var d = $('#field-t_date').val().split('/');
        var date = new Date(d[2],(d[1]-1),d[0]);
        date.setDate(date.getDate() + Number($(this).val()));
        var dateMsg = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
        $('#field-bg_expire').val(dateMsg)
    })
    $('#field-t_duration').blur(function () {
        var d = $('#field-t_date').val().split('/');
        var date = new Date(d[2],(d[1]-1),d[0]);
        date.setDate(date.getDate() + Number($(this).val()));
        var dateMsg = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
        $('#field-t_last_submission').val(dateMsg)
    })
    
    $('#field-s_duration').blur(function () {
        var d = $('#field-s_date').val().split('/');
        var date = new Date(d[2],(d[1]-1),d[0]);
        date.setDate(date.getDate() + Number($(this).val()));
        var dateMsg = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
        $('#field-s_expire').val(dateMsg)
    })
    $('#field-ag_duration').blur(function () {
        var d = $('#field-ag_date').val().split('/');
        var date = new Date(d[2],(d[1]-1),d[0]);
        date.setDate(date.getDate() + Number($(this).val()));
        var dateMsg = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
        $('#field-ag_completion_date').val(dateMsg)
    })
    $('#field-w_duration').blur(function () {
        var d = $('#field-w_date').val().split('/');
        var date = new Date(d[2],(d[1]-1),d[0]);
        date.setDate(date.getDate() + Number($(this).val()));
        var dateMsg = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
        $('#field-w_competion_date').val(dateMsg)
    })
    $('#field-noa_id').change(function () {
        $.ajax({
            type: "POST",
            url: "backend/ongoing/get_noa_value",
            data: 'id=' + $(this).val(),
            dataType: "json",
            success: function (data) {
                if (data.msg == 'success') {
                    var module = '<?php echo $this->sub_menu ?>';
                    if (module == 'security_details') {
                        $('#field-s_value').val(data.value);
                    }
                    if (module == 'agreement_details') {
                        $('#field-ag_value').val(data.value);
                    }
                    if (module == 'work_order') {
                        $('#field-w_value').val(data.value);
                    }
                    if (module == 'assigned_bank') {
                        $('#field-ab_value').val(data.value);
                    }
                    if (module == 'loan_details') {
                        $('#field-l_value').val(data.value);
                    }
                }
            }
        })
    })



$('#field-bank_id').change(function () {
        $.ajax({
            type: "POST",
            url: "backend/ongoing/get_ab_account",
            data: 'id=' + $(this).val(),
            dataType: "json",
            success: function (data) {
                if (data.msg == 'success') {
                    $('#field-ab_ac_no').val(data.value);
                    }
            }
        })
    })
$('#field-t_id').change(function () {
        $.ajax({
            type: "POST",
            url: "backend/project/get_jv_name",
            data: 'id=' + $(this).val(),
            dataType: "json",
            success: function (data) {
                 $('#jv_name').remove();
                if (data.msg == 'success') {
                   
                    $('#t_id_input_box').append('<span id="jv_name">'+data.value+'</span>');
                    }
            }
        })
    })
</script>

<!-- /page content -->



