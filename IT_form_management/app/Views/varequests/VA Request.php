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
                            <form action="<?php echo base_url('/requests/save');?>" method="post" accept-charset="utf-8">
                                <h4 class="card-title">Requestor's Information</h4>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                                <label>PF No</label>
                                                <input type="text" class="form-control" name="pfno">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Name</label>
                                                    <input type="name" class="form-control" placeholder="Name" name="name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                                </div>
                                    </div>
                                            
                                    <div class="form-row">
                                    <div class="form-group col-md-4">
                                                <label>Mobile No</label>
                                                <input type="text" class="form-control" name="mobile">
                                            </div> 
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
                                                    <select id="inputState" class="form-control">
                                                        <option selected="selected">Select Grade...</option>
                                                        <?php foreach($departments as $department) { ?>
                                                            <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label>Requester</label>
                                                    <select id="inputState" class="form-control">
                                                        <option selected="selected">Choose...</option>
                                                        <?php foreach($departments as $department) { ?>
                                                            <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                            </div>    
                                            <div class="form-group col-md-4">
                                                    <label>Approved By</label>
                                                    <select id="inputState" class="form-control">
                                                        <option selected="selected">Select Division Chief Manager...</option>
                                                        <?php foreach($departments as $department) { ?>
                                                            <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                            </div>
                                    </div>  
                                <br>
                              
                                <h4 class="card-title">Information about the access request</h4>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label>Type of Change  </label>
                                                    <table style="width:100%; margin-left:25px">
                                                        <tr>
                                                            <td>
                                                            <input class="form-check-input" type="radio" id="cht" name="changetype" value="add">
                                                        <label class="form-check-label">Add</label>  
                                                            </td>
                                                            <td>
                                                            <input class="form-check-input" type="radio" id="cht" name="changetype" value="modi">
                                                        <label class="form-check-label">Modify</label> 
                                                                </td>
                                                                <td>
                                                                <input class="form-check-input" type="radio" id="cht" name="changetype" value="rmv">
                                                    <label class="form-check-label">Remove</label> 
                                                                </td>
                                                        </tr>
                                                    </table>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Category </label>
                                            <table  style="width:100%; margin-left:25px">
                                                <tr>
                                                    <td>
                                                        <input class="form-check-input" type="radio" id="cat" name="category" value="per">
                                                        <label class="form-check-label">Permanent</label> 
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" id="cat" name="category" value="Temp">
                                                        <label class="form-check-label">Test/Temp</label>
                                                    </td>
                                                    
                                                </tr>
                                            </table>
                                               
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="m-t-20">Expiration Date</label>
                                        <input type="text" class="form-control" placeholder="2017-06-03" id="exdate" name="expire_date">
                                    </div>
                                    
                                    <div class="form-group col-md-3">
                                        <label class="m-t-20">Effective From</label>
                                        <input type="text" class="form-control" placeholder="2017-06-03" id="efrmdate" name="effec_date">
                                    </div> 
                                                        </div> 
                                   <div class="form-row">     
                                        <div class="form-group col-md-12">
                                            <label>Explanation of Change Application</label>
                                            <div class="form-group">                                            
                                                <textarea class="form-control h-150px w-100" id="comment" name="explanation"></textarea>
                                            </div>
                                    </div> 
                                </div>

                                <h4 class="card-title">Detailed Firewall Request Information</h4>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Source Address/Subnet Mask</label>
                                        <div class="form-group">                                            
                                            <textarea class="form-control h-150px" rows="4" id="src_address" name="source"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Destination Address/Subnet Mask</label>
                                        <div class="form-group">                                            
                                            <textarea class="form-control h-150px" rows="4" id="dest_ip" name="destination"></textarea>
                                        </div>
                                    </div>                               
                                    <div class="form-group col-md-3">
                                        <label>Protocols</label>
                                        <div class="form-group">                                            
                                                <textarea class="form-control h-150px" rows="4" id="protocols" name="protocol"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Ports</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px" rows="4" id="port" name="ports"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="form-row">

                                            <div class="form-group col-md-4">
                                                <label>Direction </label>
                                                <table  style="width:100%; margin-left:25px">
                                                <tr>
                                                    <td>
                                                        <input class="form-check-input" type="radio" id="dir" name="direction" value="bi-dir">
                                                        <label class="form-check-label">Bi-Direction</label> 
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" id="dir" name="direction" value="uni-dir">
                                                        <label class="form-check-label">Uni-Direction</label>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>  

                                            <div class="form-group col-md-4">
                                                <label>Action </label>
                                                <table  style="width:100%; margin-left:25px">
                                                <tr>
                                                    <td>
                                                    <input class="form-check-input" type="radio" id="act" name="action" value="permit">
                                                            <label class="form-check-label">Permit</label>    
                                                    </td>
                                                    <td>
                                                    <input class="form-check-input" type="radio" id="act" name="action" value="deny">
                                                            <label class="form-check-label">Deny</label>
                                                    </td>
                                                </tr>
                                            </table>


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

      

<?= $this->endSection() ?>



    


 

