
<div class="col-md-10 col-md-offset-2" style="margin-top: 10px;min-height: 500px;">
    <div id="table-content">
        <form action="<?php echo site_url('dashboard/settings'); ?>" method="post" enctype="multipart/form-data">

            <div style="margin-top:10px;" class="row">
                <div class="col-md-2"><label>System Name : </label></div>

                <div class="col-md-9">
                    <input type="text" name="title" value="<?php echo $title; ?>" class="form-control">
                </div>
                <div class="clearfix"></div>
            </div>
            <div style="margin-top:10px;" class="row">
                <div class="col-md-2"><label>Address : </label></div>

                <div class="col-md-9">
                    <input type="text" name="address" value="<?php echo $address; ?>" class="form-control">
                </div>
                <div class="clearfix"></div>
            </div>
            <div style="margin-top:10px;" class="row">
                <div class="col-md-2"><label>Email : </label></div>

                <div class="col-md-9">
                    <input type="text" name="email" value="<?php echo $email; ?>" class="form-control">
                </div>
                <div class="clearfix"></div>
            </div>
            <div style="margin-top:10px;" class="row">
                <div class="col-md-2"><label>Phone : </label></div>

                <div class="col-md-9">
                    <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control">
                </div>
                <div class="clearfix"></div>
            </div>
            <div style="margin-top:10px;" class="row">
                <div class="col-md-2"><label>Copyright : </label></div>

                <div class="col-md-9">
                    <input type="text" name="footer" value="<?php echo $footer; ?>" class="form-control">
                </div>
                <div class="clearfix"></div>
            </div>
            <div style="margin-top:10px;" class="row">
                <div class="col-md-2"><label>Logo : </label></div>

                <div class="col-md-5">
                    <input class="form-control" id="logo" name="logo" type="file">
                </div>
                <div class="col-md-4">

                    <img src="<?php echo!empty($logo) ? site_url('images') . '/' . $logo : site_url() . '/images/user.png'; ?>" class="img-responsive" style="width:100px;">
                </div>
                <div class="clearfix"></div>
            </div>
            <div style="margin-top:10px;" class="row">
                <div class="col-md-2"><label>Background Image : </label></div>

                <div class="col-md-5">
                    <input class="form-control" id="bg_image" name="bg_image" type="file">
                </div>
                <div class="col-md-4">

                    <img src="<?php echo!empty($bg_image) ? site_url('images/bg') . '/' . $bg_image : site_url() . '/images/bg/bg-login.jpg'; ?>" class="img-responsive" style="width:100px;">
                </div>
                <div class="clearfix"></div>
            </div>

            <div style="margin-top:10px;" class="row">
                <div class="col-md-2"></div>
                <div class="col-md-9">
                    <input type="submit" value="Save" style="width: 200px" class="btn btn-small btn-info pull-right">
                </div>
            </div>
        </form>
    </div>
</div>
<div id="loader" style="display: none;position:absolute;left:46%;top:30%;">
    <img src="images/loader.gif" alt="Loader" />
</div>
<script src="ckeditor/ckeditor.js"></script>
<script>
//    CKEDITOR.replace('glossary');
    CKEDITOR.replace('description');
</script>