<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Upcube - Responsive Flat Admin Dashboard</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="public/assets/images/favicon.ico">

    <!-- App css -->
    <link href="public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="public/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="public/assets/css/style.css" rel="stylesheet" type="text/css" />

</head>


<body>


    <div class="wrapper-page">

        <div class="card">
            <!-- flashdata start-->
          
            <!-- Begin page -->
            <div class="card-body">
            <h4 class="text-muted text-center font-18"><b>สำหรับนักศึกษา</b></h4>
            <form class="form-horizontal m-t-20" action="Register_complete" method="POST">
    <div class="form-group row">
        <div class="col-6"><input class="form-control" type="text" placeholder="ชื่อ" name="Frist_name" id="Frist_name" required></div>
        <div class="col-6"><input class="form-control" type="text" placeholder="นามสกุล" name="last_name" id="last_name" required></div>
    </div>
    <div class="form-group row">
        <div class="col-12"><input class="form-control" type="number" placeholder="รหัสนักศึกษา" name="code_student" id="code_student" required></div>
    </div>
    <div class="form-group row">
        <div class="col-6"><input class="form-control" type="password" placeholder="รหัสผ่าน" name="password" id="password" required></div>
        <div class="col-6"><input class="form-control" type="password" placeholder="ยืนยันรหัสผ่าน" name="cpassword" id="confirm_password" required></div><span id="message" style="margin-left: 14px;"></span>
    </div>
    <div class="form-group row">
        <div class="col-12"><input class="form-control" type="email" placeholder="อีเมล" name="email" id="email" required></div>
    </div>
    <div class="form-group row">
        <div class="col-12"><input class="form-control" type="text" placeholder="เบอร์โทร" name="tel" id="tel" required></div>
    </div>
    <div class="form-group row">
        <div class="col-12">
            <?php $get_board = $this->db->get('tbl_board')->result(); ?>
            <select class="form-control" name="board" id="board">
                <option value="" selected disabled>กรุณาเลือกคณะ</option><?php foreach ($get_board as $key => $row) { ?><option value="<?php echo $row->id; ?>"><?php echo $row->board_name; ?></option><?php } ?>
            </select></div></div>
        <div class="form-group row">
            <div class="col-12">
                <select class="form-control" name="subject" id="subject" required>
                    <option selected disabled>-- กรุณาเลือกวิชา --</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12"> 
                <select class="form-control" name="branch" id="branch" required>
                    <option selected disabled>-- กรุณาเลือกสาขา --</option>
                </select></div>
        </div>
        <div class="form-group text-center row m-t-20">
            <div class="col-6"><button class="btn btn-success btn-block waves-effect waves-light" type="submit">สมัคร</button></div>
            <div class="col-6"><a href="Login"><button class="btn btn-basic btn-block waves-effect waves-light" type="button">เข้าสู่ระบบ</button></a></div>
        </div>
</form>
<script src="public/assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#board').change(function() {
            var provinces_id = $('#board').val();
            if (provinces_id != '') {
                $.ajax({
                    url: 'fetch_state',
                    method: "POST",
                    data: {
                        PROVINCE_ID: provinces_id
                    },
                    success: function(data) {
                        $('#subject').html(data);
                    }
                })
            }
            console.log(provinces_id);
        });
        $('#subject').change(function() {
            var amphures_id = $('#subject').val();
            if (amphures_id != '') {
                $.ajax({
                    url: 'fetch_city',
                    method: 'POST',
                    data: {
                        AMPHUR_ID: amphures_id
                    },
                    success: function(data) {
                        $('#branch').html(data);
                    }
                })
            }
            console.log(amphures_id);
        });
    });
</script>
            </div>
        </div>
    </div>



    <!-- jQuery  -->
    <script src="public/assets/js/jquery.min.js"></script>
    <script src="public/assets/js/popper.min.js"></script>
    <script src="public/assets/js/bootstrap.min.js"></script>
    <script src="public/assets/js/modernizr.min.js"></script>
    <script src="public/assets/js/waves.js"></script>
    <script src="public/assets/js/jquery.slimscroll.js"></script>
    <script src="public/assets/js/jquery.nicescroll.js"></script>
    <script src="public/assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="public/assets/js/app.js"></script>
            <!-- End Footer -->
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    <?php if ($suss = $this->session->flashdata('save_ss2')) : ?>
        swal("Good job!", '<?php echo $suss; ?>', "success");
    <?php endif; ?>
    <?php if ($error = $this->session->flashdata('del_ss2')) : ?>
        swal("Fail !", '<?php echo $error; ?>', "error");
    <?php endif; ?>
</script>


</body>

</html>