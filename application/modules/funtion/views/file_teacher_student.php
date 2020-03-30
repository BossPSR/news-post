
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
                                                                    <a class="form-group" href="<?php echo site_url('downloadDocument_student?id=').$file['id']; ?>" style="display:inline-block ;"><button class="btn btn-info btn-block waves-effect waves-light" type="button" data-toggle="tooltip" data-placement="bottom" title="เอกสารประกอบการเรียน"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php echo $file['file_name'];?></button></a>
                                                                    
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
    

                                    <?php } ?> 
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                            
                                                        <a href="student_my_room"><button type="button" class="btn btn-danger">ย้อนกลับ</button></a>
                                                            
                                                    </div>
                                                </div>
                                            </div>
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
