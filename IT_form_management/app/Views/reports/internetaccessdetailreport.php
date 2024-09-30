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
                        
                        <h5 class="card-title">Firewall Acess Detail Report</h5>
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
                                        <th>Network St</th>
                                        <th>Effective Date</th> 
                                        <th>Expire Date</th>
                                        <th>IP Address</th>
                                        <th>Access Type</th>
                                        <th>Reason</th>                 
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php foreach ($internetreqdata as $request): ?>	
                                    <tr>                                                                   
                                        <td><?php echo $request->u_fname; ?></td>
                                        <td><?php echo $request->pfno; ?></td>
                                        <td><?php echo $request->extention; ?></td>
                                        <td><?php echo $request->req_date; ?></td>
                                        <td><?php echo $request->email; ?></td>
                                        <td>
                                        <?php
                                            if ($request-> mstatus == 0) {
                                                echo '<span class="flag-style-yellow">Pending </span>';
                                            }else if ($request-> mstatus == 2) {
                                                echo '<span class="flag-style-red">Rejected </span>';
                                            }else if ($request-> mstatus == 1) {
                                                echo '<span class="flag-style-green">Approved </span>';
                                            }
                                        ?>   
                                        </td>
                                        <td>
                                        <?php
                                            if ($request-> itsecstatus == 0) {
                                                echo '<span class="flag-style-yellow">Pending </span>';
                                            }else if ($request-> itsecstatus == 2) {
                                                echo '<span class="flag-style-red">Rejected </span>';
                                            }else if ($request-> itsecstatus == 1) {
                                                echo '<span class="flag-style-green">Approved </span>';
                                            }
                                        ?>   
                                        </td>
                                        <td>
                                        <?php
                                            if ($request-> isnetworkdeployed == 0) {
                                                echo '<span class="flag-style-yellow">Pending </span>';
                                            }else if ($request-> isnetworkdeployed == 2) {
                                                echo '<span class="flag-style-red">Rejected </span>';
                                            }else if ($request-> isnetworkdeployed == 1) {
                                                echo '<span class="flag-style-green">Approved </span>';
                                            }
                                        ?>   
                                        </td>
                                        <td><?php echo $request->effective_from; ?></td>
                                        <td><?php echo $request->expire_on; ?></td>
                                        <td><?php echo $request->ip_address; ?></td>
                                        <td class="text-center">
                                            <?php 
                                                if ($request-> access_type == 'internet') {
                                                    echo '<span class="flag-style-green">Limited </span>';
                                                } elseif ($request-> access_type == 'w_proxy') {
                                                    echo '<span class="flag-style-yellow">Proxy </span>';
                                                } elseif ($request-> access_type == 'f_internet') {
                                                    echo '<span class="flag-style-red">Full</span>';
                                                } 
                                            ?>
                                        </td>
                                        <td><?php echo $request->purpose; ?></td>
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
                url: "<?php echo site_url('frepo/intaccessdreport/search'); ?>",
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
                            { data: 'req_date', title: "Req Date" },
                            { data: 'email', title: "Email" },
                            { data: 'mstatus', title: "Manager St" ,
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
                            { data: 'itsecstatus', title: "IT Security St" ,
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
                            { data: 'isnetworkdeployed', title: "Network St" ,
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
                            { data: 'effective_from', title: "Effective Date" },
                            { data: 'expire_on', title: "Expire Date" },
                            { data: 'ip_address', title: "IP Address" },
                            { data: 'access_type', title: "Access Type" ,
                                render: function(data, type, row) {
                                    if (data == 'internet') {
                                        return '<span class="flag-style-green">Limited </span>';
                                    } else if (data == 'w_proxy') {
                                        return '<span class="flag-style-yellow">Proxy </span>';
                                    } else if (data == 'f_internet') {
                                        return '<span class="flag-style-red">Full</span>';
                                    } else {
                                        return ''; // Return empty string for other cases
                                    }
                                }
                            },
                            { data: 'purpose', title: "Reason" },
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
