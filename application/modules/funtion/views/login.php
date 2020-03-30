<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>ปริญญานิพนจ์</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="public/assets/images/favicon.ico">

    <!-- App css -->
    <link href="public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="public/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="public/assets/css/style.css" rel="stylesheet" type="text/css" />

</head>


<body>


    <div class="wrapper-page">

        <div class="card">
            <!-- flashdata start-->

            <!-- Begin page -->
            <div class="card-body">

                <h3 class="text-center mt-0 m-b-15">
                    <a href="" class="logo logo-admin"><img src="public/assets/images/logo-dark.png" height="30" alt="logo"></a>
                </h3>

                <h4 class="text-muted text-center font-18"><b>เข้าสู่ระบบ</b></h4>

                <div class="p-3">
                    <form class="form-horizontal m-t-20" action="LoginMe" method="post">

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" name="code_student" type="text" required="" placeholder="รหัสเข้าสู่ระบบ">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" name="password" type="password" required="" placeholder="รหัสผ่าน">
                            </div>
                        </div>



                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <button class="btn btn-info btn-block waves-effect waves-light" type="submit">เข้าสู่ระบบ</button>
                            </div>
                            <div class="col-sm-6 m-t-20">
                            <a href="Register" class="text-muted"><i class="mdi mdi-account-circle"></i> สมัครสมาชิกนักศึกษา</a>
                        </div>
                        <div class="col-sm-6 m-t-20">
                            <a href="search" class="text-muted"><i class="mdi mdi mdi-human-greeting"></i> สำหรับผู้ใช้ทั่วไป </a>
                        </div>
                        </div>
                        

                    </form>
                </div>

            </div>
        </div>
    </div>



    <!-- jQuery  -->
    <script src="public/assets/js/jquery.min.js"></script>
    <script src="public/assets/js/popper.min.js"></script>
    <script src="public/assets/js/bootstrap.min.js"></script>
    <script src="public/assets/js/modernizr.min.js"></script>
    <script src="public/assets/js/waves.js"></script>
    <script src="public/assets/js/jquery.slimscroll.js"></script>
    <script src="public/assets/js/jquery.nicescroll.js"></script>
    <script src="public/assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="public/assets/js/app.js"></script>
    <!-- End Footer -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        <?php if ($suss = $this->session->flashdata('save_ss2')) : ?>
            swal("Good job!", '<?php echo $suss; ?>', "success");
        <?php endif; ?>
        <?php if ($error = $this->session->flashdata('del_ss2')) : ?>
            swal("Fail !", '<?php echo $error; ?>', "error");
        <?php endif; ?>
    </script>


</body>

</html>