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
                            <form  method="post" accept-charset="utf-8">
                                <h4 class="card-title">Requestor's Information</h4>
                                    <div class="form-row">

                                    
                                            <div class="form-group col-md-4">
                                                    <label>Department</label>
                                                    <select id="department" class="form-control" disabled>
                                                        <option value="" disabled selected>Select your unit...</option>
                                                        <?php foreach($departments as $department) { ?>
                                                            <option value="<?php echo $department->id; ?>" <?php echo ($datasearch_by_Id[0]->department == $department->id) ? 'selected' : ''; ?>><?php echo $department->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label>Position</label>
                                                    <select id="position" class="form-control" onChange="loadrequester();" disabled>
                                                        <option selected="selected">Select Grade...</option>
                                                        <?php foreach($rolelists as $rolelist) { ?>
                                                            <option value="<?php echo $rolelist->roleid; ?>" <?php echo ($datasearch_by_Id[0]->position == $rolelist->roleid) ? 'selected' : ''; ?>><?php echo $rolelist->rolename; ?></option>
                                                        <?php } ?>
                                                    </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label>Requester<span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="req_name" id="user_id" value="<?= isset($datasearch_by_Id[0]->u_fname) ? $datasearch_by_Id[0]->u_fname : ''; ?>" disabled>
                                            </div>    
                                            <div class="form-group col-md-4">
                                                <label>PF No</label>
                                                <input type="text" class="form-control" name="pfno" id="pfno" value="<?= isset($datasearch_by_Id[0]->pfno) ? $datasearch_by_Id[0]->pfno : ''; ?>" disabled>
                                            </div> 
                                            <div class="form-group col-md-4">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?= isset($datasearch_by_Id[0]->email) ? $datasearch_by_Id[0]->email : ''; ?>" disabled>
                                             </div>
                                             <div class="form-group col-md-4">
                                                    <label>Mobile No</label>
                                                    <input type="text" class="form-control" name="mobile" id="mobile" value="<?= isset($datasearch_by_Id[0]->mobile) ? $datasearch_by_Id[0]->mobile : ''; ?>" disabled>
                                             </div>
                                            
                                    </div>

                                            
                                    <div class="form-row">
 
                                                <div class="form-group col-md-4">
                                                    <label>Ext</label>
                                                    <input type="text" class="form-control" name="exten" id="exten" value="<?= isset($datasearch_by_Id[0]->extention) ? $datasearch_by_Id[0]->extention : ''; ?>" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="m-t-20">Date</label>
                                                    <input type="text" class="form-control" placeholder="" name="request_date" id="request_date" value="<?= isset($datasearch_by_Id[0]->date) ? $datasearch_by_Id[0]->date : ''; ?>" disabled>
                                                </div> 
                                                 
                                    </div>
                                </div>

  
                                <br>
                              
                                <h4 class="card-title">Information about the Server</h4>
                                                            
                                    <div class="form-row">
                                        
                                        <div class="form-group col-md-4">
                                            <label>Server Os</label>

                                               <input type="text" class="form-control" placeholder="" name="serveros" id="serveros" value="<?= isset($datasearch_by_Id[0]->server_os) ? $datasearch_by_Id[0]->server_os : ''; ?>" disabled>

                                        </div>                                    
                                        <div class="form-group col-md-4">
                                            <label class="m-t-20">Server IP</label>
                                            <input type="text" class="form-control" placeholder="" id="server_ip" name="server_ip" value="<?= isset($datasearch_by_Id[0]->server_ip) ? $datasearch_by_Id[0]->server_ip : ''; ?>" disabled>
                                        </div> 
                                        <div class="form-group col-md-4">
                                            <label>Server Criticality</label>
                                            <input type="text" class="form-control" placeholder="" id="criticality" name="criticality" value="<?= isset($datasearch_by_Id[0]->criticality) ? ($datasearch_by_Id[0]->criticality == 'value1' ? 'HIGH' : 
                                                    ($datasearch_by_Id[0]->criticality == 'value2' ? 'MEDIUM' : 
                                                        ($datasearch_by_Id[0]->criticality == 'value3' ? 'LOW' : $datasearch_by_Id[0]->criticality))) : ''; ?>" disabled>
                                        </div>
                                    </div> 


                                   <div class="form-row">     
                                        <div class="form-group col-md-12">
                                            <label>Comment</label>
                                            <div class="form-group">                                            
                                                <textarea class="form-control h-150px w-100" id="explanation" name="explanation" disabled><?php echo $datasearch_by_Id[0]->explanation ?></textarea>
                                            </div>
                                        </div> 
                                    </div>
                                    <h4 class="card-title">Manager Approval Information</h4>
                                <div class="form-row">     
                                                <div class="form-group col-md-12">
                                                <label>Comment</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px w-100" id="man_comment" name="man_comment"></textarea>
                                                </div>
                                                </div> 
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                                        <label>Approved By</label>
                                                        <select id="approvedManager" class="form-control">                                                            
                                                            <?php foreach($unitmanager as $umanager) { ?>
                                                            <option value="<?php echo $umanager->u_id; ?>" <?php echo ($unitmanager[0]->u_id == $umanager->u_id) ? 'selected' : ''; ?>><?php echo $umanager->u_fname; ?></option>
                                                            <?php } ?>       
                                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <input id="aprroval_id" type="hidden" value="<?php echo $datasearch_by_Id[0]->req_id; ?>">
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

        function approveRequest() {
       

       $.post("<?php echo base_url();?>"+"/varequests/approval",
       {
           id: $('#aprroval_id').val(),
           comment: $('textarea#man_comment').val(),
           approvedby: $('#approvedManager :selected').val(),
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
      

      $.post("<?php echo base_url();?>"+"/varequests/approval",
      {
          id: $('#aprroval_id').val(),
          comment: $('textarea#man_comment').val(),
          approvedby: $('#approvedManager :selected').val(),
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





    


 

