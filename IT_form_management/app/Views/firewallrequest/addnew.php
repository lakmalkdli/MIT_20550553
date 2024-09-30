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
                                <h4 class="card-title">Requestor's Information</h4>

                                <div class="form-row">
                                            <div class="form-group col-md-4">
                                                    <label>Select Unit <span class="text-danger">*</span></label>
                                                    <select id="department" class="form-control">
                                                        <option value="" disabled selected>Select your unit...</option>
                                                        <?php foreach($departments as $department) { ?>
                                                            <option value="<?php echo $department->id; ?>" <?php echo ($selecteduserdata['u_depid'] == $department->id) ? 'selected' : ''; ?>><?php echo $department->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                                    <label id="error_department" class="d-none text-danger"></label>
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label>Role<span class="text-danger">*</span></label>
                                                    <select id="desig" class="form-control" onChange="loadrequester();">
                                                    <option value="" disabled selected>Select your grade...</option>
                                                        <?php foreach($rolelists as $rolelist) { ?>
                                                            <option value="<?php echo $rolelist->roleid; ?>" <?php echo ($selecteduserdata['u_roleid'] == $rolelist->roleid) ? 'selected' : ''; ?>><?php echo $rolelist->rolename; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label id="error_desig" class="d-none"></label>
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label>Requester<span class="text-danger">*</span></label>
                                                    <select name="req_name" id="userSelect" class="form-control">
                                                    <option value="" disabled selected></option>
                                                        <?php foreach($userlists as $userlist) { ?>
                                                            <option value="<?php echo $userlist->u_id; ?>" <?php echo ($selecteduserdata['u_id'] == $userlist->u_id) ? 'selected' : ''; ?>><?php echo $userlist->u_fname; ?></option>
                                                        <?php } ?>
                                                    </select>
                                            </div>  
                                    </div>
                                 <div class="form-row">
                                        <div class="form-group col-md-4">
                                                <label>PF No<span class="text-danger">*</span></label>
                                                <input id="pfno" type="text" class="form-control" name="pfno" value="<?= isset($selecteduserdata['u_pfno']) ? $selecteduserdata['u_pfno'] : ''; ?>">
                                                <label id="error_pfno" class="d-none text-danger">PF No</label>
                                        </div>   
                                        <div class="form-group col-md-4">
                                                    <label>Email<span class="text-danger">*</span></label>
                                                    <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="<?= isset($selecteduserdata['u_email']) ? $selecteduserdata['u_email'] : ''; ?>">
                                                    <label id="error_email" class="d-none text-danger">Email</label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label>Mobile No<span class="text-danger">*</span></label>
                                                <input type="text" id="mobile" class="form-control" name="mobile" value="<?= isset($selecteduserdata['u_mobile']) ? $selecteduserdata['u_mobile'] : ''; ?>">
                                                <label id="error_mobile" class="d-none">Mobile No</label>
                                                </div> 
                                </div>
                                            
                                    <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Extension Number<span class="text-danger">*</span></label>
                                                <input id="exten" type="text" class="form-control" name="exten" value="<?= isset($selecteduserdata['u_extention']) ? $selecteduserdata['u_extention'] : ''; ?>">
                                                <label id="error_exten" class="d-none">Extension Number</label>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="m-t-20">Date<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="<?php echo date('Y-m-d'); ?>" name="request_date" id="req_date">
                                            </div>  
                                    </div>
                                </div>

                                <br>
                              
                                <h4 class="card-title">Information about the access request</h4>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label>Type of Change<span class="text-danger">*</span></label>
                                                    <table style="width:100%; margin-left:25px">
                                                        <tr>
                                                            <td>
                                                            <input class="form-check-input" type="radio" id="chngtyp" name="chngtyp" value="Add">
                                                        <label class="form-check-label">Add</label>  
                                                            </td>
                                                            <td>
                                                            <input class="form-check-input" type="radio" id="chngtyp" name="chngtyp" value="Modify">
                                                        <label class="form-check-label">Modify</label> 
                                                                </td>
                                                                <td>
                                                                <input class="form-check-input" type="radio" id="chngtyp" name="chngtyp" value="Remove">
                                                    <label class="form-check-label">Remove</label> 
                                                                </td>
                                                        </tr>
                                                    </table>
                                            <label id="error_changtyp" class="d-none text-danger">Type of Change</label>
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

                                    <div class="form-group col-md-3">
                                        <label class="m-t-20">Effective From<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="<?php echo date('Y-m-d'); ?>" id="efrmdate" name="effec_date">
                                    </div> 
                                    <div class="form-group col-md-3">
                                        <label class="m-t-20">Expiration Date<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="<?php echo date('Y-m-d'); ?>" id="exdate" name="expire_date">
                                    </div>                                  

                                </div> 
                                   <div class="form-row">     
                                        <div class="form-group col-md-12">
                                            <label>Explanation of Change Application</label>
                                            <div class="form-group">                                            
                                                <textarea class="form-control h-150px w-100" id="explanation" name="explanation"></textarea>
                                            </div>
                                    </div> 
                                </div>

                                <h4 class="card-title">Detailed Firewall Request Information</h4>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Source Address/Subnet Mask<span class="text-danger">*</span></label>
                                        <div class="form-group">                                            
                                            <textarea class="form-control h-150px" rows="4" id="sourceip" name="sourceip"></textarea>
                                        </div>
                                        <label id="error_source" class="d-none text-danger">Source Address/Subnet Mask</label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Destination Address/Subnet Mask<span class="text-danger">*</span></label>
                                        <div class="form-group">                                            
                                            <textarea class="form-control h-150px" rows="4" id="destip" name="destip"></textarea>
                                        </div>
                                        <label id="error_destin" class="d-none text-danger" ></label>
                                    </div>                               
                                    <div class="form-group col-md-3">
                                        <label>Protocols<span class="text-danger">*</span></label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px" rows="4" id="protocol" name="protocol"></textarea>
                                                </div>
                                                <label id="error_protocl" class="d-none text-danger"></label>
                                            </div>                                        
                                            <div class="form-group col-md-3">
                                                <label>Ports<span class="text-danger">*</span></label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px" rows="4" id="ports" name="ports"></textarea>
                                                </div>
                                                <label id="error_port" class="d-none text-danger"></label>
                                            </div>
                                        </div>
                                        

                                    <div class="form-row">

                                            <div class="form-group col-md-4">
                                                <label>Direction <span class="text-danger">*</span></label>
                                                    <table  style="width:100%; margin-left:25px">
                                                        <tr>
                                                            <td>
                                                                <input class="form-check-input" type="radio" id="direction" name="direction" value="bi-dir">
                                                                <label class="form-check-label">Bi-Direction</label> 
                                                            </td>
                                                            <td>
                                                                <input class="form-check-input" type="radio" id="direction" name="direction" value="uni-dir">
                                                                <label class="form-check-label">Uni-Direction</label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                <label id="error_direction" class="d-none text-danger"></label>
                                        </div>  

                                            <div class="form-group col-md-4">
                                                <label>Action <span class="text-danger">*</span></label>
                                                    <table  style="width:100%; margin-left:25px">
                                                    <tr>
                                                        <td>
                                                        <input class="form-check-input" type="radio" id="action" name="action" value="permit">
                                                                <label class="form-check-label">Permit</label>    
                                                        </td>
                                                        <td>
                                                        <input class="form-check-input" type="radio" id="action" name="action" value="deny">
                                                                <label class="form-check-label">Deny</label>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                <label id="error_action" class="d-none text-danger"></label>


                                            </div>         
                                       
                                    </div>
                                    <div></div>

                                    <br>    
                                        <!-- <div class="form-row">     
                                                <div class="form-group col-md-12">
                                                <label>Comment</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px w-100" id="comment" name="explanation"></textarea>
                                                </div>
                                                </div> 
                                        </div>    -->
                                        <!-- <div class="form-row">   
                                        <h4 class="card-title">Information about the Manager</h4>
                                            <div class="form-group col-md-12">
                                                    <label>Approved By</label>
                                                    <select id="approvedManager" class="form-control">
                                                        <option selected="selected">Select Division Chief Manager...</option>
                                                        <?php foreach($departments as $department) { ?>
                                                            <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                            </div>  
                                        </div> -->

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

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <script src="<?php echo base_url('js/plugins-init/form-pickers-init.js'); ?>"></script> 
    

      <!-- Lakmal for check end -->

      <script type="text/javascript">

        // $(document).ready(function() {

            function loadrequester() {
                // alert('viewscript');

                var position = $("#desig").val();
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

        function saveRequest() {

            var chngtyp = $('input[name="chngtyp"]:checked').val();

            if(typeof(chngtyp) == "undefined") {
                chngtyp = null; 
            }

            var category = $('input[name="category"]:checked').val();

            if(typeof(category) == "undefined") {
                category = null;
            }

            var direction = $('input[name="direction"]:checked').val();

            if(typeof(direction) == "undefined") {
                direction = null;
            }

            var action = $('input[name="action"]:checked').val();

            if(typeof(action) == "undefined") {
                action = null;
            }

            // $('#req_name :selected').text();
            // $('input[name="name_of_your_radiobutton"]:checked').val();
            // $('#datepicker1').datepicker();
            // $('#datepicker8').datepicker();

            $.post("<?php echo base_url();?>"+"/requests/save",
            {
                department: $('#department').val(),
                desig:$('#desig').val(),
                name:$('#userSelect :selected').text(),
                pfno:$("#pfno").val(),
                email: $("#email").val(),
                mobile: $("#mobile").val(),
                exten: $("#exten").val(),
                req_date: $('#req_date').val(),
                chngtyp: chngtyp,
                category:category,
                efromdate: $('#efrmdate').val(),
                exprdate: $('#exdate').val(),
                explanation: $('#explanation').val(),
                sourceip: $('#sourceip').val(),
                destip: $('#destip').val(),
                protocol: $('#protocol').val(),
                ports: $('#ports').val(),
                direction: direction,
                action: action,
                userSelect: $('#userSelect :selected').val(),
                // source_ip: $('#source_ip').val(),
                
            },
            function(response) {
                //alert($('#explanation').val());
                clearSaveRequestErrors();

                if (response.status == 200) {
                    // success response
                    swal("Success!", "Firewall Request Added for Approval !", "success").then((value) => {
                        if (value) {
                            location.reload();
                        }
                        });

                } else if (response.status == 400) {
                    // validation error response
                    // if ($('#position').val() === "") {
                    //     $("#error_position").html("Please select a position.").removeClass('d-none');
                    // }
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
                    if(typeof(response.data.errors.chngtyp) != "undefined" && response.data.errors.chngtyp !== null && response.data.errors.chngtyp !== "") {
                        $("#error_changtyp").html(response.data.errors.chngtyp).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.exten) != "undefined" && response.data.errors.exten !== null) {
                        $("#error_exten").html(response.data.errors.exten).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.department) != "undefined" && response.data.errors.department !== null) {
                        $("#error_department").html(response.data.errors.department).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.desig) != "undefined" && response.data.errors.desig !== null) {
                        $("#error_desig").html(response.data.errors.desig).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.category) != "undefined" && response.data.errors.category !== null) {
                        $("#error_catogary").html(response.data.errors.category).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.sourceip) != "undefined" && response.data.errors.sourceip !== null) {
                        $("#error_source").html(response.data.errors.sourceip).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.destip) != "undefined" && response.data.errors.destip !== null) {
                        $("#error_destin").html(response.data.errors.destip).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.protocol) != "undefined" && response.data.errors.protocol !== null) {
                        $("#error_protocl").html(response.data.errors.protocol).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.ports) != "undefined" && response.data.errors.ports !== null) {
                        $("#error_port").html(response.data.errors.ports).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.chngtyp) != "undefined" && response.data.errors.chngtyp !== null && response.data.errors.chngtyp !== "") {
                        $("#error_changtyp").html(response.data.errors.chngtyp).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.direction) != "undefined" && response.data.errors.direction !== null && response.data.errors.direction !== "") {
                        $("#error_direction").html(response.data.errors.direction).removeClass('d-none');
                    }
                    if(typeof(response.data.errors.action) != "undefined" && response.data.errors.action !== null && response.data.errors.action !== "") {
                        $("#error_action").html(response.data.errors.action).removeClass('d-none');
                    }


                } else {
                    // other error response
                    // swal("Something Went Wrong !", "Request Not Insert", "error");
                    swal("Something Went Wrong !", "Request Not Insert", "error").then((value) => {
                        if (value) {
                            location.reload();
                        }
                        });
                    
                }
                
            });
        }

        function clearSaveRequestErrors() {
            $("#error_email").html("").addClass('d-none');
            $("#error_pfno").html("").addClass('d-none');
            $("#error_mobile").html("").addClass('d-none');
            $("#error_exten").html("").addClass('d-none');
            $("#error_department").html("").addClass('d-none');
            $("#error_changtyp").html("").addClass('d-none');
            $("#error_source").html("").addClass('d-none');
            $("#error_desig").html("").addClass('d-none');
            $("#error_catogary").html("").addClass('d-none');
            $("#error_destin").html("").addClass('d-none');
            $("#error_protocl").html("").addClass('d-none');
            $("#error_port").html("").addClass('d-none');
            $("#error_direction").html("").addClass('d-none');
            $("#error_action").html("").addClass('d-none');
        }


        </script>

<?= $this->endSection() ?>





    


 

