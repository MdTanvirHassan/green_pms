<div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="<?php echo site_url('backend/dashboard/module_list'); ?>">
                            <img class="img-fluid" src="<?php echo site_url('images/'.$this->config->item['logo']); ?>" style="width:150px;max-height:60px;" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu icon-toggle-right"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <!--
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close">
										<i class="feather icon-x input-group-text"></i>
									</span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn">
										<i class="feather icon-search input-group-text"></i>
									</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                <i class="full-screen feather icon-maximize"></i>
                            </a>
                            </li>
                            -->
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">

                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <span>Module List</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="https://fouraxiz.com/green_pms/dashboard" target="_blank">
                                            <i class="feather icon-settings"></i> Project Management
                                        </a>
                                        </li>
                                        <li>
                                            <a href="https://fouraxiz.com/green_supply_chain/backend/general_store/currentStock" target="_blank">
                                            <i class="feather icon-settings"></i> Inventory
                                        </a>
                                        </li>
                                        <li>
                                            <a href="https://fouraxiz.com/green_supply_chain/backend/general_store/ipo_material_indent" target="_blank">
                                            <i class="feather icon-settings"></i> Procurement
                                        </a>
                                        </li>
                                        <li>
                                            <a href="https://fouraxiz.com/green_supply_chain/backend/general_store/consumption" target="_blank">
                                            <i class="feather icon-settings"></i> Consumption
                                        </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" >
                                        <a style="padding:0px;" class="" href="<?php echo site_url('dashboard/request'); ?>" role="tab">
                                        <i class="feather icon-bell"></i>
                                        <span class="badge bg-c-red notification-count"></span>
                                        </a>
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">No Notification Found</label>
                                        </li>
<!--                                        <li>
                                            <div class="media">
                                                <img class="img-radius" src="<?php echo site_url(); ?>files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">John Doe</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius" src="<?php echo site_url(); ?>files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Joseph William</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius" src="<?php echo site_url(); ?>files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Sara Soudein</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>-->
                                    </ul>
                                </div>
                            </li>
                            
                            <li class="user-profile header-notification">

                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="<?php echo !empty($this->session->userdata('user_logo')) ? site_url('images/users').'/'.$this->session->userdata('user_logo') :site_url().'/images/user.png'; ?>" class="img-radius" alt="User-Profile-Image">
                                        <span><?php echo $this->session->userdata('user_name'); ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="<?php echo site_url('dashboard/settings')?>">
                                            <i class="feather icon-settings"></i> Settings

                                        </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('login/profile')?>">
                                            <i class="feather icon-user"></i> Profile

                                        </a>
                                        </li>
<!--                                        <li>
                                            <a href="email-inbox.html">
                                            <i class="feather icon-mail"></i> My Messages

                                        </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.html">
                                            <i class="feather icon-lock"></i> Lock Screen

                                        </a>
                                        </li>-->
                                        <li>
                                            <a href="<?php echo site_url('login/logOut')?>">
                                            <i class="feather icon-log-out"></i> Logout

                                        </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>