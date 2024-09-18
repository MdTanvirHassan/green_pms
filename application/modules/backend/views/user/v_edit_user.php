<style type="text/css">
    .btn {
        border-radius: 2px;
        text-transform: capitalize;
        font-size: 15px;
        padding: 3px 9px;
        cursor: pointer;
    }
    
    .image-preview-input input[type="file"] {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
        overflow: hidden;
    }
</style>

<div class="card">
    <div class="card-header">
        <h5>Edit User</h5>
        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
    </div>
    <div class="card-block">
        <form id="main" method="post" enctype="multipart/form-data" action="<?php echo site_url('user/addEditUser'); ?>/<?php echo!empty($user_info[0]['user_id']) ? $user_info[0]['user_id'] : ''; ?>" onsubmit="javascript: return validate_user()">
            <div class="col-md-12">
                <div class="col-md-6 pull-left" style="float: left;">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Username<sup style="color:red;">*</sup></label>
                        <div class="col-sm-8">
                            <input  type="text" required class="form-control" name="username" value="<?php echo!empty($user_info[0]['username']) ? $user_info[0]['username'] : ''; ?>" id="username" placeholder="Username">
                            <span class="messages" id="username_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Full Name<sup style="color:red;">*</sup></label>
                        <div class="col-sm-8">
                            <input  type="text" required class="form-control" id="fullname" value="<?php echo!empty($user_info[0]['fullname']) ? $user_info[0]['fullname'] : ''; ?>"  name="fullname" placeholder="Full Name">
                            <span class="messages"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Email<sup style="color:red;">*</sup></label>
                        <div class="col-sm-8">
                            <input type="text" required class="form-control" id="email" value="<?php echo!empty($user_info[0]['email']) ? $user_info[0]['email'] : ''; ?>" name="email" placeholder="Email">
                            <span class="messages"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Phone</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control" id="phone" name="phone" value="<?php echo!empty($user_info[0]['phone']) ? $user_info[0]['phone'] : ''; ?>" placeholder="Phone">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Designation</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control" id="designation" name="designation" value="<?php echo!empty($user_info[0]['designation']) ? $user_info[0]['designation'] : ''; ?>" placeholder="Designation">
                            <span class="messages"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Date of Birth</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control datepicker" id="dob" name="dob" value="<?php echo!empty($user_info[0]['dob']) ? date('d.m.y', strtotime($user_info[0]['dob'])) : ''; ?>" placeholder="Date of Birth">
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
                            <input  type="text" class="form-control datepicker" id="joining_date" name="joining_date" value="<?php echo!empty($user_info[0]['joining_date']) ? date('d.m.y', strtotime($user_info[0]['joining_date'])) : ''; ?>" placeholder="Joining Date">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Address</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control" id="address" name="address" value="<?php echo!empty($user_info[0]['address']) ? $user_info[0]['address'] : ''; ?>" placeholder="Address">
                            <span class="messages"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">User Type<sup style="color:red;">*</sup></label>
                        <div class="col-sm-8">
                            <select required name="usertype" id="usertype" class="form-control">
                                <option <?php echo!empty($user_info[0]['usertype'] == 'User') ? 'selected' : ''; ?> >User</option>
                                <option <?php echo!empty($user_info[0]['usertype'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                            </select>
                            <span class="messages"></span>
                        </div>
                    </div>
                    <!--
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">User Image</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="image" name="image" type="file">
                            <span class="messages"></span>
                            <img src="<?php echo!empty($user_info[0]['image']) ? site_url('images/users') . '/' . $user_info[0]['image'] : site_url() . '/images/user.png'; ?>" class="img-responsive img-circle" style="width:50px;">
                        </div>


                    </div>
                    -->
                     <div class="form-group row">
                        <label class="col-sm-4 col-form-label">User Image</label>
                        <div class="col-sm-8">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="fa fa-remove"></span>
                                        clear
                                    </button>
                                    <div class="btn btn-success image-preview-input">
                                        <span class="fa fa-repeat"></span>
                                        <span class="image-preview-input-title">
                                        file upload</span>
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="image"/>
                                    </div>
                                </span>
                            </div>
                            <span class="messages"></span>
                            <img src="<?php echo!empty($user_info[0]['image']) ? site_url('images/users') . '/' . $user_info[0]['image'] : site_url() . '/images/user.png'; ?>" class="img-responsive img-circle" style="width:50px;">
                        </div>


                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-4"></label>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                        </div>
                        <div class="col-sm-4" style="margin-left:-90px;">
                            <a href="<?php echo site_url('backend/user') ?>" ><button type="button" class="btn btn-danger m-b-0">Discard</button></a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div><!--End Card Block-->
</div><!--End Card -->


<script type="text/javascript">
 $(document).on('click', '#close-preview', function(){
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
           $('.content').css('padding-bottom', '100px');
        },
         function () {
           $('.image-preview').popover('hide');
           $('.content').css('padding-bottom', '20px');
        }
    );
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("file upload");
    });
    // Create the preview image
    $(".image-preview-input input:file").change(function (){
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200,
            overflow:'hidden'
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("file upload");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
            $('.content').css('padding-bottom', '100px');
        }
        reader.readAsDataURL(file);
    });
});
</script>

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
       
        return true;
    }

    $('#username').change(function () {
        if ($(this).val() != '') {
            $.ajax({
                type: "POST",
                url: "user/check_username",
                data: {"username": $(this).val()},
                dataType: "text",
                success: function (result) {
                    if (result == 'success') {
                        $('#username_error').html('Username Available ....').css('color', 'green').hide(3000);
                    } else {
                        $('#username_error').html('Username not available').css('color', 'red').show();
                        $('#username').focus();
                    }
                }
            });
        }


    })
</script>