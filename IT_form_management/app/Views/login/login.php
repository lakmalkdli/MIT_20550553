<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">

    <link href="./plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<script src="./plugins/sweetalert/js/sweetalert.min.js"></script>
<script src="./plugins/sweetalert/js/sweetalert.init.js"></script>
<script src="plugins/common/common.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/settings.js"></script>
<script src="js/gleek.js"></script>
<script src="js/styleSwitcher.js"></script>
<style>
    .login-logo{
        width: 100% !important;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {

        $('#loginForm').submit(function(e) {
            e.preventDefault(); // Prevent form submission

            var inputusername = $('input[name="username"]').val();
            var inputpassword = $('input[name="password"]').val();

                    if (inputusername !== "" && inputpassword !== "") {
                        // swal("Success!", "Login successful", "success");
                        $.ajax({
                            url: "<?php echo base_url('/login') ?>",
                            type: "POST",
                            dataType: "json",
                            data: {
                                inputusername: inputusername,
                                inputpassword: inputpassword,
                            },
                            success: function (response) {
                                console.log(response.status)
                                if (response && response.status == "pass") {

                                    window.location.href = "<?php echo base_url('/loginvalpss'); ?>";
                                
                                }
                                else if(response && response.status == "inactive"){
                                    swal("Error!", "User Disabled.Please COntact Admin !", "error");
                                } 
                                else {
                                    swal("Error!", "Invaid username or password", "error");
                                }


                            },
                            error: function (xhr, status, error) {
                                // Handle error
                                console.error(xhr.responseText);
                            }
                        });
                        // window.location.href = "<?php echo base_url('/dashboard'); ?>";

                    } else {
                        // Show SweetAlert error message
                        swal("Error!", "Please enter both username and password", "error");
                        // swal("Error!", "User Disabled !.Please Contact Administrator.", "error");

                    }


        });

    });

</script>

<body class="h-100">

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                            <!-- <span class="login-logo text-center"> -->
                        <img class="login-logo text-center" src="http://localhost/IT_form_management/public/images/Logo.png" alt="" class="logo-style">
                    <!-- </span> -->
                    
                                
                                    <h5 class="text-center mt-4">Please enter your credentials to access FIRENET360</h4>
                                
                              
                                <form id="loginForm" action="" method="post" accept-charset="utf-8" class="mt-2 mb-5 login-input">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="sweetalert m-t-30">
                                        <button type="submit" class="btn btn-primary btn w-100">Sign In</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>