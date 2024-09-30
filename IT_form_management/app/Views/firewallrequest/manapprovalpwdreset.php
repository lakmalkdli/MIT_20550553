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
                            <form action="<?php echo base_url('/requests/approvalpwdreset/'.$datasearch_by_Id['pwdreq_id']);?>"  method="post" accept-charset="utf-8">
                                <h4 class="card-title">Requested Password Reset Information</h4>

                                    <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Request Type</label>
                                                    <input type="name" class="form-control" placeholder="Name" name="name" value="<?php if ($datasearch_by_Id['req_type'] == "reset_pwd") {echo "Reset Password"; } else {echo "New User";} ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>User Type</label>
                                                    <input type="email" class="form-control" placeholder="Email" value="<?php if ($datasearch_by_Id['user_type'] == "stf_mem") {echo "Staff Member"; } else {echo "External User";} ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label>Reason to Reset</label>
                                                <input type="text" class="form-control" value="<?= $datasearch_by_Id['resetreason']; ?>">
                                            </div>
                                    </div>
                                    <div class="form-row">
                                            
                                    <div class="form-group col-md-12">
                                                <label>Name with Initials</label>
                                                <input type="text" class="form-control" value="<?= $datasearch_by_Id['namewithini']; ?>">
                                            </div>
                                            </div>
                                    <div class="form-row">
                                            
                                          
                                            <div class="form-group col-md-4">
                                                <label class="m-t-20">Position</label>
                                                <input type="text" class="form-control"  id="req_mdate" value="<?= $datasearch_by_Id['position']; ?>">
                                            </div>                                            
                                            <div class="form-group col-md-2">
                                                <label>PF No</label>
                                                <input type="text" class="form-control" value="<?= $datasearch_by_Id['pfno']; ?>">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Branch</label>
                                                <input type="text" class="form-control" value="<?= $datasearch_by_Id['branch']; ?>">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Branch Code</label>
                                                <input type="text" class="form-control" value="<?= $datasearch_by_Id['bcode']; ?>">
                                            </div>
                                    </div>
                                     
                                </div>

                                    <div class="form-row">
                                            <div class="form-group col-md-4">
                                                    <label>Mobile</label>
                                                    <input type="text" class="form-control" value="<?= $datasearch_by_Id['mobile']; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" value="<?= $datasearch_by_Id['email']; ?>">
                                            </div>  
                                            <div class="form-group col-md-4">
                                                    <label>Extension</label>
                                                    <input type="text" class="form-control" value="<?= $datasearch_by_Id['extention']; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label>Requested Date</label>
                                                    <input type="text" class="form-control" value="<?= $datasearch_by_Id['reqdate']; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label>NIC</label>
                                                    <input type="text" class="form-control" value="<?= $datasearch_by_Id['id_num']; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label>Contract Terminate Date</label>
                                                    <input type="text" class="form-control" value="<?= $datasearch_by_Id['d_contrct_trmnt']; ?>">
                                            </div>                                          
                                     
                                    </div>                                           
                            

                               
                                    <div></div>
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
                                                            <option selected="selected">Select Division Chief Manager...</option>
                                                            <?php foreach($managerlists as $managerlist) { ?>
                                                            <option value="<?php echo $managerlist->u_id; ?>"><?php echo $managerlist->u_fname; ?></option>
                                                            <?php } ?>       
                                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <input id="aprroval_id" type="hidden" value="<?php echo $datasearch_by_Id['pwdreq_id']; ?>">
                                    </div>
                                
                                <button type="button" onClick="approveRequest();" name="appr" value="appr" class="btn btn-dark float-right">Approve</button>
                                <button type="button" name="rej" value="rej" class="btn btn-dark">Reject</button>

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
       

        $.post("<?php echo base_url();?>"+"/requests/approvalpwdreset",
        {
            id: $('#aprroval_id').val(),
            comment: $('textarea#man_comment').val(),
            approvedby: $('#approvedManager :selected').val(),
            type: 'approved'
        },
        function(response) {

            if (response.status == 200) {
                // success response
                alert(response.data.message);    
                location.reload();

            } else if (response.status == 400) {
            
            } else {
                // other error response
                alert(response.data.message); 
                location.reload();
            }
    
        });
}

// });

</script>

      

<?= $this->endSection() ?>



    


 

