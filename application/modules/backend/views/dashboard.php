<!-- [ breadcrumb ] start -->

<!--                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="feather icon-home bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h5>Dashboard</h5>
                                            <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index-2.html"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>-->

<!-- [ breadcrumb ] end -->
<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body" style="background: #fff;padding: 5px;">
            <!-- [ page content ] start -->
            
                  <h3>Ongoing Project List</h3>
                <table id="order-table" class="table table-bordered nowrap">

                    <thead>
                        <tr>
                           <!-- <th style="width:1%;">SL</th>-->
                            <th style="width:10%;">Project Code</th>
                            <th style="width:40%;">Project Name</th>

                            <th style="width:10%;">Package No</th>
                            <th style="width:10%;">Contract Date </th>
                            <th style="width:10%;">Actual Completion Date</th>
                            <th style="width:15%;">Progress</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($incomplete)) {
                            $i = 0;
                            foreach ($incomplete as $project) {
                                $i++;
                                ?>
                                <tr>
                                   <!-- <td><?php echo $i; ?></td>-->
                                    <td>
        <?php echo $project['code']; ?>
                                    </td>
                                    <td>
        <?php echo summary($project['project_name'], 40); ?>
                                    </td>

                                    <td style="text-align:center;">
        <?php echo $project['package_no']; ?>
                                    </td>

                                    <td style="text-align:center;">
        <?php if (!empty($project['contract_date'])) echo date('d-m-Y', strtotime($project['contract_date'])); ?>
                                    </td>

                                    <td style="text-align:center;">
        <?php if (!empty($project['actual_completion_date'])) echo date('d-m-Y', strtotime($project['actual_completion_date'])); ?>
                                    </td>

                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: <?php echo $project['progress']; ?>%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php if (!empty($project['progress'])) echo round($project['progress'],2) . '%'; ?></div>
                                        </div>
                                    </td>

                                  
                                </tr>
                            <?php
                            }
                        }
                        ?>

                    </tbody>

                </table>
                <h3>Completed Project List</h3>
                <table id="order-table" class="table table-bordered nowrap">

                    <thead>
                        <tr>
                           <!-- <th style="width:1%;">SL</th>-->
                            <th style="width:10%;">Project Code</th>
                            <th style="width:40%;">Project Name</th>

                            <th style="width:10%;">Package No</th>
                            <th style="width:10%;">Contract Date </th>
                            <th style="width:10%;">Actual Completion Date</th>
                            <th style="width:15%;">Progress</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($complete)) {
                            $i = 0;
                            foreach ($complete as $project) {
                                $i++;
                                ?>
                                <tr>
                                   <!-- <td><?php echo $i; ?></td>-->
                                    <td>
        <?php echo $project['code']; ?>
                                    </td>
                                    <td>
        <?php echo summary($project['project_name'], 40); ?>
                                    </td>

                                    <td style="text-align:center;">
        <?php echo $project['package_no']; ?>
                                    </td>

                                    <td style="text-align:center;">
        <?php if (!empty($project['contract_date'])) echo date('d-m-Y', strtotime($project['contract_date'])); ?>
                                    </td>

                                    <td style="text-align:center;">
        <?php if (!empty($project['actual_completion_date'])) echo date('d-m-Y', strtotime($project['actual_completion_date'])); ?>
                                    </td>

                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: <?php echo $project['progress']; ?>%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php if (!empty($project['progress'])) echo round($project['progress'],2) . '%'; ?></div>
                                        </div>
                                    </td>

                                  
                                </tr>
                            <?php
                            }
                        }
                        ?>

                    </tbody>

                </table>
                <!-- sale revenue card start -->

                <!--                                            <div class="col-md-12 col-xl-8">
                                                                <div class="card sale-card">
                                                                    <div class="card-header">
                                                                        <h5>Deals Analytics</h5>
                                                                    </div>
                                                                    <div class="card-block">
                                                                        <div id="sales-analytics" class="chart-shadow" style="height:380px"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-xl-4">
                                                                <div class="card comp-card">
                                                                    <div class="card-body">
                                                                        <div class="row align-items-center">
                                                                            <div class="col">
                                                                                <h6 class="m-b-25">Impressions</h6>
                                                                                <h3 class="f-w-700 text-c-blue">1,563</h3>
                                                                                <p class="m-b-0">May 23 - June 01 (2017)</p>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <i class="fas fa-eye bg-c-blue"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card comp-card">
                                                                    <div class="card-body">
                                                                        <div class="row align-items-center">
                                                                            <div class="col">
                                                                                <h6 class="m-b-25">Goal</h6>
                                                                                <h3 class="f-w-700 text-c-green">30,564</h3>
                                                                                <p class="m-b-0">May 23 - June 01 (2017)</p>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <i class="fas fa-bullseye bg-c-green"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card comp-card">
                                                                    <div class="card-body">
                                                                        <div class="row align-items-center">
                                                                            <div class="col">
                                                                                <h6 class="m-b-25">Impact</h6>
                                                                                <h3 class="f-w-700 text-c-yellow">42.6%</h3>
                                                                                <p class="m-b-0">May 23 - June 01 (2017)</p>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <i class="fas fa-hand-paper bg-c-yellow"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                             sale revenue card end 
                
                                                             Project statustic start 
                                                            <div class="col-xl-12">
                                                                <div class="card proj-progress-card">
                                                                    <div class="card-block">
                                                                        <div class="row">
                                                                            <div class="col-xl-3 col-md-6">
                                                                                <h6>Published Project</h6>
                                                                                <h5 class="m-b-30 f-w-700">532<span class="text-c-green m-l-10">+1.69%</span></h5>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar bg-c-red" style="width:25%"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-3 col-md-6">
                                                                                <h6>Completed Task</h6>
                                                                                <h5 class="m-b-30 f-w-700">4,569<span class="text-c-red m-l-10">-0.5%</span></h5>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar bg-c-blue" style="width:65%"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-3 col-md-6">
                                                                                <h6>Successfull Task</h6>
                                                                                <h5 class="m-b-30 f-w-700">89%<span class="text-c-green m-l-10">+0.99%</span></h5>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar bg-c-green" style="width:85%"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-3 col-md-6">
                                                                                <h6>Ongoing Project</h6>
                                                                                <h5 class="m-b-30 f-w-700">365<span class="text-c-green m-l-10">+0.35%</span></h5>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar bg-c-yellow" style="width:45%"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>-->
                <!-- Project statustic end -->

                <!-- sale 2 card start -->



                <!-- sale 2 card end -->

                <!-- testimonial and top selling start -->

                <!-- testimonial and top selling end -->



                <!-- lettest acivity and statustic card start -->

                <!-- lettest acivity and statustic card end -->

            
            <!-- [ page content ] end -->
        </div>
    </div>
</div>