<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">
    <!-- Custom Stylesheet -->

    <!-- Lakmal for check strnatcasecmp -->


    <!-- Custom Stylesheet -->
    <link href="<?php echo base_url('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'); ?>" rel="stylesheet">
    

    <!-- Page plugins css -->


    <!-- Date picker plugins css -->
    <link href="<?php echo base_url('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css'); ?>" rel="stylesheet">


    <link href="<?php echo base_url('plugins/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet">

  

    <!-- lakmal for check END -->
</head>

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
                                <h4 class="card-title">Requestor's Informationn</h4>
                                    <div class="form-row">

                                    
                                            <div class="form-group col-md-4">
                                                    <label>Department</label>
                                                    <select id="department" class="form-control">
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
                                                    <select name="user_id" id="user_id" class="form-control" disabled>

                                                    </select>
                                            </div>   
                                            <div class="form-group col-md-4">
                                                <label>PF No</label>
                                                <input type="text" class="form-control" name="pfno" id="pfno" >
                                            </div> 
                                            <div class="form-group col-md-4">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                                             </div>
                                             <div class="form-group col-md-4">
                                                    <label>Mobile No</label>
                                                    <input type="text" class="form-control" name="mobile" id="mobile">
                                             </div>
                                            
                                    </div>

                                            
                                    <div class="form-row">
 
                                                <div class="form-group col-md-4">
                                                    <label>Ext</label>
                                                    <input type="text" class="form-control" name="exten" id="exten" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="m-t-20">Date</label>
                                                    <input type="text" class="form-control" placeholder="" name="request_date" id="request_date">
                                                </div> 
                                                 
                                    </div>
                                </div>

  
                                <br>
                              
                                <h4 class="card-title">Information about the Server</h4>
                                                            
                                    <div class="form-row">
                                        
                                        <div class="form-group col-md-4">
                                            <label>Server Os</label>
                                                        <select id="serveros" class="form-control" name="serveros">
                                                        <option value="Windows">Windows</option>
                                                        <option value=" Ubuntu">Ubuntu</option>
                                                        <option value="Linux">Linux</option>
                                                        <option value="Red Hat">Red Hat</option>
                                                        </select>
                                        </div>                                    
                                        <div class="form-group col-md-4">
                                            <label class="m-t-20">Server IP</label>
                                            <input type="text" class="form-control" placeholder="" id="server_ip" name="server_ip">
                                        </div> 
                                        <div class="form-group col-md-4">
                                            <label>Server Criticality</label>
                                                        <select id="criticality" name="criticality" class="form-control">
                                                        <option value="value1">High</option>
                                                        <option value="value2">Medium</option>
                                                        <option value="value3">Low</option>
                                                        </select>
                                        </div>
                                    </div> 


                                   <div class="form-row">     
                                        <div class="form-group col-md-12">
                                            <label>Comment</label>
                                            <div class="form-group">                                            
                                                <textarea class="form-control h-150px w-100" id="explanation" name="explanation"></textarea>
                                            </div>
                                        </div> 
                                    </div>

                                <h4 class="card-title">Information about the Manager</h4>
                                        <div class="form-row">   
                                            <div class="form-group col-md-12">
                                                    <label>Approved By</label>
                                                    <select id="approvedManager" name="approvedManager" class="form-control">
                                                        <option selected="selected">Select Division Chief Manager...</option>
                                                        <?php foreach($departments as $department) { ?>
                                                            <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                            </div>  
                                        </div>
                             

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

        function saveRequest() {

            var position = $("#position").val();
            var department =  $("#department").val();
            var user_id =  $("#user_id").val();
            var pfno = $("#pfno").val();
            var email =  $("#email").val();
            var mobile =  $("#mobile").val();
            var exten = $("#exten").val();
            var request_date =  $("#request_date").val();
            var serveros =  $("#serveros").val();
            var server_ip =  $("#server_ip").val();
            var criticality =  $("#criticality").val();
            var explanation =  $("#explanation").val();
            var approvedManager =  $("#approvedManager").val();

        // $('#dropDownId :selected').text();
        // $('input[name="name_of_your_radiobutton"]:checked').val();

        $.post("<?php echo base_url();?>"+"/requests/saveva",
        {
            position: position,
            department:department,
            user_id:user_id,
            pfno:pfno,
            email:email,
            mobile:mobile,
            exten:exten,
            request_date:request_date,
            serveros:serveros,
            server_ip:server_ip,
            criticality:criticality,
            explanation:explanation,
            approvedManager:approvedManager,
        },
        function(response) {

            // clearSaveRequestErrors();

            if (response.status == 200) {
                // success response
                alert(response.data.message);    
                location.reload();

            // } else if (response.status == 400) {
            //     // validation error response
            //     if(typeof(response.data.errors.email) != "undefined" && response.data.errors.email !== null) {
            //         $("#error_email").html(response.data.errors.email).removeClass('d-none');
            //     }
            } else {
                // other error response
                alert(response.data.message); 
                location.reload();
            }
            
        });
        }

        // function clearSaveRequestErrors() {
        // $("#error_email").html("").addClass('d-none');
        // }


        </script>

<?= $this->endSection() ?>





    


 

