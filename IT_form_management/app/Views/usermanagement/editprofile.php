<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>
<style>
    #useravatar {
        width: 150px;
    }
</style>
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

                                <h4 class="card-title">Edit User Information</h4>
                                <div class="basic-form">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label>First Name <span class="text-danger">*</span> </label>
                                                <input id="fname" type="text" class="form-control" placeholder="First name" value="<?= isset($selecteduserdata['u_fname']) ? $selecteduserdata['u_fname'] : ''; ?>">
                                                <label id="error_fname" class="d-none text-danger">First Name</label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Last Name <span class="text-danger">*</span></label>
                                                <input type="text" id="lname" class="form-control" placeholder="Last name" value="<?= isset($selecteduserdata['u_lname']) ? $selecteduserdata['u_lname'] : ''; ?>">
                                                <label id="error_lname" class="d-none text-danger ">Last Name</label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>PF No</label>
                                                <input id="pfno" type="text" class="form-control" placeholder="PF No" value="<?= isset($selecteduserdata['u_pfno']) ? $selecteduserdata['u_pfno'] : ''; ?>" disabled>
                                                <label id="error_pfno" class="d-none text-danger">PF No</label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="<?= isset($selecteduserdata['u_email']) ? $selecteduserdata['u_email'] : ''; ?>">
                                                <label id="error_email" class="d-none text-danger text-danger">Email</label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>User Name</label>
                                                <input id="uname" type="text" class="form-control" value="<?= isset($selecteduserdata['u_username']) ? $selecteduserdata['u_username'] : ''; ?>" disabled>

                                            </div>
                                            <!-- </div>
                                    <div class="form-row"> -->
                                            <div class="form-group col-md-3">
                                                <label>Extension <span class="text-danger">*</span></label>
                                                <input id="exten" type="text" class="form-control" name="exten" value="<?= isset($selecteduserdata['u_extention']) ? $selecteduserdata['u_extention'] : ''; ?>">
                                                <label id="error_exten" class="d-none text-danger">Extension Number</label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Mobile</label>
                                                <input type="text" id="mobile" class="form-control" name="mobile" value="<?= isset($selecteduserdata['u_mobile']) ? $selecteduserdata['u_mobile'] : ''; ?>">
                                                <label id="error_mobile" class="d-none text-danger">Mobile No</label>
                                            </div>


                                            <div class="form-group col-md-3">
                                                <label>Department <span class="text-danger">*</span></label>
                                                <select id="dep" class="form-control">
                                                    <option value="" disabled selected>Select your unit...</option>
                                                    <?php foreach ($departments as $department) { ?>
                                                        <option value="<?php echo $department->id; ?>" <?php echo ($selecteduserdata['u_depid'] == $department->id) ? 'selected' : ''; ?>><?php echo $department->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label id="error_dep" class="d-none text-danger"></label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Designation <span class="text-danger">*</span></label>
                                                        <select id="desig" class="form-control">
                                                            <option value="" disabled selected>select your Designation...</option>
                                                            <?php foreach ($designationlists as $designationlist) { ?>
                                                                <option value="<?php echo $designationlist->desig_id; ?>" <?php echo ($selecteduserdata['u_desigid'] == $designationlist->desig_id) ? 'selected' : ''; ?>><?php echo $designationlist->desig_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label id="error_desig" class="d-none text-danger"></label>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>User Role</label>
                                                        <select id="role" class="form-control" disabled>
                                                            <option value="" disabled selected>Select role...</option>
                                                            <?php foreach ($rolelists as $rolelist) { ?>
                                                                <option value="<?php echo $rolelist->roleid; ?>" <?php echo ($selecteduserdata['u_roleid'] == $rolelist->roleid) ? 'selected' : ''; ?>><?php echo $rolelist->rolename; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label id="error_role" class="d-none text-danger"></label>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>User State</label>
                                                        <select id="ustate" class="form-control" disabled>

                                                            <option value="1" <?php echo ($selecteduserdata['u_status'] == 1) ? 'selected' : ''; ?>>Active</option>
                                                            <option value="0" <?php echo ($selecteduserdata['u_status'] == 0) ? 'selected' : ''; ?>>Inactive</option>
                                                        </select>
                                                        <label id="error_ustate" class="d-none text-danger"></label>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>User Avatar</label>
                                                        <select id="avatarSelect" class="form-control" onchange="showavatar()">
                                                            <?php
                                                            // $avatar =  "2.png";
                                                            // $avatar = $selecteduserdata['u_avatar'];
                                                            $avatar = $_SESSION["user_avatar"];
                                                            //echo $status
                                                            switch ($avatar) {
                                                                case "1.png": ?>
                                                                    <option selected="selected" value="<?php echo base_url("images/avatar/1.png"); ?>">Default</option><?php break;
                                                                                                                                                                    case "2.png": ?>
                                                                    <option selected="selected" value="<?php echo base_url("images/avatar/2.png"); ?>">Avatar 2</option><?php break;
                                                                                                                                                                    case "3.png": ?>
                                                                    <option selected="selected" value="<?php echo base_url("images/avatar/3.png"); ?>">Avatar 3</option><?php break;
                                                                                                                                                                    case "4.png": ?>
                                                                    <option selected="selected" value="<?php echo base_url("images/avatar/4.png"); ?>">Avatar 4</option><?php break;
                                                                                                                                                                    case "5.png": ?>
                                                                    <option selected="selected" value="<?php echo base_url("images/avatar/5.png"); ?>">Avatar 5</option><?php break;
                                                                                                                                                                    case "6.png": ?>
                                                                    <option selected="selected" value="<?php echo base_url("images/avatar/6.png"); ?>">Avatar 6</option><?php break;
                                                                                                                                                                    case "7.png": ?>
                                                                    <option selected="selected" value="<?php echo base_url("images/avatar/7.png"); ?>">Avatar 7</option><?php break;
                                                                                                                                                                    case "8.png": ?>
                                                                    <option selected="selected" value="<?php echo base_url("images/avatar/8.png"); ?>">Avatar 8</option><?php break;
                                                                                                                                                                    default: ?>
                                                                    <p>Status: Unknown</p>
                                                            <?php
                                                                                                                                                                }
                                                            ?>
                                                            <option value="<?php echo base_url("images/avatar/1.png"); ?>">Avatar 1</option>
                                                            <option value="<?php echo base_url("images/avatar/2.png"); ?>">Avatar 2</option>
                                                            <option value="<?php echo base_url("images/avatar/3.png"); ?>">Avatar 3</option>
                                                            <option value="<?php echo base_url("images/avatar/4.png"); ?>">Avatar 4</option>
                                                            <option value="<?php echo base_url("images/avatar/5.png"); ?>">Avatar 5</option>
                                                            <option value="<?php echo base_url("images/avatar/6.png"); ?>">Avatar 6</option>
                                                            <option value="<?php echo base_url("images/avatar/7.png"); ?>">Avatar 7</option>
                                                            <option value="<?php echo base_url("images/avatar/8.png"); ?>">Avatar 8</option>
                                                            <!-- Add more options for additional avatars -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 text-center">
                                                <label></label>
                                                <div id="selectedAvatar"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <button type="button" onClick="updateUser();" class="btn btn-dark float-right">Update</button>
                                            </div>
                                        </div>
                                        <hr />
                                        <h4 class="card-title">Password Reset</h4>


                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                    <label>Current Password</label>
                                                    <input required type="password" class="form-control" placeholder="Password" id="curpwd">
                                                    <label id="error_curpassword" class="d-none text-danger">Current Password</label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>New Password</label>
                                                <input required type="password" class="form-control" placeholder="New Password" id="newpwd" >
                                                <label id="error_newpassword" class="d-none text-danger">New Password</label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Confirm New Password</label>
                                                <input required type="password" class="form-control" placeholder="Confirm Password" id="cnpwd" >
                                                <label id="error_cnpwd" class="d-none text-danger">Confirm Password</label>
                                            </div>

                                        </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 text-right">
                                        <!-- <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#verificationModal">
                                            Change Password
                                        </button> -->
                                        <button type="button" onClick="changepassword();" class="btn btn-dark" data-toggle="modal" data-target="">
                                            Change Password
                                        </button>
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
                        <input type="text" class="form-control" id="currentUsername" placeholder="Enter your current username" value="<?= isset($selecteduserdata['u_username']) ? $selecteduserdata['u_username'] : ''; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="currentPassword">Current Password</label>
                        <input type="password" class="form-control" id="currentPassword" placeholder="Enter your current password">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="verifyIdentity()">Verify</button>
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
    $('#pfno').keyup(function() {
        var newValue = 'PF' + this.value; // Adding two characters 'XX' to the value
        $('#uname').val(newValue);
    });

    $(document).ready(function() {

        document.getElementById('selectedAvatar').innerHTML = '<img id="useravatar" src="<?php echo base_url(
                                                                                                "images/avatar/" . $selecteduserdata["u_avatar"]
                                                                                            ); ?>" alt="Selected Avatar" class=" rounded-circle mr-3"> ';
    });

    // Event listener for select change
    document.getElementById('avatarSelect').addEventListener('change', function() {
        var selectedAvatar = this.value;

        document.getElementById('selectedAvatar').innerHTML = '<img id="useravatar" src="' + selectedAvatar + '" alt="Selected Avatar" class=" rounded-circle mr-3"> ';
    });




    function showavatar() {

        document.getElementById('avatarSelect').addEventListener('change', function() {
            var selectedAvatar = this.value;

            document.getElementById('selectedAvatar').innerHTML = '<img id="useravatar" src="' + selectedAvatar + '" alt="Selected Avatar" class=" rounded-circle mr-3"> ';
        });

    }


    function changepassword(){

            $.get("<?php echo base_url(); ?>" + "/user/pwchng", {

            uname: $("#uname").val(),
            curpwd: $('#curpwd').val(),
            newpwd: $('#newpwd').val(),
            cnpwd: $('#cnpwd').val(),
            selecteduid : <?= isset($selecteduserdata['u_id']) ? $selecteduserdata['u_id'] : ''; ?>,
            },
             function(response) {
                // alert($('#curpwd').val());
                // alert(response.status);
                clearpasswordResetErrors();

                if (response.status == 200) {
                    // swal("Success!", "Password Changed Sucessfully !", "success");
                    swal("Success!", "Password Changed Successfully!", "success").then((value) => {
                    if (value) {
                        // Redirect to logout page
                        window.location.href = "<?php echo base_url('login'); ?>";
                        // href="<?php echo base_url('user/getuser'); ?>"
                    }
                });
                    

                } else if (response.status == 400) {

                    if (typeof(response.data.errors.curpwd) != "undefined" && response.data.errors.curpwd !== null) {
                        $("#error_curpassword").html(response.data.errors.curpwd).removeClass('d-none');
                    }
                    if (typeof(response.data.errors.newpwd) != "undefined" && response.data.errors.newpwd !== null) {
                        $("#error_newpassword").html(response.data.errors.newpwd).removeClass('d-none');
                    }
                    if (typeof(response.data.errors.cnpwd) != "undefined" && response.data.errors.cnpwd !== null) {
                        $("#error_cnpwd").html(response.data.errors.cnpwd).removeClass('d-none');
                    }
                }else if (response.status == 410){
                    swal("Invalid Password!", "You Enter Wrong Password !", "error");

                }else {

                    swal("Success!", "User Change Sucessfully !", "success");
                }

        });
    }




    function updateUser() {

        var slicedSubstring;
        var avatar = $("#avatarSelect").val();

        if (avatar != undefined) {
            // Find the index of the last occurrence of '/'
            var lastIndex = avatar.lastIndexOf('/');

            // Extract substring from the last '/' to the end of the string
            var substring = avatar.substring(lastIndex + 1);
            //console.log(substring); // Output: file.jpg

            // Alternatively, you can use slice() method
            slicedSubstring = avatar.slice(lastIndex + 1);
        }



        $.get("<?php echo base_url(); ?>" + "/user/update", {

                fname: $("#fname").val(),
                lname: $("#lname").val(),
                email: $("#email").val(),
                mobile: $("#mobile").val(),
                exten: $("#exten").val(),
                dep: $('#dep').val(),
                desig: $('#desig').val(),
                avatarpath: slicedSubstring,


            },
            function(response) {
                clearSaveRequestErrors();

                if (response.status == 200) {
                    swal("Success!", "User Updated Sucessfully !", "success");

                } else if (response.status == 400) {

                    if (typeof(response.data.errors.fname) != "undefined" && response.data.errors.fname !== null) {
                        $("#error_fname").html(response.data.errors.fname).removeClass('d-none');
                    }
                    if (typeof(response.data.errors.lname) != "undefined" && response.data.errors.lname !== null) {
                        $("#error_lname").html(response.data.errors.lname).removeClass('d-none');
                    }
                    if (typeof(response.data.errors.email) != "undefined" && response.data.errors.email !== null) {
                        $("#error_email").html(response.data.errors.email).removeClass('d-none');
                    }
                    if (typeof(response.data.errors.mobile) != "undefined" && response.data.errors.mobile !== null) {
                        $("#error_mobile").html(response.data.errors.mobile).removeClass('d-none');
                    }
                    if (typeof(response.data.errors.exten) != "undefined" && response.data.errors.exten !== null) {
                        $("#error_exten").html(response.data.errors.exten).removeClass('d-none');
                    }
                    if (typeof(response.data.errors.dep) != "undefined" && response.data.errors.dep !== null) {
                        $("#error_dep").html(response.data.errors.dep).removeClass('d-none');
                    }
                    if (typeof(response.data.errors.desig) != "undefined" && response.data.errors.desig !== null) {
                        $("#error_desig").html(response.data.errors.desig).removeClass('d-none');
                    }
                    if (typeof(response.data.errors.pwd) != "undefined" && response.data.errors.pwd !== null) {
                        $("#error_newpassword").html(response.data.errors.pwd).removeClass('d-none');
                    }
                    if (typeof(response.data.errors.cnpwd) != "undefined" && response.data.errors.cnpwd !== null) {
                        $("#error_cnpwd").html(response.data.errors.cnpwd).removeClass('d-none');
                    }


                } else if (response.status == 409) {
                    swal("Error Occurred !", "User Already Exist", "error");

                } else {

                    swal("Something Went Wrong !", "User Not Insert", "error");
                }

            });
    }

    function clearSaveRequestErrors() {
        $("#error_fname").html("").addClass('d-none');
        $("#error_lname").html("").addClass('d-none');
        $("#error_email").html("").addClass('d-none');
        $("#error_pfno").html("").addClass('d-none');
        $("#error_mobile").html("").addClass('d-none');
        $("#error_exten").html("").addClass('d-none');
        $("#error_dep").html("").addClass('d-none');
        $("#error_desig").html("").addClass('d-none');
        $("#error_role").html("").addClass('d-none');
        $("#error_ustate").html("").addClass('d-none');
        $("#error_newpassword").html("").addClass('d-none');
        $("#error_cnpwd").html("").addClass('d-none');

    }

    function clearpasswordResetErrors() {
        $("#error_curpassword").html("").addClass('d-none');
        $("#error_newpassword").html("").addClass('d-none');
        $("#error_cnpwd").html("").addClass('d-none');

    }

    function verifyIdentity() {
        // Get the entered username and password
        var currentUsername = $('#currentUsername').val();
        var currentPassword = $('#currentPassword').val();


        if (currentUsername !== "" && currentPassword !== "") {

            // swal("Success!", "Login successful", "success");
            $.ajax({
                url: "<?php echo base_url('/user/changepwd') ?>",
                type: "POST",
                dataType: "json",
                data: {
                    inputusername: currentUsername,
                    inputpassword: currentPassword,
                },
                success: function(response) {
                    console.log(response.status)
                    if (response && response.status == "pass") {

                        document.getElementById("pwd").disabled = false;
                        document.getElementById("cnpwd").disabled = false;
                        $('#verificationModal').modal('hide'); // Hide the modal
                        // window.$("#verificationModal").modal("hide");

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
        // if (currentUsername === 'your_username' && currentPassword === 'your_password') {
        //     // Credentials are valid, proceed with changing the password
        //     // Call your function here to change the password
        //     // For example: changePassword();
        //     $('#verificationModal').modal('hide'); // Hide the modal
        // } else {
        //     // Invalid credentials, show an error message
        //     alert('Invalid username or password');
        // }
    }
</script>


<?= $this->endSection() ?>