<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <?php include('option/header.php'); ?>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static" data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <?php include('option/begin_menu.php'); ?>
    <?php include('option/menu.php'); ?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <!-- <h2 class="content-header-title float-left mb-0">Order</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="Dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Order
                                    </li>
                                </ol>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <!-- <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                        </div> -->

                    </div>
                </div>
            </div>
            <div class="content-body" style="padding-top: 6%;">
                <!-- Column selectors with Export Options and print table -->

                <div class="row" style="text-align: center">
                    <div class="col-lg-3 col-md-6 col-sm-12"></div>
                   
                    <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="List-Order">
                        <div class="card" style="width: 70%;">
                            <div class="card-content">
                                <img class="card-img img-fluid" src="assets/app-assets/images/slider/04.jpg" alt="Card image" styler>
                                <div class="card-img-overlay overflow-hidden overlay-danger overlay-lighten-2">
                                    <h4 class="card-title text-white">วิธีที่ 1 ลงตาม template</h4>
                                    <p class="card-text text-white">ลงได้ครั้งละ 1 กรอบ
                                    </p>
                                    <p class="card-text"><small class="text-white">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    
                    
                    <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="List_order_pdf">
                        <div class="card text-white border-0 box-shadow-0" style="width: 70%;">
                            <div class="card-content">
                                <img class="card-img img-fluid" src="assets/app-assets/images/slider/04.jpg" alt="Card image">
                                <div class="card-img-overlay overflow-hidden overlay-success">
                                    <h4 class="card-title text-white">วิธีที่ 2 ลงด้วยรูปภาพและ PDF</h4>
                                    <p class="card-text text-white">ลงได้หลายกรอบพร้อมกัน( ไม่จำกัดจำนวน )
                                    </p>
                                    <p class="card-text text-white"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-12"></div>
                </div>

                <!-- Column selectors with Export Options and print table -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <?php include('option/footer.php'); ?>
    <?php include('option/script.php'); ?>
</body>
<!-- END: Body-->

</html>