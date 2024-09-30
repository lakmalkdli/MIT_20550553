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
                            
                                <h4 class="card-title">User Information</h4>
                                <div class="basic-form">
                                    <form>
                                    <div class="form-row"> 
                                        <div class="form-group col-md-3">
                                            <label>First Name <span class="text-danger">*</span></label>
                                            <input id="fname" type="text" class="form-control" placeholder="First name">
                                            <label id="error_fname" class="d-none text-danger">First Name</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Last Name <span class="text-danger">*</span></label>
                                            <input type="text" id="lname" class="form-control" placeholder="Last name">
                                            <label id="error_lname" class="d-none text-danger ">Last Name</label>                                        
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>PF No <span class="text-danger">*</span></label>
                                            <input id="pfno" type="text" class="form-control" placeholder="PF No">
                                            <label id="error_pfno" class="d-none text-danger">PF No</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input id="email" type="email" class="form-control" placeholder="Email" name="email">
                                            <label id="error_email" class="d-none text-danger text-danger">Email</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>User Name</label>
                                            <input id="uname" type="email" class="form-control"  disabled>
                                            
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                        <label>Extension <span class="text-danger">*</span></label>
                                        <input id="exten" type="text" class="form-control" name="exten">
                                        <label id="error_exten" class="d-none text-danger">Extension Number</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Mobile</label>
                                            <input type="text" id="mobile" class="form-control" name="mobile">
                                            <label id="error_mobile" class="d-none text-danger">Mobile No</label>
                                        </div>
                                       
                                        </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                                    <label>Department <span class="text-danger">*</span></label>
                                                    <select id="dep" class="form-control">
                                                        <option value="" disabled selected>Select your unit...</option>
                                                        <?php foreach($departments as $department) { ?>
                                                            <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                                    <label id="error_dep" class="d-none text-danger"></label>
                                       </div>
                                        <div class="form-group col-md-3">
                                                    <label>Designation <span class="text-danger">*</span></label>
                                                    <select id="desig" class="form-control">
                                                        <option value="" disabled selected>select your Designation...</option>
                                                        <?php foreach($designationlists as $designationlist) { ?>
                                                            <option value="<?php echo $designationlist->desig_id; ?>"><?php echo $designationlist->desig_name; ?></option>
                                                        <?php } ?>  
                                                    </select>
                                                    <label id="error_desig" class="d-none text-danger"></label>
                                        </div>
                                        <div class="form-group col-md-4">
                                                    <label>User Role <span class="text-danger">*</span></label>
                                                    <select id="role" class="form-control">
                                                    <option value="" disabled selected>Select role...</option>
                                                        <?php foreach($rolelists as $rolelist) { ?>
                                                            <option value="<?php echo $rolelist->roleid; ?>"><?php echo $rolelist->rolename; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label id="error_role" class="d-none text-danger"></label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>User State <span class="text-danger">*</span></label>
                                            <select id="ustate" class="form-control">
                                                <option value="" disabled selected>Choose...</option>
                                                <option value = "1">Active</option>
                                                <option value = "0">Inactive</option>                                                
                                            </select>
                                            <label id="error_ustate" class="d-none text-danger"></label>
                                        </div>

                                        <div class="form-group col-md-3">
                                                <label>User Avatar</label>
                                                    <select id="avatarSelect"  class="form-control" onChange = "showavatar()">
                                                    <option selected="selected" value="<?php echo base_url(
                                                    "images/avatar/1.png"
                                                ); ?>">Select Avatar...</option>
                                                    <option value="<?php echo base_url(
                                                        "images/avatar/2.png"
                                                    ); ?>">Avatar 1</option>
                                                    <option value="<?php echo base_url(
                                                        "images/avatar/3.png"
                                                    ); ?>">Avatar 2</option>
                                                    <option value="<?php echo base_url(
                                                        "images/avatar/4.png"
                                                    ); ?>">Avatar 3</option>
                                                    <option value="<?php echo base_url(
                                                        "images/avatar/5.png"
                                                    ); ?>">Avatar 4</option>
                                                    <option value="<?php echo base_url(
                                                        "images/avatar/6.png"
                                                    ); ?>">Avatar 5</option>
                                                    <option value="<?php echo base_url(
                                                        "images/avatar/7.png"
                                                    ); ?>">Avatar 6</option>
                                                    <option value="<?php echo base_url(
                                                        "images/avatar/8.png"
                                                    ); ?>">Avatar 7</option>
                                                    <option value="<?php echo base_url(
                                                        "images/avatar/9.png"
                                                    ); ?>">Avatar 8</option>
                                                    <!-- Add more options for additional avatars -->
                                                </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                                <label></label>
                                                <div id="selectedAvatar"></div>
                                            </div>
                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-md-3">
                                                    <label>New Password <span class="text-danger">*</span></label>
                                                    <input required type="password" class="form-control" placeholder="Password" id="pwd">
                                                    <label id="error_newpassword" class="d-none text-danger">New Password</label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Confirm New Password <span class="text-danger">*</span></label>
                                                <input required type="password" class="form-control" placeholder="Confirm Password" id="cnpwd">
                                                <label id="error_cnpwd" class="d-none text-danger">Confirm Password</label>
                                            </div>



                                        </div>

                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <button type="button" onClick="saveUser();" class="btn btn-dark float-right">Submit</button>                                     
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
        Scripts
    ***********************************-->
    
  
    <!-- Lakmal for check start -->
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asColor.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js'); ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script type="text/javascript">

            $('#pfno').keyup(function(){
                var newValue = 'PF'+this.value; // Adding two characters 'XX' to the value
                $('#uname').val(newValue);
                       });



        function showavatar(){

            document.getElementById('avatarSelect').addEventListener('change', function() {
                var selectedAvatar = this.value;
                
                document.getElementById('selectedAvatar').innerHTML = '<img id="useravatar" src="' + selectedAvatar + '" alt="Selected Avatar" class=" rounded-circle mr-3"> ';
            });

        }



        function saveUser(){

            var slicedSubstring;
            var avatar = $("#avatarSelect").val();

            if(avatar != undefined)
                        {
                            // Find the index of the last occurrence of '/'
                        var lastIndex = avatar.lastIndexOf('/');

                        // Extract substring from the last '/' to the end of the string
                        var substring = avatar.substring(lastIndex + 1);
                        //console.log(substring); // Output: file.jpg

                        // Alternatively, you can use slice() method
                        slicedSubstring = avatar.slice(lastIndex + 1);
                        }
                        


            $.get("<?php echo base_url();?>"+"/user/save",
            {
                
                fname: $("#fname").val(),
                lname: $("#lname").val(),
                pfno:$("#pfno").val(),
                uname:$("#uname").val(),
                email: $("#email").val(),
                mobile: $("#mobile").val(),
                exten: $("#exten").val(),
                dep:$('#dep').val(),
                desig:$('#desig').val(),
                role:$('#role').val(),
                ustate:$('#ustate').val(),
                pwd:$('#pwd').val(),
                cnpwd:$('#cnpwd').val(),
                avatarpath:slicedSubstring,

                
            },
            function(response) {
                //alert($('#fname').val());
                // alert(response.status);
                clearSaveRequestErrors();

                if (response.status == 200) {
                    
                    swal("Success!", "User Added Sucessfully !", "success").then((value) => {
                    if (value) {
                        // Redirect to logout page
                        location.reload();
                        
                    }});
                        
                    

                } else if (response.status == 400) {

                    if(typeof(response.data.errors.fname) != "undefined" && response.data.errors.fname !== null) {
                        $("#error_fname").html(response.data.errors.fname).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.lname) != "undefined" && response.data.errors.lname !== null) {
                        $("#error_lname").html(response.data.errors.lname).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.pfno) != "undefined" && response.data.errors.pfno !== null) {
                     $("#error_pfno").html(response.data.errors.pfno).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.email) != "undefined" && response.data.errors.email !== null) {
                        $("#error_email").html(response.data.errors.email).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.mobile) != "undefined" && response.data.errors.mobile !== null) {
                        $("#error_mobile").html(response.data.errors.mobile).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.exten) != "undefined" && response.data.errors.exten !== null) {
                        $("#error_exten").html(response.data.errors.exten).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.dep) != "undefined" && response.data.errors.dep !== null) {
                        $("#error_dep").html(response.data.errors.dep).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.desig) != "undefined" && response.data.errors.desig !== null) {
                        $("#error_desig").html(response.data.errors.desig).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.role) != "undefined" && response.data.errors.role !== null) {
                        $("#error_role").html(response.data.errors.role).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.ustate) != "undefined" && response.data.errors.ustate !== null) {
                        $("#error_ustate").html(response.data.errors.ustate).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.pwd) != "undefined" && response.data.errors.pwd !== null) {
                        $("#error_newpassword").html(response.data.errors.pwd).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.cnpwd) != "undefined" && response.data.errors.cnpwd !== null) {
                        $("#error_cnpwd").html(response.data.errors.cnpwd).removeClass('d-none');
                    }


                } 
                else if (response.status == 409) {
                    swal("Error Occurred !", "User Already Exist", "error");

                }
                else {
                    
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

</script>


<?= $this->endSection() ?>



    


 

