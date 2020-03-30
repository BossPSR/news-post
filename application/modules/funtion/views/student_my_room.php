<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                
                            </div>
                            <h4 class="page-title">ห้องเรียนของฉัน</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

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

                <div class="row">
               
                   <?php foreach ($rooms as $room) { 
                       $student_room = $this->db->get_where('tbl_student_room' ,['student_id' => $user->id,'room_id' => $room['id']])->row_array();
                       if (!empty($student_room)) {
                          
                   ?>
                    
                    <div class="col-lg-4">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <div class="media">
                                    <img class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg" src="public/assets/images/room.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                            <h5 class="mt-0 font-16 mb-1">ห้อง : <?php echo $room['room']; ?></h5>
                                            <div class="font-16">วิชา : <?php echo $room['subject']; ?></div>
                                            <div class="font-16">เซค : <?php echo $room['sec']; ?></div>
                                            <div class="font-16" style="display:flex">เวลา : 
                                                <?php echo date('h:i A',strtotime($room['start_time'])); ?>
                                                <div style="justify-content: center;display: flex;align-items: center; font-size:10px; margin: 0 5px;"><i class="fa fa-minus" aria-hidden="true"></i></div>
                                                <?php echo date('h:i A',strtotime($room['end_time'])); ?>
                                            </div>
                                            <?php 
                                                $teacher = $this->db->get_where('tbl_teacher',['id' => $room['teacher_id']])->row_array();
                                            ?>
                                            <div class="mt-0 font-16 mb-1">ผู้สอน : <?php echo $teacher['title'].$teacher['first_name'].' '.$teacher['last_name']; ?></div>
                                            
                                        <div>
                                            <a href="detail_room_student?id=<?php echo $room['id'];?>&type=student"><button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="รายละเอียดห้องเรียน"><i class="fa fa-file-text" aria-hidden="true"></i></button></a>
                                            <a href="file_teacher_student?id=<?php echo $room['id'];?>"><button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="เอกสารประกอบการเรียน"><i class="fa fa-file-archive-o" aria-hidden="true"></i></button></a>
                                            <a href="learning_student?id=<?php echo $room['id'];?>"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="เข้าห้องเรียน"><i class="fa fa-video-camera" aria-hidden="true"></i></button></a>
                                            <a href="home_work_student?id=<?php echo $room['id'];?>"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="ส่งการบ้าน"><i class="fa fa-book" aria-hidden="true"></i></button></a>
                                     
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                    <?php } ?>
                    <?php } ?>
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->