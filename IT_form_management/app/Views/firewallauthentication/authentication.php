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
                            <form action="<?php echo base_url('/requests/approval/'.$datasearch_by_Id['req_id']);?>" method="post" accept-charset="utf-8">
                                <h4 class="card-title">Requested Firewall Information</h4>

                                    <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Name</label>
                                                    <input type="name" class="form-control" placeholder="Name" name="name" value="<?= $datasearch_by_Id['staffmember']; ?>" disabled>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" placeholder="Email" value="<?= $datasearch_by_Id['email']; ?>" disabled>
                                                </div>
                                    </div>
                                            
                                    <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Mobile No</label>
                                                <input type="text" class="form-control" value="<?= $datasearch_by_Id['mobile']; ?>" disabled>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Ext</label>
                                                <input type="text" class="form-control" value="<?= $datasearch_by_Id['extention']; ?>" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="m-t-20">Date</label>
                                                <input type="text" class="form-control" placeholder="2017-06-06" id="req_mdate" value="<?= $datasearch_by_Id['date']; ?>" disabled>
                                            </div>                                            
                                            <div class="form-group col-md-2">
                                                <label>PF No</label>
                                                <input type="text" class="form-control" value="<?= $datasearch_by_Id['pfno']; ?>" disabled>
                                            </div>
                                    </div>
                                     
                                </div>

                                    <div class="form-row">
                                            <div class="form-group col-md-4">
                                                    <label>Department</label>
                                                    <input type="text" class="form-control" value="<?= $datasearch_by_Innerejoin[0]['name']; ?>" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label>Position</label>
                                                    <input type="text" class="form-control" value="<?= $datasearch_by_Innerejoin[0]['desig_name']; ?>" disabled>
                                            </div>                                           
                                     
                                    </div>                                           
                            

                                <br>
                              
                                <h4 class="card-title">Information about the access request</h4>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Type of Change  </label>
                                                <div class="form-group row-md-4">
                                                    <div class="form-check">                                                
                                                        <input class="form-check-input" type="radio" id="add" name="type"  value="Add" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['typeofchange'] == "Add" ? "checked" : "") ?> disabled>                                                        
                                                        <label class="form-check-label">Add</label>                                                
                                                    </div>
                                                </div>
                                                <div class="form-group row-md-4">
                                                    <div class="form-check">                                                
                                                        <input class="form-check-input" type="radio" id="modify" name="type"  value="Modify" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['typeofchange'] == "Modify" ? "checked" : "") ?> disabled>
                                                        <label class="form-check-label">Modify</label>                                                
                                                    </div>
                                                </div>
                                                <div class="form-check">                                                
                                                <input class="form-check-input" type="radio" id="remove" name="type"  value="Remove" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['typeofchange'] == "Remove" ? "checked" : "") ?> disabled>
                                                    <label class="form-check-label">Remove</label>                                                
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Category </label>
                                                <div class="form-group row-md-4">
                                                    <div class="form-check">                                                
                                                    <input class="form-check-input" type="radio" id="permanent" name="category"  value="Permanent" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['category'] == "Permanent" ? "checked" : "") ?> disabled>
                                                        <label class="form-check-label">Permanent</label>                                                
                                                    </div>
                                                </div>
                                                <div class="form-group row-md-4">
                                                    <div class="form-check">                                                
                                                    <input class="form-check-input" type="radio" id="test" name="category"  value="Test" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['category'] == "Test/Temp" ? "checked" : "") ?> disabled>
                                                        <label class="form-check-label">Test/Temp</label>                                                
                                                    </div>
                                                </div>
                                        </div>                                        
                                                <div class="form-group col-md-4">
                                                    <label class="m-t-20">Expiration Date</label>
                                                    <input type="text" class="form-control" id="exdate" value="<?= $datasearch_by_Id['expiredate']; ?>" disabled>
                                                </div> 
                                       

                                    </div>

                                    <div class="form-row">
                                        
                                            <div class="form-group col-md-4">
                                                    <label class="m-t-20">Effective From</label>
                                                    <input type="text" class="form-control" id="efrmdate" value="<?= $datasearch_by_Id['effectdate']; ?>" disabled>
                                            </div>                                             
                                              
                                        
                                            <div class="form-group col-md-8">
                                                <label>Explanation of Change Application</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px" rows="4" id="comment" disabled><?php echo $datasearch_by_Id["explanation"] ?></textarea>
                                            </div>
                                    </div>                                        
                                                
                                       

                                </div>


                                    <h4 class="card-title">Detailed Firewall Request Information</h4>
                                    <div class="form-row">

                                            <div class="form-group col-md-3">
                                                <label>Source Address/Subnet Mask</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px" rows="4" id="source" disabled><?php echo $datasearch_by_Id["source"] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Destination Address/Subnet Mask</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px" rows="4" id="desti" disabled><?php echo $datasearch_by_Id["destination"] ?></textarea>
                                                </div>
                                            </div>                                
                                            <div class="form-group col-md-3">
                                                <label>Protocols</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px" rows="4" id="protocol" disabled><?php echo $datasearch_by_Id["protocol"] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Ports</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px" rows="4" id="port" disabled><?php echo $datasearch_by_Id["ports"] ?></textarea>
                                                </div>
                                            </div>
                                       

                                    </div>

                                    <div class="form-row">

                                            <div class="form-group col-md-4">
                                                <label>Direction </label>
                                                    <div class="form-group row-md-4">
                                                        <div class="form-check">                                                
                                                            <input class="form-check-input" type="radio" id="dir" name="direction" value="bi-dir" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['direction'] == "bi-dir" ? "checked" : "") ?> disabled>
                                                            <label class="form-check-label">Bi-Direction</label>                                                
                                                        </div>
                                                    </div>
                                                    <div class="form-group row-md-4">
                                                        <div class="form-check">                                                
                                                            <input class="form-check-input" type="radio" id="dir" name="direction" value="uni-dir" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['direction'] == "uni-dir" ? "checked" : "") ?> disabled>
                                                            <label class="form-check-label">Uni-Direction</label>                                                
                                                        </div>
                                                    </div>
                                            </div>  

                                            <div class="form-group col-md-4">
                                                <label>Action </label>
                                                    <div class="form-group row-md-4">
                                                        <div class="form-check">                                                
                                                            <input class="form-check-input" type="radio" id="act" name="action" value="permit" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['action'] == "permit" ? "checked" : "") ?> disabled>
                                                            <label class="form-check-label">Permit</label>                                                
                                                        </div>
                                                    </div>
                                                    <div class="form-group row-md-4">
                                                        <div class="form-check">                                                
                                                            <input class="form-check-input" type="radio" id="act" name="action" value="deny" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['action'] == "deny" ? "checked" : "") ?> disabled>
                                                            <label class="form-check-label">Deny</label>                                                
                                                        </div>
                                                    </div>
                                            </div>                                                                                                                  
                                       
                                    </div>
                                    <div></div>
                                    <h4 class="card-title">Manager Approval Information</h4>
                                    <div class="form-row">     
                                                <div class="form-group col-md-12">
                                                <label>Comment</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px w-100" id="man_comment" name="man_comment" disabled><?php echo $datasearch_by_Id["managercommnt"] ?></textarea>
                                                </div>
                                                </div> 
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                                        <label>Approved By</label>
                                                        <select id="approvedManager" class="form-control" disabled>
                                                            <?php foreach($unitmanager as $umanager) { ?>
                                                            <option value="<?php echo $umanager->u_id; ?>" <?php echo ($datasearch_by_Id['mng_apr'] == $umanager->u_id) ? 'selected' : ''; ?>><?php echo $umanager->u_fname; ?></option>
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
                                        <input id="aprroval_id" type="hidden" value="<?php echo $datasearch_by_Id['req_id']; ?>">                                       
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


    <!-- Clock Plugin JavaScript -->
    <script src="<?php echo base_url('/plugins/clockpicker/dist/jquery-clockpicker.min.js'); ?>"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asColor.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js'); ?>"></script>



  

    <!-- Lakmal for check end -->

    <script type="text/javascript">



    function loadmanagers() {
        // alert('viewscript');

        // var position = $("#position").val();
        // alert(position);

        $.post("<?php echo base_url();?>"+"/requests/getusers",
        {
            // id: position,
        },
        function(response){

            if (response.status == 200) {
                $data = json_decode(response.data, true);
                // alert('200');                        
                var managerlists = response.data.managerlists;
                var select = document.getElementById('option');

            } if (response.status == 100 && response.data && response.data.userlists){  
                
                var managerlists = response.data.managerlists;
                var select = document.getElementById('approvedManager');

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

        document.getElementById("approvedManager").disabled=false;



    }
    

    function approveRequest() {
       

        $.post("<?php echo base_url();?>"+"/requests/authenticate",
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
       

       $.post("<?php echo base_url();?>"+"/requests/authenticate",
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



    


 

