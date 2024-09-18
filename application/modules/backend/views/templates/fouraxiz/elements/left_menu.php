<div class="nav-list">
    <div class="pcoded-inner-navbar main-menu">
        <ul class="pcoded-item pcoded-left-item">

            <li <?php if ($this->menu == 'dashboard' && $this->sub_menu == 'dashboard') echo 'class="active"'; ?>>
                <a href="<?php echo site_url('backend/dashboard'); ?>" class="waves-effect waves-dark">
                    <span class="pcoded-micon">
                        <i class="feather icon-bookmark"></i>
                    </span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>

            </li>


        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu <?php if ($this->menu == 'project') echo 'pcoded-trigger active'; ?>">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Project Management</span>
                </a>
                <ul class="pcoded-submenu">
                    <li <?php if ($this->sub_menu == 'add_project') echo 'class="active"'; ?>>
                        <a href="<?php echo site_url('backend/project/addEditProject'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Create New Project</span>
                        </a>
                    </li>
                    <li <?php if ($this->sub_menu == 'project_list') echo 'class="active"'; ?>>
                        <a href="<?php echo site_url('backend/project'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Project List</span>
                        </a>
                    </li>
                    <li <?php if ($this->sub_menu == 'project_list') echo 'class="active"'; ?>>
                        <a href="<?php echo site_url('project/importProject'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Bulk Upload Project</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="pcoded-hasmenu <?php if ($this->menu == 'user') echo 'pcoded-trigger active'; ?>">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                    <span class="pcoded-mtext">User Management</span>

                </a>
                <ul class="pcoded-submenu">
                    <li <?php if ($this->sub_menu == 'add_user') echo 'class="active"'; ?>>
                        <a href="<?php echo site_url('backend/user/addEditUser');  ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Create User</span>
                        </a>

                    </li>

                    <li <?php if ($this->sub_menu == 'user_list') echo 'class="active"'; ?>>
                        <a href="<?php echo site_url('backend/user');  ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">User List</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu <?php if ($this->menu == 'project_owner') echo 'pcoded-trigger active'; ?>">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                    <span class="pcoded-mtext">Project Owner</span>

                </a>
                <ul class="pcoded-submenu">
                    <li <?php if ($this->sub_menu == 'add_project_owner') echo 'class="active"'; ?>>
                        <a href="<?php echo site_url('backend/project_owner/addEditProjectOwner'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">New Project Owner</span>
                        </a>

                    </li>

                    <li <?php if ($this->sub_menu == 'project_owner_list') echo 'class="active"'; ?>>
                        <a href="<?php echo site_url('backend/project_owner'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Project Owner List</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu <?php if ($this->menu == 'contractor') echo 'pcoded-trigger active'; ?>">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                    <span class="pcoded-mtext">Contractor</span>

                </a>
                <ul class="pcoded-submenu">
                    <li <?php if ($this->sub_menu == 'add_contractor') echo 'class="active"'; ?>>
                        <a href="<?php echo site_url('backend/contractor/addEditContractor'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">New Contractor</span>
                        </a>

                    </li>

                    <li <?php if ($this->sub_menu == 'contractor_list') echo 'class="active"'; ?>>
                        <a href="<?php echo site_url('backend/contractor'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Contractor List</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu <?php if ($this->menu == 'project_type') echo 'pcoded-trigger active'; ?>">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                    <span class="pcoded-mtext">Project Type</span>

                </a>
                <ul class="pcoded-submenu">
                    <li <?php if ($this->sub_menu == 'add_typer') echo 'class="active"'; ?>>
                        <a href="<?php echo site_url('backend/project_type/addEditproject_type'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">New Project Type</span>
                        </a>

                    </li>

                    <li <?php if ($this->sub_menu == 'type_list') echo 'class="active"'; ?>>
                        <a href="<?php echo site_url('backend/project_type'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Project Type List</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu <?php if ($this->menu == 'currencies') echo 'pcoded-trigger active'; ?>">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                    <span class="pcoded-mtext">Currencies</span>

                </a>
                <ul class="pcoded-submenu">
                    <li <?php if ($this->sub_menu == 'add_currencies') echo 'class="active"'; ?>>
                        <a href="<?php echo site_url('backend/currencies/addEditCurrencies');  ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">New Currency</span>
                        </a>

                    </li>

                    <li <?php if ($this->sub_menu == 'currencies_list') echo 'class="active"'; ?>>
                        <a href="<?php echo site_url('backend/currencies');  ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Currency List</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li <?php if ($this->menu == 'dashboard' && $this->sub_menu == 'user_activity') echo 'class="active"'; ?>>
                <a href="<?php echo site_url('backend/dashboard/user_activity'); ?>" class="waves-effect waves-dark">
                    <span class="pcoded-micon">
                        <i class="feather icon-menu"></i>
                    </span>
                    <span class="pcoded-mtext">System Log</span>
                </a>
            </li>
            <li class="<?php if ($this->menu == 'setting') echo 'active'; ?>">
                <a href="<?php echo site_url('backend/dashboard/settings'); ?>" class="waves-effect waves-dark">
                    <span class="pcoded-micon">
                        <i class="feather icon-menu"></i>
                    </span>
                    <span class="pcoded-mtext">Setting</span>
                </a>
            </li>
            <li class="pcoded-hasmenu <?php if ($this->menu == 'report') echo 'pcoded-trigger active'; ?>">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                    <span class="pcoded-mtext">Report</span>
                </a>
                <ul class="pcoded-submenu">
                    <li>
                        <a href="<?php echo site_url('pms_report/soFarCostReport'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">So far cost/Work done</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('pms_report/remainingCostReport'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Remaining Cost</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('pms_report/projectSummaryReport'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Project Summary</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('pms_report/workScheduleReport'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Work Schedule</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('pms_report/monthlyBudgetingCostReport'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Monthly Budgeting Cost</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('pms_report/monthlyCostReport'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Monthly Cost</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>



    </div>
</div>