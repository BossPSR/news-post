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
                            <h2 class="content-header-title float-left mb-0">ผู้ใช้งานที่เติมเครดิตเข้ามา</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="Dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">ผู้ใช้งานที่เติมเครดิตเข้ามา
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">


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
                                    <h4 class="card-title">ผู้ใช้งานที่เติมเครดิตเข้ามา</h4>
                                  
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <p class="card-text"></p>
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>

                                                        <th>No.</th>
                                                        <th>ผู้ใช้งาน</th>
                                                        <th>ราคา</th>
                                                        <th>เครดิต</th>
                                                        <th>วันที่เติมเครดิต</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <?php $i = 1 ?>

                                                <tbody>
                                                    <?php foreach ($omise as $key => $omise) { ?>
                                                        <tr>
                                                            <td><?php echo $i++ ?></td>

                                                            <td>
                                                                <?php $username =  $this->db->get_where('tbl_user',['id_user' => $omise['id_user']])->row_array(); ?>
                                                                <?php echo $username['company']?>
                                                            </td>

                                                            <td><?php echo $omise['price']?> บาท</td>
                                                            <td><?php echo $omise['count']?> เครดิต</td>
                                                            <td><?php echo $omise['create_time']?></td>
                                                


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
            </div>
            </section>
            <!-- Column selectors with Export Options and print table -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="post_add_com" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">หลักในการลงประกาศหนังสือพิมพ์</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


                            <div class="modal-body">
                                <div class="col-xl-12 col-md-6 col-12 mb-1">
                                    <div class="form-group">
                                        <label for="helpInputTop">หัวข้อ</label>
                                        <input type="text" class="form-control" name="topic" value="" placeholder="Enter หัวข้อ" R>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-md-6 col-12 mb-1">
                                    <div class="form-group">
                                        <label for="helpInputTop">รายละเอียด</label>
                                        <textarea name="details" id="" cols="30" rows="10" class="form-control"></textarea>
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
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <?php include('option/footer.php'); ?>
    <?php include('option/script.php'); ?>
</body>

<!-- END: Body-->

</html>