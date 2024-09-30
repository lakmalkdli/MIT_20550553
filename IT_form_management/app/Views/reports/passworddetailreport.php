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
                            
                            <h5 class="card-title">Password Management Detail Report</h5>
                            <br>

                            <form action="<?php echo base_url('/requests/save');?>" method="post" accept-charset="utf-8">

                                <label>From:</label>
                                <input type="text" id="fromdate" name="fromdate">
                                <label>To:</label>
                                <input type="text" id="todate" name="todate">

                                <input type="button" id="searchbydate" value="Search">

                            </form>

                            <div class="table-responsive">
                                <table id="myTable" class="display table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Req_Type</th>
                                            <th>Reson</th>
                                            <th>Full Name</th>
                                            <th>PFno</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Extension</th>
                                            <th>NIC</th>
                                            <th>Branch</th>
                                            <th>Branch Code</th>
                                            <th>Status</th>                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php foreach ($pwdreqdata as $request): ?>	
                                            <tr>                                                                   
                                                <td><?php echo $request->req_type; ?></td>
                                                <td><?php echo $request->resetreason; ?></td>
                                                <td><?php echo $request->namewithini; ?></td>
                                                <td><?php echo $request->pfno; ?></td>
                                                <td><?php echo $request->mobile; ?></td>
                                                <td><?php echo $request->email; ?></td>
                                                <td><?php echo $request->extention; ?></td>
                                                <td><?php echo $request->id_num; ?></td>
                                                <td><?php echo $request->branch; ?></td>
                                                <td><?php echo $request->bcode; ?></td>
                                                <td><?php echo $request->f_status; ?></td>                                                
                                            </tr>
                                        <?php endforeach ?>

                                    </tbody>                                                            
                                </table>
                            </div>
<br/>

                            
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



    


 

