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
                                <h4 class="card-title">Pending Firewall Requests to Apply</h4>
                                                    <div class="table-responsive">
                                                        <table id="myTable" class="display table table-striped table-bordered zero-configuration">
                                                            <thead>
                                                                <tr>
                                                                    <th>Req_ID</th>
                                                                    <th>Name</th>
                                                                    <th>PF Number</th>
                                                                    <th>Email</th>
                                                                    <th>Mobile</th>
                                                                    <th>Status</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($pendingRequests as $request): ?>	
                                                                <tr>                                                                   
                                                                    <td><?php echo $request->req_id; ?></td>
                                                                    <td><?php echo $request->staffmember; ?></td>
                                                                    <td><?php echo $request->pfno; ?></td>
                                                                    <td><?php echo $request->email; ?></td>
                                                                    <td><?php echo $request->mobile; ?></td>
                                                                    <td><span class="label label-pill label-danger fixed-width">Pending</span></td>
                                                                    <!-- <td><span><a href="<?php echo base_url('requests/getpendingitem/'.$request->req_id);?>" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-pencil color-muted m-r-5"></i> </a> -->
                                                                    <td class="text-center"><span><a href="<?php echo base_url('requests/getpendingitem/'.$request->req_id);?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a></td>                                                                                                                                       
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



    


 

