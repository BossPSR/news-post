<?php $id = $this->input->get('id') ?>
<?php $thesis = $this->db->get_where('tbl_thesis', ['id' => $id])->row_array(); ?>
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
                        <form class="" action="search_edit_com" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="hidden" name="id" value="<?php echo $thesis['id'] ?>">
                                        <label>ชื่อเรื่อง</label>
                                        <input type="text" class="form-control" name="title" value="<?php echo $thesis['title'] ?>" required placeholder="ชื่อเรื่อง" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>ชื่อผู้แต่ง</label>
                                        <input type="text" class="form-control" name="composer" value="<?php echo $thesis['composer'] ?>" required placeholder="ชื่อผู้แต่ง" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>ปีที่แต่ง</label>
                                        <input type="number"  class="form-control" name="year" min="2500" max="2700" step="1" value="<?php echo $thesis['year'] ?>"  required placeholder="ปีที่แต่ง" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>คำสำคัญ</label>
                                        <input type="text" class="form-control" name="keyword" value="<?php echo $thesis['keyword'] ?>" required placeholder="คำสำคัญ" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>คณะ</label>
                                        <?php $get_board = $this->db->get('tbl_board')->result(); ?>
                                        <?php $pro = $this->db->get_where('tbl_board', ['id' => $thesis['board']])->row_array(); ?>
                                        <select class="form-control" name="board" id="board">
                                        <?php if ($thesis['board'] > 0) : ?>
                                        <option selected value="<?php echo $pro['id']; ?>"><?php echo $pro['board_name']; ?></option>
                                        <?php else : ?>
                                            <option value="" selected disabled>กรุณาเลือกคณะ</option>
                                            <?php endif ?>
                                            <?php foreach ($get_board as $key => $row) { ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->board_name; ?></option><?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>โปรแกรมวิชา</label>
                                        <?php $amp = $this->db->get_where('tbl_subject', ['id' => $thesis['subject']])->row_array(); ?>
                                        <select class="form-control" name="subject" id="subject" required>
                                        <?php if ($thesis['subject'] > 0) : ?>
                                            <option selected value="<?php echo $amp['id']; ?>"><?php echo $amp['subject_name']; ?></option>
                                            <?php else : ?>
                                            <option selected disabled>-- กรุณาเลือกวิชา --</option>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>สาขา</label>
                                 <?php $dist = $this->db->get_where('tbl_branch', ['id' => $thesis['branch']])->row_array(); ?>
                                        <select class="form-control" name="branch" id="branch" required>
                                        <?php if ($thesis['branch'] > 0) : ?>
                                            <option selected value="<?php echo $dist['id']; ?>"><?php echo $dist['branch_name']; ?></option>
                                            <?php else : ?>
                                            <option selected disabled>-- กรุณาเลือกสาขา --</option>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>ไฟล์เอกสาร</label>
                                        <input type="file" class="form-control" name="file_name" value=""  placeholder="ไฟล์เอกสาร" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-warning waves-effect waves-light">
                                        แก้ไข
                                    </button>
                                    <a href="search">
                                        <button type="button" class="btn btn-secondary waves-effect m-l-5"> ยกเลิก </button>
                                    </a>
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