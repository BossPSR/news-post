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
                               
                                    <h3>รายเอียดห้องเรียน (Room Detail)</h3>
                               
                                <hr><br>  
                                <?php 
                                    
                                    if (isset($room)) {
                                        $zoom = $this->db->get_where('tbl_zoom',['room_id'=>$room->id])->row_array();
                                ?>
                                            <div class="row">

                                                <div class="col-md-6">
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
                                                            <label>ผู้สอน (Teacher): <?php echo $teacher->title.$teacher->first_name.' '.$teacher->last_name; ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="p-20" style="height: 100%;">
                                                        <a href="<?php echo $zoom['zoom_url'];?>" target="_blank" style="display: inline-block;">
                                                            <div style="height:100%;background: #000; cursor: pointer;">
                                                                <img src="public/assets/images/zoom.jpg" alt="" style="max-width: 100%;" data-toggle="tooltip" data-placement="bottom" title="เข้าห้องเรียน">
                                                            </div>
                                                        </a>
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
