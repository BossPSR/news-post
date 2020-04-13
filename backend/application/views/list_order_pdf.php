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
                            <h2 class="content-header-title float-left mb-0">Order รูปภาพและ PDF</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="Dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Order รูปภาพและ PDF
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
                                    <h4 class="card-title">List Order รูปภาพและ PDF</h4>
                                    <div>
                                        <button type="button" class="btn btn-primary mr-1 mb-1" data-toggle="modal" data-target="#exampleModal">+ เพิ่ม List Order รูปภาพและ PDF</button></a>

                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <p class="card-text"></p>
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>

                                                        <th>No.</th>
                                                        <th>ไฟล์</th>
                                                        <th>เลือกหัวข้อ / เรื่อง</th>
                                                        <th>วันที่ลงโฆษณา</th>
                                                        <th>เคร่ืองมือ</th>

                                                    </tr>
                                                </thead>


                                                <?php $i = 1 ?>
                                                <tbody>
                                                    <?php foreach ($pdf as $key => $pdf) { ?>
                                                        <?php
                                                        $img =  explode(".", $pdf['file_name']);
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $i++ ?></td>
                                                            <td>
                                                                <?php if ($img[1] == 'pdf') : ?>
                                                                    <a href="../uploads/pdf/<?php echo $pdf['file_name'] ?>" target="_blank"><i class="feather icon-file-text" style="font-size: 25px; cursor: pointer;"></i></a>
                                                                <?php else : ?>
                                                                    <a href="../uploads/pdf/<?php echo $pdf['file_name']; ?>" target="_blank"><i class="feather icon-file-text" style="font-size: 25px; cursor: pointer;"></i></a>
                                                                <?php endif; ?>

                                                                
                                                            </td>
                                                            <td><?php echo $pdf['topic']; ?></td>
                                                            <td><?php echo $pdf['date']; ?></td>
                                                            <td>
                                                                <button data-toggle="modal" data-target="#exampleModala<?php echo $pdf['id']; ?>" type="button" class="btn btn-warning"><i class="feather icon-edit" style="font-size: 25px;"></i>แก้ไข</button>
                                                                <button onclick="confirmalertdelete_pdf('<?php echo $pdf['id']; ?>')" class="btn btn-danger " type="button" aria-haspopup="true" aria-expanded="false"><i class="feather icon-trash" style="font-size: 25px;"></i>
                                                                    ลบ
                                                                </button>
                                                                <div class="modal fade" id="exampleModala<?php echo $pdf['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <form action="pdf_edit_com" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">ลงด้วยรูปภาพและ PDF</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>

                                                                                <input type="text" name="id" value="<?php echo $pdf['id']; ?>" hidden>
                                                                                <div class="modal-body">
                                                                                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                                                                                        <div class="form-group">
                                                                                            <label for="helpInputTop">เลือกหัวข้อ/เรื่อง</label>
                                                                                            <select name="topic" class="form-control">
                                                                                                <option value="0" selected disabled>กรุณาเลือก</option>

                                                                                                <option value="แบบไฟล์ PDF (ขนาดไฟล์เท่ากับ A4 เท่านั้น)" <?php if ($pdf['topic'] == "แบบไฟล์ PDF (ขนาดไฟล์เท่ากับ A4 เท่านั้น)") {
                                                                                                                                                                echo "selected='selected'";
                                                                                                                                                            } ?>>แบบไฟล์ PDF (ขนาดไฟล์เท่ากับ A4 เท่านั้น)</option>
                                                                                                <option value="แบบรูปภาพ (ขนาดไฟล์เท่ากับ A4 เท่านั้น)" <?php if ($pdf['topic'] == "แบบรูปภาพ (ขนาดไฟล์เท่ากับ A4 เท่านั้น)") {
                                                                                                                                                            echo "selected='selected'";
                                                                                                                                                        } ?>>แบบรูปภาพ (ขนาดไฟล์เท่ากับ A4 เท่านั้น)</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                                                                                        <div class="form-group">
                                                                                            <label for="helpInputTop">วันที่ลงโฆษณา</label>
                                                                                            <input type="date" name="date" value="<?php echo $pdf['date'] ?>" min="<?php echo date('Y-m-d') ?>" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                                                                                        <div class="form-group">
                                                                                            <label for="helpInputTop">File name</label>
                                                                                            <input type="file" class="form-control" name="file_name" id="image-source" onchange="previewImage();" placeholder="Enter file_name">
                                                                                        </div>
                                                                                        <?php if ($img[1] == 'pdf') : ?>
                                                                                            <a href="../uploads/pdf/<?php echo $pdf['file_name'] ?>" target="_blank"><i class="feather icon-file-text" style="font-size: 25px; cursor: pointer;"></i></a>
                                                                                        <?php else : ?>
                                                                                            <img src="../uploads/pdf/<?php echo $pdf['file_name']; ?>" style="width: auto;height: 200px;   padding-bottom: 10px;">
                                                                                            <img id="image-preview" alt="image preview"/ style="width:auto;height: 200px;">
                                                                                        <?php endif; ?>

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
                                                    <?php } ?>


                                                </tbody>


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
                        <form action="pdf_add_com" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">ลงด้วยรูปภาพและ PDF</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>


                                <div class="modal-body">
                                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="helpInputTop">เลือกหัวข้อ/เรื่อง</label>
                                            <select name="topic" class="form-control">
                                                <option value="0" selected disabled>กรุณาเลือก</option>
                                                <option value="แบบไฟล์ PDF (ขนาดไฟล์เท่ากับ A4 เท่านั้น)">แบบไฟล์ PDF (ขนาดไฟล์เท่ากับ A4 เท่านั้น)</option>
                                                <option value="แบบรูปภาพ (ขนาดไฟล์เท่ากับ A4 เท่านั้น)">แบบรูปภาพ (ขนาดไฟล์เท่ากับ A4 เท่านั้น)</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="helpInputTop">วันที่ลงโฆษณา</label>
                                            <input type="date" name="date" value="" min="<?php echo date('Y-m-d') ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="helpInputTop">File name</label>
                                            <input type="file" class="form-control" name="file_name" id="image-source" onchange="previewImage();" placeholder="Enter file_name">
                                        </div>
                                        <img id="image-preview" alt="image preview" style="width:auto;height: 200px;">
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
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <?php include('option/footer.php'); ?>
    <?php include('option/script.php'); ?>
</body>
<!-- END: Body-->

</html>