<style type="text/css">
    .dropdown-menu > li > a {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    color: #333;
    white-space: nowrap;
}


.dropdown i {
    margin-right: 0.5rem;
}
.btn {
    border-radius: 2px;
    text-transform: capitalize;
    font-size: 15px;
    padding: 3px 9px;
    cursor: pointer;
}
</style>
<div class="right_col" style="padding-bottom:20px;">
   
    
   
    
            <div class="card">
                    <div class="card-header">
                        <h5>Currencies</h5>
                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                      </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                        <table id="order-table" class="table table-bordered nowrap">
                            <thead>
                                <tr>
                                 <!--   <th style="width:1%;">SL</th>-->
                                    <th style="width: 15%;">Title</th>
                                    <th style="width: 10%;">Code </th>
                                   <th style="width: 10%;">Symbol</th>
                                   <!-- 
                                    <th style="width: 15%;">Symbol Right</th>
                                    <th style="width: 15%;">Decimal Point</th>
                                    <th style="width: 14%;">Decimal Place</th>-->
                                    <!--<th style="width: 20%;">Value</th>-->
                                    <th style="width: 1%;"> </th>

                                </tr>
                            </thead>
                            <tbody id="currencyBody">
                                  <?php if (count($currencies)) {
                                                $i=0;
                                                foreach ($currencies as $currencie) { 
                                                    $i++;
                                                    ?>
                                                    <tr>
                                                       <!-- <td><?php echo $i; ?></td>-->
                                                        <td>
                                                            <?php echo $currencie['title']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $currencie['code']; ?>
                                                        </td>
                                                         <td>
                                                            <?php echo $currencie['symbol_left']; ?>
                                                        </td>

<!--                                                       <td>
                                                            <?php echo $currencie['symbol_left']; ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $currencie['symbol_right']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $currencie['decimal_point']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $currencie['decimal_places']; ?>
                                                        </td>-->
<!--                                                        <td>
                                                            <?php //echo $currencie['value']; ?>
                                                        </td>-->

                                                        <td>
                                                            <div class="dropdown">
                                                               <i class="  fa fa-cogs" data-toggle="dropdown"></i>
                                                               
                                                                 <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                                     <!--
                                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('currencies/addEditCurrencies/'.$currencie['currencies_id']); ?>"><i class="fa fa-edit"></i>Edit</a></li>
                                                                    <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:delete_row('<?php echo site_url('currencies/deleteCurrencies/'.$currencie['currencies_id']); ?>')" ><i class="fa fa-trash"></i>Delete</a></li>
                                                                    -->
                                                                    <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:editProjectCurrency('<?php echo $currencie['currencies_id']; ?>')" ><i class="fa fa-trash"></i>Edit</a></li>
                                                                    <li role="presentation"><a  role="menuitem" tabindex="-1" href="javascript:deleteProjectCurrency('<?php echo $currencie['currencies_id']; ?>')" ><i class="fa fa-trash"></i>Delete</a></li>
                                                                    
                                                                  </ul>
                                                              </div>
                                                     
                                                        </td>
                                                    </tr>
                                    <?php }
                                } ?>

                            </tbody>
                          
                        </table>
                    </div>
                    </div>
            </div>
    
  </div>
<script type="text/javascript">
    $('#currencyBody').sortable();
    
     function editProjectCurrency(currencies_id = ''){
        var r = confirm("Are you sure?");
        if(r == true){
            var r_status=validate_password();
            if(r_status==true){
                window.location.replace('<?php echo site_url("currencies/addEditCurrencies"); ?>'+'/'+currencies_id);
            }
        }
    }
    
     function deleteProjectCurrency(currencies_id = ''){
        var r = confirm("Are you sure?");
        if (r == true){
            var r_status=validate_password();
             if (r_status==true){
                $.ajax({
                type:"POST",
                        url:"backend/currencies/deleteProjectCurrency",
                        data:{currencies_id:currencies_id},
                        dataType: "json",
                        success: function (data) {          
                            if(data.status=='success'){
                                alert('Successfully Deleted');
                            }else if(data.status=='failed'){
                                alert('Not Deleted');
                            }else{
                                alert('Currency already assigned in project');
                            }    
                            location.reload();
                        }
                })
            }
        }

    }
</script>