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
                                    <h3>ส่งการบ้าน (Home)</h3>
                               
                                <hr><br>  
                                <?php 
                                    
                                    if (isset($room)) {
                                ?>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>ชื่อห้อง (Name Room) : <?php echo $room->room; ?></label>
                                                        </div>  
                                                        <div class="form-group"> 
                                                            <label>เช็ค (Sec) : <?php echo $room->sec; ?></label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>วิชา (Subject) : <?php echo $room->subject; ?></label>
                                                        </div>   
                                                        <div class="form-group">
                                                            <label>เวลา (Time) : <?php echo date('h:i A',strtotime($room->start_time)); ?> - <?php echo date('h:i A',strtotime($room->end_time)); ?></label>
                                                        </div>
                                                        <?php $teacher = $this->db->get_where('tbl_teacher',['id'=> $room->teacher_id])->row();?>
                                                        <div class="form-group">
                                                            <label>ผู้สอน (Teacher) : <?php echo $teacher->title.$teacher->first_name.' '.$teacher->last_name; ?></label>
                                                        </div>                                            
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="p-20">
                                                        
                                                    </div>
                                                </div>
                                               
                                            </div>
                                             

                                    <?php } ?> 

                                
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div>
                                                            <label style="font-size:18px;">การบ้านของฉัน (My Home Work)</label>
                                                            <div>
                                                            <?php foreach ($box_home_work as $box_home_work) { ?>
                                                                <div class="form-group" style="display:inline-block;">
                                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#HomeWorkModal<?php echo $box_home_work['id']; ?>"><?php echo $box_home_work['title']; ?></button> 
                                                                </div>
                                                                
                                                                 <!-- Modal -->
                                                                <div class="modal fade" id="HomeWorkModal<?php echo $box_home_work['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $box_home_work['title']; ?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                <form action="home_work_process" method="post" enctype="multipart/form-data"> 
                                                                    <input type="hidden" name="home_work_id" value="<?php echo $box_home_work['id']; ?>">
                                                                    <?php 
                                                                
                                                                        if (isset($room)) {
                                                                            $checkHomework_student = $this->db->order_by('id','DESC')->get_where('tbl_home_work' ,['student_id'=>$student->id,'box_home_work_id'=>$box_home_work['id']])->row_array();
                                                                            if (empty($checkHomework_student)) {
                                                                                $timeHomework = strtotime($box_home_work['later_than']); 
                                                                                $dateToday =  strtotime(date('Y-m-d H:i:s'));
                                                                            
                                                                    ?>
                                                                    <div class="modal-body">
                                                                    
                                                                    <input type="hidden" name="room_id" value="<?php echo $room->id; ?>">  
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="p-20">
                                                                                    <div class="form-group">
                                                                                        <label>รายละเอียดการบ้าน (Description) <span style="color:red;">*</span></label>
                                                                                        <div><?php echo $box_home_work['description']; ?></div>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="p-20">
                                                                                    <div class="form-group">
                                                                                        <label>การบ้าน (Home Work) <span style="color:red;">*</span></label>
                                                                                        <input type="file" placeholder="" class="form-control" name="file_name" required>
                                                                                        
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
                                                                   
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <?php if($dateToday >= $timeHomework){ ?>
                                                                              <button type="button" onclick="return alert('ไม่สามารถส่งการบ้านได้ เนื่องจากหมดเวลาในการส่งการบ้านแล้ว')" class="btn btn-primary">ส่งการบ้าน</button>
                                                                        <?php }else{ ?>
                                                                              <button type="submit" class="btn btn-primary">ส่งการบ้าน</button>
                                                                        <?php } ?>
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                                                        
                                                                    </div>
                                                                   
                                                                    <?php                                                                       
                                                                      }else{
                                                                      ?>
                                                                    <div class="modal-body">
                                                                    
                                                                        <div class="row">
                                                                            
                                                                            <div class="col-md-12">
                                                                                <div class="p-20">
                                                                                    <div class="form-group">
                                                                                    
                                                                                            <div style="text-align:center;">
                                                                                            <?php 
                                                                                                $dateToday = strtotime(date('Y-m-d H:i:s'));
                                                                                                $timeHomework_onSend = strtotime($box_home_work['later_than']); 
                                                                                             if ($dateToday >= $timeHomework_onSend) {
                                                                                                 
                                                                                            ?>
                                                                                                <button type="button" class="btn btn-danger" onclick="return alert('ไม่สามารถลบการบ้านได้ เนื่องจากหมดเวลาในการส่งการบ้านแล้ว')"><i class="fa fa-trash" aria-hidden="true"></i> ลบการบ้าน</button>
                                                                                            <?php }else{

                                                                                             ?>
                                                                                                <a style="display: inline-block;" href="delete_home_work?id=<?php echo $checkHomework_student['id'];?>&room_id=<?php echo $room->id;?>"  onclick="return confirm('ท่านต้องการลบการบ้าน ?')"><button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> ลบการบ้าน</button></a>
                                                                                            <?php 
                                                                                                } 
                                                                                            ?>
                                                                                            </div>
                                                                                      
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <div class="p-20">
                                                                                    <div class="form-group">
                                                                                        <label>การบ้าน (Home Work)</label>
                                                                                        <div>
                                                                                            <a href="<?php echo site_url('downloadHomework_student?id=').$checkHomework_student['id']; ?>" style="display: inline-block;"><button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="การบ้านหัวข้อ <?php echo $box_home_work['title']; ?> ของฉัน"><i class="fa fa-file-archive-o" aria-hidden="true"></i></button></a>    
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <div class="p-20">
                                                                                    <div class="form-group">
                                                                                        <label>คำอธิบาย (Description)</label>
                                                                                        <textarea class="form-control" name="description" rows="10" readonly><?php echo  $checkHomework_student['description']; ?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <div class="p-20">
                                                                                    <div class="form-group">
                                                                                        <label>วันที่ส่ง (Date)</label>
                                                                                        <div class="form-control"><?php echo date('วันที่ d-m-Y เวลา H:i:s น.',strtotime($checkHomework_student['send_on'])); ?></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                   
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">ย้อนกลับ</button>
                                                                        
                                                                    </div>
                                                                <?php   
                                                                      }  
                                                                   }
                                                                ?>
                                                                </form>
                                                                </div>
                                                            </div>
                                                            </div>

                                                            <?php } ?>   
                                                               
                                                            </div>
                                                        </div>  
                                                        
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="p-20">
                                                        
                                                    </div>
                                                </div>
                                               
                                            </div>
                                             

                                  

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



                              