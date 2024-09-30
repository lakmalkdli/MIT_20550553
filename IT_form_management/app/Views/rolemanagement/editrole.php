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
                            <form action="<?php echo base_url('/role/save');?>" method="post" accept-charset="utf-8">
                            <h4 class="card-title">Edit User Role</h4>

                                <div class="form-group">
                                            <label>Role Name</label>
                                </div>
                                <div class="input-group mb-3">
                                            
                                            <?php if (isset($editrolename)) { ?>
                                                <input type="text" class="form-control" name="rolename" value="<?= $editrolename?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="rolename" value="">
                                            <?php } ?>
                                            
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-dark" type="submit" href="<?php echo base_url('/role/update');?>" >Update Role</button>
                                            </div>
                                </div>

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                      
                                                        
                                                        <table id="myTable" class="display table table-striped table-bordered zero-configuration">
                                                            <thead>
                                                                <tr>
                                                                    <th>Role_ID</th>
                                                                    <th>Role Name</th>                                                                   
                                                                    <th scope="col">Action</th>
                                                               loadselected </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($edtrolelist as $roles): ?>	
                                                                <tr>                                                                   
                                                                    <td><?php echo $roles->roleid; ?></td>
                                                                    <td><?php echo $roles->rolename; ?></td>                                                          
                                                                    
                                                                    <td><span><a href="<?php echo base_url('rolerequest/getroletoedit/'.$roles->roleid);?>" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a></span>                                                                    
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



    


 

