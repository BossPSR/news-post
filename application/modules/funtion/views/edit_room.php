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
                               
                                    <h3>แก้ไขห้องเรียน (Edit Room)</h3>
                               
                                <hr><br>
                                <?php if(isset($room)) { ?>
                                <form action="edit_room_process" method="post">      
                                <input type="hidden" name="id" value="<?php echo $this->input->get('id'); ?>">
                                            <div class="row">
                                            <?php if(isset($type)){ ?>
                                                <input type="hidden" name="type" value="<?php echo $type; ?>">

                                            <?php } ?>

                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>ชื่อห้อง (Name Room) <span style="color:red;">*</span></label>
                                                            <input type="text" placeholder="" class="form-control" name="name_room" value="<?php echo $room->room; ?>"  required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>เช็ค (Sec) <span style="color:red;">*</span></label>
                                                            <input type="text" placeholder="" class="form-control" name="sec" value="<?php echo $room->sec; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>วิชา (Subject) <span style="color:red;">*</span></label>
                                                            <input type="text" placeholder="" class="form-control" name="subject" value="<?php echo $room->subject; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>รับกี่คน (Limit Room) <span style="color:red;">*</span></label>
                                                            <input type="number" placeholder="" class="form-control" name="limit_room" value="<?php echo $room->limit_room; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>เวลา (Time) <span style="color:red;">*</span></label>
                                                            <div style="display:flex">
                                                                <input style="width:30%;" type="time" value="<?php echo $room->start_time; ?>" class="form-control" name="start_time"  required>
                                                                    <div style="justify-content: center;display: flex;align-items: center; font-size:10px; margin: 0 5px;"><i class="fa fa-minus" aria-hidden="true"></i></div>
                                                                <input style="width:30%;" type="time" value="<?php echo $room->end_time; ?>" class="form-control" name="end_time"  required>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                        <div class="form-group">
                                                            <label>ผู้สอน (Teacher)</label>
                                                            <?php $teacher = $this->db->get_where('tbl_teacher',['id'=> $room->teacher_id])->row();?>
                                                            <div class="form-control"><?php echo  $teacher->title.$teacher->first_name.' '.$teacher->last_name;?></div>
                                                        </div>
                                                    </div>
                                                </div>

                                               
                                            </div>
                                             <div class="row">
                                                <div class="col-md-12">
                                                    <div class="p-20">
                                                            <button type="submit" class="btn btn-success">แก้ไขข้อมูล</button>
                                                            <?php if(isset($type) && $type == "teacher"){ ?>
                                                                <a href="teacher_my_room"><button type="button" class="btn btn-danger">ย้อนกลับ</button></a>
                                                            <?php }else{ ?>
                                                                <a href="index"><button type="button" class="btn btn-danger">ย้อนกลับ</button></a>
                                                            <?php } ?>
                                                    </div>
                                                </div>
                                            </div>


                                        </form>
                                    <?php } ?>
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
