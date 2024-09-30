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
                            
                                <h4 class="card-title">Reset User Status & Password</h4>
                                <div class="basic-form">
                                    <form>
                                    <div class="form-row"> 
                                        <div class="form-group col-md-3">
                                            <label>First Name</label>
                                            <input id="fname" type="text" class="form-control" placeholder="First name" value="<?= isset($usersearch_by_Id['u_fname']) ? $usersearch_by_Id['u_fname'] : ''; ?>" disabled>
                                            <label id="error_fname" class="d-none text-danger">First Name</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Last Name</label>
                                            <input type="text" id="lname" class="form-control" placeholder="Last name" value="<?= isset($usersearch_by_Id['u_lname']) ? $usersearch_by_Id['u_lname'] : ''; ?>" disabled>
                                            <label id="error_lname" class="d-none text-danger ">Last Name</label>                                        
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>PF No</label>
                                            <input id="pfno" type="text" class="form-control" placeholder="PF No" value="<?= isset($usersearch_by_Id['u_pfno']) ? $usersearch_by_Id['u_pfno'] : ''; ?>" disabled>
                                            <label id="error_pfno" class="d-none text-danger">PF No</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Email</label>
                                            <input id="email" type="text" class="form-control" placeholder="Email" name="email" value="<?= isset($usersearch_by_Id['u_email']) ? $usersearch_by_Id['u_email'] : ''; ?>" disabled>
                                            <label id="error_email" class="d-none text-danger text-danger">Email</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>User Name</label>
                                            <input id="uname" type="text" class="form-control"  value="<?= isset($usersearch_by_Id['u_username']) ? $usersearch_by_Id['u_username'] : ''; ?>" disabled>
                                            
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label>Extension</label>
                                        <input id="exten" type="text" class="form-control" name="exten" value="<?= isset($usersearch_by_Id['u_extention']) ? $usersearch_by_Id['u_extention'] : ''; ?>" disabled>
                                        <label id="error_exten" class="d-none text-danger">Extension Number</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Mobile</label>
                                            <input type="text" id="mobile" class="form-control" name="mobile" value="<?= isset($usersearch_by_Id['u_mobile']) ? $usersearch_by_Id['u_mobile'] : ''; ?>" disabled>
                                            <label id="error_mobile" class="d-none text-danger">Mobile No</label>
                                        </div>

                                        <div class="form-group col-md-3">
                                                    <label>Department</label>
                                                    <select id="dep" class="form-control" disabled>
                                                        <option value="" disabled selected>Select your unit...</option>
                                                        <?php foreach($departments as $department) { ?>                                                            
                                                            <option value="<?php echo $department->id; ?>" <?php echo ($usersearch_by_Id['u_depid'] == $department->id) ? 'selected' : ''; ?>><?php echo $department->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                                    <label id="error_dep" class="d-none text-danger"></label>
                                       </div>
                                    </div>
                                    <div class="form-row">
                                            <div class="form-group col-md-6">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">

                                                                    <label>Designation</label>
                                                                    <select id="desig" class="form-control" disabled>
                                                                        <option value="" disabled selected>select your Designation...</option>
                                                                        <?php foreach($designationlists as $designationlist) { ?>
                                                                            <option value="<?php echo $designationlist->desig_id; ?>" <?php echo ($usersearch_by_Id['u_desigid'] == $designationlist->desig_id) ? 'selected' : ''; ?>><?php echo $designationlist->desig_name; ?></option>
                                                                        <?php } ?>  
                                                                    </select>
                                                                    <label id="error_desig" class="d-none text-danger"></label>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                                    <label>User Role</label>
                                                                    <select id="role" class="form-control" disabled>
                                                                    <option value="" disabled selected>Select role...</option>
                                                                        <?php foreach($rolelists as $rolelist) { ?>
                                                                            <option value="<?php echo $rolelist->roleid; ?>" <?php echo ($usersearch_by_Id['u_roleid'] == $rolelist->roleid) ? 'selected' : ''; ?>><?php echo $rolelist->rolename; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <label id="error_role" class="d-none text-danger"></label>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>User State</label>
                                                            <select id="ustate" class="form-control">
                                                                <option value="" disabled selected>Choose...</option>
                                                                <option value="1" <?php echo ($usersearch_by_Id['u_status'] == 1) ? 'selected' : ''; ?>>Active</option>
                                                                <option value="0" <?php echo ($usersearch_by_Id['u_status'] == 0) ? 'selected' : ''; ?>>Inactive</option>                                                
                                                            </select>
                                                            <label id="error_ustate" class="d-none text-danger"></label>
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verificationModal">
                                                                Reset Password
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="row"></div>
                                            </div>
                                        <div class="form-group col-md-3">
                                                <label></label>
                                                <div id="selectedAvatar"></div>
                                            </div>
                                        </div>

                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <button type="button" onClick="changestatus();" class="btn btn-dark float-right">Change Status</button>                                     
                                        </div>
                                    </div>
                                    </form>
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
        Start popup Window
    ***********************************-->
    <div class="modal fade" id="verificationModal" tabindex="-1" role="dialog" aria-labelledby="verificationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verificationModalLabel">Verify Identity</h5>
        
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="verificationForm">
                    <div class="form-group">
                        <label for="currentUsername">Current Username</label>
                        <input type="text" class="form-control" id="currentUsername" placeholder="Enter your current username" value="<?= isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="currentPassword">Current Password</label>
                        <input type="password" class="form-control" id="currentPassword" placeholder="Enter your current password">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="verifyIdentity('<?php echo $usersearch_by_Id['u_id']; ?>')">Verify</button>
            </div>
        </div>
    </div>
    </div>
    <!--**********************************
        End of popup Window
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->



    <script type="text/javascript">

            $('#pfno').keyup(function(){
                var newValue = 'PF'+this.value; // Adding two characters 'XX' to the value
                $('#uname').val(newValue);
                       });





        function verifyIdentity(sel_uid) {
        // Get the entered username and password
            var currentUsername = $('#currentUsername').val();
            var currentPassword = $('#currentPassword').val();
            var username        = $('#uname').val();


            if (currentUsername !== "" && currentPassword !== "") {

                // swal("Success!", "Login successful", "success");
                $.ajax({
                    url: "<?php echo base_url('/user/resetpwd') ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        inputusername: currentUsername,
                        inputpassword: currentPassword,
                        selecteduserid: sel_uid,
                        selectedusername: username,
                    },
                    success: function(response) {
                        console.log(response.status)
                        if (response && response.status == "pass") {

                            swal("Success!", "Password Reset Successfully!", "success").then((value) => {
                        if (value) {
                            $('#verificationModal').modal('hide'); // Hide the modal
                        }
                        });

                        } else {
                            swal("Error!", "Invaid username or password", "error");

                        }


                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });


            }

        }

        function changestatus(){

            var seluid  = <?= isset($usersearch_by_Id['u_id']) ? $usersearch_by_Id['u_id'] : ''; ?>;
            var ustate = $('#ustate').val();

            $.get("<?php echo base_url();?>"+"/user/changestsus",
            {       
                ustate:$('#ustate').val(),
                seluid: seluid,
                
            },
            function(response) {

            if (response.status == 200) {
                        swal("Success!", "User Status Updated Sucessfully !", "success");

            }else {

            swal("Something Went Wrong !", "User Status Not Changed !", "error");
            }

            });

        }

</script>


<?= $this->endSection() ?>



    


 

