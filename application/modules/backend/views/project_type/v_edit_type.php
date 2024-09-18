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
            <h5>Edit Project Type</h5>
            <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
          </div>
        <div class="card-block">
                                <form id="main" method="post" aenctype="multipart/form-data" action="<?php echo site_url('project_type/addEditproject_type/'.$type_info[0]['type_id']); ?>" >
                                  <div class="form-group row">
                                      <label class="col-sm-2 col-form-label">Project Type<sup style="color:red;">*</sup></label>
                                    <div class="col-sm-10">
                                      <input  type="text" required class="form-control" name="type" value="<?php echo $type_info[0]['type']; ?>" id="type" placeholder="Project Type">
                                      <span class="messages"></span>
                                    </div>
                                  </div>
                                  
                                    
                                  <div class="form-group row">
                                    <label class="col-sm-2"></label>
                                    <div class="col-sm-2">
                                      <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                    </div>
                                    <div class="col-sm-2" style="margin-left:-90px;">
                                        <a href="<?php echo site_url('backend/project_type') ?>" ><button type="submit" class="btn btn-danger m-b-0">Discard</button></a>
                                    </div>
                                  </div>
                                </form>
         </div><!--End Card Block-->
</div><!--End Card -->