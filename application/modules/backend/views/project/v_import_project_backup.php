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
        <form id="main" method="post" enctype="multipart/form-data" action="<?php echo site_url('project/importProjectAction'); ?>" >
            
            <div class="form-group row">
                <label class="col-form-label col-sm-2">Project File</label>
                <div class="col-sm-4">
                    <input  type="file" required class="form-control" id="project_file" name="project_file" >
                    <span class="messages"></span>
                </div>
              
            </div>        
          
            <div class="form-group row">
                <label class="col-sm-2"></label>            
                <div class="col-sm-1 pull-right">
                    <button style="float:left;" type="submit" class="btn btn-primary m-b-0">Import</button>
                    
                </div>
                <a style="margin-right:15px;" href="<?php echo site_url('backend/project'); ?>" class="btn btn-primary">Go Back</a>
                <a href="<?php echo site_url('sample/project.csv'); ?>" class="btn btn-primary"> Sample File</a>
            </div>
        </form>
    </div><!--End Card Block-->
</div><!--End Card -->
<script type="text/javascript">
    
</script>