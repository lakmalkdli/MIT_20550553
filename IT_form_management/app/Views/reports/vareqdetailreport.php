<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>


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
                        
                        <h5 class="card-title">VA Request Detail Report</h5>
                        <br>

                        <form action="<?php echo base_url('/requests/save');?>" method="post" accept-charset="utf-8">                           
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="m-t-20">Date</label>
                                    <input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="from_date" id="frdate">
                                </div>  
                                <div class="form-group col-md-4">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Department</label>
                                    <select id="department" class="form-control">
                                        <option value="" disabled selected>Select your option</option>
                                        <?php foreach($departments as $department) { ?>
                                            <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                                        <?php } ?>    
                                    </select>  
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="m-t-20">Date</label>
                                    <input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="to_date" id="todate">
                                </div>       
                                <div class="form-group col-md-4">                                                
                                </div>
                                <div class="general-button">
                                <button id="tblsearchbtn" type="button" class="btn mb-1 btn-secondary">Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table id="repTable" class="display table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>PF Number</th>
                                        <th>Ex No</th>
                                        <th>Date</th>
                                        <th>Email</th>
                                        <th>Manager St</th>
                                        <th>IT Security St</th>
                                        <th>VA St</th>
                                        <th>Date</th> 
                                        <th>Server OS</th>
                                        <th>Server IP</th>
                                        <th>Department</th>
                                        <th>Explanation</th>  
            
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php foreach ($vareqdata as $request): ?>	
                                    <tr>                                                                   
                                        <td><?php echo $request->u_fname; ?></td>
                                        <td><?php echo $request->pfno; ?></td>
                                        <td><?php echo $request->extention; ?></td>
                                        <td><?php echo $request->date; ?></td>
                                        <td><?php echo $request->email; ?></td>
                                        <td>
                                        <?php
                                            if ($request-> mng_apr == 0) {
                                                echo '<span class="flag-style-yellow">Pending </span>';
                                            }else if ($request-> mng_apr == 2) {
                                                echo '<span class="flag-style-red">Rejected </span>';
                                            }else if ($request-> mng_apr == 1) {
                                                echo '<span class="flag-style-green">Approved </span>';
                                            }
                                        ?>   
                                        </td>
                                        <td>
                                        <?php
                                            if ($request-> sec_apr == 0) {
                                                echo '<span class="flag-style-yellow">Pending </span>';
                                            }else if ($request-> sec_apr == 2) {
                                                echo '<span class="flag-style-red">Rejected </span>';
                                            }else if ($request-> sec_apr == 1) {
                                                echo '<span class="flag-style-green">Approved </span>';
                                            }
                                        ?>   
                                        </td>
                                        <td>
                                        <?php
                                            if ($request-> is_execute == 0) {
                                                echo '<span class="flag-style-yellow">Pending </span>';
                                            }else if ($request-> is_execute == 2) {
                                                echo '<span class="flag-style-red">Rejected </span>';
                                            }else if ($request-> is_execute == 1) {
                                                echo '<span class="flag-style-green">Complete </span>';
                                            }
                                        ?>   
                                        </td>
                                        
                                        <td><?php echo $request->date; ?></td>
                                        <td><?php echo $request->server_os; ?></td>
                                        <td><?php echo $request->server_ip; ?></td>
                                        <td><?php echo $request->name; ?></td>
                                        <td><?php echo $request->explanation; ?></td>
                                       
                                    </tr>
                                <?php endforeach ?>

                                </tbody>                                                            
                            </table>
                        </div>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- end date -->




            </div>
        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
    </div>

    <!--**********************************
    Custom Page Scripts
    ***********************************-->
    <script src="<?php echo base_url('js/styleSwitcher.js'); ?>"></script>

    <script src="<?php echo base_url('plugins/moment/moment.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script>
    <script src="<?php echo base_url('js/plugins-init/form-pickers-init.js'); ?>"></script>  
   

    <!-- Lakmal for check start -->
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asColor.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js'); ?>"></script> 

    <script type="text/javascript">
        $(document).ready(function () {
            new DataTable('#repTable', {

                layout: {
                    topStart: {
                        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                    },
                    bottomStart: "pageLength"

                }
            });
        });

        $('#tblsearchbtn').click(function () {

            var fromdate = $("#frdate").val();
            var todate = $("#todate").val();
            var department = $("#department").val();

            $.ajax({
                url: "<?php echo site_url('frepo/varequestreport/search'); ?>",
                method: "POST",
                data: { fromdate: fromdate, todate: todate, department: department },
                async: true,
                dataType: 'json',
                success: function (data) {

                    new DataTable('#repTable', {

                        destroy: true,

                        data: data.data.firewallreqdata,
                        columns: [
                            { data: 'u_fname', title: "Name" },
                            { data: 'pfno', title: "PF Number" },
                            { data: 'extention', title: "Ex Number" },
                            { data: 'date', title: "Req Date" },
                            { data: 'email', title: "Email" },
                            { data: 'mobile', title: "Mobile" },
                            { data: 'mng_apr', title: "Manager St" ,
                                render: function(data, type, row) {
                                    if (data == 0) {
                                        return '<span class="flag-style-yellow">Pending</span>';
                                    } else if (data == 2) {
                                        return '<span class="flag-style-red">Rejected</span>';
                                    } else if (data == 1) {
                                        return '<span class="flag-style-green">Approved</span>';
                                    } else {
                                        return ''; // Return empty string for other cases
                                    }
                                }
                            },
                            { data: 'sec_apr', title: "IT Security St" ,
                                render: function(data, type, row) {
                                    if (data == 0) {
                                        return '<span class="flag-style-yellow">Pending</span>';
                                    } else if (data == 2) {
                                        return '<span class="flag-style-red">Rejected</span>';
                                    } else if (data == 1) {
                                        return '<span class="flag-style-green">Approved</span>';
                                    } else {
                                        return ''; // Return empty string for other cases
                                    }
                                }
                            },
                            { data: 'isntwrkdeployed', title: "Network St" ,
                                render: function(data, type, row) {
                                    if (data == 0) {
                                        return '<span class="flag-style-yellow">Pending</span>';
                                    } else if (data == 2) {
                                        return '<span class="flag-style-red">Rejected</span>';
                                    } else if (data == 1) {
                                        return '<span class="flag-style-green">Approved</span>';
                                    } else {
                                        return ''; // Return empty string for other cases
                                    }
                                }
                            },
                            { data: 'server_os', title: "Server OS" },
                            { data: 'server_ip', title: "Server IP" },
                            { data: 'explanation', title: "Comment" },
                            { data: 'name', title: "Department" },
                        ],
                        layout: {
                            topStart: {
                                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                            },
                            bottomStart: "pageLength"
                        }
                    });

                }
            });

        });
    </script>
                                               

<?= $this->endSection() ?>
