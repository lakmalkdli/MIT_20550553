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
                                                    <select id="department" class="form-control" disabled>
                                                    <option value="" disabled selected>Choose...</option>
                                                        <?php foreach($departments as $department) { ?>
                                                            <option value="<?php echo $department->id; ?>" <?php echo ($datasearch_by_Id[0]['department'] == $department->id) ? 'selected' : ''; ?>><?php echo $department->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                                    <label id="error_department" class="d-none text-danger"></label>
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label>Role</label>
                                                    <select id="position" class="form-control" onChange="loadrequester();" disabled>
                                                    <option value="" disabled selected>Select Grade...</option>
                                                        <?php foreach($rolelists as $rolelist) { ?>
                                                            <option value="<?php echo $rolelist->roleid; ?>" <?php echo ($datasearch_by_Id[0]['position'] == $rolelist->roleid) ? 'selected' : ''; ?>><?php echo $rolelist->rolename; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label id="error_desig" class="d-none text-danger"></label>
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label>Requester</label>
                                                    <input type="text" class="form-control" name="uname" id="uname" value="<?= isset($datasearch_by_Id[0]['u_fname']) ? $datasearch_by_Id[0]['u_fname'] : ''; ?>" disabled>
                                            </div>    
                                    </div>
                                    <div class="form-row">
                                                <div class="form-group col-md-4">
                                                <label>PF No <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="pfno" id="pfno" value="<?= isset($datasearch_by_Id[0]['pfno']) ? $datasearch_by_Id[0]['pfno'] : ''; ?>" disabled>
                                                <label id="error_pfno" class="d-none text-danger">PF No</label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?= isset($datasearch_by_Id[0]['email']) ? $datasearch_by_Id[0]['email'] : ''; ?>" disabled>
                                                <label id="error_email" class="d-none text-danger">Email</label>    
                                            </div>
                                                <div class="form-group col-md-4">
                                                <label>Mobile No <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="mobile" id="mobile" value="<?= isset($datasearch_by_Id[0]['mobile']) ? $datasearch_by_Id[0]['mobile'] : ''; ?>" disabled>
                                                <label id="error_mobile" class="d-none text-danger">Mobile No</label>   
                                            </div> 
                                                
                                    </div>
                                            
                                    <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Ext <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control"  name="exten" id="exten" value="<?= isset($datasearch_by_Id[0]['extention']) ? $datasearch_by_Id[0]['extention'] : ''; ?>" disabled>
                                                <label id="error_exten" class="d-none text-danger">Extension Number</label>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="m-t-20">Date</label>
                                                <input type="text" class="form-control" placeholder="<?php echo date('Y-m-d'); ?>" name="request_date" id="request_date" value="<?= isset($datasearch_by_Id[0]['req_date']) ? $datasearch_by_Id[0]['req_date'] : ''; ?>" disabled>
                                                <label id="error_req_date" class="d-none text-danger">Request Date</label>
                                            </div>   
                                    </div>
                                </div>
 
                                <br>
                              
                                <h4 class="card-title">Information about the PC</h4>
                                                            
                                    <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="m-t-20">IP Address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="" id="server_ip" name="server_ip" value="<?= isset($datasearch_by_Id[0]['ip_address']) ? $datasearch_by_Id[0]['ip_address'] : ''; ?>" disabled>
                                        <label id="error_server_ip" class="d-none text-danger">IP Address</label>
                                    </div>     
                                    <div class="form-group col-md-4">
                                    <label>Access Type</label>
                                        <?php 
                                        $access_type = isset($datasearch_by_Id[0]['access_type']) ? $datasearch_by_Id[0]['access_type'] : ''; 
                                        ?>
                                        <select id="access_type" name="access_type" class="form-control" disabled>
                                            <option value="internet" <?= ($access_type == 'internet') ? 'selected' : ''; ?>>Normal Internet</option>
                                            <option value="w_proxy" <?= ($access_type == 'w_proxy') ? 'selected' : ''; ?>>With Proxy</option>
                                            <option value="f_internet" <?= ($access_type == 'f_internet') ? 'selected' : ''; ?>>Full Internet</option>
                                        </select>
                                    </div>                                    
                                    <div class="form-group col-md-3">
                                            <label>Category <span class="text-danger">*</span></label>
                                                <table  style="width:100%; margin-left:25px">
                                                    <tr>
                                                        <td>
                                                            <input class="form-check-input" type="radio" id="category" name="category" value="Permanent" <?= $datasearch_by_Id[0] == 0 ? "" : ($datasearch_by_Id[0]['category'] == "permanent" ? "checked" : "") ?>>
                                                            <label class="form-check-label">Permanent</label> 
                                                        </td>
                                                        <td>
                                                            <input class="form-check-input" type="radio" id="category" name="category" value="Test/Temp" <?= $datasearch_by_Id[0] == 0 ? "" : ($datasearch_by_Id[0]['category'] == "Test/Temp" ? "checked" : "") ?>>
                                                            <label class="form-check-label">Test/Temp</label>
                                                        </td>
                                                        
                                                    </tr>
                                                </table>
                                                <label id="error_catogary" class="d-none text-danger">Type of Change</label>                                               
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="m-t-20">Effective From <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="<?php echo date('Y-m-d'); ?>" id="efrmdate" name="efrmdate" value="<?= isset($datasearch_by_Id[0]['effective_from']) ? $datasearch_by_Id[0]['effective_from'] : ''; ?>" disabled>
                                        <label id="error_eff_date" class="d-none text-danger">Effective Date</label>
                                    </div> 

                                    <div class="form-group col-md-4">
                                        <label class="m-t-20">Expiration Date <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="<?php echo date('Y-m-d'); ?>" id="exdate" name="exdate" value="<?= isset($datasearch_by_Id[0]['expire_on']) ? $datasearch_by_Id[0]['expire_on'] : ''; ?>" disabled>
                                        <label id="error_exp_date" class="d-none text-danger">Expiration Date</label>
                                    </div>
                                    </div> 
                                   <div class="form-row">     
                                            <div class="form-group col-md-12">
                                            <label>Purpose</label>
                                            <div class="form-group">                                          
                                                <textarea class="form-control h-150px w-100" id="purpose" name="purpose" disabled><?= isset($datasearch_by_Id[0]['purpose']) ? $datasearch_by_Id[0]['purpose'] : ''; ?></textarea>

                                            </div>       

                                    </div> 

                                </div>
                                <h4 class="card-title">Manager Approval Information</h4>
                                <div class="form-row">     
                                                <div class="form-group col-md-12">
                                                <label>Comment</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px w-100" id="man_comment" name="man_comment"disabled><?php echo $datasearch_by_Id[0]["managercomment"] ?></textarea>
                                                </div>
                                                </div> 
                                    </div>
                                <div class="form-row">
                                        <div class="form-group col-md-4">
                                                        <label>Approved By</label>
                                                        <select id="approvedManager" class="form-control" disabled>                                                            
                                                            <?php foreach($unitmanager as $umanager) { ?>
                                                            <option value="<?php echo $umanager->u_id; ?>" <?php echo ($datasearch_by_Id[0]['app_by'] == $umanager->u_id) ? 'selected' : ''; ?>><?php echo $umanager->u_fname; ?></option>
                                                            <?php } ?>       
                                                        </select>
                                        </div>
                                    </div>
                                    <h4 class="card-title">Authorization From IT Security</h4>
                                    <div class="form-row">     
                                                <div class="form-group col-md-12">
                                                <label>Comments From IT Security</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px w-100" id="sec_comment" name="sec_comment"></textarea>
                                                </div>
                                                </div> 
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                                        <label>Approved By</label>
                                                        <select id="authManager" class="form-control">
                                                            <?php foreach($authofficer as $secmanager) { ?>
                                                            <option value="<?php echo $secmanager->u_id; ?>"><?php echo $secmanager->u_fname; ?></option>
                                                            <?php } ?>       
                                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <input id="aprroval_id" type="hidden" value="<?php echo $datasearch_by_Id[0]['intreq_id']; ?>">
                                    </div>
                                
                                    <button type="button" onClick="approveRequest();" name="appr" value="appr" class="btn btn-dark float-right">Approve</button>
                                    <button type="button" onClick="rejectRequest();" name="rej" value="rej" class="btn btn-dark">Reject</button>

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


    // function saveRequest(){
        

    //     var category = $('input[name="category"]:checked').val();

    //         if(typeof(category) == "undefined") {
    //             category = null;
    //         }

    //         var position = $("#position").val();
    //         var department =  $("#department").val();
    //         var user_id =  $("#user_id").val();
    //         var pfno = $("#pfno").val();
    //         var email =  $("#email").val();
    //         var mobile =  $("#mobile").val();
    //         var exten = $("#exten").val();
    //         var request_date =  $("#request_date").val();
    //         var access_type =  $("#access_type").val();
    //         var server_ip =  $("#server_ip").val();
    //         var category =  category;
    //         var efrmdate =  $("#efrmdate").val();
    //         var exdate =  $("#exdate").val();
    //         var purpose =  $("#purpose").val();

       
    //     // $('#dropDownId :selected').text();
    //     // $('input[name="name_of_your_radiobutton"]:checked').val();

    //     $.post("<?php echo base_url();?>"+"/requests/save_internet",
    //     {
    //     position : position,
    //     department : department, 
    //     user_id : user_id,  
    //     pfno : pfno, 
    //     email: email,  
    //     mobile : mobile, 
    //     exten : exten,  
    //     request_date : request_date, 
    //     access_type : access_type, 
    //     server_ip : server_ip, 
    //     category : category, 
    //     efrmdate : efrmdate, 
    //     exdate : exdate,  
    //     purpose : purpose,  
    //     },
    //     function(response) {
    //             //alert($('#explanation').val());
    //             clearSaveRequestErrors();

    //             if (response.status == 200) {

    //                 swal("Success!", "Internet Request Added for Approval !", "success").then((value) => {
    //                     if (value) {
    //                         location.reload();
    //                     }
    //                     });

    //             } else if (response.status == 400) {
    //                 // validation error response
    //                 // if ($('#position').val() === "") {
    //                 //     $("#error_desig").html("Please select a position.").removeClass('d-none');
    //                 // }
    //                 if(typeof(response.data.errors.position) != "undefined" && response.data.errors.position !== null) {
    //                     $("#error_desig").html(response.data.errors.position).removeClass('d-none');
    //                 }
    //                 if(typeof(response.data.errors.email) != "undefined" && response.data.errors.email !== null) {
    //                     $("#error_email").html(response.data.errors.email).removeClass('d-none');
    //                 }
    //                 if(typeof(response.data.errors.pfno) != "undefined" && response.data.errors.pfno !== null) {
    //                     $("#error_pfno").html(response.data.errors.pfno).removeClass('d-none');
    //                 }
    //                 if(typeof(response.data.errors.mobile) != "undefined" && response.data.errors.mobile !== null) {
    //                     $("#error_mobile").html(response.data.errors.mobile).removeClass('d-none');
    //                 }
    //                 if(typeof(response.data.errors.exten) != "undefined" && response.data.errors.exten !== null) {
    //                     $("#error_exten").html(response.data.errors.exten).removeClass('d-none');
    //                 }
    //                 if(typeof(response.data.errors.department) != "undefined" && response.data.errors.department !== null) {
    //                     $("#error_department").html(response.data.errors.department).removeClass('d-none');
    //                 }
    //                 // if(typeof(response.data.errors.desig) != "undefined" && response.data.errors.desig !== null) {
    //                 //     $("#error_desig").html(response.data.errors.desig).removeClass('d-none');
    //                 // }
    //                 if(typeof(response.data.errors.category) != "undefined" && response.data.errors.category !== null) {
    //                     $("#error_catogary").html(response.data.errors.category).removeClass('d-none');
    //                 }
    //                 if(typeof(response.data.errors.server_ip) != "undefined" && response.data.errors.server_ip !== null) {
    //                     $("#error_server_ip").html(response.data.errors.server_ip).removeClass('d-none');
    //                 }
    //                 if(typeof(response.data.errors.request_date) != "undefined" && response.data.errors.request_date !== null) {
    //                     $("#error_req_date").html(response.data.errors.request_date).removeClass('d-none');
    //                 }
    //                 if(typeof(response.data.errors.efrmdate) != "undefined" && response.data.errors.efrmdate !== null) {
    //                     $("#error_eff_date").html(response.data.errors.efrmdate).removeClass('d-none');
    //                 }
    //                 if(typeof(response.data.errors.exdate) != "undefined" && response.data.errors.exdate !== null) {
    //                     $("#error_exp_date").html(response.data.errors.exdate).removeClass('d-none');
    //                 }
                   


    //             } else {
    //                 // other error response
    //                 swal("Error", "Error Adding Internet Request", "error");  
    //                 location.reload();
    //             }
                
    //         });
    //     }
    
    // function clearSaveRequestErrors() {
    //         $("#error_email").html("").addClass('d-none');
    //         $("#error_pfno").html("").addClass('d-none');
    //         $("#error_mobile").html("").addClass('d-none');
    //         $("#error_exten").html("").addClass('d-none');
    //         $("#error_department").html("").addClass('d-none'); 
    //         $("#error_server_ip").html("").addClass('d-none');
    //         $("#error_desig").html("").addClass('d-none');
    //         $("#error_catogary").html("").addClass('d-none');
    //         $("#error_req_date").html("").addClass('d-none');
    //         $("#error_eff_date").html("").addClass('d-none');
    //         $("#error_exp_date").html("").addClass('d-none');
            
    //     }

    function approveRequest() {
       

       $.post("<?php echo base_url();?>"+"/intrequests/authenticate",
       {
           id: $('#aprroval_id').val(),
           comment: $('textarea#sec_comment').val(),
           approvedby: $('#authManager :selected').val(),
           type: 'approved'
       },
       function(response) {

           if (response.status == 200) {
               // success response
               swal("Success!", "Firewall Request Approved !", "success").then((value) => {
                       if (value) {
                           location.reload();
                       }
                       });

           } else if (response.status == 400) {
               swal("Something Went Wrong !", "Request Not Approved !", "error").then((value) => {
                           if (value) {
                               location.reload();
                           }
                           });
           } else {
               // other error response
               alert(response.data.message); 
               location.reload();
           }
   
       });
    }

        function rejectRequest() {
      

      $.post("<?php echo base_url();?>"+"/intrequests/authenticate",
      {
            id: $('#aprroval_id').val(),
            comment: $('textarea#sec_comment').val(),
            approvedby: $('#authManager :selected').val(),
            type: 'rejected'
      },
      function(response) {

          if (response.status == 200) {
              // success response
              swal("Rejected !", "Firewall Request Rejected !", "success").then((value) => {
                      if (value) {
                          location.reload();
                      }
                      });

          } else if (response.status == 400) {
              swal("Something Went Wrong !", "Request Not Approved !", "error").then((value) => {
                          if (value) {
                              location.reload();
                          }
                          });
          } else {
              // other error response
              alert(response.data.message); 
              location.reload();
          }
  
      });
    }



        </script>

<?= $this->endSection() ?>





    


 

