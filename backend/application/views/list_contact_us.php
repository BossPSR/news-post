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
                            <h2 class="content-header-title float-left mb-0">คำถามพบบ่อย</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">คำถามพบบ่อย
                                    </li>
                                </ol>
                            </div>
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
            <div class="content-body">
                <!-- Column selectors with Export Options and print table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">คำถามพบบ่อย</h4>
                                    <button type="button" class="btn btn-primary mr-1 mb-1" data-toggle="modal" data-target="#exampleModal">+ เพิ่ม คำถามที่พบบ่อย</button></a>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <p class="card-text"></p>
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>

                                                        <th>No.</th>
                                                        <th>หัวข้อ</th>
                                                        <th>ตอบคำถาม</th>
                                                        <th>วันที่่สร้าง</th>
                                                        <th>เครื่องมือ</th>
                                                    </tr>
                                                </thead>
                                                <?php $i = 1 ?>

                                                <?php foreach ($contact_us as $key => $contact_us) { ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $i++ ?></td>
                                                            <td><?php echo $contact_us['topic']; ?></td>
                                                            <td><?php echo $contact_us['message']; ?></td>
                                                            <td><?php echo $contact_us['create_times']; ?></td>
                                                            <td> <button data-toggle="modal" data-target="#exampleModala<?php echo $contact_us['id']; ?>" type="button" class="btn btn-warning"><i class="feather icon-edit" style="font-size: 25px;"></i>แก้ไข</button>
                                                                <button onclick="confirmalertdelete_contact_us('<?php echo $contact_us['id']; ?>')" class="btn btn-danger " type="button" aria-haspopup="true" aria-expanded="false"><i class="feather icon-trash" style="font-size: 25px;"></i>
                                                                    ลบ
                                                                </button>
                                                                <div class="modal fade" id="exampleModala<?php echo $contact_us['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <form action="contact_us_edit" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">คำถามที่พบบ่อย</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>




                                                                                    <input type="text" name="id" value="<?php echo $contact_us['id']; ?>" hidden>
                                                                                <div class="modal-body">
                                                                                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                                                                                        <div class="form-group">
                                                                                            <label for="helpInputTop">หัวข้อ</label>
                                                                                            <input type="text" class="form-control" name="topic" value="<?php echo $contact_us['topic']; ?>" placeholder="Enter หัวข้อ">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                                                                                        <div class="form-group">
                                                                                            <label for="helpInputTop">รายละเอียด</label>
                                                                                            <textarea name="message" id="" cols="30" rows="10" class="form-control" placeholder="Enter รายละเอียด"><?php echo $contact_us['message']; ?></textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="modal-footer">
                                                                                        <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                                                                            <div class="add-data-btn mr-1">
                                                                                                <button type="submit" class="btn btn-primary">submit</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>


                                                    </tbody>
                                                <?php } ?>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Column selectors with Export Options and print table -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="contact_us_com" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">คำถามที่พบบ่อย</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>


                                <div class="modal-body">
                                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="helpInputTop">หัวข้อ</label>
                                            <input type="text" class="form-control" name="topic" value="" placeholder="Enter หัวข้อ">
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="helpInputTop">รายละเอียด</label>
                                            <textarea name="message" id="" cols="30" rows="10" class="form-control" placeholder="Enter รายละเอียด"></textarea>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                            <div class="add-data-btn mr-1">
                                                <button type="submit" class="btn btn-primary">submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
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