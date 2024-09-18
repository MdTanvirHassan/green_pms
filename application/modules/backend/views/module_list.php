<style type="text/css">
    .error{
        color: #ffffff;
        background-color: rgba(236, 94, 90,0.6);
        border-color: rgba(238, 77, 99,1);
        padding: 4px;
        width: 100%;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 2px;
    }
    .well{
        margin-bottom: 0px !important;
        margin-top: 50px;
        background-color: #87AB43 !important;
        padding: 8px;
        opacity: 0.9;
        cursor: pointer;
    }
    /*    .login-bg{
            background: url('images/bg/<?php echo empty($this->config->item['bg_image']) ? 'bg-login.jpg' : $this->config->item['bg_image']; ?>');
            background-size: cover;
            min-height: 640px;
            width: 100%;
    
        }*/
    .well h3{ text-align: center; color:#fff;font-weight: bold; padding-bottom: 28px;}
    fieldset h4{ text-align: center; color:#616161; margin-top: 28px;margin-bottom: 20px}
    fieldset{margin-bottom: 20px}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>files/bower_components/bootstrap/css/bootstrap.min.css">

<nav class="navbar navbar-expand-sm bg-light navbar-light">
    <!-- Brand/logo -->
    <a class="navbar-brand" style="width:90%">
        <img class="img-fluid" src="<?php echo site_url('images/' . $this->config->item['logo']); ?>" style="width:150px;max-height:60px;" alt="Theme-Logo" />
    </a>

    <!-- Links -->
    <ul class="navbar-nav pull-right">
        <li class="nav-item">
            <a style="font-size: 15px;" href="<?php echo site_url('login/logOut') ?>">
                <i class="feather icon-log-out"></i> Logout

            </a>
        </li>

    </ul>
</nav>
<div class="col-md-8 center login-box">
    <?php 
    $usertype = $this->session->userdata('usertype');
    $user_type = $this->session->userdata('user_type');
    if ($usertype != 'supply_chain_user') { ?>        
        <div class="well col-md-6">
            <a target="_blank" href="<?php echo $_SERVER['HOST_NAME']; ?>/green_pms/dashboard">
                <div class='col-md-12 col-sm-12 col-xs-12'>

                    <h2 style='color: #43C3BA;font-weight: bold'><img src='<?php echo site_url('images/pms.png') ?>' style='margin-right: 20px;width:150px;height:100px;'/><?php //echo $this->config->item['title'];     ?></h2>
                </div>
                <h3>Project Management Module</h3>
            </a>
        </div>     
        <?php  
    }
    else if ($usertype = 'supply_chain_user' && $user_type==1) { ?>        
        <div class="well col-md-6">
            <a target="_blank" href="<?php echo $_SERVER['HOST_NAME']; ?>/green_pms/dashboard">
                <div class='col-md-12 col-sm-12 col-xs-12'>

                    <h2 style='color: #43C3BA;font-weight: bold'><img src='<?php echo site_url('images/pms.png') ?>' style='margin-right: 20px;width:150px;height:100px;'/><?php //echo $this->config->item['title'];     ?></h2>
                </div>
                <h3>Project Management Module</h3>
            </a>
        </div>     
        <?php  
    }
    else if ($usertype = 'supply_chain_user' && $user_type==3 ) {?>
    <?php
        //echo $user_type, $usertype; exit;
    ?>
        <div class="well col-md-6">
            <a target="_blank" href="<?php echo $_SERVER['HOST_NAME']; ?>/green_pms/dashboard">
                <div class='col-md-12 col-sm-12 col-xs-12'>
                    <h2 style='color: #43C3BA;font-weight: bold'><img src='<?php echo site_url('images/pms.png') ?>' style='margin-right: 20px;width:150px;height:100px;'/><?php //echo $this->config->item['title'];     ?></h2>
                </div>
                <h3>Project Management Module</h3>
            </a>
        </div>  
        <?php  
    }      
        $employee_id = $this->session->userdata('employeeId');
        $user_type = $this->session->userdata('user_type');
        $user_id = $this->session->userdata('user_id');
        $DB2 = $this->load->database('db2', TRUE);
        $sql = "select * from users where id='" . $user_id . "'";
        $result = $DB2->query($sql);
        $userData = $result->result_array();
        $this->menu = checkMenuPermission(3, $userData);
    
    ?>
 
<?php if (3 == $this->menu) { ?>
        <div class="well col-md-6">
            <a target="_blank" href="<?php echo $_SERVER['HOST_NAME']; ?>/green_supply_chain/backend/general_store/currentStock">
                <div class='col-md-12 col-sm-12 col-xs-12'>

                    <h2 style='color: #43C3BA;font-weight: bold'><img src='<?php echo site_url('images/inventory.png') ?>' style='margin-right: 20px;width:150px;height:100px;'/><?php //echo $this->config->item['title'];     ?></h2>
                </div>
                <h3>Inventory Module</h3>
            </a>
        </div>
    <?php
    }
    $this->menu = checkMenuPermission(2, $userData);
    ?>
<?php if (2 == $this->menu) { ?>
        <div class="well col-md-6">
            <a target="_blank" href="<?php echo $_SERVER['HOST_NAME']; ?>/green_supply_chain/backend/general_store/ipo_material_indent">
                <div class='col-md-12 col-sm-12 col-xs-12'>

                    <h2 style='color: #43C3BA;font-weight: bold'><img src='<?php echo site_url('images/procurement.png') ?>' style='margin-right: 20px;width:150px;height:100px;'/><?php //echo $this->config->item['title'];     ?></h2>
                </div>
                <h3>Procurement Module</h3>
            </a>
        </div>
    <?php
    }
    $this->menu = checkMenuPermission(3, $userData);
    ?>
<?php if (3 == $this->menu) { ?>
        <div class="well col-md-6">
            <a target="_blank" href="<?php echo $_SERVER['HOST_NAME']; ?>/green_supply_chain/backend/general_store/consumption">
                <div class='col-md-12 col-sm-12 col-xs-12'>

                    <h2 style='color: #43C3BA;font-weight: bold'><img src='<?php echo site_url('images/consumption.jpg') ?>' style='margin-right: 20px;width:150px;height:100px;'/><?php //echo $this->config->item['title'];     ?></h2>
                </div>
                <h3>Consumption Module</h3>
            </a>
        </div>
<?php } ?>
</div>

<script type="text/javascript">
    $('input#sendemail').live('click', function (e) {
        var error = 1;
        if ($('input#email').val() != '') {
            e.preventDefault();
            var error = 0;
        }
        if (!error) {
            $.ajax({
                type: "POST",
                url: "dashboard/ForgotPassword",
                data: "email=" + $('input#email').val(),
                dataType: "json",
                success: function (result) {
                    if (result.success) {
                        bootbox.alert(result.success, function () {
                            $('#myModal').modal('hide');
                        });
                    } else {
                        bootbox.alert(result.error, function () {
                        });
                    }
                }
            });
        }
    })

    $('a#showsignup').live('click', function () {
        if (('div#myModalRegistration div.panel-body p.mszsuccess').length) {
            $('div#myModalRegistration div.panel-body p.mszsuccess').hide();
            $('div#myModalRegistration div.panel-body form#signup').show();
        }
    })




    $('input#signup').live('click', function (e) {
        var error = 1;
        if (($('input#user_email').val() != '') && ($('input#user_name').val() != '') && ($('input#user_pass').val() != '')) {
            e.preventDefault();
            var error = 0;
        }
        if (!error) {
            $.ajax({
                type: "POST",
                url: "dashboard/registration",
                data: "user_email=" + $('input#user_email').val() + '&user_name=' + $('input#user_name').val() + '&user_pass=' + $('input#user_pass').val(),
                dataType: "json",
                success: function (result) {
                    if (result.success) {
                        $('div#myModalRegistration div.panel-body form#signup').hide();
                        $('div#myModalRegistration div.panel-body p.mszsuccess').show();
                        $('input#user_email').val('');
                        $('input#user_name').val('');
                        $('input#user_pass').val('');
                        $('input#re_pass').val('');
                        //  $('div#myModalRegistration div.panel-body p.mszsuccess').text('You will get an Confirmation email after approval from Admin.');
                    } else {
                        bootbox.alert(result.error, function () {
                        });
                        $('input#user_email').val('');
                        $('input#user_name').val('');
                        $('input#user_pass').val('');
                        $('input#re_pass').val('');
                    }
                }
            });
        }

    })

    function checkEmail(inputvalue) {
        var pattern = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
        if (pattern.test(inputvalue) == false) {
            return false;
        } else
            return true;
    }

    $(document).ready(function () {

        $('input[type=email]').blur(function () {
            if (checkEmail($(this).val()) == false) {
                $(this).closest('.form-group').addClass('has-error');
                $('.error').show();
                return false;
            }
        });

        $('#user_pass').blur(function () {
            if (($(this).val()) == false || $(this).val().length < 6) {
                $(this).closest('.form-group').addClass('has-error');
                $('#pass_error').show();
                return false;
            }
        });

        $('#re_pass').blur(function () {
            if ($(this).val() != $('#user_pass').val()) {
                $(this).closest('.form-group').addClass('has-error');
                $('#re_pass_error').show();
                return false;
            }
        });

    });

    $('#show_modal').live('click', function () {
        $('input[type=email]').closest('.form-group').removeClass('has-error');
        $('input[type=email]').val('');
        $('.error').hide();
    });

    $('#showsignup').live('click', function () {
        $('input[type=email]').closest('.form-group').removeClass('has-error');
        $('input[type=password]').closest('.form-group').removeClass('has-error');
        $('input[type=email]').val('');
        $('input[type=password]').val('');
        $('.error').hide();
    });

</script>