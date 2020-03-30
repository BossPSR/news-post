<br>
<br>
<!-- Start right Content here -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <!-- Top Bar Start -->
       <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                   
                                </ol>
                    </div>
                            <h4 class="page-title"></h4>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->
        <br>
        <br>
        <br>
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <div class="card m-b-30">
                        <div class="card-body">
                 <!-- flashdata start-->
                    <?php if($success = $this->session->flashdata('response')):?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <?php echo $success; ?> <a class="alert-link" href="#"></a>.
                        </div>
                                <?php elseif($error = $this->session->flashdata('msg')):?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <?php echo $error; ?> <a class="alert-link" href="#"></a>.
                        </div>
                    <?php endif; ?>
                            
                <!-- flashdata end-->
                                    <h3>โปรไฟล์ (Profile)</h3>
                               
                                <hr><br>
                                <form action="edit_profile_student" method="post">      
                                            <div class="row">
                                            
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>ชื่อ (Frist Name) <span style="color:red;">*</span></label>
                                                            <input type="text" placeholder="" class="form-control" name="first_name" value="<?php echo $user['Frist_name']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>นามสกุล (Last Name) <span style="color:red;">*</span></label>
                                                            <input type="text" placeholder="" class="form-control" name="last_name" value="<?php echo $user['last_name']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>อีเมล (Email) <span style="color:red;">*</span></label>
                                                            <input type="text" placeholder="" class="form-control" name="email" value="<?php echo $user['email']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>รหัสบัตรประชาชน (Public Code) <span style="color:red;">*</span></label>
                                                            <input type="text" placeholder="" class="form-control" name="public_code" value="<?php echo $user['Public_code']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>รหัสนักศึกษา (Code) <span style="color:red;">*</span></label>
                                                            <input type="text" placeholder="" class="form-control" name="codes" value="<?php echo $user['codes']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>เบอร์โทรศัพท์ (Tel) <span style="color:red;">*</span></label>
                                                            <input type="text" placeholder="" class="form-control" name="tel" value="<?php echo $user['tel']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                             <div class="row form-group">
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>        
                                                            <a href="index_student"><button type="button" class="btn btn-danger">ย้อนกลับ</button></a>
                                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">แก้ไขรหัสผ่าน</button>  
                                                    </div>
                                                </div>
                                            </div>


                                        </form>
                                        
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div><!-- container -->
    </div> <!-- Page content Wrapper -->
</div> <!-- content -->


                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">แก้ไขรหัสผ่าน</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <form action="edit_password_student" method="post">   
                                        <div class="modal-body">
                                           
                                            <div class="row">
                                            
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>รหัสผ่านเก่า (Old Password) <span style="color:red;">*</span></label>
                                                            <input type="password" placeholder="" class="form-control" name="password" value="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>รหัสผ่านใหม่ (New Password)) <span style="color:red;">*</span></label>
                                                            <input type="password" placeholder="" class="form-control" name="newpassword" value="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>ยืนยันรหัสผ่านใหม่ (Confirm Password) <span style="color:red;">*</span></label>
                                                            <input type="password" placeholder="" class="form-control" name="confirmpassword" value="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                             <div class="row form-group">
                                                <div class="col-md-12">
                                                    <div class="p-20">

                                                    </div>
                                                </div>
                                            </div>


                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                            
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                </div>
                               
