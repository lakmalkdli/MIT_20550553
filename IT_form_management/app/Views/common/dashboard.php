<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>


<style>
    .flot-chart {
        height: 195px !important;
    }

    .gradient-4 {
        background-image: linear-gradient(230deg, #cce377, #40b9a3) !important;
    }

    .gradient-5 {
        background-image: linear-gradient(230deg, #FFAF7B, #D76D77, #513583) !important;
    }

    .card-title {
        font-size: 18px !important;
        font-weight: 200;
        text-transform: uppercase;
    }

    .card {
    
    min-height: 174px !important;
}
</style>
<!--**********************************
        Content body start
    ***********************************-->
<div class="content-body">

    <div class="container-fluid mt-3">

        <?php if ((isset($_SESSION['role_id']) && $_SESSION['role_id'] == "1")) { ?>
            <div class="row">

                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <?php
                            // Define your data here
                            //  print_r($data['penintreqlists']);

                            // Now you can use $data['penintreqlists'] in the view
                            ?>
                            <h3 class="card-title text-white">Firewal Requests</h3>
                            <div class="d-inline-block">
                                
                                <p class="text-white mb-0">Approval Pending : <?php echo $penappfw; ?></p>
                                <p class="text-white mb-0">Authentication Pending : <?php echo $penseclistfw; ?></p>
                                <p class="text-white mb-0">Netwok Pending : <?php echo $pennetwrklistfw; ?></p>
                                <p class="text-white mb-0">Rjected Request : <?php echo $totalreject; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-home"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Internet Requests</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Approval Pending : <?php echo $penappint; ?></p>
                                <p class="text-white mb-0">Authentication Pending : <?php echo $penseclistint; ?></p>
                                <p class="text-white mb-0">Netwok Pending : <?php echo $pennetwrklistint; ?></p>
                                <p class="text-white mb-0">Rjected Request : <?php echo $totalrejectint; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-tag"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">VA Requests</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Approval Pending : <?php echo $penappva; ?></p>
                                <p class="text-white mb-0">Authentication Pending : <?php echo $pensecva; ?></p>
                                <p class="text-white mb-0">Netwok Pending : <?php echo $pennetwrkva; ?></p>
                                <p class="text-white mb-0">Rjected Request : <?php echo $totalrejectva; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-emotsmile"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-5">
                        <div class="card-body">
                            <h3 class="card-title text-white">Password Requests</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Approval Pending : <?php echo "7"; ?></p>
                                <p class="text-white mb-0">Authentication Pending : <?php echo "0"; ?></p>
                                <p class="text-white mb-0">Netwok Pending : <?php echo "0"; ?></p>
                                <p class="text-white mb-0">IRjected Request : <?php echo "0"; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-ghost"></i></span>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-lg-3 col-sm-12 mb-4">
                        <div class="card h-100 ">
                            <div class="card-body">
                            <h3 class="card-title text-dark">Contact Numbers</h3>
                                <div class="custom-media-object-1">
                                    <div>
                                        <div class="media-body">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h6>Technical Support</h6>
                                                </div>
                                                <div class="col-lg-4 text-right">
                                                    <h6 class="text-muted">3533</h6>
                                                </div>
                                                <div class="col-lg-8">
                                                    <h6>ATM Unit</h6>
                                                </div>
                                                <div class="col-lg-4 text-right">
                                                    <h6 class="text-muted">3548</h6>
                                                </div>
                                                
                                                <div class="col-lg-8">
                                                    <h6>Computer Room</h6>
                                                </div>
                                                <div class="col-lg-4 text-right">
                                                    <h6 class="text-muted">3515</h6>
                                                </div>
                                                <div class="col-lg-8">
                                                    <h6>Network Division</h6>
                                                </div>
                                                <div class="col-lg-4 text-right">
                                                    <h6 class="text-muted">3525</h6>
                                                </div>
                                               
                                                <div class="col-lg-8">
                                                    <h6>IT Security</h6>
                                                </div>
                                                <div class="col-lg-4 text-right">
                                                    <h6 class="text-muted">3537</h6>
                                                </div>
                                                <div class="col-lg-8">
                                                    <h6>Core Banking</h6>
                                                </div>
                                                <div class="col-lg-4 text-right">
                                                    <h6 class="text-muted">3524</h6>
                                                </div>
                                               
                                                <div class="col-lg-8">
                                                    <h6>Data Center</h6>
                                                </div>
                                                <div class="col-lg-4 text-right">
                                                    <h6 class="text-muted">3520</h6>
                                                </div>
                                                <div class="col-lg-8">
                                                    <h6>General Applications</h6>
                                                </div>
                                                <div class="col-lg-4 text-right">
                                                    <h6 class="text-muted">3562</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                <div class="col-md-6 pb-4">
                    <div class="card h-100 ">
                        <div class="card-body">
                            <h3 class="card-title">Overall Request Summary</h4>
                                <canvas id="doughutChart" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 pb-4">
                    <div class="card h-100 ">
                        <div class="card-body">
                            <h3 class="card-title">Request type Count</h4>
                            <canvas id="barChart" width="500" height="500"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="active-member">
                                <div class="table-responsive">
                                    <table class="table table-xs mb-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Incedent Type</th>
                                                <th>Issue Description</th>
                                                <th>Priority</th>
                                                <th>Status</th>
                                                <th>Created On</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        <?php } ?>


        <?php if ((isset($_SESSION['role_id']) && $_SESSION['role_id'] == "2")) { ?>
            <div class="row">

            <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <?php
                            // Define your data here
                            //  print_r($data['penintreqlists']);

                            // Now you can use $data['penintreqlists'] in the view
                            ?>
                            <h3 class="card-title text-white">Firewal Requests</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Approval Pending : <?php echo $penappfirewalllists; ?></p>
                                <p class="text-white mb-0">Authentication Pending : <?php echo $pensecteam; ?></p>
                                <p class="text-white mb-0">Netwok Pending : <?php echo $pendingnetwrk; ?></p>
                                <p class="text-white mb-0">Rjected Request : <?php echo $totalrejfwuserwise; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-home"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Internet Requests</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total Requests : <?php echo "32"; ?></p>
                                <p class="text-white mb-0">Approved : <?php echo "22"; ?></p>
                                <p class="text-white mb-0">Approval Pending : <?php echo "10"; ?></p>
                                <p class="text-white mb-0">Rjected : <?php echo ""; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-tag"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">VA Requests</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total Requests : <?php echo "48"; ?></p>
                                <p class="text-white mb-0">Approved : <?php echo "30"; ?></p>
                                <p class="text-white mb-0">Approval Pending : <?php echo "18"; ?></p>
                                <p class="text-white mb-0">Rjected : <?php echo ""; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-emotsmile"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-5">
                        <div class="card-body">
                            <h3 class="card-title text-white">Password Requests</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total tickets : <?php echo "30"; ?></p>
                                <p class="text-white mb-0">Active : <?php echo "12"; ?></p>
                                <p class="text-white mb-0">Approval Pending : <?php echo "12"; ?></p>
                                <p class="text-white mb-0">In Progress : <?php echo "6"; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-ghost"></i></span>
                        </div>
                    </div>
                </div>

            </div>
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="active-member">
                                <div class="table-responsive">
                                    <table class="table header-border">
                                        <thead>
                                            <tr>
                                                <th>PF</th>
                                                <th>Request Type</th>
                                                <th>Source IP</th>
                                                <th>Des. IP</th>
                                                <th>Reason</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($Pendingitemlist as $request): ?>	
                                                <tr>                                                                   
                                                <td><?php echo $request['req_id']; ?></td>
                                                <td><?php echo $request['req_type']; ?></td>
                                                <td><?php echo $request['source']; ?></td>
                                                <td><?php echo $request['destination']; ?></td>
                                                <td><?php echo $request['explanation']; ?></td>
                                                <td>
                                                <?php if ($request['mng_apr'] == 1) { ?>
                                                    <div class="progress" style="height: 10px">
                                                        <div class="progress-bar gradient-1" style="width: 30%;" role="progressbar"><span class="sr-only">30% Complete</span></div>
                                                    </div>
                                                <?php } else {?>
                                                    <div class="progress" style="height: 10px">
                                                        <div class="progress-bar gradient-1" style="width: 100%;" role="progressbar"><span class="sr-only">100% Complete</span></div>
                                                    </div>
                                                <?php } ?>     
                                                </td>
                                                </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        <?php } ?>

        <?php if ((isset($_SESSION['role_id']) && $_SESSION['role_id'] == "3")) { ?>
            <div class="row">

            <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <?php
                            // Define your data here
                            //  print_r($data['penintreqlists']);

                            // Now you can use $data['penintreqlists'] in the view
                            ?>
                            <h3 class="card-title text-white">Firewal Requests</h3>
                            <div class="d-inline-block">
                            <p class="text-white mb-0">Total Requests : <?php echo "32"; ?></p>
                                <p class="text-white mb-0">Approved : <?php echo "22"; ?></p>
                                <p class="text-white mb-0">Approval Pending : <?php echo "10"; ?></p>
                                <p class="text-white mb-0">Rjected : <?php echo ""; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-home"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Internet Requests</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total Requests : <?php echo "32"; ?></p>
                                <p class="text-white mb-0">Approved : <?php echo "22"; ?></p>
                                <p class="text-white mb-0">Approval Pending : <?php echo "10"; ?></p>
                                <p class="text-white mb-0">Rjected : <?php echo ""; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-tag"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">VA Requests</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total Requests : <?php echo "48"; ?></p>
                                <p class="text-white mb-0">Approved : <?php echo "30"; ?></p>
                                <p class="text-white mb-0">Approval Pending : <?php echo "18"; ?></p>
                                <p class="text-white mb-0">Rjected : <?php echo ""; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-emotsmile"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-5">
                        <div class="card-body">
                            <h3 class="card-title text-white">Password Requests</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total tickets : <?php echo "30"; ?></p>
                                <p class="text-white mb-0">Active : <?php echo "12"; ?></p>
                                <p class="text-white mb-0">Approval Pending : <?php echo "12"; ?></p>
                                <p class="text-white mb-0">In Progress : <?php echo "6"; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-ghost"></i></span>
                        </div>
                    </div>
                </div>

            </div>
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="active-member">
                                <div class="table-responsive">
                                    <table class="table header-border">
                                        <thead>
                                            <tr>
                                                <th>PF</th>
                                                <th>Request Type</th>
                                                <th>Source IP</th>
                                                <th>Des. IP</th>
                                                <th>Reason</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($Pendingitemlist as $request): ?>	
                                                <tr>                                                                   
                                                <td><?php echo $request['req_id']; ?></td>
                                                <td><?php echo $request['req_type']; ?></td>
                                                <td><?php echo $request['source']; ?></td>
                                                <td><?php echo $request['destination']; ?></td>
                                                <td><?php echo $request['explanation']; ?></td>
                                                <td>
                                                <?php if ($request['mng_apr'] == 1) { ?>
                                                    <div class="progress" style="height: 10px">
                                                        <div class="progress-bar gradient-1" style="width: 30%;" role="progressbar"><span class="sr-only">30% Complete</span></div>
                                                    </div>
                                                <?php } else {?>
                                                    <div class="progress" style="height: 10px">
                                                        <div class="progress-bar gradient-1" style="width: 100%;" role="progressbar"><span class="sr-only">100% Complete</span></div>
                                                    </div>
                                                <?php } ?>     
                                                </td>
                                                </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        <?php } ?>

        
        <?php if ((isset($_SESSION['role_id']) && $_SESSION['role_id'] == "4")) { ?>
            <div class="row">

            <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <?php
                            // Define your data here
                            //  print_r($data['penintreqlists']);

                            // Now you can use $data['penintreqlists'] in the view
                            ?>
                            <h3 class="card-title text-white">Firewal Requests</h3>
                            <div class="d-inline-block">
                            <p class="text-white mb-0">Approval Pending : <?php echo $penappfirewalllists; ?></p>
                                <p class="text-white mb-0">Authentication Pending : <?php echo $pensecteam; ?></p>
                                <p class="text-white mb-0">Netwok Pending : <?php echo $pendingnetwrk; ?></p>
                                <p class="text-white mb-0">Rjected Request : <?php echo $totalrejfwuserwise; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-home"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Internet Requests</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total Requests : <?php echo "32"; ?></p>
                                <p class="text-white mb-0">Approved : <?php echo "22"; ?></p>
                                <p class="text-white mb-0">Approval Pending : <?php echo "10"; ?></p>
                                <p class="text-white mb-0">Rjected : <?php echo ""; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-tag"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">VA Requests</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total Requests : <?php echo "48"; ?></p>
                                <p class="text-white mb-0">Approved : <?php echo "30"; ?></p>
                                <p class="text-white mb-0">Approval Pending : <?php echo "18"; ?></p>
                                <p class="text-white mb-0">Rjected : <?php echo ""; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-emotsmile"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-5">
                        <div class="card-body">
                            <h3 class="card-title text-white">Password Requests</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total tickets : <?php echo "30"; ?></p>
                                <p class="text-white mb-0">Active : <?php echo "12"; ?></p>
                                <p class="text-white mb-0">Approval Pending : <?php echo "12"; ?></p>
                                <p class="text-white mb-0">In Progress : <?php echo "6"; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-ghost"></i></span>
                        </div>
                    </div>
                </div>

            </div>
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="active-member">
                                <div class="table-responsive">
                                    <table class="table header-border">
                                        <thead>
                                            <tr>
                                                <th>PF</th>
                                                <th>Request Type</th>
                                                <th>Source IP</th>
                                                <th>Des. IP</th>
                                                <th>Reason</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($Pendingitemlist as $request): ?>	
                                                <tr>                                                                   
                                                <td><?php echo $request['req_id']; ?></td>
                                                <td><?php echo $request['req_type']; ?></td>
                                                <td><?php echo $request['source']; ?></td>
                                                <td><?php echo $request['destination']; ?></td>
                                                <td><?php echo $request['explanation']; ?></td>
                                                <td>
                                                <?php if ($request['mng_apr'] == 1) { ?>
                                                    <div class="progress" style="height: 10px">
                                                        <div class="progress-bar gradient-1" style="width: 30%;" role="progressbar"><span class="sr-only">30% Complete</span></div>
                                                    </div>
                                                <?php } else {?>
                                                    <div class="progress" style="height: 10px">
                                                        <div class="progress-bar gradient-1" style="width: 100%;" role="progressbar"><span class="sr-only">100% Complete</span></div>
                                                    </div>
                                                <?php } ?>     
                                                </td>
                                                </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        <?php } ?>

        <?php if ((isset($_SESSION['role_id']) && $_SESSION['role_id'] == "5")) { ?>
            <div class="row">

            <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <?php
                            // Define your data here
                            //  print_r($data['penintreqlists']);

                            // Now you can use $data['penintreqlists'] in the view
                            ?>
                            <h3 class="card-title text-white">Firewal Requests</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Approval Pending : <?php echo $penappfirewalllists; ?></p>
                                <p class="text-white mb-0">Authentication Pending : <?php echo $pensecteam; ?></p>
                                <p class="text-white mb-0">Netwok Pending : <?php echo $pendingnetwrk; ?></p>
                                <p class="text-white mb-0">Rjected Request : <?php echo $totalrejfwuserwise; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-home"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Internet Requests</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total Requests : <?php echo "32"; ?></p>
                                <p class="text-white mb-0">Approved : <?php echo "22"; ?></p>
                                <p class="text-white mb-0">Approval Pending : <?php echo "10"; ?></p>
                                <p class="text-white mb-0">Rjected : <?php echo ""; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-tag"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">VA Requests</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total Requests : <?php echo "48"; ?></p>
                                <p class="text-white mb-0">Approved : <?php echo "30"; ?></p>
                                <p class="text-white mb-0">Approval Pending : <?php echo "18"; ?></p>
                                <p class="text-white mb-0">Rjected : <?php echo ""; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-emotsmile"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-5">
                        <div class="card-body">
                            <h3 class="card-title text-white">Password Requests</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total tickets : <?php echo "30"; ?></p>
                                <p class="text-white mb-0">Active : <?php echo "12"; ?></p>
                                <p class="text-white mb-0">Approval Pending : <?php echo "12"; ?></p>
                                <p class="text-white mb-0">In Progress : <?php echo "6"; ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icon-ghost"></i></span>
                        </div>
                    </div>
                </div>

            </div>
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="active-member">
                                <div class="table-responsive">
                                    <table class="table header-border">
                                        <thead>
                                            <tr>
                                                <th>PF</th>
                                                <th>Request Type</th>
                                                <th>Source IP</th>
                                                <th>Des. IP</th>
                                                <th>Reason</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($Pendingitemlist as $request): ?>	
                                                <tr>                                                                   
                                                <td><?php echo $request['req_id']; ?></td>
                                                <td><?php echo $request['req_type']; ?></td>
                                                <td><?php echo $request['source']; ?></td>
                                                <td><?php echo $request['destination']; ?></td>
                                                <td><?php echo $request['explanation']; ?></td>
                                                <td>
                                                <?php if ($request['mng_apr'] == 1) { ?>
                                                    <div class="progress" style="height: 10px">
                                                        <div class="progress-bar gradient-1" style="width: 30%;" role="progressbar"><span class="sr-only">30% Complete</span></div>
                                                    </div>
                                                <?php } else {?>
                                                    <div class="progress" style="height: 10px">
                                                        <div class="progress-bar gradient-1" style="width: 100%;" role="progressbar"><span class="sr-only">100% Complete</span></div>
                                                    </div>
                                                <?php } ?>     
                                                </td>
                                                </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        <?php } ?>



    </div>

</div>
<!-- #/ container -->
</div>
<!--**********************************
        Content body end
    ***********************************-->

<!--**********************************
        Main wrapper end
    ***********************************-->

<script src="<?php echo base_url('plugins/chart.js/Chart.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins-init/chartjs-init.js'); ?>"></script>
<script src="<?php echo base_url('plugins/flot/js/jquery.flot.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/flot/js/jquery.flot.pie.js'); ?>"></script>
<script src="<?php echo base_url('plugins/flot/js/jquery.flot.resize.js'); ?>"></script>
<script src="<?php echo base_url('plugins/flot/js/jquery.flot.init.js'); ?>"></script>

<script>
        //doughut chart
        var ctx = document.getElementById("doughutChart");
        ctx.height = 150;
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        
                        <?php echo $totalpendingfirewall; ?>,
                        <?php echo $dval2; ?>,
                        <?php echo $dval3; ?>,
                        <?php echo $dval4; ?>
                    ],
                    backgroundColor: [
                        "#fc7d94",
                        "#ff894c",
                        "#61c399",
                        "#9b547c"
                    ],
                    hoverBackgroundColor: [
                        "#e05c74",
                        "#db692e",
                        "#46ab80",
                        "#6e2d51"
                    ]

                }],
                labels: [
                    "Firewall",
                    "Internet",
                    "VA",
                    "Password"
                ]
            },
            options: {
                responsive: true,
            }
        });
    </script>

