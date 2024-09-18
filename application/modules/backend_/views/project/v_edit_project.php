<style type="text/css">
    .btn {
        border-radius: 2px;
        text-transform: capitalize;
        font-size: 15px;
        padding: 3px 9px;
        cursor: pointer;
    }

    .cutom-btn{
        border-radius: 2px;
        text-transform: capitalize;
        font-size: 15px;
        padding: 6px 9px !important;
        cursor: pointer;
    }

    select.form-control,select.form-control:hover {
        font-size: 14px;
        border-radius: 2px;
        border: 1px solid #ccc;
    }
    .custom-select,.datepicker{
        cursor: pointer;
    }
</style>

<div class="card">
    <div class="card-header">
        <h5>Project</h5>
        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
    </div>
    <div class="card-block">
        <form id="main" onsubmit="javascript: return validate_password()" method="post" aenctype="multipart/form-data" action="<?php echo site_url('project/addEditProject/' . $project_info[0]['project_id']); ?>" >
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Project Name</label>
                <div class="col-sm-10">
                    <input  type="text" required value="<?php echo!empty($project_info[0]['project_name']) ? $project_info[0]['project_name'] : ''; ?>" class="form-control" name="project_name" id="fullname" placeholder="Full Name">
                    <span class="messages"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2">Package No.</label>
                <div class="col-sm-4">

                    <input  type="text" required value="<?php echo!empty($project_info[0]['package_no']) ? $project_info[0]['package_no'] : ''; ?>" class="form-control" id="package_no" name="package_no" placeholder="Package No">
                    <span class="messages"></span>
                </div>
                <label class="col-form-labe col-sm-2">Code</label>
                <div class="col-sm-4">

                    <input  type="text" required value="<?php echo!empty($project_info[0]['code']) ? $project_info[0]['code'] : ''; ?>" class="form-control" id="code" name="code" placeholder="Code">
                    <span class="messages"></span>
                </div>


            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2">Type</label>
                <div class="col-sm-4">

                    <select name="type" id="type" class="js-example-data-array form-control col-sm-12">
                        <option value="">Select Project type</option>
                        <?php foreach ($project_types as $type) { ?>
                            <option <?php if ($project_info[0]['type'] == $type['type_id']) echo 'selected'; ?> value="<?php echo $type['type_id']; ?>"><?php echo $type['type']; ?></option>
                        <?php } ?>
                    </select>
                    <span class="messages"></span>
                </div>
                <label class="col-sm-2 col-form-label">Country</label>
                <div class="col-sm-4">
                    <select name="country" id="country" class="js-example-data-array form-control col-sm-12" onchange="change_country()">
                        <option value="">Select Country</option>
                        <?php foreach ($countries as $country) { ?>
                            <option <?php if ($project_info[0]['country'] == $country) echo 'selected'; ?>><?php echo $country; ?></option>
                        <?php } ?>
                    </select>
                </div>



            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Division</label>
                <div class="col-sm-4">
                    <select name="division" id="division" onchange="get_district_list()" class="js-example-data-array form-control  col-sm-12">
                        <option value="">Select</option>
                        <?php foreach ($divisions as $division) { ?>
                            <option <?php if ($project_info[0]['division'] == str_replace('.json', '', $division)) echo 'selected'; ?>><?php echo str_replace('.json', '', $division); ?></option>
                        <?php } ?>
                    </select>
                </div>

                <label class="col-sm-2 col-form-label">District</label>
                <div class="col-sm-4">
                    <select name="district" id="district" class="js-example-data-array form-control  col-sm-12" onchange="get_upazila_list()">
                        <option value="">Select</option>
                        <?php foreach ($cities['cities'] as $city) { ?>
                            <option <?php if ($project_info[0]['district'] == $city['asciiname']) echo 'selected'; ?>><?php echo $city['asciiname']; ?></option>
                        <?php } ?>
                    </select>
                </div>




            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Police Station/Upazila</label>
                <div class="col-sm-4">
                    <select name="upazila" id="upazila" class="js-example-data-array form-control  col-sm-12">
                        <option value="">Select</option>
                        <?php
                        foreach ($upazilas as $up) {
                            ?>
                            <option <?php if ($project_info[0]['upazila'] == ($up['children'][0]['text'] . '-' . $up['children'][1]['text'])) echo 'selected'; ?>><?php echo $up['children'][0]['text'] . '-' . $up['children'][1]['text']; ?></option>
                        <?php } ?>
                    </select>
                    <!--<input  type="text" value="<?php //echo!empty($project_info[0]['upazila']) ? $project_info[0]['upazila'] : '';       ?>" required class="form-control" id="upazila" name="upazila" placeholder="Police Station/Upazila">-->
                    <span class="messages"></span>
                </div>

                <label class="col-sm-2 col-form-label">Site Location</label>
                <div class="col-sm-4">
                    <input  type="text" value="<?php echo!empty($project_info[0]['site_location']) ? $project_info[0]['site_location'] : ''; ?>" required class="form-control" id="site_location" name="site_location" placeholder="Site Location">
                    <span class="messages"></span>
                </div>


            </div>  

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Project Owner</label>
                <div class="col-sm-4">
                    <select name="project_owner" class="js-example-data-array form-control  col-sm-12">

                        <option value="">Select Project Owner</option>
                        <?php if (!empty($project_owners)) { ?>
                            <?php foreach ($project_owners as $owner) { ?>
                                <option <?php if ($project_info[0]['project_owner'] == $owner['project_owner_id']) echo 'selected'; ?> value="<?php echo $owner['project_owner_id'] ?>"><?php echo $owner['fullname'] ?></option>
                            <?php } ?>
                        <?php } ?>       

                    </select>

                </div>
                <label class="col-sm-2 col-form-label">Epc Contractor</label>
                <div class="col-sm-4">
                    <select name="contractor" class="js-example-data-array form-control  col-sm-12">
                        <option value="">Select Contractor</option>
                        <?php if (!empty($contractors)) { ?>
                            <?php foreach ($contractors as $contractor) { ?>
                                <option <?php if ($project_info[0]['contractor'] == $contractor['contractor_id']) echo 'selected'; ?> value="<?php echo $contractor['contractor_id'] ?>"><?php echo $contractor['fullname'] ?></option>
                            <?php } ?>
                        <?php } ?>       

                    </select>
                </div>




            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contract Date</label>
                <div class="col-sm-4">
                    <input  type="text" value="<?php echo!empty($project_info[0]['contract_date']) ? date('d/m/Y', strtotime($project_info[0]['contract_date'])) : ''; ?>" required class="form-control fill datepicker" id="contract_date" name="contract_date" placeholder="DD/MM/YYYY">
                    <span class="messages"></span>
                </div>
                <label class="col-sm-2 col-form-label">Contract Period</label>
                <div class="col-sm-4">
                    <input  type="text" value="<?php echo!empty($project_info[0]['contract_period']) ? $project_info[0]['contract_period'] : ''; ?>" required class="form-control" id="contract_period" name="contract_period" placeholder="Contract Period">
                    <span class="messages"></span>
                </div>

            </div>

            <div class="form-group row">

                <label class="col-sm-2 col-form-label">Execution Period</label>
                <div class="col-sm-4">
                    <input  type="text" value="<?php echo!empty($project_info[0]['execution_period']) ? $project_info[0]['execution_period'] : ''; ?>" required class="form-control" id="execution_period" name="execution_period" placeholder="Execution Period">
                    <span class="messages"></span>
                </div>
                <label class="col-sm-2 col-form-label">Execution Start</label>
                <div class="col-sm-4">
                    <input  type="text" value="<?php echo!empty($project_info[0]['execution_start_date']) ? date('d/m/Y', strtotime($project_info[0]['execution_start_date'])) : ''; ?>" required class="form-control fill datepicker" id="execution_start_date" name="execution_start_date" placeholder="DD/MM/YYYY">
                    <span class="messages"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Completion date as per Contract</label>
                <div class="col-sm-4">
                    <input  type="hidden"  value="<?php echo!empty($project_info[0]['scheduled_completion_date']) ? date('d/m/Y', strtotime($project_info[0]['scheduled_completion_date'])) : ''; ?>" required class="form-control fill datepicker" id="scheduled_completion_date1" name="scheduled_completion_date" placeholder="DD/MM/YYYY">
                    <input style="opacity:1" type="text" disabled value="<?php echo!empty($project_info[0]['scheduled_completion_date']) ? date('d/m/Y', strtotime($project_info[0]['scheduled_completion_date'])) : ''; ?>" required class="form-control fill datepicker" id="scheduled_completion_date" name="scheduled_completion_date1" placeholder="DD/MM/YYYY">
                    <span class="messages"></span>
                </div>
                <label class="col-sm-2 col-form-label">Time Extension</label>
                <div class="col-sm-4 ">

                    <input  type="text" value="<?php echo!empty($project_info[0]['time_extension']) ? $project_info[0]['time_extension'] : ''; ?>" class="form-control fill" id="time_extension" name="time_extension" placeholder="Time Extension">
                    
                </div>
            </div>

            <div class="form-group row">

                <label class="col-sm-2 col-form-label">Forecasted date of completion</label>
                <div class="col-sm-4">
                    <input  type="hidden"  value="<?php echo!empty($project_info[0]['handover_date']) ? date('d/m/Y', strtotime($project_info[0]['handover_date'])) : ''; ?>" required class="form-control fill datepicker" id="handover_date1" name="handover_date" placeholder="DD/MM/YYYY">
                    <input style="opacity:1"  type="text" disabled value="<?php echo!empty($project_info[0]['handover_date']) ? date('d/m/Y', strtotime($project_info[0]['handover_date'])) : ''; ?>" required class="form-control fill datepicker" id="handover_date" name="handover_date1" placeholder="DD/MM/YYYY">
                    <span class="messages"></span>
                </div>
                <label class="col-sm-2 col-form-label">Actual Completion Date</label>
                <div class="col-sm-4">
                    <input  type="text" value="<?php echo!empty($project_info[0]['actual_completion_date']) ? date('d/m/Y', strtotime($project_info[0]['actual_completion_date'])) : ''; ?>" required class="form-control fill datepicker" id="actual_completion_date" name="actual_completion_date" placeholder="DD/MM/YYYY">
                    <span class="messages"></span>
                </div>


            </div> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Equivalent Currency</label>
                <div class="col-sm-4 input-group mb-3">

                    <div class="input-group-prepend">
                        <label class="input-group-text" id="currency_holder">$</label>
                    </div>
                    <select class="custom-select" id="currency" name="equivalent_currency">
                        <?php if (!empty($currencies)) { ?>
                            <?php
                            foreach ($currencies as $currency) {
                                $cur_symbol = "$";
                                $st = '';
                                if ($project_info[0]['equivalent_currency'] == $currency['currencies_id']) {
                                    $st = 'selected';
                                    $cur_symbol = $currency['symbol_left'];
                                }
                                ?>
                                ?>
                                <option <?php echo $st; ?> data-content="<?php echo $currency['value']; ?>" rel="<?php echo $currency['symbol_left']; ?>" value="<?php echo $currency['currencies_id'] ?>"><?php echo $currency['title'] ?></option>
                            <?php } ?>
                        <?php } ?>      
                    </select>
                </div>
                <label class="col-sm-2 col-form-label">Equivalent Project Value</label>
                <div class="col-sm-4">
                    <input  type="text" value="<?php echo!empty($project_info[0]['project_value']) ? $project_info[0]['project_value'] : ''; ?>" required readonly class="form-control fill" id="project_value" name="project_value" placeholder="">
                    <span class="messages"></span>
                </div>
            </div> 
            <div class="form-group row">

                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-8 pull-right">
                    <button type="button" class="btn cutom-btn btn-primary pull-right" style="float: right;" id="button1">+ Add Currency</button>

                </div>
            </div>
            <div id="another_currency" >    
                <?php
                $count = 1;
                $str = '';
                foreach ($project_currency_info as $row) {

                    $cstr = '';
                    $selected_sym = "&nbsp;";
                    foreach ($currencies as $currency) {
                        if ($row['currency_id'] == $currency['currencies_id']) {
                            $selected_sym = $currency['symbol_left'];
                            $cstr.='<option selected rel="' . $currency['symbol_left'] . '" value="' . $currency['currencies_id'] . '">' . $currency['title'] . '</option>';
                        } else
                            $cstr.='<option rel="' . $currency['symbol_left'] . '" value="' . $currency['currencies_id'] . '">' . $currency['title'] . '</option>';
                    }

                    $str .= '<div class="form-group row" id="row_' . $count . '" >';
                    $str .= '<label class="col-sm-2 col-form-label">Chose Currency<sup style="color:red">*</sup></label>';
                    $str .= '<div class="col-sm-3 input-group mb-3"> <div class="input-group-prepend"><label class="input-group-text" class="currency_holder">' . $selected_sym . '</label></div><select name="currency_id[]" id="currency_' . $count . '" onchange="javascript: changeCurrency(this)" class="currency form-control  col-sm-10" style="float:left;" >' . $cstr . '</select><button type="button" class="btn cutom-btn btn-danger m-b-0" id="button2" onclick="removeRow(' . $count . ')">-</button></div>';
                    $str .= '<div class="col-sm-3 input-group mb-3"><div class="input-group-prepend"><label class="input-group-text" class="currency_holder">1' . $selected_sym . '= ?' . $cur_symbol . '</label></div><input value="' . $row['currency_rate'] . '" type="text" required class="form-control fill currency_rate" name="currency_rate[]" onchange="calculateProjectValue()" placeholder="Exchange Rate"></div> <div class="col-sm-3">';
                    $str .= ' <input type="text" required class="form-control fill project_value" name="equivalant_value[]" onchange="calculateProjectValue()" placeholder="Project Value" value="' . $row['equivalant_value'] . '"><span class="messages"></span> </div>';
                    $str .= '</div>';
                    $count++;
                }
                echo $str;
                ?>
                <input type="hidden" value="<?php echo $count; ?>" id="count" />
            </div>       


            <div class="form-group row">

                <label class="col-sm-2"></label>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                </div>
                <div class="col-sm-2" style="margin-left:-90px;">
                    <a href="<?php echo site_url('backend/project') ?>" ><button type="submit" class="btn btn-danger m-b-0">Discard</button></a>
                </div>
                <div class="col-sm-2 pull-right">
                    <button type="button" class="btn btn-primary m-b-0">Import From Excel</button>
                </div>
            </div>
        </form>
    </div><!--End Card Block-->
