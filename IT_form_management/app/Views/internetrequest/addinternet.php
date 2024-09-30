<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>


    <!-- <link href="<?php echo base_url('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet"> -->




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
                            <!-- <form action="<?php echo base_url('/requests/save');?>" method="post" accept-charset="utf-8"> -->
                            <form  method="post" accept-charset="utf-8">
                                <h4 class="card-title">Requestor's Information</h4>
                                    <div class="form-row">
                                    <div class="form-group col-md-4">
                                                    <label>Department</label>
                                                    <select id="department" class="form-control">
                                                    <option value="" disabled selected>Choose...</option>
                                                        <?php foreach($departments as $department) { ?>
                                                            <option value="<?php echo $department->id; ?>" <?php echo ($selecteduserdata['u_depid'] == $department->id) ? 'selected' : ''; ?>><?php echo $department->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                                    <label id="error_department" class="d-none text-danger"></label>
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label>Role</label>
                                                    <select id="position" class="form-control" onChange="loadrequester();">
                                                    <option value="" disabled selected>Select Grade...</option>
                                                        <?php foreach($rolelists as $rolelist) { ?>
                                                            <option value="<?php echo $rolelist->roleid; ?>" <?php echo ($selecteduserdata['u_roleid'] == $rolelist->roleid) ? 'selected' : ''; ?>><?php echo $rolelist->rolename; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label id="error_desig" class="d-none text-danger"></label>
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label>Requester</label>
                                                    <select name="name" id="user_id" class="form-control">
                                                    <option value="" disabled selected></option>
                                                        <?php foreach($userlists as $userlist) { ?>
                                                            <option value="<?php echo $userlist->u_id; ?>" <?php echo ($selecteduserdata['u_id'] == $userlist->u_id) ? 'selected' : ''; ?>><?php echo $userlist->u_fname; ?></option>
                                                        <?php } ?>
                                                    </select>
                                            </div>    
                                    </div>
                                    <div class="form-row">
                                                <div class="form-group col-md-4">
                                                <label>PF No <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="pfno" id="pfno" value="<?= isset($selecteduserdata['u_pfno']) ? $selecteduserdata['u_pfno'] : ''; ?>">
                                                <label id="error_pfno" class="d-none text-danger">PF No</label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?= isset($selecteduserdata['u_email']) ? $selecteduserdata['u_email'] : ''; ?>">
                                                <label id="error_email" class="d-none text-danger">Email</label>    
                                            </div>
                                                <div class="form-group col-md-4">
                                                <label>Mobile No <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="mobile" id="mobile" value="<?= isset($selecteduserdata['u_mobile']) ? $selecteduserdata['u_mobile'] : ''; ?>">
                                                <label id="error_mobile" class="d-none text-danger">Mobile No</label>   
                                            </div> 
                                                
                                    </div>
                                            
                                    <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Ext <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control"  name="exten" id="exten" value="<?= isset($selecteduserdata['u_extention']) ? $selecteduserdata['u_extention'] : ''; ?>">
                                                <label id="error_exten" class="d-none text-danger">Extension Number</label>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="m-t-20">Date</label>
                                                <input type="text" class="form-control" placeholder="<?php echo date('Y-m-d'); ?>" name="request_date" id="request_date">
                                                <label id="error_req_date" class="d-none text-danger">Request Date</label>
                                            </div>   
                                    </div>
                                </div>
 
                                <br>
                              
                                <h4 class="card-title">Information about the PC</h4>
                                                            
                                    <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="m-t-20">IP Address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="" id="server_ip" name="server_ip">
                                        <label id="error_server_ip" class="d-none text-danger">IP Address</label>
                                    </div>     
                                    <div class="form-group col-md-4">
                                    <label>Access Type</label>
                                                    <select id="access_type" name="access_type" class="form-control">
                                                    <option value="internet">Normal Internet</option>
                                                    <option value="w_proxy">With Proxy</option>
                                                    <option value="f_internet">Without Proxy</option>
                                                    </select>
                                    </div>                                    
                                    <div class="form-group col-md-3">
                                            <label>Category <span class="text-danger">*</span></label>
                                                <table  style="width:100%; margin-left:25px">
                                                    <tr>
                                                        <td>
                                                            <input class="form-check-input" type="radio" id="category" name="category" value="Permanent">
                                                            <label class="form-check-label">Permanent</label> 
                                                        </td>
                                                        <td>
                                                            <input class="form-check-input" type="radio" id="category" name="category" value="Test/Temp">
                                                            <label class="form-check-label">Test/Temp</label>
                                                        </td>
                                                        
                                                    </tr>
                                                </table>
                                                <label id="error_catogary" class="d-none text-danger">Type of Change</label>                                               
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="m-t-20">Effective From <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="<?php echo date('Y-m-d'); ?>" id="efrmdate" name="efrmdate">
                                        <label id="error_eff_date" class="d-none text-danger">Effective Date</label>
                                    </div> 

                                    <div class="form-group col-md-4">
                                        <label class="m-t-20">Expiration Date <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="<?php echo date('Y-m-d'); ?>" id="exdate" name="exdate">
                                        <label id="error_exp_date" class="d-none text-danger">Expiration Date</label>
                                    </div>
                                    </div> 
                                   <div class="form-row">     
                                            <div class="form-group col-md-12">
                                            <label>Purpose</label>
                                            <div class="form-group">                                            
                                                <textarea class="form-control h-150px w-100" id="purpose" name="purpose"></textarea>
                                            </div>       

                                    </div> 

                                </div>

                               

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                        <button type="button" onClick="saveRequest();" class="btn btn-dark float-right">Request</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        
                        <!-- Card -->
                    </div>

                </div>
            </div>
            


        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->

        <!--**********************************
            Footer end
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <!-- Lakmal for check end -->

      <script type="text/javascript">

        // $(document).ready(function() {

            function loadrequester() {
                // alert('viewscript');

                var position = $("#position").val();
                // alert(position);

                $.post("<?php echo base_url();?>"+"/requests/getusers",
                {
                    id: position,
                },
                function(response){

                    if (response.status == 200) {
                        $data = json_decode(response.data, true);
                        // alert('200');                        
                        var userlists = response.data.userlists;
                        var select = document.getElementById('option');

                    } if (response.status == 100 && response.data && response.data.userlists){  
                        
                        var userlists = response.data.userlists;
                        var select = document.getElementById('user_id');

                    // Clear existing options
                         select.innerHTML = '';

                    // Loop through userlists and create option elements
                        userlists.forEach(function(user) {
                        var option = document.createElement('option');
                        option.value = user.u_id;
                        option.text = user.u_fname; // Replace with the actual user property you want to display
                        select.appendChild(option);
                });


                    } else {
                        console.log('Error: ' + response.message);
                     }
                    
                });

                document.getElementById("user_id").disabled=false;



            }

        // });


    function saveRequest(){
        

        var category = $('input[name="category"]:checked').val();

            if(typeof(category) == "undefined") {
                category = null;
            }

            var position = $("#position").val();
            var department =  $("#department").val();
            var user_id =  $("#user_id").val();
            var pfno = $("#pfno").val();
            var email =  $("#email").val();
            var mobile =  $("#mobile").val();
            var exten = $("#exten").val();
            var request_date =  $("#request_date").val();
            var access_type =  $("#access_type").val();
            var server_ip =  $("#server_ip").val();
            var category =  category;
            var efrmdate =  $("#efrmdate").val();
            var exdate =  $("#exdate").val();
            var purpose =  $("#purpose").val();

       
        // $('#dropDownId :selected').text();
        // $('input[name="name_of_your_radiobutton"]:checked').val();

        $.post("<?php echo base_url();?>"+"/requests/save_internet",
        {
        position : position,
        department : department, 
        user_id : user_id,  
        pfno : pfno, 
        email: email,  
        mobile : mobile, 
        exten : exten,  
        request_date : request_date, 
        access_type : access_type, 
        server_ip : server_ip, 
        category : category, 
        efrmdate : efrmdate, 
        exdate : exdate,  
        purpose : purpose,  
        },
        function(response) {
                //alert($('#explanation').val());
                clearSaveRequestErrors();

                if (response.status == 200) {

                    swal("Success!", "Internet Request Added for Approval !", "success").then((value) => {
                        if (value) {
                            location.reload();
                        }
                        });

                } else if (response.status == 400) {
                    // validation error response
                    // if ($('#position').val() === "") {
                    //     $("#error_desig").html("Please select a position.").removeClass('d-none');
                    // }
                    if(typeof(response.data.errors.position) != "undefined" && response.data.errors.position !== null) {
                        $("#error_desig").html(response.data.errors.position).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.email) != "undefined" && response.data.errors.email !== null) {
                        $("#error_email").html(response.data.errors.email).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.pfno) != "undefined" && response.data.errors.pfno !== null) {
                        $("#error_pfno").html(response.data.errors.pfno).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.mobile) != "undefined" && response.data.errors.mobile !== null) {
                        $("#error_mobile").html(response.data.errors.mobile).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.exten) != "undefined" && response.data.errors.exten !== null) {
                        $("#error_exten").html(response.data.errors.exten).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.department) != "undefined" && response.data.errors.department !== null) {
                        $("#error_department").html(response.data.errors.department).removeClass('d-none');
                    }
                    // if(typeof(response.data.errors.desig) != "undefined" && response.data.errors.desig !== null) {
                    //     $("#error_desig").html(response.data.errors.desig).removeClass('d-none');
                    // }
                    if(typeof(response.data.errors.category) != "undefined" && response.data.errors.category !== null) {
                        $("#error_catogary").html(response.data.errors.category).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.server_ip) != "undefined" && response.data.errors.server_ip !== null) {
                        $("#error_server_ip").html(response.data.errors.server_ip).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.request_date) != "undefined" && response.data.errors.request_date !== null) {
                        $("#error_req_date").html(response.data.errors.request_date).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.efrmdate) != "undefined" && response.data.errors.efrmdate !== null) {
                        $("#error_eff_date").html(response.data.errors.efrmdate).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.exdate) != "undefined" && response.data.errors.exdate !== null) {
                        $("#error_exp_date").html(response.data.errors.exdate).removeClass('d-none');
                    }
                   


                } else {
                    // other error response
                    swal("Error", "Error Adding Internet Request", "error");  
                    location.reload();
                }
                
            });
        }
        
    
        function clearSaveRequestErrors() {
            $("#error_email").html("").addClass('d-none');
            $("#error_pfno").html("").addClass('d-none');
            $("#error_mobile").html("").addClass('d-none');
            $("#error_exten").html("").addClass('d-none');
            $("#error_department").html("").addClass('d-none'); 
            $("#error_server_ip").html("").addClass('d-none');
            $("#error_desig").html("").addClass('d-none');
            $("#error_catogary").html("").addClass('d-none');
            $("#error_req_date").html("").addClass('d-none');
            $("#error_eff_date").html("").addClass('d-none');
            $("#error_exp_date").html("").addClass('d-none');
            
        }

    

        </script>

<?= $this->endSection() ?>





    


 

