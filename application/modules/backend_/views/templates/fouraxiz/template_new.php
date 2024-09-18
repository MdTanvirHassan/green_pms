<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<html lang="en">
    <?php require_once 'elements/head.php'; ?>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2">
                </div>
                <div id="content" class="col-lg-12 col-md-12 col-sm-12">
                    <style>

    .dropdown-menu > li > a {
        display: block;
        padding: 3px 20px;
        clear: both;
        font-weight: 400;
        line-height: 1.42857143;
        color: #333;
        white-space: nowrap;
    }

    Department List
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


    .form-group {
        margin-bottom: 0em;
    }
    label{
        font-size: 12px;
    }
    .discard{
        border: none;
        background: #FF0000;
        color:#ffffff;
        font-size: 12px;
        padding: 3px 10px;
    }
    .save{
        border: none;
        background: #00FF00;
        color:#ffffff;
        font-size: 12px;
        padding: 3px 10px;
    }
    .font-large-2 {
        font-size: 2rem !important;
    }
    .bg-info {

        height: 43px;
        background-color: #2d6183 !important;

    }

    .p-2 {
        padding: 0.5rem 1.0rem !important;
    }


    select.form-control,select.form-control:hover {
        font-size: 14px;
        border-radius: 2px;
        border: 1px solid #ccc;
    }
    .notification{
        top:-58px !important;
        left:-21px !important;
    }
    #moderator_header i{
        font-size:25px;
    }
    .nav-link .fa-cog{
       color:#3B2314; 
    }
     .nav-link .fa-thumbs-o-up{
       color:#8CC63E; 
    }
    .nav-link .fa-exclamation-triangle{
       color:red; 
    }
    .nav-link .fa-users{
       color:#262261;
    }
    
    .nav-link .fa-bell-o{
       color:#F05A28 
    }
    .nav-link.active i{
       color:#4099ff; 
    }

</style>
<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
            <!-- [ page content ] start -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- Tab variant tab card start -->
                    <div class="card" style="margin-top: 30px;">

                        <div class="card-block tab-icon">
                            <!-- Row start -->
                            <div class="row">
                                <div class="col-lg-12 col-xl-12">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs md-tabs " id="moderator_header" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link <?php if($this->menu=='moderator') echo 'active'; ?>" href="<?php echo site_url('moderator'); ?>" ><i class=" fa fa-cog"></i><br>Ongoing Projects</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php if($this->menu=='completed_project') echo 'active'; ?>" href="<?php echo site_url('moderator/completed_project'); ?>"><i style="" class="fa fa-thumbs-o-up"></i><br>Completed Project</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php if($this->menu=='critical_task') echo 'active'; ?>"  href="<?php echo site_url('criticaltask'); ?>" ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><br>Alerting Tasks</a>
                                            <div class="slide"></div>
                                        </li>

<!--                                        <li class="nav-item">
                                            <a class="nav-link <?php if($this->menu=='user_list') echo 'active'; ?>"  href="<?php echo site_url('request/userList'); ?>" ><i  class="fa fa-users"></i><br>Employee List</a>
                                            <div class="slide"></div>
                                        </li>-->
                                        <li class="nav-item">
                                            <a class="nav-link <?php if($this->menu=='request') echo 'active'; ?>" href="<?php echo site_url('request'); ?>" role="tab"> <i class="fa fa-bell-o"></i><span class="badge bg-c-red notification-count" style="position:absolute;top:3px;padding-top:3px;color:#ffffff;"></span><br>Notifications</a>
<!--                                            <a class="nav-link <?php if($this->menu=='request') echo 'active'; ?>" href="<?php echo site_url('request'); ?>" role="tab"> <i class="feather icon-bell"></i><br>Options</a>-->
                                            <div class="dropdown-primary dropdown">
                                       
                                            <ul class="notification show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                
                                                
                                                
                                                
                                            </ul>
                                        </div>
                                            <div class="slide"></div>
                                        </li>
                                     <li class="user-profile header-notification nav-item">

                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img style="width: 65px;" src="<?php echo !empty($this->session->userdata('user_logo')) ? site_url('images/users').'/'.$this->session->userdata('user_logo') :site_url().'/images/user.png'; ?>" class="img-radius" alt="User-Profile-Image">
                                        <span><?php echo $this->session->userdata('user_name'); ?></span>
                                        
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    
                                        <li>
                                            <a href="<?php echo site_url('moderator/profile')?>">
                                            <i class="feather icon-user"></i> Profile

                                        </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('login/logOut')?>">
                                            <i class="feather icon-log-out"></i> Logout

                                        </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                                    </ul>
                                    <!-- Tab panes -->

                                </div>

                            </div>
                            <!-- Row end -->
                        </div>
                    </div>
                    <!-- Tab variant tab card start -->
                </div>
            </div>
                    {{CONTENT}}
                </div>
            </div>
        </div>
        <?php require_once 'elements/footer.php'; ?>
    </body>
</html>