<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login Page - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="assets/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="assets/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="assets/app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="assets/app-assets/images/pages/login.png" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Login</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Welcome back, please login to your account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form name="frmMain" method="post">
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" id="input-username" name="username" placeholder="Username" required>
                                                        <span id="empty-email" style="font-size:12px;"></span>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-mail"></i>
                                                        </div>
                                                        <label for="user-name">Username</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" id="input-password" name="password" placeholder="Password" required>
                                                        <span id="empty-password" style="font-size:12px;"></span>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">Password</label>
                                                    </fieldset>
                                                    <div class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-right"><a href="auth-forgot-password.html" class="card-link">Forgot Password?</a></div>
                                                        <button type="button" id="send_login" class="btn btn-primary float-right btn-inline">Login</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="assets/app-assets/vendors/js/vendors.min.js"></script>
    <script src="assets/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="assets/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="assets/app-assets/js/core/app-menu.js"></script>
    <script src="assets/app-assets/js/core/app.js"></script>
    <script src="assets/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="assets/app-assets/js/scripts/extensions/sweet-alerts.js"></script>
    <!-- END: Page JS-->

    <script type="text/javascript">
        $('#send_login').click(function() {
            var username = $("#input-username").val();
            var password = $("#input-password").val();
            if (username.length === 0) {
                $('#empty-email').html('The username is empty !!').css('color', 'red');
            } else if (username.length !== 0) {
                $('#empty-email').html('').css('color', 'red');
            }
            if (password.length === 0) {
                $('#empty-password').html('The password is empty !!').css('color', 'red');
            } else if (password.length !== 0) {
                $('#empty-password').html('').css('color', 'red');
            }

            if (username.length === 0 && password.length === 0) {
                // console.log(password);
                $('#empty-email').html('The username is empty !!').css('color', 'red');
                $('#empty-password').html('The password is empty !!').css('color', 'red');
            } else {
                frmMain.action = 'LoginMe'
                frmMain.submit();
            }

        });
    </script>
    <script type="text/javascript">
        <?php if ($this->session->flashdata('fail_login')) : ?>
            Swal.fire({
                position: 'start-end',
                type: 'error',
                title: 'Username or Password is incorrect. !!',
                showConfirmButton: true,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            });
        <?php endif; ?>
    </script>
</body>
<!-- END: Body-->

</html>
<script>

</script>