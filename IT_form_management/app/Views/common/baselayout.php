<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />

    <title>BOC - Firewall Request Management</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="<?php echo base_url('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'); ?>" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="<?php echo base_url('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('js/plugins-init/form-pickers-init.js'); ?>">
    </script>

    <!-- Chartist -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/chartist/css/chartist.min.css'); ?>">
    <link rel="stylesheet" href=<?php echo base_url("plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css"); ?>>

    <link href="<?php echo base_url('css/alertify.min.css'); ?>" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/offline/dataTables.dataTables.css'); ?>">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/offline/buttons.dataTables.css'); ?>">
    <!-- DataTables Buttons JS -->

    <!-- Custom Stylesheet -->
    <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">

    <style>
        img.logo-style {
            height: 50px;
            margin: 5px;
            margin-top: 7px;
        }

        .brand-logo {
            background-color: white;
        }

        .logo-abbr img {
            height: 45px;
            margin: 5px;
        }

        [data-nav-headerbg="color_1"] .nav-header {
            background-color: #ffffff;
        }

        .menu-icon-style {
    color: #8f310c !important;
}

.nk-sidebar .metismenu > li.active i {
    color: #3d1e11 !important;
}

.home-btn {
    font-size: 20px;
    padding: 2px 4px;
    border-radius: 4px;
}

.home-btn:hover{
    background: #f3f3f9 !important;

}
    </style>

    <script src="<?php echo base_url('js/offline/jquery-3.7.1.js'); ?>"></script>

    <script src="<?php echo base_url('js/offline/dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('js/offline/dataTables.buttons.js'); ?>"></script>
    <script src="<?php echo base_url('js/offline/buttons.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('js/offline/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/offline/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/offline/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo base_url('js/offline/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/offline/buttons.print.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/styleSwitcher.js'); ?>"></script>

    <script src="<?php echo base_url('plugins/moment/moment.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script>

    <!-- Lakmal for check start -->
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asColor.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js'); ?>"></script>
    

</head>

