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
        <form id="main" method="post" aenctype="multipart/form-data" action="<?php echo site_url('project/addEditProject'); ?>" >
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Project Name</label>
                <div class="col-sm-10">
                    <input  type="text" required class="form-control" name="project_name" id="fullname" placeholder="Full Name">
                    <span class="messages"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2">Package No.</label>
                <div class="col-sm-4">

                    <input  type="text" required class="form-control" id="package_no" name="package_no" placeholder="Package No">
                    <span class="messages"></span>
                </div>
                <label class="col-form-labe col-sm-2">Code</label>
                <div class="col-sm-4">

                    <input  type="text" required class="form-control" id="code" name="code" placeholder="Code">
                    <span class="messages"></span>
                </div>


            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2">Type</label>
                <div class="col-sm-3">

                    <select name="type" id="project_type_select" class="js-example-data-array form-control col-sm-12">
                        <option value="">Select Project type</option>
                        <?php foreach ($project_types as $type) { ?>
                            <option value="<?php echo $type['type_id']; ?>"><?php echo $type['type']; ?></option>
                        <?php } ?>
                    </select>
                    <span class="messages"></span>
                </div>
                 <div class="col-sm-1">
                    <i class="fa fa-plus" style="margin-right:0px" data-toggle="modal" data-target="#projectTypeModal"></i>
                </div>
                <div id="projectTypeModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                             <!-- Modal content-->
                             <div class="modal-content">
                               <div class="modal-header">
                                   <h4 class="modal-title">Project Type</h4>
                                   <button id="project_type_close" type="button" class="close" data-dismiss="modal">&times;</button>

                               </div>
                               <div class="modal-body">
                                <div class="row">

                                   <div class="col-md-12">
                                       <div class="form-group">
                                         
                                         <input  id="type_name" type="text" class="form-control form-txt-primary">
                                         <span id="type_name_error" style="color:red"></span>
                                      </div>
                                   </div>



                               </div><!--End Row-->
                               </div>
                               <div class="modal-footer">
                                 <button id="project_type_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                                 <button id="add_project_type" type="button" class="btn btn-primary" >Save</button>
                               </div>
                             </div>

                           </div>
                 </div>
                <label class="col-sm-2 col-form-label">Country</label>
                <div class="col-sm-4">
                    <select name="country" id="country" class="js-example-data-array form-control col-sm-12" onchange="change_country()">
                        <option value="">Select Country</option>
                        <?php foreach ($countries as $country) { ?>
                            <option><?php echo $country; ?></option>
                        <?php } ?>
                    </select>
                </div>



            </div>
            
            

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Division</label>
                <div class="col-sm-4">
                    <select name="division" id="division" onchange="get_district_list()" class="js-example-data-array form-control  col-sm-12">
                        <option value="">Select</option>
                    </select>
                </div>

                <label class="col-sm-2 col-form-label">District</label>
                <div class="col-sm-4">
                    <select name="district" id="district" class="js-example-data-array form-control  col-sm-12" onchange="get_upazila_list()">
                        <option value="">Select</option>
                    </select>
                </div>




            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Police Station/Upazila</label>
                <div class="col-sm-4">
                    <select name="upazila" id="upazila" class="js-example-data-array form-control  col-sm-12">
                        <option value="">Select</option>
                    </select>
                    <!--<input  type="text" required class="form-control" id="upazila" name="upazila" placeholder="Police Station/Upazila">-->
                    <span class="messages"></span>
                </div>

                <label class="col-sm-2 col-form-label">Site Location</label>
                <div class="col-sm-4">
                    <input  type="text" required class="form-control" id="site_location" name="site_location" placeholder="Site Location">
                    <span class="messages"></span>
                </div>


            </div>  

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Project Owner</label>
                <div class="col-sm-3">
                    <select id="owner_select" style="float:left;"  name="project_owner" class="js-example-data-array form-control  col-sm-12">

                       <option value="">Select Project Owner</option>
                        <?php if (!empty($project_owners)) { ?>
                            <?php foreach ($project_owners as $owner) { ?>
                                <option value="<?php echo $owner['project_owner_id'] ?>"><?php echo $owner['fullname'] ?></option>
                            <?php } ?>
                        <?php } ?>       

                    </select>
                    
                </div>
                <div class="col-sm-1">
                    <i class="fa fa-plus" style="margin-right:0px" data-toggle="modal" data-target="#ownerModal"></i>
                </div>
                
                
                <div id="ownerModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">New Owner</h4>
                                <button id="owner_close" type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">
                             <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label style="margin-bottom: 0px;">Full Name</label>
                                      <input  id="owner_name" type="text" class="form-control form-txt-primary">
                                      <span id="owner_name_error" style="color:red"></span>
                                   </div>
                                </div>

                                 <div class="col-md-12">
                                    <div class="form-group">
                                      <label style="margin-bottom: 0px;">Address</label>
                                      <input  id="owner_address" type="text" class="form-control form-txt-primary">
                                      <span id="owner_address_error" style="color:red"></span>
                                   </div>
                                </div>

                                 <div class="col-md-12">
                                    <div class="form-group">
                                      <label style="margin-bottom: 0px;">Phone</label>
                                      <input  id="owner_phone" type="text" class="form-control form-txt-primary">
                                      <span id="owner_phone_error" style="color:red"></span>
                                   </div>
                                </div>

                                 <div class="col-md-12">
                                    <div class="form-group">
                                      <label style="margin-bottom: 0px;">Email</label>
                                      <input  id="owner_email" type="text" class="form-control form-txt-primary">
                                      <span id="owner_email_error" style="color:red"></span>
                                   </div>
                                </div>


                            </div><!--End Row-->
                            </div>
                            <div class="modal-footer">
                              <button id="owner_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                              <button id="add_owner" type="button" class="btn btn-primary" >Save</button>
                            </div>
                          </div>

                        </div>
                </div>
                
               
                <label class="col-sm-2 col-form-label">Project Manager</label>
                <div class="col-sm-3">
                    <select id="contractor_select" name="contractor" class="js-example-data-array form-control  col-sm-12">
                        <option value="">Select Contractor</option>
                        <?php if (!empty($contractors)) { ?>
                            <?php foreach ($contractors as $contractor) { ?>
                                <option value="<?php echo $contractor['contractor_id'] ?>"><?php echo $contractor['fullname'] ?></option>
                            <?php } ?>
                        <?php } ?>       

                    </select>
                </div>
                 <div class="col-sm-1">
                    <i class="fa fa-plus" style="margin-right:0px" data-toggle="modal" data-target="#contractorModal"></i>
                </div>


               <div id="contractorModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">New Contractor</h4>
                                <button id="contractor_close" type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">
                             <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label style="margin-bottom: 0px;">Full Name</label>
                                      <input  id="contractor_name" type="text" class="form-control form-txt-primary">
                                      <span id="contractor_name_error" style="color:red"></span>
                                   </div>
                                </div>

                                 <div class="col-md-12">
                                    <div class="form-group">
                                      <label style="margin-bottom: 0px;">Address</label>
                                      <input  id="contractor_address" type="text" class="form-control form-txt-primary">
                                      <span id="contractor_address_error" style="color:red"></span>
                                   </div>
                                </div>

                                 <div class="col-md-12">
                                    <div class="form-group">
                                      <label style="margin-bottom: 0px;">Phone</label>
                                      <input  id="contractor_phone" type="text" class="form-control form-txt-primary">
                                      <span id="contractor_phone_error" style="color:red"></span>
                                   </div>
                                </div>

                                 <div class="col-md-12">
                                    <div class="form-group">
                                      <label style="margin-bottom: 0px;">Email</label>
                                      <input  id="contractor_email" type="text" class="form-control form-txt-primary">
                                      <span id="contractor_email_error" style="color:red"></span>
                                   </div>
                                </div>


                            </div><!--End Row-->
                            </div>
                            <div class="modal-footer">
                              <button id="contractor_discard" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
                              <button id="add_contractor" type="button" class="btn btn-primary"  >Save</button>
                            </div>
                          </div>

                        </div>
                </div>   

            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contract Date</label>
                <div class="col-sm-4">
                    <input  type="text" required class="form-control fill datepicker" id="contract_date" name="contract_date" placeholder="DD/MM/YYYY">
                    <span class="messages"></span>
                </div>
                <label class="col-sm-2 col-form-label">Contract Period</label>
                <div class="col-sm-4">
                    <input  type="text" required class="form-control" id="contract_period" name="contract_period" placeholder="Contract Period">
                    <span class="messages"></span>
                </div>

            </div>

            <div class="form-group row">

                <label class="col-sm-2 col-form-label">Execution Period</label>
                <div class="col-sm-4">
                    <input  type="text" required class="form-control" id="execution_period" name="execution_period" placeholder="Execution Period">
                    <span class="messages"></span>
                </div>
                <label class="col-sm-2 col-form-label">Execution Start</label>
                <div class="col-sm-4">
                    <input  type="text" required class="form-control fill datepicker" id="execution_start_date" name="execution_start_date" placeholder="DD/MM/YYYY">
                    <span class="messages"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Completion date as per Contract</label>
                <div class="col-sm-4">
                    <input  type="hidden"  required class="form-control fill datepicker" readonly id="scheduled_completion_date1" name="scheduled_completion_date" placeholder="DD/MM/YYYY">
                    <input style="opacity:1"  type="text" disabled required class="form-control fill datepicker"  id="scheduled_completion_date" name="scheduled_completion_date1" placeholder="DD/MM/YYYY">
                    <span class="messages"></span>
                </div>
                <label class="col-sm-2 col-form-label">Time Extension</label>
                <div class="col-sm-4 input-group date">

                    <input  type="text" class="form-control fill" id="time_extension" name="time_extension" placeholder="Time Extension">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <div class="form-group row">

                <label class="col-sm-2 col-form-label">Forecasted date of completion</label>
                <div class="col-sm-4">
                    <input  type="hidden" required  class="form-control fill datepicker" id="handover_date1" name="handover_date" placeholder="DD/MM/YYYY">
                    <input style="opacity:1"  type="text" required disabled class="form-control fill datepicker" id="handover_date" name="handover_date1" placeholder="DD/MM/YYYY">
                    <span class="messages"></span>
                </div>
                <label class="col-sm-2 col-form-label">Actual Completion Date</label>
                <div class="col-sm-4">
                    <input  type="text" required class="form-control fill datepicker" id="actual_completion_date" name="actual_completion_date" placeholder="DD/MM/YYYY">
                    <span class="messages"></span>
                </div>


            </div> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Equivalent Currency</label>
                <div class="col-sm-4 input-group mb-3">

                    <div class="input-group-prepend">
                        <label class="input-group-text" id="currency_holder">&nbsp;</label>
                    </div>
                    <select class="custom-select" id="currency" name="equivalent_currency">
                        <option value=""> Select Currency</option>
                        <?php if (!empty($currencies)) { ?>
                            <?php foreach ($currencies as $currency) { ?>
                                <option rel="<?php echo $currency['symbol_left']; ?>" value="<?php echo $currency['currencies_id'] ?>"><?php echo $currency['title'] ?></option>
                            <?php } ?>
                        <?php } ?>      
                    </select>
                </div>
                <label class="col-sm-2 col-form-label">Equivalent Project Value</label>
                <div class="col-sm-4">
                    <input  type="text" required class="form-control fill" readonly id="project_value" name="project_value" placeholder="">
                    <span class="messages"></span>
                </div>
            </div> 
            <div class="form-group row">

                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-8 pull-right">
                    <button type="button" class="btn cutom-btn btn-primary pull-right" style="float: right;" id="button1">+ Add Currency</button>
                    <input type="hidden" value="1" id="count" />
                </div>
            </div>
            <div id="another_currency" >    

            </div>       


            <div class="form-group row">

                <label class="col-sm-2"></label>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                </div>
                <div class="col-sm-2" style="margin-left:-90px;">
                    <a href="<?php echo site_url('backend/project') ?>" ><button type="submit" class="btn btn-danger m-b-0">Discard</button></a>
                </div>
                <div class="col-sm-2 pull-right">
                    <a href="<?php echo site_url('project/importProject'); ?>" type="button" class="btn btn-primary m-b-0">Import From Excel</button>
                </div>
            </div>
        </form>
    </div><!--End Card Block-->
