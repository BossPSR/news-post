
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
                                    <h3>เอกสารประกอบการเรียน (Handout)</h3>
                                    <h4>ห้องเรียน : <?php echo $room['room']; ?></h4>
                                    <h4>วิชา : <?php echo $room['subject']; ?></h4>
                                    <h4>เซค : <?php echo $room['sec']; ?></h4>
                                    <?php $teacher = $this->db->get_where('tbl_teacher',['id'=> $room['teacher_id']])->row();?>
                                    <h4>ผู้สอน : <?php echo $teacher->title.$teacher->first_name.' '.$teacher->last_name; ?></h4>
                                <hr><br>  
                                <?php 
                                    
                                    if (!empty($file)) {
                                ?>
                                            <div class="row">
                                           
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label style="font-size:18px;">เอกสารประกอบการเรียน (Handout)</label>
                                                            <div>
                                                                <?php foreach ($file as $key => $file) { 
                                                                    $key += 1;
                                                                    $nameFile = explode('.',$file['file_name']);
                                                                ?>
                                                                    <label style="display:block;">เอกสารที่ <?php echo $key.'.'.$nameFile[0]; ?></label>
                                                                    <a class="form-group" href="<?php echo site_url('downloadDocument?id=').$file['id']; ?>" style="display:inline-block ;"><button class="btn btn-info btn-block waves-effect waves-light" type="button" data-toggle="tooltip" data-placement="bottom" title="เอกสารประกอบการเรียน"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php echo $file['file_name'];?></button></a>
                                                                    <a style="display: inline-block;" href="delete_file_teacher?id=<?php echo $file['id'];?>&room_id=<?php echo $room['id'];?>"  onclick="return confirm('ท่านต้องการลบเอกสารประกอบการเรียน ?')"><button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> ลบเอกสารประกอบการเรียน</button></a>
                                                                    <div class="form-group">
                                                                        <label>คำอธิบาย (Description)</label>
                                                                        <textarea class="form-control" rows="10" readonly><?php echo empty($file['description']) ? "-" : $file['description'] ; ?></textarea>
                                                                    </div>
                                                                    
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               

                                               
                                            </div>
                                            <hr style="border: 1px  dashed;"><br> 

                                    <?php } ?> 
                                        <form action="file_teacher_process" method="post" enctype="multipart/form-data"> 
                                        <input type="hidden" name="room_id" value="<?php echo $room['id']; ?>">
                                            
                                            <div class="row">     
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>เพิ่มเอกสารประกอบการเรียน (Add Handout) <span style="color:red;">*</span></label>
                                                            <input type="file" placeholder="" class="form-control" name="file_name"  required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>คำอธิบาย (Description) <span style="color:red;">* หากไม่มีให้ใส่ - *</span></label>
                                                            <textarea class="form-control" name="description" rows="10" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                                                            <?php if(isset($type) && $type == "teacher"){ ?>
                                                                <a href="teacher_my_room"><button type="button" class="btn btn-danger">ย้อนกลับ</button></a>
                                                            <?php }else{ ?>
                                                                <a href="index"><button type="button" class="btn btn-danger">ย้อนกลับ</button></a>
                                                            <?php } ?>
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
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                <script>
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            
                                            reader.onload = function(e) {
                                            $('#blah').attr('src', e.target.result);
                                            }
                                            
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                        }

                                        $("#imgInp").change(function() {
                                        readURL(this);
                                        });
                                </script>
