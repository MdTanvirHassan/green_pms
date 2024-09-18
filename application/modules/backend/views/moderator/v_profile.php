<style type="text/css">
    .btn {
        border-radius: 2px;
        text-transform: capitalize;
        font-size: 15px;
        padding: 3px 9px;
        cursor: pointer;
    }
</style>

<div class="card">
    <div class="card-header">
        <h5>User Profile</h5>
        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
    </div>
    <div class="card-block">
        <form id="main" method="post" enctype="multipart/form-data" action="<?php echo site_url('moderator/profile'); ?>/<?php echo !empty($user_info[0]['user_id']) ? $user_info[0]['user_id'] :''; ?>" onsubmit="javascript: return validate_user()">
            <div class="col-md-12">
                <div class="col-md-6 pull-left" style="float: left;">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Username<sup style="color:red;">*</sup></label>
                        <div class="col-sm-8">
                            <input  type="text" disabled required class="form-control" name="username" value="<?php echo !empty($user_info[0]['username']) ? $user_info[0]['username'] :''; ?>" id="username" placeholder="Username">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Full Name<sup style="color:red;">*</sup></label>
                        <div class="col-sm-8">
                            <input  type="text" required class="form-control" id="fullname" value="<?php echo !empty($user_info[0]['fullname']) ? $user_info[0]['fullname'] :''; ?>"  name="fullname" placeholder="Full Name">
                            <span class="messages"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Email<sup style="color:red;">*</sup></label>
                        <div class="col-sm-8">
                            <input type="text" disabled class="form-control" id="email" value="<?php echo !empty($user_info[0]['email']) ? $user_info[0]['email'] :''; ?>" name="email" placeholder="Email">
                            <span class="messages"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Phone</label>
                        <div class="col-sm-8">
                            <input  type="text" disabled class="form-control" id="phone" name="phone" value="<?php echo !empty($user_info[0]['phone']) ? $user_info[0]['phone'] :''; ?>" placeholder="Phone">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Designation</label>
                        <div class="col-sm-8">
                            <input  type="text" disabled class="form-control" id="designation" name="designation" value="<?php echo !empty($user_info[0]['designation']) ? $user_info[0]['designation'] :''; ?>" placeholder="Designation">
                            <span class="messages"></span>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Date of Birth</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control datepicker" id="dob" name="dob" value="<?php echo !empty($user_info[0]['dob']) ? date('d/m/Y',strtotime($user_info[0]['dob'])) :''; ?>" placeholder="Date of Birth">
                            <span class="messages"></span>
                        </div>
                    </div>
                         <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Password<sup style="color:red;">*</sup></label>
                        <div class="col-sm-8">
                            <input required type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Confirm Password<sup style="color:red;">*</sup></label>
                        <div class="col-sm-8">
                            <input required type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                            <span class="messages"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pull-right" style="float: right;">
                         <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Joining Date</label>
                        <div class="col-sm-8">
                            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                            <input  type="text" disabled class="form-control datepicker" id="joining_date" name="joining_date" value="<?php echo !empty($user_info[0]['joining_date']) ? date('d.m.y',strtotime($user_info[0]['joining_date'])) :''; ?>" placeholder="Joining Date">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Address</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control" id="address" name="address" value="<?php echo !empty($user_info[0]['address']) ? $user_info[0]['address'] :''; ?>" placeholder="Address">
                            <span class="messages"></span>
                        </div>
                    </div>
                  
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">User Type<sup style="color:red;">*</sup></label>
                        <div class="col-sm-8">
                            <select disabled name="usertype" id="usertype" class="form-control">
                                <option <?php echo !empty($user_info[0]['usertype']=='User') ? 'selected' :''; ?> >User</option>
                                <option <?php echo !empty($user_info[0]['usertype']=='Admin') ? 'selected' :''; ?>>Admin</option>
                            </select>
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">User Image</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="image" name="image" type="file">
                            <span class="messages"></span>
                            <img src="<?php echo !empty($user_info[0]['image']) ? site_url('images/users').'/'.$user_info[0]['image'] :site_url().'/images/user.png'; ?>" class="img-responsive img-circle" style="width:50px;">
                        </div>
                     
                        
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-4"></label>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                        </div>
                        <div class="col-sm-4" style="margin-left:-90px;">
                            <a href="<?php echo site_url('moderator') ?>" ><button type="button" class="btn btn-danger m-b-0">Discard</button></a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div><!--End Card Block-->
</div><!--End Card -->

<script>
    function validate_user() {

        if ($('#username').val() == '') {
            alert('Please enter Username');
            $('#username').focus()
            return false;
        }
        if ($('#fullname').val() == '') {
            alert('Please enter fullname');
            $('#fullname').focus()
            return false;
        }
        if ($('#email').val() == '') {
            alert('Please enter email');
            $('#email').focus()
            return false;
        }
        if ($('#password').val() == '') {
            alert('Please enter password');
            $('#password').focus()
            return false;
        }
        if ($('#confirm_password').val() == '') {
            alert('Please enter Confirm password');
            $('#confirm_password').focus()
            return false;
        }
        if ($('#password').val() != $('#confirm_password').val()) {
            alert('Password and Confirm password soes not match');
            $('#confirm_password').focus()
            return false;
        }
        return true;
    }
</script>