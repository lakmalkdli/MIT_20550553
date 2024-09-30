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
                            <form action="" method="post" accept-charset="utf-8">
                                <h4 class="card-title">Pending VA Requests For Authorize</h4>
                                                    <div class="table-responsive">
                                                        <table id="myTable" class="display table table-striped table-bordered zero-configuration">
                                                            <thead>
                                                                <tr>
                                                                    <th>pfno</th>
                                                                    <th>Name</th>
                                                                    <th>extention</th>
                                                                    <th>date</th>
                                                                    <th>Department</th>
                                                                    <th>Server OS</th>
                                                                    <th>Server IP</th>
                                                                    <th>criticality</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($pendingdepvaRequests as $request): ?>	
                                                                <tr>                                                                   
                                                                    <td><?php echo $request->pfno; ?></td>
                                                                    <td><?php echo $request->u_fname; ?></td>
                                                                    <td><?php echo $request->extention; ?></td>
                                                                    <td><?php echo $request->date; ?></td>
                                                                    <td><?php echo $request->name; ?></td>
                                                                    <td><?php echo $request->server_os; ?></td>
                                                                    <td><?php echo $request->server_ip; ?></td>
                                                                    <td class="text-center">
                                                                        <?php 
                                                                                if ($request->criticality == 'value3') {
                                                                                    echo '<span class="flag-style-green">Low </span>';
                                                                                } elseif ($request->criticality == 'value2') {
                                                                                    echo '<span class="flag-style-yellow">Medium </span>';
                                                                                } elseif ($request->criticality == 'value1') {
                                                                                    echo '<span class="flag-style-red">High</span>';
                                                                                } 
                                                                        ?>
                                                                    <td class="text-center"><span><a href="<?php echo base_url('requests/getpendingvaauth/'.$request->req_id);?>" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                                        </span>                                                                    
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



    


 

