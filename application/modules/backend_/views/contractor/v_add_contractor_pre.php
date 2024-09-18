 <div class="right_col" style="background-color: #f1f1f1;padding-bottom:20px;">
    
            <h2 style="text-align:center; "></h2>
        
            <form enctype="multipart/form-data" action="<?php echo site_url('contractor/addEditContractor'); ?>" method="post">
               
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-4 col-md-3 col-md-offset-3  labeltext" style="text-align: right;"><label for="inputdefault">Full Name  <sup>*</sup>:</label></div>
                            <div class="col-sm-8 col-md-5 "><input required class="form-control" id="fullname" name="fullname" type="text"></div>
                        </div>
                    </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-4 col-md-3 labeltext" style="text-align: right;"><label for="inputdefault">Address <sup>*</sup>:</label></div>
                            <div class="col-sm-8 col-md-5 "><input required class="form-control" id="address" name="address" type="text"></div>
                        </div>
                    </div>
                </div>
                
                
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-4 col-md-3 col-md-offset-3  labeltext" style="text-align: right;"><label for="inputdefault">Phone <sup>*</sup>:</label></div>
                            <div class="col-sm-8 col-md-5 "><input required class="form-control" id="phone" name="phone" type="text"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-4 col-md-3 labeltext" style="text-align: right;"><label for="inputdefault">Email:</label></div>
                             <div class="col-sm-8 col-md-5 "><input class="form-control" id="email" name="email" type="text"></div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-4 col-md-3 col-md-offset-3  labeltext" style="text-align: right;"><label for="inputdefault">Photo:</label></div>
                            <div class="col-sm-8 col-md-5 "><input class="" id="image" name="image" type="file"></div>
                        </div>
                    </div>
                </div>
                
                <br>
              
                 <div class="row">
                     
                   
                     
                    <div class="col-md-1 col-md-offset-3">
                        <button type="submit" class="btn btn-success button">Save</button>
                    </div>
                     
                      
                   <div class="col-md-1">
                        <a href="<?php echo site_url('backend/contractor') ?>" > <button type="button" class="btn btn-danger button">Discard</button> </a>

                    </div>
                    
                </div> 
                
            </form>
        </div>