<script>
        //bar chart
        var ctx = document.getElementById("barChart");
        ctx.height = 250;
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Firewall", "Internet", "VA", "Password"],
                datasets: [{
                        label: "Pending Requests",
                        data: [
                            <?php echo $totalpendingfirewall; ?>,
                            <?php echo $barval_pending2; ?>,
                            <?php echo $barval_pending3; ?>,
                            <?php echo $barval_pending4; ?>,
                        ],
                        borderColor: "rgba(117, 113, 249, 0.0)",
                        borderWidth: "0",
                        backgroundColor: "rgba(255, 137, 76, 1)"
                    },
                    {
                        label: "Approved Requests",
                        data: [
                            <?php echo $barval_active1; ?>,
                            <?php echo $barval_active2; ?>,
                            <?php echo $barval_active3; ?>,
                            <?php echo $barval_active4; ?>,
                        ],
                        borderColor: "rgba(144,	104,	190,0.0)",
                        borderWidth: "0",
                        backgroundColor: "rgba(70, 171, 128, 1)"
                    },
                    {
                        label: "Rjected Requests",
                        data: [
                            <?php echo $barval_reject1; ?>,
                            <?php echo $barval_reject2; ?>,
                            <?php echo $barval_reject3; ?>,
                            <?php echo $barval_reject4; ?>,
                        ],
                        borderColor: "rgba(144,	104,	190,0.0)",
                        borderWidth: "0",
                        backgroundColor: "rgba(232, 74, 74, 1)"
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        // Change here
                        barPercentage: 0.5
                    }]
                }
            }
        });
    </script>

<?= $this->endSection() ?>