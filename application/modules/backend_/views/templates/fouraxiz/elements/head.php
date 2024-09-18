<head>     
    <title><?php echo $this->data['title']; ?></title>
    <base href="<?php echo base_url(); ?>" />
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    outside css-->
    <script type="text/javascript">
        var site_url = "<?php echo site_url(); ?>";

    </script>
    <!--Table Row Sortable-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">  
    <!--End Table Row Sortable-->
    
    <link rel="icon" href="<?php echo site_url(); ?>files/assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>custom.css">
    <link rel="stylesheet" href="<?php echo site_url(); ?>files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>files/assets/icon/feather/css/feather.css">
    <!-- font-awesome-n -->
    <!--<link href="<?php echo site_url(); ?>vendors/font-awesome/css/font-awesome_new.css" rel="stylesheet">-->
    <link href="<?php echo site_url(); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
    
    
    <!-- Select 2 css -->
    <link rel="stylesheet" href="<?php echo site_url(); ?>files/bower_components/select2/css/select2.min.css" />
    <!-- Multi Select css -->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>files/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>files/bower_components/multiselect/css/multi-select.css" />
    
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <!-- Chartlist chart css -->
    <link rel="stylesheet" href="<?php echo site_url(); ?>files/bower_components/chartist/css/chartist.css" type="text/css" media="all">
    <!-- Style.css -->
    
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>files/assets/css/widget.css">
    
   <!-- Date-time picker css -->
      <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>css/datepicker.css">
      <!-- Date-range picker css  -->
<!--      <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>files/bower_components/bootstrap-daterangepicker/css/daterangepicker.css" />-->


    <!-- jQuery -->
    <script src="<?php echo site_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
   
  
<script src="<?php echo site_url(); ?>js/common/common.js"></script>
<script src="<?php echo site_url(); ?>vendors/bootstrap/bootbox.min.js"></script>


<!--<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="../files/bower_components/jquery/js/jquery.min.js"></script>-->
<script type="text/javascript" src="<?php echo site_url(); ?>files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>files/bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- waves js -->
<script src="<?php echo site_url(); ?>files/assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?php echo site_url(); ?>files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<!-- Select 2 js -->
<script type="text/javascript" src="<?php echo site_url(); ?>files/bower_components/select2/js/select2.full.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>files/bower_components/multiselect/js/jquery.multi-select.js"></script>
<!--<script type="text/javascript" src="<?php echo site_url(); ?>files/assets/js/jquery.quicksearch.js"></script>-->


<!-- Bootstrap date-time-picker js -->
<script type="text/javascript" src="<?php echo site_url(); ?>files/assets/pages/advance-elements/moment-with-locales.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>js/bootstrap-datepicker.js"></script>
<!--<script type="text/javascript" src="<?php echo site_url(); ?>files/assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>-->
<!-- Date-range picker js -->
<!--<script type="text/javascript" src="<?php echo site_url(); ?>files/bower_components/bootstrap-daterangepicker/js/daterangepicker.js"></script>-->

<!-- modernizr js -->
<!--<script type="text/javascript" src="<?php echo site_url(); ?>files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>files/bower_components/modernizr/js/css-scrollbars.js"></script>-->
<!-- data-table js -->
<script src="<?php echo site_url(); ?>files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo site_url(); ?>files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<!--<script src="<?php echo site_url(); ?>files/assets/pages/data-table/js/jszip.min.js"></script>
<script src="<?php echo site_url(); ?>files/assets/pages/data-table/js/pdfmake.min.js"></script>-->
<!--<script src="<?php echo site_url(); ?>files/assets/pages/data-table/js/vfs_fonts.js"></script>
<script src="<?php echo site_url(); ?>files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo site_url(); ?>files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>-->
<script src="<?php echo site_url(); ?>files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo site_url(); ?>files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo site_url(); ?>files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>



<!-- Float Chart js -->
<!--<script src="<?php echo site_url(); ?>files/assets/pages/chart/float/jquery.flot.js"></script>
<script src="<?php echo site_url(); ?>files/assets/pages/chart/float/jquery.flot.categories.js"></script>
<script src="<?php echo site_url(); ?>files/assets/pages/chart/float/curvedLines.js"></script>
<script src="<?php echo site_url(); ?>files/assets/pages/chart/float/jquery.flot.tooltip.min.js"></script>-->
 <!--Chartlist charts--> 
<script src="<?php echo site_url(); ?>files/bower_components/chartist/js/chartist.js"></script>
 <!--amchart js--> 
<script src="<?php echo site_url(); ?>files/assets/pages/widget/amchart/amcharts.js"></script>
<script src="<?php echo site_url(); ?>files/assets/pages/widget/amchart/serial.js"></script>
<script src="<?php echo site_url(); ?>files/assets/pages/widget/amchart/light.js"></script>
<!-- Custom js -->
<script src="<?php echo site_url(); ?>files/assets/pages/data-table/js/data-table-custom.js"></script>
<script src="<?php echo site_url(); ?>files/assets/js/pcoded.min.js"></script>
<script src="<?php echo site_url(); ?>files/assets/js/vertical/vertical-layout.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>files/assets/pages/dashboard/custom-dashboard.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>files/assets/js/script.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<!--<script async src="../../../../www.googletagmanager.com/gtag/jsa055?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>-->
<link href="<?php echo site_url(); ?>uploader_css/default.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo site_url(); ?>uploader_js/plupload.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>uploader_js/plupload.silverlight.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>uploader_js/plupload.flash.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>uploader_js/plupload.html4.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>uploader_js/plupload.html5.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>uploader_js/jquery.plupload.queue.js"></script>

<!--
<link href="<?php echo site_url(); ?>css/tableorder/jquery.orderable.css" rel="stylesheet">
<script src="<?php echo site_url(); ?>js/tableorder/jquery.orderable.js"></script>
-->



</head>
<style>
    .flash_message {
        background-color: #fff;
        border-bottom: 2px solid #62a60a;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        color: green;
        display: none;
        font-size: 20px;
        height: 35px;
        left: 0;
        line-height: 35px;
        position: fixed;
        text-align: center;
        top: 0;
        width: 100%;
        z-index: 9999;
    }
</style>
<div class="flash_message"></div>
<?php
$msg = $this->session->flashdata("msg");
if (!empty($msg)) {
    ?>
    <script type="text/javascript">
            msg = "<?php echo $msg; ?>";
            $('.flash_message').html(msg);
            $('.flash_message').show();
            setTimeout(function () {
                $('.flash_message').hide();
            }, 2000);
    </script>
<?php } ?>
  