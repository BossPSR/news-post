<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">

                    </div>
                    <h4 class="page-title">ปริญญานิพนธ์นักศึกษา</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-10">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">ข้อมูลปริญญานิพนธ์นักศึกษา</h4>
                        <form class="" action="Thesis_add_com" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="hidden" name="id" value="">
                                        <label>ชื่อเรื่อง</label>
                                        <input type="text" class="form-control" name="title" value="" required placeholder="ชื่อเรื่อง" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>ชื่อผู้แต่ง</label>
                                        <input type="text" class="form-control" name="composer" value="" required placeholder="ชื่อผู้แต่ง" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>ปีที่แต่ง</label>
                                        <input type="number"  class="form-control" name="year" min="2500" max="2700" step="1" value="2563"  required placeholder="ปีที่แต่ง" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>คำสำคัญ</label>
                                        <input type="text" class="form-control" name="keyword" value="" required placeholder="คำสำคัญ" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>คณะ</label>
                                        <?php $get_board = $this->db->get('tbl_board')->result(); ?>
                                        <select class="form-control" name="board" id="board">
                                            <option value="" selected disabled>กรุณาเลือกคณะ</option><?php foreach ($get_board as $key => $row) { ?><option value="<?php echo $row->id; ?>"><?php echo $row->board_name; ?></option><?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>โปรแกรมวิชา</label>
                                        <select class="form-control" name="subject" id="subject" required>
                                            <option selected disabled>-- กรุณาเลือกวิชา --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>สาขา</label>
                                        <select class="form-control" name="branch" id="branch" required>
                                            <option selected disabled>-- กรุณาเลือกสาขา --</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>ไฟล์เอกสาร</label>
                                        <input type="file" class="form-control" name="file_name" value="" required placeholder="ไฟล์เอกสาร" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        บันทึก
                                    </button>
                                    <a href="index"><button type="button" class="btn btn-secondary waves-effect m-l-5">
                                            ยกเลิก
                                        </button></a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->


        </div> <!-- end row -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->