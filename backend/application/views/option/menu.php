<!-- BEGIN: Main Menu-->
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="dashboard">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Vuexy</h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <!-- include ../../../includes/mixins-->
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="dropdown nav-item <?php if ($this->uri->segment(1) == "Dashboard") {
                                                    echo 'active';
                                                } ?>"><a href="Dashboard"><i class="feather icon-home"></i><span data-i18n="Dashboard">Dashboard</span></a></li>
                <?php if ($admin) { ?>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-user"></i><span data-i18n="Apps">User</span></a>
                        <ul class="dropdown-menu">
                            <li class="<?php if ($this->uri->segment(1) == "List-admin") {
                                            echo 'active';
                                        } ?>"><a class="dropdown-item" href="List-admin" data-toggle="dropdown" data-i18n="Email"><i class="feather icon-at-sign"></i>User</a></li>
                            <li class="<?php if ($this->uri->segment(1) == "List-employee") {
                                            echo 'active';
                                        } ?>"><a class="dropdown-item" href="List-employee" data-toggle="dropdown" data-i18n="Chat"><i class="feather icon-user-check"></i>Employee</a></li>
                            <li><a class="dropdown-item" href="#" data-toggle="dropdown" data-i18n="Todo"><i class="feather icon-users"></i>Student training</a></li>
                        </ul>

                    </li>
                <?php } ?>

                <li class="nav-item <?php if ($this->uri->segment(1) == "List-Order") {
                                                echo 'active';
                                            } ?>">
                 <a href="List-Order"><i class="feather icon-home"></i><span data-i18n="Dashboard">Order</span></a>
            </li>

            <li class="nav-item <?php if ($this->uri->segment(1) == "List-Post") {
                                                echo 'active';
                                            } ?>">
                 <a href="List-Post"><i class="feather icon-home"></i><span data-i18n="List-Post">หลักในการลงประกาศหนังสือพิมพ์</span></a>
            </li>

                <li class="nav-item <?php if ($this->uri->segment(1) == "List-Contact") {
                                                echo 'active';
                                            } ?>">
                 <a href="List-Contact"><i class="feather icon-home"></i><span data-i18n="Dashboard">Contact</span></a>
            </li>


            </ul>
        </div>
    </div>
</div>
<!-- END: Main Menu-->