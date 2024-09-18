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
            <h5>EPC Contractor</h5>
            <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
          </div>
        <div class="card-block">
                                <form id="main" method="post" enctype="multipart/form-data" action="<?php echo site_url('contractor/addEditContractor'); ?>" >
                                  <div class="form-group row">
                                      <label class="col-sm-2 col-form-label">Full Name<sup style="color:red;">*</sup></label>
                                    <div class="col-sm-6">
                                      <input  type="text" required class="form-control" name="fullname" id="fullname" placeholder="Full Name">
                                      <span class="messages"></span>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Address<sup style="color:red;">*</sup></label>
                                    <div class="col-sm-6">
                                      <input  type="text" required class="form-control" id="address" name="address" placeholder="Address">
                                      <span class="messages"></span>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Phone<sup style="color:red;">*</sup></label>
                                    <div class="col-sm-6">
                                      <input required type="text" class="form-control" id="phone" name="phone" placeholder="Contact Number">
                                      <span class="messages"></span>
                                    </div>
                                  </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-6">
                                          <input  type="email" class="form-control" id="email" name="email" placeholder="Email">
                                          <span class="messages"></span>
                                        </div>
                                  </div>
                                
                                  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Photo</label>
                                        <div class="col-sm-6">
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
                                        </div>
                                  </div>   
                                    
                                  <div class="form-group row">
                                    <label class="col-sm-2"></label>
                                    <div class="col-sm-2">
                                      <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                    </div>
                                    <div class="col-sm-2" style="margin-left:-90px;">
                                        <a href="<?php echo site_url('backend/contractor') ?>" ><button type="submit" class="btn btn-danger m-b-0">Discard</button></a>
                                    </div>
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