</div><!--End Card -->
<script type="text/javascript">
    $('#project_type_close').click(function(){
        $('#type_name').val('');
       
        $('#type_name_error').html("");
        $('#type_name').css('border','1px solid #ccc');
        
     });
     
    $('#project_type_discard').click(function(){
        $('#type_name').val('');
       
        $('#type_name_error').html("");
        $('#type_name').css('border','1px solid #ccc');
        
        
    });
    
    $('#add_project_type').click(function(){
        var project_type=$('#type_name').val();
        
        if(project_type==''){
            $('#type_name_error').html("Please fill type field");
            $('#type_name').css('border','1px solid red');
            return false;
        }
       
        
        $.ajax({
            type:"POST",
            url:"backend/project_owner/addProjectType",
            data:{'type':project_type},
            dataType:"json",
            success:function(data){
                if(data.status=='success'){
                        $('#type_name').val('');
                        $('#type_name_error').html("");
                        $('#type_name').css('border','1px solid #ccc');

                        var str='<option value="">Select Project Type</option>';
                        $(data.type_info).each(function(i,v){
                            if(data.last_id==v.type_id){
                                str+='<option selected value="'+v.type_id+'">'+v.type+'</option>';
                            }else{
                                str+='<option value="'+v.type_id+'">'+v.type+'</option>';
                            }
                        });
                        $('#project_type_select').html(str);
                        $('#projectTypeModal').modal('hide');
                 }else{
                     $('#type_name_error').html("This type already exist");
                     $('#type_name').css('border','1px solid red');
                 }
                 
           }
            
        });
        
    });
    
    
    $('#add_owner').click(function(){
        var owner_name=$('#owner_name').val();
        var owner_address=$('#owner_address').val();
        var owner_phone=$('#owner_phone').val();
        var owner_email=$('#owner_email').val();
        if(owner_name==''){
            $('#owner_name_error').html("Please fill name field");
            $('#owner_name').css('border','1px solid red');
            return false;
        }
        if(owner_address==''){
            $('#owner_name_error').html("");
            $('#owner_name').css('border','1px solid #ccc');
            
            $('#owner_address_error').html("Please fill address field");
            $('#owner_address').css('border','1px solid red');
            return false;
        }
        
        if(owner_phone==''){
            $('#owner_name_error').html("");
            $('#owner_name').css('border','1px solid #ccc');
            $('#owner_address_error').html("");
            $('#owner_address').css('border','1px solid #ccc');
            
            $('#owner_phone_error').html("Please fill phone field");
            $('#owner_phone').css('border','1px solid red');
            return false;
        }
        
        $.ajax({
            type:"POST",
            url:"backend/project_owner/addProjectOwner",
            data:{'fullname':owner_name,'address':owner_address,'phone':owner_phone,'email':owner_email},
            dataType:"json",
            success:function(data){
                if(data.status=='success'){
                    $('#owner_name').val('');
                    $('#owner_address').val('');
                    $('#owner_phone').val('');
                    $('#owner_email').val('');
               
                    $('#owner_name_error').html("");
                    $('#owner_name').css('border','1px solid #ccc');
                    $('#owner_address_error').html("");
                    $('#owner_address').css('border','1px solid #ccc');
                    $('#owner_phone_error').html("");
                    $('#owner_phone').css('border','1px solid #ccc');
                    
                    var str='<option value="">Select Project Owner</option>';
                    $(data.owner_info).each(function(i,v){
                        if(data.last_id==v.project_owner_id){
                            str+='<option selected value="'+v.project_owner_id+'">'+v.fullname+'</option>';
                        }else{
                            str+='<option value="'+v.project_owner_id+'">'+v.fullname+'</option>';
                        }
                    });
                    $('#owner_select').html(str);
                    $('#ownerModal').modal('hide');
                }else{
                     $('#owner_name_error').html("This owner already exist");
                     $('#owner_name').css('border','1px solid red');
                }
                
            }
            
        });
        
    });
    $('#owner_close').click(function(){
        $('#owner_name').val('');
        $('#owner_address').val('');
        $('#owner_phone').val('');
        $('#owner_email').val('');
        
        $('#owner_name_error').html("");
        $('#owner_name').css('border','1px solid #ccc');
        $('#owner_address_error').html("");
        $('#owner_address').css('border','1px solid #ccc');
        $('#owner_phone_error').html("");
        $('#owner_phone').css('border','1px solid #ccc');
        
    });
    $('#owner_discard').click(function(){
        
        $('#owner_name').val('');
        $('#owner_address').val('');
        $('#owner_phone').val('');
        $('#owner_email').val('');
        
        $('#owner_name_error').html("");
        $('#owner_name').css('border','1px solid #ccc');
        $('#owner_address_error').html("");
        $('#owner_address').css('border','1px solid #ccc');
        $('#owner_phone_error').html("");
        $('#owner_phone').css('border','1px solid #ccc');
        
    });
    
    
     $('#add_contractor').click(function(){
        var contractor_name=$('#contractor_name').val();
        var contractor_address=$('#contractor_address').val();
        var contractor_phone=$('#contractor_phone').val();
        var contractor_email=$('#contractor_email').val();
        if(contractor_name==''){
            $('#contractor_name_error').html("Please fill name field");
            $('#contractor_name').css('border','1px solid red');
            return false;
        }
        if(contractor_address==''){
            $('#contractor_name_error').html("");
            $('#contractor_name').css('border','1px solid #ccc');
            
            $('#contractor_address_error').html("Please fill address field");
            $('#contractor_address').css('border','1px solid red');
            return false;
        }
        
        if(contractor_phone==''){
            $('#contractor_name_error').html("");
            $('#contractor_name').css('border','1px solid #ccc');
            $('#contractor_address_error').html("");
            $('#contractor_address').css('border','1px solid #ccc');
            
            $('#contractor_phone_error').html("Please fill phone field");
            $('#contractor_phone').css('border','1px solid red');
            return false;
        }
        
         $.ajax({
            type:"POST",
            url:"backend/contractor/addProjectContractor",
            data:{'fullname':contractor_name,'address':contractor_address,'phone':contractor_phone,'email':contractor_email},
            dataType:"json",
            success:function(data){
                if(data.status=='success'){
                    $('#contractor_name').val('');
                    $('#contractor_address').val('');
                    $('#contractor_phone').val('');
                    $('#contractor_email').val('');

                    $('#contractor_name_error').html("");
                    $('#contractor_name').css('border','1px solid #ccc');
                    $('#contractor_address_error').html("");
                    $('#contractor_address').css('border','1px solid #ccc');
                    $('#contractor_phone_error').html("");
                    $('#contractor_phone').css('border','1px solid #ccc');
                    
                    var str='<option value="">Select Project Owner</option>';
                    $(data.contractor_info).each(function(i,v){
                        if(data.last_id==v.contractor_id){
                            str+='<option selected value="'+v.contractor_id+'">'+v.fullname+'</option>';
                        }else{
                            str+='<option value="'+v.contractor_id+'">'+v.fullname+'</option>';
                        }
                    });
                    $('#contractor_select').html(str);
                    $('#contractorModal').modal('hide');
                }else{
                     $('#contractor_name_error').html("This contractor already exist");
                     $('#contractor_name').css('border','1px solid red');
                }
            }
            
        });
        
    });
    $('#contractor_close').click(function(){
        $('#contractor_name').val('');
        $('#contractor_address').val('');
        $('#contractor_phone').val('');
        $('#contractor_email').val('');
        
        $('#contractor_name_error').html("");
        $('#contractor_name').css('border','1px solid #ccc');
        $('#contractor_address_error').html("");
        $('#contractor_address').css('border','1px solid #ccc');
        $('#contractor_phone_error').html("");
        $('#contractor_phone').css('border','1px solid #ccc');
        
    });
    $('#contractor_discard').click(function(){
        $('#contractor_name').val('');
        $('#contractor_address').val('');
        $('#contractor_phone').val('');
        $('#contractor_email').val('');
        
        $('#contractor_name_error').html("");
        $('#contractor_name').css('border','1px solid #ccc');
        $('#contractor_address_error').html("");
        $('#contractor_address').css('border','1px solid #ccc');
        $('#contractor_phone_error').html("");
        $('#contractor_phone').css('border','1px solid #ccc');
        
    });

    $('#contract_date,#contract_period,#execution_period').change(function () {
        var contact_date = $('#contract_date').val()
        var exe_period = $('#execution_period').val();
        var period = $('#contract_period').val();
        var time_extension = $('#time_extension').val();

        if (exe_period){
            var rem = Number(period) - Number(exe_period);
        }else{
            var rem = 0;
        }
        if (contact_date == '') {
            return false;
        }
        var pattern = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
        var arrayDate = contact_date.match(pattern);
        var today = new Date(arrayDate[3], arrayDate[2] - 1, arrayDate[1]);

        var execution_start_date = addDays(today, rem);
        if (exe_period){
         var hand_over_date = addDays(execution_start_date, exe_period);
        }else{
            var hand_over_date = addDays(today, period);
        }
        $('#execution_start_date').val(get_format(execution_start_date));
      $('#execution_start_date').datepicker('setStartDate', dateToDMY(execution_start_date));
        $('#scheduled_completion_date').val(get_format(hand_over_date));
        $('#scheduled_completion_date1').val(get_format(hand_over_date));
        if(time_extension){
             var hand_over_date = addDays(hand_over_date, time_extension);
        }
        $('#handover_date').val(get_format(hand_over_date));
        $('#handover_date1').val(get_format(hand_over_date));
        $('#actual_completion_date').datepicker('setStartDate', dateToDMY(hand_over_date));
        $('#actual_completion_date').val(get_format(hand_over_date));
        $('.datepicker').datepicker('update');
       // alert(dateToYMD(get_format(hand_over_date)))
        
    })
    $('#time_extension').change(function () {
      var contact_date = $('#contract_date').val()
        var exe_period = $('#execution_period').val();
        var period = $('#contract_period').val();
        var time_extension = $('#time_extension').val();

        if (exe_period){
            var rem = Number(period) - Number(exe_period);
        }else{
            var rem = 0;
        }
        if (contact_date == '') {
            return false;
        }
        var pattern = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
        var arrayDate =  $('#execution_start_date').val().match(pattern);
        var today = new Date(arrayDate[3], arrayDate[2] - 1, arrayDate[1]);
        var pattern = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
        var arrayDate = contact_date.match(pattern);
        var contact_date = new Date(arrayDate[3], arrayDate[2] - 1, arrayDate[1]);

        var execution_start_date = today;
        if (exe_period){
         var hand_over_date = addDays(execution_start_date, exe_period);
        }else{
            var hand_over_date = addDays(today, period);
        }
        $('#execution_start_date').val(get_format(execution_start_date));
        $('#execution_start_date').datepicker('setStartDate', dateToDMY(contact_date));
        $('#scheduled_completion_date').val(get_format(hand_over_date));
        $('#scheduled_completion_date1').val(get_format(hand_over_date));
        if(time_extension){
             var hand_over_date = addDays(hand_over_date, time_extension);
        }
        $('#handover_date').val(get_format(hand_over_date));
        $('#handover_date1').val(get_format(hand_over_date));
        $('#actual_completion_date').datepicker('setStartDate', dateToDMY(hand_over_date));
        $('#actual_completion_date').val(get_format(hand_over_date));
        $('.datepicker').datepicker('update');
       // alert(dateToYMD(get_format(hand_over_date)))
        
    })
    $('#execution_start_date').change(function () {
        var contact_date = $('#contract_date').val()
        var exe_period = $('#execution_period').val();
        var period = $('#contract_period').val();
        var time_extension = $('#time_extension').val();

        if (exe_period){
            var rem = Number(period) - Number(exe_period);
        }else{
            var rem = 0;
        }
        if (contact_date == '') {
            return false;
        }
        var pattern = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
        var arrayDate = $(this).val().match(pattern);
        var today = new Date(arrayDate[3], arrayDate[2] - 1, arrayDate[1]);
        var pattern = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
        var arrayDate = contact_date.match(pattern);
        var contact_date = new Date(arrayDate[3], arrayDate[2] - 1, arrayDate[1]);

        var execution_start_date = today;
        if (exe_period){
         var hand_over_date = addDays(execution_start_date, exe_period);
        }else{
            var hand_over_date = addDays(today, period);
        }
        $('#execution_start_date').val(get_format(execution_start_date));
      $('#execution_start_date').datepicker('setStartDate', dateToDMY(contact_date));
        $('#scheduled_completion_date').val(get_format(hand_over_date));
        $('#scheduled_completion_date1').val(get_format(hand_over_date));
        if(time_extension){
             var hand_over_date = addDays(hand_over_date, time_extension);
        }
        $('#handover_date').val(get_format(hand_over_date));
        $('#handover_date1').val(get_format(hand_over_date));
        $('#actual_completion_date').datepicker('setStartDate', dateToDMY(hand_over_date));
        $('#actual_completion_date').val(get_format(hand_over_date));
        $('.datepicker').datepicker('update');
       // alert(dateToYMD(get_format(hand_over_date)))
        
    })



    function change_country() {
        var country = $('#country').val();
        if (country != '') {
            $.ajax({
                type: "POST",
                url: "project/get_division_list",
                data: "country=" + country,
                dataType: "html",
                success: function (result) {
                    $('#division').html(result);
                }
            });
        }
    }
    function get_district_list() {
        var country = $('#country').val();
        var division = $('#division').val();
        if (country != '' && division != '') {
            $.ajax({
                type: "POST",
                url: "project/get_district_list",
                data: {"country": country, "division": division},
                dataType: "html",
                success: function (result) {
                    $('#district').html(result);
                }
            });
        }
    }
    function get_upazila_list() {
        var country = $('#country').val();
        var division = $('#division').val();
        var district = $('#district').val();
        if (country != '' && division != '' && district != '') {
            $.ajax({
                type: "POST",
                url: "project/get_upazila_list",
                data: {"country": country, "division": division,'district':district},
                dataType: "html",
                success: function (result) {
                    $('#upazila').html(result);
                }
            });
        }
    }
    $('#button1').click(function () {
        var count = $('#count').val();
        var curStr = $('#currency').html();
        var str = '<div class="form-group row" id="row_' + count + '" >';
        str += '<label class="col-sm-2 col-form-label">Chose Currency<sup style="color:red">*</sup></label>';
        str += '<div class="col-sm-3 input-group mb-3"> <div class="input-group-prepend"><label class="input-group-text" class="currency_holder">&nbsp;</label></div><select name="currency_id[]" id="currency_' + count + '" onchange="javascript: changeCurrency(this)" class="currency form-control  col-sm-10" style="float:left;" >' + curStr + '</select><button type="button" class="btn cutom-btn btn-danger m-b-0" id="button2" onclick="removeRow(' + (Number(count)) + ')">-</button></div>';
        str += '<div class="col-sm-3 input-group mb-3"><div class="input-group-prepend"><label class="input-group-text" class="currency_holder">&nbsp;</label></div><input value="1" type="text" required class="form-control fill currency_rate" name="currency_rate[]" onchange="calculateProjectValue()" placeholder="Exchange Rate"></div> <div class="col-sm-3">';
        str += ' <input type="text" required class="form-control fill project_value" name="equivalant_value[]" onchange="calculateProjectValue()" placeholder="Project Value"><span class="messages"></span> </div>';
        str += '</div>';
        $('#count').val(Number(count) + 1);
        $('#another_currency').append(str);
    });

    function removeRow(row) {
        var r = confirm("Are you sure?");
        if (r == true) {
            $('#row_' + row).remove();
        }
calculateProjectValue();
    }
    $('#currency').change(function () {
        $('#currency_holder').html($(this).find('option:selected').attr('rel'))
    })
    function changeCurrency(ev) {
        var curr_sym = $('#currency option:selected').attr('rel');
        $(ev).parent('.input-group').find('label').html($(ev).find('option:selected').attr('rel'))
        $(ev).parent('.input-group').next('div').find('label').html( '1' + curr_sym + ' = '+'? ' + $(ev).find('option:selected').attr('rel'));
//        var aa = Number($('#currency option:selected').data('content'));
//        var bb = Number($(ev).find('option:selected').data('content'));
//        var ex_rate = Number(aa / bb);
//        $(ev).parent('.input-group').next('div').find('.currency_rate').val(ex_rate.toFixed(6));
        calculateProjectValue();
    }

    function calculateProjectValue() {
        //    var curr = $('#currency').val();
        //    var curr_value = $('#currency option:selected').data('content');
        var total_amt = 0;
        $('.currency').each(function (row, val) {
            var current_rate = $(this).parents('.form-group').find('.currency_rate').val();
            var current_value = $(this).parents('.form-group').find('.project_value').val();
            total_amt += Number(current_value/current_rate);
        })
        $('#project_value').val(total_amt.toFixed(0));

    }

</script>