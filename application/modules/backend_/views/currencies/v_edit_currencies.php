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
        <h5>Edit Currencies</h5>
        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
    </div>
    <div class="card-block">
        <form id="main" method="post" aenctype="multipart/form-data" action="<?php echo site_url('currencies/addEditCurrencies'); ?>/<?php if (!empty($currencies_info[0]['currencies_id'])) echo $currencies_info[0]['currencies_id']; ?>" >
            <div class="col-md-12">
                <div class="col-md-6 pull-left" style="float: left;">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Title<sup style="color:red;">*</sup></label>
                        <div class="col-sm-8">
                            <input  type="text" required class="form-control" name="title" value="<?php if (!empty($currencies_info[0]['title'])) echo $currencies_info[0]['title']; ?>" id="title" placeholder="Title">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Code<sup style="color:red;">*</sup></label>
                        <div class="col-sm-8">
                            <input  type="text" required class="form-control" id="code" value="<?php if (!empty($currencies_info[0]['code'])) echo $currencies_info[0]['code']; ?>" name="code" placeholder="Code">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Symbol <sup style="color:red;">*</sup></label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" id="symbol_left" name="symbol_left" placeholder="Symbol" value="<?php if (!empty($currencies_info[0]['symbol_left'])) echo $currencies_info[0]['symbol_left']; ?>">
                            <span class="messages"></span>
                        </div>
                    </div>
<div class="form-group row">
                        <label class="col-sm-4"></label>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                        </div>
                        <div class="col-sm-4" style="margin-left:-90px;">
                            <a href="<?php echo site_url('backend/currencies') ?>" ><button type="button" class="btn btn-danger m-b-0">Discard</button></a>
                        </div>
                    </div>
<!--                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Symbol Left</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="symbol_left" value="<?php if (!empty($currencies_info[0]['symbol_left'])) echo $currencies_info[0]['symbol_left']; ?>" name="symbol_left" placeholder="Symbol Left">
                            <span class="messages"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Symbol Right</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control" id="symbol_right" value="<?php if (!empty($currencies_info[0]['symbol_right'])) echo $currencies_info[0]['symbol_right']; ?>" name="symbol_right" placeholder="Symbol Right">
                            <span class="messages"></span>
                        </div>
                    </div>-->
                  
                </div>
<!--                <div class="col-md-6 pull-right" style="float: right;">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Thousands Point</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control" id="thousands_point" value="<?php if (!empty($currencies_info[0]['thousands_point'])) echo $currencies_info[0]['thousands_point']; ?>" name="thousands_point" placeholder="Thousands Point">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Decimal Places</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control" id="decimal_places" value="<?php if (!empty($currencies_info[0]['decimal_places'])) echo $currencies_info[0]['decimal_places']; ?>" name="decimal_places" placeholder="Decimal Places">
                            <span class="messages"></span>
                        </div>
                    </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Decimal Point</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control" id="decimal_point" value="<?php if (!empty($currencies_info[0]['decimal_point'])) echo $currencies_info[0]['decimal_point']; ?>" name="decimal_point" placeholder="Decimal Point">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Decimal Precise</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control" id="decimal_precise" value="<?php if (!empty($currencies_info[0]['decimal_precise'])) echo $currencies_info[0]['decimal_precise']; ?>" name="decimal_precise" placeholder="Decimal Precise">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Value</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control" id="value" value="<?php if (!empty($currencies_info[0]['value'])) echo $currencies_info[0]['value']; ?>" name="value" placeholder="Value">
                            <span class="messages"></span>
                        </div>
                    </div>



                    
                </div>-->
            </div>
        </form>
    </div><!--End Card Block-->
</div><!--End Card -->

