<?php $profile = $this->db->get_where('tbl_user', ['code_student' => $this->session->userdata('code_student')])->row_array(); ?>
<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <?php if ($profile['is_admin'] == '4') : ?>
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary waves-effect waves-light" style="margin-right: 5px"><i class="ion-plus-round"> เพิ่มคณะ</i></button>
                            <button type="button" data-toggle="modal" data-target="#exampleModal2" class="btn btn-primary waves-effect waves-light" style="margin-right: 5px"><i class="ion-plus-round"> เพิ่มโปรแกรมวิชา</i></button>
                            <button type="button" data-toggle="modal" data-target="#exampleModal3" class="btn btn-primary waves-effect waves-light"><i class="ion-plus-round">เพิ่มสาขา</i></button>
                        </ol>
                    </div>
                    <?php endif; ?>
                  <a href="Thesis"><button type="button" class="btn btn-success waves-effect waves-light"> <i class="ion-plus-round"> เพิ่มปริญญานิพนธ์นักศึกษา</i></button></a>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">ปริญญานิพนธ์นักศึกษา</h4>

                        <table id="datatable" class="table table-bordered">
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
                                    <th style="width: 170px;">เครื่องมือ</th>
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
                                    <td>
                                        <a href="./uploads/thesis/<?php echo $value->file_name; ?>"  class="btn btn-info" target="_blank"><i class="fa fa-arrow-circle-down"></i></a>
                                        <?php if ($profile['is_admin'] == '4') : ?>
                                        <a href="Thesis_edit?id=<?php echo $value->idT; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="delete_thesis?id=<?php echo $value->idT; ?>" onclick="if(confirm('แน่ใจใช่ไมที่จะลบข้อมูล?')) return true; else return false;" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มคณะ</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="board" method="POST" class="form-horizontal">
                                        <div class="modal-body">
                                            <input type="hidden" class="form-control" name="id" value="">
                                            <input type="hidden" class="form-control" name="user_id" value="">
                                            <div class="data-items pb-3">
                                                <div class="data-fields px-2 mt-3">
                                                    <div class="row">
                                                        <div class="col-sm-12 data-field-col">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="data-name">ชื่อคณะ</label>
                                                                    <input type="text" class="form-control" name="board_name" value="" placeholder="ชื่อคณะ" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="margin-left:81%">
                                                    <button type="submit" class="btn btn-primary">submit</button>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                                <div class="modal-body">

                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อคณะ</th>
                                                <th>เครื่องมือ</th>
                                            </tr>
                                        </thead>
                                        <?php $i = 1 ?>

                                        <tbody>
                                            <?php $board = $this->db->get('tbl_board')->result_array(); ?>
                                            <?php foreach ($board as $board) { ?>

                                                <tr>
                                                    <td style="text-align: center"><?php echo $i++ ?></td>
                                                    <td><?php echo $board['board_name'] ?></td>
                                                    <td>
                                                        <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModallCenter<?php echo $board['id']; ?>"><i class="fa fa-pencil"></i></button>
                                                        <a href="delete_board_edit?id=<?php echo $board['id']; ?>" class="btn btn-danger" onclick="return confirm('ยืนยันการลบข้อมูล')"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="exampleModallCenter<?php echo $board['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModallCenter" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModallCenter">แก้ไขข้อมูลคณะ</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="board_edit" method="POST" class="form-horizontal">
                                                                <div class="modal-body">
                                                                    <input type="hidden" class="form-control" name="id" value="<?php echo $board['id']; ?>">
                                                                    <div class="data-items pb-3">
                                                                        <div class="data-fields px-2 mt-3">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 data-field-col">
                                                                                    <div class="form-group">
                                                                                        <div class="controls">
                                                                                            <label for="data-name">ชื่อคณะ</label>
                                                                                            <input type="text" class="form-control" name="board_name" value="<?php echo $board['board_name']; ?>" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                                                        <div class="add-data-btn mr-1">
                                                                            <button type="submit" class="btn btn-primary">submit</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                        <div class="add-data-btn mr-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มโปรแกรมวิชา</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="subject" method="POST" class="form-horizontal">
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id" value="">
                                        <input type="hidden" class="form-control" name="user_id" value="">
                                        <div class="data-items pb-3">
                                            <div class="data-fields px-2 mt-3">
                                                <div class="row">
                                                    <div class="col-sm-12 data-field-col">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="data-name">ชื่อคณะ</label>
                                                                <?php $board = $this->db->get('tbl_board')->result_array(); ?>
                                                                <select name="board_id" class="form-control">
                                                                    <option value="" selected disabled>กรุณาเลือกคณะ</option>
                                                                    <?php foreach ($board as $board) { ?>
                                                                        <option value="<?php echo $board['id'] ?>"><?php echo $board['board_name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 data-field-col">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="data-name">ชื่อโปรแกรมวิชา</label>
                                                                <input type="text" class="form-control" name="subject_name" value="" placeholder="ชื่อโปรแกรมวิชา" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-left:81%">
                                                <button type="submit" class="btn btn-primary">submit</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                            <div class="modal-body">

                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อคณะ,โปรแกรมวิชา</th>
                                            <th>เครื่องมือ</th>
                                        </tr>
                                    </thead>
                                    <?php $i = 1 ?>

                                    <tbody>
                                        <?php $board = $this->db->get('tbl_board')->result_array(); ?>

                                        <?php foreach ($board as $board) { ?>
                                            <?php $subject = $this->db->get_where('tbl_subject', ['board_id' => $board['id']])->result_array(); ?>
                                            <?php foreach ($subject as $subject) { ?>
                                            <tr>
                                                <td style="text-align: center"><?php echo $i++ ?></td>
                                               
                                                
                                                <td>
                                                
                                                    <b>คณะ :</b><?php echo $board['board_name'] . '<br> <b>หลักสูตรวิชา : </b>' . $subject['subject_name'] ?>
                                                   
                                                </td>
                                               
                                                <td>
                                                    <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModallCenter2<?php echo $board['id']; ?>"><i class="fa fa-pencil"></i></button>
                                                    <a href="delete_subject_edit?id=<?php echo $subject['id']; ?>" class="btn btn-danger" onclick="return confirm('ยืนยันการลบข้อมูล')"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            
                                            <div class="modal fade" id="exampleModallCenter2<?php echo $subject['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModallCenter" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModallCenter">แก้ไขข้อมูลโปรแกรมวิชา</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="subject_edit" method="POST" class="form-horizontal">
                                                            <div class="modal-body">
                                                                <input type="hidden" class="form-control" name="id" value="<?php echo $subject['id']; ?>">
                                                               
                                                                <div class="data-items pb-3">
                                                                    <div class="data-fields px-2 mt-3">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 data-field-col">
                                                                                <div class="form-group">
                                                                                    <div class="controls">
                                                                                        <label for="data-name">ชือโปรแกรมวิชา</label>
                                                                                        <input type="text" class="form-control" name="subject_name" value="<?php echo $subject['subject_name']; ?>" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                                                    <div class="add-data-btn mr-1">
                                                                        <button type="submit" class="btn btn-primary">submit</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                            <?php }?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                    <div class="add-data-btn mr-1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มสาขา</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="branch" method="POST" class="form-horizontal">
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id" value="">
                                        <input type="hidden" class="form-control" name="user_id" value="">
                                        <div class="data-items pb-3">
                                            <div class="data-fields px-2 mt-3">
                                                <div class="row">
                                                    <div class="col-sm-12 data-field-col">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="data-name">ชื่อคณะ</label>
                                                                <?php $board = $this->db->get('tbl_board')->result_array(); ?>
                                                                <select name="board_id" class="form-control">
                                                                    <option value="" selected disabled>กรุณาเลือกคณะ</option>
                                                                    <?php foreach ($board as $board) { ?>
                                                                        <option value="<?php echo $board['id'] ?>"><?php echo $board['board_name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 data-field-col">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="data-name">ชื่อโปรแกรมวิชา</label>
                                                                <?php $subject = $this->db->get('tbl_subject')->result_array(); ?>
                                                                <select name="subject_id" class="form-control">
                                                                    <option value="" selected disabled>กรุณาเลือกโปรแกรมวิชา</option>
                                                                    <?php foreach ($subject as $subject) { ?>
                                                                        <option value="<?php echo $subject['id'] ?>"><?php echo $subject['subject_name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 data-field-col">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="data-name">ชื่อสาขา</label>
                                                                <input type="text" class="form-control" name="branch_name" value="" placeholder="ชื่อสาขา" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-left:81%">
                                                <button type="submit" class="btn btn-primary">submit</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                            <div class="modal-body">

                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อคณะ,โปรแกรมวิชา,สาขา</th>
                                            <th>เครื่องมือ</th>
                                        </tr>
                                    </thead>
                                    <?php $i = 1 ?>

                                    <tbody> 
                                        <?php $branch = $this->db->get('tbl_branch')->result_array(); ?>
                                                <?php foreach ($branch as $branch) { ?>
                                        <?php $subject = $this->db->get_where('tbl_subject', ['id' => $branch['subject_id']])->row_array(); ?>
                                        <?php $board = $this->db->get_where('tbl_board',['id' => $branch['board_id']])->row_array(); ?>
                                        <?php if ($board == true) { ?>
                                            <tr>
                                                <td style="text-align: center"><?php echo $i++ ?></td>
                                               
                                                
                                                <td>
                                                
                                                    <b>คณะ :</b><?php echo $board['board_name'] . '<br> <b>หลักสูตรวิชา : </b>' . $subject['subject_name'].'<br> <b>สาขาวิชา : </b>'.$branch['branch_name'] ?>
                                                   
                                                </td>
                                               
                                                <td>
                                                    <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModallCenter3<?php echo $branch['id']; ?>"><i class="fa fa-pencil"></i></button>
                                                    <a href="delete_branch_edit?id=<?php echo $branch['id']; ?>" class="btn btn-danger" onclick="return confirm('ยืนยันการลบข้อมูล')"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                            <div class="modal fade" id="exampleModallCenter3<?php echo $branch['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModallCenter" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModallCenter">แก้ไขข้อมูลสาขาวิชา</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="branch_edit" method="POST" class="form-horizontal">
                                                            <div class="modal-body">
                                                                <input type="hidden" class="form-control" name="id" value="<?php echo $branch['id']; ?>">
                                                               
                                                                <div class="data-items pb-3">
                                                                    <div class="data-fields px-2 mt-3">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 data-field-col">
                                                                                <div class="form-group">
                                                                                    <div class="controls">
                                                                                        <label for="data-name">ชื่อสาขาวิชา</label>
                                                                                        <input type="text" class="form-control" name="branch_name" value="<?php echo $branch['branch_name']; ?>" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                                                    <div class="add-data-btn mr-1">
                                                                        <button type="submit" class="btn btn-primary">submit</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                         
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                    <div class="add-data-btn mr-1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- end row -->