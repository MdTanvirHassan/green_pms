<div class="card">
    <div class="card-header">
        <h5>Import Project</h5>
        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
    </div>
    <div class="card-block">
        <form id="main" method="post" enctype="multipart/form-data" action="<?php echo site_url('project/importFullProject'); ?>">
            <div class="form-group row">
                <label class="col-form-label col-sm-2">Select Project</label>
                <div class="col-sm-4">
                    <select class="form-control" name="project_id" required>
                        <option value="">-- Select Project --</option>
                        <!-- Loop through the projects and display them as options -->
                        <?php if (!empty($projects)) : ?>
                            <?php foreach ($projects as $project) : ?>
                                <option value="<?php echo $project['project_id']; ?>">
                                    <?php echo $project['project_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <span class="messages"></span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-2">Project File</label>
                <div class="col-sm-4">
                    <input type="file" required class="form-control" id="project_file" name="project_file">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-1 pull-right">
                    <button style="float:left;" type="submit" class="btn btn-success m-b-0">Import</button>
                </div>
                <a style="margin-right:15px;" href="<?php echo site_url('backend/project'); ?>" class="btn btn-dark">Go Back</a>
                <a href="<?php echo site_url('sample/project_demo.csv'); ?>" class="btn btn-primary">Sample File</a>
            </div>
        </form>
    </div>
</div>
