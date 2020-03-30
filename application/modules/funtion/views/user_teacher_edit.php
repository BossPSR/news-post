<?php $id = $this->input->get('id') ?>
<?php $user = $this->db->get_where('tbl_user', ['id' => $id])->row_array(); ?>

<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">

                    </div>
                    <h4 class="page-title">ข้อมูลผู้ใช้งานอาจารย์</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-10">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">แก้ไขข้อมูลผู้ใช้งานอาจารย์</h4>
                        <form class="" action="user_teacher_edit_com" method="POST">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                                        <label>ชื่อ-สกุล</label>
                                        <input type="text" class="form-control" name="username" value="<?php echo $user['username'] ?>" required placeholder="ชื่อ-สกุล" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>อีเมล</label>
                                        <input type="text" class="form-control" name="email" value="<?php echo $user['email'] ?>" required placeholder="อีเมล" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>เบอร์โทร</label>
                                        <input type="text" class="form-control" name="phone" value="<?php echo $user['phone'] ?>" required placeholder="เบอร์โทร" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>รหัสอาจารย์</label>
                                        <input type="text" class="form-control" name="code_student" value="<?php echo $user['code_student'] ?>" required placeholder="เบอร์โทร" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>คณะ</label>
                                        <input type="text" class="form-control" name="board" value="<?php echo $user['board'] ?>" required placeholder="คณะ" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>โปแกรมวิชา</label>
                                        <input type="text" class="form-control" name="subject" value="<?php echo $user['subject'] ?>" required placeholder="โปแกรมวิชา" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>สาขา</label>
                                        <input type="text" class="form-control" name="branch" value="<?php echo $user['branch'] ?>" required placeholder="สาขา" />
                                    </div>
                                 
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        บันทึก
                                    </button>
                                    <a href="user_teacher"><button type="button" class="btn btn-secondary waves-effect m-l-5">
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