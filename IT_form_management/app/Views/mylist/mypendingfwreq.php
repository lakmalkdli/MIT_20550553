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
                            <form action="<?php echo base_url('/requests/save');?>" method="post" accept-charset="utf-8">
                                <h4 class="card-title">My Firewall Requests</h4>
                                                    <div class="table-responsive">
                                                        <table id="myTable" class="display table table-striped table-bordered zero-configuration">
                                                            <thead>
                                                                <tr>
                                                                    <th>PF Number</th>
                                                                    <th>Date</th>
                                                                    <th>Source</th>
                                                                    <th>Strat Date</th>
                                                                    <th>Expire Date</th>
                                                                    <th>Destination</th>
                                                                    <th>Ports</th>
                                                                    <th>Explanation</th>
                                                                    <th>Status</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($myfirewallreq as $request): ?>	
                                                                <tr>                                                                   
                                                                    <td><?php echo $request->pfno; ?></td>
                                                                    <td><?php echo $request->date; ?></td>
                                                                    <td><?php echo $request->source; ?></td>
                                                                    <td><?php echo $request->effectdate; ?></td>
                                                                    <td><?php echo $request->expiredate; ?></td>
                                                                    <td><?php echo $request->destination; ?></td>
                                                                    <td><?php echo $request->ports; ?></td>
                                                                    <td><?php echo $request->explanation; ?></td>
                                                                    <td class="text-center">
                                                                        <?php
                                                                         if (($request-> mng_apr == 0) || ($request-> sec_apr == 0) || ($request-> auth_by == 0)){                                                                        
                                                                            echo '<span class="label label-pill label-danger fixed-width">Pending</span>';
                                                                        } elseif (($request-> mng_apr == 1) && ($request-> sec_apr == 1) && ($request-> auth_by == 1)) {
                                                                            echo '<span class="label label-pill label-success fixed-width">Approve  </span>';
                                                                        } elseif (($request-> mng_apr == 2) || ($request-> sec_apr == 2) || ($request-> auth_by == 2)) {
                                                                            echo '<span class="label label-pill label-danger fixed-width">Reject  </span>';
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
    <script src="<?php echo base_url('js/styleSwitcher.js'); ?>"></script>

    <script src="<?php echo base_url('plugins/moment/moment.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script>

    <script src="<?php echo base_url('js/plugins-init/form-pickers-init.js'); ?>"></script> 
   

    <!-- Lakmal for check start -->

    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asColor.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js'); ?>"></script>
                                                   

<?= $this->endSection() ?>



    


 

