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
        margin-top: 135px;
        background-color: #FBFAFA !important;
        padding: 8px;
    }
    .login-bg{
        background: url('images/bg/bg-login.jpg');
        background-size: cover;
        min-height: 640px;
        width: 100%;

    }
    fieldset h3{ text-align: center; color:#626262;font-weight: bold; padding-bottom: 28px;border-bottom: 1px solid #D9D9D9}
    fieldset h4{ text-align: center; color:#616161; margin-top: 28px;margin-bottom: 20px}
    fieldset{margin-bottom: 20px}
</style>

<div class="container-fluid login-bg">

    <div class="row">
        <div class="well col-md-5 col-sm-8 col-xs-10 center login-box">
            <?php if (isset($message)) { ?>
                <div class="alert alert-danger"><?php echo @$message; ?></div>
            <?php } else { ?>
                
            <?php } ?>
<!--            <form class="form-horizontal" accept-charset="UTF-8" role="form" method="post" action="backend/login/loginAction">-->
                <fieldset>
                    <div class='col-md-12 col-sm-12 col-xs-12'>
                        
                        <h2 style='color: #43C3BA;font-weight: bold'><img src='<?php echo site_url('images/common/logo.png'); ?>' style='margin-right: 20px'/>Project Management System</h2>
                    </div>
                    <h3>Change Password</h3>
<!--                    <h4>CREDENTIALS</h4>-->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div  class="clearfix">
                                <input id="email" style='width: 100%' class="form-control" placeholder="Email" name="email" type="text" required>
                                <span id="mail_error" style="color:red"></span>
                            </div>
                            <br>
                            <div class="clearfix">
                                <input id="change_password" style='width: 100%' class="btn btn-primary" placeholder="Password" name="" type="button" value="Change Pasword" />
                            </div>
                        </div>
                        
                    </div>
                </fieldset>
<!--            </form>-->
        </div>
    </div>
</div>  
<script type="text/javascript">
    $('#change_password').click(function(){
        var email=$('#email').val();
        if(email==''){
            $('#mail_error').html("Please fill the email field");
            $('#email').css('border','1px solid red');
        }else{
           // alert(site_url);
             $.ajax({
                type:"POST",
                url:site_url+'backend/login/forgetPasswordAction',
                data:{'email':email},
                dataType:"json",
                success: function(data){
                    if(data.status=="success"){  
                        $('#mail_error').html("");
                        $('#email').css('border','1px solid #eee');
                        alert('Successfully password changed.Plese check your email');
                        $('#email').val('');
                    }else{
                        $('#mail_error').html("Invalid email address");
                        $('#email').css('border','1px solid red');
                       // alert('Invalid email address');
                    }
                }
            });
        }
    });
   

//    function checkEmail(inputvalue) {
//        var pattern = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
//        if (pattern.test(inputvalue) == false) {
//            return false;
//        } else
//            return true;
//    }

    
</script>