<body>


    <div id="main-wrapper">
        <div class="nav-header">
            <div class="brand-logo">
                <span class="logo-abbr"><img src="http://localhost/IT_form_management/public/images/logo-sm.png" alt=""> </span>
                <span class="logo-compact"><img src="http://localhost/IT_form_management/public/images/Logo.png" alt=""></span>
                <span class="brand-title">
                    <img src="http://localhost/IT_form_management/public/images/Logo.png" alt="" class="logo-style">
                </span>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <a href="<?php echo base_url('/dashboard'); ?>" class="home-btn"><i class="icon-home"></i></a>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown d-none d-md-flex">
                            <a class="log-user">
                                <span>Welcome, <?php echo isset($_SESSION['Fname']) ? $_SESSION['Fname'] : 'Guest'; ?></span>
                            </a>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="<?php echo base_url("images/avatar/" . $_SESSION['user_avatar']); ?>" height="40" width="40"
                                    alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <hr class="my-2">
                                        <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                        </li>
                                        <li><a href="<?php echo base_url('/login'); ?>"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <!-- <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="menu-icon-style fa fa-dashboard"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url('/dashboard'); ?>">Home Panel</a></li>
                        </ul>
                    </li> -->

                    <li class="nav-label">Request</li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" aria-expanded="false">
                            <i class="menu-icon-style fa fa-plus-square"></i><span class="nav-text">Add Request</span>
                        </a>
                        <ul aria-expanded="false">
                            <?php if (isset($_SESSION['permissions']->FR_add) && $_SESSION['permissions']->FR_add) {
                                $_SESSION['permissions']->FR_add; ?>
                                <li><a href="<?php echo base_url('requests/new'); ?>">Add Firewall Request</a></li>
                            <?php } ?>
                            <?php if (isset($_SESSION['permissions']->INT_add) && $_SESSION['permissions']->INT_add) {
                                $_SESSION['permissions']->INT_add; ?>
                                <li><a href="<?php echo base_url('request/internet'); ?>">Internet Request</a></li>
                            <?php } ?>
                            <?php if (isset($_SESSION['permissions']->VA_add) && $_SESSION['permissions']->VA_add) {
                                $_SESSION['permissions']->VA_add; ?>
                                <li><a href="<?php echo base_url('request/va'); ?>">VA Request</a></li>
                            <?php } ?>                          
                            <?php if (isset($_SESSION['permissions']->PW_add) && $_SESSION['permissions']->PW_add) {
                                $_SESSION['permissions']->PW_add; ?>
                                <li><a href="<?php echo base_url('request/pwd'); ?>">Password Reset</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="menu-icon-style fa fa-clock-o"></i><span class="nav-text">Pending Request</span>
                        </a>
                        <ul aria-expanded="false">
                            <?php if (isset($_SESSION['permissions']->FR_app) && $_SESSION['permissions']->FR_app) {
                                $_SESSION['permissions']->FR_app; ?>
                                <li><a href="<?php echo base_url('requests/pendingrequest'); ?>">Pending Firewall Request</a></li>
                            <?php } ?>
                            <?php if (isset($_SESSION['permissions']->INT_app) && $_SESSION['permissions']->INT_app) {
                                $_SESSION['permissions']->INT_app; ?>
                                <li><a href="<?php echo base_url('requests/internetreq'); ?>">Pending Internet Request</a></li>
                            <?php } ?>
                            <?php if (isset($_SESSION['permissions']->VA_app) && $_SESSION['permissions']->VA_app) {
                                $_SESSION['permissions']->VA_app; ?>
                                <li><a href="<?php echo base_url('requests/vareq'); ?>">Pending VA Request</a></li>
                            <?php } ?>

                        </ul>

                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" aria-expanded="false">
                            <i class="menu-icon-style fa fa-book fa-fw"></i><span class="nav-text">My Request</span>
                        </a>
                        <ul aria-expanded="false">
                            <?php if (isset($_SESSION['permissions']->MY_flst) && $_SESSION['permissions']->MY_flst) {
                                $_SESSION['permissions']->MY_flst; ?>
                                <li><a href="<?php echo base_url('myreq/pendingfrequest'); ?>">My Firewall Request</a></li>
                            <?php } ?>
                            <?php if (isset($_SESSION['permissions']->MY_ilst) && $_SESSION['permissions']->MY_ilst) {
                                $_SESSION['permissions']->MY_ilst; ?>
                                <li><a href="<?php echo base_url('myreq/myinternetreq'); ?>">My Internet Request</a></li>
                            <?php } ?>
                            <?php if (isset($_SESSION['permissions']->MY_vlst) && $_SESSION['permissions']->MY_vlst) {
                                $_SESSION['permissions']->MY_vlst; ?>
                                 <li><a href="<?php echo base_url('myreq/myvareq'); ?>">VA Request</a></li>
                            <?php } ?>
                        </ul>
                    </li>

                    <li class="nav-label">Authorization Request</li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="menu-icon-style fa fa-check-square"></i><span class="nav-text">Authorize</span>
                        </a>
                        <ul aria-expanded="false">
                            <?php if (isset($_SESSION['permissions']->FR_auth) && $_SESSION['permissions']->FR_auth) {
                                $_SESSION['permissions']->FR_auth; ?>
                                <li><a href="<?php echo base_url('authentication/authorise'); ?>">Firewall Request</a></li>
                            <?php } ?>
                            <?php if (isset($_SESSION['permissions']->INT_auth) && $_SESSION['permissions']->INT_auth) {
                                $_SESSION['permissions']->INT_auth; ?>
                            <li><a href="<?php echo base_url('authentication/intauthorise'); ?>">Internet Request</a></li>
                            <?php } ?>
                            <?php if (isset($_SESSION['permissions']->VA_auth) && $_SESSION['permissions']->VA_auth) {
                                $_SESSION['permissions']->VA_auth; ?>
                            <li><a href="<?php echo base_url('requests/penvareqauth'); ?>">VA Request</a></li>
                            <?php } ?>
                        </ul>
                    </li>

                    <li class="nav-label">Execute Request</li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="menu-icon-style fa fa-external-link-square"></i> <span class="nav-text">Execute</span>
                        </a>
                        <ul aria-expanded="false">
                        <?php if (isset($_SESSION['permissions']->FR_exe) && $_SESSION['permissions']->FR_exe) {
                                $_SESSION['permissions']->FR_exe; ?>    
                            <li><a href="<?php echo base_url('execution/execute'); ?>">Firewall Request</a></li>
                        <?php } ?>
                        <?php if (isset($_SESSION['permissions']->INT_exe) && $_SESSION['permissions']->INT_exe) {
                                $_SESSION['permissions']->INT_exe; ?>
                            <li><a href="<?php echo base_url('execution/intreqexecute'); ?>">Internet Request</a></li>
                        <?php } ?>
                        <?php if (isset($_SESSION['permissions']->VA_exe) && $_SESSION['permissions']->VA_exe) {
                                $_SESSION['permissions']->VA_exe; ?>
                            <li><a href="<?php echo base_url('requests/penvareqexe'); ?>">VA Request</a></li>
                        <?php } ?>
                            <!-- <li><a href="./layout-two-column.html">Password Reset</a></li> -->

                        </ul>
                    </li>

                    <li class="nav-label">Reports</li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">                            
                            <i class="menu-icon-style fa fa-pie-chart"></i> <span class="nav-text">Master Reports</span>
                        </a>
                        <ul aria-expanded="false">
                        <?php if (isset($_SESSION['permissions']->FR_auth) && $_SESSION['permissions']->FR_auth) {
                                $_SESSION['permissions']->FR_auth; ?>
                            <li><a href="<?php echo base_url('mrepo/userunitwisereport'); ?>">User List Unit Wise</a></li>
                            <?php } ?>    
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="menu-icon-style fa fa-shield"></i> <span class="nav-text">Firewall Reports</span>
                        </a>
                        <ul aria-expanded="false">
                        <?php if (isset($_SESSION['permissions']->REP_FR) && $_SESSION['permissions']->REP_FR) {
                                $_SESSION['permissions']->REP_FR; ?>
                            <li><a href="<?php echo base_url('frepo/fwaccessdreport'); ?>">Firewall Access Detail Report</a></li>
                            <?php } ?>
                            <?php if (isset($_SESSION['permissions']->REP_INT) && $_SESSION['permissions']->REP_INT) {
                                $_SESSION['permissions']->REP_INT; ?>
                            <li><a href="<?php echo base_url('frepo/internetreqreport'); ?>">Internet Access Report</a></li> 
                            <?php } ?>
                            <?php if (isset($_SESSION['permissions']->REP_VA) && $_SESSION['permissions']->REP_VA) {
                                $_SESSION['permissions']->REP_VA; ?> 
                            <li><a href="<?php echo base_url('frepo/vareqreport'); ?>">VA Detail Report</a></li>
                            <?php } ?>
                            <?php if (isset($_SESSION['permissions']->REP_PWD) && $_SESSION['permissions']->REP_PWD) {
                                $_SESSION['permissions']->REP_PWD; ?>                             
                            <li><a href="<?php echo base_url('frepo/pwdreqreport'); ?>">Password Request Detail</a></li>
                            <?php } ?>
                        </ul>
                    </li>


                    <li class="nav-label">Administration</li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="menu-icon-style fa fa-user-plus"></i><span class="nav-text">User Management</span>
                        </a>
                        <ul aria-expanded="false">
                        <?php if (isset($_SESSION['permissions']->USR_ADD) && $_SESSION['permissions']->USR_ADD) {
                                $_SESSION['permissions']->USR_ADD; ?>
                            <li><a href="<?php echo base_url('user/addnew'); ?>">Add</a></li>
                        <?php } ?>
                        <?php if (isset($_SESSION['permissions']->USR_edit) && $_SESSION['permissions']->USR_edit) {
                                $_SESSION['permissions']->USR_edit; ?>
                            <li><a href="<?php echo base_url('user/getuser'); ?>">Edit Profile</a></li>
                        <?php } ?>
                        <?php if (isset($_SESSION['permissions']->PWD_reset) && $_SESSION['permissions']->PWD_reset) {
                                $_SESSION['permissions']->PWD_reset; ?>
                            <li><a href="<?php echo base_url('user/reset'); ?>">Reset</a></li>
                        <?php } ?>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="menu-icon-style fa fa-users"></i><span class="nav-text">Role Management</span>
                        </a>
                        <ul aria-expanded="false">
                        <?php if (isset($_SESSION['permissions']->Role_add) && $_SESSION['permissions']->Role_add) {
                                $_SESSION['permissions']->Role_add; ?>
                            <li><a href="<?php echo base_url('role/new'); ?>">Add</a></li>
                        <?php } ?>
                        <?php if (isset($_SESSION['permissions']->Role_edit) && $_SESSION['permissions']->Role_edit) {
                                $_SESSION['permissions']->Role_edit; ?>
                            <li><a href="<?php echo base_url('role/edit'); ?>">Edit</a></li>
                        <?php } ?>
                        <?php if (isset($_SESSION['permissions']->Role_access) && $_SESSION['permissions']->Role_access) {
                                $_SESSION['permissions']->Role_access; ?>    
                            <li><a href="<?php echo base_url('rolemodel/view'); ?>">Role Module Setup</a></li>
                        <?php } ?>
                        </ul>
                    </li>


                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--content goes here-->
        <?= $this->renderSection('baselayout') ?>


        <!-- ********************************** -->
        <!-- Footer start -->
        <!-- *********************************** -->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a> K.D.L.I Lakmal</a> 2023</p>
            </div>
        </div>
        <!-- ********************************** -->
        <!-- Footer end -->
        <!-- *********************************** -->
    </div>
    <!-- ********************************** -->
    <!-- Main wrapper end -->
    <!-- *********************************** -->

    <!--**********************************
    Custom Page Scripts
    ***********************************-->

    <script src="<?php echo base_url('plugins/common/common.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/custom.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/settings.js'); ?>"></script>
    <script src="<?php echo base_url('js/gleek.js'); ?>"></script>
    <script src="<?php echo base_url('js/alertify.min.js'); ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="./plugins/sweetalert/js/sweetalert.init.js"></script>

    <!--**********************************
    Datatable Scripts
    ***********************************-->                                
    <script src="<?php echo base_url('js/offline/dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('js/offline/dataTables.buttons.js'); ?>"></script>
    <script src="<?php echo base_url('js/offline/buttons.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('js/offline/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/offline/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/offline/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo base_url('js/offline/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/offline/buttons.print.min.js'); ?>"></script>

    <!-- ********************************** -->
    <!-- Scripts -->
    <!-- *********************************** -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <!-- <script src="js/settings.js"></script> -->
    <!-- <script src="js/gleek.js"></script> -->
    
    
</body>

</html>