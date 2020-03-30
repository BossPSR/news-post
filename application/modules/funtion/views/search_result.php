<?php $profile = $this->db->get_where('tbl_user', ['code_student' => $this->session->userdata('code_student')])->row_array(); ?>
<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                            <li class="breadcrumb-item active">ปริญญานิพนธ์นักศึกษา</li>
                        </ol>
                    </div>
                    <h4 class="page-title">ปริญญานิพนธ์นักศึกษา</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">ค้นหาปริญญานิพนธ์</h4>
              
                        <form action="search_result" method="POST">
                            <div class="form-group">
                                <!-- <label>ค้นหา</label> -->
                                <input type="search" name="gsearch" class="form-control"  placeholder="ค้นหา" />
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                    <!-- <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
                                    </button> -->
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <?php if (!empty($list)) : ?>

                        <h4 class="mt-0 header-title">ปริญญานิพนธ์นักศึกษา</h4>
                        <table id="" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th style="width: 300px;">เรื่อง</th>
                                    <th>ผู้แต่ง</th>
                                    <th>คณะ</th>
                                    <th>สาขาวิชา</th>
                                    <th>หลักสูตร</th>
                                    <th>พ.ศ</th>
                                    <th>keyword</th>
                                    <?php if ($this->session->userdata('code_student') != '') { ?>
                                    <th style="width: 170px;">เครื่องมือ</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <?php $i = 1 ?>

                            <tbody>
                                <?php foreach ($list as $key => $value) : ?>
                                <tr>
                                    <td style="text-align: center"><?php echo $i++ ?></td>
                                    <td><?php echo $value->title; ?></td>
                                    <td><?php echo $value->composer; ?></td>
                                    <td><?php echo $value->board_name; ?></td>
                                    <td><?php echo $value->subject_name; ?></td>
                                    <td><?php echo $value->branch_name; ?></td>
                                    <td><?php echo $value->year; ?></td>
                                    <td><?php echo $value->keyword; ?></td>
                                    <?php if ($this->session->userdata('code_student') != '') { ?>
                                    <td>
                                        <a href="./uploads/thesis/<?php echo $value->file_name; ?>" class="btn btn-info" target="_blank"><i class="fa fa-arrow-circle-down"></i></a>
                                        <?php if ($profile['is_admin'] == '4') : ?>
                                        <a href="search_edit?id=<?php echo $value->idT ;?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="search_delete?id=<?php echo $value->idT; ?>" onclick="confirm('แน่ใจใช่ไมที่จะลบข้อมูล?');" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                        <?php endif; ?>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else : ?>
                            <h3 style="text-align: center;">ไม่มีข้อมูลที่ค้นหา</h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div>
</div>