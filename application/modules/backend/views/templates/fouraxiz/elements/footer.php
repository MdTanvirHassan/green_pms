<!-- footer content -->
<footer>
    <div class="pull-right" style="text-align:center;font-style: italic;">
        <?php echo $this->config->item['footer']; ?> | Designed & Developed By <a href="http://4axiz.com">4axiz It Ltd</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
<style>
    .fa-cogs{
        color:#4099FF !important;
        cursor: pointer;
    }
    .modal-header {
    cursor: move;
}
</style>
<script type="text/javascript">
    $(function () {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose:true
        });
//        $('.datetimepicker').datetimepicker();
           notification();
        
    });
    $('.js-example-data-array').select2({
        placeholder: 'Select an option',
        width: '100%'
    });
    
       $(function () {
       if('<?php echo $this->session->userdata('toogle'); ?>'=='close'){
           $('#pcoded').attr('vertical-nav-type','offcanvas');
             $('#mobile-collapse i').toggleClass('icon-toggle-right');
        $('#mobile-collapse i').toggleClass('icon-toggle-left');
           
    }
  });
    
    function delete_row(url) {
    bootbox.confirm({
        message: "<div class='boot-header'>YOU ARE ABOUT TO REMOVE A DATA ENTRY ! ARE YOU SURE ?</div><div class='boot-text'>You will not be able to retrive this data back !</div>",
        buttons: {
            confirm: {
                label: 'YES, DELETE',
                className: 'boot-confirm'
            },
            cancel: {
                label: 'CANCEL',
                className: 'boot-no'
            }
        },
        callback: function (result) {
            if (result == true)
                location.href = url;

        }
    });
}

function notification() {
       
        $.ajax({
            type: "POST",
            url: "backend/moderator/notification",
            dataType: "json",
            success: function (data) {
                 
                var tag ='';
                if (data.length) {

                    var count = data.length;
                    if(count != 0){
                      $('.notification-count').html(count);  
                    }
                    
                    
//                    $.each(data, function (i, v) {
//                        
//                        var str = data[i]['title'];
//                        var url=v.url;
//                        var title = str.substring(0, 16);
//                        var rex = /(<([^>]+)>)/ig;
//                        var str1 = v.description;
//                        var str2 = str1.replace(rex, " ");
//                        var description = str2.substring(0, 30);
//                        tag += '<li><div class="media"><div class="media-body">';
//                        tag +='<h5 class="notification-user">'+title+'</h5>';
//                        tag +=' <p class="notification-msg">'+description+'</p>';
//                        tag +='<span class="notification-time">'+data[i]['time']+'</span>';
//                        
//                        tag +=' </li>';
//                        
//                       
//                    });
                   
                }
                //$('.notification').html(tag);
            }
        });
        setTimeout(notification, 12000);
    }
</script>



<script>
 
    var unsaved = false;

    $(":input,select,textarea").change(function () { //trigers change in all input fields including text type
        $(':input[type="button"]').prop('disabled', false);
        $(':input[type="submit"]').prop('disabled', false);
         unsaved = true;
    });



    $(document).ready(function () {
        $(window).bind("beforeunload", function () {
            if (unsaved == true)
                return 'Are you sure ?';
        });
    });
    $(document).on("submit", "form", function (event) {
        $(window).unbind('beforeunload');
    });
</script>

<script>
    $(".modal-header").on("mousedown", function(mousedownEvt) {
    var $draggable = $(this);
    var x = mousedownEvt.pageX - $draggable.offset().left,
        y = mousedownEvt.pageY - $draggable.offset().top;
    $("body").on("mousemove.draggable", function(mousemoveEvt) {
        $draggable.closest(".modal-dialog").offset({
            "left": mousemoveEvt.pageX - x,
            "top": mousemoveEvt.pageY - y
        });
    });
    $("body").one("mouseup", function() {
        $("body").off("mousemove.draggable");
    });
    $draggable.closest(".modal").one("bs.modal.hide", function() {
        $("body").off("mousemove.draggable");
    });
});
    
    </script>