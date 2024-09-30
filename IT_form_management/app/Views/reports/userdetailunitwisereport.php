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

                            <h5 class="card-title">Unit Wise User Report</h5>
                            <br>

                            <form action="<?php echo base_url('/requests/save'); ?>" method="post" accept-charset="utf-8">

                                <div class="row">
                                    <div class="col-md-4">
                                        <label>From</label>
                                        <input class="form-control" type="text" id="fromdate" name="fromdate">
                                    </div>
                                    <div class="col-md-4">
                                        <label>To</label>
                                        <input class="form-control" type="text" id="todate" name="todate">
                                    </div>
                                    <div class="col-md-4">
                                        <label>To</label>
                                        <select class="form-control" type="text" id="todate" name="todate"></select>
                                    </div>
                                    <div class="col-md-1">
                                        <input class="btn btn-primaty" type="button" id="searchbydate" value="Search">
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table id="myTable" class="display table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Unit</th>
                                            <th>Name</th>
                                            <th>PF No</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Extention</th>
                                            <th>Position</th>
                                            <th>Reg Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($userdata as $request) : ?>
                                            <tr>
                                                <td><?php echo $request->u_depid; ?></td>
                                                <td><?php echo $request->u_lname; ?></td>
                                                <td><?php echo $request->u_pfno; ?></td>
                                                <td><?php echo $request->u_email; ?></td>
                                                <td><?php echo $request->u_mobile; ?></td>
                                                <td><?php echo $request->u_extention; ?></td>
                                                <td><?php echo $request->u_roleid; ?></td>
                                                <td><?php echo $request->u_regdate; ?></td>
                                                <td><?php echo $request->u_status; ?></td>
                                            </tr>
                                        <?php endforeach ?>

                                    </tbody>
                                </table>
                            </div>
                            <br />


                        </div>

                        <!-- Card -->
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


<?= $this->endSection() ?>