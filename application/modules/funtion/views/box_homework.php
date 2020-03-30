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
                                    <h3>กล่องส่งการบ้าน (Box Hand In HomeWork)</h3>
                                    <h4>ห้องเรียน : <?php echo $room['room']; ?></h4>
                                    <h4>วิชา : <?php echo $room['subject']; ?></h4>
                                    <h4>เซค : <?php echo $room['sec']; ?></h4>
                                    <?php $teacher = $this->db->get_where('tbl_teacher',['id'=> $room['teacher_id']])->row();?>
                                    <h4>ผู้สอน : <?php echo $teacher->title.$teacher->first_name.' '.$teacher->last_name; ?></h4>
                                    <div><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">สร้างกล่องส่งการบ้าน</button></div>
                                <hr><br>

                                <div class="row">
                                    <?php 
                                        $color = 1;
                                        foreach ($box_home_work as $key => $box_home_work) {
                                        
                                    ?>       
                                           <div class="col-md-6">
                                               <div class="p-20">
                                                   <div class="form-group"> 
                                                        <div>
                                                            <?php if($color == 1){ ?>
                                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDate<?php echo $box_home_work['id']; ?>">หัวข้อ : <?php echo $box_home_work['title']; ?></button>
                                                            <?php }else{ ?>
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDate<?php echo $box_home_work['id']; ?>">หัวข้อ : <?php echo $box_home_work['title']; ?></button>
                                                            <?php 
                                                                } 
                                                                if ($color == 1) {
                                                                    $color = 0;
                                                                }elseif($color == 0){
                                                                    $color = 1;
                                                                }
                                                            ?>
                                                        </div>
                                                   </div>
                                               </div>
                                           </div>

                            <!-- Modal -->
                            <div class="modal fade" id="modalDate<?php echo $box_home_work['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $box_home_work['title']; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                   
                                        <div class="modal-body">
                                            
                                            <div class="row">
                                            
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <div style="text-align: center;">
                                                            <?php if(isset($type) && $type == "teacher"){ ?>
                                                                <a href="deleteBox_homework?id=<?php echo $box_home_work['id']; ?>&room_id=<?php echo $box_home_work['room_id']; ?>&type=teacher"  onclick="return confirm('ท่านต้องการลบกล่องส่งการบ้าน ?')" style="display: inline-block;"><button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> ลบกล่องส่งการบ้าน</button></a>
                                                            <?php }else{ ?>
                                                                <a href="deleteBox_homework?id=<?php echo $box_home_work['id']; ?>&room_id=<?php echo $box_home_work['room_id']; ?>"  onclick="return confirm('ท่านต้องการลบกล่องส่งการบ้าน ?')" style="display: inline-block;"><button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> ลบกล่องส่งการบ้าน</button></a>
                                                            <?php } ?>
                                                               
                                                            </div> 
                                                            <div>
                                                                <h6 style="display:inline-block;">หัวข้อ :</h6><span> <?php echo $box_home_work['title']; ?></span>
                                                            </div>
                                                            <div>  
                                                                <h6 style="display:inline-block;">คำอธิบาย :</h6><span> <?php echo $box_home_work['description']; ?></span>
                                                            </div>
                                                            <div>
                                                                <h6 style="display:inline-block;">ส่งก่อน :</h6><span> <?php echo date('วันที่ d-m-Y เวลา H:i:s น.',strtotime($box_home_work['later_than'])); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            </div>

                                            <hr>

                                            <div class="row">
                                            <?php 
                                                $homeWork = $this->db->get_where('tbl_home_work',['box_home_work_id' => $box_home_work['id']])->result_array(); 
                                                foreach ($homeWork as $key => $homeWorkDetail) {
                                                   $key += 1;
                                                   $student = $this->db->get_where('tbl_student',['id' => $homeWorkDetail['student_id']])->row();
                                            ?> 
                                                <div class="col-md-6">
                                                    <div class="p-20">
                                                        <div class="form-group">        
                                                            <label><?php echo $student->Frist_name.' '.$student->last_name;  ?></label>
                                                            <div style="display: flex; margin-bottom:5px;">
                                                                <a href="<?php echo site_url('checkHomework_student?id=').$homeWorkDetail['id']; ?>" style="display: inline-block;"><button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="การบ้านของ <?php echo $student->Frist_name.' '.$student->last_name;  ?>"><i class="fa fa-file-archive-o" aria-hidden="true"></i></button></a>

                                                                    <input type="number" class="form-control" id="point<?php echo $homeWorkDetail['id']; ?>" style="margin-left:5px; margin-right:5px; width:50%;" name="point_homework" value="<?php echo $homeWorkDetail['point_homework']; ?>">
                                                                    <button type="button" class="btn btn-success" id="send_point" onclick="point_homework(document.getElementById('point<?php echo $homeWorkDetail['id']; ?>').value,<?php echo $homeWorkDetail['id']; ?>)" >ให้คะแนน</button>
                                                                
                                                            </div>
                                                            <div class="btn-warning loading_point<?php echo $homeWorkDetail['id']; ?>" style="text-align:center; font-size:12px; width: 100%; display:none">
                                                                <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                                                            </div>

                                                            <div class="btn-success show_point<?php echo $homeWorkDetail['id']; ?>" style="text-align:center; font-size:12px; width: 100%; display:none">
                                                                <div><i class="fa fa-check-square" aria-hidden="true"></i> ให้คะแนน <?php echo $student->Frist_name.' '.$student->last_name;  ?></div>
                                                                <div>เรียบร้อยแล้ว</div>
                                                            </div>
                                                            <div class="btn-danger error_show_point<?php echo $homeWorkDetail['id']; ?>" style="text-align:center; font-size:12px; width: 100%; display:none">
                                                                <div><i class="fa fa-check-square" aria-hidden="true"></i> ให้คะแนน <?php echo $student->Frist_name.' '.$student->last_name;  ?></div>
                                                                <div>ไม่สำเร็จ กรุณาลองใหม่</div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                           
                                            <?php } ?> 
                                            </div>
                                            


                                        
                                        </div>
                                        <div class="modal-footer">
                                         
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">ย้อนกลับ</button>
                                            
                                        </div>

                                    </div>
                                </div>
                                </div>





                                    <?php 
                                       }
                                    ?>    
                                </div>      
                                           

                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="p-20">
                                                            
                                                        <?php if(isset($type) && $type == "teacher"){ ?>
                                                            <a href="teacher_my_room"><button type="button" class="btn btn-danger">ย้อนกลับ</button></a>
                                                        <?php }else{ ?>
                                                            <a href="index"><button type="button" class="btn btn-danger">ย้อนกลับ</button></a>
                                                        <?php } ?>
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
                                <script type="text/javascript">
                                $(function () {
                                    $('#datetimepicker3').datetimepicker({
                                        format: 'LT'
                                    });
                                });
                            </script>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">สร้างกล่องส่งการบ้าน (Create Box Hand In HomeWork)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <form action="box_homework_process" method="post">   
                                        <div class="modal-body">
                                            <input type="hidden" name="room_id" value="<?php echo $room['id']; ?>">
                                            <?php if(isset($type) && $type == "teacher"){ ?>
                                                <input type="hidden" name="type" value="<?php echo $type; ?>">
                                                       
                                             <?php } ?>
                                            <div class="row">
                                            
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>หัวข้อ (Title) <span style="color:red;">*</span></label>
                                                            <input type="text" placeholder="" class="form-control" name="title" value="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>คำอธิบาย (Description) <span style="color:red;">*</span></label>
                                                            <textarea class="form-control" rows="10" name="description" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>ส่งก่อน (No Later Than) <span style="color:red;">*</span></label>
                                                            <input type="date" placeholder="" class="form-control" name="date" value="<?php echo date("Y-m-d"); ?>" required>
                                                            <br>
                                                            <input type="time" placeholder="" class="form-control" name="time" value="08:00:00" required>
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

                                <script type="text/javascript">
                                    function point_homework(point,id) {       
                                        $('.loading_point'+id).css('display','block');
                                        $('.show_point'+id).css('display','none');  
                                        $('.error_show_point'+id).css('display','none');                                                                                                                            
                                        $.ajax({
                                                url:'point_homework',
                                                method: 'POST',
                                                data:{
                                                     id:id,
                                                     point_homework:point                                                           
                                                },
                                                success:function (response) {
                                                    response = JSON.parse(response);
                                                    if (response.successfully === true) {
                                                        $('.show_point'+id).css('display','block');
                                                        $('.loading_point'+id).css('display','none');
                                                    }else if(response.successfully !== true){
                                                        $('.error_show_point'+id).css('display','block');
                                                        $('.loading_point'+id).css('display','none');
                                                    }
                                                    console.log(response);                                                      
                                                }
                                        });
                                       
                                    }
                                </script>