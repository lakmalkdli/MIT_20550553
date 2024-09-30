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
                            <form action="<?php echo base_url('/role/update_rolegroup');?>" method="post" accept-charset="utf-8">
                            <h4 class="card-title">Role Module Assignment</h4>

                                
                                    <div class="form-group row">
            	      						<label class="col-sm-12 col-form-label">User Roles Type</label>
											<div class="col-sm-12">
                                                <select id="user_roles" name="user_roles" class="custom-select mr-sm-2" style="width: 100%;" onchange="change_u_role()">    
                                                        <option value="" disabled selected>Select Role...</option>				 
														<?php foreach ($role_list as $key => $value) { ?>
															<option <?php if(isset($selectedroleid) && $key==$selectedroleid){ echo "selected"; } ?> value="<?=$key?>"><?= $value ?></option> 
														<?php } ?>
                  								</select>
											</div>
                                    </div>

                                    <?php if (isset($rolegrouplist)) { ?>
                                    <table id="myTable" class="display table table-striped table-bordered zero-configuration">
                                                            <thead>
                                                                <tr>
                                                                    
                                                                    <th>Page Name</th>   
                                                                    <th style="display: none;">ch val</th>                                                                  
                                                                    <th scope="col">Access Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($rolegrouplist as $rolepermission): ?>	
                                                                <tr>                                                                   
                                                                    
                                                                    <td><?php echo $rolepermission->displayname; ?></td>                                                          
                                                                    <td style="display: none;"><?php echo $rolepermission->is_access; ?></td> 
                                                                    <td><span>    
                                                                        <input type="checkbox" <?php echo ($rolepermission->is_access == 1) ? 'checked' : ''; ?> class="chkclass" name="<?php echo "checkbox_".$rolepermission->id; ?>" data-pid="<?php echo $rolepermission->id; ?>"/>
                                                                    </td>
                                                                </tr>
                                                                <?php endforeach ?>
                                                            </tbody>                                                            
                                                        </table>
                                    <?php } ?>

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                      
                                                        

                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark">Update</button>

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
        Main wrapper end
    ***********************************-->


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

    
    <script type="text/javascript">


        function change_u_role(){
            var role_id = document.getElementById('user_roles').value;
            
            window.location.href = "<?php echo base_url();?>"+"/rolemodel/view/permissions/"+role_id;
            // alert(role_id);
        }

        $(document).ready(function() {


            $('.chkclass').change(function() {

                var id = $(this).data('pid');
                var access = 0;

                if ($(this).is(':checked')) {
                    access = 1;
                }

                $.post("<?php echo base_url();?>"+"/rolemodel/update/permissions",
                {
                    id: id,
                    acceess: access
                },
                function(response){

                    if (response.status == 200) {
                        alert(response.message);
                    } else {
                        alert(response.message);
                    }
                });

            });
            
        });

    </script>

    
                                                   

<?= $this->endSection() ?>









    


 

