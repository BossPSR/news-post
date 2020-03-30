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
        <div class="col-12"><?php $get_board = $this->db->get('tbl_board')->result(); ?><select class="form-control" name="board" id="board">
                <option value="" selected disabled>โปรดเลือกคณะ</option><?php foreach ($get_board as $key => $row) { ?><option value="<?php echo $row->id; ?>"><?php echo $row->board_name; ?></option><?php } ?>
            </select></div>
        <div class="form-group row">
            <div class="col-12"><select name="subject" id="subject" required>
                    <option selected disabled>-- กรุณาเลือกวิชา --</option>
                </select></div>
        </div>
        <div class="form-group row">
            <div class="col-12"> <select name="branch" id="branch" required>
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