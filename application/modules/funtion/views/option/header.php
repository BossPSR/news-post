<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>ปริญญานิพนธ์</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="public/assets/images/favicon.ico">
    <link href="public/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="public/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="public/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

    <!--Morris Chart CSS -->
    <link href="public/assets/plugins/morris/morris.css"  rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="public/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="public/assets/css/style.css" rel="stylesheet" type="text/css" />


</head>


<body>

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid">

                <!-- Logo container-->
                <div class="logo">
                    <!-- Text Logo -->
                    <!--<a href="index.html" class="logo">-->
                    <!--Upcube-->
                    <!--</a>-->
                    <!-- Image Logo -->
                    <a href="index" class="logo">
                        <img src="public/assets/images/logo-sm.png" alt="" height="22" class="logo-small">
                        <img src="public/assets/images/logo.png" alt="" height="24" class="logo-large">
                    </a>

                </div>
                <!-- End Logo container-->


                <div class="menu-extras topbar-custom">



                    <ul class="list-inline float-right mb-0">


                        <!-- User-->
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="public/assets/images/user_logo.jpg" alt="user" class="rounded-circle" data-toggle="tooltip" data-placement="bottom" title="โปรไฟล์ของฉัน">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <a class="dropdown-item" href="profile"><i class="dripicons-user text-muted"></i> Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="LogOut"><i class="dripicons-exit text-muted"></i> Logout</a>
                            </div>
                        </li>
                        <li class="menu-item list-inline-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                    </ul>
                </div>
                <!-- end menu-extras -->

                <div class="clearfix"></div>

            </div> <!-- end container -->
        </div>
        <!-- end topbar-main -->
        <?php $profile = $this->db->get_where('tbl_user', ['code_student' => $this->session->userdata('code_student')])->row_array(); ?>
        <!-- MENU Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <?php if ($profile['is_admin'] == '4') : ?>
                            <li class="has-submenu">
                                <a href="dashboard"><i class="ti-home"></i>กราฟสรุป</a>
                            </li>
                            <li class="has-submenu">
                                <a href="index"><i class="ti-home"></i>ปริญญานิพนธ์นักศึกษา / คณะ / หลักสูตรวิชา / สาขา</a>
                            </li>
                            <li class="has-submenu">
                                <a href="#"><i class="ti-crown"></i>ข้อมูลผู้ใช้งาน</a>
                                <ul class="submenu">
                                    <li><a href="user">ผู้ดูแลระบบ</a></li>
                                    <li><a href="user_student">ผู้ใช้งานประเภทนักศึกษา</a></li>
                                    <li><a href="user_teacher">ผู้ใช้งานประเภทอาจารย์ </a></li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="search"><i class="ti-home"></i>ค้นหาปริญญานิพนธ์</a>
                            </li>

                        <?php elseif ($profile['is_admin'] == '3') : ?>
                            <li class="has-submenu">
                                <a href="index"><i class="ti-home"></i>ปริญญานิพนธ์นักศึกษา</a>
                            </li>
                          
                            <li class="has-submenu">
                                <a href="search"><i class="ti-home"></i>ค้นหาปริญญานิพนธ์</a>
                            </li>

                        <?php elseif ($profile['is_admin'] == '2') : ?>
                            <li class="has-submenu">
                                <a href="index"><i class="ti-home"></i>ปริญญานิพนธ์นักศึกษา</a>
                            </li>
                            
                            <li class="has-submenu">
                                <a href="search"><i class="ti-home"></i>ค้นหาปริญญานิพนธ์</a>
                            </li>
                        <?php else : ?>    
                            <li class="has-submenu">
                                <a href="search"><i class="ti-home"></i>ค้นหาปริญญานิพนธ์</a>
                            </li>
                        <?php endif ?>



                    </ul>
                    <!-- End navigation menu -->
                </div> <!-- end #navigation -->
            </div> <!-- end container -->
        </div> <!-- end navbar-custom -->
    </header>
    <!-- End Navigation Bar-->