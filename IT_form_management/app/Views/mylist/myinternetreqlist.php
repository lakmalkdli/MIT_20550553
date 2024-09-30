<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>




        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">


            <!-- insert for date -->

            <div class="col-12">
                        <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="<?php echo base_url('');?>" method="post" accept-charset="utf-8">
                                <h4 class="card-title">Pending Internet Requests to Apply</h4>
                                                    <div class="table-responsive">
                                                        <table id="myTable" class="display table table-striped table-bordered zero-configuration">
                                                            <thead>
                                                                <tr>
                                                                    <th>PF Number</th>
                                                                    <th>Name</th>                                                                                                                                        
                                                                    <th>Email</th>
                                                                    <th>Mobile</th>
                                                                    <th>IP Address</Address></th>
                                                                    <th>Internet Access Type</th>
                                                                    <th>Effective From</th>
                                                                    <th>Expire Date</th>
                                                                    <th>purpose</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($myInternetRequests as $request): ?>	
                                                                <tr>                                                                   
                                                                    <td><?php echo $request['pfno']; ?></td>
                                                                    <td><?php echo $request['u_fname']; ?></td>
                                                                    <td><?php echo $request['email']; ?></td>
                                                                    <td><?php echo $request['mobile']; ?></td>
                                                                    <td><?php echo $request['ip_address']; ?></td>
                                                                    <td class="text-center">
                                                                    <?php 
                                                                                if ($request['access_type'] == 'internet') {
                                                                                    echo '<span class="flag-style-green">Limited </span>';
                                                                                } elseif ($request['access_type'] == 'w_proxy') {
                                                                                    echo '<span class="flag-style-yellow">Proxy </span>';
                                                                                } elseif ($request['access_type'] == 'f_internet') {
                                                                                    echo '<span class="flag-style-red">Full</span>';
                                                                                } 
                                                                        ?>
                                                                    </td>
                                                                    <td><?php echo $request['effective_from']; ?></td>
                                                                    <td><?php echo $request['expire_on']; ?></td>
                                                                    <td><?php echo $request['purpose']; ?></td>
                                                                    <td>
                                                                    <?php
                                                                        // Assuming $request is an array
                                                                        if (($request['mstatus'] == 0) || ($request['itsecstatus'] == 0) || ($request['isnetworkdeployed'] == 0)) {
                                                                            echo '<span class="label label-pill label-danger fixed-width">Pending</span>';
                                                                        } elseif (($request['mstatus'] == 1) && ($request['itsecstatus'] == 1) && ($request['isnetworkdeployed'] == 1)) {
                                                                            echo '<span class="label label-pill label-success fixed-width">Approve</span>';
                                                                        } elseif (($request['mstatus'] == 2) || ($request['itsecstatus'] == 2) || ($request['isnetworkdeployed'] == 2)) {
                                                                            echo '<span class="label label-pill label-danger fixed-width">Reject</span>';
                                                                        }
                                                                        ?>    
                                                                    </td>

                                                                </tr>
                                                                <?php endforeach ?>
                                                            </tbody>                                                            
                                                        </table>
                                                    </div>
<br/>
                                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                        
                                        </div>
                                    </div>
                                
                            </form>
                        </div>
                        
                        <!-- Card -->
                    </div>

                </div>
            </div>
            

            <!-- end date -->




                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        

    </div>
    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?php echo base_url('plugins/common/common.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/custom.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/settings.js'); ?>"></script>
    <script src="<?php echo base_url('js/gleek.js'); ?>"></script>
    <script src="<?php echo base_url('js/styleSwitcher.js'); ?>"></script>

    <script src="<?php echo base_url('plugins/moment/moment.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script>

    <script src="<?php echo base_url('js/plugins-init/form-pickers-init.js'); ?>"></script> 
   

    <!-- Lakmal for check start -->

    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asColor.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js'); ?>"></script>
                                                   

<?= $this->endSection() ?>



    


 