</div><!--End Card -->
<script type="text/javascript">
    $('#contract_date,#contract_period,#execution_period').change(function () {
        var contact_date = $('#contract_date').val()
        var exe_period = $('#execution_period').val();
        var period = $('#contract_period').val();
        var time_extension = $('#time_extension').val();

        if (exe_period) {
            var rem = Number(period) - Number(exe_period);
        } else {
            var rem = 0;
        }
        if (contact_date == '') {
            return false;
        }
        var pattern = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
        var arrayDate = contact_date.match(pattern);
        var today = new Date(arrayDate[3], arrayDate[2] - 1, arrayDate[1]);

        var execution_start_date = addDays(today, rem);
        if (exe_period) {
            var hand_over_date = addDays(execution_start_date, exe_period);
        } else {
            var hand_over_date = addDays(today, period);
        }
        $('#execution_start_date').val(get_format(execution_start_date));
        $('#execution_start_date').datepicker('setStartDate', dateToDMY(execution_start_date));
        $('#scheduled_completion_date').val(get_format(hand_over_date));
        $('#scheduled_completion_date1').val(get_format(hand_over_date));
        if (time_extension) {
            var hand_over_date = addDays(hand_over_date, time_extension);
        }
        $('#handover_date').val(get_format(hand_over_date));
        $('#handover_date1').val(get_format(hand_over_date));
        $('#actual_completion_date').datepicker('setStartDate', dateToDMY(hand_over_date));
        $('#actual_completion_date').val(get_format(hand_over_date));
        $('.datepicker').datepicker('update');
        // alert(dateToYMD(get_format(hand_over_date)))

    })
    $('#time_extension').change(function () {
        var contact_date = $('#contract_date').val()
        var exe_period = $('#execution_period').val();
        var period = $('#contract_period').val();
        var time_extension = $('#time_extension').val();

        if (exe_period) {
            var rem = Number(period) - Number(exe_period);
        } else {
            var rem = 0;
        }
        if (contact_date == '') {
            return false;
        }
        var pattern = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
        var arrayDate = $('#execution_start_date').val().match(pattern);
        var today = new Date(arrayDate[3], arrayDate[2] - 1, arrayDate[1]);
        var pattern = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
        var arrayDate = contact_date.match(pattern);
        var contact_date = new Date(arrayDate[3], arrayDate[2] - 1, arrayDate[1]);

        var execution_start_date = today;
        if (exe_period) {
            var hand_over_date = addDays(execution_start_date, exe_period);
        } else {
            var hand_over_date = addDays(today, period);
        }
        $('#execution_start_date').val(get_format(execution_start_date));
        $('#execution_start_date').datepicker('setStartDate', dateToDMY(contact_date));
        $('#scheduled_completion_date').val(get_format(hand_over_date));
        $('#scheduled_completion_date1').val(get_format(hand_over_date));
        if (time_extension) {
            var hand_over_date = addDays(hand_over_date, time_extension);
        }
        $('#handover_date').val(get_format(hand_over_date));
        $('#handover_date1').val(get_format(hand_over_date));
        $('#actual_completion_date').datepicker('setStartDate', dateToDMY(hand_over_date));
        $('#actual_completion_date').val(get_format(hand_over_date));
        $('.datepicker').datepicker('update');
        // alert(dateToYMD(get_format(hand_over_date)))

    })
    $('#execution_start_date').change(function () {
        var contact_date = $('#contract_date').val()
        var exe_period = $('#execution_period').val();
        var period = $('#contract_period').val();
        var time_extension = $('#time_extension').val();

        if (exe_period) {
            var rem = Number(period) - Number(exe_period);
        } else {
            var rem = 0;
        }
        if (contact_date == '') {
            return false;
        }
        var pattern = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
        var arrayDate = $(this).val().match(pattern);
        var today = new Date(arrayDate[3], arrayDate[2] - 1, arrayDate[1]);
        var pattern = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
        var arrayDate = contact_date.match(pattern);
        var contact_date = new Date(arrayDate[3], arrayDate[2] - 1, arrayDate[1]);

        var execution_start_date = today;
        if (exe_period) {
            var hand_over_date = addDays(execution_start_date, exe_period);
        } else {
            var hand_over_date = addDays(today, period);
        }
        $('#execution_start_date').val(get_format(execution_start_date));
        $('#execution_start_date').datepicker('setStartDate', dateToDMY(contact_date));
        $('#scheduled_completion_date').val(get_format(hand_over_date));
        $('#scheduled_completion_date1').val(get_format(hand_over_date));
        if (time_extension) {
            var hand_over_date = addDays(hand_over_date, time_extension);
        }
        $('#handover_date').val(get_format(hand_over_date));
        $('#handover_date1').val(get_format(hand_over_date));
        $('#actual_completion_date').datepicker('setStartDate', dateToDMY(hand_over_date));
        $('#actual_completion_date').val(get_format(hand_over_date));
        $('.datepicker').datepicker('update');
        // alert(dateToYMD(get_format(hand_over_date)))

    })
    function change_country() {
        var country = $('#country').val();
        if (country != '') {
            $.ajax({
                type: "POST",
                url: "project/get_division_list",
                data: "country=" + country,
                dataType: "html",
                success: function (result) {
                    $('#division').html(result);
                }
            });
        }
    }
    function get_district_list() {
        var country = $('#country').val();
        var division = $('#division').val();
        if (country != '' && division != '') {
            $.ajax({
                type: "POST",
                url: "project/get_district_list",
                data: {"country": country, "division": division},
                dataType: "html",
                success: function (result) {
                    $('#district').html(result);
                }
            });
        }
    }
    function get_upazila_list() {
        var country = $('#country').val();
        var division = $('#division').val();
        var district = $('#district').val();
        if (country != '' && division != '' && district != '') {
            $.ajax({
                type: "POST",
                url: "project/get_upazila_list",
                data: {"country": country, "division": division,'district':district},
                dataType: "html",
                success: function (result) {
                    $('#upazila').html(result);
                }
            });
        }
    }
    $('#button1').click(function () {
        var count = $('#count').val();
        var curStr = $('#currency').html();
        var str = '<div class="form-group row" id="row_' + count + '" >';
        str += '<label class="col-sm-2 col-form-label">Chose Currency<sup style="color:red">*</sup></label>';
        str += '<div class="col-sm-3 input-group mb-3"> <div class="input-group-prepend"><label class="input-group-text" class="currency_holder">&nbsp;</label></div><select name="currency_id[]" id="currency_' + count + '" onchange="javascript: changeCurrency(this)" class="currency form-control  col-sm-10" style="float:left;" >' + curStr + '</select><button type="button" class="btn cutom-btn btn-danger m-b-0" id="button2" onclick="removeRow(' + (Number(count)) + ')">-</button></div>';
        str += '<div class="col-sm-3 input-group mb-3"><div class="input-group-prepend"><label class="input-group-text" class="currency_holder">&nbsp;</label></div><input value="1" type="text" required class="form-control fill currency_rate" name="currency_rate[]" onchange="calculateProjectValue()" placeholder="Exchange Rate"></div> <div class="col-sm-3">';
        str += ' <input type="text" required class="form-control fill project_value" name="equivalant_value[]" onchange="calculateProjectValue()" placeholder="Project Value"><span class="messages"></span> </div>';
        str += '</div>';
        $('#count').val(Number(count) + 1);
        $('#another_currency').append(str);
    });

    function removeRow(row) {
        var r = confirm("Are you sure?");
        if (r == true) {
            $('#row_' + row).remove();
        }
        calculateProjectValue();
    }
    $('#currency').change(function () {
        $('#currency_holder').html($(this).find('option:selected').attr('rel'))
    })
    function changeCurrency(ev) {
        var curr_sym = $('#currency option:selected').attr('rel');
        $(ev).parent('.input-group').find('label').html($(ev).find('option:selected').attr('rel'))
        $(ev).parent('.input-group').next('div').find('label').html('1' + $(ev).find('option:selected').attr('rel') + '=1' + curr_sym);
//        var aa = Number($('#currency option:selected').data('content'));
//        var bb = Number($(ev).find('option:selected').data('content'));
//        var ex_rate = Number(aa / bb);
//        $(ev).parent('.input-group').next('div').find('.currency_rate').val(ex_rate.toFixed(6));
        calculateProjectValue();
    }

    function calculateProjectValue() {
        //    var curr = $('#currency').val();
        //    var curr_value = $('#currency option:selected').data('content');
        var total_amt = 0;
        $('.currency').each(function (row, val) {
            var current_rate = $(this).parents('.form-group').find('.currency_rate').val();
            var current_value = $(this).parents('.form-group').find('.project_value').val();
            total_amt += Number(current_value / current_rate);
        })
        $('#project_value').val(total_amt.toFixed(0));

    }

</script>