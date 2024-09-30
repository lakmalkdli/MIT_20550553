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
                                                    <label>Department</label>
                                                    <select id="inputState" class="form-control">
                                                        <option selected="selected">Choose...</option>
                                                        <?php foreach($departments as $department) { ?>
                                                            <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label>Position</label>
                                                    <select id="position" class="form-control" onChange="loadrequester();">
                                                        <option selected="selected">Select Grade...</option>
                                                        <?php foreach($rolelists as $rolelist) { ?>
                                                            <option value="<?php echo $rolelist->roleid; ?>"><?php echo $rolelist->rolename; ?></option>
                                                        <?php } ?>
                                                    </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label>Requester</label>
                                                    <select name="name" id="userSelect" class="form-control" disabled>

                                                    </select>
                                            </div>    
                                    </div>
                                    <div class="form-row">
                                                <div class="form-group col-md-4">
                                                <label>PF No</label>
                                                <input type="text" class="form-control" name="pfno">
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label>Mobile No</label>
                                                <input type="text" class="form-control" name="mobile">
                                                </div> 
                                                <div class="form-group col-md-4">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                                </div>
                                    </div>
                                            
                                    <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Ext</label>
                                                <input type="text" class="form-control" name="exten">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="m-t-20">Date</label>
                                                <input type="text" class="form-control" placeholder="2017-06-06" name="request_date" id="req_date">
                                            </div>   
                                    </div>
                                </div>
 
                                <br>
                              
                                <h4 class="card-title">Information about the PC</h4>
                                                            
                                    <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="m-t-20">IP Address</label>
                                        <input type="text" class="form-control" placeholder="" id="svrip" name="server_ip">
                                    </div>     
                                    <div class="form-group col-md-4">
                                    <label>Access Type</label>
                                                    <select id="inputState" class="form-control">
                                                    <option value="value1">Normal Internet</option>
                                                    <option value="value2">With Proxy</option>
                                                    <option value="value3">Without Proxy</option>
                                                    </select>
                                    </div>                                    
                                    <div class="form-group col-md-4">
                                            <label>Category </label>
                                            <table  style="width:100%; margin-left:25px">
                                                <tr>
                                                    <td>
                                                        <input class="form-check-input" type="radio" id="cat" name="category" value="per">
                                                        <label class="form-check-label">Permanent</label> 
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" id="cat" name="category" value="Temp">
                                                        <label class="form-check-label">Temp</label>
                                                    </td>
                                                    
                                                </tr>
                                            </table>
                                               
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="m-t-20">Effective From</label>
                                        <input type="text" class="form-control" placeholder="2017-06-03" id="efrmdate" name="effec_date">
                                    </div> 

                                    <div class="form-group col-md-4">
                                        <label class="m-t-20">Expiration Date</label>
                                        <input type="text" class="form-control" placeholder="2017-06-03" id="exdate" name="expire_date">
                                    </div>
                                    </div> 
                                   <div class="form-row">     
                                            <div class="form-group col-md-12">
                                            <label>Purpose</label>
                                            <div class="form-group">                                            
                                                <textarea class="form-control h-150px w-100" id="purpose" name="explanation"></textarea>
                                            </div>       

                                    </div> 

                                </div>

                                <h4 class="card-title">Information about the Manager</h4>
                                        <div class="form-row">   
                                            <div class="form-group col-md-12">
                                                    <label>Approved By</label>
                                                    <select id="approvedManager" class="form-control">
                                                        <option selected="selected">Select Division Chief Manager...</option>
                                                        <?php foreach($departments as $department) { ?>
                                                            <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                            </div>  
                                        </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-dark float-right">Request</button>
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

        </script>

<?= $this->endSection() ?>





    


 

