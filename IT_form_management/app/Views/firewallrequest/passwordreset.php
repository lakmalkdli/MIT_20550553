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
                            <!-- <form action="<?php echo base_url('/requests/save');?>" method="post" accept-charset="utf-8"> -->
                            <form  method="post" accept-charset="utf-8">
                                <h4 class="card-title">Request Type Information</h4>
                                <div class="form-row"> 
                                            <div class="form-group col-md-4">
                                                <label>Request Type</label>
                                                <table  style="width:100%; margin-left:25px">
                                                    <tr>
                                                        <td>
                                                            <input class="form-check-input" type="radio" id="req_type" name="req_type" value="new_user" onchange="selectReqType(this)">
                                                            <label class="form-check-label">Create New User</label> 
                                                        </td>
                                                        <td>
                                                            <input class="form-check-input" type="radio" id="req_type" name="req_type" value="reset_pwd" onchange="selectReqType(this)">
                                                            <label class="form-check-label">Reset Password</label>
                                                        </td>
                                                        
                                                    </tr>
                                                </table>
                                                <label id="error_req_type" class="d-none text-danger">Type of Request</label>
                                               
                                            </div>
                                            <div class="form-group col-md-4" id="req_reason" style= "display:none">
                                                <label id="label_for_reason" >Reason to reset </label>
                                                <table  style="width:100%; margin-left:25px">
                                                    <tr>
                                                        <td>
                                                            <input class="form-check-input" type="radio" id="reason" name="reason" value="forgotten" >
                                                            <label class="form-check-label" id="label_for_forgotten" >Forgotten</label> 
                                                        </td>
                                                        <td>
                                                           
                                                            <input class="form-check-input" type="radio" id="reason" name="reason" value="disabled"  >
                                                            <label class="form-check-label" id="label_for_disabled" >Account is disabled</label>
                                                        </td>
                                                        
                                                    </tr>
                                                </table>
                                                <label id="error_reason" class="d-none text-danger">Reason to reset</label>
                                               
                                            </div> 
                            
                                    </div>
                                    <h4 class="card-title">User Information</h4>
                                <div class="form-row"> 
                                            <div class="form-group col-md-4">
                                                <label>User Type</label>
                                                <table  style="width:100%; margin-left:25px">
                                                    <tr>
                                                        <td>
                                                            <input class="form-check-input" type="radio" id="user_type" name="user_type" value="stf_mem" onchange="selectUsrType(this)">
                                                            <label class="form-check-label">Staff Member</label> 
                                                        </td>
                                                        <td>
                                                            <input class="form-check-input" type="radio" id="user_type" name="user_type" value="ext_user" onchange="selectUsrType(this)">
                                                            <label class="form-check-label">External User</label>
                                                        </td>
                                                        
                                                    </tr>
                                                </table>
                                                <label id="error_usr_type" class="d-none text-danger">User Type</label>
                                               
                                            </div>
                                            </div>
                                <div class="form-row">    
                                <div class="form-group col-md-4">
                                </div> 
                                </div>
                                <div id="staff_member_section" style="display:none"> 
                                <h4 class="card-title">Staff Member Information</h4>
                                    <div class="form-row">                                    
                                            <div class="form-group col-md-12">
                                                <label>Name with initials</label>
                                                <input type="text" class="form-control" name="name"  id="name">
                                                <label id="error_name" class="d-none text-danger">Name</label>
                                            </div>                                            
                                                                                       
                                            <div class="form-group col-md-4">
                                                    <label>Grade</label>
                                                    <select id="position" class="form-control" onChange="loadrequester();">
                                                    <option value="" disabled selected>Select Grade...</option>
                                                        <?php foreach($rolelists as $rolelist) { ?>
                                                            <option value="<?php echo $rolelist->roleid; ?>"><?php echo $rolelist->rolename; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label id="error_position" class="d-none text-danger">Grade</label>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>PF No</label>
                                                <input type="text" class="form-control" name="pfno" id="pfno">
                                                <label id="error_pfno" class="d-none text-danger">PF No</label>
                                            </div>
                                            <div class="form-group col-md-4">
                                        <label class="m-t-20">NIC No</label>
                                        <input type="text" class="form-control" placeholder="" id="nic" name="nic">
                                        <label id="error_NIC" class="d-none text-danger">NIC No</label>
                                    </div>
                                    </div>
                                    <div class="form-row">

                                                <div class="form-group col-md-4">
                                                <label>Mobile No</label>
                                                <input type="text" class="form-control" name="mobile" id="mobile">
                                                <label id="error_mobile" class="d-none text-danger">Mobile No</label>
                                                </div> 
                                                <div class="form-group col-md-4">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                                                    <label id="error_email" class="d-none text-danger">Email</label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label>Ext</label>
                                                <input type="text" class="form-control" name="exten" id="exten">
                                                <label id="error_ext" class="d-none text-danger">Extension</label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label>Branch</label>
                                                <input type="text" class="form-control" name="branch" id="branch">
                                                <label id="error_branch" class="d-none text-danger">Branch</label>
                                    </div>
                                    <div class="form-group col-md-4">
                                                <label>Branch Code</label>
                                                <input type="text" class="form-control" name="branch_code" id="branch_code">
                                                <label id="error_branch_code" class="d-none text-danger">Branch Code</label>
                                    </div>   
                                    </div>
                                            
                                   

                                </div>
                                                        </div>
 
                                <br>
                                <div id="external_user_section" style="display:none"> 
                                <h4 class="card-title">School Leaver Information</h4>
                                                            
                                    <div class="form-row">
                                    <div class="form-group col-md-12">
                                                <label>Name with initials</label>
                                                <input type="text" class="form-control" name="name1" id="name1">
                                                <label id="error_name1" class="d-none text-danger">Name</label>
                                    </div> 
                                    <div class="form-group col-md-4">
                                        <label class="m-t-20">NIC No</label>
                                        <input type="text" class="form-control" placeholder="" id="nic1" name="nic1">
                                        <label id="error_NIC1" class="d-none text-danger">NIC No</label>
                                    </div>
                                    <div class="form-group col-md-4">
                                                    <label class="m-t-20">Date of contract termination</label>
                                                    <input type="text" class="form-control" placeholder="<?php echo date('Y-m-d'); ?>" id="exdate" name="exdate">
                                                    <label id="error_exp_date" class="d-none text-danger">Contract Termination Date</label>
                                                </div>
                                    <div class="form-group col-md-4">
                                                <label>Branch</label>
                                                <input type="text" class="form-control" name="branch1"  id="branch1">
                                                <label id="error_branch1" class="d-none text-danger">Branch</label>
                                    </div>
                                    <div class="form-group col-md-4">
                                                <label>Branch Code</label>
                                                <input type="text" class="form-control" name="branch_code1"  id="branch_code1">
                                                <label id="error_branch_code1" class="d-none text-danger">Branch Code</label>
                                    </div>                                         

                                    </div> 
                                                        </div>
                                   <div class="form-row">     
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
                        var select = document.getElementById('userSelect');

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

                document.getElementById("userSelect").disabled=false;



            }

        // });

   
                

    //    var req_type;
      
        
     function selectReqType(select) {
       
        var req_reason;
            
        req_reason = document.getElementById('req_reason');


        if (select.value === "reset_pwd") {
        
      

        req_reason.style.display = 'block';
            
        }
        else if (select.value === "new_user") {
        
        
        req_reason.style.display = 'none';
        
    }
        else {
            
       
        req_reason.style.display = 'none';

        }
        }

        function selectUsrType(select) {
        var staff_member_section;
        var external_user_section;
        
        staff_member_section = document.getElementById('staff_member_section');
        external_user_section = document.getElementById('external_user_section');
       
        if (select.value === "stf_mem") {
        
        staff_member_section.style.display = 'block';
        external_user_section.style.display = 'none';
      
            
        }
        else if (select.value === "ext_user") {
        
        staff_member_section.style.display = 'none';
        external_user_section.style.display = 'block';
      
        
    }
        else {
            
        staff_member_section.style.display = 'none';
        external_user_section.style.display = 'none';
        }
        }



    function saveRequest() {

        var req_type = $('input[name="req_type"]:checked').val();

        if(typeof(req_type) == "undefined") {
            req_type = null; 
        }
        var reason = $('input[name="reason"]:checked').val();

        if(typeof(reason) == "undefined") {
            reason = null; 
        }

        var user_type = $('input[name="user_type"]:checked').val();

        if(typeof(user_type) == "undefined") {
            user_type = null;
        }

        if (user_type == "stf_mem"){
        var name =  $("#name").val(); 
        var position = $("#position").val();
        var pfno = $("#pfno").val();
        var email =  $("#email").val();
        var mobile =  $("#mobile").val();
        var exten = $("#exten").val();
        var branch = $("#branch").val();
        var branch_code = $("#branch_code").val();
        var nic = $("#nic").val();
        var exdate = '0000-00-00';
        }
        else {

        var name =  $("#name1").val(); 
        var nic = $("#nic1").val();
        var branch = $("#branch1").val();
        var branch_code = $("#branch_code1").val();
        var exdate = $("#exdate").val();
      
        }
      

      

        $.post("<?php echo base_url();?>"+"/requests/save_passwordreset",
        {
            req_type : req_type,
            reason: reason,
            user_type : user_type, 
            name : name,  
            position : position, 
            pfno: pfno,  
            email : email, 
            mobile : mobile,  
            exten : exten, 
            branch : branch, 
            branch_code : branch_code, 
            exdate : exdate, 
            nic:nic,
        
            
        },
        function(response) {
            //alert($('#explanation').val());
            clearSaveRequestErrors();

            if (response.status == 200) {
                // success response
                alert(response.data.message);    
                location.reload();

            } else if (response.status == 400) {
                
                if(typeof(response.data.errors.req_type) != "undefined" && response.data.errors.req_type !== null) {
                    $("#error_req_type").html(response.data.errors.req_type).removeClass('d-none');
                }
                if(typeof(response.data.errors.reason) != "undefined" && response.data.errors.reason !== null) {
                    $("#error_reason").html(response.data.errors.reason).removeClass('d-none');
                }
                if(typeof(response.data.errors.user_type) != "undefined" && response.data.errors.user_type !== null) {
                    $("#error_usr_type").html(response.data.errors.user_type).removeClass('d-none');
                }
                if(typeof(response.data.errors.name) != "undefined" && response.data.errors.name !== null) {
                    $("#error_name").html(response.data.errors.name).removeClass('d-none');
                }
                if(typeof(response.data.errors.position) != "undefined" && response.data.errors.position !== null) {
                    $("#error_position").html(response.data.errors.position).removeClass('d-none');
                }
                if(typeof(response.data.errors.pfno) != "undefined" && response.data.errors.pfno !== null) {
                    $("#error_pfno").html(response.data.errors.pfno).removeClass('d-none');
                }
                if(typeof(response.data.errors.nic) != "undefined" && response.data.errors.nic !== null) {
                    $("#error_NIC1").html(response.data.errors.nic).removeClass('d-none');
                }
                if(typeof(response.data.errors.email) != "undefined" && response.data.errors.email !== null) {
                    $("#error_email").html(response.data.errors.email).removeClass('d-none');
                }
                if(typeof(response.data.errors.mobile) != "undefined" && response.data.errors.mobile !== null) {
                    $("#error_mobile").html(response.data.errors.mobile).removeClass('d-none');
                }
                if(typeof(response.data.errors.exten) != "undefined" && response.data.errors.exten !== null) {
                    $("#error_ext").html(response.data.errors.exten).removeClass('d-none');
                }
                if(typeof(response.data.errors.branch) != "undefined" && response.data.errors.branch !== null) {
                    $("#error_branch").html(response.data.errors.branch).removeClass('d-none');
                }
                if(typeof(response.data.errors.branch_code) != "undefined" && response.data.errors.branch_code !== null) {
                    $("#error_branch_code").html(response.data.errors.branch_code).removeClass('d-none');
                }
                if(typeof(response.data.errors.exdate) != "undefined" && response.data.errors.exdate !== null) {
                    $("#error_exp_date").html(response.data.errors.exdate).removeClass('d-none');
                }
                if(typeof(response.data.errors.name1) != "undefined" && response.data.errors.name1 !== null) {
                    $("#error_name1").html(response.data.errors.name1).removeClass('d-none');
                }
                if(typeof(response.data.errors.nic1) != "undefined" && response.data.errors.nic1 !== null) {
                    $("#error_NIC1").html(response.data.errors.nic1).removeClass('d-none');
                }
                if(typeof(response.data.errors.branch1) != "undefined" && response.data.errors.branch1 !== null) {
                    $("#error_branch1").html(response.data.errors.branch1).removeClass('d-none');
                }
                if(typeof(response.data.errors.branch_code1) != "undefined" && response.data.errors.branch_code1 !== null) {
                    $("#error_branch_code1").html(response.data.errors.branch_code1).removeClass('d-none');
                }
                


            } else {
                // other error response
                alert(response.data.message); 
                location.reload();
            }
            
        });
        }

        function clearSaveRequestErrors() {
        $("#error_req_type").html("").addClass('d-none');
        $("#error_reason").html("").addClass('d-none');
        $("#error_usr_type").html("").addClass('d-none');
        $("#error_name").html("").addClass('d-none');
        $("#error_position").html("").addClass('d-none');
        $("#error_pfno").html("").addClass('d-none');
        $("#error_NIC").html("").addClass('d-none');
        $("#error_email").html("").addClass('d-none');
        $("#error_mobile").html("").addClass('d-none');
        $("#error_ext").html("").addClass('d-none');
        $("#error_branch").html("").addClass('d-none');
        $("#error_branch_code").html("").addClass('d-none');
        $("#error_exp_date").html("").addClass('d-none');
        $("#error_name1").html("").addClass('d-none');
        $("#error_NIC1").html("").addClass('d-none');
        $("#error_branch1").html("").addClass('d-none');
        $("#error_branch_code1").html("").addClass('d-none');

        }
                                    

        </script>

<?= $this->endSection() ?>





    


 

